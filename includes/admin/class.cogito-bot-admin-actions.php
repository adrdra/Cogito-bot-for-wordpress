<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'CogitoBot_Admin_Actions' ) ) :

class CogitoBot_Admin_Actions {
  public static function get_action() {
		global $wpdb;

		if ( ! $_GET['action'] ) {
			$id = $wpdb->query( "SELECT cogito_id FROM {$wpdb->prefix}cogito_bot_customer LIMIT 1;" );

			if ( ! $id ) {
				wp_redirect( add_query_arg( 'action', 'subscribe_to_cogito',  $_SERVER['REQUEST_URI'] ) );
			} else {
				wp_redirect( add_query_arg( 'action', 'get_admin_panel',  $_SERVER['REQUEST_URI'] ) );
			}
		}

		CogitoBot_Admin_Settings::output();
  }
}

endif;
