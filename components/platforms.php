<?php
/**
 * Platform Trust & Press Mentions Component - Modernized Luxury Design
 */

$books = require __DIR__ . '/../data/books.php';
$platforms = $books['platforms'];
$press = $books['press_mentions'];
$allPlatforms = array_merge($platforms, $platforms, $platforms);
?>
<section class="relative py-16 overflow-hidden border-y border-[#E8DDD0]/70 bg-gradient-to-b from-[#FAF6F0] via-white to-[#FAF6F0]" id="platforms" style="background-image: url('assets/logoes-background.avif'); background-size: cover; background-position: center center; background-repeat: no-repeat;">
    <!-- Ambient Subtle Glow Background -->
    <div class="pointer-events-none absolute inset-0 -z-10 flex items-center justify-center opacity-40">
        <div class="h-64 w-[60rem] rounded-full bg-gradient-to-r from-[#D49B6A]/15 via-[#EED3BE]/25 to-[#C98E5E]/15 blur-3xl"></div>
    </div>

    <div class="container-px">
        <!-- Section Header -->
        <div class="mx-auto max-w-3xl text-center">
            <div class="reveal-init inline-flex items-center gap-2 rounded-full border border-[#D49B6A]/30 bg-white/80 px-4 py-1.5 shadow-sm backdrop-blur-md">
                <span class="flex h-2 w-2 rounded-full bg-[#C98E5E] animate-pulse"></span>
                <span class="font-display text-[11px] font-bold uppercase tracking-[0.25em] text-[#8E562A]">
                    Trusted By Authors Worldwide
                </span>
            </div>

            <h2 class="mt-4 font-display text-2xl sm:text-3xl lg:text-4xl font-bold text-[#14070D] tracking-tight">
                Published Across <span class="text-gradient-gold">Every Major Global Platform</span>
            </h2>

            <div class="mx-auto mt-5 mb-5 flex items-center justify-center gap-2.5">
                <span class="h-[3px] w-8 rounded-full bg-gradient-to-r from-transparent to-gold"></span>
                <span class="h-2.5 w-2.5 -skew-x-12 rounded-[3px] bg-gold-gradient shadow-gold"></span>
                <span class="h-[3px] w-16 rounded-full bg-gold-gradient"></span>
                <span class="h-2.5 w-2.5 -skew-x-12 rounded-[3px] bg-gold-gradient shadow-gold"></span>
                <span class="h-[3px] w-8 rounded-full bg-gradient-to-l from-transparent to-gold"></span>
            </div>

            <p class="mt-3 font-body text-sm sm:text-base text-[#551E3C]/80 leading-relaxed max-w-xl mx-auto">
                Direct distribution to 40,000+ bookstores, libraries, and premier digital storefronts across 190+ countries with 100% royalty retention.
            </p>
        </div>
    </div>

    <!-- Infinite Logo Marquee with Modern Glassy Cards -->
    <div class="relative mt-10 overflow-hidden py-3 [mask-image:linear-gradient(to_right,transparent,black_10%,black_90%,transparent)]">
        <div class="marquee-logos flex shrink-0 items-center gap-5 sm:gap-6 pr-6">
            <?php foreach ($allPlatforms as $platform): ?>
                <div class="group relative flex h-16 w-36 sm:h-20 sm:w-44 shrink-0 items-center justify-center rounded-2xl border border-[#E8DDD0] bg-white/95 px-4 py-2 shadow-sm backdrop-blur-md transition-all duration-300 hover:-translate-y-1 hover:border-[#C98E5E] hover:shadow-md hover:bg-white">
                    <img alt="<?= e($platform['name']) ?>" loading="lazy" decoding="async" class="opacity-80 transition-all duration-300 group-hover:scale-105 group-hover:opacity-100" style="max-height: 32px; max-width: 120px; width: auto; height: auto; object-fit: contain;" src="<?= asset_url($platform['image']) ?>">
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Trust Feature Badges Row -->
    <div class="container-px mt-10">
        <div class="mx-auto flex flex-wrap items-center justify-center gap-3 sm:gap-6 text-xs font-semibold text-[#14070D]">
            <div class="inline-flex items-center gap-2 rounded-full border border-[#E8DDD0] bg-white/80 px-4 py-2 shadow-xs backdrop-blur-sm">
                <span class="flex h-5 w-5 items-center justify-center rounded-full bg-[#C98E5E]/15 text-[#8E562A]">
                    <?= get_icon('check', 'w-3 h-3') ?>
                </span>
                <span class="font-body text-[#14070D]/90">40,000+ Retailers &amp; Libraries</span>
            </div>

            <div class="inline-flex items-center gap-2 rounded-full border border-[#E8DDD0] bg-white/80 px-4 py-2 shadow-xs backdrop-blur-sm">
                <span class="flex h-5 w-5 items-center justify-center rounded-full bg-[#C98E5E]/15 text-[#8E562A]">
                    <?= get_icon('check', 'w-3 h-3') ?>
                </span>
                <span class="font-body text-[#14070D]/90">100% Royalty &amp; Copyright Ownership</span>
            </div>

            <div class="inline-flex items-center gap-2 rounded-full border border-[#E8DDD0] bg-white/80 px-4 py-2 shadow-xs backdrop-blur-sm">
                <span class="flex h-5 w-5 items-center justify-center rounded-full bg-[#C98E5E]/15 text-[#8E562A]">
                    <?= get_icon('check', 'w-3 h-3') ?>
                </span>
                <span class="font-body text-[#14070D]/90">Worldwide ISBN &amp; Barcode Setup</span>
            </div>
        </div>

        <!-- Press Mentions Strip -->
        <div class="mt-8 border-t border-[#E8DDD0]/60 pt-6 flex flex-wrap items-center justify-center gap-x-6 sm:gap-x-8 gap-y-2.5">
            <span class="font-body text-[11px] font-bold uppercase tracking-[0.2em] text-[#8E562A]">
                As Seen &amp; Recognized In
            </span>
            <div class="h-3 w-px bg-[#E8DDD0] hidden sm:block"></div>
            <?php foreach ($press as $idx => $item): ?>
                <span class="font-display text-xs sm:text-sm font-semibold tracking-wide text-[#551E3C]/75 transition-colors hover:text-[#8E562A]">
                    <?= e($item) ?>
                </span>
                <?php if ($idx < count($press) - 1): ?>
                    <span class="text-[#D49B6A]/50 text-[10px] hidden sm:inline">&bull;</span>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>
