<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'CogitoBot_Admin_Error_WC_Version' ) ) :

class CogitoBot_Admin_Error_WC_Version {

  public static function output() {
		wp_register_style( 'admin-error-wc-version-style', COGITO_BOT__PLUGIN_URL .'assets/css/admin-error-wc-version.css');
		wp_enqueue_style( 'admin-error-wc-version-style' );

		wp_register_script( 'admin-error-wc-version-script', COGITO_BOT__PLUGIN_URL .'assets/js/admin-error-wc-version.js' );
		wp_enqueue_script( 'admin-error-wc-version-script' );

    include_once(COGITO_BOT__PLUGIN_DIR . 'views/view.admin-error-wc-version.php');
  }

}

endif;
