<?php
/**
 * Proof of Craft - Before & After Comparison Component
 * 100% Pure Custom CSS Matching assets/sections-new-design/before-after-dsign.jpg
 */

$books = require __DIR__ . '/../data/books.php';
$items = $books['before_after'];
?>
<section id="before-after" class="ba-section">
    <!-- Ambient Corner Decorative Elements -->
    <div class="ba-corner-books">
        <img src="<?= asset_url('/assets/before-after-bg-element01.avif') ?>" alt="Antique Books Craft" loading="lazy">
    </div>
    <div class="ba-corner-pen">
        <img src="<?= asset_url('/assets/before-after-bg-element02.avif') ?>" alt="Fountain Pen Element" loading="lazy">
    </div>

    <div class="ba-container-wrap">
        <div class="ba-grid">
            <!-- Left Info Column -->
            <div class="ba-info-col">
                <span class="ba-eyebrow">
                    Proof Of Craft
                </span>

                <h2 class="ba-heading">
                    Before &amp; <span class="ba-heading-after">After</span>
                </h2>

                <p class="ba-desc">
                    The same book, two very different futures. See how an expert redesign turns an overlooked title into a cover readers can't scroll past.
                </p>

                <!-- Stat Glass Badge -->
                <div class="ba-stat-card">
                    <div class="ba-stat-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                            <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                        </svg>
                    </div>
                    <div>
                        <span class="ba-stat-value">200+</span>
                        <span class="ba-stat-label">Covers Transformed</span>
                    </div>
                </div>
            </div>

            <!-- Right Dual Interactive Slider Cards -->
            <?php foreach ($items as $idx => $item): ?>
                <div class="ba-glass-card <?= $idx === 1 ? 'ba-glass-card-staggered' : '' ?>">
                    <!-- Card Topbar -->
                    <div class="ba-card-topbar">
                        <span class="ba-genre-pill">
                            <?= e($item['genre']) ?>
                        </span>
                        <div class="ba-sparkle-btn" aria-hidden="true">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 0L14.59 9.41L24 12L14.59 14.59L12 24L9.41 14.59L0 12L9.41 9.41L12 0Z"/>
                            </svg>
                        </div>
                    </div>

                    <h3 class="ba-card-title">
                        <?= e($item['title']) ?>
                    </h3>

                    <!-- Stage with Draggable Before / After Interactive Slider -->
                    <div class="ba-stage">
                        <div class="ba-book-wrap">
                            <div class="ba-container" style="--ba-pos: 50%;">
                                <!-- After Image (Base Layer) -->
                                <img src="<?= asset_url($item['after']) ?>" alt="<?= e($item['title']) ?> After" class="ba-img-after">

                                <!-- Before Image (Clipped Layer, Never Distorted) -->
                                <img src="<?= asset_url($item['before']) ?>" alt="<?= e($item['title']) ?> Before" class="ba-img-before">

                                <!-- Handle Divider Line & Circle Button -->
                                <div class="ba-handle">
                                    <div class="ba-handle-circle" aria-label="Drag comparison handle">
                                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="8 7 3 12 8 17"></polyline>
                                            <polyline points="16 7 21 12 16 17"></polyline>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Bottom Status Indicator Pills overlapping book corners -->
                            <div class="ba-book-badges">
                                <span class="ba-badge-before">Before</span>
                                <span class="ba-badge-after">After</span>
                            </div>
                        </div>
                    </div>

                    <!-- Interactive Drag Caption -->
                    <p class="ba-instruction">
                        Drag the handle to reveal the Bindwell Press transformation.
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
