<?php
/**
 * Hero Section in the Home Page Template.
 *
 * @package erlebnisbad
 * @subpackage Section
 * @since 1.0.0
 */

$images       = get_field( 'hero_image' ) ?: [];
$id_desktop   = ! empty( $images['desktop'] ) ? $images['desktop'] : null;
$id_tablet    = ! empty( $images['tablet'] )  ? $images['tablet']  : $id_desktop;
$id_mobile    = ! empty( $images['mobile'] )  ? $images['mobile']  : $id_tablet;
$id_fallback  = $id_desktop ?? $id_tablet ?? $id_mobile;
$ticker_text  = get_field( 'hero_enable_news_ticker' ) ? get_field( 'hero_news_ticker' ) : '';
?>

<section class="section-hero w-full h-svh max-h-[1045px] flex flex-col transition-all duration-300 ease-in-out<?php echo $ticker_text ? ' has-ticker' : ''; ?>">

	<div class="section-hero__media relative flex-1">

		<figure class="section-hero__figure absolute inset-0 bg-[#0C3B39]">

			<?php if ( $id_fallback ) : ?>
			<picture class="section-hero__picture">
				<source
					media="(max-width: 767px)"
					srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( $id_mobile, 'full' ) ); ?>"
					sizes="100vw"
				>
				<source
					media="(max-width: 1279px)"
					srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( $id_tablet, 'full' ) ); ?>"
					sizes="100vw"
				>
				<?php
				echo wp_get_attachment_image(
					$id_fallback,
					'full',
					false,
					array(
						'loading'       => 'eager',
						'fetchpriority' => 'high',
					)
				);
				?>
			</picture>
			<div class="section-hero__overlay" aria-hidden="true"></div>
			<?php endif; ?>

		</figure>

		<div class="section-hero__content absolute inset-0 flex items-end text-white">
			<div class="theme-container flex flex-col gap-4 pb-32">

				<div class="xl:flex xl:justify-between xl:items-center">
					
					<?php
					if ( get_field( 'hero_overtitle_option' ) === 'custom' ) :
						?><p class="overline-hero"><?php the_field( 'hero_overtitle' ); ?></p><?php
					elseif ( get_field( 'hero_overtitle_option' ) === 'default' ) :
						?><p class="overline-hero"><?php esc_html_e( 'Ganzjähriger Badespass inmitten der Bergwelt', 'erlebnisbad' ); ?></p><?php
					endif;
					?>

					<div class="hidden xl:block">
						<?php
						if ( get_field( 'hero_button_option' ) === 'custom' ) :
							$custom_link = get_field('hero_button');
							if( $custom_link ): 
									$link_url = $custom_link['url'];
									$link_title = $custom_link['title'];
									$link_target = $custom_link['target'] ? $custom_link['target'] : '_self';
									?>
									<a class="btn btn-primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
							<?php endif;
						elseif ( get_field( 'hero_button_option' ) === 'default' ) :
							$link = get_field( 'general_tickets_btn', 'option' );
							if( $link ): 
									$link_url = $link['url'];
									$link_title = $link['title'];
									$link_target = $link['target'] ? $link['target'] : '_self';
									?>
									<a class="btn btn-primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
							<?php endif;
						endif;
						?>
					</div>

				</div>

				<?php
				$title_col_span_map = array(
					'6'  => 'xl:col-span-6',
					'7'  => 'xl:col-span-7',
					'8'  => 'xl:col-span-8',
					'9'  => 'xl:col-span-9',
					'10' => 'xl:col-span-10',
					'11' => 'xl:col-span-11',
					'12' => 'xl:col-span-12',
				);
				$title_col_span_key = get_field( 'hero_title_column_span' );
				$title_col_span     = isset( $title_col_span_map[ $title_col_span_key ] ) ? $title_col_span_map[ $title_col_span_key ] : 'xl:col-span-12';
				?>
				<div class="theme-grid">
					<div class="col-start-1 col-span-2 md:col-span-6 <?php echo esc_attr( $title_col_span ); ?>">
						<?php
						if ( get_field( 'hero_title_option' ) === 'custom' ) :
							?><h1 class="title-big"><?php the_field( 'hero_title' ); ?></h1><?php
						elseif ( get_field( 'hero_title_option' ) === 'default' ) :
							?><h1 class="title-big"><?php the_title(); ?></h1><?php
						endif;
						?>
					</div>
				</div>

				<?php
				if ( get_field( 'hero_button_option' ) === 'custom' ) :
					$custom_link = get_field('hero_button');
					if( $custom_link ): 
							$link_url = $custom_link['url'];
							$link_title = $custom_link['title'];
							$link_target = $custom_link['target'] ? $custom_link['target'] : '_self';
							?>
							<a class="btn btn-primary mt-7 md:mt-8 md:self-start xl:hidden" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
					<?php endif;
				elseif ( get_field( 'hero_button_option' ) === 'default' ) :
					$link = get_field( 'general_tickets_btn', 'option' );
					if( $link ): 
							$link_url = $link['url'];
							$link_title = $link['title'];
							$link_target = $link['target'] ? $link['target'] : '_self';
							?>
							<a class="btn btn-primary mt-7 md:mt-8 md:self-start xl:hidden" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
					<?php endif;
				endif;
				?>

			</div>
		</div>

	</div>
	
	<?php if ( $ticker_text ) : ?>
	<div class="news-ticker" aria-label="<?php echo esc_attr( $ticker_text ); ?>">
		<div class="news-ticker__track">
			<span class="news-ticker__item" aria-hidden="true"><?php echo esc_html( $ticker_text ); ?></span>
			<span class="news-ticker__item" aria-hidden="true"><?php echo esc_html( $ticker_text ); ?></span>
		</div>
	</div>
	<?php endif; ?>
	
	<?php if ( ! $ticker_text ) : ?>
	<div class="section-hero__waves" aria-hidden="true">

		<svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1920 112" fill="none" class="hidden xl:block stroke-Mint">
			<path vector-effect="non-scaling-stroke" stroke-width="1" fill="none" d="M0 34.278c177.226-13.588 415.148-21.865 704.479 2.616C1077.92 68.492 1374.62 139.138 1920 97.379"/>
			<path vector-effect="non-scaling-stroke" stroke-width="1" fill="none" d="M0 24.898c129.904-13.713 366.954-40.302 688.542-13.164C1034.17 40.901 1292.27 114.468 1920 20.26"/>
		</svg>

		<svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 834 78" fill="none" class="hidden md:block xl:hidden stroke-Mint">
			<path vector-effect="non-scaling-stroke" stroke-width="1" fill="none" d="M0 27.5697C76.6105 21.795 163.846 20.8075 261.008 29.1947C333.358 35.4401 401.244 45.8467 470.663 55.2689C540.088 64.692 611.061 73.133 689.62 75.4574C734.846 76.7955 782.589 76.1047 834 72.4076"/>
			<path vector-effect="non-scaling-stroke" stroke-width="1" fill="none" d="M0 8.67224C69.385 0.292662 153.135 -3.75241 250.021 4.57556C304.374 9.24755 355.375 17.0375 407.52 24.0892C459.67 31.1418 512.979 37.4577 571.986 39.1908C646.999 41.394 731.233 36.1881 834 15.6635"/>
		</svg>

		<svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 397 49" fill="none" class="block md:hidden stroke-Mint">
			<path vector-effect="non-scaling-stroke" stroke-width="1" fill="none" d="M0 22.7432C39.5866 18.2382 83.9886 16.7359 133.104 20.6036C175.153 23.9148 214.858 30.5673 255.371 36.4161C295.892 42.266 337.239 47.3148 382.62 47.4346C387.368 47.4471 392.16 47.4049 397 47.3047"/>
			<path vector-effect="non-scaling-stroke" stroke-width="1" fill="none" d="M0 6.82524C35.7565 0.917851 77.6237 -2.09297 125.433 1.64848C157.024 4.12075 186.854 9.09688 217.282 13.4698C247.718 17.8438 278.77 21.6173 312.852 21.6973C338.787 21.7582 366.483 19.6762 397 14.0918"/>
		</svg>

	</div>
	<?php endif; ?>

</section>
