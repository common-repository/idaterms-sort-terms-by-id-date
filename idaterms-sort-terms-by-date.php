<?php

/**
 *
 * @link              http://ceslava.com
 * @since             1.0.0
 * @package           Idaterms_Sort_Terms_By_Date
 *
 * @wordpress-plugin
 * Plugin Name:       IDATERMS
 * Plugin URI:        http://ceslava.com
 * Description:       Add an extra column with the ID term to your taxonomies (Tags, Catgeories or Custom Taxonomies) so you can sort your terms by date.
 * Version:           1.0.0
 * Author:            Cristian Eslava
 * Author URI:        http://ceslava.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       idaterms-sort-terms-by-id-date
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-idaterms-sort-terms-by-date-activator.php
 */
function activate_idaterms_sort_terms_by_date() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-idaterms-sort-terms-by-date-activator.php';
	Idaterms_Sort_Terms_By_Date_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-idaterms-sort-terms-by-date-deactivator.php
 */
function deactivate_idaterms_sort_terms_by_date() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-idaterms-sort-terms-by-date-deactivator.php';
	Idaterms_Sort_Terms_By_Date_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_idaterms_sort_terms_by_date' );
register_deactivation_hook( __FILE__, 'deactivate_idaterms_sort_terms_by_date' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-idaterms-sort-terms-by-date.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_idaterms_sort_terms_by_date() {

	$plugin = new Idaterms_Sort_Terms_By_Date();
	$plugin->run();

}
run_idaterms_sort_terms_by_date();
