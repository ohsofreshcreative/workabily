const STICKY_TOP = parseFloat(getComputedStyle(
    document.querySelector('.b-overlap .gsap__cards') || document.body
).top) || 80;

document.querySelectorAll('.b-overlap').forEach(section => {
    const wrappers = Array.from(section.querySelectorAll('.gsap__cards'));
    if (!wrappers.length) return;

    // Ustaw z-index — późniejsza karta jest na wierzchu
    wrappers.forEach((w, i) => w.style.zIndex = i + 1);

    function update() {
        const vh = window.innerHeight;

        wrappers.forEach((wrapper, i) => {
            const card = wrapper.querySelector('.gsap__card');
            if (!card || i === wrappers.length - 1) {
                // Ostatnia karta zawsze czysta
                if (card) { card.style.transform = ''; card.style.filter = ''; }
                return;
            }

            // Gdzie jest NASTĘPNA karta w viewporcie?
            const nextTop = wrappers[i + 1].getBoundingClientRect().top;

            // Progres 0 → 1: startuje 10% później (nie od razu z dołu ekranu)
            const totalRange = vh - STICKY_TOP;
            const startAt    = vh - totalRange * 0.1;
            const progress   = Math.max(0, Math.min(1, (startAt - nextTop) / (totalRange * 0.9)));

            card.style.transform = progress > 0 ? `scale(${1 - progress * 0.1})` : '';
            card.style.filter    = progress > 0 ? `blur(${(progress * 5).toFixed(1)}px)` : '';
        });
    }

    window.addEventListener('scroll', update, { passive: true });
    update();
});
