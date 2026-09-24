<?php
/**
 * Interactive Author Royalty & Earnings Calculator Component
 * Modern high-converting interactive feature exclusive to Bindwell Press
 */
?>
<section id="calculator" class="relative overflow-hidden bg-gradient-to-b from-[#FAF9F6] via-[#F1F5F9] to-[#FAF9F6] py-24 sm:py-28">
    <div class="pointer-events-none absolute -left-20 top-20 h-96 w-96 rounded-full bg-[#D4AF37]/10 blur-3xl"></div>
    <div class="pointer-events-none absolute -right-20 bottom-10 h-96 w-96 rounded-full bg-[#0F172A]/5 blur-3xl"></div>

    <div class="container-px relative">
        <!-- Section Header -->
        <div class="mx-auto max-w-3xl text-center">
            <div class="reveal-init">
                <span class="eyebrow">
                    <?= get_icon('sparkle', 'shrink-0 text-[#B88E18]') ?>
                    <span>Transparent Author Royalties</span>
                </span>
            </div>
            <h2 class="reveal-init delay-100 mt-5 font-display text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl lg:text-[2.75rem]">
                Calculate What You Keep. <br><span class="text-gradient-gold">100% Royalties, Zero Deductions.</span>
            </h2>
            <p class="reveal-init delay-200 mt-4 font-body text-base text-slate-600 sm:text-lg">
                Traditional publishers typically pay 10%–15% while holding your rights. At Bindwell Press, you retain 100% of your net royalties and full intellectual property.
            </p>
        </div>

        <!-- Calculator Card Grid -->
        <div class="reveal-init delay-300 mx-auto mt-14 max-w-5xl overflow-hidden rounded-3xl border border-slate-200/80 bg-white/95 p-6 shadow-[0_25px_60px_-15px_rgba(0,0,0,0.08)] backdrop-blur-xl sm:p-10 lg:grid lg:grid-cols-[1.1fr_0.9fr] lg:gap-12">
            <!-- Left: Interactive Sliders -->
            <div class="space-y-8">
                <div>
                    <div class="flex items-center justify-between">
                        <label for="calc-copies" class="font-display text-base font-semibold text-slate-900 sm:text-lg">Estimated Copies Sold</label>
                        <span id="calc-copies-val" class="rounded-lg bg-slate-900 px-3 py-1 font-mono text-sm font-bold text-[#F3E5AB]">5,000</span>
                    </div>
                    <div class="mt-3">
                        <input id="calc-copies" type="range" min="500" max="30000" step="500" value="5000" class="range-slider-gold">
                    </div>
                    <div class="mt-2 flex justify-between font-body text-xs text-slate-400">
                        <span>500 copies</span>
                        <span>15,000 copies</span>
                        <span>30,000 copies</span>
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="calc-price" class="font-display text-base font-semibold text-slate-900 sm:text-lg">Retail Cover Price (USD)</label>
                        <span id="calc-price-val" class="rounded-lg bg-slate-900 px-3 py-1 font-mono text-sm font-bold text-[#F3E5AB]">$19.99</span>
                    </div>
                    <div class="mt-3">
                        <input id="calc-price" type="range" min="7.99" max="34.99" step="1.00" value="19.99" class="range-slider-gold">
                    </div>
                    <div class="mt-2 flex justify-between font-body text-xs text-slate-400">
                        <span>$7.99</span>
                        <span>$19.99</span>
                        <span>$34.99</span>
                    </div>
                </div>

                <!-- Format Selection -->
                <div>
                    <span class="block font-display text-sm font-semibold text-slate-900">Format Standard</span>
                    <div class="mt-3 grid grid-cols-3 gap-3">
                        <button type="button" class="calc-format-btn active flex items-center justify-center rounded-xl border border-slate-900 bg-slate-900 py-2.5 font-body text-xs font-bold text-white transition hover:bg-slate-800" data-format="paperback" data-cost="4.20">
                            Paperback
                        </button>
                        <button type="button" class="calc-format-btn flex items-center justify-center rounded-xl border border-slate-200 bg-white py-2.5 font-body text-xs font-semibold text-slate-700 transition hover:border-[#D4AF37] hover:text-[#926C08]" data-format="hardcover" data-cost="7.50">
                            Hardcover
                        </button>
                        <button type="button" class="calc-format-btn flex items-center justify-center rounded-xl border border-slate-200 bg-white py-2.5 font-body text-xs font-semibold text-slate-700 transition hover:border-[#D4AF37] hover:text-[#926C08]" data-format="ebook" data-cost="0.00">
                            eBook
                        </button>
                    </div>
                </div>

                <div class="rounded-2xl border border-amber-200/50 bg-amber-50/50 p-4 text-xs leading-relaxed text-amber-900/80">
                    <strong class="font-bold text-amber-950">100% Rights Guaranteed:</strong> You never assign copyright or worldwide distribution rights. Every royalty payment is deposited directly to your bank account monthly.
                </div>
            </div>

            <!-- Right: Real-time Earnings Comparison -->
            <div class="mt-10 flex flex-col justify-between rounded-2xl bg-gradient-to-br from-[#060911] via-[#0D1527] to-[#151F36] p-6 text-white sm:p-8 lg:mt-0">
                <div>
                    <div class="flex items-center justify-between border-b border-white/10 pb-4">
                        <span class="font-body text-xs font-bold uppercase tracking-wider text-slate-400">Traditional Publishing</span>
                        <span class="font-body text-xs text-slate-400">~12% Royalty</span>
                    </div>
                    <div class="mt-3 flex items-baseline justify-between">
                        <span class="font-body text-sm text-slate-300">Traditional Author Payout:</span>
                        <span id="trad-earnings" class="font-mono text-xl font-bold text-slate-400 line-through">$11,994</span>
                    </div>

                    <div class="mt-8 flex items-center justify-between border-b border-[#D4AF37]/30 pb-4">
                        <span class="font-body text-xs font-bold uppercase tracking-wider text-[#F3E5AB]">Bindwell Press</span>
                        <span class="rounded-full bg-[#D4AF37]/20 px-2.5 py-0.5 font-mono text-[11px] font-bold text-[#F3E5AB]">100% Net Royalty</span>
                    </div>
                    <div class="mt-4">
                        <span class="font-body text-xs font-medium uppercase tracking-wider text-[#D4AF37]">Your Projected Earnings:</span>
                        <div id="canberra-earnings" class="mt-1 font-display text-4xl font-bold text-gradient-gold sm:text-5xl">$78,950</div>
                    </div>

                    <!-- Highlight Difference Badge -->
                    <div class="mt-6 rounded-xl border border-[#D4AF37]/40 bg-[#D4AF37]/10 p-3.5 text-center">
                        <span class="block font-body text-xs text-slate-300">You Keep An Estimated:</span>
                        <span id="diff-earnings" class="font-display text-lg font-bold text-[#F3E5AB] sm:text-xl">+$66,956 More With Bindwell Press</span>
                    </div>
                </div>

                <div class="mt-8">
                    <a href="#contact" class="btn-gold w-full text-center">
                        Claim 100% Of Your Royalties
                        <?= get_icon('arrow-right', 'shrink-0') ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
