<?php
/**
 * WooCommerce Admin
 *
 * @class    Cogito_Bot_Admin
 * @author   Cogito
 * @category Admin
 * @package  CogitoBot/Admin
 * @version  1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'CogitoBot_Admin' ) ) :

class CogitoBot_Admin {

  /**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'includes' ) );
		add_action( 'current_screen', array( $this, 'conditional_includes' ) );
	}

  /**
	 * Include all admin files.
	 */
  public function includes() {
    include_once( 'class.cogito-bot-admin-menus.php' );
  }

	public function conditional_includes() {
		if ( ! $screen = get_current_screen() ) {
			return;
		}

		switch ( $screen->id ) {
			case 'toplevel_page_cogitobot' :
				include_once( 'class.cogito-bot-admin-dashboard.php' );
				break;
		}

	}

}

endif;

return new CogitoBot_Admin();
