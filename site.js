(function () {
  const ready = (fn) => (document.readyState !== 'loading' ? fn() : document.addEventListener('DOMContentLoaded', fn));

  ready(() => {
    const logo = document.querySelector('#navbar-logo, .navbar .navbar-logo');
    if (!logo) return;

    const originalSrc = logo.getAttribute('src') || '';
    // Derive alternate logo path in the same folder by filename swap (logo.png <-> logo1.png)
    const altFrom = (src, find, rep) => src.replace(new RegExp(find + '(\.[a-zA-Z0-9]+)$', 'i'), rep + '$1');
    const scrolledSrc = /logo1\.[a-z]+$/i.test(originalSrc)
      ? altFrom(originalSrc, 'logo1', 'logo')
      : altFrom(originalSrc, 'logo', 'logo1');
    const baseSrc = /logo1\.[a-z]+$/i.test(originalSrc) ? altFrom(originalSrc, 'logo1', 'logo') : originalSrc;

    // Find a hero section in this page
    const hero = document.querySelector(
      '.hero-section, .about-hero, .contact-hero, .services-hero, .portfolio-hero, .privacy-hero, .terms-hero, section[class*="hero"]'
    );
    const nav = document.querySelector('.navbar');
    const navH = nav ? nav.offsetHeight : 0;

    const getThreshold = () => {
      if (hero) {
        const rect = hero.getBoundingClientRect();
        const top = rect.top + window.scrollY;
        const bottom = top + rect.height;
        return bottom - navH; // switch when hero ends (account for navbar height)
      }
      return 120; // fallback threshold
    };

    let threshold = getThreshold();
    let current = 'base';

    const setLogo = (mode) => {
      if (current === mode) return;
      current = mode;
      const next = mode === 'scrolled' ? scrolledSrc : baseSrc;
      if (next && logo.getAttribute('src') !== next) {
        logo.setAttribute('src', next);
      }
    };

    const onScroll = () => {
      const y = window.scrollY;
      setLogo(y > threshold ? 'scrolled' : 'base');
    };

    window.addEventListener('scroll', onScroll, { passive: true });
    window.addEventListener('resize', () => {
      threshold = getThreshold();
      onScroll();
    });
    window.addEventListener('load', () => {
      threshold = getThreshold();
      onScroll();
    });

    onScroll();
  });
})();
