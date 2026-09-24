<?php
/**
 * Six-Step Publishing Process Component - Redesigned to Match User Reference Exactly
 */

$process_data = require __DIR__ . '/../data/publishing_steps.php';
$steps = $process_data['steps'];
?>
<section id="process" class="steps-redesign-section">
    <!-- Background Corner Elements (Foliage & Golden Swirls from User Assets) -->
    <div class="steps-corner-el-1" aria-hidden="true">
        <img src="<?= asset_url('/assets/steps-images/top-left.avif') ?>" alt="" class="w-full h-auto object-contain">
    </div>
    <div class="steps-corner-el-2" aria-hidden="true">
        <img src="<?= asset_url('/assets/steps-images/top-right.avif') ?>" alt="" class="w-full h-auto object-contain">
    </div>
    <div class="steps-corner-el-3" aria-hidden="true">
        <img src="<?= asset_url('/assets/steps-images/bottom-left.avif') ?>" alt="" class="w-full h-auto object-contain">
    </div>
    <div class="steps-corner-el-4" aria-hidden="true">
        <img src="<?= asset_url('/assets/steps-images/bottom-right.avif') ?>" alt="" class="w-full h-auto object-contain">
    </div>

    <div class="container-px relative z-10 max-w-7xl mx-auto">
        <!-- Section Header -->
        <div class="max-w-3xl mx-auto text-center">
            <!-- Subheading Pill -->
            <div class="reveal-init flex items-center justify-center">
                <span class="eyebrow inline-flex items-center" style="background: rgba(201, 142, 94, 0.09) !important; border: 1px solid rgba(201, 142, 94, 0.38) !important;">Six Steps. Zero Guesswork.</span>
            </div>

            <!-- Main Heading -->
            <div class="reveal-init delay-100 mt-4">
                <h2 class="font-display text-3xl font-extrabold leading-[1.12] tracking-tight text-[#14070D] sm:text-4xl lg:text-5xl">
                    How We Publish <span class="steps-title-gold">Your Book</span>
                </h2>
            </div>

            <div class="mx-auto mt-5 flex items-center justify-center gap-2.5">
                <span class="h-[3px] w-8 rounded-full bg-gradient-to-r from-transparent to-gold"></span>
                <span class="h-2.5 w-2.5 -skew-x-12 rounded-[3px] bg-gold-gradient shadow-gold"></span>
                <span class="h-[3px] w-16 rounded-full bg-gold-gradient"></span>
                <span class="h-2.5 w-2.5 -skew-x-12 rounded-[3px] bg-gold-gradient shadow-gold"></span>
                <span class="h-[3px] w-8 rounded-full bg-gradient-to-l from-transparent to-gold"></span>
            </div>

            <!-- Subtitle Description -->
            <div class="reveal-init delay-200">
                <p class="mt-3 font-body text-sm sm:text-base leading-relaxed mx-auto max-w-2xl text-[#551E3C]/80">
                    A clear, collaborative path that turns your manuscript into a published,<br class="hidden sm:inline"> best-selling book, with you in control at every step.
                </p>
            </div>
        </div>

        <!-- Main Content: Left 6 Books Glass Card + Right 6 Step Cards -->
        <div class="steps-main-layout">
            <!-- Left: Glass Acrylic Showcase Card with book-image.avif -->
            <div class="reveal-init flex items-center justify-center">
                <div class="steps-showcase-frame">
                    <img src="<?= asset_url('/assets/steps-images/book-image.avif') ?>"
                         alt="Bindwell Press Published Books - Six Steps"
                         loading="lazy"
                         decoding="async"
                         class="steps-showcase-img">
                </div>
            </div>

            <!-- Right: 2 Columns x 3 Rows of Step Cards -->
            <div class="steps-cards-grid">
                <?php foreach ($steps as $idx => $s): ?>
                    <div class="reveal-init delay-<?= ($idx % 2 + 1) * 100 ?>">
                        <div class="steps-card group">
                            <!-- Top Step Badge & Number -->
                            <div class="steps-card-header">
                                <div class="steps-icon-badge">
                                    <?= get_icon($s['icon'], 'w-4 h-4 text-white') ?>
                                </div>
                                <div class="steps-badge-label">
                                    <span class="steps-badge-text">
                                        Step <?= e($s['num']) ?>
                                    </span>
                                    <span class="steps-badge-line"></span>
                                </div>
                            </div>

                            <!-- Step Title -->
                            <h3 class="steps-card-title">
                                <?= e($s['title']) ?>
                            </h3>

                            <!-- Step Description -->
                            <p class="steps-card-desc">
                                <?= e($s['desc']) ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Bottom Centered CTA Button -->
        <div class="mt-12 sm:mt-14 text-center reveal-init delay-300">
            <a href="#contact" class="btn-gold uppercase font-display tracking-wider text-xs px-8 py-3.5 shadow-lg hover:shadow-xl">
                Start Your Publishing Journey
                <?= get_icon('arrow-right', 'w-4 h-4 shrink-0') ?>
            </a>
        </div>
    </div>
</section>
