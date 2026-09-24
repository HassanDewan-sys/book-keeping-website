<?php
/**
 * Free Mockup & Cover Audit CTA Component
 */
?>
<section class="bg-cream py-20 sm:py-24">
    <div class="container-px">
        <div class="relative overflow-hidden rounded-[2.5rem] border border-gold-200 bg-gradient-to-br from-gold-50 via-white to-cream p-8 shadow-float sm:p-12">
            <div class="pointer-events-none absolute -right-10 -top-10 h-48 w-48 rounded-full bg-gold/15 blur-3xl"></div>

            <div class="free-mockup-grid">
                <div class="reveal-init">
                    <span class="eyebrow">Free For Authors</span>
                    <h2 class="mt-5 font-display text-3xl font-semibold leading-tight text-royal-700 sm:text-4xl">
                        Get A <span class="text-gradient-gold">Free eBook Cover Mockup</span> &amp; Cover Audit
                    </h2>
                    <p class="mt-4 font-body text-base leading-relaxed text-ink/70">
                        See your book in the spotlight before you spend a cent. Request a free 3D mockup and a professional audit of your current cover, no strings attached.
                    </p>

                    <ul class="mt-7 grid gap-4 sm:grid-cols-3">
                        <li class="rounded-2xl border border-gold-100 bg-white/70 p-4 transition duration-300 hover:bg-white hover:shadow-card">
                            <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-gold-gradient text-royal-900 shadow-gold">
                                <?= get_icon('sparkle', 'w-5 h-5') ?>
                            </span>
                            <p class="mt-3 font-display text-sm font-semibold text-royal-700">Free eBook Cover Mockup</p>
                            <p class="mt-1 font-body text-xs leading-relaxed text-ink/60">A 3D mockup of your title on a Kindle, yours to keep and share.</p>
                        </li>
                        <li class="rounded-2xl border border-gold-100 bg-white/70 p-4 transition duration-300 hover:bg-white hover:shadow-card">
                            <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-gold-gradient text-royal-900 shadow-gold">
                                <?= get_icon('shield-check', 'w-5 h-5') ?>
                            </span>
                            <p class="mt-3 font-display text-sm font-semibold text-royal-700">Free Cover Audit</p>
                            <p class="mt-1 font-body text-xs leading-relaxed text-ink/60">An honest, expert critique of your current cover and how to make it sell.</p>
                        </li>
                        <li class="rounded-2xl border border-gold-100 bg-white/70 p-4 transition duration-300 hover:bg-white hover:shadow-card">
                            <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-gold-gradient text-royal-900 shadow-gold">
                                <?= get_icon('star', 'w-5 h-5') ?>
                            </span>
                            <p class="mt-3 font-display text-sm font-semibold text-royal-700">Exclusive New-Author Discount</p>
                            <p class="mt-1 font-body text-xs leading-relaxed text-ink/60">Claim a limited launch discount when you book your free consultation.</p>
                        </li>
                    </ul>

                    <div class="mt-8">
                        <a href="#contact" class="btn-gold">
                            Claim My Free Mockup
                            <?= get_icon('arrow-right', 'shrink-0') ?>
                        </a>
                    </div>
                </div>

                <!-- Right Side 3D Preview Cover (Auto-cycling with 3D Tilt Parallax) -->
                <?php
                $freeCovers = [
                    asset_url('/assets/home-slider/slider-08.jpg'),
                    asset_url('/assets/home-slider/slider-12.jpg'),
                    asset_url('/assets/home-slider/slider-04.jpg'),
                    asset_url('/assets/home-slider/slider-15.jpg'),
                    asset_url('/assets/home-slider/slider-07.jpg')
                ];
                $freeCoversJson = htmlspecialchars(json_encode($freeCovers), ENT_QUOTES, 'UTF-8');
                ?>
                <div class="free-mockup-right-col">
                    <div id="free-mockup-tilt-container" class="relative mx-auto h-[440px] w-full max-w-[340px] [perspective:1000px] flex items-center justify-center">
                        <!-- Ambient Glowing Depth Aura -->
                        <div class="pointer-events-none absolute h-60 w-60 rounded-full bg-[#C98E5E]/20 blur-3xl"></div>

                        <div id="free-mockup-tilt-card" class="relative overflow-hidden rounded-2xl cursor-grab" data-mockups='<?= $freeCoversJson ?>'>
                            <div class="mockup-cover-inner">
                                <img id="free-mockup-img" class="mockup-slide-img" alt="Free eBook Mockup by Bindwell Press" draggable="false" loading="lazy" decoding="async" src="<?= $freeCovers[0] ?>">
                                <div class="absolute inset-0 bg-gradient-to-t from-[#14070D]/40 via-transparent to-transparent pointer-events-none z-[2]"></div>
                            </div>
                            <!-- Bottom Floating Badge -->
                            <div class="mockup-bottom-badge absolute bottom-3 inset-x-3 rounded-xl bg-[#1F0C15]/85 backdrop-blur-md px-3 py-1.5 border border-white/10 flex items-center justify-between text-[#EED3BE] z-[5]">
                                <div class="flex items-center gap-1.5">
                                    <span class="font-display text-[10px] font-bold uppercase tracking-wider text-[#EED3BE]">3D eBook Mockup</span>
                                    <span class="font-body text-[9px] text-[#C98E5E]/70 hidden sm:inline">• Swipe or Drag</span>
                                </div>
                                <span id="free-mockup-counter" class="font-body text-[10px] font-bold text-[#C98E5E]">1 / 5</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
