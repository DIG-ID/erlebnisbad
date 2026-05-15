<?php
/**
 * The Archive Template for the Custom Post Type Besonderes Erlebnis.
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