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
      <?php
      // Tailwind needs the full class string at build time, so we map ACF values to literals.
      $title_col_span_map = array(
          '6'  => 'xl:col-span-6',
          '7'  => 'xl:col-span-7',
          '8'  => 'xl:col-span-8',
          '9'  => 'xl:col-span-9',
          '10' => 'xl:col-span-10',
          '11' => 'xl:col-span-11',
          '12' => 'xl:col-span-12',
      );
      $title_col_span_key = get_field( 'hero_title_column_span' );
      $title_col_span     = isset( $title_col_span_map[ $title_col_span_key ] ) ? $title_col_span_map[ $title_col_span_key ] : 'xl:col-span-11';
      ?>
      <div class="col-start-1 col-span-2 md:col-span-6 <?php echo esc_attr( $title_col_span ); ?> mb-[44px] md:mb-20 xl:mb-24">
        <h1 class="title-big text-white"><?php the_field( 'hero_title' ); ?></h1>
      </div>
    </div>
  </div>
</section>
