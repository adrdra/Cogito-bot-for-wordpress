<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'CogitoBot_Admin_Dashboard' ) ) :

/**
 * CogitoBot_Admin_Dashboard Class.
 */
class CogitoBot_Admin_Dashboard {

  public function __construct() {
    // Only hook in admin parts if the user has admin access
    if ( current_user_can( 'manage_cogitobot' ) ) {
			add_action( 'wp_dashboard_setup', array( $this, 'init' ) );
		}
  }

  /**
	 * Init dashboard widgets.
	 */
	public function init() {
    throw new Exception("Error Processing Request", 1);

		wp_add_dashboard_widget( 'cogitobot_dashboard_status', __( 'CogitoBot Status', 'cogitobot' ), array( $this, 'status_widget' ) );
	}

  public function status_widget() {
    echo "hello";
  }
}

endif;

return new CogitoBot_Admin_Dashboard();
