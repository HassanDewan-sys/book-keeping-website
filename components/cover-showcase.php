<?php
/**
 * Covers That Sell - Category Filterable Portfolio Component
 */

$books = require __DIR__ . '/../data/books.php';
$portfolio = $books['portfolio_covers'];
$categories = ['All', 'Fantasy', 'Thriller', 'Romance', 'Sci-Fi', 'Mystery', 'Biography', 'Non-Fiction'];
?>
<section id="showcase" class="ps-section">
    <!-- Ambient Blooms -->
    <div class="ps-bloom-1"></div>
    <div class="ps-bloom-2"></div>

    <div class="ps-container">
        <!-- Section Header -->
        <div class="ps-header">
            <span class="ps-eyebrow">
                
                Award-Winning Portfolio
            </span>
            <h2 class="ps-heading">
                Covers That <span class="ps-heading-gold">Sell</span>
            </h2>
            <div class="mx-auto mt-5 mb-5 flex items-center justify-center gap-2.5">
                <span class="h-[3px] w-8 rounded-full bg-gradient-to-r from-transparent to-gold"></span>
                <span class="h-2.5 w-2.5 -skew-x-12 rounded-[3px] bg-gold-gradient shadow-gold"></span>
                <span class="h-[3px] w-16 rounded-full bg-gold-gradient"></span>
                <span class="h-2.5 w-2.5 -skew-x-12 rounded-[3px] bg-gold-gradient shadow-gold"></span>
                <span class="h-[3px] w-8 rounded-full bg-gradient-to-l from-transparent to-gold"></span>
            </div>
            <p class="ps-desc">
                A curated selection of our custom book covers across all genres. Filter by category or tap any cover for an enlarged high-definition view.
            </p>
        </div>

        <!-- Filter Category Buttons -->
        <div class="ps-filter-wrap">
            <?php foreach ($categories as $idx => $cat): ?>
                <button type="button" data-filter="<?= e($cat) ?>" class="portfolio-filter-btn ps-filter-btn <?= $idx === 0 ? 'is-active' : '' ?>">
                    <?= e($cat) ?>
                </button>
            <?php endforeach; ?>
        </div>

        <!-- Covers Grid (4 columns on desktop, 3 tablet, 2 mobile) -->
        <div class="ps-grid">
            <?php foreach ($portfolio as $item): ?>
                <div class="portfolio-card-item ps-card-item image-has-rotate" data-genre="<?= e($item['genre']) ?>" onclick="openLightbox('<?= asset_url($item['image']) ?>', '<?= e($item['title']) ?> (<?= e($item['genre']) ?>)')">
                    <div class="image-rotate-wrapper woocommerce-product-image">
                        <!-- 3D Ground Shadow -->
                        <div class="image-rotate-shadow"></div>

                        <!-- Main Book Cover Face -->
                        <img 
                            src="<?= asset_url($item['image']) ?>" 
                            alt="<?= e($item['title']) ?> - Book cover" 
                            class="ps-cover-img"
                            loading="lazy"
                            decoding="async"
                        >

                        <!-- 3D Left Spine (Rotated 90deg on Y axis) -->
                        <div
                            class="rotate-before-image"
                            style="background-image: linear-gradient(rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.45)), url('<?= asset_url($item['image']) ?>');"
                        ></div>

                        <!-- Luxury Floating Title Pill on Hover -->
                        <div class="ps-hover-pill">
                            <span class="ps-hover-pill-genre"><?= e($item['genre']) ?></span>
                            <span class="ps-hover-pill-title"><?= e($item['title']) ?></span>
                            <span class="ps-hover-pill-hint">Click to enlarge &rarr;</span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
