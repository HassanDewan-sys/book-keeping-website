<?php
/**
 * Bindwell Press - Navigation Partial
 * 100% Pure Custom CSS Luxury Floating Capsule Header
 */

$nav_data = require __DIR__ . '/../data/navigation.php';
$main_menu = $nav_data['main_menu'];
$services_categories = $nav_data['services_categories'] ?? [];
$events_categories = $nav_data['events_categories'] ?? [];
$events_featured = $nav_data['events_featured'] ?? [];
?>
<header id="main-header" class="bwp-header-root">
    <div class="bwp-header-inner">
        <!-- 1. Top Ribbon Announcement Bar -->
        <div class="bwp-topbar">
            <!-- Left Sparkle & Tagline -->
            <div class="bwp-topbar-left">
                <svg class="bwp-sparkle-icon" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2C12 7.5 7.5 12 2 12C7.5 12 12 16.5 12 22C12 16.5 16.5 12 22 12C16.5 12 12 7.5 12 2Z"></path>
                </svg>
                <span>Your Story Deserves A World-Class Publishing Experience.</span>
            </div>

            <!-- Right Contacts (Desktop) -->
            <div class="bwp-topbar-right-desktop">
                <a href="mailto:<?= e(SITE_EMAIL) ?>" class="bwp-topbar-link">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="4" width="20" height="16" rx="2"></rect>
                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                    </svg>
                    <span><?= e(SITE_EMAIL) ?></span>
                </a>
                <span class="bwp-topbar-divider"></span>
                <a href="tel:<?= e(SITE_PHONE_RAW) ?>" class="bwp-topbar-link">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                    </svg>
                    <span><?= e(SITE_PHONE) ?></span>
                </a>
            </div>

            <!-- Right Phone Icon (Mobile) -->
            <a href="tel:<?= e(SITE_PHONE_RAW) ?>" class="bwp-topbar-phone-mobile" aria-label="Call Bindwell Press">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                </svg>
            </a>
        </div>

        <!-- 2. Main Floating Capsule Navbar -->
        <nav class="bwp-navbar" aria-label="Main Navigation">
            <!-- Corner Specular Lens Flares -->
            <span class="bwp-flare bwp-flare-tl"></span>
            <span class="bwp-flare bwp-flare-tr"></span>
            <span class="bwp-flare bwp-flare-bl"></span>
            <span class="bwp-flare bwp-flare-br"></span>

            <!-- Brand Logo -->
            <a class="bwp-logo-link" aria-label="Bindwell Press home" href="/">
                <img alt="Bindwell Press" fetchpriority="high" width="540" height="120" decoding="async" class="bwp-logo-img" src="<?= asset_url('/assets/bindwell-logo.svg') ?>">
            </a>

            <!-- Desktop Navigation Links -->
            <ul class="bwp-nav-menu">
                <?php foreach ($main_menu as $item): ?>
                    <li class="bwp-nav-item nav-item-group">
                        <a class="bwp-nav-link <?= $item['active'] ? 'is-active' : '' ?>" href="<?= e($item['url']) ?>">
                            <span><?= e($item['title']) ?></span>
                            <?php if ($item['has_dropdown']): ?>
                                <svg class="bwp-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                            <?php endif; ?>
                            <?php if ($item['active']): ?>
                                <span class="bwp-nav-active-bar"></span>
                            <?php endif; ?>
                        </a>

                        <?php if ($item['title'] === 'Services'): ?>
                            <!-- Services Mega Menu -->
                            <div class="bwp-mega-dropdown bwp-services-mega services-mega-menu-wrapper">
                                <div class="bwp-mega-panel">
                                    <div class="bwp-mega-grid-4">
                                        <?php foreach ($services_categories as $catGroup): ?>
                                            <div class="bwp-mega-col">
                                                <div class="bwp-mega-cat-header">
                                                    <span class="bwp-mega-cat-dot"></span>
                                                    <h4 class="bwp-mega-cat-title"><?= e($catGroup['category']) ?></h4>
                                                </div>
                                                <div class="bwp-mega-items-stack">
                                                    <?php foreach ($catGroup['services'] as $svc): ?>
                                                        <a href="<?= e($svc['url']) ?>" class="bwp-mega-item-link">
                                                            <span class="bwp-mega-item-icon">
                                                                <?= get_icon($svc['icon'] ?? 'book', 'bwp-svg-icon') ?>
                                                            </span>
                                                            <div class="bwp-mega-item-content">
                                                                <span class="bwp-mega-item-title"><?= e($svc['title']) ?></span>
                                                                <p class="bwp-mega-item-desc"><?= e($svc['desc']) ?></p>
                                                            </div>
                                                        </a>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>

                                    <!-- Bottom Guarantee Strip -->
                                    <div class="bwp-mega-bottom-strip">
                                        <div class="bwp-mega-bottom-badge">
                                            <span class="bwp-mega-check-badge">
                                                <?= get_icon('check', 'bwp-check-icon') ?>
                                            </span>
                                            <span class="bwp-mega-bottom-text">
                                                <strong>Full Author Ownership:</strong> 100% royalties, all formats &amp; global distribution across 40,000+ endpoints.
                                            </span>
                                        </div>
                                        <a href="#contact" class="bwp-mega-cta-btn">
                                            <span>Start Free Consultation</span>
                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                <polyline points="12 5 19 12 12 19"></polyline>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php elseif ($item['title'] === 'Events'): ?>
                            <!-- Events Mega Menu -->
                            <div class="bwp-mega-dropdown bwp-events-mega events-mega-menu-wrapper">
                                <div class="bwp-mega-panel">
                                    <div class="events-mega-grid">
                                        <?php foreach ($events_categories as $catGroup): ?>
                                            <div class="bwp-mega-col">
                                                <div class="bwp-mega-cat-header">
                                                    <span class="bwp-mega-cat-dot"></span>
                                                    <h4 class="bwp-mega-cat-title"><?= e($catGroup['category']) ?></h4>
                                                </div>
                                                <div class="bwp-mega-items-stack">
                                                    <?php foreach ($catGroup['events'] as $evt): ?>
                                                        <a href="<?= e($evt['url']) ?>" class="bwp-mega-item-link">
                                                            <span class="bwp-mega-item-icon">
                                                                <?= get_icon($evt['icon'] ?? 'globe', 'bwp-svg-icon') ?>
                                                            </span>
                                                            <div class="bwp-mega-item-content">
                                                                <span class="bwp-mega-item-title"><?= e($evt['title']) ?></span>
                                                                <p class="bwp-mega-item-desc"><?= e($evt['desc']) ?></p>
                                                            </div>
                                                        </a>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>

                                        <!-- Featured Spotlight Card -->
                                        <?php if (!empty($events_featured)): ?>
                                            <div class="bwp-events-spotlight-card">
                                                <div class="bwp-spotlight-bg-wrap">
                                                    <img src="<?= asset_url($events_featured['image']) ?>" alt="<?= e($events_featured['title']) ?>" class="bwp-spotlight-img">
                                                    <div class="bwp-spotlight-overlay"></div>
                                                </div>
                                                <div class="bwp-spotlight-content">
                                                    <span class="bwp-spotlight-badge">
                                                        <?= e($events_featured['badge']) ?>
                                                    </span>
                                                    <h4 class="bwp-spotlight-title">
                                                        <?= e($events_featured['title']) ?>
                                                    </h4>
                                                    <p class="bwp-spotlight-desc">
                                                        <?= e($events_featured['desc']) ?>
                                                    </p>
                                                </div>
                                                <div class="bwp-spotlight-footer">
                                                    <a href="<?= e($events_featured['url']) ?>" class="bwp-spotlight-btn">
                                                        <span>Reserve Now</span>
                                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            <polyline points="12 5 19 12 12 19"></polyline>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <!-- Bottom Guarantee Strip -->
                                    <div class="bwp-mega-bottom-strip">
                                        <div class="bwp-mega-bottom-badge">
                                            <span class="bwp-mega-check-badge">
                                                <?= get_icon('check', 'bwp-check-icon') ?>
                                            </span>
                                            <span class="bwp-mega-bottom-text">
                                                <strong>Global Representation:</strong> Guaranteed physical exhibition &amp; rights catalogue distribution.
                                            </span>
                                        </div>
                                        <a href="#fairs" class="bwp-mega-cta-btn">
                                            <span>Explore All Fairs</span>
                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                <polyline points="12 5 19 12 12 19"></polyline>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>

            <!-- Header Actions on Right -->
            <div class="bwp-actions">
                <!-- Vertical Divider -->
                <span class="bwp-divider"></span>

                <!-- Phone CTA (Talk To An Expert) -->
                <a href="tel:<?= e(SITE_PHONE_RAW) ?>" class="bwp-phone-cta">
                    <span class="bwp-phone-icon-btn">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                    </span>
                    <span class="bwp-phone-text">
                        <span class="bwp-phone-label">Talk To An Expert</span>
                        <span class="bwp-phone-number"><?= e(SITE_PHONE) ?></span>
                    </span>
                </a>

                <a href="#contact" class="btn-gold">
                    <span>Get Started</span>
                    <svg class="bwp-btn-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </a>

                <!-- Mobile Hamburger Menu Button -->
                <button id="mobile-menu-toggle" class="bwp-menu-btn" aria-label="Toggle menu" aria-expanded="false">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </button>
            </div>
        </nav>
    </div>

    <!-- Mobile Drawer Navigation -->
    <div id="mobile-drawer-backdrop" class="bwp-drawer-backdrop"></div>
    <div id="mobile-drawer" class="bwp-drawer">
        <div class="bwp-drawer-header">
            <a href="/" class="bwp-logo-link">
                <img alt="Bindwell Press" class="bwp-logo-img" style="height: 32px;" src="<?= asset_url('/assets/bindwell-logo.svg') ?>">
            </a>
            <button id="mobile-drawer-close" class="bwp-drawer-close" aria-label="Close menu">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        </div>
        <div class="bwp-drawer-body">
            <nav class="bwp-drawer-nav">
                <?php foreach ($main_menu as $item): ?>
                    <a href="<?= e($item['url']) ?>" class="mobile-nav-link bwp-drawer-link">
                        <?= e($item['title']) ?>
                    </a>
                <?php endforeach; ?>
            </nav>
            <div class="bwp-drawer-actions">
                <a href="tel:<?= e(SITE_PHONE_RAW) ?>" class="bwp-drawer-phone">
                    <span class="bwp-phone-icon-btn">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                    </span>
                    <span><?= e(SITE_PHONE) ?></span>
                </a>
                <a href="#contact" class="btn-gold">
                    <span>Get Started</span>
                    <svg class="bwp-btn-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</header>
