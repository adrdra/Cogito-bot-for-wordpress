<?php

class CogitoBot_After_Payment {
  public function __construct() {
    add_action( 'woocommerce_thankyou', array( $this, 'send_shipping_order'), 10, 1 );
  }

  public function send_shipping_order( $order_id ) {
    global $woocommerce;

    $order = new WC_Order( $order_id );

    print_r($this->get_billing_products( $order ));
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
      "subtotal" => 0,
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
      "state" => $order->shipping_state,
      "country" => $order->shipping_country,
      "postal_code" => $order->shipping_postcode
    );
  }

  private function get_billing_products( $order ) {
    $items = $order->get_items();
    $arr = array();

    foreach ( $items as $item ) {
      array_push($arr, array(
        "quantity" => $item->quantity,
        "productId" => $item->id
      ));
    }

    return $arr;
  }

  public function sanitize_order( $customer ) {
    // return array(
    //   "recipientName" =>
    // )
  }
//   {
//   recipientName: 'Anonyme man',
//   orderNumber: '12302132',
//   orderUrl: 'http://woocommerce.com/order/id',
//   adjustments: [
//     {
//       name: '',
//       amount: 0
//     }
//   ],
//   paymentMethod: '',
//   summary: {
//     subtotal: 75.00,
//     shipping_cost: 4.95,
//     total_tax: 6.19,
//     total_cost: 56.14
//   },
//   address: {
//     street_1: '1 Hacker Way',
//     city: 'Menlo Park',
//     postal_code: '94025',
//     state: 'CA',
//     country: 'US'
//   },
//   products: [
//     {
//       quantity: 1,
//       productId: 20
//     }
//   ],
// }
}

return new CogitoBot_After_Payment();
