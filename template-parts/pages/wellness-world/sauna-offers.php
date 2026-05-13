<?php
/**
 * Sauna Offers Section in the Wellness-World Page Template.
 *
 * @package erlebnisbad
 * @subpackage Section
 * @since 1.0.0
 */

?>
<section id="section-sauna-offers" class="section-sauna-offers bg-white pt-16 md:pt-32 pb-32 xl:pb-28">
  <div class="theme-container">
    <div class="theme-grid text-center justify-items-center pb-16 md:pb-24 xl:pb-24">
      <div class="col-span-2 md:col-start-2 md:col-span-4 xl:col-start-5 xl:col-span-4">
        <h2 class="title-main text-Black pb-8"><?php the_field( 'sauna_offers_intro_title' ); ?></h2>
        <p class="text-Black"><?php the_field( 'sauna_offers_intro_text' ); ?></p>
      </div>
    </div>

    <?php if ( have_rows( 'sauna_offers_items' ) ) : ?>
      <?php
      // Tailwind needs the full class string at build time, so we list the shape variants statically.
      $shape_classes = array( 'image-fill--1', 'image-fill--2', 'image-fill--3', 'image-fill--4', 'image-fill--5' );
      // Desktop stagger (3 items in 1 row): item 2 highest, item 1 lowest, item 3 middle.
      // Uses padding-top on desktop because there's only one row — no row-height side effects.
      $xl_stagger_classes = array(
          1 => 'xl:pt-52',
          2 => 'xl:pt-0',
          0 => 'xl:pt-36',
      );
      ?>
      <div class="theme-grid gap-y-16 md:gap-y-48 xl:gap-y-0 items-start">
        <?php
        while ( have_rows( 'sauna_offers_items' ) ) :
          the_row();
          $offer_image_id   = get_sub_field( 'image' );
          $offer_title      = get_sub_field( 'title' );
          $offer_description = get_sub_field( 'description' );
          $row_index        = get_row_index(); // 1-based.
          $shape_class      = $shape_classes[ ( $row_index - 1 ) % count( $shape_classes ) ];
          // Tablet (2 cols): right-column items are displaced via `translate-y` (transform),
          // so the offset stays purely visual and doesn't inflate row 1's height.
          // Reset on xl so it doesn't fight with the xl `pt` stagger.
          $md_stagger       = ( 0 === $row_index % 2 ) ? 'md:translate-y-96 xl:translate-y-0' : '';
          // Desktop (3 cols, single row): position-based stagger via padding-top.
          $position_in_3col = $row_index % 3;
          $xl_stagger       = isset( $xl_stagger_classes[ $position_in_3col ] ) ? $xl_stagger_classes[ $position_in_3col ] : 'xl:pt-0';
          ?>
          <div class="section-sauna-offers__item col-span-2 md:col-span-3 xl:col-span-4 flex flex-col items-center text-center <?php echo esc_attr( $md_stagger ); ?> <?php echo esc_attr( $xl_stagger ); ?>">
            <div class="section-sauna-offers__inner w-full max-w-[306px] xl:max-w-[472px]">
              <?php if ( $offer_image_id ) : ?>
                <div class="image-fill <?php echo esc_attr( $shape_class ); ?> image-fill--contain image-fill--mint-2 overflow-hidden mb-8 md:mb-10 xl:mb-10">
                  <?php
                  echo wp_get_attachment_image(
                      $offer_image_id,
                      'full',
                      false,
                      array( 'class' => 'object-cover' )
                  );
                  ?>
                </div>
              <?php endif; ?>

              <?php if ( $offer_title ) : ?>
                <h3 class="title-secondary text-Black pb-6 xl:pb-8 !font-semibold"><?php echo esc_html( $offer_title ); ?></h3>
              <?php endif; ?>

              <?php if ( $offer_description ) : ?>
                <p class="text-Black"><?php echo wp_kses_post( $offer_description ); ?></p>
              <?php endif; ?>
            </div>
          </div>
        <?php endwhile; ?>
        <?php endif; ?>
        </div>
        <?php if ( have_rows( 'sauna_offers_extras' ) ) : ?>
          <div class="theme-grid gap-y-16 md:gap-y-0 items-start pt-24 md:pt-32 xl:pt-48">
            <?php
            while ( have_rows( 'sauna_offers_extras' ) ) :
              the_row();
              $extra_title       = get_sub_field( 'title' );
              $extra_image_id    = get_sub_field( 'image' );
              $extra_description = get_sub_field( 'description' );
              $extra_index       = get_row_index();
              $extra_shape       = $shape_classes[ ( $extra_index - 1 ) % count( $shape_classes ) ];
              ?>
              <div class="section-sauna-offers__extra col-span-2 md:col-span-3 xl:col-span-6 flex flex-col items-center text-center">
                <div class="section-sauna-offers__extra-inner w-full max-w-[306px] xl:max-w-[472px]">
                  <?php if ( $extra_title ) : ?>
                    <h2 class="title-main text-Black pb-6 xl:pb-11"><?php echo esc_html( $extra_title ); ?></h2>
                  <?php endif; ?>

                  <?php if ( $extra_image_id ) : ?>
                    <div class="image-fill <?php echo esc_attr( $extra_shape ); ?> image-fill--contain image-fill--mint-2 overflow-hidden mb-8 md:mb-10 xl:mb-11">
                      <?php
                      echo wp_get_attachment_image(
                          $extra_image_id,
                          'full',
                          false,
                          array( 'class' => 'object-cover' )
                      );
                      ?>
                    </div>
                  <?php endif; ?>

                  <?php if ( $extra_description ) : ?>
                    <p class="text-Black"><?php echo wp_kses_post( $extra_description ); ?></p>
                  <?php endif; ?>
                </div>
              </div>
            <?php endwhile; ?>
            <?php endif; ?>
            <div class="col-span-2 md:col-start-1 md:col-span-6 xl:col-start-5 xl:col-span-4 text-center justify-items-center pt-16 xl:pt-32">
                <h2 class="title-main text-Black pb-8"><?php the_field( 'sauna_offers_outro_title' ); ?></h2>
                <p class="text-Black md:max-w-[593px] xl:max-w-none"><?php the_field( 'sauna_offers_outro_text' ); ?></p>
            </div>
        </div>
  </div>
</section>