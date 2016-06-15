<?php

class CogitoBot_Api {

  public function __construct() {
    add_action('rest_api_init', array( $this, 'register_routes' ));
  }

  public function register_routes() {
    $namespace = 'cogito/v1';
    $base = 'route';

    register_rest_route( $namespace, 'route',
        array(
            'methods' => 'GET',
            'callback'=> array( $this, 'get_response' )
        )
    );
  }

  public function get_response() {
    return 'nikel';
  }
}

new CogitoBot_Api();
