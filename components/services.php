<?php
/**
 * Author Services Grid Component
 */

$services = require __DIR__ . '/../data/services.php';
?>
<section id="services" class="relative overflow-hidden bg-cream py-20 sm:py-28">
    <div class="container-px">
        <div class="max-w-3xl mx-auto text-center">
            <div class="flex items-center gap-4 justify-center">
                <div>
                    <div class="reveal-init">
                        <span class="eyebrow">Everything Under One Roof</span>
                    </div>
                    <div class="reveal-init delay-100">
                        <h2 class="mt-4 font-display text-[1.9rem] font-bold leading-[1.05] tracking-tight sm:text-4xl lg:text-[3rem] text-royal-700">
                            A Full Suite of <span class="text-gradient-gold">Author Services</span>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="mx-auto mt-5 flex items-center justify-center gap-2.5">
                <span class="h-[3px] w-8 rounded-full bg-gradient-to-r from-transparent to-gold"></span>
                <span class="h-2.5 w-2.5 -skew-x-12 rounded-[3px] bg-gold-gradient shadow-gold"></span>
                <span class="h-[3px] w-16 rounded-full bg-gold-gradient"></span>
                <span class="h-2.5 w-2.5 -skew-x-12 rounded-[3px] bg-gold-gradient shadow-gold"></span>
                <span class="h-[3px] w-8 rounded-full bg-gradient-to-l from-transparent to-gold"></span>
            </div>
            <div class="reveal-init delay-200">
                <p class="mt-5 font-body text-base leading-relaxed sm:text-lg mx-auto max-w-2xl text-ink/70">
                    Cover design leads the way, but every craft your book needs lives under one roof, coordinated by a single dedicated team.
                </p>
            </div>
        </div>

        <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <?php foreach ($services as $idx => $svc): ?>
                <div class="reveal-init delay-<?= ($idx % 3 + 1) * 100 ?>">
                    <div class="card-3d h-full rounded-3xl">
                        <a href="<?= e($svc['link']) ?>" class="group relative flex h-full flex-col rounded-3xl border p-5 sm:p-6 transition-all duration-300 hover:shadow-float <?= $svc['is_flagship'] ? 'border-[#C98E5E]/40 bg-gradient-to-br from-[#FAF6F0] via-white to-white shadow-md' : 'border-[#E8DDD0] bg-white shadow-card hover:border-[#C98E5E]' ?>">
                            <!-- Real High-Res Photography Banner -->
                            <div class="relative overflow-hidden rounded-2xl aspect-[16/10] w-full mb-5 bg-[#1F0C15]/5">
                                <img src="<?= asset_url($svc['image']) ?>" alt="<?= e($svc['title']) ?>" loading="lazy" decoding="async" class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-105">
                                <div class="absolute inset-0 bg-gradient-to-t from-[#14070D]/45 via-transparent to-transparent"></div>
                                <?php if ($svc['is_flagship']): ?>
                                    <span class="inline-flex items-center gap-1 rounded-full bg-gradient-to-r from-[#EED3BE] to-[#C98E5E] px-3 py-1 font-display text-[10px] font-extrabold uppercase tracking-wider text-[#14070D] absolute top-3 right-3 shadow-md">
                                        Flagship
                                    </span>
                                <?php endif; ?>
                            </div>

                            <h3 class="font-display text-xl font-bold text-royal-700 group-hover:text-[#8E562A] transition-colors"><?= e($svc['title']) ?></h3>
                            <p class="mt-2 flex-1 font-body text-sm leading-relaxed text-ink/70"><?= e($svc['desc']) ?></p>
                            <span class="mt-5 inline-flex items-center gap-1.5 font-body text-sm font-semibold text-gold-700 group-hover:text-[#8E562A]">
                                <span>Learn more</span>
                                <?= get_icon('chevron-down', 'shrink-0 -rotate-90 transition-transform group-hover:translate-x-1') ?>
                            </span>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>

            <!-- 8th Card: Explore All Services (Royal Velvet Gradient & Editorial Backdrop) -->
            <div class="reveal-init delay-300">
                <div id="complete-atelier-card" class="card-3d h-full rounded-3xl">
                    <a class="group relative flex h-full flex-col justify-between overflow-hidden rounded-3xl bg-royal-gradient p-6 sm:p-7 text-cream shadow-royal transition-all duration-500 hover:-translate-y-1 hover:shadow-float" href="#contact">
                        <div class="absolute inset-0 z-0 overflow-hidden" style="position: absolute; inset: 0; z-index: 0; overflow: hidden; background: #14070D;">
                            <img src="<?= asset_url('/assets/fair-gallery/08.png') ?>" alt="Bindwell Press Library &amp; Services" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" style="opacity: 0.35;">
                            <!-- Strong dark luxury overlay for 100% text legibility -->
                            <div style="position: absolute; inset: 0; background: linear-gradient(180deg, rgba(20, 7, 13, 0.82) 0%, rgba(20, 7, 13, 0.95) 100%);"></div>
                        </div>
                        <div class="relative z-10">
                            <span class="inline-flex items-center gap-1.5 rounded-full px-3 py-1 font-display text-[10px] font-bold uppercase tracking-wider text-[#EED3BE] bg-white/10 border border-white/15">
                                Complete Atelier
                            </span>
                            <h3 class="mt-4 font-display text-2xl font-bold text-cream">Explore All 17 Services</h3>
                            <p class="mt-3 font-body text-sm text-cream/75 leading-relaxed">Everything your book needs from manuscript coaching and cover design to global distribution and marketing.</p>
                        </div>
                        <div class="relative z-10 mt-6 pt-5 border-t border-white/15">
                            <span class="inline-flex items-center gap-2 font-body text-sm font-semibold text-[#EED3BE] group-hover:text-white transition-colors">
                                <span>View full catalog</span>
                                <?= get_icon('arrow-right', 'shrink-0 transition-transform group-hover:translate-x-1') ?>
                            </span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
