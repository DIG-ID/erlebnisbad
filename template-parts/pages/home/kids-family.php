<?php
/**
 * Kids & Family Section in the Home Page Template.
 *
 * @package erlebnisbad
 * @subpackage Section
 * @since 1.0.0
 */

?>
<section id="section-kids-family" class="section-kids-family bg-Mint">
  <div class="theme-container pt-36 md:pt-24 xl:pt-10 pb-32 md:pb-24 xl:pb-36">
    <div class="theme-grid items-center">
      <div class="col-span-2 md:col-span-3 xl:col-start-2 xl:col-span-5 order-2 md:order-none">
        <?php
        $img_id = get_field( 'kids_family_image' );
        if ( $img_id ) :
          ?>
          <figure class="shape-bg shape-bg__img shape-bg--3 before:bg-Mint3">
            <?php echo wp_get_attachment_image( $img_id, 'full' ); ?>
          </figure>
          <?php
        endif;
        ?>
      </div>
      <div class="col-span-2 md:col-start-4 md:col-span-3 xl:col-start-7 xl:col-span-5">
        <p class="overtitle text-Black pb-8 xl:pb-4"><?php the_field( 'kids_family_overtitle' ); ?></p>
        <h2 class="title-main text-Black pb-8"><?php the_field( 'kids_family_title' ); ?></h2>
        <p class="text-Black pb-8"><?php the_field( 'kids_family_text' ); ?></p>
        <?php
        $hero_button = get_field( 'kids_family_button' );
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
