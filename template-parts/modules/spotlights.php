<?php
/**
 * Sportlights Section in the Pool-World Page Template.
 *
 * @package erlebnisbad
 * @subpackage Section
 * @since 1.0.0
 */

?>
<section id="section-spotlights" class="section-spotlights bg-Mint1 waves waves__top--color waves__bottom--color py-8 md:py-12 xl:py-16 spotlight-panel-container">
	<div class="theme-container">

		<div class="theme-grid grid-flow-row-dense spotlight-panel spotlight-panel--2 items-center">
			<div class="col-span-2 md:col-start-1 md:col-span-3 xl:col-start-2 xl:col-span-4">
				<?php $img_id = get_field( 'spotlight_image' );if ( $img_id ) :?>
				<figure class="shape-bg shape-bg__img shape-bg--5 before:bg-Mint2">
					<?php echo wp_get_attachment_image( $img_id, 'full' ); ?>
				</figure>
				<?php endif;?>
			</div>
			<div class="col-span-2 md:col-start-4 md:col-span-3 xl:col-start-7 xl:col-span-4">
				<h2 class="title-main text-Black pb-8"><?php the_field( 'spotlight_title' ); ?></h2>
				<p class="text-Black pb-8"><?php the_field( 'spotlight_text' ); ?></p>
				<?php
				$hero_button = get_field( 'hero_button' );
				if ( $hero_button ) :
					$link_url    = $hero_button['url'];
					$link_title  = $hero_button['title'];
					$link_target = $hero_button['target'] ? $hero_button['target'] : '_self';
					?>
					<div class="flex justify-center md:block">
						<a class="btn btn-primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
					</div>
				<?php endif; ?>
			</div>
		</div>

		<div class="theme-grid grid-flow-row-dense spotlight-panel spotlight-panel--2 items-center">
			<div class="col-span-2 md:col-start-1 md:col-span-3 xl:col-start-2 xl:col-span-5  xl:pl-16 order-2 md:order-none">
				<h2 class="title-main text-Black pb-8"><?php the_field( 'spotlight_title_2' ); ?></h2>
				<p class="text-Black pb-8 xl:max-w-[600px]"><?php the_field( 'spotlight_text_2' ); ?></p>
				<?php
				$hero_button = get_field( 'spotlight_button_2' );
				if ( $hero_button ) :
					$link_url    = $hero_button['url'];
					$link_title  = $hero_button['title'];
					$link_target = $hero_button['target'] ? $hero_button['target'] : '_self';
					?>
					<div class="flex justify-center md:block">
						<a class="btn btn-primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
					</div>
				<?php endif; ?>
			</div>
			<div class="col-span-2 md:col-start-4 md:col-span-3 xl:col-start-8 xl:col-span-4  order-1 md:order-none">
				<?php $img_id = get_field( 'spotlight_image_2' );if ( $img_id ) :?>
				<figure class="shape-bg shape-bg__img shape-bg--6 before:bg-Mint2">
					<?php echo wp_get_attachment_image( $img_id, 'full' ); ?>
				</figure>
				<?php endif;?>
			</div>
		</div>

	</div>
</section>
