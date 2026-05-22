<?php
/**
 * Features Section in the Pool-World Page Template.
 *
 * @package erlebnisbad
 * @subpackage Section
 * @since 1.0.0
 */

?>
<section id="section-kids-features" class="section-features bg-white pt-24 md:pt-36 xl:pt-32 pb-32 md:pb-24 xl:pb-44">
  <div class="theme-container">
    <?php if ( have_rows( 'features_items' ) ) : ?>
      <?php
      // Tailwind needs the full class string at build time, so we list the shape variants statically.
      $shape_classes = array( 'image-fill--1', 'image-fill--2', 'image-fill--3', 'image-fill--4', 'image-fill--5' );
      // Desktop stagger (3 items in 1 row): item 2 highest, item 1 lowest, item 3 middle.
      // Uses padding-top on desktop because there's only one row — no row-height side effects.
      $xl_stagger_classes = array(
          1 => 'xl:pt-80',
          2 => 'xl:pt-0',
          0 => 'xl:pt-[428px]',
      );

      $i = 0;
      ?>
      <div class="theme-grid gap-y-16 md:gap-y-56 xl:gap-y-0 items-start">
        <?php
        while ( have_rows( 'features_items' ) ) :
          the_row();
          $offer_image_id    = get_sub_field( 'image' );
          $offer_title       = get_sub_field( 'title' );
          $offer_description = get_sub_field( 'description' );
          $row_index         = get_row_index(); // 1-based.
          $shape_class       = $shape_classes[ ( $row_index - 1 ) % count( $shape_classes ) ];
          // Tablet (2 cols): right-column items are displaced via `translate-y` (transform),
          // so the offset stays purely visual and doesn't inflate row 1's height.
          // Reset on xl so it doesn't fight with the xl `pt` stagger.
          $md_stagger        = ( 0 === $row_index % 2 ) ? 'md:translate-y-64 xl:translate-y-0' : '';
          // Desktop (3 cols, single row): position-based stagger via padding-top.
          $position_in_3col  = $row_index % 3;
          $xl_stagger        = isset( $xl_stagger_classes[ $position_in_3col ] ) ? $xl_stagger_classes[ $position_in_3col ] : 'xl:pt-0';
          // Item 2 description widens past the inner wrapper using negative horizontal margins on xl.
          $description_class = ( 2 === $position_in_3col ) ? 'xl:max-w-[496px] xl:-mx-3' : '';
          // Item 3 in tablet sits in cols 2-4 (slightly inset from the left) with a small top offset; reset on xl.
          $md_col_start      = ( 3 === $row_index ) ? 'md:col-start-2 md:pt-10 xl:col-start-auto' : '';
          $i++;
          ?>
          <div class="section-features__item col-span-2 md:col-span-3 xl:col-span-4 flex flex-col items-center text-center <?php echo esc_attr( $md_col_start ); ?> <?php echo esc_attr( $md_stagger ); ?> <?php echo esc_attr( $xl_stagger ); ?>">
            <div class="section-features__inner w-full max-w-[306px] xl:max-w-[472px]">
              <?php if ( $offer_image_id ) : ?>
                <figure class="shape-bg shape-bg__img shape-bg--<?php echo esc_attr( $i ); ?> before:bg-Mint2 mb-8 md:mb-10 xl:mb-10">
                  <?php echo wp_get_attachment_image( $offer_image_id, 'full' ); ?>
                </figure>
              <?php endif; ?>

              <?php if ( $offer_title ) : ?>
                <h3 class="title-secondary text-Black pb-6 xl:pb-8 !font-semibold"><?php echo esc_html( $offer_title ); ?></h3>
              <?php endif; ?>

              <?php if ( $offer_description ) : ?>
                <p class="text-Black <?php echo esc_attr( $description_class ); ?>"><?php echo wp_kses_post( $offer_description ); ?></p>
              <?php endif; ?>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>

    <div class="theme-grid text-center justify-items-center pt-24 md:pt-56 xl:pt-36">
      <div class="col-start-1 col-span-2 md:col-span-6 xl:col-start-5 xl:col-span-4 pb-8 md:pb-16 xl:pb-0">
        <h2 class="title-main text-Black pb-7"><?php the_field( 'features_supervision_title' ); ?></h2>
        <p class="text-Black max-w-[306px] md:max-w-[593px] xl:max-w-none mx-auto"><?php the_field( 'features_supervision_text' ); ?></p>
      </div>
    </div>
  </div>
</section>