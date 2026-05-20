<?php
/**
 * Related Posts Slider — shows other posts of the same post type.
 *
 * @package erlebnisbad
 * @subpackage Module
 * @since 1.0.0
 */

$related_query = new WP_Query(
	array(
		'post_type'      => get_post_type(),
		'posts_per_page' => -1,
		'post_status'    => 'publish',
		'orderby'        => 'menu_order',
		'order'          => 'ASC',
		'post__not_in'   => array( get_the_ID() ),
	)
);

if ( ! $related_query->have_posts() ) {
	return;
}
?>
<section id="related-posts" class="posts-slider !pt-0 pb-16 md:pb-48">

	<div class="theme-container">
		<div class="theme-grid posts-slider__header">
			<div class="col-span-2 md:col-span-4 xl:col-span-4 xl:col-start-2">
				<h2 class="title-main"><?php esc_html_e( 'Das könnte Sie auch interessieren', 'erlebnisbad' ); ?></h2>
			</div>
		</div>
	</div>

	<div class="posts-slider__bleed">
		<div class="swiper posts-slider__swiper">
			<div class="swiper-wrapper">
				<?php
				while ( $related_query->have_posts() ) :
					$related_query->the_post();
					?>
					<div class="swiper-slide posts-slider__slide">
						<?php
						get_template_part(
							'template-parts/modules/card-post',
							null,
							array(
								'image_id'    => get_field( 'teaser_card_image' ),
								'title'       => get_field( 'teaser_card_title' ) ?: get_the_title(),
								'description' => get_field( 'teaser_card_small_description' ),
								'link'        => get_permalink(),
							)
						);
						?>
					</div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>

		<div class="posts-slider__nav">
			<button class="swiper-button-prev posts-slider__prev" aria-label="<?php esc_attr_e( 'Previous', 'digid' ); ?>">
				<?php echo erlebnisbad_get_svg( 'arrow-left' ); ?>
			</button>
			<button class="swiper-button-next posts-slider__next" aria-label="<?php esc_attr_e( 'Next', 'digid' ); ?>">
				<?php echo erlebnisbad_get_svg( 'arrow-right' ); ?>
			</button>
		</div>
	</div>

</section>
