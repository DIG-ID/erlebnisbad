<?php
/**
 * Maps Section in the Arrival & Contact Page Template.
 *
 * @package erlebnisbad
 * @subpackage Section
 * @since 1.0.0
 */

?>
<section id="section-maps-contact" class="section-maps-contact bg-white pt-12 xl:pt-20 pb-20 md:pb-32 xl:pb-52">
	<div class="theme-container">
		<div class="theme-grid justify-items-center text-center pb-20 md:pb-32">
			<div class="col-span-2 md:col-span-6 xl:col-start-5 xl:col-span-4">
				<p class="text-Black max-w-80 md:max-w-[593px] xl:max-w-none"><?php the_field( 'maps_contact_text' ); ?></p>
			</div>
		</div>
		<div class="theme-grid">
			<div class="col-span-2 md:col-start-1 md:col-span-6 xl:col-start-2 xl:col-span-10 rounded-2xl border-2 border-Mint overflow-hidden">
				<?php $location = get_field( 'maps_contact_location' ); ?>
				<?php if ( $location && ! empty( $location['lat'] ) && ! empty( $location['lng'] ) ) : ?>
				<div class="acf-map" data-zoom="17" data-zoom-mobile="16">
					<div class="marker"
						data-lat="<?php echo esc_attr( $location['lat'] ); ?>"
						data-lng="<?php echo esc_attr( $location['lng'] ); ?>">
					</div>
				</div>
				<?php endif; ?>
			</div>
			<div class="col-span-2 md:col-start-1 md:col-span-3 xl:col-start-2 xl:col-span-10 pt-8 md:pt-9 xl:pt-16">
				<h2 class="title-main text-Black pb-8 md:pb-9 xl:pb-0"><?php the_field( 'maps_contact_title' ); ?></h2>
			</div>
			<div class="col-span-2 md:col-start-1 md:col-span-3 xl:col-start-7 xl:col-span-3">
				<?php
				$phone = get_field( 'maps_contact_phone' );
				if ( $phone ) :
					?><p class="text-Black pb-4 xl:pb-14"><span><?php esc_html_e( 'Telefon ', 'erlebnisbad' ); ?></span> <a class="" href="tel:<?php echo esc_attr( $phone ); ?>" target="_blank"><?php echo esc_html( $phone ); ?></a></p><?php
				endif;
				?>
				<?php
				$email = get_field( 'maps_contact_email' );
				if ( $email ) :
					?><p class="text-Black pb-4 xl:pb-14"><span><?php esc_html_e( 'E-Mail ', 'erlebnisbad' ); ?></span> <a class="" href="mailto:<?php echo esc_attr( $email ); ?>" target="_blank"><?php echo esc_html( $email ); ?></a></p><?php
				endif;
				?>
			</div>
			<div class="col-span-2 md:col-start-4 md:col-span-4 xl:col-start-10 xl:col-span-2 pb-6 xl:pb-9">
				<p class="text-Black"><?php the_field( 'maps_contact_address' ); ?></p>
			</div>
			<div class="col-span-2 md:col-start-4 md:col-span-2 xl:col-start-10 xl:col-span-2">
				<?php
				$hero_button = get_field( 'maps_contact_button' );
				if ( $hero_button ) :
					$link_url    = $hero_button['url'];
					$link_title  = $hero_button['title'];
					$link_target = $hero_button['target'] ? $hero_button['target'] : '_self';
					?>
					<a class="btn btn-primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
