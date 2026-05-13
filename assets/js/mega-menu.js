import { gsap } from './gsap.js';

const megaMenu = document.getElementById('mega-menu');
const overlay  = document.getElementById('mega-menu-overlay');

if (megaMenu && overlay) {
  const burgerBtns = document.querySelectorAll('[aria-controls="mega-menu"]');
  const closeBtn   = megaMenu.querySelector('.mega-menu__close');
  let leaveTimer   = null;

  // Builds a clip-path path() string using the wave SVG shape (viewBox 0 0 150 821).
  // O = horizontal offset: 0 = fully open, W = fully hidden (wave shifted off-screen right).
  // H = element height in px (wave is scaled vertically to match).
  const buildClipPath = (O, H) => {
    const sy = H / 821;
    const f  = n => n.toFixed(2);
    const wave =
      `M${f(18.6373 + O)} ${f(543.246 * sy)}` +
      `C${f(-4.68659 + O)} ${f(630.878 * sy)} ${f(8.91017 + O)} ${f(736.662 * sy)} ${f(30.598 + O)} ${f(770.182 * sy)}` +
      `C${f(57.0716 + O)} ${f(811.1 * sy)} ${f(79.0554 + O)} ${f(H)} ${f(150 + O)} ${f(H)}` +
      `L${f(150 + O)} 0` +
      `C${f(150 + O)} 0 ${f(65.5608 + O)} 0 ${f(30.5978 + O)} ${f(29.699 * sy)}` +
      `C${f(-4.30424 + O)} ${f(59.3461 * sy)} ${f(-6.31408 + O)} ${f(177.937 * sy)} ${f(9.41603 + O)} ${f(259.234 * sy)}` +
      `C${f(25.1461 + O)} ${f(340.531 * sy)} ${f(41.9611 + O)} ${f(455.614 * sy)} ${f(18.6373 + O)} ${f(543.246 * sy)}Z`;
    const rect =
      `M${f(150 + O)} 0L10000 0L10000 ${f(H)}L${f(150 + O)} ${f(H)}Z`;
    return `path('${wave} ${rect}')`;
  };

  // Proxy object that GSAP animates; drives clip-path on every frame.
  const clip = { O: megaMenu.offsetWidth };
  megaMenu.style.clipPath = buildClipPath(clip.O, megaMenu.offsetHeight);

  // Items that stagger in on open.
  const rightItems = [...megaMenu.querySelectorAll('.mega-menu__col--secondary .mega-menu__list li, .mega-menu__cta')];
  const leftItems  = [...megaMenu.querySelectorAll('.mega-menu__col--primary .mega-menu__list li')];
  const menuItems  = [...rightItems, ...leftItems];
  gsap.set(menuItems, { opacity: 0, y: 16 });

  const openMenu = () => {
    const H = megaMenu.offsetHeight;
    megaMenu.classList.add('is-open');
    megaMenu.setAttribute('aria-hidden', 'false');
    overlay.classList.add('is-visible');
    overlay.setAttribute('aria-hidden', 'false');
    burgerBtns.forEach(btn => btn.setAttribute('aria-expanded', 'true'));
    gsap.to(clip, {
      O: 0,
      duration: 0.48,
      ease: 'power3.inOut',
      overwrite: true,
      onUpdate: () => { megaMenu.style.clipPath = buildClipPath(clip.O, H); },
    });
    gsap.to(menuItems, {
      opacity: 1,
      y: 0,
      duration: 0.5,
      ease: 'power2.out',
      stagger: 0.11,
      delay: 0.15,
      overwrite: true,
    });
  };

  const closeMenu = () => {
    clearTimeout(leaveTimer);
    // Move focus out before aria-hidden is applied to avoid the
    // "aria-hidden on ancestor of focused element" browser warning.
    if (megaMenu.contains(document.activeElement)) {
      (burgerBtns[0] || document.body).focus();
    }
    const H = megaMenu.offsetHeight;
    const W = megaMenu.offsetWidth;
    overlay.classList.remove('is-visible');
    overlay.setAttribute('aria-hidden', 'true');
    burgerBtns.forEach(btn => btn.setAttribute('aria-expanded', 'false'));
    // Reset items instantly so they're hidden for the next open.
    gsap.set(menuItems, { opacity: 0, y: 16 });
    gsap.to(clip, {
      O: W,
      duration: 0.32,
      ease: 'power3.in',
      overwrite: true,
      onUpdate: () => { megaMenu.style.clipPath = buildClipPath(clip.O, H); },
      onComplete: () => {
        megaMenu.classList.remove('is-open');
        megaMenu.setAttribute('aria-hidden', 'true');
      },
    });
  };

  burgerBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      megaMenu.classList.contains('is-open') ? closeMenu() : openMenu();
    });
  });

  if (closeBtn) closeBtn.addEventListener('click', closeMenu);
  overlay.addEventListener('click', closeMenu);

  document.addEventListener('keydown', e => {
    if (e.key === 'Escape' && megaMenu.classList.contains('is-open')) closeMenu();
  });

  megaMenu.addEventListener('mouseleave', () => {
    leaveTimer = setTimeout(closeMenu, 50);
  });

  megaMenu.addEventListener('mouseenter', () => {
    clearTimeout(leaveTimer);
  });

  // Keep the hidden clip-path in sync with the element's actual width on resize,
  // so the menu never bleeds into view when the viewport changes.
  window.addEventListener('resize', () => {
    if (!megaMenu.classList.contains('is-open')) {
      clip.O = megaMenu.offsetWidth;
      megaMenu.style.clipPath = buildClipPath(clip.O, megaMenu.offsetHeight);
    }
  });
}
