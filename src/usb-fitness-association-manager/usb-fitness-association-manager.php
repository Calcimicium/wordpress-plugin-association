<?php

/*
 * Plugin Name: Association manager
 * Plugin URI: https://github.com/Calcimicium/wordpress-plugin-association
 * Version: 0.1
 * Requires at least: 7.1
 * Requires PHP: 8.3
 * Author: Dorian Herlory
 * Author URI: https://github.com/Calcimicium
 * License: MIT
 * License URI: https://mit-license.org/
 * Text Domain: usb-fitness-association-manager
 * Domain Path: /languages
 */

namespace UnionSportiveBriollaytaine\Wordpress\Plugins\AssociationManager;

class AssociationManagerPlugin {
	const PLUGIN_SLUG = 'usb-fitness-association-manager';

	public static function init(): void {
		add_action( 'admin_menu', [
			'UnionSportiveBriollaytaine\Wordpress\Plugins\AssociationManager\AssociationManagerPlugin',
			'configure_menu'
		] );
	}

	public static function configure_menu(): void {
		add_menu_page(
			__( 'Association management' ),
			__( 'Association' ),
			'read',
			'usb-fitness-association-manager',
			'',
			'dashicons-groups',
			3
		);
	}

	public static function get_plugin_path(): string {
		return dirname( plugin_basename( __FILE__ ) );
	}
}

add_action( 'init', function () {
	$plugin_rel_path = AssociationManagerPlugin::get_plugin_path() . '/languages';
	load_plugin_textdomain( AssociationManagerPlugin::PLUGIN_SLUG, false, $plugin_rel_path );
} );

add_action( 'plugins_loaded', [
	'UnionSportiveBriollaytaine\Wordpress\Plugins\AssociationManager\AssociationManagerPlugin',
	'init'
] );