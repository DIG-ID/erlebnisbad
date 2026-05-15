<?php
/**
 * The Single Page Template for the Single Post Type Besonderes Erlebnis.
 *
 * @package erlebnisbad
 * @subpackage Template
 * @since 1.0.0
 */

get_header();
	do_action( 'before_main_content' );
    get_template_part( 'template-parts/modules/hero' );
  do_action( 'after_main_content' );
get_footer();