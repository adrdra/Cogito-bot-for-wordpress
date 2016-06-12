<?php
/**
 * To require a class file
 */
function require_class_file( $filename ) {
  require_once( COGITO_BOT__PLUGIN_DIR . '/classes/' . $filename );
}
