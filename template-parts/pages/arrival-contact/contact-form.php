<?php
/**
 * Contact Form in the Arrival & Contact Page Template.
 *
 * @package erlebnisbad
 * @subpackage Section
 * @since 1.0.0
 */

?>
<section id="section-contact-form" class="section-contact-form bg-Mint1 waves waves__top--color pt-24 md:pt-40 xl:pt-24 pb-40 md:pb-52 xl:pb-44">
    <div class="theme-container">
        <div class="theme-grid pb-14 md:pb-16 xl:pb-24">
            <div class="col-span-2 md:col-start-1 md:col-span-6 xl:col-start-2 xl:col-span-4">
                <h2 class="title-main text-Black pb-8"><?php the_field( 'contact_form_intro_title' ); ?></h2>
            </div>
            <div class="col-span-2 md:col-start-1 md:col-span-5 xl:col-start-7 xl:col-span-4">
                <p class="text-Black"><?php the_field( 'contact_form_intro_text' ); ?></p>
            </div>
        </div>
        <?php if ( get_field( 'general_contact_form_shortcode', 'option' ) ) : ?>
        <div class="theme-grid pt-12 md:pt-16 xl:pt-20">
            <div class="col-span-2 md:col-span-6 xl:col-start-1 xl:col-span-12 section-contact-form__form bg-Mint rounded-2xl px-8 py-[72px] xl:p-20 xl:pb-[84px]">
                <?php echo do_shortcode( get_field( 'general_contact_form_shortcode', 'option' ) ); ?>
            </div>
        </div>
        <?php endif; ?>

        <div class="theme-grid pt-48 md:pt-32 xl:pt-24">
            <div class="col-span-2 md:col-start-1 md:col-span-6 xl:col-start-3 xl:col-span-4">
                <p class=" text-Black pb-4 xl:bp-0"><?php the_field( 'contact_form_outro_overtitle' ); ?></p>
                <h2 class="title-main text-Black pb-4 xl:pb-7"><?php the_field( 'contact_form_outro_title' ); ?></h2>
            </div>
            <div class="col-span-2 md:col-start-1 md:col-span-2 xl:col-start-10 xl:col-span-2 flex justify-start xl:justify-end items-start order-last xl:order-none">
                <?php
                $hero_button = get_field( 'contact_form_outro_button' );
                if ( $hero_button ) :
                    $link_url    = $hero_button['url'];
                    $link_title  = $hero_button['title'];
                    $link_target = $hero_button['target'] ? $hero_button['target'] : '_self';
                    ?>
                    <a class="btn btn-primary mt-4 xl:mt-12" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                <?php endif; ?>
            </div>
            <div class="col-span-2 md:col-start-1 md:col-span-5 xl:col-start-3 xl:col-span-4">
                <p class="text-Black"><?php the_field( 'contact_form_outro_text' ); ?></p>
            </div>
        </div>
    </div>
</section>
