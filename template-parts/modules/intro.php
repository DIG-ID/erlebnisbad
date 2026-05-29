<?php
/**
 * Intro Module in the various pages.
 *
 * @package erlebnisbad
 * @subpackage Section
 * @since 1.0.0
 */

?>
<section id="section-intro" class="section-intro bg-Mint1 waves waves__bottom--color pt-20 xl:pt-28 pb-32 md:pb-48 xl:pb-36">
  <div class="theme-container justify-items-center text-center">
    <p class="text-Black pb-16 xl:pb-20 max-w-72 md:max-w-[500px] xl:max-w-[593px]"><?php the_field( 'intro_text' ); ?></p>

    <?php if ( have_rows( 'intro_items' ) ) : ?>
      <div class="section-intro__items flex flex-col items-center gap-7 md:flex-row md:flex-wrap md:justify-center md:items-stretch md:gap-9 xl:gap-24">
        <?php
        while ( have_rows( 'intro_items' ) ) :
          the_row();
          $intro_icon_id = get_sub_field( 'icon' );
          $intro_text    = get_sub_field( 'text' );
          ?>
          <div class="section-intro__item flex flex-col items-center">
            <?php if ( $intro_icon_id ) : ?>
              <div class="section-intro__icon flex items-end justify-center h-[140px] md:h-[180px] xl:h-[220px] pb-4 md:pb-6 xl:pb-8">
                <?php
                echo wp_get_attachment_image(
                  $intro_icon_id,
                  'full',
                  false,
                  array( 'class' => 'object-contain max-h-full w-auto' )
                );
                ?>
              </div>
            <?php endif; ?>

            <?php if ( $intro_text ) : ?>
              <p class="text-Black"><?php echo esc_html( $intro_text ); ?></p>
            <?php endif; ?>
          </div>
          <?php
        endwhile;
        ?>
      </div>
    <?php endif; ?>
  </div>
</section>
    