<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           SKBN_Turnier_List
 *
 * @wordpress-plugin
 * Plugin Name:       SKBN Turnier Liste
 * Plugin URI:        http://example.com/skbn-turnier-list-uri/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Claas Rockmann-Buchterkirche
 * Author URI:        http://example.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       skbn-turnier-list
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'SKBN_TURNIER_LIST_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-skbn-turnier-list-activator.php
 */
function activate_skbn_turnier_list() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-skbn-turnier-list-activator.php';
	SKBN_Turnier_List_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-skbn-turnier-list-deactivator.php
 */
function deactivate_skbn_turnier_list() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-skbn-turnier-list-deactivator.php';
	SKBN_Turnier_List_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_skbn_turnier_list' );
register_deactivation_hook( __FILE__, 'deactivate_skbn_turnier_list' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-skbn-turnier-list.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_skbn_turnier_list() {

	$plugin = new SKBN_Turnier_List();
	$plugin->run();

}
run_skbn_turnier_list();
