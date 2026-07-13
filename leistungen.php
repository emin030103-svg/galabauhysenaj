<?php
$pageTitle = 'Leistungen';
$pageDescription = 'Hysenaj Galabau in Heilbronn.';
require __DIR__ . '/includes/header.php';
?>
<main id="main">
    <section class="sub-hero service-hero">
      <div class="sub-hero-bg"><picture><source srcset="assets/images/gartengestaltung.webp" type="image/webp"><img src="assets/images/gartengestaltung.jpg" alt="Leistungen" fetchpriority="high"></picture></div>
      <div class="container sub-hero-content">
        <nav class="breadcrumb" aria-label="Breadcrumb"><a href="index.php">Startseite</a><span>Leistungen</span></nav>
        <p class="eyebrow">Übersicht</p>
        <h1>Leistungen</h1>
        <p>Wählen Sie eine Leistung aus und öffnen Sie die passende Detailseite.</p>
      </div>
    </section>
    <section class="section section-muted"><div class="container service-grid"><a class="service-card" id="gartengestaltung" href="leistung-gartengestaltung.php">
          <picture><source srcset="assets/images/gartengestaltung.webp" type="image/webp"><img src="assets/images/gartengestaltung.jpg" alt="Gartengestaltung" loading="lazy"></picture>
          <div><h3>Gartengestaltung</h3><p>Individuelle Gartenkonzepte mit klarer Struktur, passender Bepflanzung und hochwertiger Ausführung.</p><span>Mehr erfahren →</span></div>
        </a>
        <a class="service-card" id="pflasterarbeiten" href="leistung-pflasterarbeiten.php">
          <picture><source srcset="assets/images/pflasterarbeiten.webp" type="image/webp"><img src="assets/images/pflasterarbeiten.jpg" alt="Pflasterarbeiten" loading="lazy"></picture>
          <div><h3>Pflasterarbeiten</h3><p>Saubere Pflasterflächen für Einfahrten, Wege, Höfe und Terrassenflächen mit fachgerechtem Unterbau.</p><span>Mehr erfahren →</span></div>
        </a>
        <a class="service-card" id="terrassen" href="leistung-terrassen.php">
          <picture><source srcset="assets/images/terrassen.webp" type="image/webp"><img src="assets/images/terrassen.jpg" alt="Terrassen" loading="lazy"></picture>
          <div><h3>Terrassen</h3><p>Terrassenflächen als wohnliche Erweiterung des Hauses, passend zu Garten, Nutzung und Materialwunsch.</p><span>Mehr erfahren →</span></div>
        </a>
        <a class="service-card" id="gartenpflege" href="leistung-gartenpflege.php">
          <picture><source srcset="assets/images/gartenpflege.webp" type="image/webp"><img src="assets/images/gartenpflege.jpg" alt="Gartenpflege" loading="lazy"></picture>
          <div><h3>Gartenpflege</h3><p>Zuverlässige Pflege für gesunde, saubere und dauerhaft schöne Außenanlagen.</p><span>Mehr erfahren →</span></div>
        </a>
        <a class="service-card" id="natursteinmauern" href="leistung-natursteinmauern.php">
          <picture><source srcset="assets/images/natursteinmauern.webp" type="image/webp"><img src="assets/images/natursteinmauern.jpg" alt="Natursteinmauern" loading="lazy"></picture>
          <div><h3>Natursteinmauern</h3><p>Robuste Mauern, Einfassungen und Gestaltungselemente aus Naturstein mit natürlicher Optik.</p><span>Mehr erfahren →</span></div>
        </a>
        <a class="service-card" id="erd-und-pflanzarbeiten" href="leistung-erd-und-pflanzarbeiten.php">
          <picture><source srcset="assets/images/erd-und-pflanzarbeiten.webp" type="image/webp"><img src="assets/images/erd-und-pflanzarbeiten.jpg" alt="Erd- und Pflanzarbeiten" loading="lazy"></picture>
          <div><h3>Erd- und Pflanzarbeiten</h3><p>Boden vorbereiten, Flächen modellieren und Pflanzbereiche fachgerecht anlegen.</p><span>Mehr erfahren →</span></div>
        </a>
        <a class="service-card" id="pool-und-teichbau" href="leistung-pool-und-teichbau.php">
          <picture><source srcset="assets/images/pool-und-teichbau.webp" type="image/webp"><img src="assets/images/pool-und-teichbau.jpg" alt="Pool- und Teichbau" loading="lazy"></picture>
          <div><h3>Pool- und Teichbau</h3><p>Wasserflächen als besonderer Mittelpunkt für Garten und Außenbereich.</p><span>Mehr erfahren →</span></div>
        </a>
        <a class="service-card" id="sichtschutz" href="leistung-sichtschutz.php">
          <picture><source srcset="assets/images/sichtschutz.webp" type="image/webp"><img src="assets/images/sichtschutz.jpg" alt="Sichtschutz" loading="lazy"></picture>
          <div><h3>Sichtschutz</h3><p>Stabile und optisch passende Lösungen für mehr Privatsphäre im Garten.</p><span>Mehr erfahren →</span></div>
        </a>
        <a class="service-card" id="abbrucharbeiten" href="leistung-abbrucharbeiten.php">
          <picture><source srcset="assets/images/abbrucharbeiten.webp" type="image/webp"><img src="assets/images/abbrucharbeiten.jpg" alt="Abbrucharbeiten" loading="lazy"></picture>
          <div><h3>Abbrucharbeiten</h3><p>Sorgfältige Rückbauarbeiten als sichere Grundlage für neue Außenanlagen.</p><span>Mehr erfahren →</span></div>
        </a></div></section>
  </main>
<?php require __DIR__ . '/includes/footer.php'; ?>
