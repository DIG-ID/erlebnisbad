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
  <div class="theme-grid bg-white xl:pt-20 xl:pb-56 rounded-t-2xl">
    <div class="col-start-1 xl:col-start-2 col-span-2 md:col-span-3 xl:col-span-3">
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
    <div class="col-span-2 md:col-span-6 xl:col-span-7">

    </div>
  </div>
</div>
</footer>
