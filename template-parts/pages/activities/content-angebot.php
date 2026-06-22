<?php
/**
 * Content Section in the Activities Page Template.
 *
 * @package erlebnisbad
 * @subpackage Section
 * @since 1.0.0
 */

$angebot_query = new WP_Query(
	array(
		'post_type'      => 'angebot',
		'posts_per_page' => -1,
		'post_status'    => 'publish',
		'orderby'        => 'menu_order',
		'order'          => 'ASC',
	)
);

if ( ! $angebot_query->have_posts() ) {
	return;
}

do_action( 'wpml_register_single_string', 'erlebnisbad', 'anchor_angebot', 'angebot' );
$section_anchor = apply_filters( 'wpml_translate_single_string', 'angebot', 'erlebnisbad', 'anchor_angebot' );
?>
<?php /* Posts-slider gallery commented out on request. Remove this wrapper to re-enable.
<section id="<?php echo esc_attr( $section_anchor ); ?>" class="posts-slider">

	<div class="theme-container">
		<div class="theme-grid posts-slider__header">
			<div class="col-span-2 md:col-span-3 xl:col-span-3 xl:col-start-2">
				<h2 class="title-main pb-7 md:pb-0"><?php the_field( 'cards_content_angebot_title' ); ?></h2>
			</div>
			<div class="col-span-2 md:col-span-3 xl:col-span-4 flex items-end">
				<p><?php the_field( 'cards_content_angebot_text' ); ?></p>
			</div>
		</div>
	</div>

	<div class="posts-slider__bleed">
		<div class="swiper posts-slider__swiper">
			<div class="swiper-wrapper">
				<?php
				while ( $angebot_query->have_posts() ) :
					$angebot_query->the_post();
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
			<button class="swiper-button-prev posts-slider__prev" aria-label="<?php esc_attr_e( 'Previous', 'erlebnisbad' ); ?>">
				<?php echo erlebnisbad_get_svg( 'arrow-left' ); ?>
			</button>
			<button class="swiper-button-next posts-slider__next" aria-label="<?php esc_attr_e( 'Next', 'erlebnisbad' ); ?>">
				<?php echo erlebnisbad_get_svg( 'arrow-right' ); ?>
			</button>
		</div>
	</div>

</section>
*/ ?>
