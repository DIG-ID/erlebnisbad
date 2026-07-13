<?php
/**
 * General-purpose helper functions.
 */

/**
 * Allow display:flex/grid in wp_kses inline styles (stripped by default).
 *
 * @param string[] $styles Allowed CSS properties.
 * @return string[]
 */
add_filter(
	'safe_style_css',
	function ( $styles ) {
		$styles[] = 'display';
		$styles[] = 'flex-shrink';
		$styles[] = 'gap';
		return $styles;
	}
);

/**
 * Returns a cache-busting version string for a compiled asset.
 *
 * Reads the Laravel Mix manifest (`dist/mix-manifest.json`) and extracts the
 * hash appended to the requested file (e.g. `?id=abc123`). Falls back to the
 * theme version if the manifest or entry is missing, so enqueues never break.
 *
 * @param string $path Asset path relative to `dist/`, e.g. `/css/main.css`.
 * @return string Version string for use as the wp_enqueue_* $ver argument.
 */
function erlebnisbad_asset_version( string $path ): string {
	$fallback = (string) wp_get_theme()->get( 'Version' );

	$manifest_path = get_theme_file_path( '/dist/mix-manifest.json' );
	if ( ! file_exists( $manifest_path ) ) {
		return $fallback;
	}

	$manifest = json_decode( (string) file_get_contents( $manifest_path ), true ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
	if ( empty( $manifest[ $path ] ) ) {
		return $fallback;
	}

	// Manifest values look like "/css/main.css?id=<hash>" — return the hash.
	$query = wp_parse_url( $manifest[ $path ], PHP_URL_QUERY );
	if ( $query ) {
		parse_str( $query, $params );
		if ( ! empty( $params['id'] ) ) {
			return $params['id'];
		}
	}

	return $fallback;
}

/**
 * Outputs one or more values to the browser console.
 * For development/debugging only — remove calls before going to production.
 *
 * @param mixed ...$data Values to log.
 */
function erlebnisbad_console_log( ...$data ) {
	$json = wp_json_encode( $data );
	add_action(
		'shutdown',
		function () use ( $json ) {
			echo "<script>console.log({$json})</script>"; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	);
}
