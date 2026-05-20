<?php
/**
 * Module: Intro Text
 *
 * @package erlebnisbad
 * @subpackage Template
 * @since 1.0.0
 */

$intro_text = get_field( 'intro_text_text' );
if ( empty( $intro_text ) ) {
	return;
}
?>

<section id="intro-text" class="intro-text xl:pt-16 pb-20 xl:pb-0">
	<div class="theme-container">
		<div class="theme-grid">
      <div class="col-span-2 md:col-span-5 xl:col-span-4 xl:col-start-2">
        <p><?php the_field( 'intro_text_text' ); ?></p>
      </div>
    </div>
  </div>
</section>