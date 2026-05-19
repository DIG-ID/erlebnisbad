<?php
/**
 * Theme functions and definitions.
 *
 * @package erlebnisbad
 */

// Font provider configuration — set per project.
// Options: 'google' | 'adobe' | 'none'
define( 'erlebnisbad_FONT_PROVIDER', 'adobe' );
define( 'erlebnisbad_ADOBE_FONTS_ID', 'rtz3wiv' ); // Typekit kit ID, e.g. 'abc1234'

// Google Maps API key — set per project. Leave empty to disable.
define( 'erlebnisbad_GOOGLE_MAPS_API_KEY', 'AIzaSyBAZN5TfX1aWmjodZ4e_6sOcaJV4D59jfo' );

// Theme setup: supports, nav menus, sidebars, plugin filters.
require get_template_directory() . '/inc/theme-setup.php';

// Scripts and styles.
require get_template_directory() . '/inc/enqueue.php';

// Admin and login customisations.
require get_template_directory() . '/inc/theme-admin-settings.php';

// Template tags and reusable output functions.
require get_template_directory() . '/inc/theme-template-tags.php';

// Helper/utility functions.
require get_template_directory() . '/inc/helpers.php';

// Performance optimizations.
require get_template_directory() . '/inc/performance.php';


