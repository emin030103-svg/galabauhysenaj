<?php
require_once __DIR__ . '/includes/functions.php';

$errors = [];
$success = false;
$values = ['first_name' => '', 'last_name' => '', 'birthdate' => '', 'address' => '', 'mobile' => '', 'position' => '', 'start_date' => '', 'email' => '', 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $values = array_map(fn($v) => clean_text((string) $v, 1500), array_merge($values, $_POST));
    $started = (int) ($_POST['form_started'] ?? 0);
    $file = $_FILES['resume'] ?? null;

    if (!csrf_valid('application', (string) ($_POST['csrf'] ?? ''))) {
        $errors[] = 'Die Sicherheitsprüfung ist fehlgeschlagen. Bitte laden Sie die Seite neu.';
    }
    if (!empty($_POST['website'])) {
        $errors[] = 'Die Bewerbung konnte nicht verarbeitet werden.';
    }
    if ($started === 0 || time() - $started < 4) {
        $errors[] = 'Bitte prüfen Sie Ihre Eingaben und senden Sie das Formular erneut.';
    }
    foreach (['first_name' => 'Vorname', 'last_name' => 'Nachname', 'birthdate' => 'Geburtsdatum', 'mobile' => 'Mobilnummer', 'position' => 'gewünschte Arbeitsstelle', 'start_date' => 'frühestes Startdatum'] as $field => $label) {
        if ($values[$field] === '') {
            $errors[] = 'Bitte füllen Sie das Feld ' . $label . ' aus.';
        }
    }
    if (!filter_var($values['email'], FILTER_VALIDATE_EMAIL) || has_header_injection($values['email'])) {
        $errors[] = 'Bitte geben Sie eine gültige E-Mail-Adresse ein.';
    }
    if (empty($_POST['privacy'])) {
        $errors[] = 'Bitte stimmen Sie der Datenschutzerklärung zu.';
    }
    if (!$file || ($file['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) {
        $errors[] = 'Bitte laden Sie Ihren Lebenslauf als PDF, DOC oder DOCX hoch.';
    } else {
        $maxSize = 5 * 1024 * 1024;
        $ext = strtolower(pathinfo((string) $file['name'], PATHINFO_EXTENSION));
        $allowedExt = ['pdf', 'doc', 'docx'];
        $allowedMime = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mime = $finfo->file((string) $file['tmp_name']) ?: '';
        if (!in_array($ext, $allowedExt, true) || !in_array($mime, $allowedMime, true)) {
            $errors[] = 'Erlaubt sind nur PDF-, DOC- oder DOCX-Dateien.';
        }
        if ((int) $file['size'] > $maxSize) {
            $errors[] = 'Die Datei darf maximal 5 MB groß sein.';
        }
    }

    if (!$errors) {
        $success = send_site_mail('Bewerbung', [
            'Vorname' => $values['first_name'],
            'Nachname' => $values['last_name'],
            'Geburtsdatum' => $values['birthdate'],
            'Adresse' => $values['address'],
            'Mobilnummer' => $values['mobile'],
            'Gewünschte Arbeitsstelle' => $values['position'],
            'Frühestes Startdatum' => $values['start_date'],
            'E-Mail' => $values['email'],
            'Nachricht' => $values['message'],
        ], $file);
        if (!$success) {
            $errors[] = 'Die Bewerbung konnte nicht versendet werden. Bitte kontaktieren Sie uns direkt per E-Mail.';
        } else {
            $values = array_fill_keys(array_keys($values), '');
        }
    }
}

require __DIR__ . '/includes/header.php';
?>
<main id="main">
    <section class="page-hero">
        <div class="container narrow">
            <p class="eyebrow">Bewerbung</p>
            <h1>Werden Sie Teil von Hysenaj Galabau.</h1>
            <p>Wir möchten Menschen in ihren Häusern und Gemeinden mehr Raum geben, um der Natur näher zu sein. Sie können mitmachen.</p>
        </div>
    </section>
    <section class="section">
        <div class="container form-layout">
            <aside class="contact-card">
                <h2>Bewerbungshinweis</h2>
                <p>Lebensläufe werden als Anhang per E-Mail versendet und nicht dauerhaft öffentlich im Webverzeichnis gespeichert.</p>
                <p>Erlaubte Dateitypen: PDF, DOC, DOCX. Maximale Größe: 5 MB.</p>
            </aside>
            <form class="form-panel" method="post" action="bewerbung.php" enctype="multipart/form-data" novalidate>
                <h2>Bewerbungsformular</h2>
                <?php if ($success): ?><div class="notice success">Vielen Dank für Ihre Bewerbung.</div><?php endif; ?>
                <?php if ($errors): ?><div class="notice error"><strong>Bitte prüfen:</strong><ul><?php foreach ($errors as $error): ?><li><?= e($error) ?></li><?php endforeach; ?></ul></div><?php endif; ?>
                <input type="hidden" name="csrf" value="<?= e(csrf_token('application')) ?>">
                <input type="hidden" name="form_started" value="<?= time() ?>">
                <label class="hp">Webseite <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
                <div class="form-grid">
                    <label>Vorname* <input required name="first_name" value="<?= e($values['first_name']) ?>" autocomplete="given-name"></label>
                    <label>Nachname* <input required name="last_name" value="<?= e($values['last_name']) ?>" autocomplete="family-name"></label>
                    <label>Geburtsdatum* <input required type="date" name="birthdate" value="<?= e($values['birthdate']) ?>"></label>
                    <label>Adresse <input name="address" value="<?= e($values['address']) ?>" autocomplete="street-address"></label>
                    <label>Mobilnummer* <input required name="mobile" value="<?= e($values['mobile']) ?>" autocomplete="tel"></label>
                    <label>Gewünschte Arbeitsstelle* <input required name="position" value="<?= e($values['position']) ?>"></label>
                    <label>Frühestes Startdatum* <input required type="date" name="start_date" value="<?= e($values['start_date']) ?>"></label>
                    <label>E-Mail-Adresse* <input required type="email" name="email" value="<?= e($values['email']) ?>" autocomplete="email"></label>
                </div>
                <label>Nachricht <textarea name="message" rows="6"><?= e($values['message']) ?></textarea></label>
                <label>Lebenslauf* <input required type="file" name="resume" accept=".pdf,.doc,.docx,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"></label>
                <label class="checkbox"><input required type="checkbox" name="privacy" value="1"> Ich habe die <a href="datenschutz.php">Datenschutzerklärung</a> zur Kenntnis genommen.</label>
                <button class="btn primary" type="submit">Bewerben</button>
            </form>
        </div>
    </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
