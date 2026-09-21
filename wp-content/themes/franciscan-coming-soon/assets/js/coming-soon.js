/**
 * Franciscan Coming Soon
 *  - fit():   guarantees the page never needs scrolling, whatever the screen
 *  - timer(): optional launch countdown
 */
(function () {
    'use strict';

    var inner = document.getElementById('fit');

    /* Scale the stack down (never up) when it is taller/wider than the space it has. CSS already sizes
       everything from the viewport, so on normal screens this stays at 1. */
    function fit() {
        if (!inner || !inner.parentElement) return;
        inner.style.setProperty('--fit', '1');
        var box = inner.parentElement;
        var cs = window.getComputedStyle(box);
        var availH = box.clientHeight - parseFloat(cs.paddingTop) - parseFloat(cs.paddingBottom);
        var availW = box.clientWidth - parseFloat(cs.paddingLeft) - parseFloat(cs.paddingRight);
        var h = inner.offsetHeight;
        var w = Math.max(inner.scrollWidth, inner.offsetWidth);
        var s = Math.min(1, availH / h, availW / w);
        inner.style.setProperty('--fit', s < 1 ? s.toFixed(3) : '1');
    }

    var queued = false;
    function requestFit() {
        if (queued) return;
        queued = true;
        window.requestAnimationFrame(function () {
            queued = false;
            fit();
        });
    }

    fit();
    window.addEventListener('resize', requestFit);
    window.addEventListener('orientationchange', requestFit);
    if (window.visualViewport) window.visualViewport.addEventListener('resize', requestFit);
    if (document.fonts && document.fonts.ready) document.fonts.ready.then(requestFit);
    window.addEventListener('load', requestFit);

    /* Countdown */
    var count = document.querySelector('.count[data-launch]');
    if (!count) return;

    var target = parseInt(count.getAttribute('data-launch'), 10);
    var cells = {
        days: count.querySelector('[data-unit="days"]'),
        hours: count.querySelector('[data-unit="hours"]'),
        minutes: count.querySelector('[data-unit="minutes"]'),
        seconds: count.querySelector('[data-unit="seconds"]')
    };
    var timerId;

    function pad(n) {
        return n < 10 ? '0' + n : String(n);
    }

    function tick() {
        var left = Math.max(0, Math.floor((target - Date.now()) / 1000));
        if (target - Date.now() <= 0) {
            window.clearInterval(timerId);
            count.className = 'launching rise';
            count.removeAttribute('role');
            count.textContent = 'We are launching now — please refresh this page.';
            requestFit();
            return;
        }
        cells.days.textContent = pad(Math.floor(left / 86400));
        cells.hours.textContent = pad(Math.floor((left % 86400) / 3600));
        cells.minutes.textContent = pad(Math.floor((left % 3600) / 60));
        cells.seconds.textContent = pad(left % 60);
    }

    tick();
    timerId = window.setInterval(tick, 1000);
})();
