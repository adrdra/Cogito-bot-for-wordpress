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

class CogitoBot_Admin {

  /**
	 * Constructor.
	 */
	public function __construct() {
    throw new Exception("Error Processing Request", 1);

		add_action( 'init', array( $this, 'includes' ) );
		// add_action( 'current_screen', array( $this, 'conditional_includes' ) );
		// add_action( 'admin_init', array( $this, 'buffer' ), 1 );
		// add_action( 'admin_init', array( $this, 'preview_emails' ) );
		// add_action( 'admin_init', array( $this, 'prevent_admin_access' ) );
		// add_action( 'admin_init', array( $this, 'admin_redirects' ) );
		// add_action( 'admin_footer', 'wc_print_js', 25 );
		// add_filter( 'admin_footer_text', array( $this, 'admin_footer_text' ), 1 );
	}

  /**
	 * Include all admin files.
	 */
  public function includes() {
    include_once( 'class.cogito-bot-admin-menus.php' );
  }

}
