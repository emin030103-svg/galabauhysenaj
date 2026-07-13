<?php
$pageTitle = 'Kontakt';
$pageDescription = 'Kontaktieren Sie Hysenaj Galabau in Heilbronn.';
$activePage = 'kontakt';
require __DIR__ . '/includes/header.php';
?>
<main id="main">
    <section class="page-hero">
      <div class="hero-media"><picture><source srcset="assets/images/gartenpflege.webp" type="image/webp"><img src="assets/images/gartenpflege.jpg" alt="Kontakt" fetchpriority="high"></picture></div>
      <div class="container hero-panel">
        <nav class="breadcrumb" aria-label="Breadcrumb"><a href="index.php">Startseite</a><span>Kontakt</span></nav>
        <p class="eyebrow">Anfrage</p>
        <h1>Kontakt</h1>
        <p>Rufen Sie uns an, schreiben Sie eine E-Mail oder nutzen Sie das Kontaktformular.</p>
      </div>
    </section>
    <section class="section">
      <div class="container form-layout">
        <aside class="contact-card contact-card-light"><h2>Direkter Kontakt</h2><a class="contact-phone" href="tel:+4915155605621">+49 151 55605621</a><a href="mailto:galabau.hysenaj@gmail.com">galabau.hysenaj@gmail.com</a><p>Mönchseestraße 24<br>74072 Heilbronn</p><p>Mo-Fr 07:00-17:00 Uhr<br>Sa 07:00-12:30 Uhr</p></aside>
        <form class="form-panel" method="post"><div class="form-grid"><label>Name<input required name="name" autocomplete="name"></label><label>Telefon<input name="phone" autocomplete="tel"></label></div><label>E-Mail<input required type="email" name="email" autocomplete="email"></label><label>Nachricht<textarea required name="message" rows="6"></textarea></label><button class="btn btn-primary" type="submit">Anfrage vorbereiten</button></form>
      </div>
    </section>
    <section class="section section-muted">
      <div class="container map-grid">
        <div><p class="eyebrow">Anfahrt</p><h2>Standort in Heilbronn</h2><p>Hysenaj Galabau<br>Mönchseestraße 24<br>74072 Heilbronn</p><a class="text-link" href="https://www.google.com/maps/dir/?api=1&destination=M%C3%B6nchseestra%C3%9Fe%2024%2C%2074072%20Heilbronn" target="_blank" rel="noopener">Route in Google Maps öffnen</a></div>
        <div class="map-consent" data-map-src="https://www.google.com/maps?q=M%C3%B6nchseestra%C3%9Fe%2024%2C%2074072%20Heilbronn&output=embed"><div class="map-placeholder"><h3>Karte anzeigen</h3><p>Mit dem Laden der Karte akzeptieren Sie die Datenschutzhinweise des Kartenanbieters.</p><button class="btn btn-primary" type="button" data-load-map>Karte laden</button><a href="https://www.google.com/maps/dir/?api=1&destination=M%C3%B6nchseestra%C3%9Fe%2024%2C%2074072%20Heilbronn" target="_blank" rel="noopener">Route in Google Maps öffnen</a></div></div>
      </div>
    </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
