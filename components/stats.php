<?php
/**
 * Numbers That Speak - Statistics Counters Component
 */

$stats = require __DIR__ . '/../data/stats.php';
?>
<section class="relative overflow-hidden bg-royal-gradient py-20 text-cream sm:py-24">
    <div class="pointer-events-none absolute -left-20 top-0 h-72 w-72 rounded-full bg-gold/15 blur-3xl"></div>
    <div class="pointer-events-none absolute -right-16 bottom-0 h-72 w-72 rounded-full bg-ruby-jewel/25 blur-3xl"></div>

    <div class="container-px relative">
        <div class="max-w-3xl mx-auto text-center">
            <div class="flex items-center gap-4 justify-center">
                <div>
                    <div class="reveal-init">
                        <span class="eyebrow eyebrow-light">Why Covers Matter</span>
                    </div>
                    <div class="reveal-init delay-100">
                        <h2 class="mt-4 font-display text-[1.9rem] font-bold leading-[1.05] tracking-tight sm:text-4xl lg:text-[3rem] text-cream">
                            Numbers That <span class="text-gradient-gold">Speak</span>
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
                <p class="mt-5 font-body text-base leading-relaxed sm:text-lg mx-auto max-w-2xl text-cream/80">
                    A decade of designing, editing and launching best-sellers, the proof is in the page count, the awards, and the authors who trust us.
                </p>
            </div>
        </div>

        <div class="mt-14 grid grid-cols-2 gap-6 sm:gap-8 lg:grid-cols-4">
            <?php foreach ($stats as $idx => $item): ?>
                <div class="rounded-3xl border border-white/10 bg-white/5 px-4 py-8 text-center backdrop-blur-sm transition duration-300 hover:border-gold/40 hover:bg-white/10 reveal-init delay-<?= ($idx + 1) * 100 ?>">
                    <div class="font-display text-4xl font-bold text-gradient-gold sm:text-5xl">
                        <span class="counter-number" data-target="<?= $item['target'] ?>">0</span><?= e($item['suffix']) ?>
                    </div>
                    <p class="mt-2 font-body text-sm uppercase tracking-wider text-cream/70"><?= e($item['label']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
