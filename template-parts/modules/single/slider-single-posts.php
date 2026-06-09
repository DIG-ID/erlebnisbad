<?php
/**
 * Module: Slider Single Posts
 *
 * @package erlebnisbad
 * @subpackage Template
 * @since 1.0.0
 */

$gallery_images = get_field( 'gallery_images' );
if ( empty( $gallery_images ) ) {
	return;
}
?>
<section id="slider-posts" class="slider-posts py-12 md:py-16 xl:pb-0 xl:pt-28">
	<div class="theme-container">
		<div class="theme-grid items-stretch">

			<div class="slider-posts__main-wrap col-span-2 md:col-span-5 xl:col-start-2 xl:col-span-9">
				<div class="swiper slider-posts__main">
					<div class="swiper-wrapper">
						<?php foreach ( $gallery_images as $image_id ) : ?>
							<div class="swiper-slide slider-posts__slide">
								<?php
								echo wp_get_attachment_image(
									$image_id,
									'full',
									false,
									array(
										'class'   => 'slider-posts__image',
									)
								);
								?>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>

			<div class="slider-posts__thumbs-wrap hidden md:block md:col-span-1 xl:col-span-1">
				<div class="swiper slider-posts__thumbs">
					<div class="swiper-wrapper">
						<?php foreach ( $gallery_images as $image_id ) : ?>
							<div class="swiper-slide slider-posts__thumb-slide">
								<?php
								echo wp_get_attachment_image(
									$image_id,
									'medium',
									false,
									array(
										'class'        => 'slider-posts__thumb-image',
										'aria-hidden'  => 'true',
									)
								);
								?>
							</div>
						<?php endforeach; ?>
					</div>
				</div>

			</div>

		</div>

		<div class="slider-posts__mobile-nav">
			<button class="swiper-button-prev slider-posts__prev" aria-label="<?php esc_attr_e( 'Previous', 'erlebnisbad' ); ?>">
				<?php echo erlebnisbad_get_svg( 'arrow-left' ); ?>
			</button>
			<button class="swiper-button-next slider-posts__next" aria-label="<?php esc_attr_e( 'Next', 'erlebnisbad' ); ?>">
				<?php echo erlebnisbad_get_svg( 'arrow-right' ); ?>
			</button>
		</div>
	</div>
</section>
