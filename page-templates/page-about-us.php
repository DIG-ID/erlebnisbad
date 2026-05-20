<?php
/**
 *
 * Template Name: About UsPage Template
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
      get_template_part( 'template-parts/pages/about-us/intro' );	
      get_template_part( 'template-parts/pages/about-us/content' );
      get_template_part( 'template-parts/pages/about-us/team' );
		do_action( 'after_main_content' );
	endwhile;
endif;
get_footer();