<?php

class Subscribe_App_Controller {

  public static function subscribe() {
    // Need to construct the request
    wp_redirect( COGITOAPP_DOMAIN_URL );
    exit;
  }
}
