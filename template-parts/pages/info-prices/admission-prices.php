<?php
/**
 * Admission Prices Section in the Info Prices Page Template.
 *
 * @package erlebnisbad
 * @subpackage Section
 * @since 1.0.0
 */

?>
<section id="section-admission-prices" class="section-admission-prices bg-Mint1 waves waves__top--color pt-24 md:pt-36 xl:pt-44 pb-12 md:pb-28 xl:pb-48">
    <div class="theme-container">
        <div class="theme-grid grid-flow-row-dense">
            <div class="col-span-2 md:col-start-4 md:col-span-3 xl:col-start-8 xl:col-span-4">
                <?php $img_id = get_field( 'prices_info_admission_prices_image' ); if ( $img_id ) : ?>
                <figure class="shape-bg shape-bg__img shape-bg--1 before:bg-Mint2">
                    <?php echo wp_get_attachment_image( $img_id, 'full' ); ?>
                </figure>
                <?php endif; ?>
            </div>
            <div class="col-span-2 md:col-start-1 md:col-span-3 xl:col-start-2 xl:col-span-5 xl:pt-40 text-center justify-items-center md:text-left md:justify-items-start">
                <p class="overtitle text-Black pb-2 md:pb-3 xl:pb-4"><?php the_field( 'prices_info_admission_prices_overtitle' ); ?></p>
                <h2 class="title-main text-Black pb-8"><?php the_field( 'prices_info_admission_prices_title' ); ?></h2>
                <p class="text-Black pb-8 xl:max-w-[600px]"><?php the_field( 'prices_info_admission_prices_text' ); ?></p>
                <?php
                $hero_button = get_field( 'prices_info_admission_prices_button' );
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
        </div>
    </div>
</section>
