<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'CogitoBot_Admin_Menus' ) ) :

/**
 * CogitoBot_Admin_Menus Class.
 */
class CogitoBot_Admin_Menus {

	/**
	 * Hook in tabs.
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'admin_menu' ), 10 );
	}

	/**
	 * Add menu items.
	 */
	public function admin_menu() {

		global $menu;

		if ( current_user_can( 'manage_cogitobot' ) ) {
			$menu[] = array( '', 'read', 'separator-cogitobot', '', 'wp-menu-separator cogitobot' );
		}

		add_menu_page(
			__( 'CogitoBot', 'cogitobot' ),
			__( 'CogitoBot', 'cogitobot' ),
			'manage_cogitobot',
			'cogito-admin-page.php',
			array( $this, 'settings_page' ),
			null,
			'60'
		);
	}

	/**
	 * Init the attributes page.
	 */
	public function settings_page() {
		include_once( COGITO_BOT__PLUGIN_DIR . 'includes/helpers/class.cogito-wc-helpers.php' );
		Cogito_WC_Helpers::is_wc_api_activated();

		if ( is_good_wc_version() ) {
			CogitoBot_Admin_Actions::get_action();
		} else {
			CogitoBot_Admin_Error_WC_Version::output();
		}
	}
}

endif;

return new CogitoBot_Admin_Menus();
