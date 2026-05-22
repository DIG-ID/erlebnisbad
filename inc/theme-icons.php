<?php
/**
 * Template tags and reusable output functions.
 */


/**
 * Outputs responsive wave separator SVGs.
 *
 * @param int    $variant     Wave variant: 1 or 2.
 * @param string $color_class Tailwind stroke colour class. Default 'stroke-Mint1'.
 */
function erlebnisbad_icons(  string $icon_name = 'stroke-Mint1' ): void {
	$name  = esc_attr( $icon_name );

	if ( 2 === $variant ) {
		?>

		<?php
	} else {
		?>

		<?php
	}
}

add_action( 'wave_separator', 'erlebnisbad_wave_separator', 10, 2 );