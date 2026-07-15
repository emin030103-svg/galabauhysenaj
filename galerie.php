<?php
$pageTitle = 'Referenzen';
$pageDescription = 'Projektbilder und Referenzen von Hysenaj Galabau.';
$activePage = 'referenzen';
require __DIR__ . '/includes/header.php';
?>
<main id="main">
    <section class="page-hero">
      <div class="hero-media"><picture><source srcset="assets/images/natursteinmauern.webp" type="image/webp"><img src="assets/images/natursteinmauern.jpg" alt="Referenzen" width="1600" height="1200" fetchpriority="high"></picture></div>
      <div class="container hero-panel">
        <nav class="breadcrumb" aria-label="Breadcrumb"><a href="index.php">Startseite</a><span>Referenzen</span></nav>
        <p class="eyebrow">Galerie</p>
        <h1>Referenzen</h1>
        <p>Projektbilder aus den vorhandenen lokalen Bilddateien der Webseite.</p>
      </div>
    </section>
    <section class="section section-muted gallery-system">
      <div class="container section-head"><div><p class="eyebrow">Filter</p><h2>Referenzen nach Kategorie ansehen</h2></div></div>
      <div class="container gallery-toolbar" aria-label="Galerie filtern">
          <button class="filter-btn active" type="button" data-filter="all">Alle</button>
          <button class="filter-btn" type="button" data-filter="gartengestaltung">Gartengestaltung</button>
          <button class="filter-btn" type="button" data-filter="pflasterarbeiten">Pflasterarbeiten</button>
          <button class="filter-btn" type="button" data-filter="terrassen">Terrassen</button>
          <button class="filter-btn" type="button" data-filter="naturstein">Naturstein</button>
          <button class="filter-btn" type="button" data-filter="gartenpflege">Gartenpflege</button>
          <button class="filter-btn" type="button" data-filter="pool-und-teich">Pool und Teich</button>
          <button class="filter-btn" type="button" data-filter="sichtschutz">Sichtschutz</button>
          <button class="filter-btn" type="button" data-filter="erdarbeiten">Erdarbeiten</button>
      </div>
      <p class="container filter-status" data-filter-status>Alle Referenzen werden angezeigt.</p>
      <div class="container gallery-grid gallery-filter-grid"><a class="gallery-item" href="assets/images/gartengestaltung.jpg" data-lightbox data-gallery-card data-category="gartengestaltung" data-caption="Neugestaltung einer Gartenfläche">
          <picture><source srcset="assets/images/gartengestaltung.webp" type="image/webp"><img src="assets/images/gartengestaltung.jpg" alt="Individuelle Gartengestaltung" width="1600" height="2585" loading="lazy"></picture>
          <span>Neugestaltung einer Gartenfläche</span>
        </a>
        <a class="gallery-item" href="assets/images/pflasterarbeiten.jpg" data-lightbox data-gallery-card data-category="pflasterarbeiten" data-caption="Pflasterung einer privaten Außenfläche">
          <picture><source srcset="assets/images/pflasterarbeiten.webp" type="image/webp"><img src="assets/images/pflasterarbeiten.jpg" alt="Pflasterarbeiten" width="1600" height="1200" loading="lazy"></picture>
          <span>Pflasterung einer privaten Außenfläche</span>
        </a>
        <a class="gallery-item" href="assets/images/terrassen.jpg" data-lightbox data-gallery-card data-category="terrassen" data-caption="Anlage eines Terrassenbereichs">
          <picture><source srcset="assets/images/terrassen.webp" type="image/webp"><img src="assets/images/terrassen.jpg" alt="Terrassen" width="1600" height="2133" loading="lazy"></picture>
          <span>Anlage eines Terrassenbereichs</span>
        </a>
        <a class="gallery-item" href="assets/images/natursteinmauern.jpg" data-lightbox data-gallery-card data-category="naturstein" data-caption="Natursteinmauer als Grundstückseinfassung">
          <picture><source srcset="assets/images/natursteinmauern.webp" type="image/webp"><img src="assets/images/natursteinmauern.jpg" alt="Naturstein" width="1600" height="1200" loading="lazy"></picture>
          <span>Natursteinmauer als Grundstückseinfassung</span>
        </a>
        <a class="gallery-item" href="assets/images/gartenpflege.jpg" data-lightbox data-gallery-card data-category="gartenpflege" data-caption="Pflege und Aufbereitung einer Gartenanlage">
          <picture><source srcset="assets/images/gartenpflege.webp" type="image/webp"><img src="assets/images/gartenpflege.jpg" alt="Gartenpflege" width="1600" height="2133" loading="lazy"></picture>
          <span>Pflege und Aufbereitung einer Gartenanlage</span>
        </a>
        <a class="gallery-item" href="assets/images/pool-und-teichbau.jpg" data-lightbox data-gallery-card data-category="pool-und-teich" data-caption="Gestaltung eines Wasserbereichs im Garten">
          <picture><source srcset="assets/images/pool-und-teichbau.webp" type="image/webp"><img src="assets/images/pool-und-teichbau.jpg" alt="Pool und Teich" width="1600" height="2133" loading="lazy"></picture>
          <span>Gestaltung eines Wasserbereichs im Garten</span>
        </a>
        <a class="gallery-item" href="assets/images/sichtschutz.jpg" data-lightbox data-gallery-card data-category="sichtschutz" data-caption="Sichtschutz für einen privaten Außenbereich">
          <picture><source srcset="assets/images/sichtschutz.webp" type="image/webp"><img src="assets/images/sichtschutz.jpg" alt="Sichtschutz" width="1600" height="2133" loading="lazy"></picture>
          <span>Sichtschutz für einen privaten Außenbereich</span>
        </a>
        <a class="gallery-item" href="assets/images/erd-und-pflanzarbeiten.jpg" data-lightbox data-gallery-card data-category="erdarbeiten" data-caption="Vorbereitung von Pflanz- und Gartenflächen">
          <picture><source srcset="assets/images/erd-und-pflanzarbeiten.webp" type="image/webp"><img src="assets/images/erd-und-pflanzarbeiten.jpg" alt="Erdarbeiten" width="1600" height="2133" loading="lazy"></picture>
          <span>Vorbereitung von Pflanz- und Gartenflächen</span>
        </a>
        <a class="gallery-item" href="assets/images/abbrucharbeiten.jpg" data-lightbox data-gallery-card data-category="erdarbeiten" data-caption="Rückbau und Vorbereitung einer Außenfläche">
          <picture><source srcset="assets/images/abbrucharbeiten.webp" type="image/webp"><img src="assets/images/abbrucharbeiten.jpg" alt="Abbrucharbeiten" width="1600" height="2133" loading="lazy"></picture>
          <span>Rückbau und Vorbereitung einer Außenfläche</span>
        </a></div>
    </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
