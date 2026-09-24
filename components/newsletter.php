<?php
/**
 * Claim Discount & Newsletter Component
 */
?>
<section class="bg-cream py-16">
    <div class="container-px">
        <div class="relative overflow-hidden rounded-3xl bg-royal-gradient px-6 py-12 text-center text-cream sm:px-12">
            <div class="pointer-events-none absolute -right-10 -top-10 h-40 w-40 rounded-full bg-gold/20 blur-2xl"></div>

            <div class="reveal-init">
                <span class="eyebrow !border-gold-300/40 !bg-white/10 !text-gold-300">
                    <?= get_icon('sparkle', 'shrink-0') ?>
                    <span>Signup Today</span>
                </span>
                <h2 class="mx-auto mt-4 max-w-2xl font-display text-2xl font-semibold sm:text-3xl">
                    Claim Your Discount &amp; Expert Publishing Tips
                </h2>
                <p class="mx-auto mt-3 max-w-xl font-body text-cream/75">
                    Join our newsletter for exclusive author discounts, cover-design secrets and best-seller strategies, straight to your inbox.
                </p>

                <div id="newsletter-feedback" class="hidden mt-4 text-sm font-semibold text-gold-300"></div>

                <form id="newsletter-form" class="mx-auto mt-7 flex max-w-md flex-col gap-3 sm:flex-row">
                    <input type="email" required placeholder="Enter your email" aria-label="Email address" class="w-full rounded-full border border-white/15 bg-white/10 px-5 py-3 font-body text-sm text-cream placeholder:text-cream/50 outline-none focus:border-gold">
                    <button type="submit" class="btn-gold shrink-0 !py-3">
                        Sign Up
                        <?= get_icon('arrow-right', 'shrink-0 w-4 h-4') ?>
                    </button>
                </form>
                <p class="mt-3 font-body text-xs text-cream/50">No spam, ever. Unsubscribe anytime.</p>
            </div>
        </div>
    </div>
</section>
