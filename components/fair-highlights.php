<?php
/**
 * Book Fair Highlights Component
 * 100% Pure Custom CSS implementation
 * Faithful recreation of assets/sections-new-design/on-the-world-stage-dsign.jpg
 */

$fairs = require __DIR__ . '/../data/fairs.php';
$highlights = $fairs['highlights'];

// Map the landmark tickets to the fairs
$fairsData = [
    [
        'id' => 'london',
        'title' => 'London Book Fair',
        'location' => 'Olympia London · March',
        'script' => 'London',
        'motto' => 'IDEAS TRAVEL FURTHER —',
        'image' => asset_url('assets/fairs/london-book-fair.jpg'),
        'ticket_bg' => asset_url('assets/on-the-world-stage-ticket01.avif'), // Big Ben
        'badge' => 'FEATURED',
        'icon' => 'sparkle'
    ],
    [
        'id' => 'frankfurt',
        'title' => 'Frankfurt Book Fair',
        'location' => 'Frankfurt · October',
        'script' => 'Frankfurt',
        'motto' => 'GLOBAL RIGHTS & LICENSING —',
        'image' => asset_url('assets/fairs/frankfurt-book-fair.jpg'),
        'ticket_bg' => asset_url('assets/on-the-world-stage-ticket03.avif'), // Skyline
        'badge' => null,
        'icon' => 'plane'
    ],
    [
        'id' => 'sydney',
        'title' => 'Sydney Writers\' Festival',
        'location' => 'Sydney · May',
        'script' => 'Sydney',
        'motto' => 'CELEBRATING LITERARY VOICES —',
        'image' => asset_url('assets/fairs/sydney-writers-festival.jpg'),
        'ticket_bg' => asset_url('assets/on-the-world-stage-ticket02.avif'), // Sydney Opera House
        'badge' => null,
        'icon' => 'leaf'
    ]
];
?>

<section id="world-stage" class="ws-section">
    <!-- Warm Ambient Light Blooms -->
    <div class="ws-ambient-bloom-1"></div>
    <div class="ws-ambient-bloom-2"></div>

    <div class="ws-container">
        <!-- Header Row: Left Text & Right 3 Global Fairs Pearl Medallion -->
        <div class="ws-header">
            <div class="ws-header-content">
                <div class="ws-eyebrow">
                    <span>On The World Stage</span>
                </div>

                <h2 class="ws-heading">
                    Book Fair <span class="ws-heading-accent">Highlights</span>
                </h2>

                <!-- Decorative Divider -->
                <div class="mx-auto mt-5 mb-5 flex items-center justify-left gap-2.5">
                    <span class="h-[3px] w-8 rounded-full bg-gradient-to-r from-transparent to-gold"></span>
                    <span class="h-2.5 w-2.5 -skew-x-12 rounded-[3px] bg-gold-gradient shadow-gold"></span>
                    <span class="h-[3px] w-16 rounded-full bg-gold-gradient"></span>
                    <span class="h-2.5 w-2.5 -skew-x-12 rounded-[3px] bg-gold-gradient shadow-gold"></span>
                    <span class="h-[3px] w-8 rounded-full bg-gradient-to-l from-transparent to-gold"></span>
                </div>

                <p class="ws-desc">
                    From London to Frankfurt, we bring our authors' stories to the global publishing community. Tap to view our highlights up close.
                </p>
            </div>

            <!-- Floating 3 Global Fairs Pearl Disc Medallion -->
            <div class="ws-medallion">
                <svg class="ws-medallion-star" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 0L14.59 9.41L24 12L14.59 14.59L12 24L9.41 14.59L0 12L9.41 9.41L12 0Z"/>
                </svg>
                <div class="ws-medallion-num">3</div>
                <div class="ws-medallion-label">Global Fairs</div>
            </div>
        </div>

        <!-- Main Showcase Area: Left 3D Perspective Photo & Right Overlapping Ticket Stack -->
        <div class="ws-showcase-container">
            <!-- Left: Angled Perspective Exhibition Booth Frame -->
            <div class="ws-booth-col">
                <div class="ws-booth-perspective">
                    <div id="ws-booth-frame" class="ws-booth-frame" onclick="openFairLightbox()">
                        <div class="ws-booth-photo-wrap">
                            <img id="ws-booth-img" src="<?= $fairsData[0]['image'] ?>" alt="<?= e($fairsData[0]['title']) ?>" class="ws-booth-photo">
                            
                            <!-- Vignette Overlay -->
                            <div class="ws-booth-vignette"></div>

                            <!-- Bottom Calligraphic Script Tag inside Frame -->
                            <div class="ws-booth-overlay-tag">
                                <span id="ws-booth-script" class="ws-booth-script-name"><?= e($fairsData[0]['script']) ?></span>
                                <span id="ws-booth-motto" class="ws-booth-motto">
                                    <span id="ws-motto-text"><?= e($fairsData[0]['motto']) ?></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Carousel Arrows & Dots Centered Directly Beneath Booth Frame -->
                <div class="ws-booth-nav">
                    <button type="button" class="ws-nav-arrow" onclick="prevFairTab()" aria-label="Previous Fair">&larr;</button>
                    <div class="ws-nav-dots">
                        <?php foreach ($fairsData as $idx => $f): ?>
                            <button type="button" class="ws-nav-dot <?= $idx === 0 ? 'ws-dot-active' : 'ws-dot-inactive' ?>" id="ws-dot-<?= $idx ?>" onclick="selectFairTab(<?= $idx ?>)" aria-label="Select fair <?= $idx + 1 ?>"></button>
                        <?php endforeach; ?>
                    </div>
                    <button type="button" class="ws-nav-arrow" onclick="nextFairTab()" aria-label="Next Fair">&rarr;</button>
                </div>
            </div>

            <!-- Right: 3 Luxury Ticket Cards Overlapping the Booth Window -->
            <div class="ws-tickets-col">
                <?php foreach ($fairsData as $idx => $fair): 
                    $isActive = ($idx === 0);
                ?>
                    <div id="ws-card-<?= $idx ?>" class="ws-ticket-card <?= $isActive ? 'ws-ticket-active' : '' ?>" onclick="selectFairTab(<?= $idx ?>)">
                        <!-- Left Notch (Perforation hole) -->
                        <div class="ws-ticket-notch-left"></div>

                        <!-- Right Scalloped Stamp Serration -->
                        <div class="ws-ticket-serration"></div>

                        <!-- Landmark Engraving Ticket Watermark on Right -->
                        <div class="ws-ticket-watermark">
                            <img src="<?= $fair['ticket_bg'] ?>" alt="<?= e($fair['title']) ?>">
                        </div>

                        <!-- Featured Badge -->
                        <?php if (!empty($fair['badge'])): ?>
                            <div class="ws-ticket-featured-badge"><?= e($fair['badge']) ?></div>
                        <?php endif; ?>

                        <!-- Ticket Body Content -->
                        <div class="ws-ticket-body">
                            <!-- Circular Icon -->
                            <div id="ws-icon-<?= $idx ?>" class="ws-ticket-icon-wrap <?= $isActive ? 'ws-icon-active' : 'ws-icon-normal' ?>">
                                <?php if ($fair['icon'] === 'sparkle'): ?>
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0L14.59 9.41L24 12L14.59 14.59L12 24L9.41 14.59L0 12L9.41 9.41L12 0Z"/></svg>
                                <?php elseif ($fair['icon'] === 'plane'): ?>
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"/></svg>
                                <?php else: ?>
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M17 8C8 10 5.9 16.17 3.82 21.34L5.71 22l1-2.3A4.49 4.49 0 0 0 8 20C19 20 22 3 22 3c-1 2-8 2.25-13 3.25S2 11.5 2 13.5s1.75 3.75 1.75 3.75C7 8 17 8 17 8z"/></svg>
                                <?php endif; ?>
                            </div>

                            <div class="ws-ticket-info">
                                <h3 class="ws-ticket-title"><?= e($fair['title']) ?></h3>
                                <p class="ws-ticket-subtitle"><?= e($fair['location']) ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<script>
