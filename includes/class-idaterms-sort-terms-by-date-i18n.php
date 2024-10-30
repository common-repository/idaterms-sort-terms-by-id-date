<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://ceslava.com
 * @since      1.0.0
 *
 * @package    Idaterms_Sort_Terms_By_Date
 * @subpackage Idaterms_Sort_Terms_By_Date/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Idaterms_Sort_Terms_By_Date
 * @subpackage Idaterms_Sort_Terms_By_Date/includes
 * @author     Cristian Eslava <cristianeslava@hotmail.com>
 */
class Idaterms_Sort_Terms_By_Date_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'idaterms-sort-terms-by-id-date',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
