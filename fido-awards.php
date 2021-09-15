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
        'apiUrl' => home_url( '/wp-json' ),
        'nonce' => wp_create_nonce( 'wp_rest' ),
    ] );
} 

// function display_fido_awards() {

// 	return '<div id="fido-show-fido-awards" ></div>';
// }

// add_shortcode('fido-awards', 'display_fido_awards');



 function create_fido_db() {
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    
    $table_name = $wpdb->prefix .'fido_awards';

    //Create the fido admin table
    $create_table = "CREATE TABLE $table_name (
        id INTEGER NOT NULL  AUTO_INCREMENT,
        first_name TEXT NOT NULL,
        last_name TEXT NOT NULL,
        titles TEXT, 
        create_date TIMESTAMP NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate";
        
    //create table if doesn't exist
    maybe_create_table( $table_name, $create_table);
}

register_activation_hook( __FILE__, 'create_fido_db' );

require_once FA_PATH . 'classes/create-admin-menu.php';
require_once FA_PATH . 'classes/create-settings-routes.php';