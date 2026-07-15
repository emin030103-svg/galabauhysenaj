<?php
$pageTitle = 'Kontakt';
$pageDescription = 'Kontaktieren Sie Hysenaj Galabau in Heilbronn telefonisch, per E-Mail oder über das sichere Kontaktformular.';
$activePage = 'kontakt';
require_once __DIR__ . '/includes/functions.php';

$errors = [];
$success = false;
$values = ['name' => '', 'email' => '', 'phone' => '', 'address' => '', 'subject' => '', 'company' => '', 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($values as $key => $_) {
        $values[$key] = clean_text((string) ($_POST[$key] ?? ''), 1500);
    }
    $started = (int) ($_POST['form_started'] ?? 0);
    if (!csrf_valid('contact', (string) ($_POST['csrf'] ?? ''))) {
        $errors[] = 'Die Sicherheitsprüfung ist fehlgeschlagen. Bitte laden Sie die Seite neu.';
    }
    if (!empty($_POST['website'])) {
        $errors[] = 'Die Anfrage konnte nicht verarbeitet werden.';
    }
    if ($started === 0 || time() - $started < 3) {
        $errors[] = 'Bitte prüfen Sie Ihre Eingaben und senden Sie das Formular erneut.';
    }
    foreach (['name' => 'Name', 'email' => 'E-Mail-Adresse', 'subject' => 'Betreff', 'message' => 'Nachricht'] as $field => $label) {
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
    if (!$errors) {
        $success = send_site_mail('Kontaktanfrage: ' . $values['subject'], [
            'Name' => $values['name'],
            'E-Mail' => $values['email'],
            'Telefon' => $values['phone'],
            'Adresse' => $values['address'],
            'Unternehmen' => $values['company'],
            'Betreff' => $values['subject'],
            'Nachricht' => $values['message'],
        ]);
        if ($success) {
            $values = array_fill_keys(array_keys($values), '');
        } else {
            $errors[] = 'Die Nachricht konnte nicht versendet werden. Bitte kontaktieren Sie uns direkt per E-Mail.';
        }
    }
}

require __DIR__ . '/includes/header.php';
?>
<main id="main">
    <section class="page-hero">
      <div class="hero-media"><?= image_picture('gartenpflege', 'Kontakt zu Hysenaj Galabau', '', false) ?></div>
      <div class="container hero-panel">
        <nav class="breadcrumb" aria-label="Breadcrumb"><a href="index.php">Startseite</a><span>Kontakt</span></nav>
        <p class="eyebrow">Anfrage</p>
        <h1>Kontakt</h1>
        <p>Rufen Sie uns an, schreiben Sie eine E-Mail oder nutzen Sie das Kontaktformular.</p>
      </div>
    </section>
    <section class="section">
      <div class="container form-layout">
        <aside class="contact-card contact-card-light">
          <h2>Direkter Kontakt</h2>
          <a class="contact-phone" href="tel:+4915155605621">+49 151 55605621</a>
          <a href="mailto:galabau.hysenaj@gmail.com">galabau.hysenaj@gmail.com</a>
          <p>Mönchseestrasse 24<br>74072 Heilbronn</p>
          <p>Mo-Fr 07:00-17:00 Uhr<br>Sa 07:00-12:30 Uhr</p>
          <p>Nach Eingang Ihrer Anfrage melden wir uns persönlich zur Abstimmung des nächsten Schritts.</p>
        </aside>
        <form class="form-panel" method="post" action="kontakt.php" novalidate>
          <h2>Kontaktformular</h2>
          <?php if ($success): ?><div class="notice success">Vielen Dank. Ihre Anfrage wurde versendet.</div><?php endif; ?>
          <?php if ($errors): ?><div class="notice error"><strong>Bitte prüfen:</strong><ul><?php foreach ($errors as $error): ?><li><?= e($error) ?></li><?php endforeach; ?></ul></div><?php endif; ?>
          <input type="hidden" name="csrf" value="<?= e(csrf_token('contact')) ?>">
          <input type="hidden" name="form_started" value="<?= time() ?>">
          <label class="hp">Webseite <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
          <div class="form-grid">
            <label>Name<input required name="name" value="<?= e($values['name']) ?>" autocomplete="name"></label>
            <label>E-Mail-Adresse<input required type="email" name="email" value="<?= e($values['email']) ?>" autocomplete="email"></label>
            <label>Telefonnummer<input name="phone" value="<?= e($values['phone']) ?>" autocomplete="tel"></label>
            <label>Adresse<input name="address" value="<?= e($values['address']) ?>" autocomplete="street-address"></label>
            <label>Betreff<input required name="subject" value="<?= e($values['subject']) ?>"></label>
            <label>Unternehmen, optional<input name="company" value="<?= e($values['company']) ?>" autocomplete="organization"></label>
          </div>
          <label>Nachricht<textarea required name="message" rows="6"><?= e($values['message']) ?></textarea></label>
          <label class="checkbox"><input required type="checkbox" name="privacy" value="1"> Ich habe die <a href="datenschutz.php">Datenschutzhinweise</a> zur Kenntnis genommen.</label>
          <button class="btn btn-primary" type="submit">Anfrage senden</button>
        </form>
      </div>
    </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
