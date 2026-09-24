<?php
/**
 * Bestsellers Amazon Spotlight Carousel Component - Luxury Glassmorphism Redesign
 */

$books = require __DIR__ . '/../data/books.php';
$bestsellers = $books['bestsellers'];
?>
<section id="bestsellers" class="relative overflow-hidden bg-[#FAF6F0] pt-20 sm:pt-28" style="padding-top:100px;">
    <!-- Ambient Glow Spheres for Glass Depth -->
    <div class="pointer-events-none absolute -left-28 top-1/4 h-96 w-96 rounded-full bg-[#C98E5E]/12 blur-3xl" aria-hidden="true"></div>
    <div class="pointer-events-none absolute -right-28 bottom-1/4 h-96 w-96 rounded-full bg-[#3D152A]/8 blur-3xl" aria-hidden="true"></div>
    <div class="pointer-events-none absolute left-1/2 top-1/3 -translate-x-1/2 -translate-y-1/2 h-[450px] w-[700px] rounded-full bg-[#EED3BE]/25 blur-3xl" aria-hidden="true"></div>

    <div class="container-px relative z-10">
        <div class="flex flex-col items-end justify-between gap-6 sm:flex-row">
            <div class="max-w-3xl text-left">
                <div class="reveal-init">
                    <span class="eyebrow inline-flex items-center" style="background: rgba(201, 142, 94, 0.09) !important; border: 1px solid rgba(201, 142, 94, 0.38) !important;">
                        <?= get_icon('sparkle', 'shrink-0 text-[#C98E5E]') ?>
                        <span>AMAZON SPOTLIGHT</span>
                    </span>
                </div>
                <div class="reveal-init delay-100 mt-4">
                    <h2 class="font-display text-3xl font-extrabold leading-[1.08] tracking-tight sm:text-4xl lg:text-[2.85rem] text-[#14070D]">
                        Bestsellers That Truly <span class="text-gradient-gold">Sell</span>
                    </h2>
                </div>
                <div class="mx-auto mt-4 flex items-center justify-left gap-2.5">
                    <span class="h-[3px] w-8 rounded-full bg-gradient-to-r from-transparent to-gold"></span>
                    <span class="h-2.5 w-2.5 -skew-x-12 rounded-[3px] bg-gold-gradient shadow-gold"></span>
                    <span class="h-[3px] w-16 rounded-full bg-gold-gradient"></span>
                    <span class="h-2.5 w-2.5 -skew-x-12 rounded-[3px] bg-gold-gradient shadow-gold"></span>
                    <span class="h-[3px] w-8 rounded-full bg-gradient-to-l from-transparent to-gold"></span>
                </div>
                <div class="reveal-init delay-200 mt-4">
                    <p class="font-body text-base leading-relaxed sm:text-lg text-[#551E3C]/80">
                        Books we designed and published, now climbing the charts. Tap through and see them live on Amazon.
                    </p>
                </div>
            </div>

            <!-- Previous / Next Controls -->
            <div class="hidden gap-2.5 sm:flex">
                <button id="bestseller-prev" aria-label="Previous bestseller" class="flex h-11 w-11 items-center justify-center rounded-full border border-[#E8DDD0] bg-white/85 backdrop-blur-md text-[#14070D] transition-all duration-300 hover:border-[#C98E5E] hover:bg-[#14070D] hover:text-[#FAF6F0] shadow-sm active:scale-95">
                    <?= get_icon('arrow-left', 'shrink-0') ?>
                </button>
                <button id="bestseller-next" aria-label="Next bestseller" class="flex h-11 w-11 items-center justify-center rounded-full border border-[#E8DDD0] bg-white/85 backdrop-blur-md text-[#14070D] transition-all duration-300 hover:border-[#C98E5E] hover:bg-[#14070D] hover:text-[#FAF6F0] shadow-sm active:scale-95">
                    <?= get_icon('arrow-right', 'shrink-0') ?>
                </button>
            </div>
        </div>
    </div>

    <!-- Horizontal Scroll Carousel Track -->
    <div id="bestseller-track" class="relative z-10 mt-12 flex snap-x gap-6 overflow-x-auto px-5 pt-3 pb-8 sm:px-8 lg:px-10 [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
        <?php foreach ($bestsellers as $book): ?>
            <div class="bestseller-glass-card group w-[220px] sm:w-[245px] shrink-0 snap-start">
                <!-- Top Header: Genre Pill + Ranking Badge -->
                <div class="flex items-center justify-between gap-2 mb-3">
                    <span class="inline-flex items-center gap-1 rounded-full bg-[#14070D]/5 border border-[#14070D]/10 px-2.5 py-0.5 font-body text-[10px] font-bold uppercase tracking-wider text-[#8E562A] backdrop-blur-md transition-colors group-hover:bg-[#C98E5E]/15 group-hover:border-[#C98E5E]/30 group-hover:text-[#551E3C]">
                        <?= e($book['genre']) ?>
                    </span>
                    <span class="inline-flex items-center gap-1 rounded-full bg-amber-50/90 border border-amber-200/60 px-2 py-0.5 font-body text-[10px] font-bold text-amber-800 shadow-2xs" style="padding-left: 10px; padding-right: 10px;">
                        <svg width="10" height="10" viewBox="0 0 24 24" fill="currentColor" class="text-amber-500"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                        <span>#1 Bestseller</span>
                    </span>
                </div>

                <!-- Book Cover Frame with 3D Spine and Lightbox Zoom -->
                <div class="bestseller-cover-frame" onclick="openLightbox('<?= asset_url($book['image']) ?>', '<?= e($book['title']) ?>')">
                    <img alt="<?= e($book['title']) ?> - Book cover by Bindwell Press" loading="lazy" decoding="async" class="object-cover absolute inset-0 h-full w-full transition-transform duration-700 ease-out group-hover:scale-[1.04]" src="<?= asset_url($book['image']) ?>">
                    <!-- 3D Book Spine Shadow Strip -->
                    <div class="bestseller-spine-strip"></div>
                    <!-- Glass Sheen Reflection -->
                    <div class="bestseller-cover-glare"></div>
                    <!-- Quick Zoom Overlay -->
                    <div class="bestseller-zoom-overlay">
                        <span class="bestseller-zoom-btn">
                            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><line x1="11" y1="8" x2="11" y2="14"></line><line x1="8" y1="11" x2="14" y2="11"></line></svg>
                        </span>
                    </div>
                </div>

                <!-- Card Meta Footer -->
                <div class="mt-3.5" style="margin-top: 15px;">
                    <h3 class="font-display text-[14px] sm:text-[15px] font-bold text-[#14070D] leading-tight truncate group-hover:text-[#8E562A] transition-colors" title="<?= e($book['title']) ?>">
                        <?= e($book['title']) ?>
                    </h3>
                    <div class="mt-2.5 pt-2.5 border-t border-[#E8DDD0]/60 flex items-center justify-between gap-1" style="padding-top: 15px;">
                        <span class="font-body text-[10px] font-semibold uppercase tracking-wider text-[#551E3C]/60 flex items-center gap-1">
                            <?= get_icon('shield-check', 'w-3 h-3 text-[#C98E5E]') ?>
                            <span>Verified</span>
                        </span>
                        <a href="<?= e($book['amazon_url']) ?>" target="_blank" rel="noreferrer" class="bestseller-amazon-pill group/btn">
                            <?= get_icon('amazon', 'w-3.5 h-3.5 shrink-0 transition-transform group-hover/btn:scale-110') ?>
                            <span>View on Amazon</span>
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="transition-transform group-hover/btn:translate-x-0.5"><path d="m9 18 6-6-6-6"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
