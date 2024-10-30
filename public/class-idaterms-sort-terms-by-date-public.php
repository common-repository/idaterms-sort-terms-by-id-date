<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://ceslava.com
 * @since      1.0.0
 *
 * @package    Idaterms_Sort_Terms_By_Date
 * @subpackage Idaterms_Sort_Terms_By_Date/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Idaterms_Sort_Terms_By_Date
 * @subpackage Idaterms_Sort_Terms_By_Date/public
 * @author     Cristian Eslava <cristianeslava@hotmail.com>
 */
class Idaterms_Sort_Terms_By_Date_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}



}
