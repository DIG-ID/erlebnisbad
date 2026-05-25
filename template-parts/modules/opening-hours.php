<?php
/**
 * Opening Hours Section in the Home Page Template.
 *
 * @package erlebnisbad
 * @subpackage Section
 * @since 1.0.0
 */
?>
<section id="section-opening-hours" class="section-opening-hours bg-white pt-16 md:pt-32 pb-32 md:pb-64">
  <div class="theme-container">
    <div class="theme-grid text-center justify-items-center md:text-left md:justify-items-start">
      <div class="col-span-2 md:col-span-6 xl:col-span-12 pb-12 xl:pb-32">
        <?php
        $img_id = get_field( 'opening_hours_image' );
        if ( $img_id ) :
          ?>
            <div class="oh-image-wrap">
              <?php
              echo wp_get_attachment_image(
                $img_id,
                'full',
                false,
                array( 'class' => 'oh-image-reveal w-full block object-cover' )
              );
              ?>
            </div>
          <?php
        endif;
        ?>
      </div>
      <?php $opening_text = get_field( 'opening_hours_text' ); ?>
      <div class="col-span-2 md:col-span-3 <?php echo is_front_page() ? 'xl:col-start-2' : 'xl:col-start-3'; ?> xl:col-span-5">
        <h2 class="title-main text-Black pb-7 md:pb-0 xl:pb-7 max-w-[280px] md:max-w-none xl:max-w-[650px]"><?php the_field( 'opening_hours_title' ); ?></h2>
      </div>
      <div class="col-span-2 md:col-start-4 md:col-span-3 <?php echo is_front_page() ? 'xl:col-start-10' : 'xl:col-start-9'; ?> xl:col-span-2 md:flex md:flex-col md:items-end xl:items-start md:pr-0 xl:pl-16 order-2 md:order-none">
       <?php
        $hero_button = get_field( 'opening_hours_button' );
        if ( $hero_button ) :
            $link_url    = $hero_button['url'];
            $link_title  = $hero_button['title'];
            $link_target = $hero_button['target'] ? $hero_button['target'] : '_self';
            ?>
            <a class="btn btn-primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
        <?php endif; ?>
        <?php if ( $opening_text ) : ?>
          <p class="hidden md:block xl:hidden w-full text-Black md:mt-auto md:text-left"><?php echo wp_kses_post( $opening_text ); ?></p>
        <?php endif; ?>
      </div>
      <div class="col-span-2 md:hidden xl:block <?php echo is_front_page() ? 'xl:col-start-2' : 'xl:col-start-3'; ?> xl:col-span-4">
        <p class="text-Black pb-7 md:pb-0  max-w-[280px] xl:max-w-none"><?php echo wp_kses_post( $opening_text ); ?></p>
      </div>
    </div>
  </div>
</section>