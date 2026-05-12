<?php
/**
 * The Section for the Header Template.
 *
 * @package erlebnisbad
 * @subpackage Section
 * @since 1.0.0
 */

$logo_light_id = get_field( 'general_theme_logo', 'option' );
$logo_dark_id  = get_field( 'general_theme_logo_dark', 'option' );
$tickets_link  = get_field( 'general_tickets_url', 'option' );
?>

<!-- Main header  -->
<header id="header-main" class="header-main" itemscope itemtype="http://schema.org/WebSite">

	<div class="header-main__inner">

    <div class="header-main__logo-nav">
      <!-- Logo (light / white version) -->
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="header-main__logo" itemprop="url" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
        <?php if ( $logo_light_id ) : ?>
          <?php echo wp_get_attachment_image( $logo_light_id, 'full', false, array( 'class' => 'header-main__logo-img', 'loading' => 'eager', 'itemprop' => 'image' ) ); ?>
        <?php else : ?>
          <span class="header-main__logo-text"><?php bloginfo( 'name' ); ?></span>
        <?php endif; ?>
      </a>

      <!-- Main Navigation -->
      <nav class="header-main__nav" aria-label="<?php esc_attr_e( 'Main navigation', 'erlebnisbad' ); ?>">
        <?php
        wp_nav_menu(
          array(
            'theme_location' => 'main-menu',
            'container'      => false,
            'menu_class'     => 'header-main__menu',
            'fallback_cb'    => false,
            'depth'          => 1,
          )
        );
        ?>
      </nav>
    </div>

		<div class="header-main__actions">

			<!-- WPML Language Switcher -->
			<div class="language-selector">
				<?php do_action( 'wpml_add_language_selector' ); ?>
			</div>

			<!-- Burger / mega-menu trigger -->
			<button
				class="header-main__burger"
				aria-expanded="false"
				aria-controls="mega-menu"
				aria-label="<?php esc_attr_e( 'Open menu', 'erlebnisbad' ); ?>"
				type="button"
			>
				<span class="header-main__burger-icon" aria-hidden="true">
					<span></span>
					<span></span>
					<span></span>
				</span>
			</button>

		</div>

	</div><!-- .header-main__inner -->

</header><!-- #header-main -->

<!-- Sticky header  -->
<div id="header-sticky" class="header-sticky" aria-hidden="true">

	<div class="header-sticky__inner">

		<!-- Logo (dark version) -->
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="header-sticky__logo" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
			<?php if ( $logo_dark_id ) : ?>
				<?php echo wp_get_attachment_image( $logo_dark_id, 'full', false, array( 'class' => 'header-sticky__logo-img', 'loading' => 'lazy' ) ); ?>
			<?php else : ?>
				<span class="header-sticky__logo-text"><?php bloginfo( 'name' ); ?></span>
			<?php endif; ?>
		</a>

		<!-- Main Navigation -->
		<nav class="header-sticky__nav" aria-label="<?php esc_attr_e( 'Main navigation', 'erlebnisbad' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'main-menu',
					'container'      => false,
					'menu_class'     => 'header-sticky__menu',
					'fallback_cb'    => false,
					'depth'          => 1,
				)
			);
			?>
		</nav>

    <!-- Tickets CTA -->
    <?php if ( $tickets_link ) : ?>
      <div class="header-sticky__cta-wrapper hidden 2xl:block">
        <a
          class="btn btn-primary header-sticky__cta"
          href="<?php echo esc_url( $tickets_link['url'] ); ?>"
          target="<?php echo esc_attr( $tickets_link['target'] ? $tickets_link['target'] : '_self' ); ?>"
        >
          <?php echo esc_html( $tickets_link['title'] ); ?>
        </a>
      </div>
    <?php endif; ?>

    <div class="header-sticky__actions">
      <!-- WPML Language Switcher -->
      <div class="language-selector language-selector--dark">
        <?php do_action( 'wpml_add_language_selector' ); ?>
      </div>

      <!-- Burger / mega-menu trigger -->
      <button
        class="header-sticky__burger"
        aria-expanded="false"
        aria-controls="mega-menu"
        aria-label="<?php esc_attr_e( 'Open menu', 'erlebnisbad' ); ?>"
        type="button"
      >
        <span class="header-sticky__burger-icon" aria-hidden="true">
          <span></span>
          <span></span>
          <span></span>
        </span>
      </button>
    
    </div>

	</div><!-- .header-sticky__inner -->

</div><!-- #header-sticky -->

<?php get_template_part( 'template-parts/mega', 'menu' ); ?>
