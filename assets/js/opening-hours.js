import { gsap, ScrollTrigger } from './gsap.js';

document.querySelectorAll( '.oh-image-reveal' ).forEach( ( el ) => {
	const mm = gsap.matchMedia();

	// md and up: clip from center 8/12 cols → full width
	mm.add( '(min-width: 768px)', () => {
		gsap.fromTo(
			el,
			{ clipPath: 'inset(0 16.667% 0 16.667% round 12px)' },
			{
				clipPath:      'inset(0 0% 0 0% round 12px)',
				ease:          'none',
				scrollTrigger: {
					trigger: el,
					start:   'top 85%',
					end:     'top 20%',
					scrub:   1.5,
				},
			}
		);
	} );

	// mobile: clip from container padding (px-8 = 2rem = 32px) → full bleed
	mm.add( '(max-width: 767px)', () => {
		const clipPx      = 32;
		const clipPercent = ( clipPx / el.offsetWidth * 100 ).toFixed( 3 );

		gsap.fromTo(
			el,
			{ clipPath: `inset(0 ${clipPercent}% 0 ${clipPercent}%)` },
			{
				clipPath:      'inset(0 0% 0 0%)',
				ease:          'none',
				scrollTrigger: {
					trigger: el,
					start:   'top 85%',
					end:     'top 20%',
					scrub:   1.5,
				},
			}
		);
	} );
} );
