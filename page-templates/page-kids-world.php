<?php
/**
 *
 * Template Name: Kids World Template
 *
 * @package erlebnisbad
 * @subpackage Template
 * @since 1.0.0
 */

get_header();
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		do_action( 'before_main_content' );
			get_template_part( 'template-parts/modules/hero' );
			get_template_part( 'template-parts/modules/intro' );
			get_template_part( 'template-parts/pages/kids-world/features' );		
			get_template_part( 'template-parts/modules/spotlights' );
			get_template_part( 'template-parts/modules/opening-hours' );				
		do_action( 'after_main_content' );
	endwhile;
endif;
get_footer();
