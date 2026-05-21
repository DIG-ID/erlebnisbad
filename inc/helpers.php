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
