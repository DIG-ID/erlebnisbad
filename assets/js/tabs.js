// Mobile/tablet: paired accordion list
document.querySelectorAll( '.tabs-posts__list' ).forEach( ( list ) => {
	const items    = Array.from( list.querySelectorAll( '.tabs-posts__item' ) );
	const pairSize = 2;

	items.forEach( ( item, index ) => {
		const btn   = item.querySelector( '.tabs-posts__nav-btn' );
		const panel = item.querySelector( '.tabs-posts__panel' );

		btn.addEventListener( 'click', () => {
			const pairStart = Math.floor( index / pairSize ) * pairSize;
			const scope     = items.slice( pairStart, pairStart + pairSize );

			scope.forEach( ( i ) => {
				i.querySelector( '.tabs-posts__nav-btn' ).classList.remove( 'is-active' );
				i.querySelector( '.tabs-posts__nav-btn' ).setAttribute( 'aria-selected', 'false' );
				i.querySelector( '.tabs-posts__panel' ).classList.remove( 'is-active' );
				i.querySelector( '.tabs-posts__panel' ).setAttribute( 'aria-hidden', 'true' );
			} );

			btn.classList.add( 'is-active' );
			btn.setAttribute( 'aria-selected', 'true' );
			panel.classList.add( 'is-active' );
			panel.setAttribute( 'aria-hidden', 'false' );
		} );
	} );
} );

// xl: nav bar + panels
document.querySelectorAll( '.tabs-posts__nav' ).forEach( ( nav ) => {
	const section = nav.closest( '.tabs-posts__inner' );
	const btns    = Array.from( nav.querySelectorAll( '.tabs-posts__nav-btn' ) );
	const panels  = section
		? Array.from( section.querySelectorAll( '.tabs-posts__panels .tabs-posts__panel' ) )
		: [];

	btns.forEach( ( btn, index ) => {
		btn.addEventListener( 'click', () => {
			btns.forEach( ( b ) => {
				b.classList.remove( 'is-active' );
				b.setAttribute( 'aria-selected', 'false' );
			} );
			panels.forEach( ( p ) => {
				p.classList.remove( 'is-active' );
				p.setAttribute( 'aria-hidden', 'true' );
			} );

			btn.classList.add( 'is-active' );
			btn.setAttribute( 'aria-selected', 'true' );
			if ( panels[ index ] ) {
				panels[ index ].classList.add( 'is-active' );
				panels[ index ].setAttribute( 'aria-hidden', 'false' );
			}
		} );
	} );
} );
