<?php
require_once __DIR__ . '/functions.php';
$pageTitle = $pageTitle ?? 'Garten- und Landschaftsbau Heilbronn';
$pageDescription = $pageDescription ?? 'Hysenaj Galabau in Heilbronn und Umgebung.';
$activePage = $activePage ?? 'start';
$navItems = [
    'start' => ['label' => 'Startseite', 'href' => 'index.php'],
    'leistungen' => ['label' => 'Leistungen', 'href' => 'leistungen.php'],
    'referenzen' => ['label' => 'Referenzen', 'href' => 'galerie.php'],
    'ueber-uns' => ['label' => 'Über uns', 'href' => 'ueber-uns.php'],
    'karriere' => ['label' => 'Karriere', 'href' => 'bewerbung.php'],
    'kontakt' => ['label' => 'Kontakt', 'href' => 'kontakt.php'],
];
?>
<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($pageTitle) ?> | Hysenaj Galabau</title>
    <meta name="description" content="<?= e($pageDescription) ?>">
    <link rel="stylesheet" href="<?= e(asset('css/styles.css')) ?>">
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
        <a class="btn btn-header" href="kontakt.php">Angebot anfragen</a>
    </div>
</header>
