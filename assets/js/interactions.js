/**
 * Bindwell Press - Micro-Interactions & Interactive Widgets
 */

document.addEventListener('DOMContentLoaded', () => {
    // ==========================================
    // 1. Draggable Before / After Comparison Slider
    // ==========================================
    const baSliders = document.querySelectorAll('.ba-container');
    baSliders.forEach(slider => {
        const handle = slider.querySelector('.ba-handle');
        if (!handle) return;

        let isDragging = false;

        const updatePosition = (clientX) => {
            const rect = slider.getBoundingClientRect();
            let posX = clientX - rect.left;
            let percentage = (posX / rect.width) * 100;
            if (percentage < 2) percentage = 2;
            if (percentage > 98) percentage = 98;
            slider.style.setProperty('--ba-pos', `${percentage}%`);
        };

        const onPointerDown = (e) => {
            isDragging = true;
            slider.classList.add('is-dragging');
            updatePosition(e.clientX || (e.touches && e.touches[0].clientX));
        };

        const onPointerMove = (e) => {
            if (!isDragging) return;
            const clientX = e.clientX || (e.touches && e.touches[0].clientX);
            if (clientX !== undefined) {
                updatePosition(clientX);
            }
        };

        const onPointerUp = () => {
            if (isDragging) {
                isDragging = false;
                slider.classList.remove('is-dragging');
            }
        };

        slider.addEventListener('mousedown', onPointerDown);
        window.addEventListener('mousemove', onPointerMove);
        window.addEventListener('mouseup', onPointerUp);

        slider.addEventListener('touchstart', onPointerDown, { passive: true });
        window.addEventListener('touchmove', onPointerMove, { passive: true });
        window.addEventListener('touchend', onPointerUp);
    });

    // ==========================================
    // 2. Amazon Spotlight / Bestseller Auto-Scroll Carousel
    // ==========================================
    const bsTrack = document.getElementById('bestseller-track');
    const bsPrev = document.getElementById('bestseller-prev');
    const bsNext = document.getElementById('bestseller-next');

    if (bsTrack) {
        let isPaused = false;
        const scrollStep = 269;

        const doScrollNext = () => {
            if (bsTrack.scrollLeft + bsTrack.clientWidth >= bsTrack.scrollWidth - 10) {
                bsTrack.scrollTo({ left: 0, behavior: 'smooth' });
            } else {
                bsTrack.scrollBy({ left: scrollStep, behavior: 'smooth' });
            }
        };

        if (bsPrev) {
            bsPrev.addEventListener('click', () => {
                bsTrack.scrollBy({ left: -320, behavior: 'smooth' });
            });
        }

        if (bsNext) {
            bsNext.addEventListener('click', () => {
                bsTrack.scrollBy({ left: 320, behavior: 'smooth' });
            });
        }

        // Auto scroll interval (2600ms matching reference Next.js bundle)
        if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            const autoScrollTimer = setInterval(() => {
                if (!isPaused) {
                    doScrollNext();
                }
            }, 2600);

            bsTrack.addEventListener('mouseenter', () => isPaused = true);
            bsTrack.addEventListener('mouseleave', () => isPaused = false);
            bsTrack.addEventListener('touchstart', () => isPaused = true, { passive: true });
            bsTrack.addEventListener('touchend', () => isPaused = false);
        }
    }

    // ==========================================
    // 3. "Watch It Come To Life" 3D Experience Init
    // ==========================================
    // (Tabs removed, continuous 3D auto-rotate & manual interactive drag handled in initComeToLife3D)

    // ==========================================
    // 4. Book Fair Highlights Tab Switcher
    // ==========================================
    const fairTabs = document.querySelectorAll('.fair-tab-btn');
    const fairPreviewImg = document.getElementById('fair-preview-img');
    const fairTitle = document.getElementById('fair-preview-title');
    const fairLocation = document.getElementById('fair-preview-location');
    const fairBlurb = document.getElementById('fair-preview-blurb');
    const fairContainer = document.getElementById('fair-preview-container');

    fairTabs.forEach(tab => {
        tab.addEventListener('click', () => {
            fairTabs.forEach(t => {
                t.classList.remove('border-gold-200', 'bg-gold-50');
                t.classList.add('border-royal-100', 'bg-white');
                const badge = t.querySelector('.tab-badge');
                if (badge) {
                    badge.classList.remove('bg-gold-gradient', 'text-royal-900');
                    badge.classList.add('bg-gold-50', 'text-gold-600');
                }
            });

            tab.classList.add('border-gold-200', 'bg-gold-50');
            tab.classList.remove('border-royal-100', 'bg-white');
            const activeBadge = tab.querySelector('.tab-badge');
            if (activeBadge) {
                activeBadge.classList.add('bg-gold-gradient', 'text-royal-900');
                activeBadge.classList.remove('bg-gold-50', 'text-gold-600');
            }

            const img = tab.dataset.image;
            const title = tab.dataset.title;
            const loc = tab.dataset.location;
            const blurb = tab.dataset.blurb;
            const palette = tab.dataset.palette ? JSON.parse(tab.dataset.palette) : ['#2A2150', '#9B2242'];

            if (fairPreviewImg) {
                fairPreviewImg.style.opacity = '0';
                setTimeout(() => {
                    fairPreviewImg.src = img;
                    fairPreviewImg.alt = title;
                    if (fairTitle) fairTitle.textContent = title;
                    if (fairLocation) fairLocation.textContent = loc;
                    if (fairBlurb) fairBlurb.textContent = blurb;
                    if (fairContainer) {
                        fairContainer.style.background = `linear-gradient(135deg, ${palette[0]}, ${palette[1]})`;
                    }
                    fairPreviewImg.style.opacity = '1';
                }, 200);
            }
        });
    });

    // ==========================================
    // 5. Cover Portfolio Genre Filtering
    // ==========================================
    const filterButtons = document.querySelectorAll('.portfolio-filter-btn');
    const portfolioCards = document.querySelectorAll('.portfolio-card-item');

    filterButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const filter = btn.dataset.filter;

            filterButtons.forEach(b => b.classList.remove('is-active'));
            btn.classList.add('is-active');

            portfolioCards.forEach(card => {
                const cardGenre = card.dataset.genre;
                if (filter === 'All' || cardGenre === filter) {
                    card.style.display = '';
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'scale(1)';
                    }, 50);
                } else {
                    card.style.opacity = '0';
                    card.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        card.style.display = 'none';
                    }, 250);
                }
            });
        });
    });

    // ==========================================
    // 6. Numbers That Speak - Smooth Cubic Counters
    // ==========================================
    const counterElements = document.querySelectorAll('.counter-number');
    if (counterElements.length > 0 && 'IntersectionObserver' in window) {
        const counterObserver = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    const target = parseInt(el.dataset.target, 10) || 0;
                    const duration = 2000;
                    const startTime = performance.now();

                    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                        el.textContent = target.toLocaleString('en-US');
                        obs.unobserve(el);
                        return;
                    }

                    const animateCounter = (currentTime) => {
                        const elapsed = currentTime - startTime;
                        const progress = Math.min(elapsed / duration, 1);
                        // Cubic ease-out: 1 - pow(1 - progress, 3)
                        const easeProgress = 1 - Math.pow(1 - progress, 3);
                        const currentVal = Math.round(easeProgress * target);

                        el.textContent = currentVal.toLocaleString('en-US');

                        if (progress < 1) {
                            requestAnimationFrame(animateCounter);
                        } else {
                            el.textContent = target.toLocaleString('en-US');
                        }
                    };

                    requestAnimationFrame(animateCounter);
                    obs.unobserve(el);
                }
            });
        }, { threshold: 0.4 });

        counterElements.forEach(el => counterObserver.observe(el));
    }

    // ==========================================
    // 7. Frequently Asked Questions Accordion
    // ==========================================
    const faqItems = document.querySelectorAll('.accordion-item');
    faqItems.forEach(item => {
        const button = item.querySelector('.accordion-button');
        if (!button) return;

        button.addEventListener('click', () => {
            const isOpen = item.classList.contains('is-open');

            // Close other items
            faqItems.forEach(other => {
                if (other !== item) {
                    other.classList.remove('is-open');
                    const otherBtn = other.querySelector('.accordion-button');
                    if (otherBtn) otherBtn.setAttribute('aria-expanded', 'false');
                }
            });

            // Toggle current item
            if (isOpen) {
                item.classList.remove('is-open');
                button.setAttribute('aria-expanded', 'false');
            } else {
                item.classList.add('is-open');
                button.setAttribute('aria-expanded', 'true');
            }
        });
    });

    // ==========================================
    // Book Fair Moments Smooth Deceleration Marquee
    // ==========================================
    const fairTrack = document.querySelector('.fair-gallery-marquee');
    if (fairTrack) {
        fairTrack.style.animation = 'none';
        
        let currentX = 0;
        let targetSpeed = 1.0;
        let currentSpeed = 1.0;
        const baseSpeed = 0.92;

        fairTrack.addEventListener('mouseenter', () => { targetSpeed = 0; });
        fairTrack.addEventListener('mouseleave', () => { targetSpeed = 1.0; });
        fairTrack.addEventListener('touchstart', () => { targetSpeed = 0; }, { passive: true });
        fairTrack.addEventListener('touchend', () => { targetSpeed = 1.0; });

        let lastTime = performance.now();
        function updateFairMarquee(now) {
            requestAnimationFrame(updateFairMarquee);
            const dt = Math.min((now - lastTime) / 16.667, 2.0);
            lastTime = now;

            // Smooth exponential deceleration / acceleration easing
            currentSpeed += (targetSpeed - currentSpeed) * (0.06 * dt);

            currentX -= baseSpeed * currentSpeed * dt;

            const halfWidth = fairTrack.scrollWidth / 2;
            if (halfWidth > 0 && Math.abs(currentX) >= halfWidth) {
                currentX += halfWidth;
            }

            fairTrack.style.transform = `translate3d(${currentX}px, 0, 0)`;
        }
        requestAnimationFrame(updateFairMarquee);
    }

    // ==========================================
    // 8. Contact Consultation Form Submission (AJAX + CSRF)
    // ==========================================
    const contactForm = document.getElementById('consultation-form');
    const formFeedback = document.getElementById('form-feedback');

    if (contactForm) {
        contactForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            const submitBtn = contactForm.querySelector('button[type="submit"]');
            const originalBtnHtml = submitBtn ? submitBtn.innerHTML : '';

            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<span class="inline-block animate-spin mr-2">⟳</span> Sending...';
            }

            if (formFeedback) {
                formFeedback.className = 'hidden';
                formFeedback.textContent = '';
            }

            try {
                const formData = new FormData(contactForm);
                const endpoint = contactForm.getAttribute('action') || 'api/contact.php';
                const response = await fetch(endpoint, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });

                const result = await response.json();

                if (formFeedback) {
                    formFeedback.classList.remove('hidden');
                    if (result.success) {
                        formFeedback.className = 'p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm font-body';
                        formFeedback.innerHTML = `<strong>Success!</strong> ${result.message}`;
                        contactForm.reset();
                    } else {
                        formFeedback.className = 'p-4 rounded-xl bg-red-50 border border-red-200 text-red-800 text-sm font-body';
                        formFeedback.innerHTML = `<strong>Error:</strong> ${result.message}`;
                    }
                }
            } catch (err) {
                if (formFeedback) {
                    formFeedback.classList.remove('hidden');
                    formFeedback.className = 'p-4 rounded-xl bg-red-50 border border-red-200 text-red-800 text-sm font-body';
                    formFeedback.textContent = 'A network error occurred. Please try again or call us directly at (02) 8531 1364.';
                }
            } finally {
                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalBtnHtml;
                }
            }
        });
    }

    // ==========================================
    // 9. Newsletter Subscription Form
    // ==========================================
    const newsletterForm = document.getElementById('newsletter-form');
    const newsletterFeedback = document.getElementById('newsletter-feedback');

    if (newsletterForm) {
        newsletterForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const emailInput = newsletterForm.querySelector('input[type="email"]');
            if (!emailInput || !emailInput.value) return;

            if (newsletterFeedback) {
                newsletterFeedback.classList.remove('hidden');
                newsletterFeedback.textContent = 'Thank you for subscribing! Your discount code has been sent.';
                newsletterForm.reset();
            }
        });
    }

    // ==========================================
    // 9b. Interactive Royalty & Earnings Calculator
    // ==========================================
    const calcCopies = document.getElementById('calc-copies');
    const calcPrice = document.getElementById('calc-price');
    const calcCopiesVal = document.getElementById('calc-copies-val');
    const calcPriceVal = document.getElementById('calc-price-val');
    const tradEarningsEl = document.getElementById('trad-earnings');
    const canberraEarningsEl = document.getElementById('canberra-earnings');
    const diffEarningsEl = document.getElementById('diff-earnings');
    const formatBtns = document.querySelectorAll('.calc-format-btn');

    if (calcCopies && calcPrice) {
        let printCost = 4.20;

        const updateCalculator = () => {
            const copies = parseInt(calcCopies.value, 10) || 5000;
            const price = parseFloat(calcPrice.value) || 19.99;

            if (calcCopiesVal) calcCopiesVal.textContent = copies.toLocaleString('en-US');
            if (calcPriceVal) calcPriceVal.textContent = '$' + price.toFixed(2);

            const tradEarnings = Math.round(copies * price * 0.12);
            const netPerCopy = Math.max(0, price - printCost);
            const canberraEarnings = Math.round(copies * netPerCopy);
            const diff = Math.max(0, canberraEarnings - tradEarnings);

            if (tradEarningsEl) tradEarningsEl.textContent = '$' + tradEarnings.toLocaleString('en-US');
            if (canberraEarningsEl) canberraEarningsEl.textContent = '$' + canberraEarnings.toLocaleString('en-US');
            if (diffEarningsEl) diffEarningsEl.textContent = '+$' + diff.toLocaleString('en-US') + ' More With Bindwell Press';
        };

        calcCopies.addEventListener('input', updateCalculator);
        calcPrice.addEventListener('input', updateCalculator);

        formatBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                formatBtns.forEach(b => {
                    b.classList.remove('bg-slate-900', 'text-white', 'border-slate-900', 'active');
                    b.classList.add('bg-white', 'text-slate-700', 'border-slate-200');
                });
                btn.classList.add('bg-slate-900', 'text-white', 'border-slate-900', 'active');
                btn.classList.remove('bg-white', 'text-slate-700', 'border-slate-200');
                printCost = parseFloat(btn.dataset.cost) || 0;
                updateCalculator();
            });
        });

        updateCalculator();
    }

    // ==========================================
    // 9c. Global Distribution Regional Tabs
    // ==========================================
    const distTabs = document.querySelectorAll('.dist-tab-btn');
    const distPanels = document.querySelectorAll('.dist-panel');

    distTabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const region = tab.dataset.region;

            distTabs.forEach(t => {
                t.classList.remove('bg-[#D4AF37]', 'text-slate-950', 'shadow-[0_4px_15px_rgba(212,175,55,0.4)]');
                t.classList.add('bg-white/5', 'text-slate-300');
            });
            tab.classList.add('bg-[#D4AF37]', 'text-slate-950', 'shadow-[0_4px_15px_rgba(212,175,55,0.4)]');
            tab.classList.remove('bg-white/5', 'text-slate-300');

            distPanels.forEach(panel => {
                if (panel.id === `dist-panel-${region}`) {
                    panel.classList.remove('hidden');
                    panel.style.opacity = '0';
                    setTimeout(() => panel.style.opacity = '1', 30);
                } else {
                    panel.classList.add('hidden');
                }
            });
        });
    });

    // ==========================================
    // 10. Hero 3D Book Stack & Gold Dust Particles (Chunk 715)
    // ==========================================
    function initHero3D() {
        const container = document.getElementById('hero-3d-canvas');
        const fallback = document.getElementById('hero-3d-fallback');
        if (!container || container.offsetParent === null || container.closest('[style*="display: none"]') || typeof THREE === 'undefined') return;

        const centerSrc = container.dataset.center;
        const leftSrc = container.dataset.left;
        const rightSrc = container.dataset.right;
        if (!centerSrc || !leftSrc || !rightSrc) return;

        const width = container.clientWidth || 500;
        const height = container.clientHeight || 500;

        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(42, width / height, 0.1, 100);
        camera.position.set(0, 0.15, 6.4);

        let renderer;
        try {
            renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true, powerPreference: 'high-performance' });
            renderer.setSize(width, height);
            renderer.setPixelRatio(Math.min(window.devicePixelRatio || 1, 1.8));
            renderer.outputEncoding = THREE.sRGBEncoding;
            container.appendChild(renderer.domElement);
        } catch (e) {
            console.warn('WebGL not supported for Hero 3D:', e);
            return;
        }

        // Lighting matching Bindwell Press Chunk 715
        const ambientLight = new THREE.AmbientLight(0xffffff, 0.8);
        scene.add(ambientLight);

        const dirLight1 = new THREE.DirectionalLight(0xfff7e6, 1.1);
        dirLight1.position.set(4, 7, 6);
        scene.add(dirLight1);

        const dirLight2 = new THREE.DirectionalLight(0xD4AF37, 0.65);
        dirLight2.position.set(-6, 3, 2);
        scene.add(dirLight2);

        const pointLight1 = new THREE.PointLight(0x3B82F6, 0.35);
        pointLight1.position.set(0, -1, 5);
        scene.add(pointLight1);

        const pointLight2 = new THREE.PointLight(0xD4AF37, 0.45);
        pointLight2.position.set(5, 2, 1);
        scene.add(pointLight2);

        // Contact Shadow Plane
        const shadowCanvas = document.createElement('canvas');
        shadowCanvas.width = 128;
        shadowCanvas.height = 128;
        const sCtx = shadowCanvas.getContext('2d');
        const sGrad = sCtx.createRadialGradient(64, 64, 0, 64, 64, 64);
        sGrad.addColorStop(0, 'rgba(8, 12, 22, 0.45)');
        sGrad.addColorStop(0.6, 'rgba(8, 12, 22, 0.15)');
        sGrad.addColorStop(1, 'rgba(8, 12, 22, 0)');
        sCtx.fillStyle = sGrad;
        sCtx.fillRect(0, 0, 128, 128);
        const shadowTex = new THREE.CanvasTexture(shadowCanvas);
        const shadowMesh = new THREE.Mesh(
            new THREE.PlaneGeometry(5.5, 3),
            new THREE.MeshBasicMaterial({ map: shadowTex, transparent: true, opacity: 0.35, depthWrite: false })
        );
        shadowMesh.position.set(0, -1.7, 0);
        shadowMesh.rotation.x = -Math.PI / 2;
        scene.add(shadowMesh);

        // Dust / Sparkle Particles (180 points in 3D volume)
        const particleGeo = new THREE.BufferGeometry();
        const particleCoords = new Float32Array(540);
        for (let i = 0; i < 180; i++) {
            particleCoords[3 * i] = (Math.random() - 0.5) * 8;
            particleCoords[3 * i + 1] = (Math.random() - 0.5) * 5.5;
            particleCoords[3 * i + 2] = (Math.random() - 0.5) * 5;
        }
        particleGeo.setAttribute('position', new THREE.BufferAttribute(particleCoords, 3));
        const particleMat = new THREE.PointsMaterial({
            color: 0xF3E5AB,
            size: 0.045,
            transparent: true,
            opacity: 0.8,
            depthWrite: false
        });
        const particles = new THREE.Points(particleGeo, particleMat);
        scene.add(particles);

        // Books Group
        const booksGroup = new THREE.Group();
        scene.add(booksGroup);

        const texLoader = new THREE.TextureLoader();
        function createBookMaterial(tex) {
            tex.encoding = THREE.sRGBEncoding;
            tex.anisotropy = 8;
            return new THREE.MeshStandardMaterial({
                map: tex,
                roughness: 0.45,
                metalness: 0.05,
                side: THREE.DoubleSide
            });
        }

        let centerGroup = null;
        let leftMesh = null;
        let rightMesh = null;

        // Load Center Book (Master Your Emotions)
        texLoader.load(centerSrc, (tex) => {
            const mat = createBookMaterial(tex);
            const geo = new THREE.PlaneGeometry(1.92, 2.78);
            const mesh = new THREE.Mesh(geo, mat);
            centerGroup = new THREE.Group();
            centerGroup.add(mesh);
            booksGroup.add(centerGroup);
            if (fallback) {
                fallback.style.opacity = '0';
                fallback.style.pointerEvents = 'none';
            }
        });

        // Load Left Book (Touched)
        texLoader.load(leftSrc, (tex) => {
            const mat = createBookMaterial(tex);
            const geo = new THREE.PlaneGeometry(1.28, 1.86);
            leftMesh = new THREE.Mesh(geo, mat);
            leftMesh.position.set(-1.85, 0.32, -1.35);
            leftMesh.rotation.set(0.04, 0.34, 0.02);
            booksGroup.add(leftMesh);
        });

        // Load Right Book (The Peculiar Castaway)
        texLoader.load(rightSrc, (tex) => {
            const mat = createBookMaterial(tex);
            const geo = new THREE.PlaneGeometry(1.28, 1.86);
            rightMesh = new THREE.Mesh(geo, mat);
            rightMesh.position.set(1.85, 0.05, -1.35);
            rightMesh.rotation.set(0.04, -0.34, 0.02);
            booksGroup.add(rightMesh);
        });

        // Initial entrance animation via GSAP
        if (typeof gsap !== 'undefined') {
            gsap.from(booksGroup.scale, { x: 0.88, y: 0.88, z: 0.88, duration: 1.1, ease: 'power3.out' });
            gsap.from(booksGroup.position, { y: -0.35, duration: 1.1, ease: 'power3.out' });
            gsap.from(booksGroup.rotation, { y: -0.3, duration: 1.3, ease: 'power2.out' });
        }

        // Pointer Parallax
        const pointer = { x: 0, y: 0 };
        window.addEventListener('mousemove', (e) => {
            pointer.x = (e.clientX / window.innerWidth) * 2 - 1;
            pointer.y = -(e.clientY / window.innerHeight) * 2 + 1;
        }, { passive: true });

        // Animation Loop
        const clock = new THREE.Clock();
        function animateHero() {
            requestAnimationFrame(animateHero);
            const elapsedTime = clock.getElapsedTime();

            // Camera Parallax
            camera.position.x += (0.45 * pointer.x - camera.position.x) * 0.04;
            camera.position.y += (0.25 + 0.25 * pointer.y - camera.position.y) * 0.04;
            camera.lookAt(0, 0.05, 0);

            // Center book float & rotate
            if (centerGroup) {
                centerGroup.rotation.y = 0.38 * Math.sin(0.45 * elapsedTime);
                centerGroup.rotation.x = 0.02 + 0.03 * Math.sin(0.6 * elapsedTime);
                centerGroup.position.y = 0.08 * Math.sin(1.1 * elapsedTime);
            }

            // Left & Right books float
            if (leftMesh) {
                leftMesh.position.y = 0.32 + 0.06 * Math.sin(1.5 * elapsedTime + 1.2);
                leftMesh.rotation.y = 0.34 + 0.03 * Math.sin(1.2 * elapsedTime);
            }
            if (rightMesh) {
                rightMesh.position.y = 0.05 + 0.06 * Math.sin(1.5 * elapsedTime + 2.5);
                rightMesh.rotation.y = -0.34 + 0.03 * Math.sin(1.2 * elapsedTime + 0.5);
            }

            // Particles slow rotation & subtle bobbing
            if (particles) {
                particles.rotation.y += 0.04 * 0.016;
                particles.position.y = 0.12 * Math.sin(0.25 * elapsedTime);
            }

            renderer.render(scene, camera);
        }
        animateHero();

        const onResize = () => {
            if (!container) return;
            const w = container.clientWidth;
            const h = container.clientHeight;
            if (w > 0 && h > 0) {
                camera.aspect = w / h;
                camera.updateProjectionMatrix();
                renderer.setSize(w, h);
            }
        };
        window.addEventListener('resize', onResize);
    }

    // ==========================================
    // 11. "Covers In Motion" 3D Circular Carousel (Three.js Cylindrical Ring)
    // ==========================================
    function initShelf3D() {
        const wrapper = document.getElementById('shelf-3d-wrapper');
        const container = document.getElementById('shelf-3d-canvas');
        const fallback = document.getElementById('shelf-fallback');
        const prevBtn = document.getElementById('cm-prev-btn');
        const nextBtn = document.getElementById('cm-next-btn');
        if (!wrapper || !container || typeof THREE === 'undefined') return;

        let rawData = [];
        try {
            rawData = JSON.parse(wrapper.dataset.covers || '[]');
        } catch (e) {
            rawData = [];
        }
        if (!rawData.length) return;

        // Normalize rawData to objects { title, genre, image }
        const bookItems = rawData.map(item => {
            if (typeof item === 'string') {
                return { title: 'Bestselling Book', genre: 'Featured', image: item };
            }
            return {
                title: item.title || 'Bestselling Book',
                genre: item.genre || 'Publishing',
                image: item.image
            };
        });

        const width = container.clientWidth || window.innerWidth;
        const isMobile = width < 768;
        const height = container.clientHeight || (isMobile ? 480 : 580);

        const scene = new THREE.Scene();
        // Camera positioned to view cylindrical ring from elegant angle with clear clearance
        const camera = new THREE.PerspectiveCamera(isMobile ? 42 : 38, width / height, 0.1, 100);
        camera.position.set(0, isMobile ? 1.4 : 1.65, isMobile ? 12.2 : 10.2);
        camera.lookAt(0, 0.05, 0);

        let renderer;
        try {
            renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true, powerPreference: 'high-performance' });
            renderer.setSize(width, height);
            renderer.setPixelRatio(Math.min(window.devicePixelRatio || 1, 2));
            renderer.outputEncoding = THREE.sRGBEncoding;
            container.appendChild(renderer.domElement);
        } catch (e) {
            console.warn('WebGL not supported for 3D Carousel:', e);
            return;
        }

        // --- Studio Lighting Setup ---
        const ambientLight = new THREE.AmbientLight(0xfff8ee, 1.15);
        scene.add(ambientLight);

        // Warm front key light
        const keyLight = new THREE.DirectionalLight(0xffffff, 1.1);
        keyLight.position.set(4, 7, 8);
        scene.add(keyLight);

        // Gold rim / fill light
        const goldFillLight = new THREE.DirectionalLight(0xC98E5E, 0.75);
        goldFillLight.position.set(-6, 4, 4);
        scene.add(goldFillLight);

        // Soft center top glow
        const topSpot = new THREE.PointLight(0xDFB28C, 0.8, 25);
        topSpot.position.set(0, 5, 4);
        scene.add(topSpot);

        // --- Floor Pedestal Ring & Soft Contact Shadow ---
        const count = bookItems.length;
        let radius = width < 768 ? 4.2 : 5.8;
        const step = (2 * Math.PI) / count;

        // Floor circular glow ring
        const ringGeo = new THREE.RingGeometry(radius - 0.75, radius + 0.75, 64);
        const ringMat = new THREE.MeshBasicMaterial({
            color: 0xC98E5E,
            transparent: true,
            opacity: 0.28,
            side: THREE.DoubleSide,
            depthWrite: false
        });
        const ringMesh = new THREE.Mesh(ringGeo, ringMat);
        ringMesh.rotation.x = -Math.PI / 2;
        ringMesh.position.y = -1.15;
        scene.add(ringMesh);

        // Floor Shadow plane
        const shadowCanvas = document.createElement('canvas');
        shadowCanvas.width = 256;
        shadowCanvas.height = 256;
        const sCtx = shadowCanvas.getContext('2d');
        const sGrad = sCtx.createRadialGradient(128, 128, 30, 128, 128, 128);
        sGrad.addColorStop(0, 'rgba(20, 7, 13, 0.35)');
        sGrad.addColorStop(0.5, 'rgba(201, 142, 94, 0.12)');
        sGrad.addColorStop(0.8, 'rgba(20, 7, 13, 0.05)');
        sGrad.addColorStop(1, 'rgba(20, 7, 13, 0)');
        sCtx.fillStyle = sGrad;
        sCtx.fillRect(0, 0, 256, 256);
        const shadowTex = new THREE.CanvasTexture(shadowCanvas);
        const shadowMesh = new THREE.Mesh(
            new THREE.PlaneGeometry(18, 18),
            new THREE.MeshBasicMaterial({ map: shadowTex, transparent: true, opacity: 0.8, depthWrite: false })
        );
        shadowMesh.rotation.x = -Math.PI / 2;
        shadowMesh.position.y = -1.16;
        scene.add(shadowMesh);

        // --- Carousel Books Setup ---
        const carouselGroup = new THREE.Group();
        scene.add(carouselGroup);

        const texLoader = new THREE.TextureLoader();
        const bookMeshes = [];
        const boxGeo = new THREE.BoxGeometry(1.58, 2.44, 0.15);

        // Realistic book face materials:
        // Index 0 (+X): Open Pages edge
        // Index 1 (-X): Spine binding
        // Index 2 (+Y): Top Pages
        // Index 3 (-Y): Bottom Pages
        // Index 4 (+Z): Front Cover
        // Index 5 (-Z): Back Cover
        const spineMat = new THREE.MeshStandardMaterial({ color: 0x14070D, roughness: 0.5, metalness: 0.12 });
        const pagesMat = new THREE.MeshStandardMaterial({ color: 0xFAF6F0, roughness: 0.8, metalness: 0.02 });

        let loadedCount = 0;

        for (let i = 0; i < count; i++) {
            const item = bookItems[i];
            const coverMat = new THREE.MeshStandardMaterial({
                color: 0xffffff,
                roughness: 0.32,
                metalness: 0.06
            });

            // 6 faces: pages on right, spine on left, pages on top/bottom, cover on front and back
            const materials = [pagesMat, spineMat, pagesMat, pagesMat, coverMat, coverMat];
            const mesh = new THREE.Mesh(boxGeo, materials);
            mesh.castShadow = true;
            mesh.userData = {
                index: i,
                title: item.title,
                genre: item.genre,
                image: item.image,
                baseAngle: i * step
            };

            carouselGroup.add(mesh);
            bookMeshes.push(mesh);

            texLoader.load(item.image, (tex) => {
                tex.encoding = THREE.sRGBEncoding;
                tex.anisotropy = 8;
                coverMat.map = tex;
                coverMat.needsUpdate = true;
                loadedCount++;
                if (loadedCount >= 2 && fallback) {
                    fallback.style.opacity = '0';
                    fallback.style.pointerEvents = 'none';
                }
            });
        }

        // --- Physics & Interaction State ---
        let currentRot = 0;
        let targetRot = 0;
        let vel = 0;
        let isDragging = false;
        let startX = 0;
        let lastX = 0;
        let dragDistance = 0;
        let lastUserAction = Date.now();

        // Raycasting for interactive click & hover
        const raycaster = new THREE.Raycaster();
        const mouse = new THREE.Vector2();
        let hoveredMesh = null;

        const onPointerDown = (clientX, clientY) => {
            isDragging = true;
            startX = clientX;
            lastX = clientX;
            dragDistance = 0;
            vel = 0;
            lastUserAction = Date.now();
            wrapper.classList.add('is-dragging');
        };

        const onPointerMove = (clientX, clientY) => {
            if (isDragging) {
                const delta = clientX - lastX;
                dragDistance += Math.abs(delta);
                targetRot += delta * (width < 768 ? 0.007 : 0.0045);
                vel = delta * (width < 768 ? 0.007 : 0.0045);
                lastX = clientX;
                lastUserAction = Date.now();
            } else {
                // Raycasting on hover
                const rect = container.getBoundingClientRect();
                mouse.x = ((clientX - rect.left) / rect.width) * 2 - 1;
                mouse.y = -((clientY - rect.top) / rect.height) * 2 + 1;
                raycaster.setFromCamera(mouse, camera);
                const intersects = raycaster.intersectObjects(bookMeshes);
                if (intersects.length > 0) {
                    const hit = intersects[0].object;
                    if (hit.position.z > -0.5) {
                        hoveredMesh = hit;
                        container.style.cursor = 'pointer';
                    } else {
                        hoveredMesh = null;
                        container.style.cursor = '';
                    }
                } else {
                    hoveredMesh = null;
                    container.style.cursor = '';
                }
            }
        };

        const onPointerUp = (clientX, clientY) => {
            if (isDragging) {
                isDragging = false;
                wrapper.classList.remove('is-dragging');

                // If practically no movement, treat as click / tap
                const openFn = window.openLightbox || (typeof openLightbox === 'function' ? openLightbox : null);
                if (dragDistance < 8 && typeof openFn === 'function') {
                    const rect = container.getBoundingClientRect();
                    const x = clientX !== undefined ? clientX : lastX;
                    const y = clientY !== undefined ? clientY : rect.top + rect.height / 2;
                    mouse.x = ((x - rect.left) / rect.width) * 2 - 1;
                    mouse.y = -((y - rect.top) / rect.height) * 2 + 1;
                    raycaster.setFromCamera(mouse, camera);
                    const intersects = raycaster.intersectObjects(bookMeshes);
                    if (intersects.length > 0) {
                        const hit = intersects[0].object;
                        if (hit.position.z > -1.8) {
                            openFn(hit.userData.image, `${hit.userData.title} (${hit.userData.genre})`);
                        }
                    }
                }
            }
        };

        // Pointer event listeners on wrapper
        wrapper.addEventListener('pointerdown', (e) => onPointerDown(e.clientX, e.clientY));
        window.addEventListener('pointermove', (e) => onPointerMove(e.clientX, e.clientY));
        window.addEventListener('pointerup', (e) => onPointerUp(e.clientX, e.clientY));
        window.addEventListener('pointercancel', (e) => onPointerUp(e.clientX, e.clientY));

        // Direct click event listener for guaranteed book selection
        wrapper.addEventListener('click', (e) => {
            if (e.target.closest('.cm-controls-bar') || e.target.closest('.cm-nav-btn')) return;
            if (dragDistance > 10) return;
            const openFn = window.openLightbox || (typeof openLightbox === 'function' ? openLightbox : null);
            if (typeof openFn !== 'function') return;

            const rect = container.getBoundingClientRect();
            mouse.x = ((e.clientX - rect.left) / rect.width) * 2 - 1;
            mouse.y = -((e.clientY - rect.top) / rect.height) * 2 + 1;
            raycaster.setFromCamera(mouse, camera);
            const intersects = raycaster.intersectObjects(bookMeshes);
            if (intersects.length > 0) {
                const hit = intersects[0].object;
                if (hit.position.z > -2.2) {
                    openFn(hit.userData.image, `${hit.userData.title} (${hit.userData.genre})`);
                }
            }
        });

        // Touch event listeners
        wrapper.addEventListener('touchstart', (e) => {
            if (e.touches && e.touches[0]) onPointerDown(e.touches[0].clientX, e.touches[0].clientY);
        }, { passive: true });
        window.addEventListener('touchmove', (e) => {
            if (e.touches && e.touches[0]) onPointerMove(e.touches[0].clientX, e.touches[0].clientY);
        }, { passive: true });
        window.addEventListener('touchend', (e) => {
            const touch = e.changedTouches ? e.changedTouches[0] : null;
            onPointerUp(touch ? touch.clientX : undefined, touch ? touch.clientY : undefined);
        });

        // Arrow navigation buttons
        if (prevBtn) {
            prevBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                targetRot += step;
                lastUserAction = Date.now();
            });
        }
        if (nextBtn) {
            nextBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                targetRot -= step;
                lastUserAction = Date.now();
            });
        }

        // --- Animation Loop ---
        const clock = new THREE.Clock();
        function animateCarousel() {
            requestAnimationFrame(animateCarousel);
            const delta = clock.getDelta();
            const time = clock.getElapsedTime();

            // Smooth interpolation to target rotation
            currentRot += (targetRot - currentRot) * 0.12;

            if (!isDragging) {
                targetRot += vel;
                vel *= 0.92; // inertia decay

                // Auto-drift if user is inactive
                if (Date.now() - lastUserAction > 1500) {
                    targetRot += 0.0025;
                }
            }

            // Position and rotate books in 3D circular cylinder
            for (let i = 0; i < bookMeshes.length; i++) {
                const mesh = bookMeshes[i];
                const angle = mesh.userData.baseAngle + currentRot;

                // X & Z coordinates around circle
                const x = Math.sin(angle) * radius;
                const z = Math.cos(angle) * radius - (radius * 0.28);

                // Gentle floating wave with elevated center
                let y = 0.38 + Math.sin(time * 1.6 + i * 0.45) * 0.09;

                // Extra lift if hovered
                const isHovered = (mesh === hoveredMesh);
                if (isHovered) {
                    y += 0.22;
                }

                mesh.position.set(x, y, z);

                // Face outward from circle center
                mesh.rotation.y = angle;
                mesh.rotation.x = -0.05; // slight cinematic downward tilt
                mesh.rotation.z = Math.sin(time * 1.2 + i * 0.5) * 0.02;

                // Depth scaling and opacity
                const cosVal = Math.cos(angle); // 1 = front center, -1 = back
                const depthFactor = (cosVal + 1) / 2; // 0 to 1
                const mobMult = (width < 768) ? 0.76 : 1.0;
                let scale = (0.82 + 0.32 * depthFactor) * mobMult;
                if (isHovered) {
                    scale *= 1.1;
                }
                mesh.scale.set(scale, scale, scale);

                // Adjust material brightness for back books
                const frontMat = mesh.material[4];
                if (frontMat && frontMat.color) {
                    const brightness = 0.55 + 0.45 * depthFactor;
                    frontMat.color.setRGB(brightness, brightness, brightness);
                }
            }

            renderer.render(scene, camera);
        }
        animateCarousel();

        // Responsive Resize
        const onResize = () => {
            if (!container) return;
            const w = container.clientWidth;
            const h = container.clientHeight;
            if (w > 0 && h > 0) {
                const isM = w < 768;
                camera.aspect = w / h;
                camera.fov = isM ? 42 : 38;
                camera.position.set(0, isM ? 1.4 : 1.65, isM ? 12.2 : 10.2);
                camera.updateProjectionMatrix();
                renderer.setSize(w, h);
                radius = isM ? 4.2 : 5.8;
                ringMesh.geometry.dispose();
                ringMesh.geometry = new THREE.RingGeometry(radius - 0.75, radius + 0.75, 64);
            }
        };
        window.addEventListener('resize', onResize);
    }

    // ==========================================
    // 12. "Watch It Come To Life" 3D Rotating Hardcover Book (Chunk 268)
    // ==========================================
    function initComeToLife3D() {
        const container = document.getElementById('life-3d-canvas');
        const fallback = document.getElementById('life-3d-fallback');
        if (!container || typeof THREE === 'undefined') return;

        let coverUrls = [];
        try {
            coverUrls = JSON.parse(container.dataset.covers || '[]');
        } catch (e) {
            coverUrls = [];
        }
        if (!coverUrls.length) return;

        const width = container.clientWidth || 400;
        const height = container.clientHeight || 450;

        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(42, width / height, 0.1, 100);
        camera.position.set(0, 0, 6.2);

        let renderer;
        try {
            renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true, powerPreference: 'high-performance' });
            renderer.setSize(width, height);
            renderer.setPixelRatio(Math.min(window.devicePixelRatio || 1, 1.8));
            renderer.outputEncoding = THREE.sRGBEncoding;
            container.appendChild(renderer.domElement);
        } catch (e) {
            console.warn('WebGL not supported for Come To Life 3D:', e);
            return;
        }

        // Lighting matching Chunk 268
        const ambientLight = new THREE.AmbientLight(0xffffff, 0.85);
        scene.add(ambientLight);

        const dirLight1 = new THREE.DirectionalLight(0xfff7e6, 1.1);
        dirLight1.position.set(4, 6, 6);
        scene.add(dirLight1);

        const dirLight2 = new THREE.DirectionalLight(0xD4AF37, 0.55);
        dirLight2.position.set(-5, 2, 3);
        scene.add(dirLight2);

        const pointLight = new THREE.PointLight(0xD4AF37, 0.45);
        pointLight.position.set(0, -2, 4);
        scene.add(pointLight);

        // Contact Shadow underneath
        const shadowCanvas = document.createElement('canvas');
        shadowCanvas.width = 128;
        shadowCanvas.height = 128;
        const sCtx = shadowCanvas.getContext('2d');
        const sGrad = sCtx.createRadialGradient(64, 64, 0, 64, 64, 64);
        sGrad.addColorStop(0, 'rgba(6, 9, 17, 0.65)');
        sGrad.addColorStop(0.6, 'rgba(6, 9, 17, 0.25)');
        sGrad.addColorStop(1, 'rgba(6, 9, 17, 0)');
        sCtx.fillStyle = sGrad;
        sCtx.fillRect(0, 0, 128, 128);
        const shadowTex = new THREE.CanvasTexture(shadowCanvas);
        const shadowMesh = new THREE.Mesh(
            new THREE.PlaneGeometry(6, 4),
            new THREE.MeshBasicMaterial({ map: shadowTex, transparent: true, opacity: 0.32, depthWrite: false })
        );
        shadowMesh.position.set(0, -1.8, 0);
        shadowMesh.rotation.x = -Math.PI / 2;
        scene.add(shadowMesh);

        // Book Group
        const bookPivot = new THREE.Group();
        scene.add(bookPivot);

        const texLoader = new THREE.TextureLoader();
        const loadedTextures = [];
        coverUrls.forEach((url, idx) => {
            texLoader.load(url, (tex) => {
                tex.encoding = THREE.sRGBEncoding;
                tex.anisotropy = 8;
                loadedTextures[idx] = tex;
                if (idx === 0) {
                    if (fallback) {
                        fallback.style.opacity = '0';
                        fallback.style.pointerEvents = 'none';
                    }
                    if (frontMat) {
                        frontMat.map = tex;
                        frontMat.needsUpdate = true;
                    }
                }
            });
        });

        // Hardcover Book Materials (Pages, Spine, Back, Front)
        const pagesMat = new THREE.MeshStandardMaterial({ color: '#FAF5E8', roughness: 0.85 });
        const spineMat = new THREE.MeshStandardMaterial({ color: '#090E18', roughness: 0.35, metalness: 0.25 });
        const backMat = new THREE.MeshStandardMaterial({ color: '#0F172A', roughness: 0.5, metalness: 0.15 });
        const frontMat = new THREE.MeshStandardMaterial({ color: '#ffffff', roughness: 0.38, metalness: 0.06 });

        // BoxGeometry: args [2.05, 2.9, 0.46]
        const bookGeo = new THREE.BoxGeometry(2.05, 2.9, 0.46);
        const bookMaterials = [spineMat, pagesMat, pagesMat, pagesMat, frontMat, backMat];
        const bookMesh = new THREE.Mesh(bookGeo, bookMaterials);
        bookMesh.castShadow = true;
        bookPivot.add(bookMesh);

        // Rotation & Interactive Drag Physics
        let currentRotY = 0;
        let isDragging = false;
        let lastPointerX = 0;
        let dragVelocity = 0;
        let resumeDelay = 0;
        let coverIndex = 0;
        let lastPassedHalf = 0;
        const autoRotateSpeed = 0.52; // smooth, steady 360 rotation (~12s per full circle)

        // Mouse & Touch Drag Controls
        const onPointerDown = (e) => {
            isDragging = true;
            dragVelocity = 0;
            const pageX = e.touches && e.touches.length ? e.touches[0].clientX : e.clientX;
            lastPointerX = pageX;
            container.style.cursor = 'grabbing';
        };

        const onPointerMove = (e) => {
            if (!isDragging) return;
            const pageX = e.touches && e.touches.length ? e.touches[0].clientX : e.clientX;
            const deltaX = pageX - lastPointerX;
            dragVelocity = deltaX * 0.014;
            currentRotY += dragVelocity;
            lastPointerX = pageX;
        };

        const onPointerUp = () => {
            if (!isDragging) return;
            isDragging = false;
            container.style.cursor = 'grab';
            resumeDelay = 1.2; // brief pause before continuous auto-rotation resumes
        };

        container.style.cursor = 'grab';
        container.style.touchAction = 'none';

        container.addEventListener('mousedown', onPointerDown);
        window.addEventListener('mousemove', onPointerMove);
        window.addEventListener('mouseup', onPointerUp);

        container.addEventListener('touchstart', onPointerDown, { passive: true });
        window.addEventListener('touchmove', onPointerMove, { passive: true });
        window.addEventListener('touchend', onPointerUp);

        // Subtle Camera Parallax
        const pointer = { x: 0, y: 0 };
        window.addEventListener('mousemove', (e) => {
            pointer.x = (e.clientX / window.innerWidth) * 2 - 1;
            pointer.y = -(e.clientY / window.innerHeight) * 2 + 1;
        }, { passive: true });

        // Animation Loop
        const clock = new THREE.Clock();
        function animateLife() {
            requestAnimationFrame(animateLife);
            const delta = Math.min(clock.getDelta(), 0.1);
            const time = clock.getElapsedTime();

            // Camera follow
            camera.position.x += (0.35 * pointer.x - camera.position.x) * 0.04;
            camera.position.y += (0.2 * pointer.y - camera.position.y) * 0.04;
            camera.lookAt(0, 0, 0);

            // Drag / Inertia / Auto-Rotate State
            if (isDragging) {
                // Rotated directly by drag handler
            } else {
                // Apply drag inertia
                if (Math.abs(dragVelocity) > 0.0005) {
                    currentRotY += dragVelocity;
                    dragVelocity *= 0.92;
                } else {
                    dragVelocity = 0;
                    if (resumeDelay > 0) {
                        resumeDelay -= delta;
                    } else {
                        // Continuous smooth auto-rotation
                        currentRotY += autoRotateSpeed * delta;
                    }
                }
            }

            // Cycle textures dynamically when back of book turns away from camera
            const cycleCount = Math.floor(currentRotY / Math.PI);
            if (cycleCount !== lastPassedHalf) {
                lastPassedHalf = cycleCount;
                if (cycleCount % 2 === 1 && loadedTextures.length > 0) {
                    coverIndex = (coverIndex + 1) % loadedTextures.length;
                    if (loadedTextures[coverIndex]) {
                        frontMat.map = loadedTextures[coverIndex];
                        frontMat.needsUpdate = true;
                    }
                }
            }

            // Apply rotation and floating bob
            bookPivot.rotation.y = currentRotY;
            bookPivot.rotation.x += (-0.05 + 0.03 * Math.sin(0.45 * time) - 0.08 * pointer.y - bookPivot.rotation.x) * 0.05;
            bookPivot.position.y = 0.07 * Math.sin(1.2 * time);

            renderer.render(scene, camera);
        }
        animateLife();

        const onResize = () => {
            if (!container) return;
            const w = container.clientWidth;
            const h = container.clientHeight;
            if (w > 0 && h > 0) {
                camera.aspect = w / h;
                camera.updateProjectionMatrix();
                renderer.setSize(w, h);
            }
        };
        window.addEventListener('resize', onResize);
    }

    // ==========================================
    // 13. "Free For Authors" 3D Tilt, Drag-to-Switch & Silky Smooth Transition
    // ==========================================
    function initFreeMockupTilt() {
        const tiltContainer = document.getElementById('free-mockup-tilt-container');
        const tiltCard = document.getElementById('free-mockup-tilt-card');
        const mockupCounter = document.getElementById('free-mockup-counter');
        const mockupInner = tiltCard ? tiltCard.querySelector('.mockup-cover-inner') : null;

        if (!tiltContainer || !tiltCard || !mockupInner) return;

        let mockupUrls = [];
        try {
            mockupUrls = JSON.parse(tiltCard.dataset.mockups || '[]');
        } catch (e) {
            mockupUrls = [];
        }

        if (!mockupUrls.length) return;

        // Preload all mockup images in memory upfront for instantaneous zero-jerk transitions
        mockupUrls.forEach((url) => {
            const img = new Image();
            img.src = url;
        });

        let currentIdx = 0;
        let isTransitioning = false;
        let autoCycleTimer = null;

        // Smooth transition function: direction = 1 (forward/swipe left), direction = -1 (back/swipe right)
        function switchMockup(targetIdx, direction = 1) {
            if (isTransitioning) return;
            isTransitioning = true;

            const nextIdx = (targetIdx + mockupUrls.length) % mockupUrls.length;
            const currentImg = document.getElementById('free-mockup-img');

            // Create and prepare incoming image on top
            const nextImg = document.createElement('img');
            nextImg.className = 'mockup-slide-img';
            nextImg.alt = 'Free eBook Mockup by Bindwell Press';
            nextImg.draggable = false;
            nextImg.loading = 'eager';
            nextImg.decoding = 'async';
            nextImg.src = mockupUrls[nextIdx];

            // Initial position for incoming image based on direction
            const enterOffset = direction > 0 ? 100 : -100;
            const enterRotate = direction > 0 ? 4 : -4;
            nextImg.style.transform = `translateX(${enterOffset}%) scale(0.94) rotate(${enterRotate}deg)`;
            nextImg.style.opacity = '0';
            nextImg.style.zIndex = '3';

            // Insert into DOM
            mockupInner.appendChild(nextImg);
            // Force browser layout reflow
            void nextImg.offsetWidth;

            // Animate both images simultaneously with luxury cubic-bezier deceleration
            const duration = '0.62s';
            const ease = 'cubic-bezier(0.16, 1, 0.3, 1)'; // silky smooth spring-out curve

            nextImg.style.transition = `transform ${duration} ${ease}, opacity ${duration} ${ease}`;
            nextImg.style.transform = 'translateX(0%) scale(1) rotate(0deg)';
            nextImg.style.opacity = '1';

            if (currentImg) {
                const exitOffset = direction > 0 ? -100 : 100;
                const exitRotate = direction > 0 ? -4 : 4;
                currentImg.style.zIndex = '1';
                currentImg.style.transition = `transform ${duration} ${ease}, opacity ${duration} ${ease}`;
                currentImg.style.transform = `translateX(${exitOffset}%) scale(0.92) rotate(${exitRotate}deg)`;
                currentImg.style.opacity = '0';
            }

            // Update counter badge with gentle pulse
            if (mockupCounter) {
                mockupCounter.textContent = `${nextIdx + 1} / ${mockupUrls.length}`;
                mockupCounter.style.transition = 'transform 0.2s ease, color 0.2s ease';
                mockupCounter.style.transform = 'scale(1.18)';
                mockupCounter.style.color = '#FFFFFF';
                setTimeout(() => {
                    mockupCounter.style.transform = 'scale(1)';
                    mockupCounter.style.color = '#C98E5E';
                }, 240);
            }

            // Clean up DOM after transition finishes
            setTimeout(() => {
                if (currentImg && currentImg.parentNode === mockupInner) {
                    mockupInner.removeChild(currentImg);
                }
                nextImg.id = 'free-mockup-img';
                currentIdx = nextIdx;
                isTransitioning = false;
            }, 640);
        }

        // Auto-cycling scheduler with restart
        function startAutoCycle() {
            stopAutoCycle();
            autoCycleTimer = setInterval(() => {
                if (!isDragging && !isTransitioning) {
                    switchMockup(currentIdx + 1, 1);
                }
            }, 4200);
        }

        function stopAutoCycle() {
            if (autoCycleTimer) {
                clearInterval(autoCycleTimer);
                autoCycleTimer = null;
            }
        }

        if (mockupUrls.length > 1) {
            startAutoCycle();
        }

        // Interactive Drag & Pointer Parallax
        let isDragging = false;
        let startX = 0;
        let startY = 0;
        let deltaX = 0;
        let deltaY = 0;
        let targetRotX = 4;
        let targetRotY = -6;
        let currentRotX = 4;
        let currentRotY = -6;

        // Hover tilt tracking when not dragging
        tiltContainer.addEventListener('mousemove', (e) => {
            if (isDragging) return;
            const rect = tiltContainer.getBoundingClientRect();
            const x = (e.clientX - rect.left) / rect.width - 0.5;
            const y = (e.clientY - rect.top) / rect.height - 0.5;

            targetRotY = x * 20;
            targetRotX = -y * 20;
        });

        tiltContainer.addEventListener('mouseleave', () => {
            if (isDragging) return;
            targetRotX = 4;
            targetRotY = -6;
        });

        // Pointer Drag Events (mouse, touch, stylus)
        tiltCard.addEventListener('pointerdown', (e) => {
            if (e.target.closest('a, button')) return;
            isDragging = true;
            startX = e.clientX;
            startY = e.clientY;
            deltaX = 0;
            deltaY = 0;
            tiltCard.classList.add('is-dragging');
            stopAutoCycle();

            try {
                tiltCard.setPointerCapture(e.pointerId);
            } catch (err) {}
        });

        tiltCard.addEventListener('pointermove', (e) => {
            if (!isDragging) return;
            deltaX = e.clientX - startX;
            deltaY = e.clientY - startY;

            // Physical 3D tilt reaction to drag
            targetRotY = -6 + deltaX * 0.12;
            targetRotX = 4 - deltaY * 0.08;

            // Tactile feedback: move active cover with drag
            const currentImg = document.getElementById('free-mockup-img');
            if (currentImg && !isTransitioning) {
                const dragProgressX = Math.max(-80, Math.min(80, deltaX * 0.42));
                const dragRotate = Math.max(-6, Math.min(6, deltaX * 0.035));
                currentImg.style.transition = 'none';
                currentImg.style.transform = `translateX(${dragProgressX}px) rotate(${dragRotate}deg) scale(0.98)`;
            }
        });

        const onPointerEnd = (e) => {
            if (!isDragging) return;
            isDragging = false;
            tiltCard.classList.remove('is-dragging');

            try {
                tiltCard.releasePointerCapture(e.pointerId);
            } catch (err) {}

            targetRotX = 4;
            targetRotY = -6;

            const swipeThreshold = 38;
            const currentImg = document.getElementById('free-mockup-img');

            if (deltaX < -swipeThreshold) {
                // Dragged Left -> Next cover
                switchMockup(currentIdx + 1, 1);
            } else if (deltaX > swipeThreshold) {
                // Dragged Right -> Previous cover
                switchMockup(currentIdx - 1, -1);
            } else {
                // Not enough drag -> spring gently back to center
                if (currentImg && !isTransitioning) {
                    currentImg.style.transition = 'transform 0.38s cubic-bezier(0.16, 1, 0.3, 1)';
                    currentImg.style.transform = 'translateX(0px) rotate(0deg) scale(1)';
                }
            }

            deltaX = 0;
            deltaY = 0;

            // Resume auto-cycle after user interaction
            if (mockupUrls.length > 1) {
                startAutoCycle();
            }
        };

        tiltCard.addEventListener('pointerup', onPointerEnd);
        tiltCard.addEventListener('pointercancel', onPointerEnd);

        // Smooth requestAnimationFrame 3D tilt loop
        function renderTilt() {
            currentRotX += (targetRotX - currentRotX) * 0.08;
            currentRotY += (targetRotY - currentRotY) * 0.08;
            tiltCard.style.transform = `perspective(1000px) rotateX(${currentRotX.toFixed(2)}deg) rotateY(${currentRotY.toFixed(2)}deg) translateZ(10px)`;
            requestAnimationFrame(renderTilt);
        }
        renderTilt();
    }

    initFreeMockupTilt();

    // ==========================================
    // 14. Responsive 3D Book Slide Carousel (Hero Section)
    // ==========================================
    function initHeroBookSlider() {
        const stage = document.getElementById('hero-book-stage');
        if (!stage || typeof gsap === 'undefined') return;

        let images = [];
        try {
            images = JSON.parse(stage.dataset.images || '[]');
        } catch (e) {
            images = [];
        }

        if (!images.length) return;

        const n = images.length;
        const dotsContainer = document.getElementById('hero-book-dots');
        const prevBtn = document.getElementById('hero-book-prev');
        const nextBtn = document.getElementById('hero-book-next');

        function getSpacing() {
            const w = stage.clientWidth;
            if (w < 400) return 118;
            if (w < 640) return 138;
            if (w < 1024) return 165;
            return 190;
        }

        const MAX_ANGLE = 32;        // deg tilt for the left/right book
        const SLIDE_DURATION = 0.85; // seconds per autoplay step
        const AUTOPLAY_DELAY = 2800; // ms between autoplay steps
        const DRAG_SNAP_DURATION = 0.45;

        // Build DOM Items
        const items = images.map((src, i) => {
            const book = document.createElement('div');
            book.className = 'hero-book';

            const shadow = document.createElement('div');
            shadow.className = 'hero-book-shadow';

            const face = document.createElement('div');
            face.className = 'hero-book-face';

            const img = document.createElement('img');
            img.src = src;
            img.alt = 'Bindwell Press Published Book ' + (i + 1);
            img.draggable = false;
            img.loading = i < 3 ? 'eager' : 'lazy';

            const edgeSpine = document.createElement('div');
            edgeSpine.className = 'hero-edge-spine';
            edgeSpine.style.backgroundImage =
                `linear-gradient(rgba(0,0,0,0.14), rgba(0,0,0,0.14)), url('${src}')`;

            const edgePages = document.createElement('div');
            edgePages.className = 'hero-edge-pages';

            face.appendChild(img);
            face.appendChild(edgeSpine);
            face.appendChild(edgePages);
            book.appendChild(shadow);
            book.appendChild(face);
            stage.appendChild(book);

            return { book, face, shadow, index: i };
        });

        // Build Dots
        let dotEls = [];
        if (dotsContainer) {
            dotsContainer.innerHTML = '';
            dotEls = images.map((_, i) => {
                const dot = document.createElement('button');
                dot.type = 'button';
                dot.className = 'hero-book-dot' + (i === 0 ? ' is-active' : '');
                dot.setAttribute('aria-label', `Go to book ${i + 1}`);
                dot.addEventListener('click', () => {
                    goToIndex(i);
                });
                dotsContainer.appendChild(dot);
                return dot;
            });
        }

        const proxy = { pos: 0 };
        let autoplayTimer = null;

        function shortestSignedDistance(idx, pos) {
            let raw = (idx - pos) % n;
            if (raw > n / 2) raw -= n;
            if (raw < -n / 2) raw += n;
            return raw;
        }

        function updateDots(activeIdx) {
            if (!dotEls.length) return;
            const normIdx = ((activeIdx % n) + n) % n;
            dotEls.forEach((dot, i) => {
                if (i === normIdx) {
                    dot.classList.add('is-active');
                } else {
                    dot.classList.remove('is-active');
                }
            });
        }

        function render() {
            const spacing = getSpacing();
            const activeIdx = Math.round(proxy.pos);
            updateDots(activeIdx);

            items.forEach(item => {
                const p = shortestSignedDistance(item.index, proxy.pos);
                const absP = Math.abs(p);
                const ramp = Math.min(absP, 1);

                const x = p * spacing;
                const angle = -Math.sign(p) * ramp * MAX_ANGLE;
                const scale = 1 - Math.min(absP, 2) * 0.12;

                const visible = absP < 1.5;
                const opacity = !visible ? 0 : absP <= 1 ? 1 : Math.max(1 - (absP - 1) / 0.5, 0);

                item.book.style.zIndex = Math.round(200 - absP * 20);
                item.book.style.opacity = opacity;
                item.book.style.pointerEvents = absP < 1.2 ? 'auto' : 'none';
                item.face.style.transform =
                    `translateX(${x}px) translateZ(${-absP * 20}px) rotateY(${angle}deg) scale(${scale})`;
                item.shadow.style.transform = `translateX(${x}px) scale(${scale})`;
                item.shadow.style.opacity = visible ? Math.max(0.85 - absP * 0.3, 0) : 0;
            });
        }

        function advance(dir = 1) {
            goToIndex(Math.round(proxy.pos) + dir);
        }

        function goToIndex(targetIdx) {
            stopAutoplay();
            gsap.to(proxy, {
                pos: targetIdx,
                duration: SLIDE_DURATION,
                ease: 'power2.inOut',
                onUpdate: render,
                onComplete: startAutoplay
            });
        }

        function startAutoplay() {
            stopAutoplay();
            autoplayTimer = setInterval(() => advance(1), AUTOPLAY_DELAY);
        }

        function stopAutoplay() {
            if (autoplayTimer) {
                clearInterval(autoplayTimer);
                autoplayTimer = null;
            }
        }

        // Pointer Drag & Swipe
        let isDragging = false;
        let dragStartX = 0;
        let dragStartPos = 0;

        function onPointerDown(e) {
            if (e.target.closest('button')) return;
            isDragging = true;
            dragStartX = e.clientX;
            dragStartPos = proxy.pos;
            stage.classList.add('dragging');
            try { stage.setPointerCapture(e.pointerId); } catch (err) {}
            gsap.killTweensOf(proxy);
            stopAutoplay();
        }

        function onPointerMove(e) {
            if (!isDragging) return;
            const deltaX = e.clientX - dragStartX;
            proxy.pos = dragStartPos - deltaX / getSpacing();
            render();
        }

        function onPointerUp(e) {
            if (!isDragging) return;
            isDragging = false;
            stage.classList.remove('dragging');
            try { stage.releasePointerCapture(e.pointerId); } catch (err) {}

            const target = Math.round(proxy.pos);
            gsap.to(proxy, {
                pos: target,
                duration: DRAG_SNAP_DURATION,
                ease: 'power2.out',
                onUpdate: render,
                onComplete: startAutoplay
            });
        }

        stage.addEventListener('pointerdown', onPointerDown);
        stage.addEventListener('pointermove', onPointerMove);
        stage.addEventListener('pointerup', onPointerUp);
        stage.addEventListener('pointercancel', onPointerUp);

        // Click side book to navigate
        items.forEach(item => {
            item.book.addEventListener('click', (e) => {
                if (isDragging) return;
                const p = shortestSignedDistance(item.index, proxy.pos);
                if (Math.abs(p) > 0.4 && Math.abs(p) < 1.4) {
                    e.stopPropagation();
                    goToIndex(Math.round(proxy.pos) + Math.sign(p));
                }
            });
        });

        // Prev & Next Buttons
        if (prevBtn) {
            prevBtn.addEventListener('click', () => {
                advance(-1);
            });
        }
        if (nextBtn) {
            nextBtn.addEventListener('click', () => {
                advance(1);
            });
        }

        // Pause on Hover
        stage.addEventListener('mouseenter', stopAutoplay);
        stage.addEventListener('mouseleave', () => {
            if (!isDragging) startAutoplay();
        });

        window.addEventListener('resize', render);

        render();
        startAutoplay();
    }

    initHeroBookSlider();

    // ==========================================
    // Package Cards Feature List Scroll Enforcer
    // Prevents page scrolling when hovering over package cards and scrolling wheel
    // ==========================================
    function initPackageCardWheelScroll() {
        const cards = document.querySelectorAll('.pricing-card-box, [data-package-card]');
        cards.forEach(card => {
            const list = card.querySelector('.package-features-list');
            if (!list) return;

            card.addEventListener('wheel', (e) => {
                if (list.scrollHeight <= list.clientHeight) return;
                
                const delta = e.deltaY;
                const isScrollingDown = delta > 0;
                const atTop = list.scrollTop <= 0;
                const atBottom = Math.ceil(list.scrollTop + list.clientHeight) >= list.scrollHeight - 1;

                if ((isScrollingDown && !atBottom) || (!isScrollingDown && !atTop)) {
                    e.preventDefault();
                    e.stopPropagation();
                    if (e.stopImmediatePropagation) e.stopImmediatePropagation();
                    list.scrollTop += delta;
                }
            }, { passive: false });
        });
    }

    initPackageCardWheelScroll();

    // Initialize 3D WebGL Experiences
    if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        initHero3D();
        initShelf3D();
        initComeToLife3D();
    }
});
