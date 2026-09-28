<?php
/**
 * Genres Component - Contemporary Asymmetrical Editorial Redesign
 */

$genres = require __DIR__ . '/../data/genres.php';
$featured_genre = $genres[0] ?? null;
$other_genres = array_slice($genres, 1);
?>
<section class="relative overflow-hidden py-24 sm:py-32 bg-[#F5F7FC]" id="genres">
    <!-- Ambient Depth Lighting -->
    <div class="pointer-events-none absolute -left-32 top-1/4 h-96 w-96 rounded-none bg-[#2B35AF]/8 blur-3xl" aria-hidden="true"></div>
    <div class="pointer-events-none absolute -right-32 bottom-1/4 h-96 w-96 rounded-none bg-[#12086F]/6 blur-3xl" aria-hidden="true"></div>

    <div class="container-px relative z-10">
        <!-- Section Header -->
        <div class="max-w-3xl mx-auto text-center">
            <div class="reveal-init">
                <span class="eyebrow">Genres We Publish</span>
            </div>
            <div class="reveal-init delay-100 mt-4">
                <h2 class="font-display text-3xl font-extrabold leading-[1.08] tracking-tight text-[#12086F] sm:text-4xl lg:text-5xl">
                    Every Genre, Given The <span class="text-gradient-gold">Expert Treatment</span>
                </h2>
            </div>
            <div class="mx-auto mt-5 mb-5 flex items-center justify-center gap-2.5">
                <span class="h-[3px] w-8 rounded-none bg-gradient-to-r from-transparent to-[#2B35AF]"></span>
                <span class="h-2.5 w-2.5 -skew-x-12 rounded-none bg-gold-gradient shadow-none"></span>
                <span class="h-[3px] w-16 rounded-none bg-gold-gradient"></span>
                <span class="h-2.5 w-2.5 -skew-x-12 rounded-none bg-gold-gradient shadow-none"></span>
                <span class="h-[3px] w-8 rounded-none bg-gradient-to-l from-transparent to-[#2B35AF]"></span>
            </div>
            <div class="reveal-init delay-200">
                <p class="mt-5 font-body text-base leading-relaxed sm:text-lg mx-auto max-w-2xl text-[#526079]/85">
                    From sweeping fantasy to tender memoir, our designers and editors know exactly what readers in your category expect, and how to exceed it.
                </p>
            </div>
        </div>

        <!-- Asymmetric Editorial Showcase Grid -->
        <div class="mt-16 grid gap-8 lg:grid-cols-12 items-start">
            
            <?php if ($featured_genre): ?>
                <!-- FEATURED FLAGSHIP GENRE CARD (Spans 5 Columns) -->
                <div class="reveal-init lg:col-span-5 h-full">
                    <div class="card-3d h-full overflow-hidden p-8 sm:p-10 text-cream shadow-2xl flex flex-col justify-between group" style="background: linear-gradient(180deg, #12086F 0%, #12086F 100%); border: 1px solid rgba(255, 255, 255, 0.08); border-radius: 28px;">
                        <div>
                            <div class="flex items-center justify-between gap-4">
                                <span class="inline-flex items-center gap-1.5 rounded-none px-3 py-1 text-[11px] font-bold uppercase tracking-widest text-white" style="background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.22);">
                                    <?= get_icon('sparkle', 'w-3 h-3 text-[#EDF2FF]') ?>
                                    <span>Spotlight Category</span>
                                </span>
                                <span class="font-display text-xs text-[#EDF2FF]/60 tracking-widest uppercase">Bindwell Press</span>
                            </div>

                            <h3 class="mt-6 font-display text-2xl sm:text-3xl font-bold text-cream leading-tight">
                                <?= e($featured_genre['title']) ?>
                            </h3>
                            <p class="mt-3 font-body text-sm sm:text-base text-cream/75 leading-relaxed">
                                <?= e($featured_genre['desc']) ?>
                            </p>
                        </div>

                        <!-- 3D Elevated Book Cover Centerpiece -->
                        <div class="my-8 flex justify-center">
                            <div class="relative aspect-[2/3] w-48 sm:w-56 cursor-pointer overflow-hidden rounded-none shadow-[0_25px_50px_-12px_rgba(0,0,0,0.7),0_0_30px_rgba(43, 53, 175,0.2)] transition-all duration-500 group-hover:scale-105 group-hover:shadow-[0_30px_60px_-10px_rgba(0,0,0,0.8),0_0_40px_rgba(43, 53, 175,0.35)]" onclick="openLightbox('<?= asset_url($featured_genre['image']) ?>', '<?= e($featured_genre['title']) ?>')">
                                <img alt="<?= e($featured_genre['title']) ?>" loading="lazy" decoding="async" class="object-cover absolute inset-0 h-full w-full" src="<?= asset_url($featured_genre['image']) ?>">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 transition-opacity duration-300 group-hover:opacity-100 flex items-end p-4">
                                    <span class="text-xs font-semibold text-white flex items-center gap-1">Click to expand preview <?= get_icon('arrow-right', 'w-3.5 h-3.5') ?></span>
                                </div>
                            </div>
                        </div>

                        <div>
                            <a href="<?= e($featured_genre['link']) ?>" class="btn-gold w-full text-center justify-center uppercase tracking-wider text-xs">
                                <span>Explore <?= e($featured_genre['title']) ?> Covers</span>
                                <?= get_icon('arrow-right', 'shrink-0') ?>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <!-- STAGGERED CATEGORY CARDS (Spans 7 Columns, 2-Column Subgrid) -->
            <div class="lg:col-span-7 grid gap-6 sm:grid-cols-2">
                <?php foreach ($other_genres as $index => $genre): ?>
                    <div class="reveal-init delay-<?= (($index % 4) + 1) * 100 ?>">
                        <div class="card-3d h-full rounded-none">
                            <div class="group flex h-full flex-col justify-between rounded-none border border-[#D9E2F2] bg-white p-6 shadow-sm transition-all duration-300 hover:border-[#2B35AF]/60 hover:shadow-xl hover:-translate-y-1">
                                <div class="flex items-start gap-4">
                                    <div class="relative aspect-[2/3] w-20 shrink-0 cursor-pointer overflow-hidden rounded-none border border-[#D9E2F2] shadow-md transition-transform duration-500 group-hover:scale-105" onclick="openLightbox('<?= asset_url($genre['image']) ?>', '<?= e($genre['title']) ?>')">
                                        <img alt="<?= e($genre['title']) ?>" loading="lazy" decoding="async" class="object-cover absolute inset-0 h-full w-full" src="<?= asset_url($genre['image']) ?>">
                                    </div>
                                    <div class="flex-1">
                                        <span class="inline-block font-body text-[11px] font-bold uppercase tracking-wider text-[#2B35AF] bg-[#F5F7FC] px-2.5 py-0.5 rounded-none border border-[#D9E2F2]">
                                            Category
                                        </span>
                                        <h3 class="mt-2 font-display text-lg font-bold text-[#12086F] group-hover:text-[#2B35AF] transition-colors">
                                            <?= e($genre['title']) ?>
                                        </h3>
                                        <p class="mt-1 font-body text-xs leading-relaxed text-[#526079]/80 line-clamp-3">
                                            <?= e($genre['desc']) ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="mt-4 pt-4 border-t border-[#D9E2F2]/60 flex items-center justify-between">
                                    <a href="<?= e($genre['link']) ?>" class="inline-flex items-center gap-1.5 font-body text-xs font-bold text-[#2B35AF] hover:text-[#12086F] transition">
                                        <span>Explore covers</span>
                                        <?= get_icon('chevron-down', 'shrink-0 -rotate-90 transition-transform group-hover:translate-x-1') ?>
                                    </a>
                                    <span class="text-[10px] font-semibold text-[#526079]/50 uppercase tracking-widest">Bindwell</span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</section>
