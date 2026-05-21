<?php
/**
 * Opening Hours Section in the Info Prices Page Template.
 *
 * @package erlebnisbad
 * @subpackage Section
 * @since 1.0.0
 */

?>
<section id="section-opening-hours" class="section-opening-hours bg-white pb-12 xl:pb-20">
	<div class="theme-container">
		<div class="theme-grid pb-24 md:pb-28 xl:pb-36">
			<div class="col-span-2 md:col-start-1 md:col-span-3 xl:col-start-2 xl:col-span-4">
				<p class="text-Black pb-2 md:pb-5 xl:pb-4"><?php the_field( 'opening_hours_general_overtitle' ); ?></p> 
			</div>
			<div class="col-span-2 md:col-start-1 md:col-span-3 xl:col-start-2 xl:col-span-4">
				<h2 class="title-main text-Black pb-2 md:pb-0"><?php the_field( 'opening_hours_general_title' ); ?></h2>
			</div>
			<div class="col-span-2 md:col-start-4 md:col-span-3 xl:col-start-8 xl:col-span-4">
				<p class="text-Black"><?php the_field( 'opening_hours_general_text' ); ?></p>
				<p class="text-Black pt-8 md:pt-12 xl:pt-14 hidden xl:block"><?php the_field( 'opening_hours_general_schedule' ); ?></p>  
			</div>
			<div class="col-span-2 md:col-start-1 md:col-span-6 xl:hidden">
				<p class="text-Black pt-8 md:pt-12 xl:pt-14"><?php the_field( 'opening_hours_general_schedule' ); ?></p>
			</div>
		</div>
	</div>
	<?php do_action( 'wave_separator' ); ?>
	<div class="theme-container">
		<div class="theme-grid pt-20 md:pt-28 xl:pt-36 pb-24 md:pb-28 xl:pb-40">
			<div class="col-span-2 md:col-start-1 md:col-span-3 xl:col-start-2 xl:col-span-4">
				<h2 class="title-main text-Black pb-7 md:pb-0"><?php the_field( 'opening_hours_sauna_title' ); ?></h2>
			</div>
			<div class="col-span-2 md:col-start-4 md:col-span-3 xl:col-start-8 xl:col-span-4">
				<p class="text-Black"><?php the_field( 'opening_hours_sauna_text' ); ?></p>
			</div>
		</div>
	</div>
	<?php do_action( 'wave_separator', 2 ); ?>
	<div class="theme-container">
		<div class="theme-grid pt-24 md:pt-28 pb-24 md:pb-32 xl:pb-52">
			<div class="col-span-2 md:col-start-1 md:col-span-3 xl:col-start-2 xl:col-span-4">
				<h2 class="title-main text-Black pb-7 md:pb-0"><?php the_field( 'opening_hours_holidays_title' ); ?></h2>
			</div>
			<div class="col-span-2 md:col-start-4 md:col-span-3 xl:col-start-8 xl:col-span-2">
				<p class="text-Black"><?php the_field( 'opening_hours_holidays_text' ); ?></p>
			</div>
			<div class="col-span-2 md:col-start-4 md:col-span-3 xl:col-start-10 xl:col-span-2">
				<p class="text-Black"><?php the_field( 'opening_hours_holidays_text_2' ); ?></p>
			</div>
		</div>
	</div>
</section>
			