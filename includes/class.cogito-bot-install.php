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
				facebook_id varchar(100) NOT NULL,
				facebook_access_token varchar(1000) NOT NULL,
				UNIQUE KEY facebook_id (facebook_id),
				PRIMARY KEY  (cogito_id)
			) $collate;";

		return $tables;
	}
}

CogitoBot_Install::init();
