<?php
/**
 * Module: Post Card
 * Reusable card component for CPT posts in sliders and grids.
 *
 * @package erlebnisbad
 * @subpackage Template
 * @since 1.0.0
 */

$image_id    = $args['image_id'] ?? null;
$title       = $args['title'] ?? '';
$description = $args['description'] ?? '';
$link        = $args['link'] ?? '#';
?>
<div class="post-card">

	<div class="post-card__image-wrap">
		<span class="post-card__image-bg" aria-hidden="true">
			<?php echo erlebnisbad_get_svg( 'card-image-bg' ); ?>
		</span>
		<?php if ( $image_id ) : ?>
			<?php
			echo wp_get_attachment_image(
				$image_id,
				'medium',
				false,
				array(
					'class'   => 'post-card__image',
				)
			);
			?>
		<?php endif; ?>
	</div>

	<div class="post-card__body">
		<?php if ( $title ) : ?>
			<h3 class="title-secondary text-white mb-4 !font-semibold post-card__title"><?php echo esc_html( $title ); ?></h3>
		<?php endif; ?>

		<?php if ( $description ) : ?>
			<p class="text-white mb-8 flex-1 post-card__text"><?php echo esc_html( $description ); ?></p>
		<?php endif; ?>

		<a class="btn btn-primary post-card__btn mx-auto" href="<?php echo esc_url( $link ); ?>">
			<?php esc_html_e( 'Mehr Erfahren', 'digid' ); ?>
		</a>
	</div>

</div>
