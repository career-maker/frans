// Daily Scripture Quotations Engine
window.bibleQuotes = [
    { text: "For God so loved the world that he gave his one and only Son, that whoever believes in him shall not perish but have eternal life.", ref: "John 3:16" },
    { text: "Trust in the Lord with all your heart and lean not on your own understanding; in all your ways submit to him, and he will make your paths straight.", ref: "Proverbs 3:5-6" },
    { text: "I can do all this through him who gives me strength.", ref: "Philippians 4:13" },
    { text: "The Lord is my shepherd, I lack nothing. He makes me lie down in green pastures, he leads me beside quiet waters.", ref: "Psalm 23:1-2" },
    { text: "Be strong and courageous. Do not be afraid; do not be discouraged, for the Lord your God will be with you wherever you go.", ref: "Joshua 1:9" },
    { text: "For I know the plans I have for you, declares the Lord, plans to prosper you and not to harm you, plans to give you hope and a future.", ref: "Jeremiah 29:11" },
    { text: "But the fruit of the Spirit is love, joy, peace, forbearance, kindness, goodness, faithfulness, gentleness and self-control.", ref: "Galatians 5:22-23" },
    { text: "And we know that in all things God works for the good of those who love him, who have been called according to his purpose.", ref: "Romans 8:28" },
    { text: "Come to me, all you who are weary and burdened, and I will give you rest.", ref: "Matthew 11:28" },
    { text: "Therefore do not worry about tomorrow, for tomorrow will worry about itself. Each day has enough trouble of its own.", ref: "Matthew 6:34" },
    { text: "Do everything in love.", ref: "1 Corinthians 16:14" },
    { text: "The Lord is close to the brokenhearted and saves those who are crushed in spirit.", ref: "Psalm 34:18" }
];

window.openBibleVerseModal = function(e) {
    if (e) {
        e.preventDefault();
        e.stopPropagation();
    }
    const modal = document.getElementById('bible-modal');
    const flipContainer = document.getElementById('bible-flip-container');
    const revealContainer = document.getElementById('bible-reveal-container');
    const audio = document.getElementById('bible-audio');

    if (!modal) return;

    if (flipContainer) flipContainer.classList.remove('active');
    if (revealContainer) revealContainer.classList.remove('active');
    if (audio) {
        audio.pause();
        audio.currentTime = 0;
    }

    modal.classList.add('active');
    document.body.style.overflow = 'hidden';

    if (flipContainer) {
        flipContainer.classList.add('active');
    }
};

window.closeBibleVerseModal = function(e) {
    if (e) {
        e.preventDefault();
        e.stopPropagation();
    }
    const modal = document.getElementById('bible-modal');
    const flipContainer = document.getElementById('bible-flip-container');
    const revealContainer = document.getElementById('bible-reveal-container');
    const audio = document.getElementById('bible-audio');

    if (modal) modal.classList.remove('active');
    document.body.style.overflow = '';

    setTimeout(function() {
        if (flipContainer) flipContainer.classList.remove('active');
        if (revealContainer) revealContainer.classList.remove('active');
        if (audio) {
            audio.pause();
            audio.currentTime = 0;
        }
    }, 350);
};

window.revealBibleVerseQuote = function() {
    const flipContainer = document.getElementById('bible-flip-container');
    const revealContainer = document.getElementById('bible-reveal-container');
    const quoteText = document.getElementById('bible-quote-text');
    const quoteRef = document.getElementById('bible-quote-ref');
    const audio = document.getElementById('bible-audio');

    if (flipContainer) flipContainer.classList.remove('active');

    const randomQuote = window.bibleQuotes[Math.floor(Math.random() * window.bibleQuotes.length)];
    if (quoteText) quoteText.innerText = '“' + randomQuote.text + '”';
    if (quoteRef) quoteRef.innerText = '— ' + randomQuote.ref;

    if (revealContainer) revealContainer.classList.add('active');

    if (audio) {
        audio.play().catch(function(err) {
            console.log('Audio note:', err);
        });
    }
};

document.addEventListener('DOMContentLoaded', function() {
    const btn = document.getElementById('bible-widget-btn');
    const modal = document.getElementById('bible-modal');
    const closeBtn = document.getElementById('bible-modal-close');
    const flipContainer = document.getElementById('bible-flip-container');

    if (btn) {
        btn.addEventListener('click', window.openBibleVerseModal);
    }
    if (closeBtn) {
        closeBtn.addEventListener('click', window.closeBibleVerseModal);
    }
    if (flipContainer) {
        flipContainer.addEventListener('click', function(e) {
            e.stopPropagation();
            window.revealBibleVerseQuote();
        });
    }
    if (modal) {
        modal.addEventListener('click', function(e) {
            if (e.target.closest('#bible-modal-close') || e.target.closest('#bible-reveal-container')) {
                return;
            }
            if (flipContainer && flipContainer.classList.contains('active')) {
                window.revealBibleVerseQuote();
            } else {
                window.closeBibleVerseModal();
            }
        });
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            window.closeBibleVerseModal();
        }
    });
});
