<?php
/**
 * Bindwell Press - Homepage
 * Reverse Engineered & Recreated Pixel-Accurate Functional Replica
 */

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/includes/header.php';

// Render All Page Sections in Redesigned Editorial Sequence
render_component('hero');
render_component('stats');
render_component('covers-motion');
render_component('platforms');
render_component('bestsellers');
render_component('why-us');
render_component('publishing-process');
render_component('cinematic');
render_component('genres');
render_component('come-to-life');
render_component('services');
render_component('cover-showcase');
render_component('about');
render_component('before-after');
render_component('fair-gallery');
render_component('fair-highlights');
render_component('global-reach');
render_component('packages');
render_component('faq');
render_component('free-mockup');
render_component('contact-form');

require_once __DIR__ . '/includes/footer.php';
