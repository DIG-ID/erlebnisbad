<?php
/**
 * Opening Hours Section in the Home Page Template.
 *
 * @package erlebnisbad
 * @subpackage Section
 * @since 1.0.0
 */
?>
<section id="section-opening-hours" class="section-opening-hours bg-white pt-48 xl:pt-32 pb-48 xl:pb-32">
  <div class="theme-container">
    <div class="theme-grid">
      <div class="col-span-2 md:col-span-6 xl:col-start-3 xl:col-span-8 pb-12 md:pb-14 xl:pb-16">
        <?php
        $img_id = get_field( 'opening_hours_image' );
        if ( $img_id ) :
          ?>
            <?php
            echo wp_get_attachment_image(
              $img_id,
              'full',
              false,
              array('class' => 'object-cover',)
            );
            ?>
          <?php
        endif;
        ?>
      </div>
      <div class="col-span-2 xl:col-start-2">
        <p class="overtitle text-Black pb-7 md:pb-14 xl:pb-0"><?php the_field( 'opening_hours_overtitle' ); ?></p>
      </div>
      <div class="col-span-2 md:col-start-5 xl:col-start-10 pr-28 md:pr-0 xl:pl-16 md:pb-12 order-2 md:order-none">
       <?php
        $hero_button = get_field( 'opening_hours_button' );
        if ( $hero_button ) :
            $link_url    = $hero_button['url'];
            $link_title  = $hero_button['title'];
            $link_target = $hero_button['target'] ? $hero_button['target'] : '_self';
            ?>
            <a class="btn btn-primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
        <?php endif; ?>
      </div>
      <div class="col-span-2 md:col-span-3 xl:col-start-2 xl:col-span-4">
        <h2 class="title-main text-Black pb-7 md:pb-0 xl:pb-5"><?php the_field( 'opening_hours_title' ); ?></h2>
      </div>
      <div class="col-start-1 col-span-2 md:col-start-4 md:col-span-4 xl:col-start-8 xl:col-span-4">  
        <p class="text-Black pb-7 md:pb-0"><?php the_field ('opening_hours_text' ); ?></p>
      </div>
    </div>
  </div>
</section>