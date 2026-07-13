<?php
$pageTitle = 'Seite nicht gefunden';
$pageDescription = 'Die angeforderte Seite wurde nicht gefunden.';
$activePage = 'none';
require __DIR__ . '/includes/header.php';
?>
<main id="main">
    <section class="page-hero">
      <div class="hero-media"><picture><source srcset="assets/images/sichtschutz.webp" type="image/webp"><img src="assets/images/sichtschutz.jpg" alt="Seite nicht gefunden" width="1600" height="2133" fetchpriority="high"></picture></div>
      <div class="container hero-panel">
        <nav class="breadcrumb" aria-label="Breadcrumb"><a href="index.php">Startseite</a><span>Seite nicht gefunden</span></nav>
        <p class="eyebrow">404</p>
        <h1>Seite nicht gefunden</h1>
        <p>Die angeforderte Seite konnte nicht gefunden werden.</p>
      </div>
    </section><section class="section"><div class="container"><a class="btn btn-primary" href="index.php">Zur Startseite</a></div></section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
