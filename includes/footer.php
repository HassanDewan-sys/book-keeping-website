<?php
/**
 * Bindwell Press - Luxury Footer Partial
 * Pixel-accurate implementation matching assets/sections-new-design/footer-dsign.jpg
 */

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/security.php';
require_once __DIR__ . '/functions.php';
?>
    </main>

    <!-- Site Footer -->
    <footer class="relative overflow-hidden pt-16 pb-12 sm:pt-20 sm:pb-16" style="background: #11040A url('<?= asset_url('assets/footer-background.avif') ?>') center center / cover no-repeat; color: #FAF6F0;">
        <!-- Soft Ambient Vignette (Keeps the antique books on left, globe on right clearly visible) -->
        <div class="pointer-events-none absolute inset-0" style="background: radial-gradient(circle at 50% 50%, rgba(20, 6, 14, 0.05) 0%, rgba(14, 4, 10, 0.42) 100%);"></div>

        <div class="footer-luxury-container">
            
            <!-- 1. Top Floating Glass CTA Banner -->
            <div class="footer-cta-card">
                <div class="flex items-center justify-center gap-3">
                    <span class="w-8 h-[1px] inline-block" style="background: rgba(201, 142, 94, 0.6);"></span>
                    <span class="font-syne text-[11px] font-bold uppercase tracking-[0.25em] text-[#EED3BE]">LET'S BRING YOUR STORY TO THE WORLD</span>
                    <span class="w-8 h-[1px] inline-block" style="background: rgba(201, 142, 94, 0.6);"></span>
                </div>

                <h3 class="mt-3.5 font-display text-2xl sm:text-3xl lg:text-[2.65rem] font-bold text-[#FAF6F0] tracking-tight leading-tight" style="text-shadow: 0 2px 16px rgba(0,0,0,0.5);">
                    Ready to give your story a global stage?
                </h3>

                <p class="mt-2.5 font-body text-xs sm:text-sm text-[#FAF6F0]/80 max-w-lg mx-auto">
                    Join the authors who choose to publish with confidence.
                </p>

                <div class="mt-7 flex flex-wrap items-center justify-center gap-4">
                    <a href="#contact" class="footer-btn-primary group">
                        <span>START PUBLISHING</span>
                        <span class="transition-transform duration-300 group-hover:translate-x-1">&rarr;</span>
                    </a>

                    <a href="tel:<?= e(SITE_PHONE_RAW) ?>" class="footer-btn-phone">
                        <svg class="w-4 h-4 text-[#C98E5E] shrink-0" viewBox="0 0 24 24" fill="currentColor"><path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2a1 1 0 011.02-.24c1.12.37 2.33.57 3.57.57a1 1 0 011 1V20a1 1 0 01-1 1A17 17 0 013 4a1 1 0 011-1h3.5a1 1 0 011 1c0 1.25.2 2.45.57 3.57a1 1 0 01-.25 1.02l-2.2 2.2z"/></svg>
                        <span>(02) 8531 1364</span>
                    </a>
                </div>
            </div>

            <!-- 2. Middle Row: TWO SEPARATE LUXURY GLASS PANELS (Left Brand Card & Right Mega 3-Col Card) -->
            <div class="footer-panels-row">
                
                <!-- Panel 1: Left Brand Info & Newsletter Card -->
                <div class="footer-brand-panel">
                    <div class="space-y-4">
                        <!-- Logo -->
                        <a href="/" aria-label="Bindwell Press" class="inline-block">
                            <img alt="Bindwell Press" width="165" height="40" decoding="async" class="object-contain brightness-110" style="height:40px; width:auto;" src="<?= asset_url('/assets/bindwell-logo-white.svg') ?>">
                        </a>

                        <p class="font-body text-xs leading-relaxed text-[#FAF6F0]/80">
                            A premium book &amp; eBook cover design studio and full-service publisher. Award-winning covers that sell, plus editing, publishing, audiobook and marketing for authors worldwide.
                        </p>

                        <!-- Social Icons (Glassy Circular Buttons) -->
                        <div class="flex items-center gap-2.5 pt-1">
                            <a href="#" class="footer-social-circle" aria-label="Instagram">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                            </a>
                            <a href="#" class="footer-social-circle" aria-label="Facebook">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>
                            </a>
                            <a href="#" class="footer-social-circle" aria-label="LinkedIn">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/></svg>
                            </a>
                            <a href="#" class="footer-social-circle" aria-label="YouTube">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M22.54 6.42a2.78 2.78 0 00-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 00-1.94 2A29 29 0 001 11.75a29 29 0 00.46 5.33A2.78 2.78 0 003.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 001.94-2 29 29 0 00.46-5.25 29 29 0 00-.46-5.33zM9.75 15.02V8.48l5.75 3.27-5.75 3.27z"/></svg>
                            </a>
                        </div>
                    </div>

                    <!-- Newsletter Subscribe Box -->
                    <div class="footer-newsletter-wrap">
                        <div class="flex items-center gap-2 mb-2 font-body text-xs font-semibold text-[#EED3BE]">
                            <span class="w-6 h-6 rounded-full flex items-center justify-center shrink-0" style="background: rgba(201, 142, 94, 0.25); color: #EED3BE; border: 1px solid rgba(220, 160, 105, 0.3);">
                                <svg class="w-3 h-3" viewBox="0 0 24 24" fill="currentColor"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                            </span>
                            <span>Get publishing tips — Subscribe</span>
                        </div>
                        
                        <form onsubmit="event.preventDefault(); alert('Thank you for subscribing to Bindwell Press!');" class="footer-newsletter-form">
                            <input type="email" required placeholder="Your email address" class="footer-newsletter-input">
                            <button type="submit" class="footer-newsletter-btn" aria-label="Subscribe">
                                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                            </button>
                        </form>
                        <span class="block mt-2 font-body text-[11px] text-[#FAF6F0]/55">Join a global community of authors.</span>
                    </div>
                </div>

                <!-- Panel 2: Right Mega Card (SERVICES + COMPANY + GET IN TOUCH) -->
                <div class="footer-content-panel">
                    
                    <div class="footer-inner-3col">
                        
                        <!-- Col 1: SERVICES -->
                        <div>
                            <div class="flex items-center gap-2 mb-3.5">
                                <div class="w-6 h-6 rounded-full flex items-center justify-center shrink-0" style="background: rgba(201, 142, 94, 0.25); color: #EED3BE; border: 1px solid rgba(220, 160, 105, 0.3);">
                                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                                </div>
                                <h4 class="font-syne text-[11px] font-bold uppercase tracking-[0.2em] text-[#EED3BE]">Services</h4>
                            </div>

                            <ul class="space-y-0.5">
                                <li class="footer-nav-item"><a href="#services" class="footer-nav-link"><span class="footer-nav-dash">—</span><span>Book Cover Design</span></a></li>
                                <li class="footer-nav-item"><a href="#services" class="footer-nav-link"><span class="footer-nav-dash">—</span><span>eBook Cover Designing</span></a></li>
                                <li class="footer-nav-item"><a href="#services" class="footer-nav-link"><span class="footer-nav-dash">—</span><span>Book Illustration</span></a></li>
                                <li class="footer-nav-item"><a href="#services" class="footer-nav-link"><span class="footer-nav-dash">—</span><span>Book Publishing</span></a></li>
                                <li class="footer-nav-item"><a href="#services" class="footer-nav-link"><span class="footer-nav-dash">—</span><span>Children Book Publishing</span></a></li>
                                <li class="footer-nav-item"><a href="#services" class="footer-nav-link"><span class="footer-nav-dash">—</span><span>eBook Writing &amp; Publishing</span></a></li>
                                <li class="footer-nav-item"><a href="#services" class="footer-nav-link"><span class="footer-nav-dash">—</span><span>Self Publishing</span></a></li>
                                <li class="footer-nav-item"><a href="#services" class="footer-nav-link"><span class="footer-nav-dash">—</span><span>Global Publishing</span></a></li>
                            </ul>
                        </div>

                        <!-- Col 2: COMPANY -->
                        <div>
                            <div class="flex items-center gap-2 mb-3.5">
                                <div class="w-6 h-6 rounded-full flex items-center justify-center shrink-0" style="background: rgba(201, 142, 94, 0.25); color: #EED3BE; border: 1px solid rgba(220, 160, 105, 0.3);">
                                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                                </div>
                                <h4 class="font-syne text-[11px] font-bold uppercase tracking-[0.2em] text-[#EED3BE]">Company</h4>
                            </div>

                            <ul class="space-y-0.5">
                                <li class="footer-nav-item"><a href="#about" class="footer-nav-link"><span class="footer-nav-dash">—</span><span>About Us</span></a></li>
                                <li class="footer-nav-item"><a href="#packages" class="footer-nav-link"><span class="footer-nav-dash">—</span><span>Packages</span></a></li>
                                <li class="footer-nav-item"><a href="#contact" class="footer-nav-link"><span class="footer-nav-dash">—</span><span>Contact Us</span></a></li>
                                <li class="footer-nav-item"><a href="#services" class="footer-nav-link"><span class="footer-nav-dash">—</span><span>All Services</span></a></li>
                                <li class="footer-nav-item"><a href="#world-stage" class="footer-nav-link"><span class="footer-nav-dash">—</span><span>Book Fairs</span></a></li>
                            </ul>
                        </div>

                        <!-- Col 3: GET IN TOUCH -->
                        <div>
                            <div class="flex items-center gap-2 mb-3.5">
                                <div class="w-6 h-6 rounded-full flex items-center justify-center shrink-0" style="background: rgba(201, 142, 94, 0.25); color: #EED3BE; border: 1px solid rgba(220, 160, 105, 0.3);">
                                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor"><path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/></svg>
                                </div>
                                <h4 class="font-syne text-[11px] font-bold uppercase tracking-[0.2em] text-[#EED3BE]">Get In Touch</h4>
                            </div>

                            <!-- Inner Dark Glass Card -->
                            <div class="footer-contact-box">
                                <!-- Address -->
                                <div class="flex items-start gap-3">
                                    <div class="footer-contact-icon mt-0.5">
                                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                                    </div>
                                    <div>
                                        <span class="block font-syne text-[10px] font-bold uppercase tracking-wider text-[#FAF6F0]">Canberra Office</span>
                                        <span class="block font-body text-[11.5px] text-[#FAF6F0]/80 leading-snug mt-0.5"><?= e(SITE_ADDRESS) ?></span>
                                    </div>
                                </div>

                                <!-- Phone -->
                                <a href="tel:<?= e(SITE_PHONE_RAW) ?>" class="flex items-center gap-3 group text-decoration-none">
                                    <div class="footer-contact-icon">
                                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor"><path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2a1 1 0 011.02-.24c1.12.37 2.33.57 3.57.57a1 1 0 011 1V20a1 1 0 01-1 1A17 17 0 013 4a1 1 0 011-1h3.5a1 1 0 011 1c0 1.25.2 2.45.57 3.57a1 1 0 01-.25 1.02l-2.2 2.2z"/></svg>
                                    </div>
                                    <span class="font-body text-xs font-semibold text-[#FAF6F0] group-hover:text-[#EED3BE] transition-colors"><?= e(SITE_PHONE) ?></span>
                                </a>

                                <!-- Email -->
                                <a href="mailto:<?= e(SITE_EMAIL) ?>" class="flex items-center gap-3 group text-decoration-none">
                                    <div class="footer-contact-icon">
                                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                                    </div>
                                    <span class="font-body text-xs font-semibold text-[#FAF6F0] group-hover:text-[#EED3BE] transition-colors break-all"><?= e(SITE_EMAIL) ?></span>
                                </a>
                            </div>

                            <!-- Authors Worldwide Chip -->
                            <div class="footer-worldwide-box">
                                <div class="w-7 h-7 rounded-full flex items-center justify-center shrink-0" style="background: rgba(201, 142, 94, 0.25); color: #EED3BE; border: 1px solid rgba(220, 160, 105, 0.3);">
                                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path><path d="M2 12h20"></path></svg>
                                </div>
                                <div>
                                    <span class="block font-body text-xs font-semibold text-[#FAF6F0]/90 leading-tight">Authors Worldwide</span>
                                    <span class="block font-body text-[10.5px] text-[#FAF6F0]/65">Always Welcome</span>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

            <!-- 3. Bottom Sub-Footer Bar (Pill Container) -->
            <div class="footer-subfooter-pill">
                <div class="flex items-center gap-3">
                    <!-- Leaf / Quill Icon -->
                    <svg class="w-5 h-5 text-[#C98E5E] shrink-0" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M17 8C8 10 5.9 16.17 3.82 21.34L5.71 22l1-2.3A4.49 4.49 0 0 0 8 20C19 20 22 3 22 3c-1 2-8 2.25-13 3.25S2 11.5 2 13.5s1.75 3.75 1.75 3.75C7 8 17 8 17 8z"/>
                    </svg>
                    <p class="font-body text-xs text-[#FAF6F0]/80 text-center sm:text-left">
                        &copy; 2025 Bindwell Press. All rights reserved. Authors keep 100% of their rights to royalties.
                    </p>
                </div>

                <div class="flex items-center gap-4 font-body text-xs text-[#FAF6F0]/70">
                    <a href="#privacy" class="hover:text-[#EED3BE] transition-colors">Privacy</a>
                    <span class="text-[#C98E5E]/40">|</span>
                    <a href="#terms" class="hover:text-[#EED3BE] transition-colors">Terms</a>
                    <span class="text-[#C98E5E]/40">|</span>
                    <a href="#sitemap" class="hover:text-[#EED3BE] transition-colors">Sitemap</a>
                </div>
            </div>

        </div>
    </footer>

    <!-- Global Bespoke Luxury Single Image Lightbox Modal -->
    <div id="image-lightbox" class="bwp-lightbox-overlay" role="dialog" aria-modal="true" aria-label="Book Cover Preview">
        <div class="bwp-lightbox-backdrop" onclick="closeLightbox()"></div>

        <!-- Main Modal Card -->
        <div class="bwp-lightbox-card">
            <!-- Top Controls Bar -->
            <div class="bwp-lightbox-topbar">
                <div class="bwp-lightbox-badge">
                    <span class="bwp-lightbox-dot"></span>
                    <span id="lightbox-genre">Bespoke Book Preview</span>
                </div>
                <button type="button" id="lightbox-close" class="bwp-lightbox-close" onclick="closeLightbox()" aria-label="Close preview">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>

            <!-- Image Stage -->
            <div class="bwp-lightbox-stage">
                <img id="lightbox-img" src="" alt="Enlarged Book Cover" class="bwp-lightbox-img" decoding="async">
            </div>

            <!-- Bottom Caption & Actions -->
            <div class="bwp-lightbox-footer">
                <div class="bwp-lightbox-title-wrap">
                    <h3 id="lightbox-title" class="bwp-lightbox-title">Book Cover</h3>
                    <p id="lightbox-caption" class="bwp-lightbox-caption"></p>
                </div>
                <div class="bwp-lightbox-actions">
                    <a href="#contact" onclick="closeLightbox()" class="btn-gold !py-2.5 !px-5 text-xs font-semibold">
                        <span>Publish This Design</span>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Vendor Libraries (Three.js, GSAP, Lenis) -->
    <script src="<?= asset_url('/assets/js/vendor/three.min.js') ?>"></script>
    <script src="<?= asset_url('/assets/js/vendor/gsap.min.js') ?>"></script>
    <script src="<?= asset_url('/assets/js/vendor/ScrollTrigger.min.js') ?>"></script>
    <script src="<?= asset_url('/assets/js/vendor/lenis.min.js') ?>"></script>

    <!-- Application Scripts -->
    <script src="<?= asset_url('/assets/js/main.js') ?>"></script>
    <script src="<?= asset_url('/assets/js/interactions.js') ?>"></script>
</body>
</html>
