<?php

class CogitoBot_Api {

  public function __construct() {
    $this->includes();

    add_action('rest_api_init', array( $this, 'register_routes' ));
  }

  public function includes() {
    include_once( 'controllers/controller.facebook-auth-redirect.php' );
    include_once( 'controllers/controller.buy-cart.php' );
    include_once( 'controllers/controller.subscribe-app.php' );
  }

  public function register_routes() {
    $namespace = 'cogito-plugin';

    $this->facebook_auth_redirect_route($namespace);
    $this->buy_cart_route($namespace);
    $this->subscribe_app_route($namespace);
  }

  public function facebook_auth_redirect_route($namespace) {
    register_rest_route( $namespace, 'facebook-auth-redirect',
      array(
        'methods' => 'GET',
        'callback'=> array( $this, 'facebook_auth_redirect' )
      )
    );
  }

  public function buy_cart_route($namespace) {
    register_rest_route( "$namespace", 'buy-cart',
      array(
        'methods' => 'GET',
        'callback'=> array( $this, 'buy_cart' )
      )
    );
  }

  public function subscribe_app_route($namespace) {
    register_rest_route( $namespace, 'subscribe-app',
      array(
        'methods' => 'GET',
        'callback'=> array( $this, 'subscribe_app' )
      )
    );
  }

  public function facebook_auth_redirect( $request ) {
    return Facebook_Auth_Redirect_Controller::redirect( $this->current_url() );
  }

  public function buy_cart() {
    return 'buy_cart';
  }

  public function subscribe_app( $request ) {
    return Subscribe_App_Controller::subscribe( $request->get_params() );
  }

  private function current_url() {
    $protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']),'https') === FALSE ? 'http' : 'https';
    $host     = $_SERVER['HTTP_HOST'];
    $script   = $_SERVER['SCRIPT_NAME'];
    $params   = $_SERVER['QUERY_STRING'];

    return $protocol . '://' . $host . $script . '?' . $params;
  }
}

new CogitoBot_Api();
