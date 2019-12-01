<?php
/*
Plugin Name: Nomad Ext!
Plugin URI:
Description: LS 
Version:     1.0.0
Author: LS     
Author URI:  
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: noex-nomad-ext
Domain Path: /languages

Nomad Ext is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Nomad Ext is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Nomad Ext. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/


if ( ! function_exists( 'noex_initialize_extension' ) ):
/**
 * Creates the extension's main class instance.
 *
 * @since 1.0.0
 */
function noex_initialize_extension() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/NomadExt.php';
}
add_action( 'divi_extensions_init', 'noex_initialize_extension' );

add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );
function add_theme_scripts() {
	wp_enqueue_style(
		'bootstrap',
		plugins_url( 'vendor/bootstrap/css/bootstrap.min.css', __FILE__ )
	);
	// wp_register_script( 'jQuery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js', null, null, true );
	// wp_enqueue_script('jQuery');
}
endif;
