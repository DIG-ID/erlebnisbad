<?php
/**
 * Content Section in the About Us Page Template.
 *
 * @package erlebnisbad
 * @subpackage Section
 * @since 1.0.0
 */

?>
<section id="section-content" class="section-content bg-Mint1 waves waves__top--color waves__bottom--color pt-28 xl:pt-24 pb-52 md:pb-40 xl:pb-44">
    <div class="theme-container">
        <div class="theme-grid grid-flow-row-dense">
            <div class="col-span-2 md:col-start-4 md:col-span-3 xl:col-start-7 xl:col-span-4 md:pt-28 xl:pt-10">
                <?php $img_id = get_field( 'content_image' ); if ( $img_id ) : ?>
                <div class="image-fill image-fill--5 image-fill--contain image-fill--mint-2">
                    <?php
                    echo wp_get_attachment_image(
                        $img_id,
                        'full',
                        false,
                        array( 'class' => 'object-cover h-auto' )
                    );
                    ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-span-2 md:col-start-1 md:col-span-3 xl:col-start-2 xl:col-span-5 xl:pt-20 text-center justify-items-center md:text-left md:justify-items-start">
                <p class="overtitle text-Black pb-2 md:pb-8 xl:pb-4"><?php the_field( 'content_overtitle' ); ?></p>
                <h2 class="title-main text-Black pb-8"><?php the_field( 'content_title' ); ?></h2>
                <p class="text-Black pb-8 xl:max-w-[593px]"><?php the_field( 'content_text' ); ?></p>
            </div>
        </div>
    </div>
</section>
