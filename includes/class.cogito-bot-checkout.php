<?php
class CogitoBot_Checkout {
  public function __construct() {
    add_action( 'woocommerce_before_checkout_form', array( $this, 'save_context_id' ) );
  }

  public function save_context_id() {
    session_start();
    
    $_SESSION['contextId'] = $_GET['context'];
  }
}

return new CogitoBot_Checkout();
