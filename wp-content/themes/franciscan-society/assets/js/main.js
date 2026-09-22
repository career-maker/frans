
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

    // Apply correct state immediately on load (fixes grey flash on refresh)
    if (header) {
        if (window.scrollY > 50) {
            header.classList.add('is-scrolled');
        } else {
            header.classList.remove('is-scrolled');
            header.classList.remove('is-hidden');
        }
    }

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

            // Dot appearance (24px hit area, 8px / 24px visual) lives in styles.css (.welcome-dot).
            dots.forEach((dot, i) => {
                dot.classList.toggle('is-active', i === currentIndex);
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

/**
 * Universal Horizontal Card Track Slider Controller (News & Blogs)
 */
window.fsSlideTrack = function(trackId, direction) {
    var track = typeof trackId === 'string' ? document.getElementById(trackId) : trackId;
    if (!track) return;

    var cards = track.querySelectorAll('.blog-card, .blog-padded-card');
    var scrollStep = 415;

    if (cards.length > 0) {
        var card = cards[0];
        var cardWidth = card.offsetWidth || 380;
        var gap = 35;
        try {
            var style = window.getComputedStyle(track);
            var computedGap = parseFloat(style.gap) || parseFloat(style.columnGap);
            if (!isNaN(computedGap) && computedGap > 0) {
                gap = computedGap;
            }
        } catch(e) {}
        scrollStep = cardWidth + gap;
    }

    var maxScroll = Math.max(0, track.scrollWidth - track.clientWidth);

    var currentBase = (typeof track._targetScrollLeft === 'number' && Math.abs(track._targetScrollLeft - track.scrollLeft) < (scrollStep * 2))
        ? track._targetScrollLeft
        : track.scrollLeft;

    var targetScroll = currentBase + (direction * scrollStep);
    if (targetScroll < 0) targetScroll = 0;
    if (targetScroll > maxScroll) targetScroll = maxScroll;

    track._targetScrollLeft = targetScroll;

    var originalSnap = track.style.scrollSnapType;
    track.style.scrollSnapType = 'none';

    try {
        track.scrollTo({
            left: targetScroll,
            behavior: 'smooth'
        });
    } catch(e) {
        track.scrollLeft = targetScroll;
    }

    clearTimeout(track._snapTimer);
    track._snapTimer = setTimeout(function() {
        track.style.scrollSnapType = originalSnap || 'x proximity';
        track._targetScrollLeft = undefined;
    }, 450);
};

window.fsUpdateSliderArrows = function() {
    ['news', 'blogs'].forEach(function(type) {
        var track = document.getElementById(type + '-scroll-track');
        var nav = document.getElementById(type + '-slider-nav');
        if (track && nav) {
            var canScroll = track.scrollWidth > (track.clientWidth + 15);
            nav.style.display = canScroll ? 'flex' : 'none';
        }
    });
};

document.addEventListener('DOMContentLoaded', window.fsUpdateSliderArrows);
window.addEventListener('resize', window.fsUpdateSliderArrows);
window.addEventListener('load', window.fsUpdateSliderArrows);



// ---------------------------------------------------------------------------
// Deferred media. Third-party embeds (Google Maps, ~450 KB of JS) and decorative videos are only
// fetched when they are about to be seen, so they never compete with the first paint.
// ---------------------------------------------------------------------------
(function () {
    const onReady = (fn) => (document.readyState === 'loading' ? document.addEventListener('DOMContentLoaded', fn) : fn());

    onReady(() => {
        // <iframe data-fs-src="..."> -> real src once within 300px of the viewport
        const frames = document.querySelectorAll('iframe[data-fs-src]');
        if (frames.length) {
            const load = (f) => {
                f.src = f.getAttribute('data-fs-src');
                f.removeAttribute('data-fs-src');
            };
            if ('IntersectionObserver' in window) {
                const io = new IntersectionObserver((entries) => {
                    entries.forEach((e) => {
                        if (e.isIntersecting) {
                            load(e.target);
                            io.unobserve(e.target);
                        }
                    });
                }, { rootMargin: '300px 0px' });
                frames.forEach((f) => io.observe(f));
            } else {
                frames.forEach(load);
            }
        }

        // <img data-fs-src data-fs-srcset> and [data-fs-bg] (see franciscan_defer_lazy_images() in
        // inc/performance.php) -> real image / background once within 150px of the viewport
        const attach = (el) => {
            if (el.hasAttribute('data-fs-bg')) {
                const small = el.getAttribute('data-fs-bg-sm');
                const url = small && window.innerWidth < 900 ? small : el.getAttribute('data-fs-bg');
                el.style.setProperty('background-image', 'url("' + url + '")', 'important');
                el.removeAttribute('data-fs-bg');
                el.removeAttribute('data-fs-bg-sm');
                return;
            }
            const set = el.getAttribute('data-fs-srcset');
            if (set) el.setAttribute('srcset', set);
            const src = el.getAttribute('data-fs-src');
            if (src) el.setAttribute('src', src);
            el.removeAttribute('data-fs-srcset');
            el.removeAttribute('data-fs-src');
        };
        const deferred = document.querySelectorAll('img[data-fs-src], [data-fs-bg]');
        if (deferred.length) {
            if ('IntersectionObserver' in window) {
                const dio = new IntersectionObserver((entries) => {
                    entries.forEach((e) => {
                        if (e.isIntersecting) {
                            attach(e.target);
                            dio.unobserve(e.target);
                        }
                    });
                }, { rootMargin: '150px 0px' });
                deferred.forEach((el) => dio.observe(el));
            } else {
                deferred.forEach(attach);
            }
        }

        // <video data-fs-lazy data-src="..."> -> loads and plays only while visible
        const vids = document.querySelectorAll('video[data-fs-lazy]');
        if (vids.length && 'IntersectionObserver' in window) {
            const vo = new IntersectionObserver((entries) => {
                entries.forEach((e) => {
                    const v = e.target;
                    if (e.isIntersecting) {
                        if (!v.getAttribute('src') && v.dataset.src) {
                            v.src = v.dataset.src;
                            v.load();
                        }
                        const p = v.play();
                        if (p && p.catch) p.catch(() => {});
                    } else if (!v.paused) {
                        v.pause();
                    }
                });
            }, { rootMargin: '100px 0px', threshold: 0.01 });
            vids.forEach((v) => vo.observe(v));
        }
    });
})();
