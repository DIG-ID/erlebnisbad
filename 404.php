<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package erlebnisbad
 * @since 1.0.0
 */

get_header();
do_action( 'before_main_content' );
?>

<section id="section-404" class="section-404 bg-Mint1 text-center">
	<div class="container-fluid">
		<div class="section-404__header py-12 bg-DarkGreen"></div>
		<div class="flex flex-col items-center bg-Mint1 pt-12 pb-0">

			<p class="font-raleway text-[180px] xl:text-[350px] font-bold xl:leading-[90px] text-Mint" aria-hidden="true">404</p>

		</div>
		<div class="section-404__content flex flex-col items-center gap-12 md:gap-20 bg-Mint3 pt-12 pb-20">
			<h1 class="font-raleway text-4xl md:text-[80px] font-bold leading-10 md:leading-[80px] text-Mint max-w-[28rem] md:max-w-[700px] xl:max-w-[57rem]">
				<?php esc_html_e( 'Seite konnte nicht gefunden werden', 'digid' ); ?>
			</h1>

			<div class="text-DarkGreen text-left grid grid-cols-1 md:grid-cols-2 gap-5 max-w-80 md:max-w-[700px] xl:max-w-5xl">
				<p>
					<?php esc_html_e( 'Da ist wohl jemand vom Beckenrand direkt ins digitale Nirgendwo gesprungen. Die gesuchte Seite hat sich entweder versteckt, ist umgezogen oder gönnt sich gerade eine kleine Auszeit im Whirlpool.', 'digid' ); ?>
				</p>
				<p>
					<?php esc_html_e( 'Am besten geht es zurück zur Startseite – dort warten wieder alle Informationen rund um Schwimmen, Wellness, Bistro und Auszeiten im Erlebnisbad Wallbach.', 'digid' ); ?>
				</p>
			</div>

			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary mt-2">
				<?php esc_html_e( 'Zur Startseite', 'digid' ); ?>
			</a>

		</div>
	</div>
</section>

<?php
do_action( 'after_main_content' );
get_footer();
