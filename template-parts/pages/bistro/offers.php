<?php
/**
 * Bistro Section in the Bistro Page Template.
 *
 * @package erlebnisbad
 * @subpackage Section
 * @since 1.0.0
 */

?>
<section id="section-offers" class="section-offers bg-Mint1 pt-40 md:pt-32 xl:pt-52 pb-52 md:pb-44 xl:pb-44">
    <div class="theme-container">
        <div class="theme-grid">
            <div class="col-span-2 md:col-start-2 md:col-span-3 xl:col-start-2 xl:col-span-4">
                <p class="text-overtitle text-Black xl:pb-4"><?php the_field( 'offers_overtitle' ); ?></p>
                <h2 class="title-main text-Black pb-8"><?php the_field( 'offers_title' ); ?></h2>
                <p class="text-Black xl:pb-14"><?php the_field( 'offers_text' ); ?></p>
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
        <div class="col-span-2 md:col-start-1 md:col-span-6 xl:col-start-7 xl:col-span-6">
              <?php
              $offer_image_id = get_field( 'offers_image' );
              if ( $offer_image_id ) :
                  echo wp_get_attachment_image(
                      $offer_image_id,
                      'full',
                      false,
                      array( 'class' => 'object-cover w-full h-auto' )
                  );
              endif;
              ?>
        </div>
</section>