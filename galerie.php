<?php
$pageTitle = 'Galerie';
$pageDescription = 'Hysenaj Galabau in Heilbronn.';
require __DIR__ . '/includes/header.php';
?>
<main id="main">
    <section class="sub-hero service-hero">
      <div class="sub-hero-bg"><picture><source srcset="assets/images/natursteinmauern.webp" type="image/webp"><img src="assets/images/natursteinmauern.jpg" alt="Referenzen" fetchpriority="high"></picture></div>
      <div class="container sub-hero-content">
        <nav class="breadcrumb" aria-label="Breadcrumb"><a href="index.php">Startseite</a><span>Referenzen</span></nav>
        <p class="eyebrow">Galerie</p>
        <h1>Referenzen</h1>
        <p>Echte vorhandene Projektbilder aus den lokalen Bilddateien der Webseite.</p>
      </div>
    </section>
    <section class="section section-muted">
      <div class="container gallery-toolbar" aria-label="Galerie filtern"><button type="button" class="filter-btn active" data-filter="all">Alle</button><button type="button" class="filter-btn" data-filter="gartengestaltung">Gartengestaltung</button><button type="button" class="filter-btn" data-filter="pflasterarbeiten">Pflasterarbeiten</button><button type="button" class="filter-btn" data-filter="terrassen">Terrassen</button><button type="button" class="filter-btn" data-filter="naturstein">Naturstein</button><button type="button" class="filter-btn" data-filter="gartenpflege">Gartenpflege</button><button type="button" class="filter-btn" data-filter="pool-und-teich">Pool und Teich</button><button type="button" class="filter-btn" data-filter="sichtschutz">Sichtschutz</button><button type="button" class="filter-btn" data-filter="erdarbeiten">Erdarbeiten</button></div>
      <div class="container gallery-grid gallery-filter-grid"><a class="gallery-item" href="assets/images/gartengestaltung.jpg" data-lightbox data-category="gartengestaltung" data-caption="Gartengestaltung in Heilbronn">
          <picture><source srcset="assets/images/gartengestaltung.webp" type="image/webp"><img src="assets/images/gartengestaltung.jpg" alt="Individuelle Gartengestaltung" loading="lazy"></picture>
          <span>Gartengestaltung in Heilbronn</span>
        </a>
        <a class="gallery-item" href="assets/images/pflasterarbeiten.jpg" data-lightbox data-category="pflasterarbeiten" data-caption="Pflasterarbeiten für Wege und Einfahrten">
          <picture><source srcset="assets/images/pflasterarbeiten.webp" type="image/webp"><img src="assets/images/pflasterarbeiten.jpg" alt="Pflasterarbeiten" loading="lazy"></picture>
          <span>Pflasterarbeiten für Wege und Einfahrten</span>
        </a>
        <a class="gallery-item" href="assets/images/terrassen.jpg" data-lightbox data-category="terrassen" data-caption="Terrassengestaltung im Außenbereich">
          <picture><source srcset="assets/images/terrassen.webp" type="image/webp"><img src="assets/images/terrassen.jpg" alt="Terrassen" loading="lazy"></picture>
          <span>Terrassengestaltung im Außenbereich</span>
        </a>
        <a class="gallery-item" href="assets/images/natursteinmauern.jpg" data-lightbox data-category="naturstein" data-caption="Natursteinmauer und Einfassung">
          <picture><source srcset="assets/images/natursteinmauern.webp" type="image/webp"><img src="assets/images/natursteinmauern.jpg" alt="Naturstein" loading="lazy"></picture>
          <span>Natursteinmauer und Einfassung</span>
        </a>
        <a class="gallery-item" href="assets/images/gartenpflege.jpg" data-lightbox data-category="gartenpflege" data-caption="Gepflegte Gartenanlage">
          <picture><source srcset="assets/images/gartenpflege.webp" type="image/webp"><img src="assets/images/gartenpflege.jpg" alt="Gartenpflege" loading="lazy"></picture>
          <span>Gepflegte Gartenanlage</span>
        </a>
        <a class="gallery-item" href="assets/images/pool-und-teichbau.jpg" data-lightbox data-category="pool-und-teich" data-caption="Pool- und Teichbau im Garten">
          <picture><source srcset="assets/images/pool-und-teichbau.webp" type="image/webp"><img src="assets/images/pool-und-teichbau.jpg" alt="Pool und Teich" loading="lazy"></picture>
          <span>Pool- und Teichbau im Garten</span>
        </a>
        <a class="gallery-item" href="assets/images/sichtschutz.jpg" data-lightbox data-category="sichtschutz" data-caption="Sichtschutz für private Außenbereiche">
          <picture><source srcset="assets/images/sichtschutz.webp" type="image/webp"><img src="assets/images/sichtschutz.jpg" alt="Sichtschutz" loading="lazy"></picture>
          <span>Sichtschutz für private Außenbereiche</span>
        </a>
        <a class="gallery-item" href="assets/images/erd-und-pflanzarbeiten.jpg" data-lightbox data-category="erdarbeiten" data-caption="Erd- und Pflanzarbeiten">
          <picture><source srcset="assets/images/erd-und-pflanzarbeiten.webp" type="image/webp"><img src="assets/images/erd-und-pflanzarbeiten.jpg" alt="Erdarbeiten" loading="lazy"></picture>
          <span>Erd- und Pflanzarbeiten</span>
        </a>
        <a class="gallery-item" href="assets/images/abbrucharbeiten.jpg" data-lightbox data-category="erdarbeiten" data-caption="Rückbau und Vorbereitung">
          <picture><source srcset="assets/images/abbrucharbeiten.webp" type="image/webp"><img src="assets/images/abbrucharbeiten.jpg" alt="Abbrucharbeiten" loading="lazy"></picture>
          <span>Rückbau und Vorbereitung</span>
        </a></div>
    </section>
  </main>
<?php require __DIR__ . '/includes/footer.php'; ?>
