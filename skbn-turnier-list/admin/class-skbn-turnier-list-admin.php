<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    SKBN_Turnier_List
 * @subpackage SKBN_Turnier_List/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    SKBN_Turnier_List
 * @subpackage SKBN_Turnier_List/admin
 * @author     Your Name <email@example.com>
 */
class SKBN_Turnier_List_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $skbn_turnier_list    The ID of this plugin.
	 */
	private $skbn_turnier_list;

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
	 * @param      string    $skbn_turnier_list       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $skbn_turnier_list, $version ) {

		$this->skbn_turnier_list = $skbn_turnier_list;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in SKBN_Turnier_List_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The SKBN_Turnier_List_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->skbn_turnier_list, plugin_dir_url( __FILE__ ) . 'css/skbn-turnier-list-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in SKBN_Turnier_List_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The SKBN_Turnier_List_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->skbn_turnier_list, plugin_dir_url( __FILE__ ) . 'js/skbn-turnier-list-admin.js', array( 'jquery' ), $this->version, false );

	}

}
