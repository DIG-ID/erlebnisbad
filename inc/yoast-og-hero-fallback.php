<?php
/**
 * Yoast OG Image WPML Fallback
 *
 * If no social image is set in Yoast for the current language version,
 * this falls back to the OG image set on the original (DE) post.
 *
 * This means you only need to set the image once on the DE page —
 * EN and FR will inherit it automatically unless overridden.
 *
 * Requires: Yoast SEO + WPML
 */

/**
 * Fall back to the DE post's Yoast OG image for translated pages.
 *
 * @param WPSEO_OpenGraph_Image $object Yoast OG image handler.
 */
function erlenisbad_yoast_og_wpml_image_fallback( $object ) {
    // Only run on singular pages/posts.
    if ( ! is_singular() ) {
        return;
    }

    // Bail if the current language already has an image set.
    if ( $object->has_images() ) {
        return;
    }

    // Bail if WPML is not active.
    if ( ! function_exists( 'icl_object_id' ) ) {
        return;
    }

    // Get the original (default language) post ID.
    $original_id = apply_filters( 'wpml_object_id', get_the_ID(), get_post_type(), true, wpml_get_default_language() );

    // Bail if this is already the original post (no translation to fall back from).
    if ( ! $original_id || $original_id === get_the_ID() ) {
        return;
    }

    // Get the Yoast OG image set on the original post.
    $og_image_url = get_post_meta( $original_id, '_yoast_wpseo_opengraph-image', true );

    if ( $og_image_url ) {
        $object->add_image_by_url( esc_url( $og_image_url ) );
    }
}
add_action( 'wpseo_add_opengraph_images', 'erlenisbad_yoast_og_wpml_image_fallback' );