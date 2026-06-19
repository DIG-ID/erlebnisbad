<?php
/**
 * Feratel Widget Section in the Tickets Template.
 *
 * Embeds the feratel/Deskline hosted experience widget via an iframe.
 * The widget language follows the active WPML language when available.
 *
 * @package erlebnisbad
 * @subpackage Section
 * @since 1.0.0
 */

// WPML-aware language; falls back to site locale, then "de".
$lang = defined( 'ICL_LANGUAGE_CODE' ) ? ICL_LANGUAGE_CODE : substr( get_locale(), 0, 2 );
$lang = $lang ? $lang : 'de';

$widget_id  = '6c270a38-b1b9-4d78-82d8-4b63559fb495';
$widget_url = add_query_arg(
	'lang',
	$lang,
	'https://direct.bookingandmore.com/desklineweb/' . $widget_id
);
?>

<div class="theme-container">
	<div class="theme-grid">
		<div class="col-span-12">
			<iframe
				class="tickets-widget__frame"
				src="<?php echo esc_url( $widget_url ); ?>"
				title="<?php esc_attr_e( 'Tickets &amp; Buchung', 'erlebnisbad' ); ?>"
				loading="lazy"
				allow="payment"
				referrerpolicy="strict-origin-when-cross-origin"
			></iframe>
		</div>
	</div>
</div>
<div class="theme-container">
	<div class="theme-grid">
		<div class="col-span-12 flex justify-center items-center py-32">
			<?php
			$link = get_field( 'link' );
			if( $link ):
				$link_url = $link['url'];
				$link_title = $link['title'];
				$link_target = $link['target'] ? $link['target'] : '_self';
				?>
				<a class="btn btn-primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
			<?php endif; ?>
		</div>
	</div>
</div>
