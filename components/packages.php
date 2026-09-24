<?php
/**
 * Pricing Packages Component - Luxury Editorial Redesign
 */

$packages = require __DIR__ . '/../data/packages.php';
?>
<section id="packages" class="relative overflow-hidden py-24 sm:py-32 bg-[#FAF6F0]">
    <!-- Ambient Depth Lighting -->
    <div class="pointer-events-none absolute left-1/3 top-10 h-96 w-96 rounded-full bg-[#C98E5E]/10 blur-3xl" aria-hidden="true"></div>
    <div class="pointer-events-none absolute right-1/4 bottom-10 h-96 w-96 rounded-full bg-[#3D152A]/8 blur-3xl" aria-hidden="true"></div>

    <div class="container-px relative z-10">
        <!-- Section Header -->
        <div class="max-w-3xl mx-auto text-center">
            <div class="reveal-init">
                <span class="eyebrow">Our Packages</span>
            </div>
            <div class="reveal-init delay-100 mt-4">
                <h2 class="font-display text-3xl font-extrabold leading-[1.08] tracking-tight text-[#14070D] sm:text-4xl lg:text-5xl">
                    Pricing Fit For <span class="text-gradient-gold">Every Author</span>
                </h2>
            </div>
            <div class="mx-auto mt-5 mb-5 flex items-center justify-center gap-2.5">
                <span class="h-[3px] w-8 rounded-full bg-gradient-to-r from-transparent to-gold"></span>
                <span class="h-2.5 w-2.5 -skew-x-12 rounded-[3px] bg-gold-gradient shadow-gold"></span>
                <span class="h-[3px] w-16 rounded-full bg-gold-gradient"></span>
                <span class="h-2.5 w-2.5 -skew-x-12 rounded-[3px] bg-gold-gradient shadow-gold"></span>
                <span class="h-[3px] w-8 rounded-full bg-gradient-to-l from-transparent to-gold"></span>
            </div>
            <div class="reveal-init delay-200">
                <p class="mt-5 font-body text-base leading-relaxed sm:text-lg mx-auto max-w-2xl text-[#551E3C]/85">
                    Transparent, all-inclusive packages with full rights included. Choose your tier and keep 100% of your royalties, with a dedicated team of experts on every book.
                </p>
            </div>
        </div>

        <!-- 3 Tiered Cards Layout -->
        <div class="mt-16 grid items-center gap-8 [perspective:1500px] lg:grid-cols-3">
            <?php foreach ($packages as $pkg): ?>
                <div class="<?= $pkg['is_featured'] ? 'lg:-mt-4 lg:mb-4 z-20' : 'z-10' ?> reveal-init">
                    <div class="card-3d relative rounded-[2rem] pricing-card-box" data-package-card data-lenis-prevent="true">
                        <div class="relative flex h-[620px] flex-col rounded-[2rem] p-8 sm:p-9 transition-all duration-300 <?= $pkg['is_featured'] ? 'card-burgundy-featured border-2 !border-[#D49B6A]/70 shadow-[0_25px_60px_-15px_rgba(20,7,13,0.4),0_0_35px_rgba(201,142,94,0.2)]' : 'border border-[#E8DDD0] bg-white text-[#14070D] shadow-sm hover:border-[#C98E5E] hover:shadow-xl' ?>" data-lenis-prevent="true">
                            
                            <?php if ($pkg['is_featured']): ?>
                                <div class="absolute left-1/2 -translate-x-1/2" style="top: -14px; z-index: 30;">
                                    <span class="inline-flex items-center gap-1.5 rounded-full px-4 py-1.5 font-display text-[11px] font-bold uppercase tracking-widest shadow-xl" style="background: linear-gradient(135deg, #FFFFFF 0%, #EED3BE 40%, #C98E5E 100%); border: 1px solid rgba(255, 255, 255, 0.8); box-shadow: 0 6px 20px rgba(201, 142, 94, 0.45); color: #000000 !important;">
                                        <span class="inline-flex shrink-0 text-black" style="color: #000000 !important;"><?= get_icon('sparkle', 'w-3 h-3 !text-black') ?></span>
                                        <span class="font-bold tracking-widest text-black" style="color: #000000 !important;"><?= e($pkg['badge']) ?></span>
                                    </span>
                                </div>
                            <?php endif; ?>

                            <div class="<?= $pkg['is_featured'] ? 'pt-2' : '' ?>">
                                <p class="font-display text-xs font-bold uppercase tracking-[0.2em] <?= $pkg['is_featured'] ? 'text-[#EED3BE]' : 'text-[#8E562A]' ?>">
                                    <?= ($pkg['is_featured'] && strtolower($pkg['tier']) === 'most popular') ? 'Flagship Suite' : e($pkg['tier']) ?>
                                </p>
                                <h3 class="mt-2 font-display text-2xl font-bold <?= $pkg['is_featured'] ? 'text-cream' : 'text-[#14070D]' ?>">
                                    <?= e($pkg['name']) ?>
                                </h3>
                            </div>
                            <p class="mt-2 font-body text-sm <?= $pkg['is_featured'] ? 'text-cream/75' : 'text-[#551E3C]/80' ?> line-clamp-2">
                                <?= e($pkg['desc']) ?>
                            </p>

                            <!-- Scrollable Feature List (6 points initially visible, scroll for remaining) -->
                            <div class="relative mt-6 border-t pt-5 <?= $pkg['is_featured'] ? 'border-white/15' : 'border-[#E8DDD0]' ?>" data-lenis-prevent="true">
                                <ul class="package-features-list space-y-3 overflow-y-auto overscroll-contain pr-2 [scrollbar-width:thin] [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-thumb]:bg-[#C98E5E]/60 [&::-webkit-scrollbar-track]:bg-transparent [&::-webkit-scrollbar]:w-1.5" style="max-height: 240px; overscroll-behavior: contain;" data-lenis-prevent="true">
                                    <?php foreach ($pkg['features'] as $feat): ?>
                                        <li class="flex items-start gap-3">
                                            <span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full <?= $pkg['is_featured'] ? 'bg-[#C98E5E] text-[#14070D]' : 'bg-[#FAF6F0] text-[#8E562A] border border-[#E8DDD0]' ?>">
                                                <?= get_icon('check', 'w-3 h-3') ?>
                                            </span>
                                            <span class="font-body text-[14px] leading-relaxed <?= $pkg['is_featured'] ? 'text-cream/90' : 'text-[#14070D]/85' ?>">
                                                <?= e($feat) ?>
                                            </span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                            <p class="mt-3 flex items-center justify-between font-body text-[11px] <?= $pkg['is_featured'] ? 'text-cream/60' : 'text-[#551E3C]/60' ?>">
                                <span class="flex items-center gap-1.5">
                                    <?= get_icon('chevron-down', 'w-3 h-3 text-[#C98E5E]') ?>
                                    <span>Scroll to view all <?= count($pkg['features']) ?> inclusions</span>
                                </span>
                            </p>

                            <div class="mt-5">
                                <a href="#contact" class="<?= $pkg['is_featured'] ? 'btn-gold' : 'btn-royal' ?> w-full text-center justify-center">
                                    <span><?= e($pkg['btn_text']) ?></span>
                                    <?= get_icon('arrow-right', 'shrink-0') ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-12 text-center reveal-init delay-300">
            <a class="btn-ghost" href="#contact">
                Compare all packages
                <?= get_icon('arrow-right', 'shrink-0') ?>
            </a>
        </div>
    </div>
</section>
