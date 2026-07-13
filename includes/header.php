<?php
require_once __DIR__ . '/functions.php';
$meta = page_meta(current_page());
?>
<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($meta['title']) ?></title>
    <meta name="description" content="<?= e($meta['description']) ?>">
    <link rel="canonical" href="<?= e(url_for(current_page() === 'index.php' ? '' : current_page())) ?>">
    <meta property="og:title" content="<?= e($meta['title']) ?>">
    <meta property="og:description" content="<?= e($meta['description']) ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= e(url_for(current_page() === 'index.php' ? '' : current_page())) ?>">
    <meta property="og:image" content="<?= e(url_for('assets/images/pflasterarbeiten.jpg')) ?>">
    <link rel="stylesheet" href="<?= e(asset('css/styles.css')) ?>">
    <link rel="stylesheet" href="<?= e(asset('css/premium.css')) ?>?v=20260713">
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
        "openingHoursSpecification": [
            {"@type":"OpeningHoursSpecification","dayOfWeek":["Monday","Tuesday","Wednesday","Thursday","Friday"],"opens":"07:00","closes":"17:00"},
            {"@type":"OpeningHoursSpecification","dayOfWeek":"Saturday","opens":"07:00","closes":"12:30"}
        ],
        "areaServed": "Heilbronn und Umgebung",
        "image": "<?= e(url_for('assets/images/pflasterarbeiten.jpg')) ?>"
    }
    </script>
</head>
<body id="top">
<?php require __DIR__ . '/navigation.php'; ?>
