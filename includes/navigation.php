<?php
$navItems = [
    'index.php' => 'Startseite',
    'leistungen.php' => 'Leistungen',
    'galerie.php' => 'Referenzen',
    'ueber-uns.php' => 'Über uns',
    'bewerbung.php' => 'Karriere',
    'kontakt.php' => 'Kontakt',
];
?>
<a class="skip-link" href="#main">Zum Inhalt springen</a>
<header class="site-header">
    <div class="container header-inner">
        <a class="brand" href="index.php" aria-label="Hysenaj Galabau Startseite">
            <?= image_picture('logo-hysenaj-galabau', 'Hysenaj Galabau Logo', 'brand-logo', false) ?>
        </a>
        <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="main-nav" aria-label="Menü öffnen"><span></span><span></span><span></span></button>
        <nav class="main-nav" id="main-nav" aria-label="Hauptnavigation">
            <?php foreach ($navItems as $href => $label): ?>
                <a href="<?= e($href) ?>" class="<?= current_page() === $href ? 'active' : '' ?>"><?= e($label) ?></a>
            <?php endforeach; ?>
        </nav>
        <a class="btn btn-primary header-cta" href="kontakt.php">Angebot anfragen</a>
    </div>
</header>
