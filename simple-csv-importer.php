<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://profiles.wordpress.org/apsaraaruna/
 * @since             1.0.0
 * @package           Simple_Csv_Importer
 *
 * @wordpress-plugin
 * Plugin Name:       Simple CSV importer
 * Plugin URI:        https://wordpress.org/plugins/simple-csv-importer
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Apsara Aruna
 * Author URI:        https://profiles.wordpress.org/apsaraaruna/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       simple-csv-importer
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
define( 'SIMPLE_CSV_IMPORTER_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-simple-csv-importer-activator.php
 */
function activate_simple_csv_importer() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-simple-csv-importer-activator.php';
	Simple_Csv_Importer_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-simple-csv-importer-deactivator.php
 */
function deactivate_simple_csv_importer() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-simple-csv-importer-deactivator.php';
	Simple_Csv_Importer_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_simple_csv_importer' );
register_deactivation_hook( __FILE__, 'deactivate_simple_csv_importer' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-simple-csv-importer.php';

/**
 * Begins execution of the plugin.
 *
 * @since    1.0.0
 */
function run_simple_csv_importer() {

	$plugin = new Simple_Csv_Importer();
	$plugin->run();

}
run_simple_csv_importer();


if ( !defined('WP_LOAD_IMPORTERS') )
    return;

// Load Importer API
require_once ABSPATH . 'wp-admin/includes/import.php';

if ( !class_exists( 'WP_Importer' ) ) {
    $class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
    if ( file_exists( $class_wp_importer ) )
        require_once $class_wp_importer;
}

// Load Helpers
require dirname( __FILE__ ) . '/includes/class-simple_csv_helper.php';
require dirname( __FILE__ ) . '/includes/class-simple_csv_import_post_helper.php';
require dirname( __FILE__ ) . '/includes/class-simple_csv_import_init.php';

