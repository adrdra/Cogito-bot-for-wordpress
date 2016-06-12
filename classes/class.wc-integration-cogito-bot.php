<?php
/**
 * Integration WooCommerce to Cogito Bot.
 *
 * @package  WC_Integration_Cogito_Bot
 * @category Integration
 * @author   Alexis Delvaque
 */


if ( ! class_exists( 'WC_Integration_Cogito_Bot' ) ) :

  class WC_Integration_Cogito_Bot extends WC_Integration {
    /**
  	 * Init and hook in the integration.
  	 */
  	public function __construct() {
  		global $woocommerce;
  		$this->id                 = 'integration-cogito-bot';
  		$this->method_title       = __( 'Integration Cogito Bot', 'woocommerce-integration-cogito-bot' );
  		$this->method_description = __( 'An integration of WooCommerce to Cogito Bot.', 'woocommerce-integration-cogito-bot' );
  		// Load the settings.
  		$this->init_form_fields();
  		$this->init_settings();
  		// Define user set variables.
  		$this->api_key          = $this->get_option( 'api_key' );
  		$this->debug            = $this->get_option( 'debug' );
  		// Actions.
  		add_action( 'woocommerce_update_options_integration_' .  $this->id, array( $this, 'process_admin_options' ) );
  	}

    /**
  	 * Initialize integration settings form fields.
  	 */
  	public function init_form_fields() {
  		$this->form_fields = array(
  			'api_key' => array(
  				'title'             => __( 'API Key', 'woocommerce-integration-cogito-bot' ),
  				'type'              => 'text',
  				'description'       => __( 'Enter with your API Key. You can find this in "User Profile" drop-down (top right corner) > API Keys.', 'woocommerce-integration-cogito-bot' ),
  				'desc_tip'          => true,
  				'default'           => ''
  			),
  			'debug' => array(
  				'title'             => __( 'Debug Log', 'woocommerce-integration-cogito-bot' ),
  				'type'              => 'checkbox',
  				'label'             => __( 'Enable logging', 'woocommerce-integration-cogito-bot' ),
  				'default'           => 'no',
  				'description'       => __( 'Log events such as API requests', 'woocommerce-integration-cogito-bot' ),
  			),
  		);
  	}

  }

endif;
