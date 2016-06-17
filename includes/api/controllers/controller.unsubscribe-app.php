<?php

class Unsubscribe_App_Controller {
  public static function unsubscribe() {
    global $wpdb;

    $id = $wpdb->get_var( "SELECT cogito_id FROM {$wpdb->prefix}cogito_bot_customer LIMIT 1;" );

    self::unsubscribe_page( $id );

    self::remove_cogito_id_from_db( $id );

    return "OK";
  }

  public static function unsubscribe_page( $id ) {
    wp_remote_get( COGITOAPP_DOMAIN_URL . "/customers/{$id}/page/unsubscribe" );
  }

  public static function remove_cogito_id_from_db( $id ) {
    global $wpdb;

    if ($id) :
      $wpdb->delete( "{$wpdb->prefix}cogito_bot_customer", array( "cogito_id" => $id ));
    endif;
  }
}
