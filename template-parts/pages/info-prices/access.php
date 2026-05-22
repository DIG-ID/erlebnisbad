<?php
/**
 * Access Section in the Info Prices Page Template.
 *
 * @package erlebnisbad
 * @subpackage Section
 * @since 1.0.0
 */

?>
<section id="section-access" class="section-access bg-Mint waves waves__top-color--dark waves__bottom-color--dark pt-20 xl:pt-32 pb-16 md:pb-44 xl:pb-20">
    <div class="theme-container">
        <div class="theme-grid text-center justify-items-center">
            <div class="col-span-2 md:col-start-1 md:col-span-6 xl:col-start-5 xl:col-span-4">
                <h2 class="title-main text-Black pb-2 md:pb-9 xl:pb-8"><?php the_field( 'prices_info_access_title' ); ?></h2>
                <p class="text-Black pb-14 md:max-w-[593px]"><?php the_field( 'prices_info_access_text' ); ?></p>
            </div>
            <?php if ( have_rows( 'prices_info_access_items' ) ) : ?>
            <div class="col-span-2 md:col-span-6 xl:col-start-2 xl:col-span-10 section-intro__items flex flex-col items-center gap-7 md:flex-row md:flex-wrap md:justify-center md:items-stretch md:gap-9 xl:gap-24">
                <?php
                while ( have_rows( 'prices_info_access_items' ) ) :
                    the_row();
                    $intro_icon_id = get_sub_field( 'icon' );
                    $intro_text    = get_sub_field( 'text' );
                    ?>
                    <div class="section-intro__item flex flex-col items-center">
                        <?php if ( $intro_icon_id ) : ?>
                        <div class="section-intro__icon flex items-end justify-center h-[207px] pb-4 xl:pb-9">
                            <?php
                            echo wp_get_attachment_image(
                                $intro_icon_id,
                                'full',
                                false,
                                array( 'class' => 'object-contain max-h-full w-auto' )
                            );
                            ?>
                        </div>
                        <?php endif; ?>

                        <?php if ( $intro_text ) : ?>
                        <h3 class="title-secondary !text-2xl text-Black md:max-w-32 text-center"><?php echo esc_html( $intro_text ); ?></h3>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
