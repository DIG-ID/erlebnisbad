import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import Lenis from 'lenis';

gsap.registerPlugin(ScrollTrigger);

// Expo-out easing for a cinematic, filmic stop
const easeExpoOut = (t) => (t === 1 ? 1 : 1 - Math.pow(2, -10 * t));

/**
 * Initialise Lenis with a cinematic glide feel.
 * Tweak duration and wheelMultiplier per project to taste.
 *
 * @returns {Lenis}
 */
function initLenis() {
  const lenis = new Lenis({
    duration: 1.35,          // adjust per project — higher = longer glide
    easing: easeExpoOut,
    smooth: true,
    smoothWheel: true,
    wheelMultiplier: 0.85,   // lower = softer on high-res/trackpad devices
  });

  // Keep ScrollTrigger in sync with Lenis scroll position
  lenis.on('scroll', ScrollTrigger.update);

  // Drive Lenis with GSAP ticker — single RAF source
  gsap.ticker.add((time) => {
    lenis.raf(time * 1000);
  });

  gsap.ticker.lagSmoothing(0);

  return lenis;
}

const lenis = initLenis();

export { gsap, ScrollTrigger, lenis };



if (document.body.classList.contains('page-template-page-home')) {
  // Desktop only — matchMedia auto-creates/reverts the triggers per breakpoint
  const mm = gsap.matchMedia();

  mm.add('(min-width: 1280px)', () => {
    const panels = gsap.utils.toArray('.panel-home');

    if (panels.length) {
      const lastPanel = panels[panels.length - 1];

      panels.forEach((panel, i) => {
        ScrollTrigger.create({
          trigger: panel,
          start: () => `top ${window.innerHeight * 0.28 + i * 60}px`,
          endTrigger: lastPanel,
          end: () => `top ${window.innerHeight * 0.28 + (panels.length - 1) * 80 - 120}px`,
          pin: true,
          pinSpacing: false
        });
      });
    }
  });
}


if (document.querySelector('.section-spotlights')) {
  // Desktop only (>= 768px) — matchMedia reverts the timeline/pin and clears
  // the inline autoAlpha/y styles on the panels when dropping to mobile, so
  // they fall back to the normal stacked layout (CSS keeps stacking >= 768px too)
  const mm = gsap.matchMedia();

  mm.add('(min-width: 768px)', () => {
    const container = document.querySelector('.section-spotlights');
    const panels = gsap.utils.toArray('.spotlight-panel');

    // Need at least two stacked panels to cross-fade between them
    if (container && panels.length >= 2) {
      const [first, second] = panels;

      // Initial states — panel 1 already visible (CSS hides it by default);
      // only panel 2 starts hidden and pushed down, ready to fade in up
      gsap.set(first, { autoAlpha: 1, y: 0 });
      gsap.set(second, { autoAlpha: 0, y: 40 });

      // Single scrubbed timeline driven by the pinned container.
      // The container is pinned (not the panels); the panels are stacked
      // on top of each other via CSS so they share the same space.
      const tl = gsap.timeline({
        scrollTrigger: {
          trigger: container,
          // Responsive start — re-evaluated on every ScrollTrigger refresh (resize):
          // large desktop pins later (25%), smaller screens earlier (15%)
          start: () => `top ${window.innerWidth >= 1280 ? '25%' : '15%'}`,
          end: '+=200%',     // scroll distance the pin lasts — tune to taste
          pin: true,
          scrub: 1
        }
      });

      tl
        // 1. Hold panel 1 (already visible) for a beat after the pin starts
        .to(first, { autoAlpha: 1, duration: 0.6 })
        // 2. Panel 1 fully fades out up — must finish before panel 2 appears
        //    (no overlap: the panels never share the screen)
        .to(first, { autoAlpha: 0, y: -40, ease: 'power2.in', duration: 0.4 })
        // 3. Only now does panel 2 fade in up
        .to(second, { autoAlpha: 1, y: 0, ease: 'power2.out', duration: 1 })
        // 4. Hold panel 2 in place to close the sequence
        .to(second, { autoAlpha: 1, duration: 0.6 });
    }
  });
}