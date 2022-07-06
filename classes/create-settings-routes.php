<?php 

/*
* This file will create custom rest API endpoints
*/

 class WP_React_Settings_Rest_Routes {

    public function __construct() {
        add_action( 'rest_api_init', [ $this, 'create_rest_routes' ]);
    }

     public function create_rest_routes() {
        register_rest_route( 'wpfa/v1', '/settings', [
            'methods' => 'GET',
            'callback' => [ $this, 'get_settings' ],
            'permission_callback' => [ $this, 'get_settings_permission']
        ] );

        register_rest_route( 'wpfa/v1', 'settings', [
            'methods' => 'POST',
            'callback' => [$this, 'save_settings'],
            'permission_callback' => [$this,'save_settings_persmission']
        ]);

   }


     public function get_settings() {
        global $wpdb;
        $table = $wpdb->prefix . 'fido_awards';
        $dbQuery = $wpdb->prepare( 'SELECT * FROM ' . $table); 

        $response = $wpdb->get_results($dbQuery);

        return rest_ensure_response(  $response );
    }


    public function save_settings( $request) {
        // To get form data
        $firstName =  $request['firstName'] ;
        $lastName =  $request['lastName'] ;
        $titles = $request['titles'] ;

        // To get data as json
        //$data =  $request->get_json_params();

        global $wpdb;
        $table = $wpdb->prefix . 'fido_awards';
        $data = array(
            'first_name' =>  $firstName,
            'last_name' =>  $lastName,
            'titles' =>  $titles,
            'create_date' => current_time( 'mysql' )
        );

        $format = array(
            '%s',
            '%s',
            '%s',
            '%s'
        );

       $success=$wpdb->insert( $table, $data, $format );
       
    //    if( is_wp_error( 'Error' ) ) {
    //     echo $return->get_error_message();
    //}
       return rest_ensure_response('Success');
    }



    public function get_settings_permission() {
        return true;
    }

     public function save_settings_persmission() {
        return true;
    }

}

new WP_React_Settings_Rest_Routes();


