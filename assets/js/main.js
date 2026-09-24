/**
 * Bindwell Press - Main Application JavaScript
 */

document.addEventListener('DOMContentLoaded', () => {
    // 0. Lenis Smooth Scrolling Integration
    let lenis = null;
    if (typeof Lenis !== 'undefined' && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        try {
            lenis = new Lenis({
                duration: 1.2,
                easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
                smoothWheel: true,
                smoothTouch: false,
            });

            if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
                gsap.registerPlugin(ScrollTrigger);
                lenis.on('scroll', ScrollTrigger.update);
                gsap.ticker.add((time) => {
                    lenis.raf(time * 1000);
                });
                gsap.ticker.lagSmoothing(0);
            } else {
                function raf(time) {
                    lenis.raf(time);
                    requestAnimationFrame(raf);
                }
                requestAnimationFrame(raf);
            }
            window.lenisInstance = lenis;
        } catch (e) {
            console.warn('Lenis init notice:', e);
        }
    }

    // 1. Scroll Progress Bar
    const progressBar = document.getElementById('scroll-progress');
    const updateProgress = () => {
        if (!progressBar) return;
        const docElem = document.documentElement;
        const totalHeight = docElem.scrollHeight - docElem.clientHeight;
        if (totalHeight > 0) {
            const currentScroll = window.scrollY || docElem.scrollTop;
            const ratio = currentScroll / totalHeight;
            progressBar.style.transform = `scaleX(${Math.min(Math.max(ratio, 0), 1)})`;
        }
    };
    if (lenis) {
        lenis.on('scroll', updateProgress);
    } else {
        window.addEventListener('scroll', updateProgress, { passive: true });
    }
    updateProgress();

    // 2. Header Scroll Styling
    const header = document.getElementById('main-header');
    const headerInner = header ? header.querySelector('.header-inner') : null;
    const onScrollHeader = () => {
        if (!headerInner) return;
        const currentScroll = window.scrollY || document.documentElement.scrollTop;
        if (currentScroll > 20) {
            headerInner.classList.add('shadow-card', 'bg-cream/95');
            headerInner.classList.remove('bg-cream/40');
        } else {
            headerInner.classList.remove('shadow-card', 'bg-cream/95');
            headerInner.classList.add('bg-cream/40');
        }
    };
    if (lenis) {
        lenis.on('scroll', onScrollHeader);
    } else {
        window.addEventListener('scroll', onScrollHeader, { passive: true });
    }
    onScrollHeader();

    // 3. Mobile Navigation Drawer Fix
    const mobileToggle = document.getElementById('mobile-menu-toggle');
    const mobileClose = document.getElementById('mobile-drawer-close');
    const mobileDrawer = document.getElementById('mobile-drawer');
    const mobileBackdrop = document.getElementById('mobile-drawer-backdrop');
    const mobileLinks = document.querySelectorAll('.mobile-nav-link');

    const openDrawer = () => {
        if (!mobileDrawer) return;
        mobileDrawer.classList.add('is-open');
        if (mobileBackdrop) mobileBackdrop.classList.add('is-open');
        if (mobileToggle) mobileToggle.setAttribute('aria-expanded', 'true');
        document.body.style.overflow = 'hidden';
        if (lenis) lenis.stop();
    };

    const closeDrawer = () => {
        if (!mobileDrawer) return;
        mobileDrawer.classList.remove('is-open');
        if (mobileBackdrop) mobileBackdrop.classList.remove('is-open');
        if (mobileToggle) mobileToggle.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
        if (lenis) lenis.start();
    };

    if (mobileToggle) {
        mobileToggle.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            if (mobileDrawer && mobileDrawer.classList.contains('is-open')) {
                closeDrawer();
            } else {
                openDrawer();
            }
        });
    }
    if (mobileClose) {
        mobileClose.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            closeDrawer();
        });
    }
    if (mobileBackdrop) {
        mobileBackdrop.addEventListener('click', closeDrawer);
    }
    mobileLinks.forEach(link => link.addEventListener('click', closeDrawer));
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && mobileDrawer && mobileDrawer.classList.contains('is-open')) {
            closeDrawer();
        }
    });

    // 4. Scroll Reveal Animations via IntersectionObserver
    const reveals = document.querySelectorAll('.reveal-init');
    if ('IntersectionObserver' in window && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-in-view');
                    obs.unobserve(entry.target);
                }
            });
        }, {
            root: null,
            rootMargin: '0px 0px -50px 0px',
            threshold: 0.15
        });

        reveals.forEach(el => observer.observe(el));
    } else {
        reveals.forEach(el => el.classList.add('is-in-view'));
    }

    // 5. Video Playback Controls & Dynamic Author Insights Panes
    const videoContainers = document.querySelectorAll('.video-container');
    videoContainers.forEach(box => {
        const video = box.querySelector('video');
        const playBtn = box.querySelector('.play-btn');
        if (!video || !playBtn) return;

        const startTime = parseFloat(video.dataset.startTime || 0);

        // Pre-seek on metadata load if startTime specified
        if (startTime > 0) {
            const setInitialTime = () => {
                if (video.currentTime < startTime) {
                    try { video.currentTime = startTime; } catch (e) {}
                }
            };
            if (video.readyState >= 1) {
                setInitialTime();
            } else {
                video.addEventListener('loadedmetadata', setInitialTime, { once: true });
            }
        }

        const togglePlay = () => {
            if (video.paused) {
                // Mutual pause: pause any other video currently playing
                document.querySelectorAll('video').forEach(other => {
                    if (other !== video && !other.paused) {
                        other.pause();
                        const otherBtn = other.closest('.video-container')?.querySelector('.play-btn');
                        if (otherBtn) otherBtn.classList.remove('opacity-0', 'pointer-events-none');
                    }
                });

                if (startTime > 0 && video.currentTime < startTime) {
                    try { video.currentTime = startTime; } catch (e) {}
                }

                video.play().then(() => {
                    playBtn.classList.add('opacity-0', 'pointer-events-none');
                }).catch(() => {
                    video.play();
                    playBtn.classList.add('opacity-0', 'pointer-events-none');
                });
            } else {
                video.pause();
                playBtn.classList.remove('opacity-0', 'pointer-events-none');
            }
        };

        playBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            togglePlay();
        });
        video.addEventListener('click', (e) => {
            e.stopPropagation();
            togglePlay();
        });
        video.addEventListener('ended', () => {
            playBtn.classList.remove('opacity-0', 'pointer-events-none');
            if (startTime > 0) {
                try { video.currentTime = startTime; } catch (e) {}
            }
        });
    });

    // Author Insights Hover & Focus Content Switcher
    const authorCards = document.querySelectorAll('.author-video-card');
    const authorPanes = document.querySelectorAll('.author-info-pane');

    function switchAuthorPane(paneId) {
        if (!paneId) return;
        authorPanes.forEach(pane => {
            if (pane.id === paneId) {
                pane.classList.add('active');
            } else {
                pane.classList.remove('active');
            }
        });
        authorCards.forEach(card => {
            if (card.dataset.pane === paneId) {
                card.classList.add('is-active-card');
            } else {
                card.classList.remove('is-active-card');
            }
        });
    }

    authorCards.forEach(card => {
        const paneId = card.dataset.pane;
        if (!paneId) return;

        card.addEventListener('mouseenter', () => switchAuthorPane(paneId));
        card.addEventListener('focusin', () => switchAuthorPane(paneId));
        card.addEventListener('click', () => switchAuthorPane(paneId));
    });

    // 6. Global Bespoke Luxury Single Image Lightbox Popup (No Slider)
    const lightbox = document.getElementById('image-lightbox');
    const lightboxImg = document.getElementById('lightbox-img');
    const lightboxTitle = document.getElementById('lightbox-title');
    const lightboxCaption = document.getElementById('lightbox-caption');
    const lightboxGenre = document.getElementById('lightbox-genre');
    const lightboxClose = document.getElementById('lightbox-close');

    window.openLightbox = (src, caption = '') => {
        if (!lightbox || !lightboxImg || !src) return;

        // Parse title and genre if caption is formatted like "Title (Genre)"
        let displayTitle = caption;
        let displayGenre = 'Book Cover';
        const match = caption.match(/^(.*?)\s*\((.*?)\)$/);
        if (match) {
            displayTitle = match[1];
            displayGenre = match[2];
        }

        // Set target image source and metadata
        lightboxImg.src = src;
        if (lightboxTitle) lightboxTitle.textContent = displayTitle || 'Book Cover';
        if (lightboxGenre) lightboxGenre.textContent = displayGenre || 'Exclusive Preview';
        if (lightboxCaption) lightboxCaption.textContent = caption || 'Custom Cover Design — Bindwell Press';

        lightbox.classList.add('is-active');
        document.body.style.overflow = 'hidden';
    };

    window.closeLightbox = () => {
        if (!lightbox) return;
        lightbox.classList.remove('is-active');
        document.body.style.overflow = '';
        setTimeout(() => {
            if (!lightbox.classList.contains('is-active') && lightboxImg) {
                lightboxImg.src = '';
            }
        }, 350);
    };

    if (lightboxClose) lightboxClose.addEventListener('click', window.closeLightbox);

    document.addEventListener('keydown', (e) => {
        if (!lightbox || !lightbox.classList.contains('is-active')) return;
        if (e.key === 'Escape') {
            window.closeLightbox();
        }
    });

    // 7. Scroll-Triggered Reveal Animations Observer (Pure Custom CSS)
    if ('IntersectionObserver' in window) {
        const revealObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-revealed');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.12,
            rootMargin: '0px 0px -40px 0px'
        });

        // Automatically observe reveal elements
        document.querySelectorAll('.bwp-reveal, .bwp-reveal-scale, .reveal-on-scroll').forEach(el => {
            revealObserver.observe(el);
        });

        // Auto-observe major section containers for smooth staggered reveals
        document.querySelectorAll('section').forEach(sec => {
            if (!sec.classList.contains('bwp-reveal')) {
                sec.classList.add('bwp-reveal');
                revealObserver.observe(sec);
            }
        });
    } else {
        // Fallback for older browsers
        document.querySelectorAll('.bwp-reveal, .bwp-reveal-scale').forEach(el => {
            el.classList.add('is-revealed');
        });
    }

    // 8. Touch support for Mega Menus
    const dropdownNavItems = document.querySelectorAll('.bwp-nav-item');
    dropdownNavItems.forEach(item => {
        const link = item.querySelector('.bwp-nav-link');
        const menu = item.querySelector('.bwp-mega-dropdown');
        if (link && menu) {
            link.addEventListener('click', (e) => {
                if (window.innerWidth >= 1024 && ('ontouchstart' in window || navigator.maxTouchPoints > 0)) {
                    const isVisible = getComputedStyle(menu).visibility === 'visible';
                    if (!isVisible) {
                        e.preventDefault();
                        dropdownNavItems.forEach(other => {
                            const otherMenu = other.querySelector('.bwp-mega-dropdown');
                            if (otherMenu) otherMenu.style.visibility = '';
                        });
                        menu.style.opacity = '1';
                        menu.style.visibility = 'visible';
                        menu.style.pointerEvents = 'auto';
                    }
                }
            });
        }
    });

    document.addEventListener('click', (e) => {
        if (!e.target.closest('.bwp-nav-item')) {
            document.querySelectorAll('.bwp-mega-dropdown').forEach(menu => {
                menu.style.opacity = '';
                menu.style.visibility = '';
                menu.style.pointerEvents = '';
            });
        }
    });
});
