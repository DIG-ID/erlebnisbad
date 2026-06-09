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
<article class="post-card">

	<div class="post-card__image-wrap">
		<span class="post-card__image-bg" aria-hidden="true">
			<svg xmlns="http://www.w3.org/2000/svg" width="118" height="126" viewBox="0 0 118 126"><path d="M3.95608 77.1765C1.27577 85.2199 -2.66781 91.2894 2.59018 99.9643C18.92 119.371 71.5651 136.383 90.7109 118.372C100.785 106.802 105.593 91.1489 112.969 77.6228C117.26 68.9474 119.334 63.1506 114.538 53.5059C108.504 42.7142 104.187 30.4337 96.3169 20.9159C92.4348 17.0524 86.9494 16.6196 82.2106 14.7071C74.6187 11.9886 71.7957 2.57819 64.2063 0.184814C45.5263 -2.71974 6.8196 29.2129 1.15763 47.4112C-2.97407 61.2113 8.18631 63.8586 3.9573 77.1793L3.95608 77.1765Z" fill="#A1DBD0"/></svg>
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
			<?php esc_html_e( 'Mehr Erfahren', 'erlebnisbad' ); ?>
		</a>
	</div>

</article>
