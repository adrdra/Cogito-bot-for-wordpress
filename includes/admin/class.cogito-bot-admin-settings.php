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
		wp_register_style( 'bootstrap', COGITO_BOT__PLUGIN_URL .'assets/css/lib/bootstrap.min.css');
		wp_enqueue_style( 'bootstrap' );

		wp_register_style( 'admin-settings-style', COGITO_BOT__PLUGIN_URL .'assets/css/admin-settings.css');
		wp_enqueue_style( 'admin-settings-style' );

		wp_register_script( 'admin-settings-script', COGITO_BOT__PLUGIN_URL .'assets/js/admin-settings.js' );
		wp_enqueue_script( 'admin-settings-script' );

		switch ($_GET["action"]) {
			case 'select_page':
				wp_register_style( 'modal-select-page-style', COGITO_BOT__PLUGIN_URL .'assets/css/modals/modal-select-page.css');
				wp_enqueue_style( 'modal-select-page-style' );

				wp_register_script( 'modal-select-page-script', COGITO_BOT__PLUGIN_URL .'assets/js/modals/modal-select-page.js' );
				wp_enqueue_script( 'modal-select-page-script' );
				break;
			case 'subscribe_to_cogito':
				wp_register_style( 'modal-subscribe-to-cogito-style', COGITO_BOT__PLUGIN_URL .'assets/css/modals/modal-subscribe-to-cogito.css');
				wp_enqueue_style( 'modal-subscribe-to-cogito-style' );

				wp_register_script( 'modal-select-page-script', COGITO_BOT__PLUGIN_URL .'assets/js/modals/modal-subscribe-to-cogito.js' );
				wp_enqueue_script( 'modal-select-page-script' );
				break;
		}
		include_once(COGITO_BOT__PLUGIN_DIR . 'views/view.admin-settings.php');
  }
}

endif;
