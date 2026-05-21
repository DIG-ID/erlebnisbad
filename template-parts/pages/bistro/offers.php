<?php
/**
 * Bistro Section in the Bistro Page Template.
 *
 * @package erlebnisbad
 * @subpackage Section
 * @since 1.0.0
 */

?>
<section id="section-offers" class="section-offers bg-Mint1 waves waves__top--color waves__bottom--color pt-40 md:pt-32 xl:pt-52 pb-52 md:pb-44 xl:pb-44">
  <div class="theme-container">
    <div class="theme-grid">

      <!-- Content wrapper: single grid item with internal sub-grid. -->
      <div class="col-span-2 md:col-span-6 xl:col-start-2 xl:col-span-4">
        <div class="grid grid-cols-1 md:grid-cols-2 md:gap-x-4 xl:grid-cols-1">
          <!-- Overtitle: tablet col 1 row 1 -->
          <p class="text-overtitle text-Black pb-2 md:pb-12 xl:pb-4 md:order-1 xl:order-none"><?php the_field( 'offers_overtitle' ); ?></p>

          <!-- h2: tablet col 1 row 2 -->
          <h2 class="title-main text-Black pb-2 xl:pb-8 md:order-3 xl:order-none"><?php the_field( 'offers_title' ); ?></h2>

          <!-- Text: tablet col 2 row 2 -->
          <p class="text-Black md:pb-0 xl:pb-14 md:order-4 xl:order-none"><?php the_field( 'offers_text' ); ?></p>

          <!-- Button: tablet col 2 row 1 -->
          <div class="md:order-2 xl:order-none pt-14 md:pt-0 md:justify-self-end xl:justify-self-stretch">
            <?php
            $hero_button = get_field( 'offers_button' );
            if ( $hero_button ) :
                $link_url    = $hero_button['url'];
                $link_title  = $hero_button['title'];
                $link_target = $hero_button['target'] ? $hero_button['target'] : '_self';
                ?>
                <a class="btn btn-primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            <?php endif; ?>
          </div>
        </div>
      </div>

      <!-- Image (tablet + desktop) -->
      <div class="hidden md:block md:col-span-6 xl:col-start-7 xl:col-span-6 md:pt-14 xl:pt-0">
        <?php
        $offer_image_id = get_field( 'offers_image' );
        if ( $offer_image_id ) :
            echo wp_get_attachment_image(
                $offer_image_id,
                'full',
                false,
                array( 'class' => 'object-cover w-full h-auto rounded-2xl' )
            );
        endif;
        ?>
      </div>

      <!-- Image (mobile only) -->
      <div class="block md:hidden col-span-2 pt-14">
        <?php
        $offer_image_id = get_field( 'offers_image_mobile' );
        if ( $offer_image_id ) :
            echo wp_get_attachment_image(
                $offer_image_id,
                'full',
                false,
                array( 'class' => 'object-cover w-full h-auto rounded-2xl' )
            );
        endif;
        ?>
      </div>

    </div>
  </div>
</section>