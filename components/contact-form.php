<?php
/**
 * Free Author Consultation Contact Form Component
 * 100% Pure Custom CSS implementation
 * Faithful recreation of assets/sections-new-design/free-author-consultation-dsign.jpg
 */
?>

<section id="contact" class="fc-section">
    <!-- Ambient Warm Blooms -->
    <div class="fc-bloom-1"></div>
    <div class="fc-bloom-2"></div>

    <div class="fc-container">
        <div class="fc-grid">
            
            <!-- Left Hero Photo Card with Vertical Ribbon, Copy & Contact Pills -->
            <div class="fc-photo-card-wrap">
                <!-- Vertical Ribbon Pill Tag on Left Edge -->
                <div class="fc-vertical-ribbon">
                    <span class="fc-ribbon-star">✦</span>
                    <span>Free Author Consultation</span>
                </div>

                <!-- Glowing Outer Glass Border Container -->
                <div class="fc-photo-card">
                    <!-- Inner Photo Container -->
                    <div class="fc-photo-inner">
                        <!-- High-Res Author Photo -->
                        <img src="<?= asset_url('assets/free-author-consultation-girl-image.avif') ?>" alt="Author Consultation - Girl Writing Manuscript" class="fc-photo-bg">
                        
                        <!-- Rich Dark/Warm Vignettes for Text Contrast -->
                        <div class="fc-photo-overlay"></div>
                        <div class="fc-photo-bottom-overlay"></div>

                        <!-- Content Top Area -->
                        <div class="fc-photo-content-top">
                            <div class="fc-eyebrow">
                                <span>Your Story Matters</span>
                                <span class="fc-eyebrow-line"></span>
                            </div>

                            <h2 class="fc-heading">
                                Start Your <br>
                                Publishing Journey <br>
                                <span class="fc-heading-accent">With <em>Confidence</em></span>
                            </h2>

                            <p class="fc-desc">
                                Book a free, no-pressure consultation with a publishing strategist. We'll review your goals, recommend the right path and answer every question, whether you're polishing a manuscript or just dreaming up your first cover.
                            </p>
                        </div>

                        <!-- 3 Glassy Contact Pills on Lower Left -->
                        <div class="fc-contact-stack">
                            <!-- Call Pill -->
                            <a href="tel:<?= e(SITE_PHONE_RAW) ?>" class="fc-contact-pill">
                                <div class="fc-contact-icon">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2a1 1 0 011.02-.24c1.12.37 2.33.57 3.57.57a1 1 0 011 1V20a1 1 0 01-1 1A17 17 0 013 4a1 1 0 011-1h3.5a1 1 0 011 1c0 1.25.2 2.45.57 3.57a1 1 0 01-.25 1.02l-2.2 2.2z"/></svg>
                                </div>
                                <div class="fc-contact-info">
                                    <span class="fc-contact-label">Call Us</span>
                                    <span class="fc-contact-val"><?= e(SITE_PHONE) ?></span>
                                </div>
                            </a>

                            <!-- Email Pill -->
                            <a href="mailto:<?= e(SITE_EMAIL) ?>" class="fc-contact-pill">
                                <div class="fc-contact-icon">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                                </div>
                                <div class="fc-contact-info">
                                    <span class="fc-contact-label">Email Us</span>
                                    <span class="fc-contact-val"><?= e(SITE_EMAIL) ?></span>
                                </div>
                            </a>

                            <!-- Canberra Office Pill -->
                            <a href="https://maps.google.com/?q=68+Northbourne+Ave,+Canberra+ACT+2601" target="_blank" rel="noreferrer" class="fc-contact-pill">
                                <div class="fc-contact-icon">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                                </div>
                                <div class="fc-contact-info">
                                    <span class="fc-contact-label">Canberra Office</span>
                                    <span class="fc-contact-val" style="font-size: 12px; font-weight: 500; font-family: var(--font-jakarta);"><?= e(SITE_ADDRESS) ?></span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Floating Rating Badge Over Bottom-Right Table Edge (Outside inner overflow) -->
                <div class="fc-rating-badge">
                    <div class="fc-rating-stars-row">
                        <span class="fc-rating-stars">★★★★★</span>
                        <span class="fc-rating-score">4.9/5</span>
                    </div>
                    <span class="fc-rating-label">Rated by Authors</span>
                </div>
            </div>

            <!-- Right Luminous Frosted Glass Consultation Form -->
            <div class="fc-form-card">
                <!-- Header -->
                <div class="fc-form-header">
                    <div class="fc-book-icon-badge">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                    </div>
                    <div>
                        <h3 class="fc-form-title">Book A Free Author Consultation</h3>
                        <p class="fc-form-subtitle">We reply within one business day.</p>
                    </div>
                </div>

                <!-- Form Feedback Notification Alert -->
                <div id="form-feedback" class="hidden mb-4"></div>

                <!-- Consultation Form -->
                <form id="consultation-form" action="<?= asset_url('/api/contact.php') ?>" method="POST" novalidate>
                    <?= csrf_field() ?>

                    <div class="fc-form-row">
                        <div>
                            <span class="fc-label-badge">Full Name *</span>
                            <input id="name" type="text" autocomplete="name" required class="fc-input" placeholder="Full Name" name="full_name">
                        </div>

                        <div>
                            <span class="fc-label-badge">Email Address *</span>
                            <input id="email" type="email" autocomplete="email" required class="fc-input" placeholder="Email Address" name="email">
                        </div>
                    </div>

                    <div class="fc-form-group">
                        <span class="fc-label-badge">Phone Number *</span>
                        <input id="phone" type="tel" autocomplete="tel" required class="fc-input" placeholder="Phone Number" name="phone">
                    </div>

                    <div class="fc-form-group">
                        <span class="fc-label-badge">Select a Service *</span>
                        <select id="service" name="service" required class="fc-select">
                            <option value="">Choose a service…</option>
                            <option value="Book Cover Design">Book Cover Design</option>
                            <option value="eBook Cover Designing">eBook Cover Designing</option>
                            <option value="Book Illustration">Book Illustration</option>
                            <option value="Book Publishing">Book Publishing</option>
                            <option value="Children Book Publishing">Children Book Publishing</option>
                            <option value="eBook Writing & Publishing">eBook Writing & Publishing</option>
                            <option value="Self Publishing">Self Publishing</option>
                            <option value="Global Publishing">Global Publishing</option>
                            <option value="Book Marketing">Book Marketing</option>
                            <option value="Content Marketing">Content Marketing</option>
                            <option value="Social Media Marketing">Social Media Marketing</option>
                            <option value="Digital Marketing">Digital Marketing</option>
                            <option value="Audiobook Production">Audiobook Production</option>
                            <option value="Book Printing">Book Printing</option>
                            <option value="Author Website Development">Author Website Development</option>
                            <option value="Book Editing & Proofreading">Book Editing & Proofreading</option>
                            <option value="Book Formatting">Book Formatting</option>
                            <option value="Not sure yet">Not sure yet, advise me</option>
                        </select>
                    </div>

                    <div class="fc-form-group">
                        <span class="fc-label-badge">Tell Us About Your Book</span>
                        <textarea id="message" name="message" rows="3" required class="fc-textarea" placeholder="Genre, page count, and what you need help with…"></textarea>
                    </div>

                    <button type="submit" class="fc-submit-btn">
                        <span>Book My Free Consultation</span>
                        <span>&rarr;</span>
                    </button>

                    <div class="fc-trust-pill">
                        <svg class="fc-trust-shield" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path><path d="M9 12l2 2 4-4"></path></svg>
                        <span>100% confidential. We never share your details.</span>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>
