<?php
require_once __DIR__ . '/functions.php';
$pageTitle = $pageTitle ?? 'Garten- und Landschaftsbau Heilbronn';
$pageDescription = $pageDescription ?? 'Hysenaj Galabau in Heilbronn und Umgebung.';
$activePage = $activePage ?? 'start';
$navItems = [
    'start' => ['label' => 'Startseite', 'href' => 'index.php'],
    'leistungen' => ['label' => 'Leistungen', 'href' => 'leistungen.php'],
    'ueber-uns' => ['label' => 'Über uns', 'href' => 'ueber-uns.php'],
    'referenzen' => ['label' => 'Referenzen', 'href' => 'galerie.php'],
    'faq' => ['label' => 'FAQ', 'href' => 'faq.php'],
    'kontakt' => ['label' => 'Kontakt', 'href' => 'kontakt.php'],
    'karriere' => ['label' => 'Karriere', 'href' => 'bewerbung.php'],
];
?>
<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($pageTitle) ?> | Hysenaj Galabau</title>
    <meta name="description" content="<?= e($pageDescription) ?>">
    <link rel="canonical" href="<?= e(url_for(current_page() === 'index.php' ? '' : current_page())) ?>">
    <meta property="og:title" content="<?= e($pageTitle) ?> | Hysenaj Galabau">
    <meta property="og:description" content="<?= e($pageDescription) ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= e(url_for(current_page() === 'index.php' ? '' : current_page())) ?>">
    <meta property="og:image" content="<?= e(url_for('assets/images/pflasterarbeiten.jpg')) ?>">
    <link rel="stylesheet" href="<?= e(asset('css/styles.css')) ?>">
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "HomeAndConstructionBusiness",
        "name": "Hysenaj Galabau",
        "foundingDate": "2009",
        "url": "<?= e(url_for()) ?>",
        "email": "<?= e($company['email']) ?>",
        "telephone": "<?= e($company['phone_display']) ?>",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "<?= e($company['street']) ?>",
            "postalCode": "74072",
            "addressLocality": "Heilbronn",
            "addressCountry": "DE"
        },
        "areaServed": "Heilbronn und Umgebung",
        "image": "<?= e(url_for('assets/images/pflasterarbeiten.jpg')) ?>"
    }
    </script>
</head>
<body id="top" data-page="<?= e($activePage) ?>">
<a class="skip-link" href="#main">Zum Inhalt springen</a>
<header class="site-header">
    <div class="container header-inner">
        <a class="brand" href="index.php" aria-label="Hysenaj Galabau Startseite"><?= image_picture('logo-hysenaj-galabau', 'Hysenaj Galabau Logo', 'brand-logo', false) ?></a>
        <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="main-nav" aria-label="Menü öffnen"><span></span><span></span><span></span></button>
        <nav class="main-nav" id="main-nav" aria-label="Hauptnavigation">
            <?php foreach ($navItems as $key => $item): ?>
                <a href="<?= e($item['href']) ?>" class="<?= $activePage === $key ? 'active' : '' ?>"><?= e($item['label']) ?></a>
            <?php endforeach; ?>
        </nav>
        <a class="header-phone" href="tel:+4915155605621" aria-label="Hysenaj Galabau anrufen"><span aria-hidden="true">☎</span>0151 55605621</a>
        <a class="btn btn-header" href="kontakt.php">Angebot anfragen</a>
    </div>
</header>
