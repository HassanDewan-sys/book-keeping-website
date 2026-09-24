<?php
/**
 * Mid-Page Callout Banner Component
 */
?>
<section class="relative overflow-hidden bg-royal-gradient py-20 text-cream sm:py-24">
    <div class="pointer-events-none absolute -left-24 top-1/2 h-80 w-80 -translate-y-1/2 rounded-full bg-gold/15 blur-3xl"></div>
    <div class="pointer-events-none absolute -right-24 top-1/2 h-80 w-80 -translate-y-1/2 rounded-full bg-ruby-jewel/25 blur-3xl"></div>

    <div class="container-px relative text-center">
        <div class="reveal-init">
            <?= get_icon('sparkle', 'mx-auto text-gold-300 w-11 h-11') ?>
            <h2 class="mx-auto mt-5 max-w-3xl font-display text-3xl font-semibold leading-tight sm:text-4xl lg:text-[2.8rem]">
                Your Story Deserves To Become The Next <span class="text-gradient-gold">Best-Seller</span>
            </h2>
            <p class="mx-auto mt-5 max-w-2xl font-body text-lg text-cream/80">
                You wrote the story. We'll give it the spotlight. Step into a community of authors who chose to publish with confidence, and never looked back.
            </p>
            <div class="mt-9 flex flex-col items-center justify-center gap-4 sm:flex-row">
                <a href="#contact" class="btn-gold">
                    Become a Best-Seller
                    <?= get_icon('arrow-right', 'shrink-0') ?>
                </a>
                <a href="tel:<?= e(SITE_PHONE_RAW) ?>" class="flex items-center gap-3 font-body text-cream/85 transition hover:text-gold-300">
                    <span class="flex h-12 w-12 items-center justify-center rounded-full border border-white/20 bg-white/5">
                        <?= get_icon('phone', 'shrink-0 text-gold-300 w-5 h-5') ?>
                    </span>
                    <span class="text-left">
                        <span class="block text-xs uppercase tracking-wider text-cream/60">Talk to an expert</span>
                        <span class="font-display text-lg font-semibold"><?= e(SITE_PHONE) ?></span>
                    </span>
                </a>
            </div>
        </div>
    </div>
</section>
