<?php
/**
 *
 * Template Name: Home Template
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
			get_template_part( 'template-parts/pages/home/intro' );
			?><div class="panels-container"><?php
				get_template_part( 'template-parts/pages/home/waterpark' );
				get_template_part( 'template-parts/pages/home/wellness' );
				get_template_part( 'template-parts/pages/home/kids-family' );
			?></div><?php
			get_template_part( 'template-parts/pages/home/opening-hours');
			do_action( 'wave_separator' );
			get_template_part( 'template-parts/pages/home/courses-activities' );
			do_action( 'wave_separator', 2 );
			get_template_part( 'template-parts/pages/home/our-highlights' );
			get_template_part( 'template-parts/pages/home/bistro' );
			get_template_part( 'template-parts/pages/home/partners' );
		do_action( 'after_main_content' );
	endwhile;
endif;
get_footer();
