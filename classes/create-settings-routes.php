<?php 

/*
* This file will create custom rest API endpoints
*/

 class WP_React_Settings_Rest_Routes {

    public function __construct() {
        add_action( 'rest_api_init', [ $this, 'create_rest_routes' ] );
    }

     public function create_rest_routes() {
        register_rest_route( 'fa/v1', '/settings', [
            'methods' => 'GET',
            'callback' => [ $this, 'get_settings' ],
            'permission_callback' => [ $this, 'get_settings_permission' ]
        ] );

        register_rest_route( 'wpfa/v1', 'settings', [
            'methods' => 'POST',
            'callback' => [$this, 'save_settings'],
            'permission_callback' => [$this,'save_settings_persmission']
        ]);

   }


     public function get_settings() {
        $response = [
            'firstName' => 'John',
            'lastName' => 'Doe',
            'email' => 'john@gmail.com'
        ];

        return rest_ensure_response( $response );
    }


    public function save_settings() {

    }



    public function get_settings_permission() {
        return true;
    }

     public function save_settings_persmission() {
        return true;
    }

}

new WP_React_Settings_Rest_Routes();


