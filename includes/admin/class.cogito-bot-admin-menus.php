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
		include_once('class.cogito-bot-admin-settings.php');
		
		CogitoBot_Admin_Settings::output();
	}
}

endif;

return new CogitoBot_Admin_Menus();
