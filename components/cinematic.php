<?php
/**
 * Author Insights Cinematic Video Showcase
 * Redesigned to match user specification layout with website luxury theme
 */
?>
<section id="author-insights" class="author-insights-section relative overflow-hidden py-20 sm:py-28 lg:py-32 bg-[#FAF6F0]" style="background-image: url('<?= asset_url('/assets/video-section-bg.avif') ?>'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div id="different" style="display: none;" aria-hidden="true"></div>

    <!-- Ambient Subtle Warm Light Diffusions -->
    <div class="pointer-events-none absolute -left-20 top-1/4 h-[500px] w-[500px] rounded-full bg-[#C98E5E]/10 blur-3xl z-0" aria-hidden="true"></div>
    <div class="pointer-events-none absolute -right-20 bottom-1/4 h-[450px] w-[450px] rounded-full bg-[#DFB28C]/12 blur-3xl z-0" aria-hidden="true"></div>

    <div class="container-px relative z-10 mx-auto max-w-7xl">
        <!-- 2-Column Responsive Layout: Left Content + Right Staggered Floating Videos -->
        <div class="author-insights-grid grid items-center gap-12 lg:grid-cols-[0.85fr_1.35fr] lg:gap-14 xl:gap-16">
            
            <!-- Left Column: Dynamic Interactive Content (Switches on Video Hover/Click) -->
            <div class="flex flex-col items-start w-full">
                <div class="author-text-stage relative w-full">
                    
                    <!-- Content Pane 1: Author Insights (Default) -->
                    <div id="author-pane-1" class="author-info-pane active">
                        <div class="reveal-init">
                            <span class="eyebrow inline-flex items-center" style="background: rgba(201, 142, 94, 0.09) !important; border: 1px solid rgba(201, 142, 94, 0.38) !important;">AUTHORS INSIGHTS</span>
                        </div>

                        <div class="reveal-init delay-100 mt-4">
                            <h2 class="font-display text-4xl sm:text-5xl lg:text-[4.5rem] font-extrabold leading-[1.02] tracking-tight text-[#14070D]">
                                Author <br><span class="text-gradient-gold">Insights</span>
                            </h2>
                        </div>

                        <div class="reveal-init delay-200 mt-5">
                            <p class="max-w-md font-body text-base sm:text-lg leading-relaxed text-[#551E3C]/80">
                                Real stories. Honest journeys. Hear from our amazing authors about their publishing experience.
                            </p>
                        </div>

                        <div class="reveal-init delay-300 mt-8">
                            <a href="#contact" class="btn-gold uppercase font-display tracking-wider text-xs px-8 py-3.5 shadow-lg hover:shadow-xl">
                                Start Publishing
                                <?= get_icon('arrow-right', 'w-4 h-4 shrink-0') ?>
                            </a>
                        </div>
                    </div>

                    <!-- Content Pane 2: See What Makes Bindwell Different -->
                    <div id="author-pane-2" class="author-info-pane">
                        <div>
                            <span class="eyebrow inline-flex items-center" style="background: rgba(201, 142, 94, 0.09) !important; border: 1px solid rgba(201, 142, 94, 0.38) !important;">BINDWELL FILM</span>
                        </div>

                        <div class="mt-4">
                            <h2 class="font-display text-3xl sm:text-4xl lg:text-[3.5rem] font-extrabold leading-[1.05] tracking-tight text-[#14070D]">
                                See What Makes <br><span class="text-gradient-gold">Bindwell Different</span>
                            </h2>
                        </div>

                        <div class="mt-5">
                            <p class="max-w-md font-body text-base sm:text-lg leading-relaxed text-[#551E3C]/80">
                                A cinematic look behind the pages, how we turn a finished manuscript into a beautifully published book authors are proud to hold and share with the world.
                            </p>
                        </div>

                        <div class="mt-8">
                            <a href="#contact" class="btn-gold uppercase font-display tracking-wider text-xs px-8 py-3.5 shadow-lg hover:shadow-xl">
                                Start Publishing
                                <?= get_icon('arrow-right', 'w-4 h-4 shrink-0') ?>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Right Column: Interactive Staggered Floating Videos Showcase -->
            <div class="reveal-init delay-150 relative w-full author-insights-stage">
                
                <!-- Video 01 (Top-Left, Tilted -3.5deg, Author Insights) -->
                <div class="author-video-card author-video-1 is-active-card" data-pane="author-pane-1">
                    <div class="video-container author-video-box group">
                        <video src="<?= asset_url('/video-stream.php?video=author-insight.mp4') ?>"
                               poster="<?= asset_url('/videos/author-insight-poster.jpg') ?>"
                               data-start-time="2.15"
                               playsinline
                               preload="metadata"
                               class="author-video-media">
                        </video>

                        <!-- Custom Play Button built with SVG and span -->
                        <button type="button" aria-label="Play Author Insight Video" class="play-btn absolute inset-0 z-10 flex items-center justify-center bg-transparent transition duration-300">
                            <span class="author-play-glow-ring">
                                <span class="author-play-circle">
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor" class="translate-x-0.5 text-white drop-shadow-md">
                                        <polygon points="6,3 20,12 6,21"></polygon>
                                    </svg>
                                </span>
                            </span>
                        </button>
                    </div>
                </div>

                <!-- Floating Glass Badge: 500+ Authors Published -->
                <div class="author-metric-badge">
                    <div class="flex h-11 w-11 items-center justify-center rounded-full bg-[#EEDBCE] border border-[#C98E5E]/20 text-[#14070D] shadow-inner shrink-0">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor" class="text-[#14070D]">
                            <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-display text-lg sm:text-xl font-extrabold text-[#14070D] leading-none">500+</span>
                        <span class="font-body text-xs font-semibold text-[#551E3C]/75 leading-tight mt-1">Authors Published</span>
                    </div>
                </div>

                <!-- Video 02 (Bottom-Right, Tilted -2.8deg, Bindwell Film) -->
                <div class="author-video-card author-video-2" data-pane="author-pane-2">
                    <div class="video-container author-video-box group">
                        <video src="<?= asset_url('/video-stream.php?video=canberra-film.mp4') ?>"
                               poster="<?= asset_url('/videos/canberra-film-poster.jpg') ?>"
                               data-start-time="0"
                               playsinline
                               preload="metadata"
                               class="author-video-media">
                        </video>

                        <!-- Custom Play Button built with SVG and span -->
                        <button type="button" aria-label="Play Bindwell Film Video" class="play-btn absolute inset-0 z-10 flex items-center justify-center bg-transparent transition duration-300">
                            <span class="author-play-glow-ring">
                                <span class="author-play-circle">
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor" class="translate-x-0.5 text-white drop-shadow-md">
                                        <polygon points="6,3 20,12 6,21"></polygon>
                                    </svg>
                                </span>
                            </span>
                        </button>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
