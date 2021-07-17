<?php
/**
 * Astra Digitizer Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra Digitizer
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'CHILD_THEME_ASTRA_DIGITIZER_VERSION', '1.0.0' );

/**
 * Enqueue styles
 */
function child_enqueue_styles() {

	wp_enqueue_style( 'astra-digitizer-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_ASTRA_DIGITIZER_VERSION, 'all' );

}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );

//*** Digitizer Scripts ***
//====================

// Disable plugin auto-update email notification
add_filter('auto_plugin_update_send_email', '__return_false');
 
// Disable theme auto-update email notification
add_filter('auto_theme_update_send_email', '__return_false');

// Disable WordPress core auto-update email notification
add_filter( 'auto_core_update_send_email', 'wpb_stop_auto_update_emails', 10, 4 );
function wpb_stop_update_emails( $send, $type, $core_update, $result ) {
	if ( ! empty( $type ) && $type == 'success' ) {
		return false;
	}
	return true;
}

// // Reorder Multiple Columns in Elementor 
// function ben_add_responsive_column_order( $element, $args ) {
// 	$element->add_responsive_control(
// 		'responsive_column_order',
// 		[
// 			'label' => __( 'Responsive Column Order', 'ben-elementor-extras' ),
// 			'type' => \Elementor\Controls_Manager::NUMBER,
// 			'separator' => 'before',
// 			'selectors' => [
// 				'{{WRAPPER}}' => '-webkit-order: {{VALUE}}; -ms-flex-order: {{VALUE}}; order: {{VALUE}};',
// 			],
// 		]
// 	);
// }
// add_action( 'elementor/element/column/layout/before_section_end', 'ben_add_responsive_column_order', 10, 2 );

// // disable gutenberg  for posts
// add_filter('use_block_editor_for_post', '__return_false', 10);

// // disable gutenberg  for post types
// add_filter('use_block_editor_for_post_type', '__return_false', 10);

// /***** VCF Support *****/
// function _enable_vcard_upload( $mime_types ){
//   	$mime_types['vcf'] = 'text/vcard';
// 	$mime_types['vcard'] = 'text/vcard';
//   	return $mime_types;
// }
// add_filter('upload_mimes', '_enable_vcard_upload' );

// /***** Shorten Post/Page link  *****/
// add_filter( 'get_shortlink', function ( $shortlink ) {
//     return $shortlink;
// });

// /***** Allow SVG *****/
// add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

//   global $wp_version;
//   if ( $wp_version !== '4.7.1' ) {
//      return $data;
//   }

//   $filetype = wp_check_filetype( $filename, $mimes );

//   return [
//       'ext'             => $filetype['ext'],
//       'type'            => $filetype['type'],
//       'proper_filename' => $data['proper_filename']
//   ];

// }, 10, 4 );

// function cc_mime_types( $mimes ){
//   $mimes['svg'] = 'image/svg+xml';
//   return $mimes;
// }
// add_filter( 'upload_mimes', 'cc_mime_types' );

// function fix_svg() {
//   echo '<style type="text/css">
//         .attachment-266x266, .thumbnail img {
//              width: 100% !important;
//              height: auto !important;
//         }
//         </style>';
// }
// add_action( 'admin_head', 'fix_svg' );

// // Elementor Form Telephone Number Validition
// add_action( 'elementor_pro/forms/validation/tel', function( $field, $record, $ajax_handler ) { 	
// 	// Match this format XXXXXXXXXX, 1234567890 	
// 	if ( preg_match( '/[0-9]{10}/', $field['value'] ) !== 1 ) { 		
// 	$ajax_handler->add_error( $field['id'], 'הזן טלפון חוקי ללא מקף או רווח' ); 	
// 	}
//  	}, 10, 3 );
	 
// //******--- Remove Google Fonts ---******
// add_filter( 'elementor/frontend/print_google_fonts', '__return_false' );

// //******--- Remove Font Awesome ---*****
// add_action( 'elementor/frontend/after_register_styles',function() {
// 	foreach( [ 'solid', 'regular', 'brands' ] as $style ) {
// 		wp_deregister_style( 'elementor-icons-fa-' . $style );
// 	}
// }, 20 );

// //*****---  Remove Eicons:  ---*****
// add_action( 'wp_enqueue_scripts', 'remove_default_stylesheet', 20 ); 
// function remove_default_stylesheet() { 
// 	wp_deregister_style( 'elementor-icons' ); 
// }

// //*****---   Remove Gutenberg Block Library CSS from loading on the frontend  ---*****
// function smartwp_remove_wp_block_library_css(){
//  wp_dequeue_style( 'wp-block-library' );
//  wp_dequeue_style( 'wp-block-library-theme' );
// }
// add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css' );

// // remove wp version number from scripts and styles
// function remove_css_js_version( $src ) {
//     if( strpos( $src, '?ver=' ) )
//         $src = remove_query_arg( 'ver', $src );
//     return $src;
// }
// add_filter( 'style_loader_src', 'remove_css_js_version', 9999 );
// add_filter( 'script_loader_src', 'remove_css_js_version', 9999 );

// // remove wp version number from head and rss
// function artisansweb_remove_version() {
//     return '';
// }
// add_filter('the_generator', 'artisansweb_remove_version');

// // Upload webP images in WordPress
// function webp_upload_mimes( $existing_mimes ) {
// 	// add webp to the list of mime types
// 	$existing_mimes['webp'] = 'image/webp';
// 	// return the array back to the function with our added mime type
// 	return $existing_mimes;
// }
// add_filter( 'mime_types', 'webp_upload_mimes' );
