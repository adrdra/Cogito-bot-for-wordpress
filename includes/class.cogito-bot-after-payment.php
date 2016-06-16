<?php

class CogitoBot_After_Payment {
  public function __construct() {
    add_action( 'woocommerce_thankyou', array( $this, 'send_shipping_order'), 10, 1 );
  }

  public function send_shipping_order( $order_id ) {
    session_start();

    global $woocommerce;

    $order = new WC_Order( $order_id );

    $billing_data = $this->sanitize_order( $order );

    // print_r(json_encode( $billing_data ));

    wp_remote_post( COGITOAPP_DOMAIN_URL . '/cart-bought/' . $_SESSION['contextId'], $billing_data );
  }

  public function sanitize_order( $order ) {
    return array(
      'method' => 'POST',
      "body" => array(
        "recipientName" => $this->get_billing_fullname( $order ),
        "orderNumber" => $this->get_billing_Number( $order ),
        "orderUrl" => $this->get_billing_url( $order ),
        "adjustments" => $this->get_billing_coupons( $order ),
        "paymentMethod" => $this->get_billing_payment_method( $order ),
        "summary" => $this->get_billing_summary( $order ),
        "address" => $this->get_billing_address( $order ),
        "products" => $this->get_billing_products( $order )
      )
    );
  }

  private function get_billing_fullname( $order ) {
    return "{$order->billing_first_name} {$order->billing_last_name}";
  }

  private function get_billing_Number( $order ) {
    return "{$order->id}";
  }

  private function get_billing_url( $order ) {
    return WC_Order::get_checkout_order_received_url() . $order->id . "?key=" . $order->order_key;
  }

  private function get_billing_coupons( $order ) {
    return $order->get_used_coupons();
  }

  private function get_billing_payment_method( $order ) {
    return get_post_meta( $order->id, '_payment_method', true );;
  }

  private function get_billing_summary( $order ) {
    return array(
      "subtotal" => "0",
      "shipping_cost" => $order->order_shipping_tax,
      "total_tax" => $order->order_tax,
      "total_cost" => $order->order_total
    );
  }

  private function get_billing_address( $order ) {
    return array(
      "street_1" => $order->shipping_address_1,
      "street_2" => $order->shipping_address_2,
      "city" => $order->shipping_city,
      "state" => $order->shipping_state || "FR",
      "country" => $order->shipping_country,
      "postal_code" => $order->shipping_postcode
    );
  }

  private function get_billing_products( $order ) {
    $items = $order->get_items();
    $arr = array();

    foreach ( $items as $key => $item ) {
      array_push($arr, array(
        "quantity" => $item['qty'],
        "productId" => $item['product_id']
      ));
    }

    return $arr;
  }
}

return new CogitoBot_After_Payment();
