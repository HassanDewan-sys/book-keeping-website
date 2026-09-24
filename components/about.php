<?php
/**
 * We Are The Architects of Literary Success - Who We Are Component
 * Recreated precisely to match assets/sections-new-design/who-we-dsign.jpg
 */
?>
<section id="about" class="relative overflow-hidden py-24 sm:py-32 bg-cover bg-center" style="background-image: url('<?= asset_url('/assets/who-we-bg.avif') ?>');">
    <!-- Ambient Warm Tone Overlay -->
    <div class="pointer-events-none absolute inset-0 bg-gradient-to-r from-cream/95 via-cream/80 to-transparent"></div>

    <div class="container-px relative z-10 grid items-center gap-12 lg:grid-cols-12">
        <!-- Left Content Column (Spans 7 cols) -->
        <div class="lg:col-span-7 reveal-init">
            <!-- Eyebrow with decorative lines -->
            <div class="flex items-center gap-3">
                <span class="ps-eyebrow">
                    Stories Deserve A Higher Standard
                </span>
            </div>

            <!-- Headline -->
            <h2 class="font-display text-3xl font-extrabold leading-[1.12] text-[#14070D] sm:text-4xl lg:text-[2.85rem]">
                We Are The Architects of <br class="hidden sm:inline">
                <span class="font-serif italic font-normal text-gradient-gold">Literary Success</span>
            </h2>

            <!-- Paragraph -->
            <p class="mt-5 max-w-xl font-body text-base leading-relaxed text-[#551E3C]/85 sm:text-lg">
                For a decade, Bindwell Press has turned manuscripts into best-sellers and unknown authors into recognized names. We pair award-winning cover design with full-service publishing so every author gets a premium experience, and results that show on the charts.
            </p>

            <!-- 2x2 Glass Feature Cards Grid -->
            <div class="mt-8 grid gap-4 sm:grid-cols-2 max-w-xl">
                <!-- Card 1 -->
                <div class="flex items-center gap-3.5 rounded-2xl border border-white/80 bg-white/70 p-4 shadow-sm backdrop-blur-md transition-all duration-300 hover:border-[#C98E5E] hover:shadow-md hover:bg-white/90">
                    <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-gradient-to-br from-[#EED3BE] to-[#C98E5E] text-[#14070D] shadow-xs">
                        <?= get_icon('book', 'w-5 h-5') ?>
                    </span>
                    <p class="font-body text-xs sm:text-[13px] font-semibold leading-snug text-[#14070D]">
                        A decade designing best-selling covers across every genre
                    </p>
                </div>

                <!-- Card 2 -->
                <div class="flex items-center gap-3.5 rounded-2xl border border-white/80 bg-white/70 p-4 shadow-sm backdrop-blur-md transition-all duration-300 hover:border-[#C98E5E] hover:shadow-md hover:bg-white/90">
                    <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-gradient-to-br from-[#EED3BE] to-[#C98E5E] text-[#14070D] shadow-xs">
                        <?= get_icon('palette', 'w-5 h-5') ?>
                    </span>
                    <p class="font-body text-xs sm:text-[13px] font-semibold leading-snug text-[#14070D]">
                        Dedicated strategist + designer + editor on every project
                    </p>
                </div>

                <!-- Card 3 -->
                <div class="flex items-center gap-3.5 rounded-2xl border border-white/80 bg-white/70 p-4 shadow-sm backdrop-blur-md transition-all duration-300 hover:border-[#C98E5E] hover:shadow-md hover:bg-white/90">
                    <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-gradient-to-br from-[#EED3BE] to-[#C98E5E] text-[#14070D] shadow-xs">
                        <?= get_icon('headphones', 'w-5 h-5') ?>
                    </span>
                    <p class="font-body text-xs sm:text-[13px] font-semibold leading-snug text-[#14070D]">
                        Print-ready, eBook and audiobook files under one roof
                    </p>
                </div>

                <!-- Card 4 -->
                <div class="flex items-center gap-3.5 rounded-2xl border border-white/80 bg-white/70 p-4 shadow-sm backdrop-blur-md transition-all duration-300 hover:border-[#C98E5E] hover:shadow-md hover:bg-white/90">
                    <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-gradient-to-br from-[#EED3BE] to-[#C98E5E] text-[#14070D] shadow-xs">
                        <?= get_icon('sparkle', 'w-5 h-5') ?>
                    </span>
                    <p class="font-body text-xs sm:text-[13px] font-semibold leading-snug text-[#14070D]">
                        A supportive publishing community behind every author
                    </p>
                </div>
            </div>

            <!-- CTA Button -->
            <div class="mt-9">
                <a href="#contact" class="btn-gold uppercase tracking-wider text-xs">
                    <span>Discover Our Story</span>
                    <?= get_icon('arrow-right', 'shrink-0') ?>
                </a>
            </div>
        </div>

        <!-- Right Visual Showcase Column (Spans 5 cols) -->
        <div class="lg:col-span-5 relative reveal-init delay-200 flex justify-center">
            <div class="relative w-full max-w-lg">
                <!-- Main Glass Showcase Centerpiece -->
                <div class="relative z-10 transition-transform duration-500 hover:scale-[1.02]">
                    <img src="<?= asset_url('/assets/who-we-book.avif') ?>" alt="Bindwell Press Curated Books" class="w-full h-auto drop-shadow-[0_30px_50px_rgba(20,7,13,0.3)]">
                </div>
            </div>
        </div>
    </div>
</section>
