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
			'admin.php?page=cogito',
			array( $this, 'settings_page' ),
			null,
			'60'
		);
	}

	/**
	 * Init the attributes page.
	 */
	public function settings_page() {
		if ( $this->is_good_wc_version() ) {
			CogitoBot_Admin_Settings::output();
		} else {
			CogitoBot_Admin_Error_WC_Version::output();
		}
	}

	private function is_good_wc_version() {
		if ( (float)$GLOBALS['woocommerce']->version < COGITO_BOT__MINIMUM_WC_VERSION ) return false;
		return true;
	}
}

endif;

return new CogitoBot_Admin_Menus();
