<?php
$pageTitle = 'Kontakt aufnehmen | Hysenaj Galabau';
$pageDescription = 'Kontakt zu Hysenaj Galabau in Heilbronn: Anfrage zu Gartengestaltung, Pflasterarbeiten, Terrassenbau, Gartenpflege und Au?enanlagen senden.';
$activePage = 'kontakt';
require_once __DIR__ . '/includes/functions.php';

$errors = [];
$success = false;
$values = ['name' => '', 'email' => '', 'phone' => '', 'project_location' => '', 'service' => '', 'message' => ''];
$services = ['Gartengestaltung', 'Pflasterarbeiten', 'Terrassenbau', 'Gartenpflege', 'Natursteinmauern', 'Erd- und Pflanzarbeiten', 'Pool- und Teichbau', 'Sichtschutz', 'Abbrucharbeiten', 'Sonstiges'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($values as $key => $_) {
        $values[$key] = clean_text((string) ($_POST[$key] ?? ''), 1500);
    }
    $started = (int) ($_POST['form_started'] ?? 0);
    if (!csrf_valid('contact', (string) ($_POST['csrf'] ?? ''))) {
        $errors[] = 'Die Sicherheitspr?fung ist fehlgeschlagen. Bitte laden Sie die Seite neu.';
    }
    if (!empty($_POST['website'])) {
        $errors[] = 'Die Anfrage konnte nicht verarbeitet werden.';
    }
    if ($started === 0 || time() - $started < 3) {
        $errors[] = 'Bitte pr?fen Sie Ihre Eingaben und senden Sie das Formular erneut.';
    }
    foreach (['name' => 'Name', 'email' => 'E-Mail-Adresse', 'service' => 'gew?nschte Leistung', 'message' => 'Nachricht'] as $field => $label) {
        if ($values[$field] === '') {
            $errors[] = 'Bitte f?llen Sie das Feld ' . $label . ' aus.';
        }
    }
    if (!filter_var($values['email'], FILTER_VALIDATE_EMAIL) || has_header_injection($values['email'])) {
        $errors[] = 'Bitte geben Sie eine g?ltige E-Mail-Adresse ein.';
    }
    if (empty($_POST['privacy'])) {
        $errors[] = 'Bitte best?tigen Sie die Datenschutzerkl?rung.';
    }
    if (!$errors) {
        $success = send_site_mail('Kontaktanfrage: ' . $values['service'], [
            'Name' => $values['name'],
            'E-Mail' => $values['email'],
            'Telefon' => $values['phone'],
            'Ort oder Adresse des Projekts' => $values['project_location'],
            'Gew?nschte Leistung' => $values['service'],
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
        <p class="eyebrow">Kontakt</p>
        <h1>Lassen Sie uns ?ber Ihr Projekt sprechen.</h1>
        <p>Sie planen eine neue Gartenanlage, eine Terrasse, Pflasterarbeiten oder ben?tigen Unterst?tzung bei der Pflege Ihrer Au?enanlage? Beschreiben Sie uns kurz Ihr Vorhaben. Hilfreich sind Angaben zum Standort, zur gew?nschten Leistung und zum geplanten Umfang.</p>
      </div>
    </section>

    <section class="section">
      <div class="container section-head"><div><p class="eyebrow">Direkter Kontakt</p><h2>So erreichen Sie uns</h2></div></div>
      <div class="container contact-method-grid">
        <article class="info-card"><h3>Telefon</h3><p>Sie m?chten Ihr Vorhaben direkt besprechen? Rufen Sie uns w?hrend unserer ?ffnungszeiten an.</p><a class="contact-value" href="tel:+4915155605621">+49 151 55605621</a><a class="btn btn-primary" href="tel:+4915155605621">Jetzt anrufen</a></article>
        <article class="info-card"><h3>E-Mail</h3><p>Senden Sie uns Ihre Anfrage und die wichtigsten Informationen zu Ihrem Projekt per E-Mail.</p><a class="contact-value" href="mailto:galabau.hysenaj@gmail.com">galabau.hysenaj@gmail.com</a><a class="btn btn-primary" href="mailto:galabau.hysenaj@gmail.com">E-Mail schreiben</a></article>
        <article class="info-card"><h3>Standort</h3><p>Hysenaj Galabau<br>M?nchseestrasse 24<br>74072 Heilbronn</p><a class="btn btn-primary" href="https://www.google.com/maps/dir/?api=1&destination=M%C3%B6nchseestrasse%2024%2C%2074072%20Heilbronn" target="_blank" rel="noopener">Route ?ffnen</a></article>
        <article class="info-card"><h3>?ffnungszeiten</h3><p>Montag bis Freitag: 07:00-17:00 Uhr<br>Samstag: 07:00-12:30 Uhr<br>Sonntag: geschlossen</p></article>
      </div>
    </section>

    <section class="section section-muted">
      <div class="container form-layout contact-form-layout">
        <div>
          <p class="eyebrow">Anfrage</p>
          <h2>Unverbindliche Anfrage senden</h2>
          <p>Teilen Sie uns mit, welche Arbeiten Sie planen. Die Anfrage ist unverbindlich; Bilder oder weitere Informationen k?nnen Sie anschlie?end direkt per E-Mail senden.</p>
          <ul class="form-hints"><li>Einsatzgebiet: Heilbronn und Umgebung</li><li>Hilfreich: Projektort, gew?nschte Leistung und ungef?hrer Umfang</li><li>R?ckmeldung pers?nlich per Telefon oder E-Mail</li></ul>
        </div>
        <form class="form-panel" method="post" action="kontakt.php" novalidate>
          <?php if ($success): ?><div class="notice success">Vielen Dank. Ihre Anfrage wurde versendet.</div><?php endif; ?>
          <?php if ($errors): ?><div class="notice error"><strong>Bitte pr?fen:</strong><ul><?php foreach ($errors as $error): ?><li><?= e($error) ?></li><?php endforeach; ?></ul></div><?php endif; ?>
          <p class="required-note">Pflichtfelder sind mit ?erforderlich? gekennzeichnet.</p>
          <input type="hidden" name="csrf" value="<?= e(csrf_token('contact')) ?>">
          <input type="hidden" name="form_started" value="<?= time() ?>">
          <label class="hp">Webseite <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
          <div class="form-grid">
            <label>Name <span>erforderlich</span><input required name="name" value="<?= e($values['name']) ?>" autocomplete="name"></label>
            <label>E-Mail-Adresse <span>erforderlich</span><input required type="email" name="email" value="<?= e($values['email']) ?>" autocomplete="email"></label>
            <label>Telefonnummer<input name="phone" value="<?= e($values['phone']) ?>" autocomplete="tel"></label>
            <label>Ort oder Adresse des Projekts<input name="project_location" value="<?= e($values['project_location']) ?>" autocomplete="street-address"></label>
          </div>
          <label>Gew?nschte Leistung <span>erforderlich</span><select required name="service"><option value="">Bitte ausw?hlen</option><?php foreach ($services as $service): ?><option<?= $values['service'] === $service ? ' selected' : '' ?>><?= e($service) ?></option><?php endforeach; ?></select></label>
          <label>Nachricht <span>erforderlich</span><textarea required name="message" rows="6" aria-describedby="contact-message-help"><?= e($values['message']) ?></textarea></label>
          <p class="field-help" id="contact-message-help">Beschreiben Sie kurz, welche Arbeiten geplant sind, wo sich das Projekt befindet und wann die Umsetzung ungef?hr erfolgen soll.</p>
          <div class="form-consent">
            <input required type="checkbox" id="contact-privacy" name="privacy" value="1">
            <label for="contact-privacy">Ich habe die <a href="datenschutz.php">Datenschutzerkl?rung</a> gelesen und stimme der Verarbeitung meiner Angaben zur Bearbeitung meiner Anfrage zu.</label>
          </div>
          <button class="btn btn-primary" type="submit">Anfrage senden</button>
        </form>
      </div>
    </section>

    <section class="section">
      <div class="container map-grid route-only">
        <div><p class="eyebrow">Anfahrt</p><h2>So finden Sie uns</h2><p>Unser Betrieb befindet sich in Heilbronn. ?ber den folgenden Link k?nnen Sie die Route direkt in Google Maps ?ffnen.</p></div>
        <div class="info-card route-card"><h3>Hysenaj Galabau</h3><p>M?nchseestrasse 24<br>74072 Heilbronn</p><a class="btn btn-primary" href="https://www.google.com/maps/dir/?api=1&destination=M%C3%B6nchseestrasse%2024%2C%2074072%20Heilbronn" target="_blank" rel="noopener">Route in Google Maps ?ffnen</a></div>
      </div>
    </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
