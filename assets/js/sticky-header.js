import { gsap } from './gsap.js';

const mainHeader  = document.getElementById('header-main');
const stickyHeader = document.getElementById('header-sticky');

if (mainHeader && stickyHeader) {
  const threshold = mainHeader.offsetHeight;
  let isVisible = false;

  const showHeader = () => {
    isVisible = true;
    stickyHeader.setAttribute('aria-hidden', 'false');
    stickyHeader.style.pointerEvents = 'auto';
    mainHeader.classList.add('is-hidden');
    gsap.to(stickyHeader, {
      clipPath: 'inset(0 0 0% 0)',
      duration: 0.55,
      ease: 'power3.out',
      overwrite: true,
    });
  };

  const hideHeader = () => {
    isVisible = false;
    stickyHeader.setAttribute('aria-hidden', 'true');
    stickyHeader.style.pointerEvents = 'none';
    mainHeader.classList.remove('is-hidden');
    gsap.to(stickyHeader, {
      clipPath: 'inset(0 0 100% 0)',
      duration: 0.32,
      ease: 'power3.in',
      overwrite: true,
    });
  };

  const onScroll = () => {
    const past = window.scrollY > threshold;
    if (past && !isVisible) showHeader();
    else if (!past && isVisible) hideHeader();
  };

  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();
}
