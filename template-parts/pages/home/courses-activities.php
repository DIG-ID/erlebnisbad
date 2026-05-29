<?php
/**
 * Courses and Activities Section in the Home Page Template.
 *
 * @package erlebnisbad
 * @subpackage Section
 * @since 1.0.0
 */

?>
<section id="courses-activities" class="section-courses-activities bg-white pt-12 md:pt-14 xl:pt-32 pb-32 xl:pb-36">
  <div class="theme-container">
    <div class="theme-grid">
      <div class="col-span-2 xl:col-start-2">
        <p class="overtitle text-Black pb-8 xl:pb-4"><?php the_field( 'courses_activities_overtitle' ); ?></p>
      </div>
      <div class="col-span-2 md:col-start-5 xl:col-start-10 pr-28 md:pr-0 xl:pl-16 pb-12 md:pb-12 order-2 md:order-none">
        <?php
        $hero_button = get_field( 'courses_activities_button' );
        if ( $hero_button ) :
            $link_url    = $hero_button['url'];
            $link_title  = $hero_button['title'];
            $link_target = $hero_button['target'] ? $hero_button['target'] : '_self';
            ?>
            <a class="btn btn-primary inline-flex md:hidden" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
        <?php endif; ?>
      </div>
      <div class="col-span-2 md:col-span-3 xl:col-start-2 xl:col-span-5">
        <h2 class="title-main text-Black pb-7 xl:pb-4 max-w-[300px] md:max-w-none xl:max-w-[630px] "><?php the_field( 'courses_activities_title' ); ?></h2>
        <?php
        $hero_button = get_field( 'courses_activities_button' );
        if ( $hero_button ) :
            $link_url    = $hero_button['url'];
            $link_title  = $hero_button['title'];
            $link_target = $hero_button['target'] ? $hero_button['target'] : '_self';
            ?>
            <a class="btn btn-primary !hidden md:!inline-flex" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
        <?php endif; ?>
      </div>
      <div class="col-span-2 md:col-span-3 xl:col-start-8 xl:col-span-4 ">
        <p class="text-Black pb-8 md:pb-36 xl:pb-32"><?php the_field( 'courses_activities_text' ); ?></p>
      </div>
    </div>

    <?php if ( have_rows( 'courses_activities_images' ) ) : ?>
      <div class="flex flex-col items-center gap-12 md:flex-row md:items-start md:justify-center md:gap-x-4 md:gap-y-0 xl:gap-x-[53px]">
        <?php
        $i = 0;
        while ( have_rows( 'courses_activities_images' ) ) :
            the_row();
            $courses_image_id     = get_sub_field( 'image' );
            $courses_image_button = get_sub_field( 'image_button' );
            $i++;
            ?>
            <div class="w-full max-w-[445px] md:flex-1 md:basis-0">
                <?php if ( $courses_image_id ) : ?>
                    <figure class="shape-bg shape-bg__img shape-bg--<?php echo esc_attr( $i ); ?> before:bg-Mint1">
                      <?php echo wp_get_attachment_image( $courses_image_id, 'full' ); ?>
                    </figure>
                <?php endif; ?>

                <?php
                if ( $courses_image_button ) :
                    $courses_btn_url    = $courses_image_button['url'];
                    $courses_btn_title  = $courses_image_button['title'];
                    $courses_btn_target = $courses_image_button['target'] ? $courses_image_button['target'] : '_self';
                    ?>
                    <div class="flex justify-center pt-10 md:pt-14 xl:pt-16">
                        <a class="btn btn-primary" href="<?php echo esc_url( $courses_btn_url ); ?>" target="<?php echo esc_attr( $courses_btn_target ); ?>"><?php echo esc_html( $courses_btn_title ); ?></a>
                    </div>
                <?php endif; ?>
            </div>
            <?php
        endwhile;
        ?>
      </div>
    <?php endif; ?>
  </div>
</section>
