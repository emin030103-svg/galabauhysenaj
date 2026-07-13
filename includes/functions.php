<?php
declare(strict_types=1);

session_start();

$configPath = __DIR__ . '/../config/config.php';
$config = file_exists($configPath) ? require $configPath : require __DIR__ . '/../config/config.example.php';
require_once __DIR__ . '/data.php';

if (empty($config['debug'])) {
    ini_set('display_errors', '0');
}

header('X-Content-Type-Options: nosniff');
header('Content-Type: text/html; charset=UTF-8');
header('Referrer-Policy: strict-origin-when-cross-origin');
header('X-Frame-Options: SAMEORIGIN');
header("Permissions-Policy: camera=(), microphone=(), geolocation=()");

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function current_page(): string
{
    return basename($_SERVER['SCRIPT_NAME'] ?? 'index.php');
}

function url_for(string $path = ''): string
{
    global $config;
    return rtrim((string) $config['site_url'], '/') . '/' . ltrim($path, '/');
}

function asset(string $path): string
{
    return 'assets/' . ltrim($path, '/');
}

function image_picture(string $name, string $alt, string $class = '', bool $lazy = true): string
{
    $sizes = [
        'abbrucharbeiten' => [1600, 2133],
        'erd-und-pflanzarbeiten' => [1600, 2133],
        'gartengestaltung' => [1600, 2585],
        'gartenpflege' => [1600, 2133],
        'natursteinmauern' => [1600, 1200],
        'pflasterarbeiten' => [1600, 1200],
        'pool-und-teichbau' => [1600, 2133],
        'sichtschutz' => [1600, 2133],
        'terrassen' => [1600, 2133],
        'logo-hysenaj-galabau' => [630, 166],
    ];
    [$width, $height] = $sizes[$name] ?? [1200, 800];
    $loading = $lazy ? ' loading="lazy"' : ' fetchpriority="high"';
    return '<picture><source srcset="' . e(asset("images/$name.webp")) . '" type="image/webp"><img class="' . e($class) . '" src="' . e(asset("images/$name.jpg")) . '" alt="' . e($alt) . '" width="' . $width . '" height="' . $height . '"' . $loading . '></picture>';
}

function csrf_token(string $form): string
{
    if (empty($_SESSION['csrf'][$form])) {
        $_SESSION['csrf'][$form] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf'][$form];
}

function csrf_valid(string $form, string $token): bool
{
    return isset($_SESSION['csrf'][$form]) && hash_equals($_SESSION['csrf'][$form], $token);
}

function clean_text(string $value, int $max = 1000): string
{
    $value = trim(preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/u', '', $value) ?? '');
    return function_exists('mb_substr') ? mb_substr($value, 0, $max, 'UTF-8') : substr($value, 0, $max);
}

function has_header_injection(string $value): bool
{
    return preg_match('/[\r\n]/', $value) === 1;
}

function send_site_mail(string $subject, array $fields, ?array $attachment = null): bool
{
    global $config;
    $to = (string) $config['mail_to'];
    $from = (string) $config['mail_from'];
    $safeSubject = str_replace(["\r", "\n"], '', (string) $config['mail_subject_prefix'] . ' - ' . $subject);
    $body = "Neue Nachricht über die Webseite:\n\n";
    foreach ($fields as $label => $value) {
        $body .= $label . ': ' . $value . "\n";
    }
    $body .= "\nGesendet am: " . date('d.m.Y H:i') . "\n";

    if ($attachment && is_readable($attachment['tmp_name'])) {
        $boundary = 'b' . bin2hex(random_bytes(16));
        $headers = "From: Hysenaj Galabau <{$from}>\r\n";
        $headers .= "MIME-Version: 1.0\r\nContent-Type: multipart/mixed; boundary=\"{$boundary}\"\r\n";
        $message = "--{$boundary}\r\nContent-Type: text/plain; charset=UTF-8\r\nContent-Transfer-Encoding: 8bit\r\n\r\n{$body}\r\n";
        $fileData = chunk_split(base64_encode((string) file_get_contents($attachment['tmp_name'])));
        $fileName = preg_replace('/[^a-zA-Z0-9._-]/', '_', $attachment['name']);
        $message .= "--{$boundary}\r\nContent-Type: application/octet-stream; name=\"{$fileName}\"\r\nContent-Transfer-Encoding: base64\r\nContent-Disposition: attachment; filename=\"{$fileName}\"\r\n\r\n{$fileData}\r\n--{$boundary}--";
        return mail($to, $safeSubject, $message, $headers);
    }

    $headers = "From: Hysenaj Galabau <{$from}>\r\nReply-To: {$from}\r\nContent-Type: text/plain; charset=UTF-8\r\n";
    return mail($to, $safeSubject, $body, $headers);
}

function page_meta(string $key): array
{
    global $pages;
    $file = current_page();
    $meta = $pages[$file] ?? $pages['index.php'];
    return ['title' => $meta['title'] . ' | Hysenaj Galabau', 'description' => $meta['description']];
}
