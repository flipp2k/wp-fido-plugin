<?php 

/*
* This file will create custom rest API endpoints
*/

/* class WP_React_Settings_Rest_Routes {

//      function __constuct() {
//         add_action('rest_api_init', , 'create_rest_routes');
//     }

//      function create_rest_routes() {

//         register_rest_route( 'wp/v2', '/fido-settings', [
//             'methods' => 'GET',
//             'callback' => , 'get_settings',
//             'permission_callback' => , 'get_settings_persmission'
//         ]);

//         register_rest_route( 'wpfa/v1', 'settings', [
//             'methods' => 'POST',
//             'callback' => , 'save_settings',
//             'permission_callback' => , 'save_settings_persmission'
//         ]);

//         //register_rest_route( $namespace:string, $route:string, $args:array, $override:boolean )
//     }

//      function get_settings() {
//         $response = [
//             'firstName' => 'John',
//             'lastName' => 'Doe',
//             'email' => 'john@gmail.com'
//         ];

//         return rest_ensure_response( $response );
//     }


//      function save_settings() {

//     }



//      function get_settings_persmission() {

//     }

//      function save_settings_persmission() {
    
//         return true;
//     }

// }

// new WP_React_Settings_Rest_Routes();

*/
    
    add_action('rest_api_init', 'create_rest_routes');


     function create_rest_routes() {

        register_rest_route( 'wpfa/v1', '/fido-settings', [
            'methods' => 'GET',
            'callback' => 'get_fido_settings',
            'permission_callback' => 'get_settings_persmission'
        ]);

        register_rest_route( 'wpfa/v1', 'settings', [
            'methods' => 'POST',
            'callback' => 'save_fido_settings',
            'permission_callback' => 'save_settings_persmission'
        ]);

    }

     function get_fido_settings() {
        $response = [
            'firstName' => 'John',
            'lastName' => 'Doe',
            'email' => 'john@gmail.com'
        ];

        return rest_ensure_response( $response );
    }


     function save_fido_settings() {

    }



     function get_settings_persmission() {
        return true;
    }

     function save_settings_persmission() {

        return true;
    }


