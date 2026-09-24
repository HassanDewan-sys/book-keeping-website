<?php
/**
 * Five Reasons Authors Choose Bindwell Press Component - Asymmetrical Cornerstone Redesign
 */

$reasons = require __DIR__ . '/../data/why_us.php';
$flagship_reason = $reasons[0] ?? null;
$pillar_reasons = array_slice($reasons, 1);
?>
<section id="why-us" class="relative overflow-hidden bg-[#FAF6F0] py-24 sm:py-32">
    <!-- Ambient Lighting -->
    <div class="pointer-events-none absolute -left-28 top-20 h-96 w-96 rounded-full bg-[#C98E5E]/10 blur-3xl" aria-hidden="true"></div>
    <div class="pointer-events-none absolute -right-28 bottom-10 h-96 w-96 rounded-full bg-[#3D152A]/8 blur-3xl" aria-hidden="true"></div>

    <div class="container-px relative z-10">
        <!-- Section Header -->
        <div class="max-w-3xl mx-auto text-center">
            <div class="reveal-init">
                <span class="eyebrow">Why Authors Choose Bindwell Press</span>
            </div>
            <div class="reveal-init delay-100 mt-4">
                <h2 class="font-display text-3xl font-extrabold leading-[1.08] tracking-tight text-[#14070D] sm:text-4xl lg:text-5xl">
                    Five Reasons Authors <span class="text-gradient-gold">Choose Us</span>
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
                    We're not a faceless mill. We're a boutique author-first studio obsessed with one thing: making your book impossible to ignore.
                </p>
            </div>
        </div>

        <!-- Asymmetric Cornerstone Layout -->
        <div class="mt-16 grid gap-8 lg:grid-cols-12 items-stretch">
            
            <?php if ($flagship_reason): ?>
                <!-- LEFT: Flagship Cornerstone Card (Spans 5 Columns) -->
                <div class="reveal-init lg:col-span-5 h-full">
                    <div class="card-3d h-full p-8 sm:p-10 text-cream shadow-2xl flex flex-col justify-between group" style="background: linear-gradient(180deg, #1C0B16 0%, #150610 100%); border: 1px solid rgba(255, 255, 255, 0.08); border-radius: 28px;">
                        <div>
                            <div class="flex items-center justify-between">
                                <span class="inline-flex items-center gap-1.5 rounded-full px-3.5 py-1 text-[11px] font-bold uppercase tracking-widest text-white" style="background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.22);">
                                    <?= get_icon('sparkle', 'w-3 h-3 text-[#EED3BE]') ?>
                                    <span>Core Difference</span>
                                </span>
                                <span class="font-display text-5xl font-extrabold text-[#D49B6A]/35 transition-colors group-hover:text-[#D49B6A]/60">
                                    01
                                </span>
                            </div>

                            <h3 class="mt-8 font-display text-2xl sm:text-3xl font-bold text-cream leading-tight">
                                <?= e($flagship_reason['title']) ?>
                            </h3>
                            <p class="mt-4 font-body text-base text-cream/80 leading-relaxed">
                                <?= e($flagship_reason['desc']) ?>
                            </p>
                        </div>

                        <div class="mt-10 pt-6 border-t border-white/10">
                            <div class="flex items-center gap-3">
                                <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#C98E5E]/20 text-[#EED3BE] border border-[#C98E5E]/40">
                                    <?= get_icon('shield-check', 'w-5 h-5') ?>
                                </span>
                                <div>
                                    <div class="font-display text-xs font-bold uppercase tracking-wider text-[#EED3BE]">Author-First Charter</div>
                                    <div class="font-body text-[11px] text-cream/60">Every project backed by full copyright retention</div>
                                </div>
                            </div>
                            <div class="mt-6">
                                <a href="#contact" class="btn-gold w-full text-center justify-center uppercase tracking-wider text-xs">
                                    <span>Experience The Difference</span>
                                    <?= get_icon('arrow-right', 'shrink-0') ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <!-- RIGHT: 2x2 Pillar Cards Grid (Spans 7 Columns) -->
            <div class="lg:col-span-7 grid gap-6 sm:grid-cols-2">
                <?php foreach ($pillar_reasons as $idx => $r): ?>
                    <div class="reveal-init delay-<?= ($idx + 1) * 120 ?>">
                        <div class="card-3d h-full rounded-[1.75rem]">
                            <div class="group flex h-full flex-col justify-between rounded-[1.75rem] border border-[#E8DDD0] bg-white p-7 shadow-sm transition-all duration-300 hover:border-[#C98E5E] hover:shadow-xl hover:-translate-y-1">
                                <div>
                                    <div class="flex items-center justify-between">
                                        <span class="font-display text-3xl font-extrabold text-[#E8DDD0] transition-colors group-hover:text-[#C98E5E]">
                                            0<?= e($idx + 2) ?>
                                        </span>
                                        <span class="flex h-8 w-8 items-center justify-center rounded-full bg-[#FAF6F0] text-[#8E562A] border border-[#E8DDD0] group-hover:border-[#C98E5E] transition-colors">
                                            <?= get_icon('sparkle', 'w-3.5 h-3.5') ?>
                                        </span>
                                    </div>

                                    <h3 class="mt-5 font-display text-lg font-bold text-[#14070D] group-hover:text-[#8E562A] transition-colors leading-snug">
                                        <?= e($r['title']) ?>
                                    </h3>
                                    <p class="mt-2 font-body text-sm leading-relaxed text-[#551E3C]/80">
                                        <?= e($r['desc']) ?>
                                    </p>
                                </div>

                                <div class="mt-6 pt-4 border-t border-[#E8DDD0]/50">
                                    <span class="font-body text-[11px] font-bold uppercase tracking-wider text-[#8E562A] group-hover:text-[#14070D] transition-colors flex items-center gap-1">
                                        <span>Guaranteed Standard</span>
                                        <?= get_icon('arrow-right', 'w-3 h-3 transition-transform group-hover:translate-x-1') ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</section>
