<?php /** Animates any element with class "count-up" from 0 to its number when scrolled into view. */ ?>
<script>
(function () {
    const els = document.querySelectorAll('.count-up');
    if (!els.length) return;
    const run = (el) => {
        const m = el.textContent.trim().match(/^([^\d-]*)([\d,]+)(.*)$/);
        if (!m) return;
        const pre = m[1], suf = m[3], target = parseFloat(m[2].replace(/,/g, ''));
        if (isNaN(target)) return;
        const dur = 1100, start = performance.now();
        const fmt = (v) => pre + Math.round(v).toLocaleString() + suf;
        const step = (now) => {
            const p = Math.min(1, (now - start) / dur), e = 1 - Math.pow(1 - p, 3);
            el.textContent = fmt(target * e);
            if (p < 1) requestAnimationFrame(step); else el.textContent = fmt(target);
        };
        el.textContent = fmt(0); requestAnimationFrame(step);
    };
    const io = new IntersectionObserver((ents) => {
        ents.forEach((en) => { if (en.isIntersecting) { io.unobserve(en.target); run(en.target); } });
    }, { threshold: 0.3 });
    els.forEach((el) => io.observe(el));
})();
</script>