const wsFairsData = <?= json_encode($fairsData) ?>;
let wsActiveIndex = 0;

function selectFairTab(index) {
    wsActiveIndex = index;
    const fair = wsFairsData[index];

    // Smooth crossfade on booth image & bottom-left tag
    const img = document.getElementById('ws-booth-img');
    const scriptTag = document.getElementById('ws-booth-script');
    const mottoTag = document.getElementById('ws-motto-text');

    if (img) {
        img.style.opacity = '0.2';
        setTimeout(() => {
            img.src = fair.image;
            img.alt = fair.title;
            if (scriptTag) scriptTag.textContent = fair.script;
            if (mottoTag) mottoTag.textContent = fair.motto;
            img.style.opacity = '1';
        }, 150);
    }

    // Update tickets, icons, and navigation dots
    wsFairsData.forEach((_, i) => {
        const card = document.getElementById(`ws-card-${i}`);
        const dot = document.getElementById(`ws-dot-${i}`);
        const iconWrap = document.getElementById(`ws-icon-${i}`);

        if (card) {
            if (i === index) {
                card.classList.add('ws-ticket-active');
            } else {
                card.classList.remove('ws-ticket-active');
            }
        }

        if (iconWrap) {
            if (i === index) {
                iconWrap.classList.remove('ws-icon-normal');
                iconWrap.classList.add('ws-icon-active');
            } else {
                iconWrap.classList.remove('ws-icon-active');
                iconWrap.classList.add('ws-icon-normal');
            }
        }

        if (dot) {
            if (i === index) {
                dot.className = 'ws-nav-dot ws-dot-active';
            } else {
                dot.className = 'ws-nav-dot ws-dot-inactive';
            }
        }
    });
}

function prevFairTab() {
    const nextIdx = (wsActiveIndex - 1 + wsFairsData.length) % wsFairsData.length;
    selectFairTab(nextIdx);
}

function nextFairTab() {
    const nextIdx = (wsActiveIndex + 1) % wsFairsData.length;
    selectFairTab(nextIdx);
}

function openFairLightbox() {
    const fair = wsFairsData[wsActiveIndex];
    if (typeof openLightbox === 'function') {
        openLightbox(fair.image, `${fair.title} - ${fair.location}`);
    }
}
</script>
