<?php
/**
 * Intro Section in the About Us Page Template.
 *
 * @package erlebnisbad
 * @subpackage Section
 * @since 1.0.0
 */

?>
<section id="section-intro" class="section-intro bg-white pt-20 xl:pt-24 pb-32 md:pb-40 xl:pb-16">
  <div class="theme-container justify-items-center text-center">
    <p class="title-main text-Black pb-8 max-w-[594px] xl:max-w-[744px]"><?php the_field( 'intro_title' ); ?></p>
    <p class="text-Black max-w-72 md:max-w-[500px] xl:max-w-[593px]"><?php the_field( 'intro_text' ); ?></p>
  </div>
</section>
    