<?php
/**
 * The Single Page Template for the Single Post Type Besonderes Erlebnis.
 *
 * @package erlebnisbad
 * @subpackage Template
 * @since 1.0.0
 */

get_header();
if ( have_posts() ) :
	the_post();
	do_action( 'before_main_content' );
		get_template_part( 'template-parts/modules/hero' );
		get_template_part( 'template-parts/modules/single/slider-single-posts' );
		get_template_part( 'template-parts/modules/single/intro-text' );
		get_template_part( 'template-parts/modules/single/tabs-single-posts' );
		get_template_part( 'template-parts/modules/single/related-posts' );
	do_action( 'after_main_content' );
endif;
get_footer();
