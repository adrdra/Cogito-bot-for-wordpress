<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'CogitoBot_Admin_Settings' ) ) :

class CogitoBot_Admin_Settings {

  /**
   * Handles output of the attributes page in admin.
   *
   * Shows the created attributes and lets you add new ones or edit existing ones.
   * The added attributes are stored in the database and can be used for layered navigation.
   */
  public static function output() {
		wp_register_style( 'admin-settings-style', COGITO_BOT__PLUGIN_URL .'assets/css/admin-settings.css');
		wp_enqueue_style( 'admin-settings-style' );

		wp_register_script( 'admin-settings-script', COGITO_BOT__PLUGIN_URL .'assets/js/admin-settings.js' );
		wp_enqueue_script( 'admin-settings-script' );

		include_once(COGITO_BOT__PLUGIN_DIR . 'views/view.admin-settings.php');
  }
}

endif;
