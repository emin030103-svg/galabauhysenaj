<?php
$pageTitle = 'Karriere im Garten- und Landschaftsbau | Hysenaj Galabau';
$pageDescription = 'Bei Hysenaj Galabau in Heilbronn bewerben: Arbeiten im Garten- und Landschaftsbau, Pflaster- und Wegebau, Terrassenbau, Naturstein und Gartenpflege.';
$activePage = 'karriere';
require_once __DIR__ . '/includes/functions.php';

$errors = [];
$success = false;
$values = ['first_name' => '', 'last_name' => '', 'email' => '', 'mobile' => '', 'city' => '', 'position' => '', 'experience' => '', 'start_date' => '', 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($values as $key => $_) {
        $values[$key] = clean_text((string) ($_POST[$key] ?? ''), 1500);
    }
    $file = $_FILES['resume'] ?? null;
    $started = (int) ($_POST['form_started'] ?? 0);
    if (!csrf_valid('application', (string) ($_POST['csrf'] ?? ''))) {
        $errors[] = 'Die Sicherheitspr?fung ist fehlgeschlagen. Bitte laden Sie die Seite neu.';
    }
    if (!empty($_POST['website'])) {
        $errors[] = 'Die Bewerbung konnte nicht verarbeitet werden.';
    }
    if ($started === 0 || time() - $started < 3) {
        $errors[] = 'Bitte pr?fen Sie Ihre Eingaben und senden Sie das Formular erneut.';
    }
    foreach (['first_name' => 'Vorname', 'last_name' => 'Nachname', 'email' => 'E-Mail-Adresse', 'mobile' => 'Mobilnummer'] as $field => $label) {
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
    if ($file && ($file['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_NO_FILE) {
        if (($file['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) {
            $errors[] = 'Der Lebenslauf konnte nicht hochgeladen werden.';
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
                $errors[] = 'Erlaubt sind ausschlie?lich PDF-, DOC- oder DOCX-Dateien.';
            }
            if ((int) $file['size'] > 5 * 1024 * 1024) {
                $errors[] = 'Die Datei darf maximal 5 MB gro? sein.';
            }
        }
    }
    if (!$errors) {
        $success = send_site_mail('Bewerbung bei Hysenaj Galabau', [
            'Vorname' => $values['first_name'],
            'Nachname' => $values['last_name'],
            'E-Mail' => $values['email'],
            'Mobilnummer' => $values['mobile'],
            'Wohnort' => $values['city'],
            'Gew?nschte T?tigkeit' => $values['position'],
            'Berufserfahrung' => $values['experience'],
            'Fr?hestm?glicher Eintrittstermin' => $values['start_date'],
            'Nachricht' => $values['message'],
        ], ($file && ($file['error'] ?? UPLOAD_ERR_NO_FILE) === UPLOAD_ERR_OK) ? $file : null);
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
        <p class="eyebrow">Karriere bei Hysenaj Galabau</p>
        <h1>Gemeinsam Au?enanlagen gestalten.</h1>
        <p>Sie arbeiten gerne im Freien, packen mit an und m?chten abwechslungsreiche Projekte im Garten- und Landschaftsbau umsetzen? Dann freuen wir uns darauf, Sie kennenzulernen.</p>
      </div>
    </section>

    <section class="section">
      <div class="container split-grid">
        <div>
          <p class="eyebrow">Arbeiten bei Hysenaj Galabau</p>
          <h2>Garten- und Landschaftsbau in Heilbronn und Umgebung</h2>
          <p>Hysenaj Galabau ist seit 2009 im Garten- und Landschaftsbau in Heilbronn und Umgebung t?tig. Unsere Arbeiten reichen von Gartengestaltung und Pflasterarbeiten bis zu Terrassen, Natursteinmauern, Erdarbeiten und Gartenpflege. Dabei z?hlt nicht nur das Ergebnis, sondern auch eine zuverl?ssige Zusammenarbeit im Team.</p>
        </div>
        <?= image_picture('gartengestaltung', 'Garten- und Landschaftsbau bei Hysenaj Galabau', 'rounded-img', true) ?>
      </div>
    </section>

    <section class="section section-muted">
      <div class="container section-head"><div><p class="eyebrow">Aufgaben</p><h2>M?gliche Aufgabenbereiche</h2><p>Je nach Erfahrung und Einsatzbereich unterst?tzen Sie unser Team bei verschiedenen Arbeiten auf privaten und gewerblichen Au?enanlagen.</p></div></div>
      <div class="container feature-grid">
        <article class="info-card"><h3>Garten- und Landschaftsbau</h3></article>
        <article class="info-card"><h3>Pflaster- und Wegebau</h3></article>
        <article class="info-card"><h3>Erd- und Pflanzarbeiten</h3></article>
        <article class="info-card"><h3>Terrassenbau</h3></article>
        <article class="info-card"><h3>Natursteinarbeiten</h3></article>
        <article class="info-card"><h3>Gartenpflege</h3></article>
        <article class="info-card"><h3>Allgemeine Baustellenarbeiten</h3></article>
      </div>
    </section>

    <section class="section">
      <div class="container dual-list-grid">
        <article class="info-card"><h2>Was Sie mitbringen sollten</h2><ul class="check-list"><li>Handwerkliches Geschick</li><li>Freude an der Arbeit im Freien</li><li>Zuverl?ssige und sorgf?ltige Arbeitsweise</li><li>Teamf?higkeit</li><li>K?rperliche Belastbarkeit</li><li>Freundliches Auftreten</li><li>Erfahrung im Garten- und Landschaftsbau ist von Vorteil</li></ul></article>
        <article class="info-card"><h2>Was Sie bei uns erwartet</h2><ul class="check-list"><li>Abwechslungsreiche Arbeiten</li><li>Unterschiedliche Garten- und Landschaftsbauprojekte</li><li>Direkte Kommunikation</li><li>Praktische Zusammenarbeit im Team</li><li>Einsatzorte in Heilbronn und Umgebung</li><li>M?glichkeit, vorhandene Erfahrung einzubringen</li></ul></article>
      </div>
    </section>

    <section class="section process-section">
      <div class="container section-head"><div><p class="eyebrow">Bewerbungsablauf</p><h2>So l?uft die Bewerbung ab</h2></div></div>
      <div class="container process-grid process-grid-four">
        <article><span>1</span><h3>Kurzbewerbung senden</h3><p>Senden Sie uns Ihre Kontaktdaten und einige kurze Informationen zu Ihrer Erfahrung.</p></article>
        <article><span>2</span><h3>Pers?nliche R?ckmeldung</h3><p>Wir melden uns pers?nlich und kl?ren offene Fragen zu T?tigkeit und Verf?gbarkeit.</p></article>
        <article><span>3</span><h3>Kennenlernen</h3><p>Bei gegenseitigem Interesse besprechen wir die m?glichen Aufgabenbereiche genauer.</p></article>
        <article><span>4</span><h3>Weiteres Vorgehen</h3><p>Die n?chsten Schritte stimmen wir gemeinsam und passend zur jeweiligen Bewerbung ab.</p></article>
      </div>
    </section>

    <section class="section section-muted">
      <div class="container form-layout contact-form-layout">
        <div>
          <p class="eyebrow">Bewerbung</p>
          <h2>Jetzt bewerben</h2>
          <p>Senden Sie uns Ihre Kontaktdaten und einige kurze Informationen zu Ihrer Erfahrung und gew?nschten T?tigkeit. Eine Initiativbewerbung ist ebenfalls m?glich; vollst?ndige Unterlagen k?nnen Sie auch sp?ter per E-Mail nachreichen.</p>
        </div>
        <form class="form-panel" method="post" action="bewerbung.php" enctype="multipart/form-data" novalidate>
          <?php if ($success): ?><div class="notice success">Vielen Dank. Ihre Bewerbung wurde versendet.</div><?php endif; ?>
          <?php if ($errors): ?><div class="notice error"><strong>Bitte pr?fen:</strong><ul><?php foreach ($errors as $error): ?><li><?= e($error) ?></li><?php endforeach; ?></ul></div><?php endif; ?>
          <p class="required-note">Pflichtfelder sind mit ?erforderlich? gekennzeichnet.</p>
          <input type="hidden" name="csrf" value="<?= e(csrf_token('application')) ?>">
          <input type="hidden" name="form_started" value="<?= time() ?>">
          <label class="hp">Webseite <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
          <div class="form-grid">
            <label>Vorname <span>erforderlich</span><input required name="first_name" value="<?= e($values['first_name']) ?>" autocomplete="given-name"></label>
            <label>Nachname <span>erforderlich</span><input required name="last_name" value="<?= e($values['last_name']) ?>" autocomplete="family-name"></label>
            <label>E-Mail-Adresse <span>erforderlich</span><input required type="email" name="email" value="<?= e($values['email']) ?>" autocomplete="email"></label>
            <label>Mobilnummer <span>erforderlich</span><input required name="mobile" value="<?= e($values['mobile']) ?>" autocomplete="tel"></label>
            <label>Wohnort<input name="city" value="<?= e($values['city']) ?>" autocomplete="address-level2"></label>
            <label>Gew?nschte T?tigkeit<input name="position" value="<?= e($values['position']) ?>"></label>
            <label>Berufserfahrung, optional<input name="experience" value="<?= e($values['experience']) ?>"></label>
            <label>Fr?hestm?glicher Eintrittstermin, optional<input name="start_date" value="<?= e($values['start_date']) ?>"></label>
          </div>
          <label>Nachricht<textarea name="message" rows="6" aria-describedby="application-message-help"><?= e($values['message']) ?></textarea></label>
          <p class="field-help" id="application-message-help">Nennen Sie kurz, f?r welche Arbeiten Sie sich interessieren und ob bereits Erfahrung im Garten- und Landschaftsbau vorhanden ist.</p>
          <label>Lebenslauf, optional<input type="file" name="resume" accept=".pdf,.doc,.docx,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"></label>
          <div class="form-consent">
            <input required type="checkbox" id="application-privacy" name="privacy" value="1">
            <label for="application-privacy">Ich habe die <a href="datenschutz.php">Datenschutzerkl?rung</a> gelesen und stimme der Verarbeitung meiner Bewerbungsdaten zur Durchf?hrung des Bewerbungsverfahrens zu.</label>
          </div>
          <button class="btn btn-primary" type="submit">Bewerbung senden</button>
        </form>
      </div>
    </section>

    <section class="contact-cta career-cta">
      <div class="container contact-cta-grid">
        <div><p class="eyebrow">Direkte Bewerbung</p><h2>Lieber direkt bewerben?</h2><p>Senden Sie Ihre Bewerbung und Ihren Lebenslauf per E-Mail. Bei R?ckfragen erreichen Sie uns auch telefonisch.</p></div>
        <div class="contact-card"><a class="contact-phone" href="tel:+4915155605621">+49 151 55605621</a><a href="mailto:galabau.hysenaj@gmail.com">galabau.hysenaj@gmail.com</a><div class="contact-actions"><a class="btn btn-primary" href="mailto:galabau.hysenaj@gmail.com?subject=Bewerbung%20bei%20Hysenaj%20Galabau">Bewerbung per E-Mail senden</a><a class="btn btn-light" href="tel:+4915155605621">Jetzt anrufen</a></div></div>
      </div>
    </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
