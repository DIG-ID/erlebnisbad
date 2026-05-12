const mainHeader = document.getElementById('header-main');
const stickyHeader = document.getElementById('header-sticky');

if (mainHeader && stickyHeader) {
  const threshold = mainHeader.offsetHeight;

  const onScroll = () => {
    const past = window.scrollY > threshold;
    stickyHeader.classList.toggle('is-visible', past);
    stickyHeader.setAttribute('aria-hidden', String(!past));
    mainHeader.classList.toggle('is-hidden', past);
  };

  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();
}
