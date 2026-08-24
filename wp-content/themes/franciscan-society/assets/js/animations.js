const initAnimations = () => {
    // Safety check for reduced motion
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    
    if (prefersReducedMotion || typeof gsap === 'undefined') {
        document.querySelectorAll('.js-reveal-text, .js-reveal-image').forEach(el => {
            el.style.opacity = 1; el.style.transform = 'none'; el.style.clipPath = 'none';
        });
        return;
    }

    gsap.registerPlugin(ScrollTrigger);

    // Debounce function for resize events
    const debounce = (func, wait) => {
        let timeout;
        return function executedFunction(...args) {
            const later = () => { clearTimeout(timeout); func(...args); };
            clearTimeout(timeout); timeout = setTimeout(later, wait);
        };
    };

    const ctx = gsap.context(() => {
        // 1. Hero content card reveal (Ken Burns zoom on slides is handled via CSS keyframe;
        // slide cycling itself is handled by main.js so it keeps working even without GSAP)
        if (document.querySelector(".js-hero-text")) {
            gsap.from(".js-hero-text", { y: 15, opacity: 0, duration: 0.5, ease: "power3.out" });
        }
        // 2. Hero Scroll Parallax
        if (document.querySelector(".hero__gallery") && document.querySelector(".section--hero")) {
            gsap.to(".hero__gallery", {
                y: "15%", opacity: 0.3, ease: "none",
                scrollTrigger: { trigger: ".section--hero", start: "top top", end: "bottom top", scrub: true }
            });
        }
        // 3. Text Reveals
        document.querySelectorAll(".js-reveal-text").forEach(text => {
            gsap.from(text, {
                y: 40, opacity: 0, duration: 2.2, ease: "sine.out",
                scrollTrigger: { trigger: text, start: "top 85%", toggleActions: "play none none none" }
            });
        });

        
        // Typewriter Effect
        document.querySelectorAll(".js-typewriter").forEach(textEl => {
            const text = textEl.textContent.trim().replace(/\s+/g, ' ');
            textEl.innerHTML = '';
            
            const words = text.split(' ');
            words.forEach((word, wordIdx) => {
                const wordSpan = document.createElement('span');
                wordSpan.style.display = 'inline-block';
                
                const chars = word.split('');
                chars.forEach(c => {
                    const charSpan = document.createElement('span');
                    charSpan.textContent = c;
                    charSpan.className = 'typewriter-char';
                    charSpan.style.opacity = '0';
                    charSpan.style.visibility = 'hidden';
                    wordSpan.appendChild(charSpan);
                });
                textEl.appendChild(wordSpan);
                
                if (wordIdx < words.length - 1) {
                    const spaceSpan = document.createElement('span');
                    spaceSpan.innerHTML = '&nbsp;';
                    textEl.appendChild(spaceSpan);
                }
            });
            
            const charsToAnimate = textEl.querySelectorAll('.typewriter-char');
            if (charsToAnimate.length > 0) {
                gsap.to(charsToAnimate, {
                    autoAlpha: 1, // handles both opacity and visibility
                    duration: 0.05,
                    stagger: 0.03,
                    ease: "none",
                    scrollTrigger: {
                        trigger: textEl,
                        start: "top 85%",
                        toggleActions: "play none none none"
                    }
                });
            }
        });

        // 4. Heritage Gallery Parallax & Reveals
        // Deep background parallax for the enormous years
        document.querySelectorAll(".js-parallax-year").forEach(year => {
            gsap.to(year, {
                y: "-15%", // Move slightly up as we scroll down
                ease: "none",
                scrollTrigger: {
                    trigger: year.parentElement, // The exhibit article
                    start: "top bottom",
                    end: "bottom top",
                    scrub: true
                }
            });
        });

        // Gentle image vertical mask reveal
        document.querySelectorAll(".js-reveal-image").forEach(img => {
            gsap.from(img, {
                opacity: 0,
                y: 30,
                duration: 2.5,
                ease: "sine.out",
                scrollTrigger: { trigger: img, start: "top 85%", toggleActions: "play none none none" } // Don't reverse the image reveal
            });
        });

        document.querySelectorAll(".js-spw-item").forEach(el => {
            gsap.timeline({
                scrollTrigger: {
                    trigger: el,
                    start: "top bottom",
                    end: "bottom top",
                    scrub: true,
                }
            })
            .fromTo(el, 
                { scale: 0 }, 
                { scale: 1, ease: "power2.out", duration: 0.5 }
            )
            .to(el, 
                { scale: 0, ease: "power2.in", duration: 0.5 }
            );
        });

    
        // --- Heritage Timeline Animation ---
        const progressLine = document.querySelector(".js-timeline-progress");
        if (progressLine) {
            // Draw central line
            gsap.to(progressLine, {
                height: "100%",
                ease: "none",
                scrollTrigger: {
                    trigger: ".heritage-timeline-section",
                    start: "top center",
                    end: "bottom center",
                    scrub: true
                }
            });

            // Animate each row
            document.querySelectorAll(".js-timeline-row").forEach(row => {
                const card = row.querySelector(".js-timeline-card");
                
                // Toggle active class for node illumination and year brightening
                ScrollTrigger.create({
                    trigger: row,
                    start: "top center",
                    toggleClass: {targets: row, className: "is-active"}
                });

                // Fade and float in the card
                gsap.to(card, {
                    opacity: 1,
                    y: 0,
                    duration: 1,
                    ease: "power2.out",
                    scrollTrigger: {
                        trigger: row,
                        start: "top 70%",
                        toggleActions: "play none none reverse"
                    }
                });
            });
        }

    });
};

// Expose to window for main.js to call after loading dependencies safely
window.FranciscanAnimations = { init: initAnimations };
