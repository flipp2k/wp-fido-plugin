<?php

/**
 * Plugin Name:       Fido Awards
 * Plugin URI:        https://hostkru.com/fido-awards
 * Description:       Creates a database to allow the intput and display of fido awards recipients
 * Version:           1.0.0
 * Author:            hostkru Digital
 * Author URI:        https://hostkru.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       fido-awards
*/


if( !defined('ABSPATH')) : exit(); endif; // no direct access allowed 


 define('FA_PATH', trailingslashit(plugin_dir_path(__FILE__)));
 define('FA_URL', trailingslashit(plugins_url( '/', __FILE__ )));


 /**
 * Loading Necessary Scripts
 */


add_action( 'admin_enqueue_scripts', 'load_scripts' );

function load_scripts() {
    wp_enqueue_script( 'fido-awards', FA_URL . 'dist/bundle.js', ['wp-element'], wp_rand(), true );
    wp_localize_script( 'fido-awards', 'appLocalizer', [
        'apiUrl' => home_url( '/wp-json'),
        'nonce' => wp_create_nonce( 'wp-rest')
    ] );
} 

function display_fido_awards() {

	return '<div id="fido-show-fido-awards" ></div>';
}

add_shortcode('fido-awards', 'display_fido_awards');

 require_once FA_PATH. 'classes/create-admin-menu.php';
 require_once FA_PATH. 'classes/create-settings-routes.php';