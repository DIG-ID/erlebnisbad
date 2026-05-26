<?php
/**
 * Bistro Section in the Home Page Template.
 *
 * @package erlebnisbad
 * @subpackage Section
 * @since 1.0.0
 */

?>
<section id="section-bistro" class="section-bistro bg-Mint1 waves waves__top--color waves__bottom--color">
  <div class="theme-container pb-32 md:pb-24 xl:pb-40">
    <div class="theme-grid">
      <div class="col-span-2 md:col-span-3 xl:col-start-2 xl:col-span-4 order-2 md:order-none pt-52 xl:pt-36">
        <?php
        $img_id = get_field( 'bistro_image' );
        if ( $img_id ) :
          ?>
          <div class="image-fill image-fill--5 image-fill--big image-fill--mint-2">
            <?php
            echo wp_get_attachment_image(
              $img_id,
              'full',
              false,
              array(
                'class' => 'object-cover xl:max-w-[600px] h-auto ',
              )
            );
            ?>
          </div>
          <?php
        endif;
        ?>
      </div>
      <div class="col-span-2 md:col-start-4 md:col-span-3 xl:col-start-8 xl:col-span-4 pt-24 xl:pt-56">
        <p class="overtitle text-Black pb-8 xl:pb-4"><?php the_field( 'bistro_overtitle' ); ?></p>
        <h2 class="title-main text-Black pb-8"><?php the_field( 'bistro_title' ); ?></h2>
        <p class="text-Black pb-8"><?php the_field( 'bistro_text' ); ?></p>
        <?php
        $hero_button = get_field( 'bistro_button' );
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
</section>
