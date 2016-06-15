<?php

class Subscribe_App_Controller {

  public static function subscribe( $params ) {
    // Need to construct the request
    self::validate_params( $params );

    $sanitized_params = self::sanitize_params_url( $params );

    $http_params = http_build_query( $sanitized_params );

    wp_redirect( COGITOAPP_DOMAIN_URL . COGITOBOT_FACEBOOK_AUTH_URL . '?' . $http_params );
    exit;
  }

  public static function validate_params( $params ) {
    if ( ! $params['consumerKey'] && ! $params['consumerSecret']  ) {
      wp_redirect( admin_url() . 'admin.php?page=cogito-admin-page.php' );
      exit;
    }
  }

  public static function sanitize_params_url( $params ) {
    $domainUrl = get_site_url();

    $args = array(
      "woocommerceConsumerKey" => $params["consumerKey"],
      "woocommerceConsumerSecret" => $params['consumerSecret'],
      "domainUrl" => $domainUrl,
      "customerType" => COGITOBOT_CUSTOMER_TYPE
    );

    return $args;
  }
}
