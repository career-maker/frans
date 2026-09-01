// Remote imagery is served from a CDN that occasionally retires a photo id.
// Swap any image that fails to load for a local asset instead of leaving a
// broken-image box in the layout. Registered in the capture phase because
// `error` does not bubble.
document.addEventListener("error", (e) => {
    const img = e.target;
    if (img && img.tagName === "IMG" && !img.dataset.fallbackApplied) {
        img.dataset.fallbackApplied = "1";
        img.src = (typeof franciscan_ajax !== "undefined" && franciscan_ajax.theme_uri) ? franciscan_ajax.theme_uri + "/assets/images/church-bg.jpg" : img.src;
    }
}, true);

document.addEventListener("DOMContentLoaded", () => {
    // 0. Loader Animation
    const loader = document.querySelector('.js-loader') || document.querySelector('#cinematic-preloader');
    if (loader && typeof gsap !== 'undefined') {
        const tl = gsap.timeline({ onComplete: () => document.body.classList.remove('is-loading') });
        const lt1 = loader.querySelector('.js-loader-text-1');
        const lt2 = loader.querySelector('.js-loader-text-2');
        if (lt1) tl.fromTo('.js-loader-text-1', { yPercent: 100 }, { yPercent: 0, duration: 0.5, ease: 'power4.out', delay: 0.1 }).to('.js-loader-text-1', { yPercent: -100, duration: 0.4, ease: 'power4.in', delay: 0.4 }).set('.js-loader-text-1', { display: 'none' });
        if (lt2) tl.fromTo('.js-loader-text-2', { display: 'block', yPercent: 100 }, { yPercent: 0, duration: 0.5, ease: 'power4.out' }).to('.js-loader-text-2', { yPercent: -100, duration: 0.4, ease: 'power4.in', delay: 0.4 });
        tl.to(loader, { yPercent: -100, duration: 0.6, ease: 'power4.inOut' }, '-=0.2').set(loader, { display: 'none' });
    }
    // 1. Wait for GSAP to load if deferred - give up after ~10s instead of
    // polling forever when a dependency fails to load
    let dependencyAttempts = 0;
    const checkDependencies = setInterval(() => {
        if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined' && window.FranciscanAnimations) {
            clearInterval(checkDependencies);
            window.FranciscanAnimations.init();
        } else if (++dependencyAttempts > 200) {
            clearInterval(checkDependencies);
        }
    }, 50);

    // 2. Header Scroll state
    const header = document.querySelector('.js-header');
    let lastScrollY = window.scrollY;
    let scrollAccumulator = 0;
    if (header) window.addEventListener('scroll', () => {
        const currentScrollY = window.scrollY;
        const delta = currentScrollY - lastScrollY;
        
        if (currentScrollY > 50) {
            header.classList.add('is-scrolled');
            
            // If changing direction, reset accumulator
            if ((delta > 0 && scrollAccumulator < 0) || (delta < 0 && scrollAccumulator > 0)) {
                scrollAccumulator = 0;
            }
            scrollAccumulator += delta;

            if (scrollAccumulator > 15) {
                header.classList.add('is-hidden');
            } else if (scrollAccumulator < -15) {
                header.classList.remove('is-hidden');
            }
        } else {
            header.classList.remove('is-scrolled');
            header.classList.remove('is-hidden');
        }
        lastScrollY = currentScrollY;
    }, { passive: true });

    // 2b. Slide-out drawer: lock the page behind it, close on link click / Escape
    const drawer = document.querySelector('.mobile-nav-drawer');
    if (drawer) {
        const toggleBtn = document.querySelector('.mobile-toggle');
        const closeDrawer = () => {
            drawer.classList.remove('active');
            if (toggleBtn) toggleBtn.setAttribute('aria-expanded', 'false');
        };

        // The panel video is several MB, so it is only fetched the first time
        // the menu is opened — never on initial page load.
        const panelVideo = drawer.querySelector('.drawer-media video');
        const startPanelVideo = () => {
            if (!panelVideo) return;
            if (!panelVideo.src && panelVideo.dataset.src) panelVideo.src = panelVideo.dataset.src;
            const play = panelVideo.play();
            if (play && play.catch) play.catch(() => {});
        };

        new MutationObserver(() => {
            const open = drawer.classList.contains('active');
            document.body.style.overflow = open ? 'hidden' : '';
            if (open) startPanelVideo();
            else if (panelVideo) panelVideo.pause();
        }).observe(drawer, { attributes: true, attributeFilter: ['class'] });

        drawer.querySelectorAll('a').forEach(link => link.addEventListener('click', closeDrawer));
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && drawer.classList.contains('active')) closeDrawer();
        });
    }

    // 3. Accessible Mobile Menu Toggle
    const menuBtn = document.querySelector('.header__menu-btn');
    const menuLabel = menuBtn ? menuBtn.querySelector('.header__menu-label') : null;
    const mobileMenu = document.getElementById('mobile-menu');

    const closeMenu = () => {
        menuBtn.setAttribute('aria-expanded', 'false');
        if (menuLabel) menuLabel.textContent = 'Menu';
        mobileMenu.classList.remove('is-open');
        mobileMenu.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('menu-open');
    };
    const openMenu = () => {
        menuBtn.setAttribute('aria-expanded', 'true');
        if (menuLabel) menuLabel.textContent = 'Close';
        mobileMenu.classList.add('is-open');
        mobileMenu.setAttribute('aria-hidden', 'false');
        document.body.classList.add('menu-open');
        const firstLink = mobileMenu.querySelector('a');
        if (firstLink) firstLink.focus();
    };

    if (menuBtn && mobileMenu) {
        menuBtn.addEventListener('click', () => {
            const isExpanded = menuBtn.getAttribute('aria-expanded') === 'true';
            isExpanded ? closeMenu() : openMenu();
        });

        mobileMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', closeMenu);
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && mobileMenu.classList.contains('is-open')) {
                closeMenu();
                menuBtn.focus();
            }
        });
    }

    // 4. Hero Slider Initialization with Splide
    const mainSliderElement = document.getElementById('main-slider');
    const thumbSliderElement = document.getElementById('thumbnail-slider');

    if (mainSliderElement && thumbSliderElement && typeof Splide !== 'undefined') {
        const main = new Splide(mainSliderElement, {
            type       : 'fade',
            heightRatio: 0.5,
            pagination : false,
            arrows     : false,
            cover      : true,
            autoplay   : true,
            interval   : 6000,
            pauseOnHover: false,
            pauseOnFocus: false,
            rewind     : true,
        });

        const thumbnails = new Splide(thumbSliderElement, {
            rewind          : true,
            isNavigation    : true,
            gap             : 10,
            focus           : 'center',
            pagination      : true,
            cover           : true,
            dragMinThreshold: {
                mouse: 4,
                touch: 10,
            },
            arrows          : true,
            type            : 'fade', // The thumbnail text container fades
        });

        main.sync(thumbnails);
        main.mount();
        thumbnails.mount();
    }

    // 5. FAQ accordion — close siblings when one opens (single-open behavior)
    document.querySelectorAll('.faq-list').forEach(list => {
        list.addEventListener('toggle', (e) => {
            if (e.target.open) {
                list.querySelectorAll('.faq-item[open]').forEach(item => {
                    if (item !== e.target) item.removeAttribute('open');
                });
            }
        }, true);
    });
});


