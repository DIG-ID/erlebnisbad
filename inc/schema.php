<?php
/**
 * Custom Schema.org JSON-LD
 *
 * Extends Yoast's schema with page-specific structured data.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'wp_head', 'erlebnisbad_custom_schema', 99 );

function erlebnisbad_custom_schema() {

	if ( is_front_page() ) {
		erlebnisbad_local_business_schema();
	}

	if ( is_page_template( 'page-templates/page-bistro.php' ) ) {
		erlebnisbad_restaurant_schema();
	}

	if ( is_page_template( 'page-templates/page-rules-faq.php' ) ) {
		erlebnisbad_faq_schema();
	}

	if ( is_page_template( 'page-templates/page-wellness-world.php' ) ) {
		erlebnisbad_spa_schema();
	}

	if ( is_page_template( 'page-templates/page-pool-world.php' ) ) {
		erlebnisbad_pool_schema();
	}
}

/**
 * Common business data.
 */
function erlebnisbad_business() {

	return array(
		'name'  => 'Erlebnisbad Wallbach',
		'url'   => home_url( '/' ),
		'logo'  => wp_get_attachment_image_url( get_theme_mod( 'custom_logo' ), 'full' ),
		'phone' => '+41 33 736 35 35',
		'email' => 'info@lenk.simmental.ch',

		'address' => array(
			'@type'           => 'PostalAddress',
			'streetAddress'   => 'Wallbachstrasse 43',
			'postalCode'      => '3775',
			'addressLocality' => 'Lenk im Simmental',
			'addressCountry'  => 'CH',
		),

		'geo' => array(
			'@type'     => 'GeoCoordinates',
			'latitude'  => '46.460256049510505',
			'longitude' => '7.439582591210683',
		),

		'opening_hours' => array(
			array(
				'@type'     => 'OpeningHoursSpecification',
				'dayOfWeek' => array(
					'Monday',
					'Wednesday',
					'Thursday',
					'Friday',
				),
				'opens'  => '10:00',
				'closes' => '20:00',
			),
			array(
				'@type'     => 'OpeningHoursSpecification',
				'dayOfWeek' => 'Tuesday',
				'opens'     => '13:30',
				'closes'    => '20:00',
			),
			array(
				'@type'     => 'OpeningHoursSpecification',
				'dayOfWeek' => array(
					'Saturday',
					'Sunday',
				),
				'opens'  => '10:00',
				'closes' => '19:00',
			),
		),

		'sameAs' => array(
			'https://www.facebook.com/erlebnisbadwallbach',
		),

		'language' => get_bloginfo( 'language' ),
	);
}

/**
 * Output schema safely.
 */
function erlebnisbad_output_schema( $data ) {

	echo '<script type="application/ld+json">' .
		wp_json_encode( $data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) .
		'</script>';
}

/**
 * Homepage.
 */
function erlebnisbad_local_business_schema() {

	$b = erlebnisbad_business();

	$data = array(
		'@context' => 'https://schema.org',
		'@type'    => array( 'SportsActivityLocation', 'TouristAttraction' ),
		'@id'      => home_url( '/#sports-activity-location' ),

		'name'      => $b['name'],
		'url'       => $b['url'],
		'telephone' => $b['phone'],
		'email'     => $b['email'],
		'logo'      => $b['logo'],
		'image'     => get_the_post_thumbnail_url( get_queried_object_id(), 'full' ),
		'address'   => $b['address'],
		'geo'       => $b['geo'],
		'openingHoursSpecification' => $b['opening_hours'],
		'sameAs'    => $b['sameAs'],

		'parentOrganization' => array(
			'@id' => home_url( '/#organization' ),
		),
	);

	erlebnisbad_output_schema( $data );
}

/**
 * Bistro.
 */
function erlebnisbad_restaurant_schema() {

	$b = erlebnisbad_business();

	$data = array(
		'@context' => 'https://schema.org',
		'@type'    => 'Restaurant',
		'@id'      => get_permalink() . '#restaurant',

		'name'      => 'Bistro',
		'url'       => get_permalink(),
		'telephone' => $b['phone'],
		'email'     => $b['email'],
		'address'   => $b['address'],
		'geo'       => $b['geo'],
		'openingHoursSpecification' => $b['opening_hours'],

		'parentOrganization' => array(
			'@id' => home_url( '/#organization' ),
		),
	);

	erlebnisbad_output_schema( $data );
}

/**
 * FAQ.
 */
function erlebnisbad_faq_schema() {

	$page_id = get_queried_object_id();

	if ( ! function_exists( 'get_field' ) ) {
		return;
	}

	$faq_items = get_field( 'faq_faq', $page_id );

	if ( empty( $faq_items ) || ! is_array( $faq_items ) ) {
		return;
	}

	$questions = array();

	foreach ( $faq_items as $item ) {
		$question = isset( $item['question'] ) ? trim( wp_strip_all_tags( $item['question'] ) ) : '';
		$answer   = isset( $item['answer'] ) ? trim( wp_strip_all_tags( $item['answer'] ) ) : '';

		if ( empty( $question ) || empty( $answer ) ) {
			continue;
		}

		$questions[] = array(
			'@type' => 'Question',
			'name'  => $question,
			'acceptedAnswer' => array(
				'@type' => 'Answer',
				'text'  => $answer,
			),
		);
	}

	if ( empty( $questions ) ) {
		return;
	}

	$data = array(
		'@context'   => 'https://schema.org',
		'@type'      => 'FAQPage',
		'@id'        => get_permalink( $page_id ) . '#faq',
		'url'        => get_permalink( $page_id ),
		'mainEntity' => $questions,
	);

	erlebnisbad_output_schema( $data );
}

/**
 * Wellness.
 */
function erlebnisbad_spa_schema() {

	$b = erlebnisbad_business();

	$data = array(
		'@context' => 'https://schema.org',
		'@type'    => 'HealthAndBeautyBusiness',
		'@id'      => get_permalink() . '#wellness',

		'name'      => 'Wellness World - Erlebnisbad Wallbach',
		'url'       => get_permalink(),
		'telephone' => $b['phone'],
		'email'     => $b['email'],
		'address'   => $b['address'],
		'geo'       => $b['geo'],
		'openingHoursSpecification' => $b['opening_hours'],

		'parentOrganization' => array(
			'@id' => home_url( '/#organization' ),
		),
	);

	erlebnisbad_output_schema( $data );
}

/**
 * Pool World.
 */
function erlebnisbad_pool_schema() {

	$b = erlebnisbad_business();

	$data = array(
		'@context' => 'https://schema.org',
		'@type'    => array( 'SportsActivityLocation', 'TouristAttraction' ),
		'@id'      => get_permalink() . '#pool-world',

		'name'      => 'Pool World - Erlebnisbad Wallbach',
		'url'       => get_permalink(),
		'telephone' => $b['phone'],
		'email'     => $b['email'],
		'address'   => $b['address'],
		'geo'       => $b['geo'],
		'openingHoursSpecification' => $b['opening_hours'],

		'parentOrganization' => array(
			'@id' => home_url( '/#organization' ),
		),
	);

	erlebnisbad_output_schema( $data );
}