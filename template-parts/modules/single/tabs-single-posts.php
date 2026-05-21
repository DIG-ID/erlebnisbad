<?php
/**
 * Module: Tabs Single Posts
 *
 * @package erlebnisbad
 * @subpackage Template
 * @since 1.0.0
 */

$tabs = get_field( 'tabs_items' );

if ( empty( $tabs ) ) {
	return;
}
?>
<section id="tabs-posts" class="tabs-posts py-12 md:py-16 xl:py-48">
	<div class="theme-container">
		<div class="tabs-posts__inner theme-grid !gap-x-0">

			<div class="tabs-posts__info-header order-1 xl:order-none col-span-2 md:col-span-6 xl:row-start-1 xl:col-start-2 xl:col-span-3 flex items-end">
				<h2 class="title-secondary text-black pb-4 border-b-[0.5px] border-Mint2 w-full"><?php the_field( 'tabs_info_title' ); ?></h2>
			</div>

			<div class="tabs-posts__info-body order-2 xl:order-none col-span-2 md:col-span-6 xl:row-start-2 xl:col-start-2 xl:col-span-3">
				<p class="text-[#373737] xl:max-w-[80%] pt-10 md:pt-14 pb-20 md:pb-28 xl:pb-0"><?php the_field( 'tabs_info_text' ); ?></p>
			</div>

			<?php // Mobile/tablet: paired accordion grid (2 cols, pair-independent switching). ?>
			<div class="tabs-posts__list xl:hidden order-3 col-span-2 md:col-span-6" role="tablist" aria-label="<?php esc_attr_e( 'Kurs-Informationen', 'digid' ); ?>">
				<?php foreach ( $tabs as $index => $tab ) : ?>
					<?php $active = in_array( $index, array( 0, 2 ), true ); ?>
					<div class="tabs-posts__item<?php echo $active ? ' is-active' : ''; ?>">
						<h2 class="tabs-posts__item-heading">
							<button class="title-secondary tabs-posts__nav-btn<?php echo $active ? ' is-active' : ''; ?>" role="tab" aria-selected="<?php echo $active ? 'true' : 'false'; ?>" aria-controls="tab-panel-m-<?php echo esc_attr( $index ); ?>">
								<?php echo esc_html( $tab['title'] ); ?>
							</button>
						</h2>
						<div id="tab-panel-m-<?php echo esc_attr( $index ); ?>" class="tabs-posts__panel<?php echo $active ? ' is-active' : ''; ?>" role="tabpanel" aria-hidden="<?php echo $active ? 'false' : 'true'; ?>">
							<?php echo wp_kses_post( $tab['content'] ); ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

			<?php // xl: nav buttons in row 1 (aligned with info-header), panel in row 2. ?>
			<div class="tabs-posts__nav hidden xl:flex xl:justify-between order-3 xl:order-none col-span-2 md:col-span-6 xl:row-start-1 xl:col-start-5 xl:col-span-7" role="tablist" aria-label="<?php esc_attr_e( 'Kurs-Informationen', 'digid' ); ?>">
				<?php foreach ( $tabs as $index => $tab ) : ?>
					<button class="title-secondary tabs-posts__nav-btn<?php echo 0 === $index ? ' is-active' : ''; ?>" role="tab" aria-selected="<?php echo 0 === $index ? 'true' : 'false'; ?>" aria-controls="tab-panel-xl-<?php echo esc_attr( $index ); ?>" data-index="<?php echo esc_attr( $index ); ?>">
						<?php echo esc_html( $tab['title'] ); ?>
					</button>
				<?php endforeach; ?>
			</div>

			<div class="tabs-posts__panels hidden xl:block col-span-2 md:col-span-6 xl:row-start-2 xl:col-start-5 xl:col-span-7">
				<?php foreach ( $tabs as $index => $tab ) : ?>
					<div id="tab-panel-xl-<?php echo esc_attr( $index ); ?>" class="tabs-posts__panel<?php echo 0 === $index ? ' is-active' : ''; ?>" role="tabpanel" aria-hidden="<?php echo 0 === $index ? 'false' : 'true'; ?>">
						<?php echo wp_kses_post( $tab['content'] ); ?>
					</div>
				<?php endforeach; ?>
			</div>

		</div>
	</div>
</section>
