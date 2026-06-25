<?php
/**
 * Yoast OG Image Fallback — Hero Image
 *
 * If no social image is set in Yoast for a singular page/post,
 * this falls back to the ACF `hero_image` field automatically.
 *
 * Add this to your theme's inc/ folder and require it in functions.php:
 *   require_once get_template_directory() . '/inc/yoast-og-hero-fallback.php';
 */

/**
 * Use the ACF hero_image as OG fallback when Yoast has no image set.
 *
 * @param WPSEO_OpenGraph_Image $object Yoast OG image handler.
 */
function erlenisbad_yoast_og_hero_image_fallback( $object ) {
    // Only run on singular pages/posts.
    if ( ! is_singular() ) {
        return;
    }

    // Bail if Yoast already has an image set (manual or default).
    if ( $object->has_images() ) {
        return;
    }

    $hero_image = get_field( 'hero_image' );

    if ( ! $hero_image ) {
        return;
    }

    // ACF return format: Image Array (default).
    if ( is_array( $hero_image ) && ! empty( $hero_image['url'] ) ) {
        $object->add_image_by_url( esc_url( $hero_image['url'] ) );
        return;
    }

    // ACF return format: Image ID.
    if ( is_numeric( $hero_image ) ) {
        $src = wp_get_attachment_image_src( (int) $hero_image, 'full' );
        if ( $src ) {
            $object->add_image_by_url( esc_url( $src[0] ) );
        }
        return;
    }

    // ACF return format: Image URL.
    if ( is_string( $hero_image ) && filter_var( $hero_image, FILTER_VALIDATE_URL ) ) {
        $object->add_image_by_url( esc_url( $hero_image ) );
    }
}
add_action( 'wpseo_add_opengraph_images', 'erlenisbad_yoast_og_hero_image_fallback' );
