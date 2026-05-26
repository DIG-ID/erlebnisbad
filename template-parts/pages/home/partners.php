<?php
/**
 * Partners Section in the Home Page Template.
 *
 * @package erlebnisbad
 * @subpackage Section
 * @since 1.0.0
 */

?>
<section id="section-partners" class="section-partners bg-white">
  <div class="theme-container text-center pb-48 md:pb-40 xl:pb-48 pt-52 xl:pt-28">
    <h2 class="title-main text-Black pb-24 md:pb-14 xl:pb-28"><?php the_field( 'partners_title' ); ?></h2>

    <?php if ( have_rows( 'partners_items' ) ) : ?>
      <div class="grid grid-cols-2 gap-x-8 gap-y-10 items-center justify-items-center md:flex md:flex-row md:flex-wrap md:justify-center md:gap-12 xl:gap-44">
        <?php
        while ( have_rows( 'partners_items' ) ) :
            the_row();
            $partner_image_id = get_sub_field( 'image' );
            $partner_link     = get_sub_field( 'link' );

            if ( ! $partner_image_id ) {
                continue;
            }

            // Use the image's natural width as the desktop width; SCSS scales it to 63% on tablet/mobile.
            $partner_image_src = wp_get_attachment_image_src( $partner_image_id, 'full' );
            $partner_width     = ( $partner_image_src && ! empty( $partner_image_src[1] ) ) ? (int) $partner_image_src[1] : 0;
            $partner_style     = $partner_width ? sprintf( '--partner-w: %dpx;', $partner_width ) : '';

            $partner_image = wp_get_attachment_image(
                $partner_image_id,
                'full',
                false,
                array( 'class' => 'object-contain w-full h-auto' )
            );

            if ( $partner_link ) :
                $link_url    = $partner_link['url'];
                $link_title  = $partner_link['title'];
                $link_target = $partner_link['target'] ? $partner_link['target'] : '_self';
                ?>
                <a class="section-partners__item" style="<?php echo esc_attr( $partner_style ); ?>" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_attr( $link_title ); ?>">
                  <?php echo $partner_image; ?>
                </a>
                <?php
            else :
                ?>
                <div class="section-partners__item" style="<?php echo esc_attr( $partner_style ); ?>">
                  <?php echo $partner_image; ?>
                </div>
                <?php
            endif;
        endwhile;
        ?>
      </div>
    <?php endif; ?>
  </div>
</section>
