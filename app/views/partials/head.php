<?php
/** Shared <head> contents for public-facing pages. */
$cssPath = BASE_PATH . '/dist/output.css';
$cssVersion = is_file($cssPath) ? filemtime($cssPath) : time();
?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= isset($page_title) ? e($page_title) . ' - ' : '' ?>Yibera - Advanced Healthcare Management</title>

<link rel="icon" type="image/png" href="<?= asset('images/yiberalogo2.png') ?>">

<!-- Compiled Tailwind CSS -->
<link href="<?= asset('dist/output.css') ?>?v=<?= $cssVersion ?>" rel="stylesheet">

<!-- Font Awesome icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- Swiper (carousels) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

<!-- AOS (animate on scroll) -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
