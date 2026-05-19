<?php
/**
 * Module: Slider Single Posts
 * Displays a gallery slider with main image and vertical thumbnails column.
 * Images sourced from the 'gallery_images' ACF field.
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
<section class="slider-posts">
	<div class="theme-container">
		<div class="theme-grid items-stretch">

			<div class="slider-posts__main-wrap col-span-2 md:col-span-6 xl:col-start-2 xl:col-span-8">
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

			<div class="slider-posts__thumbs-wrap hidden xl:block xl:col-span-1">
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
	</div>
</section>
