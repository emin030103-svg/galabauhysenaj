<?php
require_once __DIR__ . '/includes/functions.php';

$errors = [];
$success = false;
$values = ['name' => '', 'email' => '', 'phone' => '', 'address' => '', 'subject' => '', 'company' => '', 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $values = array_map(fn($v) => clean_text((string) $v, 1500), array_merge($values, $_POST));
    $started = (int) ($_POST['form_started'] ?? 0);

    if (!csrf_valid('contact', (string) ($_POST['csrf'] ?? ''))) {
        $errors[] = 'Die Sicherheitsprüfung ist fehlgeschlagen. Bitte laden Sie die Seite neu.';
    }
    if (!empty($_POST['website'])) {
        $errors[] = 'Die Nachricht konnte nicht verarbeitet werden.';
    }
    if ($started === 0 || time() - $started < 4) {
        $errors[] = 'Bitte prüfen Sie Ihre Eingaben und senden Sie das Formular erneut.';
    }
    if ($values['name'] === '') {
        $errors[] = 'Bitte geben Sie Ihren Namen ein.';
    }
    if (!filter_var($values['email'], FILTER_VALIDATE_EMAIL) || has_header_injection($values['email'])) {
        $errors[] = 'Bitte geben Sie eine gültige E-Mail-Adresse ein.';
    }
    if ($values['message'] === '') {
        $errors[] = 'Bitte schreiben Sie eine Nachricht.';
    }
    if (empty($_POST['privacy'])) {
        $errors[] = 'Bitte stimmen Sie der Datenschutzerklärung zu.';
    }

    if (!$errors) {
        $success = send_site_mail($values['subject'] ?: 'Kontaktanfrage', [
            'Name' => $values['name'],
            'E-Mail' => $values['email'],
            'Telefon' => $values['phone'],
            'Adresse' => $values['address'],
            'Unternehmen' => $values['company'],
            'Betreff' => $values['subject'],
            'Nachricht' => $values['message'],
        ]);
        if (!$success) {
            $errors[] = 'Die Nachricht konnte nicht versendet werden. Bitte kontaktieren Sie uns direkt per Telefon oder E-Mail.';
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
            <p class="eyebrow">Kontakt</p>
            <h1>Wir beraten Sie gerne.</h1>
            <p><?= e($company['street']) ?>, <?= e($company['postal_city']) ?> · <a href="tel:<?= e($company['phone_href']) ?>"><?= e($company['phone_display']) ?></a> · <a href="mailto:<?= e($company['email']) ?>"><?= e($company['email']) ?></a></p>
        </div>
    </section>
    <section class="section">
        <div class="container form-layout">
            <aside class="contact-card">
                <h2>Direktkontakt</h2>
                <p><strong>Adresse</strong><br><?= e($company['street']) ?><br><?= e($company['postal_city']) ?><br><?= e($company['country']) ?></p>
                <p><strong>Telefon</strong><br><a href="tel:<?= e($company['phone_href']) ?>"><?= e($company['phone_display']) ?></a></p>
                <p><strong>E-Mail</strong><br><a href="mailto:<?= e($company['email']) ?>"><?= e($company['email']) ?></a></p>
                <p><strong>Öffnungszeiten</strong><br>Mo-Fr 07:00-17:00 Uhr<br>Sa 07:00-12:30 Uhr<br>So geschlossen</p>
            </aside>
            <form class="form-panel" method="post" action="kontakt.php" novalidate>
                <h2>Kontaktformular</h2>
                <?php if ($success): ?><div class="notice success">Vielen Dank. Ihre Nachricht wurde übermittelt.</div><?php endif; ?>
                <?php if ($errors): ?><div class="notice error"><strong>Bitte prüfen:</strong><ul><?php foreach ($errors as $error): ?><li><?= e($error) ?></li><?php endforeach; ?></ul></div><?php endif; ?>
                <input type="hidden" name="csrf" value="<?= e(csrf_token('contact')) ?>">
                <input type="hidden" name="form_started" value="<?= time() ?>">
                <label class="hp">Webseite <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
                <div class="form-grid">
                    <label>Name* <input required name="name" value="<?= e($values['name']) ?>" autocomplete="name"></label>
                    <label>E-Mail-Adresse* <input required type="email" name="email" value="<?= e($values['email']) ?>" autocomplete="email"></label>
                    <label>Telefonnummer <input name="phone" value="<?= e($values['phone']) ?>" autocomplete="tel"></label>
                    <label>Adresse <input name="address" value="<?= e($values['address']) ?>" autocomplete="street-address"></label>
                    <label>Betreff <input name="subject" value="<?= e($values['subject']) ?>"></label>
                    <label>Unternehmen <input name="company" value="<?= e($values['company']) ?>" autocomplete="organization"></label>
                </div>
                <label>Nachricht* <textarea required name="message" rows="7"><?= e($values['message']) ?></textarea></label>
                <label class="checkbox"><input required type="checkbox" name="privacy" value="1"> Ich habe die <a href="datenschutz.php">Datenschutzerklärung</a> zur Kenntnis genommen.</label>
                <button class="btn primary" type="submit">Absenden</button>
            </form>
        </div>
    </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
