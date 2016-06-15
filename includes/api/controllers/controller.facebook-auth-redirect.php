<?php

class Facebook_Auth_Redirect_Controller {

  public static function redirect( $url ) {
    $exploded_params = self::explode_params( $url );

    self::save_customer_id( $exploded_params['customer'] );

    $http_params = http_build_query(array(
      "action" => "select_page",
      "pages" => json_encode( $exploded_params["pages"] )
    ));

    wp_redirect( admin_url() . COGITOBOT_ADMIN_PATH . '&' . $http_params );
    exit;
  }

  public static function explode_params( $url ) {
    $extract_customer = explode( '&customer=', urldecode( explode("?", $url)[1] ) );

    return array(
      "pages" => json_decode( str_replace('pages=', '', $extract_customer[0]) ),
      "customer" => json_decode( $extract_customer[1] )
    );
  }

  public static function save_customer_id( $customer ) {
    global $wpdb;

    $wpdb->insert( "{$wpdb->prefix}cogito_bot_customer", array( 'cogito_id' => $customer->_id ) );
  }
}
