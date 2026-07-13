<?php
$pageTitle = 'Karriere';
$pageDescription = 'Bewerben Sie sich bei Hysenaj Galabau in Heilbronn.';
$activePage = 'karriere';
require_once __DIR__ . '/includes/functions.php';

$errors = [];
$success = false;
$values = ['first_name' => '', 'last_name' => '', 'birthdate' => '', 'address' => '', 'mobile' => '', 'position' => '', 'start_date' => '', 'email' => '', 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($values as $key => $_) {
        $values[$key] = clean_text((string) ($_POST[$key] ?? ''), 1500);
    }
    $file = $_FILES['resume'] ?? null;
    $started = (int) ($_POST['form_started'] ?? 0);
    if (!csrf_valid('application', (string) ($_POST['csrf'] ?? ''))) {
        $errors[] = 'Die Sicherheitsprüfung ist fehlgeschlagen. Bitte laden Sie die Seite neu.';
    }
    if (!empty($_POST['website'])) {
        $errors[] = 'Die Bewerbung konnte nicht verarbeitet werden.';
    }
    if ($started === 0 || time() - $started < 3) {
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
        $errors[] = 'Bitte bestätigen Sie die Datenschutzhinweise.';
    }
    if (!$file || ($file['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) {
        $errors[] = 'Bitte laden Sie Ihren Lebenslauf als PDF, DOC oder DOCX hoch.';
    } else {
        $ext = strtolower(pathinfo((string) $file['name'], PATHINFO_EXTENSION));
        $allowedExt = ['pdf', 'doc', 'docx'];
        $allowedMime = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
        $mime = '';
        if (class_exists('finfo')) {
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            $mime = $finfo->file((string) $file['tmp_name']) ?: '';
        }
        if (!in_array($ext, $allowedExt, true) || ($mime !== '' && !in_array($mime, $allowedMime, true))) {
            $errors[] = 'Erlaubt sind ausschließlich PDF-, DOC- oder DOCX-Dateien.';
        }
        if ((int) $file['size'] > 5 * 1024 * 1024) {
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
        if ($success) {
            $values = array_fill_keys(array_keys($values), '');
        } else {
            $errors[] = 'Die Bewerbung konnte nicht versendet werden. Bitte kontaktieren Sie uns direkt per E-Mail.';
        }
    }
}

require __DIR__ . '/includes/header.php';
?>
<main id="main">
    <section class="page-hero">
      <div class="hero-media"><?= image_picture('erd-und-pflanzarbeiten', 'Karriere bei Hysenaj Galabau', '', false) ?></div>
      <div class="container hero-panel">
        <nav class="breadcrumb" aria-label="Breadcrumb"><a href="index.php">Startseite</a><span>Karriere</span></nav>
        <p class="eyebrow">Bewerbung</p>
        <h1>Karriere</h1>
        <p>Werden Sie Teil eines Teams im Garten- und Landschaftsbau in Heilbronn und Umgebung.</p>
      </div>
    </section>
    <section class="section">
      <div class="container form-layout">
        <aside class="contact-card contact-card-light">
          <h2>Bewerbung bei Hysenaj Galabau</h2>
          <p>Mögliche Tätigkeitsbereiche sind Arbeiten im Garten- und Landschaftsbau, Pflege, Pflaster, Erd- und Pflanzarbeiten sowie Unterstützung auf Projekten.</p>
          <ul class="check-list"><li>Arbeiten im eingespielten Team</li><li>Vielfältige Außenprojekte</li><li>Direkte Kontaktmöglichkeit</li></ul>
        </aside>
        <form class="form-panel" method="post" action="bewerbung.php" enctype="multipart/form-data" novalidate>
          <h2>Bewerbungsformular</h2>
          <?php if ($success): ?><div class="notice success">Vielen Dank. Ihre Bewerbung wurde versendet.</div><?php endif; ?>
          <?php if ($errors): ?><div class="notice error"><strong>Bitte prüfen:</strong><ul><?php foreach ($errors as $error): ?><li><?= e($error) ?></li><?php endforeach; ?></ul></div><?php endif; ?>
          <input type="hidden" name="csrf" value="<?= e(csrf_token('application')) ?>">
          <input type="hidden" name="form_started" value="<?= time() ?>">
          <label class="hp">Webseite <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
          <div class="form-grid">
            <label>Vorname<input required name="first_name" value="<?= e($values['first_name']) ?>"></label>
            <label>Nachname<input required name="last_name" value="<?= e($values['last_name']) ?>"></label>
            <label>Geburtsdatum<input required type="date" name="birthdate" value="<?= e($values['birthdate']) ?>"></label>
            <label>Adresse<input name="address" value="<?= e($values['address']) ?>"></label>
            <label>Mobilnummer<input required name="mobile" value="<?= e($values['mobile']) ?>"></label>
            <label>Gewünschte Arbeitsstelle<input required name="position" value="<?= e($values['position']) ?>"></label>
            <label>Frühestes Startdatum<input required type="date" name="start_date" value="<?= e($values['start_date']) ?>"></label>
            <label>E-Mail-Adresse<input required type="email" name="email" value="<?= e($values['email']) ?>"></label>
          </div>
          <label>Nachricht<textarea name="message" rows="6"><?= e($values['message']) ?></textarea></label>
          <label>Lebenslauf<input required type="file" name="resume" accept=".pdf,.doc,.docx,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"></label>
          <label class="checkbox"><input required type="checkbox" name="privacy" value="1"> Ich habe die <a href="datenschutz.php">Datenschutzhinweise</a> zur Kenntnis genommen.</label>
          <button class="btn btn-primary" type="submit">Bewerbung senden</button>
        </form>
      </div>
    </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
