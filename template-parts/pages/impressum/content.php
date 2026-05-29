<?php
/**
 * Content Section in the Impressum Page Template.
 *
 * @package erlebnisbad
 * @subpackage Section
 * @since 1.0.0
 */

?>
<section id="section-impressum-content" class="section-impressum-content bg-white pt-12 md:pt-28 xl:pt-36 pb-32 md:pb-44 xl:pb-52">
    <div class="theme-container">

        <?php if ( have_rows( 'impressum' ) ) : ?>
            <div class="theme-grid gap-y-12 md:gap-y-14 xl:gap-y-0">
                <?php
                $index = 0;
                while ( have_rows( 'impressum' ) ) :
                    the_row();
                    $title   = get_sub_field( 'title' );
                    $content = get_sub_field( 'content' );
                    // First item starts at xl col 2; subsequent items auto-flow next to it.
                    $col_class = ( 0 === $index )
                        ? 'col-span-2 md:col-span-3 xl:col-start-2 xl:col-span-3'
                        : 'col-span-2 md:col-span-3 xl:col-span-3';
                    $index++;
                    ?>
                    <div class="<?php echo esc_attr( $col_class ); ?>">
                        <?php if ( $title ) : ?>
                            <h3 class="arrival-card-title text-Black pb-6 md:pb-8"><?php echo esc_html( $title ); ?></h3>
                        <?php endif; ?>
                        <?php if ( $content ) : ?>
                            <div class="legal-content text-Black">
                                <?php echo wp_kses_post( $content ); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>

    </div>
</section>
