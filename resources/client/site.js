/* Behaviour of the public pages. No libraries needed.
   Built into public/client/dist/site.min.js by: npm run build:client */
(function () {
    'use strict';

    var calm = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function all(selector, root) {
        return Array.prototype.slice.call((root || document).querySelectorAll(selector));
    }

    /* ---------- Mobile menu ---------- */
    all('.nav-switch').forEach(function (button) {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            var open = document.querySelector('.main-menu').classList.toggle('is-open');
            button.setAttribute('aria-expanded', String(open));
        });
    });

    /* ---------- Sub menus with keyboard and touch ---------- */
    all('.sub-menu-arrow').forEach(function (link) {
        function toggle(e) {
            e.preventDefault();
            var item = link.parentNode;
            var open = !item.classList.contains('is-open');
            all('.main-menu > li.is-open').forEach(function (li) {
                li.classList.remove('is-open');
                li.querySelector('.sub-menu-arrow').setAttribute('aria-expanded', 'false');
            });
            item.classList.toggle('is-open', open);
            link.setAttribute('aria-expanded', String(open));
        }
        link.addEventListener('click', toggle);
        link.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' || e.key === ' ') toggle(e);
        });
    });

    /* ---------- Rotating slides (top slider and testimonials) ---------- */
    function rotate(root, slides, activeClass, options) {
        if (!slides.length) return;
        var index = 0, timer, dots = [];

        function show(next) {
            index = (next + slides.length) % slides.length;
            slides.forEach(function (slide, i) { slide.classList.toggle(activeClass, i === index); });
            dots.forEach(function (dot, i) { dot.classList.toggle('active', i === index); });
            all('img[data-src]', slides[index]).forEach(function (img) {
                if (img.dataset.srcset) img.srcset = img.dataset.srcset;
                img.src = img.dataset.src;
                img.removeAttribute('data-src');
            });
            schedule();
        }

        function schedule() {
            clearTimeout(timer);
            if (!calm && slides.length > 1) timer = setTimeout(function () { show(index + 1); }, 5000);
        }

        function button(className, label, html, action) {
            var b = document.createElement('button');
            b.type = 'button';
            b.className = className;
            b.setAttribute('aria-label', label);
            b.innerHTML = html;
            b.addEventListener('click', action);
            return b;
        }

        if (options.nav && slides.length > 1) {
            var nav = document.createElement('div');
            nav.className = 'owl-nav';
            nav.appendChild(button('owl-prev', 'Previous', '<i class="fa fa-angle-left"></i>', function () { show(index - 1); }));
            nav.appendChild(button('owl-next', 'Next', '<i class="fa fa-angle-right"></i>', function () { show(index + 1); }));
            root.appendChild(nav);
        }

        if (slides.length > 1) {
            var holder = document.createElement('div');
            holder.className = 'owl-dots';
            slides.forEach(function (slide, i) {
                var dot = button('owl-dot' + (i === 0 ? ' active' : ''), 'Show item ' + (i + 1), '<span></span>', function () { show(i); });
                dots.push(dot);
                holder.appendChild(dot);
            });
            root.appendChild(holder);
        }

        root.addEventListener('mouseenter', function () { if (options.nav) clearTimeout(timer); });
        root.addEventListener('mouseleave', schedule);
        document.addEventListener('visibilitychange', function () {
            if (document.hidden) clearTimeout(timer); else schedule();
        });

        root.classList.add('owl-loaded');
        slides[0].classList.add(activeClass);
        schedule();
    }

    all('.hero-slider').forEach(function (root) {
        rotate(root, all('.owl-item', root), 'active', { nav: false });
    });
    all('.testimonial-slider').forEach(function (root) {
        rotate(root, all('.ts-item', root), 'is-active', { nav: true });
    });

    /* ---------- Bootstrap style carousel (faculties) ---------- */
    all('.carousel[data-bs-ride]').forEach(function (root) {
        var items = all('.carousel-item', root);
        if (calm || items.length < 2) return;
        var hover = false, busy = false;
        root.addEventListener('mouseenter', function () { hover = true; });
        root.addEventListener('mouseleave', function () { hover = false; });

        setInterval(function () {
            if (hover || busy || document.hidden || !root.offsetParent) return;
            busy = true;
            var current = root.querySelector('.carousel-item.active');
            var next = items[(items.indexOf(current) + 1) % items.length];
            next.classList.add('carousel-item-next');
            void next.offsetHeight;
            current.classList.add('carousel-item-start');
            next.classList.add('carousel-item-start');
            setTimeout(function () {
                next.classList.remove('carousel-item-next', 'carousel-item-start');
                next.classList.add('active');
                current.classList.remove('active', 'carousel-item-start');
                busy = false;
            }, 620);
        }, parseInt(root.dataset.bsInterval, 10) || 3000);
    });

    /* ---------- Live search ---------- */
    var input = document.getElementById('search-input');
    var results = document.getElementById('search-results');
    if (input && results) {
        var wait, latest = 0;
        input.addEventListener('input', function () {
            clearTimeout(wait);
            var term = input.value.trim();
            var request = ++latest;
            if (!term) {
                results.innerHTML = '';
                results.style.display = 'none';
                return;
            }
            wait = setTimeout(function () {
                fetch('/search?term=' + encodeURIComponent(term))
                    .then(function (r) { return r.ok ? r.text() : ''; })
                    .then(function (html) {
                        if (request !== latest) return;
                        results.innerHTML = html;
                        results.style.display = 'block';
                    })
                    .catch(function () {});
            }, 250);
        });
    }

    /* ---------- "Read more" cards ---------- */
    all('.read-more').forEach(function (button) {
        button.addEventListener('click', function () {
            var card = button.closest('.card');
            if (!card) return;
            button.textContent = card.classList.toggle('expanded') ? 'Read Less' : 'Read More';
        });
    });

    /* ---------- Galleries ---------- */
    if (window.Swiper && document.querySelector('.mySwiper')) {
        new window.Swiper('.mySwiper', {
            cssMode: true,
            navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
            pagination: { el: '.swiper-pagination' },
            mousewheel: true,
            keyboard: true
        });
    }
})();