// Universal Scroll Reveal Observer for Sections, Titles, Images & Cards
const initScrollAnimations = () => {
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        document.querySelectorAll('main section, main h1, main h2, main h3, main h4, main img').forEach(el => {
            el.classList.add('is-visible');
        });
        return;
    }

    const elementsToAnimate = document.querySelectorAll(`
        [data-fs-animate],
        .responsive-ministry-grid > div,
        .responsive-ministry-row > div
    `);

    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    obs.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0,
            rootMargin: '0px 0px 50px 0px'
        });

        elementsToAnimate.forEach((el) => {
            // Apply subtle stagger if inside a grid
            if (el.parentElement && el.parentElement.children.length > 1) {
                const siblingIndex = Array.from(el.parentElement.children).indexOf(el);
                if (siblingIndex > 0 && siblingIndex <= 6) {
                    el.style.transitionDelay = `${siblingIndex * 0.12}s`;
                }
            }
            observer.observe(el);
        });
    } else {
        elementsToAnimate.forEach(el => el.classList.add('is-visible'));
    }
};

// Universal Welcome Section Image Slider Controller
const initWelcomeSliders = () => {
    const sliders = document.querySelectorAll('.welcome-slider-container');
    sliders.forEach((slider) => {
        const slides = slider.querySelectorAll('.welcome-slide');
        const dots = slider.querySelectorAll('.welcome-dot');
        const prevBtn = slider.querySelector('.welcome-slider-prev');
        const nextBtn = slider.querySelector('.welcome-slider-next');

        if (!slides.length) return;

        let currentIndex = 0;
        const totalSlides = slides.length;
        let slideTimer = null;

        const goToSlide = (index) => {
            currentIndex = (index + totalSlides) % totalSlides;
            slides.forEach((slide, i) => {
                if (i === currentIndex) {
                    slide.classList.add('is-active');
                    slide.style.opacity = '1';
                    slide.style.zIndex = '2';
                    slide.style.transform = 'scale(1)';
                } else {
                    slide.classList.remove('is-active');
                    slide.style.opacity = '0';
                    slide.style.zIndex = '1';
                    slide.style.transform = 'scale(1.04)';
                }
            });

            dots.forEach((dot, i) => {
                if (i === currentIndex) {
                    dot.classList.add('is-active');
                    dot.style.width = '24px';
                    dot.style.borderRadius = '4px';
                    dot.style.background = '#e6c888';
                } else {
                    dot.classList.remove('is-active');
                    dot.style.width = '8px';
                    dot.style.borderRadius = '50%';
                    dot.style.background = 'rgba(255, 255, 255, 0.5)';
                }
            });
        };

        const nextSlide = () => goToSlide(currentIndex + 1);
        const prevSlide = () => goToSlide(currentIndex - 1);

        const startAutoPlay = () => {
            stopAutoPlay();
            slideTimer = setInterval(nextSlide, 4500);
        };

        const stopAutoPlay = () => {
            if (slideTimer) {
                clearInterval(slideTimer);
                slideTimer = null;
            }
        };

        if (nextBtn) {
            nextBtn.addEventListener('click', (e) => {
                e.preventDefault();
                nextSlide();
                startAutoPlay();
            });
        }

        if (prevBtn) {
            prevBtn.addEventListener('click', (e) => {
                e.preventDefault();
                prevSlide();
                startAutoPlay();
            });
        }

        dots.forEach((dot) => {
            dot.addEventListener('click', (e) => {
                e.preventDefault();
                const targetIdx = parseInt(dot.getAttribute('data-index'), 10);
                if (!isNaN(targetIdx)) {
                    goToSlide(targetIdx);
                    startAutoPlay();
                }
            });
        });

        // Pause on mouse hover
        slider.addEventListener('mouseenter', stopAutoPlay);
        slider.addEventListener('mouseleave', startAutoPlay);

        // Touch Swipe Gestures for Mobile
        let touchStartX = 0;
        let touchEndX = 0;
        slider.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
        }, { passive: true });

        slider.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].screenX;
            if (touchStartX - touchEndX > 45) {
                nextSlide();
                startAutoPlay();
            } else if (touchEndX - touchStartX > 45) {
                prevSlide();
                startAutoPlay();
            }
        }, { passive: true });

        // Start initial auto rotation
        startAutoPlay();
    });
};

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
        initScrollAnimations();
        initWelcomeSliders();
    });
} else {
    initScrollAnimations();
    initWelcomeSliders();
}

