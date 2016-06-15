<?php

/**
 * Check if installed WooCommerce is higher than COGITO_BOT__MINIMUM_WC_VERSION
 **/
function is_good_wc_version() {
  if ( (float)$GLOBALS['woocommerce']->version < COGITO_BOT__MINIMUM_WC_VERSION ) return false;
  return true;
};

function create_query_url($params) {
  $query = http_build_query($params);
  $current = currentUrl();
  return "{$current}&{$query}";
};

function currentUrl() {
  $protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']),'https') === FALSE ? 'http' : 'https';
  $host     = $_SERVER['HTTP_HOST'];
  $script   = $_SERVER['SCRIPT_NAME'];
  $params   = $_SERVER['QUERY_STRING'];

  return $protocol . '://' . $host . $script . '?' . $params;
}

function redirect_request($url) {
  wp_redirect( $url );
}
