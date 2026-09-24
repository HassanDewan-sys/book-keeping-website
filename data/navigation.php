<?php
/**
 * Navigation Menu Configuration
 */

return [
    'main_menu' => [
        ['title' => 'Home', 'url' => '/', 'active' => true, 'has_dropdown' => false],
        ['title' => 'Services', 'url' => '#services', 'active' => false, 'has_dropdown' => true],
        ['title' => 'Events', 'url' => '#fairs', 'active' => false, 'has_dropdown' => true],
        ['title' => 'About', 'url' => '#about', 'active' => false, 'has_dropdown' => false],
        ['title' => 'Packages', 'url' => '#packages', 'active' => false, 'has_dropdown' => false],
        ['title' => 'Contact', 'url' => '#contact', 'active' => false, 'has_dropdown' => false],
    ],
    'services_categories' => [
        [
            'category' => 'Cover & Design',
            'services' => [
                ['title' => 'Book Cover Design', 'flagship' => true, 'desc' => 'Our flagship, covers that sell', 'url' => '#services', 'icon' => 'palette'],
                ['title' => 'eBook Cover Designing', 'flagship' => true, 'desc' => 'Scroll-stopping digital covers', 'url' => '#services', 'icon' => 'ebook'],
                ['title' => 'Book Illustration', 'flagship' => false, 'desc' => 'Custom art & character design', 'url' => '#services', 'icon' => 'book'],
            ]
        ],
        [
            'category' => 'Publishing',
            'services' => [
                ['title' => 'Book Publishing', 'flagship' => false, 'desc' => 'From manuscript to market', 'url' => '#services', 'icon' => 'rocket'],
                ['title' => 'Children Book Publishing', 'flagship' => false, 'desc' => 'Picture books that delight', 'url' => '#services', 'icon' => 'book'],
                ['title' => 'eBook Writing & Publishing', 'flagship' => false, 'desc' => 'Ghostwritten & published', 'url' => '#services', 'icon' => 'edit'],
                ['title' => 'Self Publishing', 'flagship' => false, 'desc' => 'Keep 100% of your rights', 'url' => '#services', 'icon' => 'sparkle'],
                ['title' => 'Global Publishing', 'flagship' => false, 'desc' => 'Reach readers worldwide', 'url' => '#services', 'icon' => 'globe'],
            ]
        ],
        [
            'category' => 'Marketing',
            'services' => [
                ['title' => 'Book Marketing', 'flagship' => false, 'desc' => 'Launch to best-seller lists', 'url' => '#services', 'icon' => 'megaphone'],
                ['title' => 'Content Marketing', 'flagship' => false, 'desc' => 'Authority-building content', 'url' => '#services', 'icon' => 'layout'],
                ['title' => 'Social Media Marketing', 'flagship' => false, 'desc' => 'Grow a loyal readership', 'url' => '#services', 'icon' => 'share'],
                ['title' => 'Digital Marketing', 'flagship' => false, 'desc' => 'Ads, funnels & SEO', 'url' => '#services', 'icon' => 'target'],
            ]
        ],
        [
            'category' => 'Production & More',
            'services' => [
                ['title' => 'Audiobook Production', 'flagship' => false, 'desc' => 'Narration to publishing', 'url' => '#services', 'icon' => 'headphones'],
                ['title' => 'Book Printing', 'flagship' => false, 'desc' => 'Premium print & binding', 'url' => '#services', 'icon' => 'printer'],
                ['title' => 'Author Website Development', 'flagship' => false, 'desc' => 'A home for your brand', 'url' => '#services', 'icon' => 'globe'],
                ['title' => 'Book Editing & Proofreading', 'flagship' => false, 'desc' => 'Flawless every page', 'url' => '#services', 'icon' => 'check-circle'],
                ['title' => 'Book Formatting', 'flagship' => false, 'desc' => 'Print & eBook ready', 'url' => '#services', 'icon' => 'layout'],
            ]
        ]
    ],
    'events_categories' => [
        [
            'category' => 'Global Book Fairs',
            'events' => [
                ['title' => 'London Book Fair', 'desc' => 'Olympia London · March', 'url' => '#fairs', 'icon' => 'globe'],
                ['title' => 'Frankfurt Book Fair', 'desc' => 'Frankfurt, Germany · October', 'url' => '#fairs', 'icon' => 'book'],
                ['title' => 'Sydney Writers\' Festival', 'desc' => 'Sydney, Australia · May', 'url' => '#fairs', 'icon' => 'layout'],
                ['title' => 'Bologna Children\'s Fair', 'desc' => 'Bologna, Italy · April', 'url' => '#fairs', 'icon' => 'palette'],
            ]
        ],
        [
            'category' => 'Author Opportunities',
            'events' => [
                ['title' => 'Rights & Agent Stage', 'desc' => 'Direct pitch to global rights directors', 'url' => '#fairs', 'icon' => 'target'],
                ['title' => 'Live Author Signings', 'desc' => 'Connect in person with international readers', 'url' => '#fairs', 'icon' => 'edit'],
                ['title' => 'Physical Pavilion Exhibit', 'desc' => 'Hardcover showcase on our dedicated booth', 'url' => '#fairs', 'icon' => 'printer'],
                ['title' => 'Press & Media Briefings', 'desc' => 'Distribution of our global rights catalogue', 'url' => '#fairs', 'icon' => 'megaphone'],
            ]
        ]
    ],
    'events_featured' => [
        'title' => 'Frankfurt Book Fair 2026',
        'badge' => 'World Stage',
        'desc' => 'Join the Bindwell Press pavilion at the largest book and media fair on earth.',
        'url' => '#contact',
        'image' => '/assets/fairs/frankfurt-book-fair.jpg'
    ]
];
