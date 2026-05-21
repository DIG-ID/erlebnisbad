<?php
/**
 * The Section for the Footer Default Template.
 *
 * @package erlebnisbad
 * @subpackage Section
 * @since 1.0.0
 */

$footer_bg_id             = get_field( 'general_footer_image', 'option' );
$footer_bg_responsive_id  = get_field( 'general_footer_image_responsive', 'option' );
?>

<footer class="footer-main relative">


	<figure class="footer-main__figure h-full min-h-[463px] md:min-h-[1003px] xl:min-h-[1007px]">
		<picture class="footer-main__picture w-full h-full object-cover">

			<source
				media="(max-width: 1024px)"
				srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( $footer_bg_responsive_id, 'full' ) ); ?>"
				sizes="100vw"
			>

			<?php
			echo wp_get_attachment_image(
				$footer_bg_id,
				'full',
				false,
				array(
					'class' => 'w-full h-auto object-cover',
				)
			);
			?>
		</picture>
	</figure>


<div class="theme-container-mobile-fluid bg-transparent md:absolute bottom-0 left-0 right-0">
	<div class="theme-grid bg-white pt-14 xl:pt-20 pb-24 md:pb-16 xl:pb-56 rounded-t-2xl md:px-9 xl:px-0">
		<div class="col-start-1 xl:col-start-2 col-span-2 md:col-span-3 xl:col-span-3 px-8 md:px-0 pb-14 xl:pb-0">
			<?php
			$footer_logo_id = get_field( 'general_theme_logo_footer','option' );
			if ( $footer_logo_id ) :
				echo wp_get_attachment_image(
					$footer_logo_id,
					'full',
					false,
					array(
						'class' => 'w-full h-auto object-cover max-w-72 mx-auto md:mx-0',
					)
				);
			endif;
			?>
		</div>
		<div class="footer-cols col-start-1 xl:col-start-2 col-span-2 md:col-span-3 xl:col-span-3 px-8 md:px-0 pb-14 xl:pb-0 block xl:hidden">
			<div class="footer-menu__list-4 md:gap-[4.5rem] grid grid-cols-2 md:flex">
				<p class="footer-item__title mb-6 col-span-1"><?php esc_html_e( 'Kontakt', 'erlebnisbad' ); ?></p>
				<div class="contact-wrapper flex flex-col col-span-1">
					<a href="mailto:<?php the_field( 'general_email','option' ); ?>" class="footer-item__text mb-6"><?php the_field( 'general_email','option' ); ?></a>
					<a href="tel:<?php the_field( 'general_phone','option' ); ?>" class="footer-item__text mb-6"><?php the_field( 'general_phone','option' ); ?></a>
					<?php do_action( 'socials' ); ?>
				</div>
			</div>
		</div>

		<div class="footer-cols col-span-2 md:col-span-6 xl:col-span-7 grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 xl:gap-8 px-8 md:px-0 text-left">

			<div class="col-span-2 md:col-span-1 pb-8 md:pb-0">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer-menu-1',
						'container'      => false,
						'fallback_cb'    => false,
						'depth'          => 1,
						'menu_class'     => 'footer-menu__list-1 grid grid-cols-2 md:block',
					)
				);
				?>
			</div>

			<div>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer-menu-2',
						'container'      => false,
						'fallback_cb'    => false,
						'depth'          => 1,
						'menu_class'     => 'footer-menu__list-2',
					)
				);
				?>
			</div>

			<div>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer-menu-3',
						'container'      => false,
						'fallback_cb'    => false,
						'depth'          => 1,
						'menu_class'     => 'footer-menu__list-3',
					)
				);
				?>
			</div>

			<div class="footer-menu__list-4 hidden xl:block">
				<p class="footer-item__title mb-6"><?php esc_html_e( 'Kontakt', 'erlebnisbad' ); ?></p>
				<a href="mailto:<?php the_field( 'general_email','option' ); ?>" class="footer-item__text mb-6"><?php the_field( 'general_email','option' ); ?></a>
				<a href="tel:<?php the_field( 'general_phone','option' ); ?>" class="footer-item__text mb-6"><?php the_field( 'general_phone','option' ); ?></a>
				<?php do_action( 'socials' ); ?>
			</div>

		</div>
	</div><!-- grid -->
	<div class="theme-grid bg-Mint py-4 xl:py-5">
		<div class="col-start-1 xl:col-start-2 col-span-2 md:col-span-2 xl:col-span-3 order-2 md:order-1">
			<div class="p-wrapper flex items-end justify-center md:justify-normal h-full pb-1">
				<p class="font-raleway text-xs font-semibold tracking-[-0.015rem] pl-9 xl:pl-0"><?php esc_html_e( '©2026 Erlebnisbad. Alle Rechte vorbehalten', 'erlebnisbad'); ?></p>
			</div>
		</div>
		<div class="col-span-2 md:col-span-4 xl:col-span-7 order-1 md:order-2 pb-6 md:pb-0">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'footer-copyright-menu',
					'container'      => false,
					'fallback_cb'    => false,
					'depth'          => 1,
					'menu_class'     => 'footer-copyright__menu',
				)
			);
			?>
		</div>
	</div><!-- grid -->
</div><!-- container -->
</footer>
