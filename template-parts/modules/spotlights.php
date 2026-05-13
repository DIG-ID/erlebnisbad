<?php
/**
 * Sportlights Section in the Pool-World Page Template.
 *
 * @package erlebnisbad
 * @subpackage Section
 * @since 1.0.0
 */

?>
<section id="section-spotlights" class="section-spotlights bg-Mint1 pt-24 md:pt-36 xl:pt-44 pb-32 md:pb-24 xl:pb-44">
    <div class="theme-container">
        <div class="theme-grid grid-flow-row-dense">
            <div class="col-span-2 md:col-start-1 md:col-span-3 xl:col-start-2 xl:col-span-4">
                <?php $img_id = get_field( 'spotlight_image' );if ( $img_id ) :?>
                <div class="image-fill image-fill--5 image-fill--contain image-fill--mint-2">
                    <?php
                    echo wp_get_attachment_image(
                    $img_id,
                    'full',
                    false,
                    array('class' => 'object-cover h-auto ',)
                    );
                    ?>
                </div>
                <?php endif;?>
            </div>
            <div class="col-span-2 md:col-start-4 md:col-span-3 xl:col-start-7 xl:col-span-4 xl:pt-40">
                <h2 class="title-main text-Black pb-8"><?php the_field( 'spotlight_title' ); ?></h2>
                <p class="text-Black pb-8"><?php the_field( 'spotlight_text' ); ?></p>
                <?php
                $hero_button = get_field( 'hero_button' );
                if ( $hero_button ) :
                    $link_url    = $hero_button['url'];
                    $link_title  = $hero_button['title'];
                    $link_target = $hero_button['target'] ? $hero_button['target'] : '_self';
                    ?>
                    <div class="flex justify-center md:block">
                        <a class="btn btn-primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    </div>
                <?php endif; ?>
            </div>
                <?/**
                 * 2nd section of Spotlight
                 *
                 */
                ?>
            <div class="col-span-2 md:col-start-1 md:col-span-3 xl:col-start-2 xl:col-span-5 pt-8 md:pt-24 xl:pt-60 xl:pl-16 order-2 md:order-none">
                <h2 class="title-main text-Black pb-8"><?php the_field( 'spotlight_title_2' ); ?></h2>
                <p class="text-Black pb-8 xl:max-w-[600px]"><?php the_field( 'spotlight_text_2' ); ?></p>
                <?php
                $hero_button = get_field( 'spotlight_button_2' );
                if ( $hero_button ) :
                    $link_url    = $hero_button['url'];
                    $link_title  = $hero_button['title'];
                    $link_target = $hero_button['target'] ? $hero_button['target'] : '_self';
                    ?>
                    <div class="flex justify-center md:block">
                        <a class="btn btn-primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-span-2 md:col-start-4 md:col-span-3 xl:col-start-8 xl:col-span-4 pt-14 md:pt-36 xl:pt-32 order-1 md:order-none">
                <?php $img_id = get_field( 'spotlight_image_2' );if ( $img_id ) :?>
                <div class="image-fill image-fill--5 image-fill--contain image-fill--mint-2">
                    <?php
                    echo wp_get_attachment_image(
                    $img_id,
                    'full',
                    false,
                    array('class' => 'object-cover h-auto ',)
                    );
                    ?>
                </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</section>