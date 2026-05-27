<?php
/**
 * Team Section in the About Us Page Template.
 *
 * @package erlebnisbad
 * @subpackage Section
 * @since 1.0.0
 */

?>
<section id="section-team" class="section-team bg-white pt-20 md:pt-28 xl:pt-36 pb-32 md:pb-44 xl:pb-52">
    <div class="theme-container">
        <div class="theme-grid gap-y-16 md:gap-y-20 xl:gap-y-24">

            <div class="col-span-2 md:col-span-6 xl:col-start-2 xl:col-span-9">
                <?php if ( get_field( 'team_overtitle' ) ) : ?>
                    <p class="overtitle text-Black pb-4"><?php the_field( 'team_overtitle' ); ?></p>
                <?php endif; ?>
                <?php if ( get_field( 'team_title' ) ) : ?>
                    <h2 class="title-main text-Black"><?php the_field( 'team_title' ); ?></h2>
                <?php endif; ?>
            </div>

            <?php if ( have_rows( 'team_members' ) ) : ?>
                <div class="col-span-2 md:col-span-6 xl:col-start-2 xl:col-span-9">
                    <div class="grid grid-cols-2 md:grid-cols-6 xl:grid-cols-9 gap-x-5 md:gap-x-4 xl:gap-x-5 gap-y-16 md:gap-y-20 xl:gap-y-24">
                        <?php
                        $team_index = 0;
                        while ( have_rows( 'team_members' ) ) :
                            the_row();
                            $picture_id = get_sub_field( 'picture' );
                            $name       = get_sub_field( 'name' );
                            $role       = get_sub_field( 'position' );
                            $shape      = ( $team_index % 6 ) + 1; // Cycle shape-bg--1 → --6.
                            ++$team_index;
                            ?>
                            <article class="col-span-2 md:col-span-3 xl:col-span-3 section-team__card flex flex-col items-center text-center">
                                <?php if ( $picture_id ) : ?>
                                    <figure class="shape-bg shape-bg__img shape-bg--<?php echo (int) $shape; ?> before:bg-Mint2 w-full max-w-[320px] mb-8">
                                        <?php
                                        echo wp_get_attachment_image(
                                            $picture_id,
                                            'full',
                                            false,
                                            array(
                                                'loading' => 'lazy',
                                                'alt'     => esc_attr( $name ),
                                            )
                                        );
                                        ?>
                                    </figure>
                                <?php endif; ?>
                                <?php if ( $name ) : ?>
                                    <h3 class="arrival-card-title text-Black"><?php echo esc_html( $name ); ?></h3>
                                <?php endif; ?>
                                <?php if ( $role ) : ?>
                                    <p class="text-Black"><?php echo esc_html( $role ); ?></p>
                                <?php endif; ?>
                            </article>
                        <?php endwhile; ?>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>
