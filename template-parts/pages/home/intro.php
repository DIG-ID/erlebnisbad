<?php
/**
 * Intro Section in the Home Page Template.
 *
 * @package erlebnisbad
 * @subpackage Section
 * @since 1.0.0
 */

?>
<section id="section-intro" class="section-intro bg-white">

  <div class="theme-container pt-36 md:pt-24 xl:pt-36 pb-32 md:pb-24 xl:pb-36">
    <div class="theme-grid text-center justify-items-center">
        <div class="col-span-2 md:col-start-1 md:col-span-6 xl:col-start-4 xl:col-span-6">
            <h2 class="title-main text-Black pb-8 md:pb-12 xl:pb-10 max-w-[300px] md:max-w-[630px] xl:max-w-[760px]"><?php the_field( 'intro_title' ); ?></h2>
        </div>
        <div class="col-span-2 md:col-start-2 md:col-span-4 xl:col-start-4 xl:col-span-6">
            <p class="text-Black"><?php the_field( 'intro_text' ); ?></p>
        </div>
    </div>
  </div>
</section>
