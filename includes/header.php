<?php
/**
 * Bindwell Press - Header Partial
 */

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/security.php';
require_once __DIR__ . '/functions.php';

send_security_headers();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e(SITE_NAME) ?>, <?= e(SITE_TAGLINE) ?></title>
    <meta name="description" content="Bindwell Press is a premium Australian book &amp; eBook cover design studio and full-service publisher. Award-winning covers that sell, plus editing, publishing, audiobook and book marketing for authors across Australia and the world.">
    <meta name="author" content="Bindwell Press">
    <meta name="keywords" content="book cover design, ebook cover design, book publishing, self publishing, audiobook production, book marketing, Bindwell Press">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="<?= e(SITE_URL) ?>/">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= asset_url('/assets/favicos.png') ?>">
    <link rel="icon" href="<?= asset_url('/assets/favicos.png') ?>" type="image/png">
    <link rel="apple-touch-icon" href="<?= asset_url('/assets/favicos.png') ?>">

    <!-- Preload Critical Media -->
    <link rel="preload" as="image" href="<?= asset_url('/assets/bindwell-logo.svg') ?>">
    <link rel="preload" as="image" href="<?= asset_url('/assets/master-your-emotions.webp') ?>">
    <link rel="preload" as="image" href="<?= asset_url('/assets/bindwell-logo-white.svg') ?>">

    <!-- Google Fonts: Syne, Plus Jakarta Sans, Fraunces & Alex Brush -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Fraunces:ital,opsz,wght@0,9..144,300..900;1,9..144,300..900&family=Plus+Jakarta+Sans:ital,wght@0,300..800;1,300..800&family=Syne:wght@500;600;700;800&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?= asset_url('/assets/css/style.css') ?>">
    <link rel="stylesheet" href="<?= asset_url('/assets/css/interactions.css') ?>">
</head>
<body class="bg-cream font-body text-ink antialiased">
    <!-- Top Global Scroll Progress Bar -->
    <div id="scroll-progress" class="scroll-progress-bar" style="transform: scaleX(0);"></div>


    <!-- Main Navigation Header -->
    <?php include __DIR__ . '/navigation.php'; ?>

    <main class="pb-16 md:pb-0">
