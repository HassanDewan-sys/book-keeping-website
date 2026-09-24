<?php
/**
 * Hero Section Component
 */

$books = require __DIR__ . '/../data/books.php';
$hero = $books['hero'];
?>
<section class="relative overflow-hidden pt-8 sm:pt-10">
    <div class="pointer-events-none absolute inset-0 -z-10 bg-cream-radial"></div>
    <div data-parallax="0.2" class="pointer-events-none absolute -right-24 -top-10 h-[520px] w-[520px] rounded-full bg-gold/10 blur-3xl"></div>
    <div data-parallax="0.12" class="pointer-events-none absolute -left-28 top-40 h-96 w-96 rounded-full bg-emerald-jewel/10 blur-3xl"></div>

    <div class="container-px relative grid items-center gap-10 pb-8 lg:min-h-[86vh] lg:grid-cols-[1.08fr_0.92fr] lg:gap-6">
        <!-- Hero Text Content -->
        <div class="relative z-10">
            <span class="hero-anim eyebrow">Australia’s Bespoke Publishing Atelier</span>
            <h1 class="mt-6 font-display text-4xl font-bold leading-[1.02] text-royal-700 sm:text-5xl lg:text-[4.15rem]">
                <span class="hero-anim block">Your Story,</span>
                <span class="hero-anim block">Given A <span class="text-gradient-gold">World Stage</span></span>
            </h1>
            <p class="hero-anim mt-6 max-w-xl font-body text-lg leading-relaxed text-ink/75">
                From Sydney to London and Frankfurt, we handcraft book designs that captivate readers, publish worldwide across 40,000 retail endpoints, and protect 100% of your royalties.
            </p>
            <div class="hero-anim mt-8 flex flex-wrap items-center gap-4">
                <a href="#contact" class="btn-gold">
                    Start Publishing
                    <?= get_icon('arrow-right', 'shrink-0') ?>
                </a>
                <a href="#showcase" class="btn-ghost">
                    Explore Bespoke Covers
                    <?= get_icon('arrow-right', 'shrink-0') ?>
                </a>
            </div>
            <div class="hero-anim mt-9 flex flex-wrap items-center gap-x-8 gap-y-3">
                <div class="flex items-center gap-3">
                    <div class="flex -space-x-2">
                        <span class="flex items-center justify-center rounded-full font-display font-bold text-white shadow-sm overflow-hidden"
                            style="width: 32px; height: 32px; background: #0D1527; color: #F3E5AB; font-size: 11px; border: 2px solid #ffffff;">
                            <img src="assets/hero-section-social-profes/social-testi-01.avif"
                                class="w-full h-full object-cover"
                                alt="">
                        </span>

                        <span class="flex items-center justify-center rounded-full font-display font-bold text-slate-900 shadow-sm overflow-hidden"
                            style="width: 32px; height: 32px; background: linear-gradient(135deg, #F3E5AB, #D4AF37); font-size: 11px; border: 2px solid #ffffff;">
                            <img src="assets/hero-section-social-profes/social-testi-02.avif"
                                class="w-full h-full object-cover"
                                alt="">
                        </span>

                        <span class="flex items-center justify-center rounded-full font-display font-bold text-white shadow-sm overflow-hidden"
                            style="width: 32px; height: 32px; background: #1E293B; color: #F3E5AB; font-size: 11px; border: 2px solid #ffffff;">
                            <img src="assets/hero-section-social-profes/social-testi-03.avif"
                                class="w-full h-full object-cover"
                                alt="">
                        </span>
                    </div>
                    <div>
                        <div class="flex items-center gap-1 text-[#D4AF37]" aria-label="5 out of 5 stars">
                            <?php for ($i = 0; $i < 5; $i++): ?>
                                <?= get_icon('star', 'shrink-0 w-3.5 h-3.5 fill-current text-[#D4AF37]') ?>
                            <?php endfor; ?>
                        </div>
                        <span class="font-body text-xs font-bold text-royal-700">4.9/5 from 350+ Authors</span>
                    </div>
                </div>
                <div class="flex items-center gap-2 font-body text-xs text-ink/70">
                    <?= get_icon('shield-check', 'shrink-0 text-[#B88E18] w-4 h-4') ?>
                    <span>100% Rights &amp; Royalties Guaranteed</span>
                </div>
            </div>
        </div>

        <!-- Hero Interactive Presentation: Responsive 3D Book Slide Carousel -->
        <?php
        $heroSliderImages = [
            asset_url('/assets/hero-banner-slider/book01.avif'),
            asset_url('/assets/hero-banner-slider/book02.avif'),
            asset_url('/assets/hero-banner-slider/book03.avif'),
            asset_url('/assets/hero-banner-slider/book04.avif'),
            asset_url('/assets/hero-banner-slider/book05.avif'),
            asset_url('/assets/hero-banner-slider/book06.avif')
        ];
        $heroSliderImagesJson = htmlspecialchars(json_encode($heroSliderImages), ENT_QUOTES, 'UTF-8');
        ?>
        <div class="hero-3d relative">
            <div class="relative z-10 mx-auto w-full flex flex-col items-center justify-center">
                <!-- Ambient Warm Glow Aura -->
                <div class="pointer-events-none absolute h-72 w-72 rounded-full bg-[#C98E5E]/18 blur-3xl"></div>

                <!-- 3D Book Carousel Stage -->
                <div class="hero-book-stage" id="hero-book-stage" data-images='<?= $heroSliderImagesJson ?>'></div>

                <!-- Sleek Pagination Dots & Navigation Arrows -->
                <div class="mt-4 flex items-center justify-center gap-3 select-none">
                    <button type="button" id="hero-book-prev" class="hero-nav-arrow flex h-9 w-9 items-center justify-center rounded-full border border-[#C98E5E]/30 bg-white/80 backdrop-blur-md text-[#8E562A] shadow-sm transition hover:bg-[#1F0C15] hover:text-[#EED3BE] hover:border-[#C98E5E] active:scale-95 cursor-pointer" aria-label="Previous Book">
                        <?= get_icon('arrow-left', 'w-4 h-4') ?>
                    </button>
                    <div id="hero-book-dots" class="flex items-center gap-2 px-2"></div>
                    <button type="button" id="hero-book-next" class="hero-nav-arrow flex h-9 w-9 items-center justify-center rounded-full border border-[#C98E5E]/30 bg-white/80 backdrop-blur-md text-[#8E562A] shadow-sm transition hover:bg-[#1F0C15] hover:text-[#EED3BE] hover:border-[#C98E5E] active:scale-95 cursor-pointer" aria-label="Next Book">
                        <?= get_icon('arrow-right', 'w-4 h-4') ?>
                    </button>
                </div>
            </div>

            <!-- Preserved Three.js WebGL Canvas (Hidden for now as requested, ready for future re-enable) -->
            <div id="hero-3d-canvas-preserved" style="display: none;" aria-hidden="true">
                <div id="hero-3d-canvas" class="webgl-canvas-container absolute inset-0"
                     data-center="<?= asset_url($hero['center']['image']) ?>"
                     data-left="<?= asset_url($hero['left']['image']) ?>"
                     data-right="<?= asset_url($hero['right']['image']) ?>">
                </div>
                <div id="hero-3d-fallback" class="absolute inset-0 flex items-center justify-center transition-opacity duration-700">
                    <div class="relative h-[360px] w-[270px]">
                        <div class="absolute left-1/2 top-1/2 w-[190px] -translate-x-1/2 -translate-y-1/2 overflow-hidden rounded-xl shadow-float ring-1 ring-royal-100">
                            <div class="relative overflow-hidden bg-royal-100 aspect-[2/3]">
                                <img alt="<?= e($hero['center']['title']) ?> - Book cover designed by Bindwell Press" fetchpriority="high" decoding="async" class="object-cover absolute inset-0 h-full w-full" src="<?= asset_url($hero['center']['image']) ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Hero Floating Stats Bar -->
    <!-- <div class="container-px relative z-10 pb-14">
        <div class="grid grid-cols-2 divide-x divide-y divide-slate-100 sm:divide-y-0 overflow-hidden rounded-2xl border border-slate-200/80 bg-white/80 shadow-[0_15px_35px_rgba(15,23,42,0.05)] backdrop-blur-xl sm:grid-cols-4">
            <div class="hero-stat px-5 py-6 text-center transition hover:bg-white/90">
                <div class="font-display text-3xl font-bold text-gradient-gold sm:text-4xl">500+</div>
                <div class="mt-1 font-body text-xs font-semibold uppercase tracking-wider text-slate-500">Books Published</div>
            </div>
            <div class="hero-stat px-5 py-6 text-center transition hover:bg-white/90">
                <div class="font-display text-3xl font-bold text-gradient-gold sm:text-4xl">35+</div>
                <div class="mt-1 font-body text-xs font-semibold uppercase tracking-wider text-slate-500">Design Awards</div>
            </div>
            <div class="hero-stat px-5 py-6 text-center transition hover:bg-white/90">
                <div class="font-display text-3xl font-bold text-gradient-gold sm:text-4xl">50M+</div>
                <div class="mt-1 font-body text-xs font-semibold uppercase tracking-wider text-slate-500">Pages Edited</div>
            </div>
            <div class="hero-stat px-5 py-6 text-center transition hover:bg-white/90">
                <div class="font-display text-3xl font-bold text-gradient-gold sm:text-4xl">10</div>
                <div class="mt-1 font-body text-xs font-semibold uppercase tracking-wider text-slate-500">Years of Craft</div>
            </div>
        </div>
    </div> -->
</section>
