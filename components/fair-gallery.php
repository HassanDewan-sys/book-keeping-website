<?php
/**
 * Book Fair Moments Gallery Component
 * 100% Pure Custom CSS Matching assets/sections-new-design/book-fair-dsign.jpg
 */

$fairs = require __DIR__ . '/../data/fairs.php';
$moments = $fairs['moments'];
// Ensure continuous loop
$row1Moments = array_merge($moments, $moments);
$row2Moments = array_merge(array_reverse($moments), $moments);
?>

<section id="book-fair-moments" class="bf-section">
    <div class="bf-container-wrap">
        <!-- Top Header & 20+ Worldwide Badge -->
        <div class="bf-header-row">
            <!-- Left Info -->
            <div class="bf-info-col">
                <span class="bf-eyebrow">Book Fair Moments</span>

                <h2 class="bf-heading">
                    Meeting Authors On The <br>
                    <span class="bf-heading-accent">World Stage</span>
                </h2>

                <p class="bf-desc">
                    From Sydney to Frankfurt, here are real moments from Bindwell Press' booths, authors, editors and readers, together.
                </p>
            </div>

            <!-- Right Circular Medallion Badge (20+ Book Fairs Worldwide) -->
            <div class="bf-medallion">
                <span class="bf-medallion-num">20+</span>
                <span class="bf-medallion-text">
                    Book Fairs<br>Worldwide
                </span>
            </div>
        </div>

        <!-- Indicator Left -->
        <div class="bf-indicator-row">
            <span class="bf-indicator-text">&larr; SCROLLING LEFT</span>
        </div>
    </div>

    <!-- Track 1: Scrolling Left with Edge Fades -->
    <div class="bf-marquee-wrapper">
        <div class="bf-fade-left"></div>
        <div class="bf-fade-right"></div>

        <div class="bf-track bf-track-left">
            <?php foreach ($row1Moments as $idx => $item): 
                $isCircle = ($idx % 2 === 1);
            ?>
                <div class="bf-frame-item" onclick="openLightbox('<?= asset_url($item['image']) ?>', '<?= e($item['caption']) ?>')">
                    <div class="<?= $isCircle ? 'bf-frame-circle' : 'bf-frame-squircle' ?>">
                        <img src="<?= asset_url($item['image']) ?>" alt="<?= e($item['caption']) ?>" loading="lazy">
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Indicator Right (Between Row 1 & Row 2 on the right) -->
    <div class="bf-indicator-right-wrap">
        <span class="bf-indicator-text">SCROLLING RIGHT &rarr;</span>
    </div>

    <!-- Track 2: Scrolling Right with Edge Fades -->
    <div class="bf-marquee-wrapper">
        <div class="bf-fade-left"></div>
        <div class="bf-fade-right"></div>

        <div class="bf-track bf-track-right">
            <?php foreach ($row2Moments as $idx => $item): 
                $isCircle = ($idx % 2 === 0);
            ?>
                <div class="bf-frame-item" onclick="openLightbox('<?= asset_url($item['image']) ?>', '<?= e($item['caption']) ?>')">
                    <div class="<?= $isCircle ? 'bf-frame-circle' : 'bf-frame-squircle' ?>">
                        <img src="<?= asset_url($item['image']) ?>" alt="<?= e($item['caption']) ?>" loading="lazy">
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
