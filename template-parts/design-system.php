<?php
/**
 * The Design System Content Section for development reference.
 *
 * @package erlebnisbad
 * @subpackage Section
 * @since 1.0.0
 */

?>
<section class="design-system py-16">
	<div class="theme-container">

		<div class="theme-grid">

			<?php // Column 1 — Colors. ?>
			<div class="col-span-2 md:col-span-3 xl:col-span-3 px-4 xl:px-8 border-Black xl:border-r">
				<h2 class="title-main mb-10"><?php esc_html_e( 'Colors', 'digid' ); ?></h2>
				<ul class="space-y-6">
					<li class="flex items-center gap-4">
						<span class="w-[6.25rem] h-[6.25rem] rounded-full bg-Mint1 shrink-0"></span>
						<span class="font-openSans text-[0.9375rem]">#BCEBDF — Mint 1</span>
					</li>
					<li class="flex items-center gap-4">
						<span class="w-[6.25rem] h-[6.25rem] rounded-full bg-Mint2 shrink-0"></span>
						<span class="font-openSans text-[0.9375rem]">#A1DBD0 — Mint 2</span>
					</li>
					<li class="flex items-center gap-4">
						<span class="w-[6.25rem] h-[6.25rem] rounded-full bg-Mint3 shrink-0"></span>
						<span class="font-openSans text-[0.9375rem]">#96DAC8 — Mint 3</span>
					</li>
					<li class="flex items-center gap-4">
						<span class="w-[6.25rem] h-[6.25rem] rounded-full bg-Mint shrink-0"></span>
						<span class="font-openSans text-[0.9375rem]">#66C2B0 — Mint</span>
					</li>
					<li class="flex items-center gap-4">
						<span class="w-[6.25rem] h-[6.25rem] rounded-full bg-DarkGreen shrink-0"></span>
						<span class="font-openSans text-[0.9375rem]">#0C3B38 — Dark Green</span>
					</li>
					<li class="flex items-center gap-4">
						<span class="w-[6.25rem] h-[6.25rem] rounded-full bg-white border border-Black shrink-0"></span>
						<span class="font-openSans text-[0.9375rem]">#FFFFFF — White</span>
					</li>
					<li class="flex items-center gap-4">
						<span class="w-[6.25rem] h-[6.25rem] rounded-full bg-Black shrink-0"></span>
						<span class="font-openSans text-[0.9375rem]">#131313 — Black</span>
					</li>
					<li class="flex items-center gap-4">
						<span class="w-[6.25rem] h-[6.25rem] rounded-full bg-Red shrink-0"></span>
						<span class="font-openSans text-[0.9375rem]">#E02E52 — Red</span>
					</li>
				</ul>
			</div>

			<?php // Column 2 — Titles. ?>
			<div class="col-span-2 md:col-span-3 xl:col-span-3 px-4 xl:px-8 border-Black xl:border-r mt-12 md:mt-0">
				<h2 class="title-main mb-10"><?php esc_html_e( 'Titles', 'digid' ); ?></h2>

				<p class="font-openSans text-Brown text-[1.125rem] mb-4"><?php esc_html_e( 'Desktop + Tablet', 'digid' ); ?></p>
				<h1 class="title-main mb-2"><?php esc_html_e( 'H1 Title', 'digid' ); ?></h1>
				<h2 class="title-secondary mb-12"><?php esc_html_e( 'H2 Title', 'digid' ); ?></h2>

				<p class="font-openSans text-Brown text-[1.125rem] mb-4"><?php esc_html_e( 'Mobile', 'digid' ); ?></p>
				<h1 class="font-raleway text-[1.875rem] italic leading-[2.5rem] tracking-[0.03125rem] mb-2"><?php esc_html_e( 'H1 Title', 'digid' ); ?></h1>
				<h2 class="font-raleway text-[1.125rem] leading-[1.6875rem] tracking-[-0.02138rem]"><?php esc_html_e( 'H2 Title', 'digid' ); ?></h2>
			</div>

			<?php // Column 3 — Paragraphs. ?>
			<div class="col-span-2 md:col-span-3 xl:col-span-3 px-4 xl:px-8 border-Black xl:border-r mt-12 xl:mt-0">
				<h2 class="title-main mb-2"><?php esc_html_e( 'Paragraphs', 'digid' ); ?></h2>
				<p class="font-openSans text-Brown text-[1.125rem] mb-10"><?php esc_html_e( 'Open Sans', 'digid' ); ?></p>

				<p class="font-openSans text-Brown text-[1.125rem] mb-4"><?php esc_html_e( 'Desktop + Tablet', 'digid' ); ?></p>
				<p class="body mb-2"><?php esc_html_e( 'Text', 'digid' ); ?></p>
				<p class="body mb-12">
					<?php esc_html_e( '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur."', 'digid' ); ?>
				</p>

				<p class="font-openSans text-Brown text-[1.125rem] mb-4"><?php esc_html_e( 'Mobile', 'digid' ); ?></p>
				<p class="font-openSans text-[0.875rem] leading-[1.5625rem] tracking-[0.03125rem] mb-2"><?php esc_html_e( 'Text', 'digid' ); ?></p>
				<p class="font-openSans text-[0.875rem] leading-[1.5625rem] tracking-[0.03125rem]">
					<?php esc_html_e( '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris."', 'digid' ); ?>
				</p>
			</div>

			<?php // Column 4 — Buttons. ?>
			<div class="col-span-2 md:col-span-3 xl:col-span-3 px-4 xl:px-8 mt-12 xl:mt-0">
				<h2 class="title-main mb-10"><?php esc_html_e( 'Buttons', 'digid' ); ?></h2>

				<a href="#" class="btn btn-primary mb-8"><?php esc_html_e( 'Mehr erfahren', 'digid' ); ?></a>
				<a href="#" class="btn btn-link"><?php esc_html_e( 'Anreise & Kontakt', 'digid' ); ?></a>
			</div>

			<?php // Column 5 — Icones. ?>
			<?php
			$svg_dir  = get_stylesheet_directory_uri() . '/assets/svg';
			$icons = array(
				'aqua-sport',
				'beach-chair',
				'bus-station',
				'calendar',
				'car',
				'children',
				'cutlery',
				'dinner',
				'family',
				'key',
				'mountains',
				'pedestrian',
				'pool-rail',
				'running',
				'teamwork',
				'wellness',
				'winner',
			);
			?>
			<div class="col-span-2 md:col-span-3 xl:col-span-3 px-4 xl:px-8 border-Black xl:border-r mt-12 xl:border-l">
				<h2 class="title-main mb-10"><?php esc_html_e( 'Icones', 'digid' ); ?></h2>

				<div class="grid grid-cols-3 gap-3 md:gap-4">
					<?php foreach ( $icons as $icon ) : ?>
						<div class="aspect-square flex items-center justify-center">
							<img
								src="<?php echo esc_url( $svg_dir . '/' . $icon . '.svg' ); ?>"
								alt="<?php echo esc_attr( $icon ); ?>"
								class="w-16 md:w-24 xl:w-32 h-auto max-w-full"
								loading="lazy"
							/>
						</div>
					<?php endforeach; ?>
				</div>
			</div>

			<?php // Column 6 — Logos. ?>
			<?php
			$theme_logo        = get_field( 'general_theme_logo', 'option' );
			$theme_logo_footer = get_field( 'general_theme_logo_footer', 'option' );
			$theme_logo_dark   = get_field( 'general_theme_logo_dark', 'option' );
			?>
			<div class="col-span-2 md:col-span-3 xl:col-span-3 px-4 xl:px-8 mt-12">
				<h2 class="title-main mb-10"><?php esc_html_e( 'Logos', 'digid' ); ?></h2>

				<ul class="space-y-6">
					<?php if ( $theme_logo ) : ?>
						<li>
							<p class="font-openSans text-Brown text-[1.125rem] mb-4"><?php esc_html_e( 'Theme Logo', 'digid' ); ?></p>
							<div class="p-6 bg-white border border-Black/10 flex items-center justify-center min-h-[8rem]">
								<?php echo wp_get_attachment_image( $theme_logo, 'full', false, array( 'class' => 'max-w-full h-auto' ) ); ?>
							</div>
						</li>
					<?php endif; ?>

					<?php if ( $theme_logo_footer ) : ?>
						<li>
							<p class="font-openSans text-Brown text-[1.125rem] mb-4"><?php esc_html_e( 'Theme Logo — Footer', 'digid' ); ?></p>
							<div class="p-6 flex items-center justify-center min-h-[8rem]">
								<?php echo wp_get_attachment_image( $theme_logo_footer, 'full', false, array( 'class' => 'max-w-full h-auto' ) ); ?>
							</div>
						</li>
					<?php endif; ?>

					<?php if ( $theme_logo_dark ) : ?>
						<li>
							<p class="font-openSans text-Brown text-[1.125rem] mb-4"><?php esc_html_e( 'Theme Logo — Dark', 'digid' ); ?></p>
							<div class="p-6 bg-Black flex items-center justify-center min-h-[8rem]">
								<?php echo wp_get_attachment_image( $theme_logo_dark, 'full', false, array( 'class' => 'max-w-full h-auto' ) ); ?>
							</div>
						</li>
					<?php endif; ?>
				</ul>
			</div>

		</div>
	</div>
</section>
