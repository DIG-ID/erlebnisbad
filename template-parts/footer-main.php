<?php
/**
 * The Section for the Footer Default Template.
 *
 * @package erlebnisbad
 * @subpackage Section
 * @since 1.0.0
 */

?>

<footer class="footer-main relative">
<?php
$footer_bg_id = get_field( 'general_footer_image','option' );
if ( $footer_bg_id ) :
  echo wp_get_attachment_image(
    $footer_bg_id,
    'full',
    false,
    array(
      'class' => 'w-full h-auto object-cover',
    )
  );
endif;
?>
<div class="theme-container bg-transparent absolute bottom-0 left-0 right-0">
  <div class="theme-grid bg-white pt-14 xl:pt-20 pb-24 md:pb-16 xl:pb-56 rounded-t-2xl md:px-9 xl:px-0">
    <div class="col-start-1 xl:col-start-2 col-span-2 md:col-span-3 xl:col-span-3 pb-14 xl:pb-0">
      <?php
      $footer_logo_id = get_field( 'general_theme_logo_footer','option' );
      if ( $footer_logo_id ) :
        echo wp_get_attachment_image(
          $footer_logo_id,
          'full',
          false,
          array(
            'class' => 'w-full h-auto object-cover max-w-72',
          )
        );
      endif;
      ?>
    </div>
    <div class="col-start-1 xl:col-start-2 col-span-2 md:col-span-3 xl:col-span-3 pb-14 xl:pb-0 block xl:hidden">
      <div class="footer-menu__list-4 hidden xl:block">
        <p class="footer-item__title mb-6"><?php esc_html_e( 'Kontakt', 'erlebnisbad' ); ?></p>
        <a href="mailto:<?php the_field( 'general_email','option' ); ?>" class="footer-item__text mb-6"><?php the_field( 'general_email','option' ); ?></a>
        <a href="tel:<?php the_field( 'general_phone','option' ); ?>" class="footer-item__text mb-6"><?php the_field( 'general_phone','option' ); ?></a>
        <?php do_action( 'socials' ); ?>
      </div>
    </div>
    <div class="col-span-2 md:col-span-6 xl:col-span-7">

      <div class="footer-cols grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-8 text-left">

        <div>
          <?php
          wp_nav_menu(
            array(
              'theme_location' => 'footer-menu-1',
              'container'      => false,
              'fallback_cb'    => false,
              'depth'          => 1,
              'menu_class'     => 'footer-menu__list-1',
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

    </div>
  </div><!-- grid -->
  <div class="theme-grid bg-Mint py-4 xl:py-5">
    <div class="col-start-1 xl:col-start-2 col-span-2 md:col-span-2 xl:col-span-3">
      <div class="p-wrapper flex items-end h-full pb-1">
        <p class="font-raleway text-xs font-semibold tracking-[-0.015rem]"><?php esc_html_e( '©2026 Erlebnisbad. Alle Rechte vorbehalten', 'erlebnisbad'); ?></p>
      </div>
    </div>
    <div class="col-span-2 md:col-span-4 xl:col-span-7">
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
