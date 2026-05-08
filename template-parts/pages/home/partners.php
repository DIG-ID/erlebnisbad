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
  <div class="theme-container text-center pt-36 md:pt-24 xl:pt-32 pb-32 md:pb-24 xl:pb-36">
    <h2 class="title-main text-Black pb-8 xl:pb-12"><?php the_field( 'partners_title' ); ?></h2>

    <?php if ( have_rows( 'partners_items' ) ) : ?>
      <div class="flex flex-row flex-wrap items-center justify-center gap-36">
        <?php
        while ( have_rows( 'partners_items' ) ) :
            the_row();
            $partner_image_id = get_sub_field( 'image' );
            $partner_link     = get_sub_field( 'link' );

            if ( ! $partner_image_id ) {
                continue;
            }

            $partner_image = wp_get_attachment_image(
                $partner_image_id,
                'full',
                false,
                array( 'class' => 'object-contain' )
            );

            if ( $partner_link ) :
                $link_url    = $partner_link['url'];
                $link_title  = $partner_link['title'];
                $link_target = $partner_link['target'] ? $partner_link['target'] : '_self';
                ?>
                <a class="section-partners__item" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_attr( $link_title ); ?>">
                  <?php echo $partner_image; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                </a>
                <?php
            else :
                ?>
                <div class="section-partners__item">
                  <?php echo $partner_image; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                </div>
                <?php
            endif;
        endwhile;
        ?>
      </div>
    <?php endif; ?>
  </div>
</section>
