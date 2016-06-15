<?php

class Subscribe_App_Controller {

  public static function subscribe( $params ) {
    // Need to construct the request
    self::validate_params( $params );

    wp_redirect( COGITOAPP_DOMAIN_URL );
    exit;
  }

  public static function validate_params( $params ) {
    if ( ! $params['consumerKey'] && ! $params['consumerSecret']  ) {
      wp_redirect( admin_url() . '/admin.php?page=cogito-admin-page.php' );
      exit;
    }
  }
}
