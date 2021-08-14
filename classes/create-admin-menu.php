<?php 
/**
 * This file will create admin menu page
 */


 class FA_Create_Admin_Page {

    public function __construct() {
        add_action( 'admin_menu', [$this, 'create_admin_menu'] );
    }

    public function create_admin_menu() {
        $capability = 'manage_options';
        $slug = 'FA-settings';
        
        add_menu_page(
            __('Fido awards', 'fido-awards'),
            __('Fido awards', 'fido-awards'),
            $capability,
            $slug,
            [$this, 'menu_page_templage'],
            'dashicons-buddicons-replies'
        );
    }

    public function menu_page_templage() {
        echo('<div class="wrap"><div id="fido-admin-app"></div></div>');
    }

 }

 new FA_Create_Admin_Page();