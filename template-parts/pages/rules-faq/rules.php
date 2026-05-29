<?php
/**
 * Rules Cards Section in the FAQ & Rules Template.
 *
 * @package erlebnisbad
 * @subpackage Section
 * @since 1.0.0
 */

$rules = get_field( 'rules_rules' );
if ( ! empty( $rules ) && is_array( $rules ) ) :
    $total = count( $rules );
    ?>
<section id="section-rules" class="section-rules bg-white">
    <div class="theme-container pb-32 md:pb-56 xl:pb-36 pt-12 xl:pt-8">
        <div class="theme-grid gap-y-12 md:gap-y-10 xl:gap-y-12">
            <div class="col-span-2 md:col-start-1 md:col-span-6 xl:col-start-2 xl:col-span-10">
                <p class="text-Black pb-4"><?php the_field( 'rules_overtitle' ); ?></p>
                <h2 class="title-main text-Black xl:pb-14"><?php the_field( 'rules_title' ); ?></h2>
            </div>

            <?php
            // Desktop layout (cards live in cols 2-10 of the 12-col theme-grid):
            //   Row 1: title spans cols 2-11 (full content width).
            //   Subsequent rows: 3 narrow cards each. First card of each row gets xl:col-start-2 to skip col 1.
            //   Last card: xl:col-start-2 xl:col-span-6 (wide card at the bottom, cols 2-7).
            foreach ( $rules as $index => $row ) :
                $question = isset( $row['question'] ) ? $row['question'] : '';
                $answer   = isset( $row['answer'] ) ? $row['answer'] : '';
                $is_last  = ( $index === $total - 1 );

                if ( $is_last && 1 === $index % 3 ) {
                    // Last card auto-flows into the remaining 6 cells of the current row (cols 5-10).
                    $col_class = 'col-span-2 md:col-span-3 xl:col-span-6';
                } elseif ( $is_last ) {
                    // Last card starts a new row at col-start-2, spanning 6 cells (cols 2-7).
                    $col_class = 'col-span-2 md:col-span-3 xl:col-start-2 xl:col-span-6';
                } elseif ( 0 === $index % 3 ) {
                    // First card of a new row → force col-start-2 to skip col 1.
                    $col_class = 'col-span-2 md:col-span-3 xl:col-start-2 xl:col-span-3';
                } else {
                    $col_class = 'col-span-2 md:col-span-3 xl:col-span-3';
                }
                ?>
                <article class="faq-card <?php echo esc_attr( $col_class ); ?>">
                    <?php if ( $question ) : ?>
                        <p class="faq-card__question"><?php echo esc_html( $question ); ?></p>
                    <?php endif; ?>
                    <?php if ( $answer ) : ?>
                        <div class="faq-card__answer"><?php echo wp_kses_post( $answer ); ?></div>
                    <?php endif; ?>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>
