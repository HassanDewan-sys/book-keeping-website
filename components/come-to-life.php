<?php
/**
 * "Watch It Come To Life" 3-Step Interactive Experience Component
 */

$books = require __DIR__ . '/../data/books.php';
$marquee = $books['marquee'];
$lifeCovers = [];
for ($i = 0; $i < 8; $i++) {
    $lifeCovers[] = asset_url($marquee[$i % count($marquee)]['image']);
}
$lifeJson = htmlspecialchars(json_encode($lifeCovers), ENT_QUOTES, 'UTF-8');
?>
<section class="relative overflow-hidden bg-royal-gradient py-24 text-cream sm:py-28" id="come-to-life">
    <div class="pointer-events-none absolute -left-24 top-1/3 h-80 w-80 rounded-full bg-gold/15 blur-3xl"></div>
    <div class="pointer-events-none absolute -right-24 bottom-1/4 h-80 w-80 rounded-full bg-emerald-jewel/30 blur-3xl"></div>

    <div class="container-px relative grid items-center gap-12 lg:grid-cols-2">
        <!-- Steps List -->
        <div>
            <div class="reveal-init">
                <span class="eyebrow !border-gold-300/40 !bg-white/10 !text-gold-300">Watch It Come To Life</span>
            </div>
            <div class="reveal-init delay-100">
                <h2 class="mt-5 font-display text-3xl font-semibold leading-tight sm:text-4xl lg:text-[2.7rem]">
                    From A Quiet Manuscript To A Book That <span class="text-gradient-gold">Opens The World</span>
                </h2>
            </div>
            <div class="reveal-init delay-200">
                <p class="mt-5 max-w-lg font-body text-lg leading-relaxed text-cream/80">
                    Every turn reveals another best-seller we've brought to life. That moment, when a reader first lifts your cover, is what we design every detail to earn.
                </p>
            </div>

            <!-- Features / 360 Drag Prompt -->
            <div class="mt-8 flex flex-col gap-3.5" style="display: flex; flex-direction: column; gap: 14px;">
                <div class="flex items-center gap-4 rounded-full border border-white/10 bg-white/[0.03] px-6 py-3.5 backdrop-blur-md transition-colors hover:border-white/20 hover:bg-white/[0.05]" style="border-radius: 9999px;">
                    <span class="flex h-9 w-9 shrink-0 items-center justify-center text-cream">
                        <?= get_icon('book', 'w-6 h-6 stroke-[1.5]') ?>
                    </span>
                    <div>
                        <h4 class="font-display text-sm font-semibold text-cream">Tactile Hardcover &amp; Foil Craft</h4>
                        <p class="font-body text-xs text-cream/70">Custom cloth, ribbon markers, debossing and dust jackets built to endure.</p>
                    </div>
                </div>
                <div class="flex items-center gap-4 rounded-full border border-white/10 bg-white/[0.03] px-6 py-3.5 backdrop-blur-md transition-colors hover:border-white/20 hover:bg-white/[0.05]" style="border-radius: 9999px;">
                    <span class="flex h-9 w-9 shrink-0 items-center justify-center text-cream">
                        <?= get_icon('globe', 'w-6 h-6 stroke-[1.5]') ?>
                    </span>
                    <div>
                        <h4 class="font-display text-sm font-semibold text-cream">Global 40,000+ Distribution</h4>
                        <p class="font-body text-xs text-cream/70">IngramSpark, Amazon, Barnes &amp; Noble, Apple Books, and independent bookstores.</p>
                    </div>
                </div>
                <div class="flex items-center gap-4 rounded-full border border-white/10 bg-white/[0.03] px-6 py-3.5 backdrop-blur-md transition-colors hover:border-white/20 hover:bg-white/[0.05]" style="border-radius: 9999px;">
                    <span class="flex h-9 w-9 shrink-0 items-center justify-center text-cream">
                        <?= get_icon('check-circle', 'w-6 h-6 stroke-[1.5]') ?>
                    </span>
                    <div>
                        <h4 class="font-display text-sm font-semibold text-cream">Interactive 360° Inspection</h4>
                        <p class="font-body text-xs text-cream/70">Click &amp; drag the book on the right to rotate and inspect from any angle.</p>
                    </div>
                </div>
            </div>

            <div class="mt-8 reveal-init delay-300">
                <a href="#contact" class="btn-gold">
                    Start My Book
                    <?= get_icon('arrow-right', 'shrink-0') ?>
                </a>
            </div>
        </div>

        <!-- 3D Transform Artwork Display (Three.js WebGL Continuous Auto-Rotate + Drag) -->
        <div class="relative h-[380px] w-full sm:h-[460px] lg:h-[540px]">
            <!-- Three.js Canvas Container -->
            <div id="life-3d-canvas" class="webgl-canvas-container absolute inset-0 cursor-grab active:cursor-grabbing" data-covers='<?= $lifeJson ?>'></div>

            <!-- Fallback Static Book (shown while loading / fallback) -->
            <div id="life-3d-fallback" class="absolute inset-0 flex flex-col items-center justify-center transition-opacity duration-700">
                <div id="life-step-badge" class="mb-4 inline-flex items-center gap-2 rounded-full border border-gold-300/40 bg-royal-900/60 px-4 py-1.5 font-body text-xs font-semibold text-gold-300 backdrop-blur-md">
                    Interactive 3D Hardcover · Drag to Rotate
                </div>
                <div class="relative w-[210px] sm:w-[240px] rotate-[-6deg] overflow-hidden rounded-xl shadow-float ring-1 ring-white/20 transition-all duration-500 hover:rotate-0 hover:scale-105 cursor-pointer">
                    <div class="relative aspect-[2/3]">
                        <img id="life-cover-img" alt="Finished Best-Selling Published Book by Bindwell Press" loading="lazy" decoding="async" class="object-cover absolute inset-0 h-full w-full transition-all duration-300" src="<?= asset_url('/assets/home-slider/slider-13.jpg') ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
