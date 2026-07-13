<?php
$pageTitle = 'Karriere';
$pageDescription = 'Bewerben Sie sich bei Hysenaj Galabau.';
$activePage = 'karriere';
require __DIR__ . '/includes/header.php';
?>
<main id="main">

    <section class="page-hero">
      <div class="hero-media"><picture><source srcset="assets/images/erd-und-pflanzarbeiten.webp" type="image/webp"><img src="assets/images/erd-und-pflanzarbeiten.jpg" alt="Karriere" fetchpriority="high"></picture></div>
      <div class="container hero-panel">
        <nav class="breadcrumb" aria-label="Breadcrumb"><a href="index.php">Startseite</a><span>Karriere</span></nav>
        <p class="eyebrow">Bewerbung</p>
        <h1>Karriere</h1>
        <p>Werden Sie Teil von Hysenaj Galabau.</p>
      </div>
    </section>
<section class="section"><div class="container form-layout"><aside class="contact-card contact-card-light"><h2>Bewerbung</h2><p>Die statische Version zeigt das Formular als Vorschau. Bewerbungen werden später in der PHP-Version verarbeitet.</p><p>Erlaubte Dateitypen: PDF, DOC, DOCX.</p></aside><form class="form-panel"><div class="form-grid"><label>Vorname<input required></label><label>Nachname<input required></label><label>Mobilnummer<input required></label><label>E-Mail<input type="email" required></label></div><label>Nachricht<textarea rows="6"></textarea></label><label>Lebenslauf<input type="file" accept=".pdf,.doc,.docx"></label><button class="btn btn-primary" type="button">Bewerbung vorbereiten</button></form></div></section>
    <section class="contact-cta">
      <div class="container contact-cta-grid">
        <div><p class="eyebrow">Kostenlose Erstberatung</p><h2>Planen wir Ihr Gartenprojekt gemeinsam.</h2><p>Beschreiben Sie kurz Ihr Vorhaben. Wir melden uns persönlich zurück und beraten Sie in Heilbronn und Umgebung.</p></div>
        <div class="contact-card"><a class="contact-phone" href="tel:+4915155605621">+49 151 55605621</a><a href="mailto:galabau.hysenaj@gmail.com">galabau.hysenaj@gmail.com</a><p>Mönchseestraße 24<br>74072 Heilbronn</p><a class="btn btn-primary" href="kontakt.php">Kontakt aufnehmen</a></div>
      </div>
    </section>
  
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
