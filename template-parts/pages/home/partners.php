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
  <div class="theme-container text-center pb-36 md:pb-40 xl:pb-40 pt-36 xl:pt-28">
    <h2 class="title-main text-Black pb-24 md:pb-14 xl:pb-28"><?php the_field( 'partners_title' ); ?></h2>

    <?php
    // Collect partners first so we can render the list twice for a seamless loop.
    $partners = array();
    if ( have_rows( 'partners_items' ) ) :
        while ( have_rows( 'partners_items' ) ) :
            the_row();
            $partner_image_id = get_sub_field( 'image' );

            if ( ! $partner_image_id ) {
                continue;
            }

            $partner_image_src = wp_get_attachment_image_src( $partner_image_id, 'full' );
            $partner_width     = ( $partner_image_src && ! empty( $partner_image_src[1] ) ) ? (int) $partner_image_src[1] : 0;

            $partners[] = array(
                'image_id' => $partner_image_id,
                'link'     => get_sub_field( 'link' ),
                'width'    => $partner_width,
            );
        endwhile;
    endif;
    ?>

    <?php if ( ! empty( $partners ) ) : ?>
      <div class="theme-grid">
        <div class="col-span-2 md:col-span-6 xl:col-start-3 xl:col-span-8 section-partners__viewport">
          <div class="section-partners__track">
          <?php
          // Render the list twice (second copy is aria-hidden) so the CSS loop is seamless.
          for ( $copy = 0; $copy < 2; $copy++ ) :
              foreach ( $partners as $partner ) :
                  $partner_style = $partner['width'] ? sprintf( '--partner-w: %dpx;', $partner['width'] ) : '';
                  $partner_image = wp_get_attachment_image(
                      $partner['image_id'],
                      'full',
                      false,
                      array( 'class' => 'object-contain w-full h-auto' )
                  );
                  $aria_hidden   = ( 1 === $copy ) ? ' aria-hidden="true"' : '';

                  if ( $partner['link'] ) :
                      $link_url    = $partner['link']['url'];
                      $link_title  = $partner['link']['title'];
                      $link_target = $partner['link']['target'] ? $partner['link']['target'] : '_self';

                      $tabindex = ( 1 === $copy ) ? ' tabindex="-1"' : '';
                      ?>
                      <a class="section-partners__item" style="<?php echo esc_attr( $partner_style ); ?>" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_attr( $link_title ); ?>"<?php echo $aria_hidden . $tabindex; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
                        <?php echo $partner_image; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                      </a>
                      <?php
                  else :
                      ?>
                      <div class="section-partners__item" style="<?php echo esc_attr( $partner_style ); ?>"<?php echo $aria_hidden; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
                        <?php echo $partner_image; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                      </div>
                      <?php
                  endif;
              endforeach;
          endfor;
          ?>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>
