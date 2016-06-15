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
	}

  /**
	 * Include all admin files.
	 */
  public function includes() {
    include_once( 'class.cogito-bot-admin-menus.php' );
		include_once( 'class.cogito-bot-admin-settings.php' );
		include_once( 'class.cogito-bot-admin-error-wc-version.php' );
		include_once( COGITO_BOT__PLUGIN_DIR . 'includes/helpers/cogito-admin-helpers.php' );
  }

}

endif;

return new CogitoBot_Admin();
