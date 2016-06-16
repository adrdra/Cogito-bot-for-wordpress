<?php

class Buy_Cart_Controller {
  public static function buy( $params ) {
    $sanitized_params = self::sanitize_buy_params( $params );

    global $woocommerce;

    self::add_to_wc_cart( $sanitized_params['data'] );

    return $woocommerce->cart;
  }

  public static function sanitize_buy_params( $params ) {
    return array(
      "contextId" => $params['contextId'],
      "data" => json_decode( $params['data'] )
    );
  }

  public static function add_to_wc_cart( $items ) {
    global $woocommerce;

    foreach ($items as $item) {
      $woocommerce->cart->add_to_cart( $item->productId, $item->quantity );
    }
  }
}
