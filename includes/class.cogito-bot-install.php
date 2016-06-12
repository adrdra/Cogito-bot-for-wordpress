<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class CogitoBot_Install {

  public static function init() {
    add_action( 'cogito-init', array( __CLASS__, 'check_wc_api' ), 1, 0 );
  }

  private function create_table() {

  }

  public function check_wc_api() {
		if ( (float)$GLOBALS['woocommerce']->version < 2.7) :

		endif;
		// throw new Exception("lol" . $GLOBALS['woocommerce']->version, 1);
  }
}

CogitoBot_Install::init();
