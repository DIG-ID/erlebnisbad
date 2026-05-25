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
		<div class="section-404__content flex flex-col items-center gap-5 md:gap-7 xl:gap-8 bg-Mint3 pt-12 pb-20">
			<h1 class="font-raleway text-4xl xl:text-[80px] font-bold leading-10 xl:leading-[80px] text-Mint max-w-[28rem] xl:max-w-[57rem]">
				<?php esc_html_e( 'Seite konnte nicht gefunden werden', 'digid' ); ?>
			</h1>

			<p class="text-DarkGreen max-w-[18rem] md:max-w-sm xl:max-w-md">
				<?php esc_html_e( 'Ups, diese Seite ist gerade abgetaucht. Der gesuchte Inhalt ist leider nicht mehr verfügbar. Über das Menü finden Sie schnell zurück ins Erlebnisbad Wallbach.', 'digid' ); ?>
			</p>

			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary mt-2">
				<?php esc_html_e( 'Zur Startseite', 'digid' ); ?>
			</a>

		</div>
	</div>
</section>

<?php
do_action( 'after_main_content' );
get_footer();
