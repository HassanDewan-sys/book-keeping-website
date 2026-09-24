<?php
/**
 * Frequently Asked Questions Component
 * Elevated Split Layout with Editorial Photography & Glassmorphic Accordion
 */

$faqs = require __DIR__ . '/../data/faqs.php';
?>

<section id="faq" class="relative overflow-hidden py-24 sm:py-32" style="background: linear-gradient(180deg, #FAF6F0 0%, #F5EDE3 50%, #FAF6F0 100%); color: #14070D;">
    <!-- Ambient Warm Blobs -->
    <div class="pointer-events-none absolute -top-32 left-10 h-96 w-96 rounded-full bg-[#EED3BE]/30 blur-[130px]"></div>
    <div class="pointer-events-none absolute -bottom-32 right-10 h-96 w-96 rounded-full bg-[#C98E5E]/15 blur-[130px]"></div>

    <div class="container-px relative z-10 max-w-7xl mx-auto">
        <div class="faq-split-grid">
            
            <!-- Left Column: Editorial Author Library Photography & Direct Help Card -->
            <div class="space-y-6">
                <!-- Eyebrow & Mini Title -->
                <div>
                    <div class="inline-flex items-center gap-2 rounded-full px-4 py-1.5 backdrop-blur-md" style="background: rgba(201, 142, 94, 0.1); border: 1px solid rgba(201, 142, 94, 0.35);">
                        <span class="inline-block h-1.5 w-1.5 rounded-full bg-[#C98E5E]"></span>
                        <span class="font-syne text-[11px] font-bold tracking-[0.22em] text-[#8E562A] uppercase">Questions &amp; Answers</span>
                    </div>

                    <h2 class="mt-4 font-display text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight tracking-tight text-[#14070D]">
                        Frequently Asked <br>
                        <span style="background: linear-gradient(135deg, #C98E5E 0%, #8E562A 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Questions</span>
                    </h2>

                    <p class="mt-3 font-body text-sm sm:text-base leading-relaxed text-[#14070D]/75">
                        Everything you need to know about publishing with confidence. Still curious? Our team is one message away.
                    </p>
                </div>

                <!-- Editorial Visual Frame -->
                <div class="relative overflow-hidden rounded-[28px] p-2 shadow-xl" style="background: rgba(255, 255, 255, 0.8); border: 2px solid rgba(255, 255, 255, 0.95); box-shadow: 0 20px 50px rgba(180, 140, 110, 0.15);">
                    <div class="relative aspect-[4/3] rounded-[22px] overflow-hidden bg-[#14070D]">
                        <img src="<?= asset_url('assets/footer-background.avif') ?>" alt="Author Library & Literary Consultation" class="w-full h-full object-cover object-center transition-transform duration-700 hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#14070D]/80 via-transparent to-transparent"></div>

                        <!-- Floating Stat Badge inside Photo -->
                        <div class="absolute bottom-4 left-4 right-4 flex items-center justify-between p-3.5 rounded-2xl backdrop-blur-md" style="background: rgba(20, 7, 13, 0.75); border: 1px solid rgba(220, 160, 105, 0.35);">
                            <div>
                                <span class="block font-syne text-[10px] font-bold uppercase tracking-wider text-[#EED3BE]">Average Response Time</span>
                                <span class="block font-display text-sm font-semibold text-[#FAF6F0]">&lt; 24 Hours</span>
                            </div>
                            <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-[#EED3BE]">
                                <span class="h-2 w-2 rounded-full bg-emerald-400 animate-ping"></span>
                                Online Now
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Direct Help Card -->
                <div class="rounded-2xl p-6 backdrop-blur-md transition-all duration-300 hover:shadow-lg" style="background: rgba(255, 255, 255, 0.85); border: 1px solid rgba(232, 221, 208, 0.8); box-shadow: 0 10px 30px rgba(180, 140, 110, 0.08);">
                    <div class="flex items-center gap-3.5 mb-3">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center shrink-0" style="background: linear-gradient(135deg, #EED3BE, #C98E5E); color: #14070D;">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z"/></svg>
                        </div>
                        <div>
                            <h4 class="font-display text-base font-bold text-[#14070D]">Have More Questions?</h4>
                            <p class="font-body text-xs text-[#14070D]/60">Speak directly with an experienced editor.</p>
                        </div>
                    </div>

                    <a href="#contact" class="btn-gold w-full text-center flex items-center justify-center gap-2 group py-2.5 text-xs">
                        <span>TALK WITH AN EDITOR</span>
                        <span class="transition-transform duration-300 group-hover:translate-x-1">&rarr;</span>
                    </a>
                </div>
            </div>

            <!-- Right Column: Accordion Items -->
            <div class="space-y-4">
                <?php foreach ($faqs as $idx => $faq): 
                    $isOpen = ($idx === 0);
                ?>
                    <div class="accordion-item overflow-hidden rounded-2xl border transition-all duration-300 <?= $isOpen ? 'border-[#C98E5E] bg-white shadow-lg is-open' : 'border-[#E8DDD0] bg-white/80 hover:border-[#C98E5E]/50' ?>" style="backdrop-filter: blur(8px);">
                        <button type="button" class="accordion-button flex w-full items-center justify-between gap-4 px-6 py-5 text-left cursor-pointer transition-colors duration-200" aria-expanded="<?= $isOpen ? 'true' : 'false' ?>">
                            <span class="font-display text-base sm:text-lg font-bold text-[#14070D] group-hover:text-[#8E562A]"><?= e($faq['question']) ?></span>
                            <span class="accordion-icon flex h-9 w-9 shrink-0 items-center justify-center rounded-full transition-all duration-300 <?= $isOpen ? 'bg-[#C98E5E] text-white shadow-md rotate-180' : 'bg-[#F3ECE2] text-[#8E562A]' ?>">
                                <svg class="w-4 h-4 transition-transform duration-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 9l6 6 6-6"/></svg>
                            </span>
                        </button>
                        <div class="accordion-content <?= $isOpen ? '' : 'hidden' ?>">
                            <div class="accordion-inner">
                                <p class="px-6 pb-6 pt-1 font-body text-sm sm:text-[15px] leading-relaxed text-[#14070D]/75 border-t border-[#FAF6F0]">
                                    <?= e($faq['answer']) ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</section>
