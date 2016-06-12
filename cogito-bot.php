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

define( 'COGITO_BOT_VERSION', '1.0.0' );
define( 'COGITO_BOT__MINIMUM_WP_VERSION', '3.1' );
define( 'COGITO_BOT__MINIMUM_WC_VERSION', '2.6');
define( 'COGITO_BOT__PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'COGITO_BOT__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'COGITO_BOT_DELETE_LIMIT', 100000 );

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

if ( class_exists('WC_Integration') ) {
  require_once( COGITO_BOT__PLUGIN_DIR . 'class.wc-integration-cogito-bot.php' );
  $wc_integration_cogito_bot = new WC_Integration_Cogito_Bot();
}
