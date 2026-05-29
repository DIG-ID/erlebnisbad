<?php
/**
 * Content Section in the AGB Page Template.
 *
 * @package erlebnisbad
 * @subpackage Section
 * @since 1.0.0
 */

?>
<section id="section-agb-content" class="section-agb-content bg-white pt-12 md:pt-28 xl:pt-36 pb-32 md:pb-44 xl:pb-52">
    <div class="theme-container">
        <div class="theme-grid gap-y-12 md:gap-y-16 xl:gap-y-[100px]">

            <?php if ( get_field( 'agb_title' ) ) : ?>
                <h2 class="col-span-2 md:col-span-6 xl:col-start-2 xl:col-span-5 title-main text-Black"><?php the_field( 'agb_title' ); ?></h2>
            <?php endif; ?>

            <?php if ( have_rows( 'agb_items' ) ) : ?>
                <?php
                while ( have_rows( 'agb_items' ) ) :
                    the_row();
                    $title   = get_sub_field( 'title' );
                    $content = get_sub_field( 'content' );
                    ?>
                    <div class="col-span-2 md:col-span-6 xl:col-start-7 xl:col-span-4">
                        <?php if ( $title ) : ?>
                            <h3 class="arrival-card-title text-Black pb-[10px]"><?php echo esc_html( $title ); ?></h3>
                        <?php endif; ?>
                        <?php if ( $content ) : ?>
                            <div class="legal-content text-Black">
                                <?php echo wp_kses_post( $content ); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>

        </div>
    </div>
</section>
