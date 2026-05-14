<?php
/**
 * Intro Section in the Bistro Page Template.
 *
 * @package erlebnisbad
 * @subpackage Section
 * @since 1.0.0
 */

?>
<section id="section-intro" class="section-intro bg-whitept-24 md:pt-20 pb-24 md:pb-44 xl:pb-32">
    <div class="theme-container">
        <div class="theme-grid text-center justify-items-center">
            <div class="col-span-2 md:col-start-2 md:col-span-4 xl:col-start-5 xl:col-span-4">
                <p class="text-Black pb-20 md:pb-24"><?php the_field( 'intro_text' ); ?></p>
            </div>
            <div class="col-span-2 md:col-start-1 md:col-span-6 xl:col-start-3 xl:col-span-8 pb-24 md:pb-36 xl:pb-28">
                <?php
                $img_id = get_field( 'intro_image' );
                if ( $img_id ) :
                    echo wp_get_attachment_image(
                        $img_id,
                        'full',
                        false,
                        array( 'class' => 'object-cover' )
                    );
                endif;
                ?>
            </div>
            <?php if ( have_rows( 'intro_items' ) ) : ?>
            </div>
      <div class="section-intro__items flex flex-col items-center gap-7 md:flex-row md:flex-wrap md:justify-center md:items-stretch md:gap-9 xl:gap-24">
        <?php
            while ( have_rows( 'intro_items' ) ) :
            the_row();
            $intro_icon_id = get_sub_field( 'icon' );
            $intro_text    = get_sub_field( 'text' );
            ?>
            <div class="section-intro__item flex flex-col items-center">
                <?php if ( $intro_icon_id ) : ?>
                <div class="section-intro__icon flex items-end justify-center h-[140px] md:h-[180px] xl:h-[220px] pb-4 md:pb-6 xl:pb-8">
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
                <p class="text-Black md:max-w-32 text-center"><?php echo esc_html( $intro_text ); ?></p>
                <?php endif; ?>
            </div>
            <?php
            endwhile;
            ?>
        </div>
        <?php endif; ?>
        </div>
    </div>
</section>
            