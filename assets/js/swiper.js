import Swiper from 'swiper/bundle';

// Intro info blocks slider
document.querySelectorAll( '.intro-slider__swiper' ).forEach( ( el ) => {
	const section = el.closest( '.intro-slider' );
	new Swiper( el, {
		grabCursor:    true,
		slidesPerView: 1,
		spaceBetween:  0,
		navigation: {
			prevEl: section.querySelector( '.intro-slider__prev' ),
			nextEl: section.querySelector( '.intro-slider__next' ),
		},
	} );
} );

// Posts slider — reusable across pages
document.querySelectorAll( '.posts-slider__swiper' ).forEach( ( el ) => {
	const section = el.closest( '.posts-slider' );
	new Swiper( el, {
		grabCursor:    true,
		slidesPerView: 1,
		spaceBetween:  20,
		navigation: {
			prevEl: section.querySelector( '.posts-slider__prev' ),
			nextEl: section.querySelector( '.posts-slider__next' ),
		},
		breakpoints: {
			768: {
				slidesPerView:    1.8,
				spaceBetween:     20,
				slidesOffsetAfter: 20,
			},
			1024: {
				slidesPerView:    2.8,
				spaceBetween:     20,
				slidesOffsetAfter: 20,
			},
			1280: {
				slidesPerView:    2.8,
				spaceBetween:     32,
				slidesOffsetAfter: 64,
			},
			1536: {
				slidesPerView:    3.8,
				spaceBetween:     32,
				slidesOffsetAfter: 64,
			},
		},
	} );
} );

document.querySelectorAll( '.slider-posts__main' ).forEach( ( mainEl ) => {
	const section  = mainEl.closest( '.slider-posts' );
	const thumbsEl = section?.querySelector( '.slider-posts__thumbs' );

	const initSwipers = () => {
		if ( ! thumbsEl ) {
			new Swiper( mainEl, { grabCursor: true } );
			return;
		}

		// Vertical Swiper requires a fixed pixel height — derive it from the main image.
		const h = mainEl.offsetHeight;
		if ( h > 0 ) {
			thumbsEl.style.height = h + 'px';
		}

		const thumbsSwiper = new Swiper( thumbsEl, {
			direction:           'vertical',
			slidesPerView:       4,
			spaceBetween:        12,
			watchSlidesProgress: true,
		} );

		const mainSwiper = new Swiper( mainEl, {
			grabCursor:        true,
			effect:            'fade',
			fadeEffect:        { crossFade: true },
			thumbs:            { swiper: thumbsSwiper },
			navigation: {
				prevEl: section.querySelector( '.slider-posts__prev' ),
				nextEl: section.querySelector( '.slider-posts__next' ),
			},
		} );

		// ResizeObserver reacts to the actual element size changing,
		// including after images load — more reliable than window resize.
		new ResizeObserver( ( entries ) => {
			const newH = entries[ 0 ].contentRect.height;
			if ( newH > 0 ) {
				thumbsEl.style.height = newH + 'px';
				thumbsSwiper.update();
				mainSwiper.update();
			}
		} ).observe( mainEl );
	};

	// Images with aspect-ratio set in CSS report offsetHeight before load,
	// but wait for DOMContentLoaded to ensure layout has run.
	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', initSwipers );
	} else {
		initSwipers();
	}
} );
