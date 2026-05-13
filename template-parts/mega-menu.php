<?php
/**
 * Mega Menu — full-screen panel, right half of viewport.
 * Triggered by .header-main__burger and .header-sticky__burger.
 *
 * @package erlebnisbad
 * @subpackage Section
 * @since 1.0.0
 */

$tickets_link = get_field( 'general_tickets_btn', 'option' );
?>

<div id="mega-menu" class="mega-menu" aria-hidden="true" role="dialog" aria-modal="true" aria-label="<?php esc_attr_e( 'Navigation menu', 'erlebnisbad' ); ?>">

	<!-- Wave -->
	<span class="mega-menu__wave" aria-hidden="true">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 150 821" preserveAspectRatio="none" fill="none">
			<path d="M18.6373 543.246C-4.68659 630.878 8.91017 736.662 30.598 770.182C57.0716 811.1 79.0554 821 150 821L150 0C150 0 65.5608 0 30.5978 29.699C-4.30424 59.3461 -6.31408 177.937 9.41603 259.234C25.1461 340.531 41.9611 455.614 18.6373 543.246Z" fill="#66C2B0"/>
		</svg>
	</span>

	<div class="mega-menu__inner">

		<!-- Top bar: language selector + close button -->
		<div class="mega-menu__topbar">

			<div class="language-selector">
				<?php do_action( 'wpml_add_language_selector' ); ?>
			</div>

			<button	class="mega-menu__close" type="button" aria-label="<?php esc_attr_e( 'Close menu', 'erlebnisbad' ); ?>">
				<svg width="20" height="22" viewBox="0 0 24 24" fill="none" aria-hidden="true">
					<line x1="4" y1="4" x2="20" y2="20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
					<line x1="20" y1="4" x2="4" y2="20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
				</svg>
			</button>

		</div><!-- .mega-menu__topbar -->

		<!-- Columns -->
		<div class="mega-menu__cols">

			<div class="mega-menu__col mega-menu__col--primary">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'mega-menu-left',
						'container'      => false,
						'menu_class'     => 'mega-menu__list',
						'fallback_cb'    => false,
						'depth'          => 1,
					)
				);
				?>
			</div>

			<div class="mega-menu__col mega-menu__col--secondary">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'mega-menu-right',
						'container'      => false,
						'menu_class'     => 'mega-menu__list mega-menu__list--secondary',
						'fallback_cb'    => false,
						'depth'          => 1,
					)
				);
				?>

				<?php if ( $tickets_link ) : ?>
					<a class="btn btn-primary mega-menu__cta" href="<?php echo esc_url( $tickets_link['url'] ); ?>" target="<?php echo esc_attr( $tickets_link['target'] ? $tickets_link['target'] : '_self' ); ?>">
						<?php echo esc_html( $tickets_link['title'] ); ?>
					</a>
				<?php endif; ?>
			</div>

		</div><!-- .mega-menu__cols -->

	</div><!-- .mega-menu__inner -->

</div><!-- #mega-menu -->

<div id="mega-menu-overlay" class="mega-menu-overlay" aria-hidden="true"></div>
