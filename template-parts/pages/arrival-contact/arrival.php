<?php
/**
 * Arrival in the Arrival & Contact Page Template.
 *
 * @package erlebnisbad
 * @subpackage Section
 * @since 1.0.0
 */

?>
<section id="section-arrival" class="section-arrival bg-white pb-32 xl:pb-52">
    <div class="theme-container">
        <div class="theme-grid">
            <div class="col-span-2 md:col-span-6 xl:col-start-2 xl:col-span-4">
                <h2 class="title-main text-Black pb-8"><?php the_field( 'arrival_title' ); ?></h2>
            </div>
            <div class="col-span-2 md:col-start-1 md:col-span-5 xl:col-start-7 xl:col-span-4">
                <p class="text-Black"><?php the_field( 'arrival_text' ); ?></p>
            </div>
        </div>

        <?php if ( have_rows( 'arrival_items' ) ) : ?>
        <div class="theme-grid pt-14 md:pt-20 xl:pt-24 gap-y-8 xl:gap-y-0">
            <?php
            while ( have_rows( 'arrival_items' ) ) :
                the_row();
                $arrival_icon_id  = get_sub_field( 'icon' );
                $arrival_overtitle = get_sub_field( 'overtitle' );
                $arrival_title    = get_sub_field( 'title' );
                $arrival_text     = get_sub_field( 'text' );
                ?>
                <div class="col-span-2 md:col-span-6 xl:col-span-4 arrival-item flex flex-col rounded-2xl border border-Mint p-8 md:p-14">
                        <?php if ( $arrival_icon_id ) : ?>
                        <div class="arrival-item__icon flex items-center justify-center pb-8 xl:pb-12">
                            <?php
                            echo wp_get_attachment_image(
                                $arrival_icon_id,
                                'full',
                                false,
                                array( 'class' => 'object-contain max-h-full w-auto' )
                            );
                            ?>
                        </div>
                        <?php endif; ?>

                        <?php if ( $arrival_overtitle ) : ?>
                        <h3 class="arrival-card-title text-Black pb-2"><?php echo esc_html( $arrival_overtitle ); ?></h3>
                        <?php endif; ?>

                        <?php if ( $arrival_title ) : ?>
                        <p class="arrival-card-title text-Red pb-4"><?php echo esc_html( $arrival_title ); ?></p>
                        <?php endif; ?>

                        <?php if ( $arrival_text ) : ?>
                        <div class="arrival-card text-Black max-w-[254px] md:max-w-[578px] xl:max-w-[472px]"><?php echo wp_kses_post( $arrival_text ); ?></div>
                        <?php endif; ?>
                </div>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>
    </div>
</section>
