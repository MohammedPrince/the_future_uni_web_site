/* Behaviour of the public pages. No libraries needed.
   Built into public/client/dist/site.min.js by: npm run build:client */
(function () {
    'use strict';

    var calm = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function all(selector, root) {
        return Array.prototype.slice.call((root || document).querySelectorAll(selector));
    }

    /* ---------- Links to other websites open in a new tab ----------
       (odms, elearning, hdesk, Facebook, links inside news text ...).
       Same host = same tab; mailto:, tel: and #anchors are left alone. */
    all('a[href]').forEach(function (a) {
        if (a.target || !/^https?:$/.test(a.protocol)) return;
        if (a.hostname === location.hostname) return;
        a.target = '_blank';
        var rel = (a.getAttribute('rel') || '').split(/\s+/);
        if (rel.indexOf('noopener') < 0) rel.push('noopener');
        a.setAttribute('rel', rel.join(' ').trim());
    });

    /* ---------- Tabs on inner pages: show the first one when none is open ---------- */
    window.addEventListener('load', function () {
        all('main .tab').forEach(function (tabs) {
            if (tabs.querySelector('.tablinks.active')) return;
            var first = tabs.querySelector('.tablinks');
            if (first) first.click();
        });
    });

    /* ---------- Mobile menu ---------- */
    all('.nav-switch').forEach(function (button) {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            var open = document.querySelector('.fu-menu, .main-menu').classList.toggle('is-open');
            button.setAttribute('aria-expanded', String(open));
        });
    });
    document.addEventListener('keydown', function (e) {
        if (e.key !== 'Escape') return;
        all('.fu-menu.is-open, .fu-menu > li.is-open').forEach(function (el) { el.classList.remove('is-open'); });
        all('.nav-switch, .sub-menu-arrow').forEach(function (b) { b.setAttribute('aria-expanded', 'false'); });
    });

    /* ---------- Sub menus with keyboard and touch ---------- */
    all('.sub-menu-arrow').forEach(function (link) {
        function toggle(e) {
            e.preventDefault();
            var item = link.parentNode;
            var open = !item.classList.contains('is-open');
            all('.main-menu > li.is-open, .fu-menu > li.is-open').forEach(function (li) {
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
        rotate(root, all('.owl-item', root), 'active', { nav: !!root.closest('.fu-hero') });
    });
    all('.testimonial-slider').forEach(function (root) {
        rotate(root, all('.ts-item', root), 'is-active', { nav: true });
    });
    all('.fu-tm').forEach(function (root) {
        rotate(root, all('.fu-tm-item', root), 'is-active', { nav: true });
    });

    /* ---------- News & Events slider (home) ----------
       A row that scrolls sideways (works by swipe even without this code).
       Adds arrows, dots and a slow auto-advance that stops on hover, focus,
       touch, a hidden tab or "reduce motion". */
    all('[data-ne-slider]').forEach(function (root) {
        var track = root.querySelector('.ne-track');
        var slides = all('.ne-slide', track);
        var prev = root.querySelector('.ne-prev');
        var next = root.querySelector('.ne-next');
        var dotsBox = root.querySelector('.ne-dots');
        if (!track || slides.length < 2) return;

        var timer, paused = false, dots = [], ticking = false;

        function perView() {
            return Math.max(1, Math.round(track.clientWidth / slides[0].getBoundingClientRect().width));
        }
        function pages() { return Math.max(1, Math.ceil(slides.length / perView())); }
        function page() {
            var max = track.scrollWidth - track.clientWidth;
            if (max <= 0) return 0;
            return Math.round(track.scrollLeft / max * (pages() - 1));
        }
        function go(p) {
            var count = pages();
            p = (p + count) % count;
            var target = slides[Math.min(p * perView(), slides.length - 1)];
            track.scrollTo({ left: target.offsetLeft - slides[0].offsetLeft, behavior: calm ? 'auto' : 'smooth' });
        }

        function build() {
            var count = pages();
            var many = count > 1;
            prev.hidden = next.hidden = !many;
            dotsBox.innerHTML = '';
            dots = [];
            if (many) {
                for (var i = 0; i < count; i++) {
                    (function (i) {
                        var b = document.createElement('button');
                        b.type = 'button';
                        b.className = 'ne-dot';
                        b.setAttribute('aria-label', 'Show page ' + (i + 1));
                        b.addEventListener('click', function () { go(i); });
                        dots.push(b);
                        dotsBox.appendChild(b);
                    })(i);
                }
            }
            mark();
        }
        function mark() {
            var current = page();
            dots.forEach(function (d, i) { d.classList.toggle('active', i === current); });
            ticking = false;
        }

        function schedule() {
            clearInterval(timer);
            if (calm) return;
            timer = setInterval(function () {
                if (paused || document.hidden || pages() < 2) return;
                go(page() + 1);
            }, 6000);
        }

        prev.addEventListener('click', function () { go(page() - 1); });
        next.addEventListener('click', function () { go(page() + 1); });
        track.addEventListener('scroll', function () {
            if (!ticking) { ticking = true; window.requestAnimationFrame(mark); }
        }, { passive: true });
        ['mouseenter', 'focusin', 'touchstart'].forEach(function (ev) {
            root.addEventListener(ev, function () { paused = true; }, { passive: true });
        });
        ['mouseleave', 'focusout'].forEach(function (ev) {
            root.addEventListener(ev, function () { paused = false; });
        });
        var resizeWait;
        window.addEventListener('resize', function () {
            clearTimeout(resizeWait);
            resizeWait = setTimeout(build, 200);
        });

        root.classList.add('is-ready');
        build();
        schedule();
    });

    /* ---------- News cards with several images ----------
       The image changes every few seconds, only while the card is on screen.
       The next image is downloaded first, so nothing flashes. */
    var photoCards = all('[data-photos]');
    if (photoCards.length && !calm && 'IntersectionObserver' in window) {
        var seen = new IntersectionObserver(function (entries) {
            entries.forEach(function (e) { e.target._visible = e.isIntersecting; });
        });
        photoCards.forEach(function (card, n) {
            var photos;
            try { photos = JSON.parse(card.getAttribute('data-photos')); } catch (err) { return; }
            var img = card.querySelector('img');
            var counter = card.querySelector('[data-photo-n]');
            var index = 0, busy = false;
            if (!img || !photos || photos.length < 2) return;
            seen.observe(card);
            setTimeout(function () {
                setInterval(function () {
                    if (busy || !card._visible || document.hidden) return;
                    busy = true;
                    var next = (index + 1) % photos.length;
                    var loader = new Image();
                    loader.onload = function () {
                        img.classList.add('is-fading');
                        setTimeout(function () {
                            img.src = photos[next];
                            img.style.objectFit = '';
                            img.style.padding = '';
                            img.classList.remove('is-fading');
                            index = next;
                            if (counter) counter.textContent = String(index + 1);
                            busy = false;
                        }, 350);
                    };
                    loader.onerror = function () { index = next; busy = false; };
                    loader.src = photos[next];
                }, 4000);
            }, 1500 + (n % 4) * 900); // cards do not all change at the same moment
        });
    }

    /* ---------- Service bars (CESD, CTS ...) ----------
       Each bar fills from the left when it scrolls into view, one after the
       other, and its number counts up. Without this code they are simply full. */
    var barLists = all('main .skills-content');
    if (barLists.length && !calm && 'IntersectionObserver' in window) {
        var countUp = function (el) {
            var end = parseInt(el.textContent, 10);
            if (isNaN(end)) return;
            var start = null;
            el.textContent = '0%';
            function step(t) {
                if (start === null) start = t;
                var p = Math.min(1, (t - start) / 1100);
                el.textContent = Math.round(end * (1 - Math.pow(1 - p, 3))) + '%';
                if (p < 1) window.requestAnimationFrame(step);
            }
            window.requestAnimationFrame(step);
            // The number always ends right, even where frames are paused.
            setTimeout(function () { el.textContent = end + '%'; }, 1300);
        };
        var barSeen = new IntersectionObserver(function (entries) {
            entries.forEach(function (e) {
                if (!e.isIntersecting) return;
                barSeen.unobserve(e.target);
                var row = e.target;
                setTimeout(function () {
                    row.classList.add('is-in');
                    var val = row.querySelector('.val');
                    if (val) countUp(val);
                }, (row._order || 0) * 140);
            });
        }, { threshold: 0.3 });
        barLists.forEach(function (list) {
            list.classList.add('fu-bars');
            all('.progress', list).forEach(function (row, i) {
                row._order = i;
                barSeen.observe(row);
            });
        });
    }

    /* ---------- News / event details: a thumbnail shows that image above ---------- */
    var postMain = document.querySelector('[data-post-main]');
    if (postMain) {
        var postLink = document.querySelector('[data-post-full]');
        var postN = document.querySelector('[data-post-n]');
        var thumbs = all('[data-post-thumb]');
        thumbs.forEach(function (button, i) {
            button.addEventListener('click', function () {
                var src = button.getAttribute('data-post-thumb');
                thumbs.forEach(function (b) { b.classList.toggle('is-active', b === button); });
                if (postN) postN.textContent = String(i + 1);
                if (postLink) postLink.href = src;
                postMain.style.opacity = '0.4';
                var next = new Image();
                next.onload = next.onerror = function () { postMain.src = src; postMain.style.opacity = ''; };
                next.src = src;
            });
        });
    }

    /* ---------- Share buttons (news and event pages) ---------- */
    all('[data-share-copy]').forEach(function (button) {
        button.addEventListener('click', function () {
            var done = button.parentNode.querySelector('.share-done');
            var text = button.getAttribute('data-share-copy');
            var ok = function () { if (done) { done.textContent = 'Link copied'; setTimeout(function () { done.textContent = ''; }, 2500); } };
            if (navigator.clipboard && window.isSecureContext) {
                navigator.clipboard.writeText(text).then(ok, function () { window.prompt('Copy this link:', text); });
            } else {
                window.prompt('Copy this link:', text);
            }
        });
    });
    all('[data-share-native]').forEach(function (button) {
        if (!navigator.share) return;
        button.hidden = false;
        button.addEventListener('click', function () {
            navigator.share({ title: button.getAttribute('data-title'), url: button.getAttribute('data-url') }).catch(function () {});
        });
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
