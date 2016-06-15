<?php

class CogitoBot_Api {

  public function __construct() {
    add_action('rest_api_init', array( $this, 'register_routes' ));
  }

  public function register_routes() {
    $namespace = 'cogito-plugin';
    $base = 'facebook-auth-redirect';

    register_rest_route( $namespace, 'facebook-auth-redirect',
      array(
          'methods' => 'GET',
          'callback'=> array( $this, 'facebook_auth_redirect' )
      )
    );

    register_rest_route( $namespace, 'buy-cart',
      array(
          'methods' => 'GET',
          'callback'=> array( $this, 'buy_cart' )
      )
    );
  }

  public function facebook_auth_redirect() {
    return 'facebook_auth_redirect';
  }

  public function buy_cart() {
    return 'buy_cart';
  }
}

new CogitoBot_Api();
