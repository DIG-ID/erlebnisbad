<?php
/**
 * Hero Section in the Home Page Template.
 *
 * @package erlebnisbad
 * @subpackage Section
 * @since 1.0.0
 */

?>
<?php
$img_id  = get_field( 'hero_background_image' );
$img_url = $img_id ? wp_get_attachment_image_url( $img_id, 'full' ) : '';
?>
<section class="section-hero min-h-[752px] md:min-h-[1000px]"<?php echo $img_url ? ' style="--hero-bg: url(' . esc_url( $img_url ) . ');"' : ''; ?>>
  <div class="theme-container pt-[478px] md:pt-[479px] xl:pt-[620px]">
    <div class="theme-grid">
      <div class="col-start-1 col-span-2 md:col-span-4 xl:col-span-6">
        <p class="overline-hero text-white pb-3 md:pb-11 xl:pb-4"><?php the_field( 'hero_overtitle' ); ?></p>
      </div>
      <div class="col-start-1 col-span-2 md:col-start-1 md:col-span-2 xl:col-start-11 xl:pl-12 order-2 xl:order-none mb-10 md:mb-0">
        <?php
        $hero_button = get_field( 'hero_button' );
        if ( $hero_button ) :
            $link_url    = $hero_button['url'];
            $link_title  = $hero_button['title'];
            $link_target = $hero_button['target'] ? $hero_button['target'] : '_self';
            ?>
            <a class="btn btn-primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
        <?php endif; ?>
      </div>
      <div class="col-start-1 col-span-2 md:col-span-6 xl:col-span-11 mb-[44px] md:mb-20 xl:mb-24">
        <h1 class="title-big text-white"><?php the_field( 'hero_title' ); ?></h1>
      </div>
    </div>
  </div>
</section>
