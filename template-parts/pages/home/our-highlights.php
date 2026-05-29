<?php
/**
 * Our Highlights Section in the Home Page Template.
 *
 * @package erlebnisbad
 * @subpackage Section
 * @since 1.0.0
 */

?>
<section id="section-highlights" class="section-highlights bg-white">
    <div class="theme-container text-center pb-32 md:pb-40 xl:pb-48 pt-12 xl:pt-28">
        <h2 class="title-main text-Black pb-12 md:pb-14 xl:pb-28"><?php the_field( 'highlights_title' ); ?></h2>

        <?php if ( have_rows( 'highlights_items' ) ) : ?>
            <div class="grid grid-cols-2 gap-x-6 gap-y-10 items-stretch justify-items-center md:flex md:flex-row md:flex-wrap md:justify-center md:items-stretch md:gap-[130px]">
                <?php
                while ( have_rows( 'highlights_items' ) ) :
                    the_row();
                    $highlight_icon_id = get_sub_field( 'icon' );
                    $highlight_text    = get_sub_field( 'text' );
                    ?>
                    <div class="section-highlights__item flex flex-col items-center">
                        <?php if ( $highlight_icon_id ) : ?>
                            <div class="section-highlights__icon flex items-end justify-center h-[140px] md:h-[180px] xl:h-[220px] pb-5 md:pb-6 xl:pb-8">
                                <?php
                                echo wp_get_attachment_image(
                                    $highlight_icon_id,
                                    'full',
                                    false,
                                    array( 'class' => 'object-contain max-h-full w-auto' )
                                );
                                ?>
                            </div>
                        <?php endif; ?>

                        <?php if ( $highlight_text ) : ?>
                            <p class="text-Black"><?php echo esc_html( $highlight_text ); ?></p>
                        <?php endif; ?>
                    </div>
                    <?php
                endwhile;
                ?>
            </div>
        <?php endif; ?>
    </div>
</section>
