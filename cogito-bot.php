<?php
/**
 * Plugin Name: Cogito Bot
 * Plugin URI: http://cogito-bot.com/
 * Description: Used by the best e-commerce websites, Cogito Bot is the best way to <strong>connect your ecommerce to Facebook Messenger</strong>. It permits to create a more exclusive contact with your consummer.
 * Version: 1.0.0
 * Author: Cogito
 * Author URI: http://cogito-bot.com/
 * License: GPLv2 or later
 * Text Domain: cogito-bot
 *
 * @package Cogito Bot
 * @author Cogito
 */

if ( ! defined( 'ABSPATH' ) ) {
  throw new Exception("Cogito is accessible directly");
  exit;
}

/**
 * Check if WooCommerce is active
 */
if ( ! in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
  echo 'Hi there! I\'m Cogito and to use my power you need to <strong>install or active Woocommerce Plugin</strong>.';
  exit;
}

if ( ! class_exists('Cogito_Bot') ) :

final class CogitoBot {

  /**
   * The single one instance of CogitoBot
   */
  protected static $_instance = null;

  /**
	 * CogitoBot Constructor.
	 */
	public function __construct() {
		$this->define_constants();
		$this->includes();
		$this->init_hooks();

    do_action( 'cogito-install' );
	}

  /**
	 * Define CogitoBot Constants.
	 */
	private function define_constants() {
    $this->define( 'COGITO_BOT_NAME', 'cogito-bot' );
    $this->define( 'COGITO_BOT_VERSION', '1.0.0' );
    $this->define( 'COGITO_BOT__MINIMUM_WP_VERSION', '3.1' );
    $this->define( 'COGITO_BOT__MINIMUM_WC_VERSION', '2.6');
    $this->define( 'COGITO_BOT__PLUGIN_URL', plugin_dir_url( __FILE__ ) );
    $this->define( 'COGITO_BOT__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
    $this->define( 'COGITO_BOT_DELETE_LIMIT', 100000 );
    $this->define( 'COGITOAPP_DOMAIN_URL', 'http://cogito-bot.herokuapp.com' );
    $this->define( 'COGITOBOT_CUSTOMER_TYPE', 'woocommerce' );
    $this->define( 'COGITOBOT_FACEBOOK_AUTH_URL', '/customers/authorize/facebook' );
	}

  /**
   * Include CogitoBot needed files.
   */
  private function includes() {
    include_once( 'includes/class.cogito-bot-install.php' );
    include_once( 'includes/api/class.cogito-bot-routes.php' );

    if ( $this->is_request('admin') ) :
      include_once( 'includes/admin/class.cogito-bot-admin.php' );
    endif;
  }

  /**
   * Hook into actions and filters.
   * @since  2.3
   */
  private function init_hooks() {
    register_activation_hook( __FILE__, array( 'CogitoBot_Install', 'install' ) );
  }

  /**
	 * Main CogitoBot Instance.
	 *
	 * Ensures only one instance of CogitoBo is loaded or can be loaded.
	 *
	 * @static
	 * @see CogitoBot()
	 * @return CogitoBot - Main instance.
	 */
  public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

   /**
 	 * What type of request is this?
 	 *
 	 * @param  string $type admin, ajax, cron or frontend.
 	 * @return bool
 	 */
 	private function is_request( $type ) {
    switch ( $type ) {
      case 'admin':
        return is_admin();
    }
  }

  /**
	 * Define constant if not already set.
	 *
	 * @param  string $name
	 * @param  string|bool $value
	 */
	private function define( $name, $value ) {
		if ( ! defined( $name ) ) {
			define( $name, $value );
		}
	}
}

endif;

/**
 * Main instance of CogitoBot.
 *
 * Returns the main instance of CogitoBot to prevent the need to use globals.
 *
 * @since  2.1
 * @return WooCommerce
 */
function CogitoBot() {
	return CogitoBot::instance();
}

// Global for backwards compatibility.
$GLOBALS['cogitobot'] = CogitoBot();
