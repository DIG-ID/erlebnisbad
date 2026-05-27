<?php
/**
 * Features Section in the Pool-World Page Template.
 *
 * @package erlebnisbad
 * @subpackage Section
 * @since 1.0.0
 */

?>
<section id="section-features" class="section-features bg-white pt-16 md:pt-36 xl:pt-32 pb-36 md:pb-52">
  <div class="theme-container">
    <?php if ( have_rows( 'features_items' ) ) : ?>
      <?php
      // Shape variants cycle through the six available `shape-bg--<n>` blobs.
      $shape_classes = array( 'shape-bg--1', 'shape-bg--2', 'shape-bg--3', 'shape-bg--4', 'shape-bg--5', 'shape-bg--6' );
      // Order classes (kept as literals so Tailwind picks them up). Used on mobile to preserve reading order
      // when the column wrappers collapse via display: contents.
      $order_classes = array(
          1 => 'order-1',
          2 => 'order-2',
          3 => 'order-3',
          4 => 'order-4',
      );

      // Pre-collect items into left/right column buckets so each column can size independently.
      $left_items  = array();
      $right_items = array();
      $idx         = 0;
      while ( have_rows( 'features_items' ) ) :
          the_row();
          ++$idx;
          $item = array(
              'image'       => get_sub_field( 'image' ),
              'title'       => get_sub_field( 'title' ),
              'description' => get_sub_field( 'description' ),
              'details'     => get_sub_field( 'details' ),
              'shape'       => $shape_classes[ ( $idx - 1 ) % count( $shape_classes ) ],
              'order'       => $idx,
          );
          if ( 1 === $idx % 2 ) {
              $left_items[] = $item;
          } else {
              $right_items[] = $item;
          }
      endwhile;

      $render_item = function ( $item ) use ( $order_classes ) {
          $order_class = isset( $order_classes[ $item['order'] ] ) ? $order_classes[ $item['order'] ] : '';
          ?>
          <div class="section-features__item <?php echo esc_attr( $order_class ); ?> md:order-none flex flex-col items-center text-center">
            <div class="section-features__inner w-full max-w-[306px] xl:max-w-[547px]">
              <?php if ( $item['image'] ) : ?>
                <figure class="shape-bg shape-bg__img <?php echo esc_attr( $item['shape'] ); ?> before:bg-Mint2 mb-8 md:mb-10 xl:mb-12">
                  <?php echo wp_get_attachment_image( $item['image'], 'full' ); ?>
                </figure>
              <?php endif; ?>

              <?php if ( $item['title'] ) : ?>
                <h3 class="title-secondary text-Black pb-6 xl:pb-8 !font-semibold"><?php echo esc_html( $item['title'] ); ?></h3>
              <?php endif; ?>

              <?php if ( $item['description'] ) : ?>
                <p class="text-Black pb-6 xl:pb-8"><?php echo wp_kses_post( $item['description'] ); ?></p>
              <?php endif; ?>

              <?php if ( $item['details'] ) : ?>
                <div class="text-Black"><?php echo wp_kses_post( $item['details'] ); ?></div>
              <?php endif; ?>
            </div>
          </div>
          <?php
      };
      ?>
      <div class="flex flex-col md:flex-row md:items-start gap-y-28 md:gap-y-0 md:gap-x-4 xl:gap-x-5">
        <!-- Left column: display:contents on mobile so items become direct children of the outer flex (preserves reading order via `order-*`); flex column on md+ so it sizes independently. -->
        <div class="contents md:flex md:flex-col md:flex-1 md:gap-y-32 xl:items-end xl:pr-[78px]">
          <?php foreach ( $left_items as $item ) : ?>
            <?php $render_item( $item ); ?>
          <?php endforeach; ?>
        </div>
        <!-- Right column: same pattern, staggered down on md+ and pulled left toward the centre on xl. -->
        <div class="contents md:flex md:flex-col md:flex-1 md:gap-y-32 md:pt-60 xl:pt-72 xl:items-start xl:pl-[78px]">
          <?php foreach ( $right_items as $item ) : ?>
            <?php $render_item( $item ); ?>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endif; ?>
  </div>
  <div class="theme-container pt-32">
    <div class="theme-grid text-center justify-items-center ">
        <div class="col-start-1 col-span-2 md:col-span-6 xl:col-start-2 xl:col-span-4 pb-8 md:pb-16 xl:pb-0">
            <h2 class="title-main text-Black pb-7"><?php the_field( 'features_accessibility_title' ); ?></h2>
            <p class="text-Black max-w-[306px] md:max-w-[593px]"><?php the_field( 'features_accessibility_text' ); ?></p>
        </div>
        <div class="col-start-1 col-span-2 md:col-span-6 xl:col-start-8 xl:col-span-4">
            <h2 class="title-main text-Black pb-7"><?php the_field( 'features_instructions_title' ); ?></h2>
            <p class="text-Black max-w-[306px] md:max-w-[593px]"><?php the_field( 'features_instructions_text' ); ?></p>
        </div>
    </div>
  </div>
</section>