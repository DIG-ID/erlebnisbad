<?php
/**
 * Content Section in the Datenschutz Page Template.
 *
 * @package erlebnisbad
 * @subpackage Section
 * @since 1.0.0
 */

?>
<section id="section-datenschutz-content" class="section-datenschutz-content bg-white pt-20 md:pt-28 xl:pt-36 pb-20 md:pb-44 xl:pb-52">
    <div class="theme-container">

        <?php if ( get_field( 'datenschutz_intro' ) ) : ?>
            <div class="theme-grid pb-20 md:pb-28 xl:pb-36">
                <div class="col-span-2 md:col-start-2 md:col-span-4 xl:col-start-5 xl:col-span-4 text-center">
                    <p class="text-Black"><?php the_field( 'datenschutz_intro' ); ?></p>
                </div>
            </div>
        <?php endif; ?>

        <?php if ( have_rows( 'datenschutz_sections' ) ) : ?>
            <?php
            while ( have_rows( 'datenschutz_sections' ) ) :
                the_row();
                $title   = get_sub_field( 'title' );
                $content = get_sub_field( 'content' );
                ?>
                <div class="theme-grid pb-12 md:pb-16 xl:pb-20">
                    <?php if ( $title ) : ?>
                        <div class="col-span-2 md:col-span-6 xl:col-start-2 xl:col-span-4 pb-4 md:pb-8">
                            <h2 class="title-main text-Black max-w-[546px]"><?php echo esc_html( $title ); ?></h2>
                        </div>
                    <?php endif; ?>
                    <?php if ( $content ) : ?>
                        <div class="col-span-2 md:col-span-6 xl:col-start-6 xl:col-span-5 legal-content text-Black">
                            <?php echo wp_kses_post( $content ); ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>

    </div>
</section>
