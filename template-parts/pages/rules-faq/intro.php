<?php
/**
 * Intro Section in the FAQ & Rules Template.
 *
 * @package erlebnisbad
 * @subpackage Section
 * @since 1.0.0
 */

?>
<section id="section-intro" class="section-intro bg-white">
  <div class="theme-container pt-28 xl:pt-52 pb-28 md:pb-52 xl:pb-72 text-center justify-items-center">
      <h2 class="title-main text-Black pb-8 md:pb-12 xl:pb-8 max-w-[319px] md:max-w-[584px]"><?php the_field( 'intro_title' ); ?></h2>
      <p class="text-Black max-w-[319px] md:max-w-[594px]"><?php the_field( 'intro_text' ); ?></p>
  </div>
</section>
