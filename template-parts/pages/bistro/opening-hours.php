<?php
/**
 * Opening Hours Section in the Bistro Page Template.
 *
 * @package erlebnisbad
 * @subpackage Section
 * @since 1.0.0
 */
?>
<section id="section-opening-hours" class="section-opening-hours bg-white pt-12 md:pt-36 xl:pt-32 pb-32 md:pb-44 xl:pb-36">
  <div class="theme-container">
    <div class="theme-grid">

        <div class="col-span-2 md:col-span-6 xl:col-start-2 xl:col-span-4">
            <p class="text-Black pb-2 md:pb-5 xl:pb-4"><?php the_field( 'opening_hours_overtitle' ); ?></p>
        </div>
        <div class="col-span-2 md:col-span-6 xl:col-start-2 xl:col-span-4">
            <h2 class="title-main text-Black pb-2 md:pb-6 xl:pb-8"><?php the_field( 'opening_hours_title' ); ?></h2>
            <p class="text-Black"><?php the_field( 'opening_hours_text' ); ?></p>
        </div>
        
        <div class="col-span-2 md:col-span-6 xl:col-start-7 xl:col-span-6 pt-8 md:pt-14 xl:pt-0">
            <p class="text-Black"><?php the_field( 'opening_hours_schedule' ); ?></p>
        </div>

    </div>
  </div>
</section>