/**
 * Feratel/Deskline tickets widget — iframe auto-resize.
 *
 * Listens for postMessage events sent by the embedded booking widget and
 * adjusts the iframe height to match the widget's own content height,
 * eliminating the empty space that appears on narrower viewports.
 *
 * Falls back gracefully to the CSS min-height if no resize message arrives.
 */
( function () {
	const frame = document.querySelector( '.tickets-widget__frame' );

	if ( ! frame ) {
		return;
	}

	window.addEventListener( 'message', function ( event ) {
		// Only process messages that originate from the widget's domain.
		if ( ! event.origin.includes( 'bookingandmore.com' ) ) {
			return;
		}

		let height = null;

		// The Deskline widget typically sends one of these formats:
		// 1. A plain number string: "2840"
		// 2. A JSON object: { height: 2840 }
		// 3. A JSON object: { type: 'resize', height: 2840 }
		if ( typeof event.data === 'number' ) {
			height = event.data;
		} else if ( typeof event.data === 'string' && /^\d+$/.test( event.data.trim() ) ) {
			height = parseInt( event.data.trim(), 10 );
		} else if ( event.data && typeof event.data === 'object' && event.data.height ) {
			height = parseInt( event.data.height, 10 );
		}

		if ( height && height > 0 ) {
			frame.style.height  = height + 'px';
			frame.style.minHeight = height + 'px';
		}
	} );
}() );
