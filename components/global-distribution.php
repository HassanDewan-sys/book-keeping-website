<?php
/**
 * Global Distribution Ecosystem & Retail Footprint Component
 * Modern interactive multi-region distribution network showcase
 */

$regions = [
    'americas' => [
        'name' => 'The Americas',
        'endpoints' => '18,500+ Bookstores & Outlets',
        'flag' => '🇺🇸 🇨🇦',
        'retailers' => [
            ['name' => 'Amazon Kindle & Print', 'reach' => 'United States & Worldwide', 'type' => 'Hardcover, Paperback, eBook'],
            ['name' => 'Barnes & Noble', 'reach' => '600+ Premier Retail Locations', 'type' => 'Retail Shelves & Online'],
            ['name' => 'Ingram Content Network', 'reach' => '39,000 Wholesale Channels', 'type' => 'Wholesale & Academic'],
            ['name' => 'Books-A-Million', 'reach' => '260+ Superstores', 'type' => 'Nationwide US In-Store'],
            ['name' => 'Powell’s City of Books', 'reach' => 'Independent Flagship', 'type' => 'Curated Literary Placement'],
            ['name' => 'Indigo Books & Music', 'reach' => 'Canada Coast-to-Coast', 'type' => 'Top Canadian Bookseller']
        ]
    ],
    'uk_europe' => [
        'name' => 'United Kingdom & Europe',
        'endpoints' => '12,000+ Retailers & Wholesalers',
        'flag' => '🇬🇧 🇪🇺',
        'retailers' => [
            ['name' => 'Waterstones', 'reach' => '300+ UK High-Street Shops', 'type' => 'UK Premier Bookchain'],
            ['name' => 'Blackwell’s', 'reach' => 'Prestigious Academic Network', 'type' => 'Scholarly & Commercial'],
            ['name' => 'Foyles', 'reach' => 'London Flagship & Online', 'type' => 'Award-Winning Heritage Books'],
            ['name' => 'Gardners Books', 'reach' => 'Leading European Wholesaler', 'type' => 'Pan-European Supply Chain'],
            ['name' => 'WHSmith', 'reach' => 'Travel Hubs & High Streets', 'type' => 'Airports, Rail & Retail'],
            ['name' => 'Thalia & Hugendubel', 'reach' => 'Germany, Austria & Switzerland', 'type' => 'Central European Direct']
        ]
    ],
    'apac' => [
        'name' => 'Australia & Asia-Pacific',
        'endpoints' => '6,500+ Bookshops & Hubs',
        'flag' => '🇦🇺 🇳🇿 🇸🇬',
        'retailers' => [
            ['name' => 'Booktopia', 'reach' => 'Australia’s #1 Online Bookstore', 'type' => 'Direct National Warehouse'],
            ['name' => 'Dymocks Booksellers', 'reach' => '65+ Heritage Stores Nationwide', 'type' => 'Australian Retail Flagship'],
            ['name' => 'Angus & Robertson', 'reach' => 'Australia-Wide Digital Hub', 'type' => 'Iconic National Channel'],
            ['name' => 'QBD Books', 'reach' => '85+ Shopping Center Stores', 'type' => 'Major Australian Chain'],
            ['name' => 'Kinokuniya Asia', 'reach' => 'Sydney, Tokyo, Singapore', 'type' => 'International Art & Literature'],
            ['name' => 'Whitcoulls', 'reach' => 'New Zealand Nationwide', 'type' => 'Leading NZ Retail Network']
        ]
    ],
    'libraries' => [
        'name' => 'Libraries & Academic Systems',
        'endpoints' => '14,000+ Institutional Networks',
        'flag' => '🏛️ 🎓',
        'retailers' => [
            ['name' => 'OverDrive / Libby', 'reach' => '43,000 Global Public Libraries', 'type' => 'Digital Lending & Audiobooks'],
            ['name' => 'Bibliotheca / cloudLibrary', 'reach' => 'Worldwide Library Consortia', 'type' => 'Public & School Libraries'],
            ['name' => 'Baker & Taylor', 'reach' => 'Global Library Wholesaler', 'type' => 'Public & University Systems'],
            ['name' => 'BorrowBox', 'reach' => 'Australia, UK & Ireland Libraries', 'type' => 'Leading Audio & eBook App'],
            ['name' => 'EBSCOhost & ProQuest', 'reach' => 'University Research Databases', 'type' => 'Academic & Peer-Review Systems'],
            ['name' => 'National Library of Australia', 'reach' => 'Canberra Legal Deposit Archive', 'type' => 'Permanent Cultural Registry']
        ]
    ]
];
?>
<section id="distribution" class="relative overflow-hidden bg-royal-gradient py-24 text-cream sm:py-28">
    <div class="pointer-events-none absolute -right-24 top-0 h-96 w-96 rounded-full bg-[#D4AF37]/10 blur-3xl"></div>
    <div class="pointer-events-none absolute -left-24 bottom-0 h-96 w-96 rounded-full bg-indigo-900/15 blur-3xl"></div>

    <div class="container-px relative">
        <!-- Section Header -->
        <div class="flex flex-col items-start justify-between gap-6 md:flex-row md:items-end">
            <div>
                <span class="eyebrow !border-[#D4AF37]/30 !bg-white/5 !text-[#F3E5AB]">
                    <?= get_icon('sparkle', 'shrink-0 text-[#ECC870]') ?>
                    <span>Worldwide Retail Footprint</span>
                </span>
                <h2 class="mt-4 font-display text-3xl font-bold tracking-tight text-white sm:text-4xl lg:text-[2.75rem]">
                    Every Major Bookstore. <br><span class="text-gradient-gold">Every High-Street Shelf.</span>
                </h2>
            </div>
            <div class="flex items-center gap-3 rounded-2xl border border-white/15 bg-white/[0.07] px-4 py-3 backdrop-blur-md">
                <span class="relative flex h-3 w-3">
                    <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-[#D4AF37] opacity-75"></span>
                    <span class="relative inline-flex h-3 w-3 rounded-full bg-[#D4AF37]"></span>
                </span>
                <span class="font-body text-xs font-semibold text-cream/90">
                    <strong class="text-[#F3E5AB]">40,000+ Retail Endpoints</strong> Live Across 190 Countries
                </span>
            </div>
        </div>

        <!-- Region Selector Tabs -->
        <div class="mt-12 flex flex-wrap gap-2.5 border-b border-white/10 pb-6">
            <?php $first = true; foreach ($regions as $key => $region): ?>
                <button type="button" class="dist-tab-btn flex items-center gap-2.5 rounded-full px-5 py-2.5 font-body text-xs font-bold tracking-wide transition-all <?= $first ? 'bg-[#D4AF37] text-slate-950 shadow-[0_4px_15px_rgba(212,175,55,0.4)]' : 'bg-white/10 text-cream/80 hover:bg-white/20 hover:text-white' ?>" data-region="<?= e($key) ?>">
                    <span><?= e($region['flag']) ?></span>
                    <span><?= e($region['name']) ?></span>
                </button>
            <?php $first = false; endforeach; ?>
        </div>

        <!-- Dynamic Region Content Panels -->
        <div class="mt-8">
            <?php $first = true; foreach ($regions as $key => $region): ?>
                <div id="dist-panel-<?= e($key) ?>" class="dist-panel <?= $first ? 'block' : 'hidden' ?> transition-opacity duration-300">
                    <div class="mb-6 flex items-center justify-between text-xs text-cream/70">
                        <span>Showing verified distribution partners for <strong class="text-[#F3E5AB]"><?= e($region['name']) ?></strong></span>
                        <span class="rounded-lg border border-white/10 bg-white/10 px-3 py-1 font-mono text-cream/90"><?= e($region['endpoints']) ?></span>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                        <?php foreach ($region['retailers'] as $retailer): ?>
                            <div class="group rounded-2xl border border-white/10 bg-white/[0.06] p-5 backdrop-blur-md transition-all duration-300 hover:-translate-y-1 hover:border-[#D4AF37]/50 hover:bg-white/[0.1] hover:shadow-[0_15px_30px_rgba(0,0,0,0.3)]">
                                <div class="flex items-center justify-between">
                                    <h3 class="font-display text-base font-bold text-white group-hover:text-[#F3E5AB] transition-colors"><?= e($retailer['name']) ?></h3>
                                    <span class="text-xs text-[#D4AF37] opacity-0 transition-opacity group-hover:opacity-100">
                                        <?= get_icon('shield-check', 'shrink-0') ?>
                                    </span>
                                </div>
                                <p class="mt-2 font-body text-xs text-cream/70"><?= e($retailer['reach']) ?></p>
                                <div class="mt-4 flex items-center justify-between border-t border-white/10 pt-3">
                                    <span class="rounded bg-white/10 px-2 py-0.5 font-mono text-[10px] text-cream/80"><?= e($retailer['type']) ?></span>
                                    <span class="font-body text-[11px] font-semibold text-[#ECC870]">Direct Feed</span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php $first = false; endforeach; ?>
        </div>

        <!-- Bottom Distribution Guarantee Banner -->
        <div class="mt-14 flex flex-col items-center justify-between gap-6 rounded-2xl border border-[#D4AF37]/30 bg-gradient-to-r from-white/[0.04] via-[#D4AF37]/[0.1] to-white/[0.04] p-6 text-center backdrop-blur-xl sm:flex-row sm:text-left">
            <div>
                <h4 class="font-display text-lg font-bold text-white">Want your book in the global catalog?</h4>
                <p class="mt-1 font-body text-xs text-cream/70">Every package includes international ISBNs, barcode generation, and worldwide metadata syndication.</p>
            </div>
            <a href="#contact" class="btn-gold shrink-0">
                Distribute Globally
                <?= get_icon('arrow-right', 'shrink-0') ?>
            </a>
        </div>
    </div>
</section>
