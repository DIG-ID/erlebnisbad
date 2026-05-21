<?php
/**
 * FAQ Cards Section in the FAQ & Rules Template.
 *
 * @package erlebnisbad
 * @subpackage Section
 * @since 1.0.0
 */

?>
<?php if ( have_rows( 'faq_faq' ) ) : ?>
<section id="section-faq" class="section-faq bg-Mint1 waves waves__top--color waves__bottom--color">
    <div class="theme-container pb-52 md:pb-56 xl:pb-36 pt-32 xl:pt-8">
        <div class="theme-grid gap-y-12 md:gap-y-10 xl:gap-y-12">
            <div class="col-span-2 md:col-start-1 md:col-span-6 xl:col-start-2 xl:col-span-10">
                <p class="text-Black pb-4"><?php the_field( 'faq_overtitle' ); ?></p>
                <h2 class="title-main text-Black pb-14"><?php the_field( 'faq_title' ); ?></h2>
            </div>

            <?php
            // Desktop layout (cards live in cols 2-10 of the 12-col theme-grid):
            //   Row 1: title spans cols 2-11 (full content width).
            //   Row 2: wide first card (cols 2-7, span 6) + narrow card auto-flows next to it (cols 8-10, span 3).
            //   Subsequent rows: 3 narrow cards. First card of each new row gets xl:col-start-2 to skip col 1.
            $index = 0;
            while ( have_rows( 'faq_faq' ) ) :
                the_row();
                $question = get_sub_field( 'question' );
                $answer   = get_sub_field( 'answer' );
                if ( 0 === $index ) {
                    $col_class = 'col-span-2 md:col-span-3 xl:col-start-2 xl:col-span-6';
                } elseif ( $index >= 2 && 0 === ( $index - 2 ) % 3 ) {
                    $col_class = 'col-span-2 md:col-span-3 xl:col-start-2 xl:col-span-3';
                } else {
                    $col_class = 'col-span-2 md:col-span-3 xl:col-span-3';
                }
                $index++;
                ?>
                <article class="faq-card <?php echo esc_attr( $col_class ); ?>">
                    <?php if ( $question ) : ?>
                        <p class="faq-card__question"><?php echo esc_html( $question ); ?></p>
                    <?php endif; ?>
                    <?php if ( $answer ) : ?>
                        <div class="faq-card__answer"><?php echo wp_kses_post( $answer ); ?></div>
                    <?php endif; ?>
                </article>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php endif; ?>
