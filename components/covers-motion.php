<?php
/**
 * Covers in Motion - 3D Circle Carousel Showcase
 * Pure Custom CSS & Three.js 3D Cylindrical Ring
 */

$books = require __DIR__ . '/../data/books.php';
$portfolio = $books['portfolio_covers'] ?? [];
$marquee = $books['marquee'] ?? [];

// Select 14 distinct covers for the 3D circle carousel
$selectedCovers = array_slice($portfolio, 0, 14);
$carouselData = [];
foreach ($selectedCovers as $item) {
    $carouselData[] = [
        'title' => $item['title'] ?? 'Bestselling Book',
        'genre' => $item['genre'] ?? 'Publishing',
        'image' => asset_url($item['image'])
    ];
}
$shelfJson = htmlspecialchars(json_encode($carouselData), ENT_QUOTES, 'UTF-8');
$allCovers = array_merge($marquee, $marquee);
?>
<section id="covers-motion" class="cm-section">
    <!-- Ambient Blooms -->
    <div class="cm-bloom-1"></div>
    <div class="cm-bloom-2"></div>

    <div class="cm-container">
        <!-- Section Header -->
        <div class="cm-header-row">
            <div class="cm-header-text">
                <span class="cm-eyebrow">
                    
                    Covers In Motion
                </span>
                <h2 class="cm-title">
                    Stand Out on <span class="cm-title-gold">Every Shelf</span>
                </h2>
                <div class="mx-auto mt-5 mb-5 flex items-center justify-left gap-2.5">
                    <span class="h-[3px] w-8 rounded-full bg-gradient-to-r from-transparent to-gold"></span>
                    <span class="h-2.5 w-2.5 -skew-x-12 rounded-[3px] bg-gold-gradient shadow-gold"></span>
                    <span class="h-[3px] w-16 rounded-full bg-gold-gradient"></span>
                    <span class="h-2.5 w-2.5 -skew-x-12 rounded-[3px] bg-gold-gradient shadow-gold"></span>
                    <span class="h-[3px] w-8 rounded-full bg-gradient-to-l from-transparent to-gold"></span>
                </div>
                <p class="cm-desc">
                    Experience our bestselling covers in an interactive 3D circle showcase. Drag horizontally or click any book to inspect its craft.
                </p>
            </div>
            <div class="cm-header-cta">
                <a class="cm-cta-btn" href="#showcase">
                    <span>Browse Full Portfolio</span>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </a>
            </div>
        </div>

        <!-- 3D Circle Carousel Stage -->
        <div class="cm-carousel-stage" id="shelf-3d-wrapper" data-covers='<?= $shelfJson ?>'>
            <!-- WebGL 3D Canvas Container -->
            <div id="shelf-3d-canvas" class="cm-canvas"></div>

            <!-- Fallback Marquee (Only visible if WebGL is unavailable) -->
            <div id="shelf-fallback" class="cm-fallback">
                <div class="cm-fallback-track">
                    <?php foreach ($allCovers as $item): ?>
                        <div class="cm-fallback-card" onclick="openLightbox('<?= asset_url($item['image']) ?>', '<?= e($item['alt'] ?? 'Book Cover') ?>')">
                            <img alt="<?= e($item['alt'] ?? 'Book Cover') ?>" class="cm-fallback-img" src="<?= asset_url($item['image']) ?>">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Stage Controls Overlay -->
            <div class="cm-controls-bar">
                <button type="button" class="cm-nav-btn cm-nav-prev" id="cm-prev-btn" aria-label="Previous book">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </button>

                <div class="cm-drag-hint">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="7 8 3 12 7 16"></polyline>
                        <polyline points="17 8 21 12 17 16"></polyline>
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                    </svg>
                    <span>Drag to spin 3D carousel &bull; Click cover to preview</span>
                </div>

                <button type="button" class="cm-nav-btn cm-nav-next" id="cm-next-btn" aria-label="Next book">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</section>

