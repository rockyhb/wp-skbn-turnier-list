<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    SKBN_Turnier_List
 * @subpackage SKBN_Turnier_List/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    SKBN_Turnier_List
 * @subpackage SKBN_Turnier_List/includes
 * @author     Your Name <email@example.com>
 */
class SKBN_Turnier_List {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      SKBN_Turnier_List_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $skbn_turnier_list    The string used to uniquely identify this plugin.
	 */
	protected $skbn_turnier_list;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'SKBN_TURNIER_LIST_VERSION' ) ) {
			$this->version = SKBN_TURNIER_LIST_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->skbn_turnier_list = 'skbn-turnier-list';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - SKBN_Turnier_List_Loader. Orchestrates the hooks of the plugin.
	 * - SKBN_Turnier_List_i18n. Defines internationalization functionality.
	 * - SKBN_Turnier_List_Admin. Defines all hooks for the admin area.
	 * - SKBN_Turnier_List_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-skbn-turnier-list-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-skbn-turnier-list-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-skbn-turnier-list-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-skbn-turnier-list-public.php';

		$this->loader = new SKBN_Turnier_List_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the SKBN_Turnier_List_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new SKBN_Turnier_List_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new SKBN_Turnier_List_Admin( $this->get_skbn_turnier_list(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new SKBN_Turnier_List_Public( $this->get_skbn_turnier_list(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_skbn_turnier_list() {
		return $this->skbn_turnier_list;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    SKBN_Turnier_List_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

	public static function register_post_types() {

	    $res = register_post_type('skbn_event',
		array(
			'labels'      => array(
				'name'          => esc_attr__('Event', 'skbn-turnier-list'),
				'singular_name' => esc_attr__('Event', 'skbn-turnier-list'),
				'add_new'                       => esc_attr__('New Event', 'skbn-turnier-list'),
				'add_new_item'                  => esc_attr__('Add new Event', 'skbn-turnier-list'),
				'edit_item'                     => esc_attr__('Edit Event', 'skbn-turnier-list'),
				'new_item'                      => esc_attr__('New Event', 'skbn-turnier-list'),
				'view_item'                     => esc_attr__('View Event', 'skbn-turnier-list'),
				'search_items'                  => esc_attr__('Search Event', 'skbn-turnier-list'),
				'not_found'                     => esc_attr__('No Event found', 'skbn-turnier-list'),
				'not_found_in_trash'            => esc_attr__('No Event found in trash', 'skbn-turnier-list'),
				'parent_item_colon'             => '',
				'menu_name'                     => esc_attr__('Events', 'skbn-turnier-list'),
			),
			'public'                        => true,
			'show_in_menu'                  => true,
			'show_ui'                       => true,
			'hierarchical'                  => false,
			'supports'                      => array( 'title', 'editor', 'excerpt' ),
			'capability_type'               => 'post',
			'taxonomies'                    => array( 'ssec_season' ),
			'exclude_from_search'           => false,
			'rewrite'                       => true,
			'rewrite'                       => array(
								'slug' => 'ssec_event',
								'with_front' => true,
							   ),
			'menu_icon'                     => 'dashicons-calendar',
			)

	    );
	}

	public static function short_code_test( $atts = [], $content = null, $tag = '' ) {
		// normalize attribute keys, lowercase
		$atts = array_change_key_case( (array) $atts, CASE_LOWER );

		// override default attributes with user attributes
		$wporg_atts = shortcode_atts(
			array(
				'title' => 'WordPress.org',
			), $atts, $tag
		);

		// start box
		$o = '<div class="wporg-box">';

		// title
		$o .= '<h2>' . esc_html( $wporg_atts['title'] ) . '</h2>';

		$date_now = date('Y-m-d H:i:s');
			
		// args
		$posts = get_posts(array(
			'numberposts'   => -1,
			'post_type'     => 'turnier',
			'order'         => 'ASC',
			'orderby'       => 'meta_value',
			'meta_key'      => 'datum',
			'meta_type'     => 'DATETIME',
			'meta_query'    => array(
				array(
					'key'     => 'datum',
					'compare' => '>=',
					'value'   => $date_now,
					'type'    => 'DATETIME',
				),
			),
		));

		if( $posts ) {
			$o .= '<ul>';
			foreach(  $posts as $post ) {
				$o .= '<li>';
				$o .= '<a href="' . get_permalink($post) . '">';
				
				$unixtimestamp = strtotime( get_field('datum',$post) );
				$o .= date_i18n( "D d.m. G:i",$unixtimestamp);
				$o .= '&nbsp;';
				$o .= get_the_title($post);
				$o .= '</a>';
				/*
				*/
				$o .= '</li>';
			}
			$o .= '</ul>';
		}
		// wp_reset_query();

		// enclosing tags
		if ( ! is_null( $content ) ) {
			// $content here holds everything in between the opening and the closing tags of your shortcode. eg.g [my-shortcode]content[/my-shortcode].
		// Depending on what your shortcode supports, you will parse and append the content to your output in different ways.
			// In this example, we just secure output by executing the_content filter hook on $content.
			$o .= apply_filters( 'the_content', $content );
		}

		// end box
		$o .= '</div>';

		// return output
		return $o;
	}

	public static function register_short_codes() {
		add_shortcode( 'skbn_test', 'SKBN_Turnier_List::short_code_test' );
	}


}

add_action( 'init', 'SKBN_Turnier_List::register_short_codes' );

add_action('init', 'SKBN_Turnier_List::register_post_types');
