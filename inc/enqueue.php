<?php
/**
 * Enqueue scripts and styles.
 */

if ( ! function_exists( 'erlebnisbad_enqueue_fonts' ) ) :
	/**
	 * Enqueues web fonts based on the provider configured in functions.php.
	 * Supports 'google', 'adobe' (Typekit), or 'none'.
	 */
	function erlebnisbad_enqueue_fonts() {
		$provider = defined( 'erlebnisbad_FONT_PROVIDER' ) ? erlebnisbad_FONT_PROVIDER : 'none';

		if ( 'adobe' === $provider && defined( 'erlebnisbad_ADOBE_FONTS_ID' ) && erlebnisbad_ADOBE_FONTS_ID ) {
			wp_enqueue_style(
				'erlebnisbad-fonts',
				'https://use.typekit.net/' . erlebnisbad_ADOBE_FONTS_ID . '.css',
				array(),
				null
			);
		}
	}
endif;

add_action( 'wp_enqueue_scripts', 'erlebnisbad_enqueue_fonts' );

if ( ! function_exists( 'erlebnisbad_font_resource_hints' ) ) :
	/**
	 * Adds preconnect resource hints for the configured font provider
	 * via the native WordPress resource hints API.
	 *
	 * @param array  $urls          Resource hint URLs.
	 * @param string $relation_type Hint type (preconnect, dns-prefetch, etc.).
	 * @return array
	 */
	function erlebnisbad_font_resource_hints( $urls, $relation_type ) {
		if ( 'preconnect' !== $relation_type ) {
			return $urls;
		}

		$provider = defined( 'erlebnisbad_FONT_PROVIDER' ) ? erlebnisbad_FONT_PROVIDER : 'none';

		if ( 'google' === $provider ) {
			$urls[] = 'https://fonts.googleapis.com';
			$urls[] = array( 'href' => 'https://fonts.gstatic.com', 'crossorigin' => 'crossorigin' );
		}

		if ( 'adobe' === $provider ) {
			$urls[] = array( 'href' => 'https://use.typekit.net', 'crossorigin' => 'crossorigin' );
		}

		return $urls;
	}
endif;

add_filter( 'wp_resource_hints', 'erlebnisbad_font_resource_hints', 10, 2 );

if ( ! function_exists( 'erlebnisbad_enqueue_google_maps' ) ) :
	/**
	 * Enqueues Google Maps API and init script on specific page templates.
	 * Requires erlebnisbad_GOOGLE_MAPS_API_KEY to be set in functions.php.
	 * Add page templates to $templates as needed per project.
	 */
	function erlebnisbad_enqueue_google_maps() {
		if ( ! defined( 'erlebnisbad_GOOGLE_MAPS_API_KEY' ) || ! erlebnisbad_GOOGLE_MAPS_API_KEY ) {
			return;
		}

		$templates = array(
			'page-templates/page-arrival-contact.php',
		);

		if ( empty( $templates ) || ! is_page_template( $templates ) ) {
			return;
		}

		$theme_version = wp_get_theme()->get( 'Version' );

		wp_enqueue_script(
			'erlebnisbad-google-maps-init',
			get_theme_file_uri( '/assets/js/google-maps.js' ),
			array(),
			$theme_version,
			true
		);

		wp_enqueue_script(
			'erlebnisbad-google-maps-api',
			add_query_arg(
				array(
					'key'      => erlebnisbad_GOOGLE_MAPS_API_KEY,
					'callback' => 'initMap',
					'loading'  => 'async',
				),
				'https://maps.googleapis.com/maps/api/js'
			),
			array( 'erlebnisbad-google-maps-init' ),
			null,
			true
		);
	}
endif;

add_action( 'wp_enqueue_scripts', 'erlebnisbad_enqueue_google_maps' );


if ( ! function_exists( 'erlebnisbad_enqueue_feratel_widget' ) ) :
	/**
	 * Enqueues the feratel/Deskline experience widget on the Tickets page template.
	 *
	 * Loads the async widget loader and prepends its inline configuration. The
	 * widget language follows the active WPML language when available.
	 *
	 * @return void
	 */
	function erlebnisbad_enqueue_feratel_widget() {
		if ( ! is_page_template( 'page-templates/page-tickets.php' ) ) {
			return;
		}

		// WPML-aware language; falls back to site locale, then "de"
		$lang = defined( 'ICL_LANGUAGE_CODE' ) ? ICL_LANGUAGE_CODE : substr( get_locale(), 0, 2 );
		$lang = $lang ? $lang : 'de';

		$widget_id = '6c270a38-b1b9-4d78-82d8-4b63559fb495';

		wp_enqueue_script(
			'feratel-widget',
			'https://web5.deskline.net/start/ACCOLENK/' . $widget_id . '/index.js',
			array(),
			null,
			array( 'in_footer' => true, 'strategy' => 'async' )
		);

		// Config must run before the loader; the dw.q queue makes the order safe.
		$config = sprintf(
			'window.dw = window.dw || function () { (dw.q = dw.q || []).push(arguments); };' .
			'dw("settings", %s, { lang: %s, target: "tickets-widget", profileOverrides: ["teaser=false"],' .
			' context: { targetRoute: [' .
			'"/experiences/GRI/ef9a6c35-12a2-44b7-bf0a-067289badef0",' .
			'"/erlebnisse/GRI/ef9a6c35-12a2-44b7-bf0a-067289badef0",' .
			'"/esperienze/GRI/ef9a6c35-12a2-44b7-bf0a-067289badef0" ] } });',
			wp_json_encode( $widget_id ),
			wp_json_encode( $lang )
		);

		wp_add_inline_script( 'feratel-widget', $config, 'before' );
	}
	add_action( 'wp_enqueue_scripts', 'erlebnisbad_enqueue_feratel_widget' );
endif;

/**
 * Registers and enqueues the theme's main CSS and JS.
 */
function erlebnisbad_enqueue_assets() {

	// Get the theme data.
	$the_theme     = wp_get_theme();
	$theme_version = $the_theme->get( 'Version' );

	// Enqueue theme stylesheet.
	wp_enqueue_style(
		'theme-styles',
		get_theme_file_uri( '/dist/css/main.css' ),
		array(),
		$theme_version
	);

	wp_enqueue_script(
		'theme-scripts',
		get_theme_file_uri( '/dist/js/main.js' ),
		array( 'jquery' ),
		$theme_version,
		true
	);
}

add_action( 'wp_enqueue_scripts', 'erlebnisbad_enqueue_assets' );
