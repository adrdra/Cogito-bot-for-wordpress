<?php

class Facebook_Auth_Redirect_Controller {

  public static function redirect( $url ) {
    $exploded_params = self::explode_params( $url );
    return $exploded_params;
  }

  public static function explode_params( $url ) {
    $extract_customer = explode( '&customer=', urldecode( explode("?", $url)[1] ) );

    return array(
      "pages" => json_decode( str_replace('pages=', '', $extract_customer[0]) ),
      "customer" => json_decode( $extract_customer[1] )
    );
  }
}
