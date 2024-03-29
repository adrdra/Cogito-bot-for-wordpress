<?php

require_once( ABSPATH . 'wp-admin/includes/plugin.php' );

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class CogitoBot_Install {

  public static function init() {
		add_action( "cogito-install", array( __CLASS__, 'install' ) );
  }

	/**
	 * Install Cogito
	 */
	public static function install() {

		if ( ! defined( 'COGITO_INSTALLING' ) ) {
			define( 'COGITO_INSTALLING', true );
		}

		self::create_tables();
		self::add_capabilities();
		self::enqueue_scripts();
	}

	/**
	 * Set up the database tables which the plugin needs to function.
	 *
	 * Tables:
	 *		cogito_bot_customer - Table to store all the user data
	 */
  private static function create_tables() {
		global $wpdb;

		$wpdb->hide_errors();

		if ( $wpdb->get_var( "SHOW TABLES LIKE '{$wpdb->prefix}cogito_bot_customer';" ) ) {
			return;
		}

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

		dbDelta( self::get_schema() );
  }

	private static function get_schema() {

		global $wpdb;

		$collate = '';

		if ( $wpdb->has_cap( 'collation' ) ) {
			$collate = $wpdb->get_charset_collate();
		}

		$tables = "
			CREATE TABLE {$wpdb->prefix}cogito_bot_customer (
				cogito_id varchar(200) NOT NULL,
				PRIMARY KEY  (cogito_id)
			) $collate;";

		return $tables;
	}

	private static function add_capabilities() {
		global $wp_roles;

		if ( ! class_exists( 'WP_Roles' ) ) {
			return;
		}

		if ( ! isset( $wp_roles ) ) {
			$wp_roles = new WP_Roles();
		}

		$wp_roles->add_cap( 'administrator', 'manage_cogitobot' );
	}

	private static function enqueue_scripts() {
		wp_register_style( 'cogito-main-style', COGITO_BOT__PLUGIN_URL .'assets/css/main.css' );
		wp_enqueue_style( 'cogito-main-style' );

		wp_register_script( 'cogito-main-script', COGITO_BOT__PLUGIN_URL . 'assets/js/main.js', array('jquery') );
		wp_enqueue_script( 'cogito-main-script' );
	}
}

CogitoBot_Install::init();
