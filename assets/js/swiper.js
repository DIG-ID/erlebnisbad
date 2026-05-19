import Swiper from 'swiper/bundle';

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
			grabCursor: true,
			thumbs: { swiper: thumbsSwiper },
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
