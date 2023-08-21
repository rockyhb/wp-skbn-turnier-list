<?php

/**
 * Fired during plugin activation
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    SKBN_Turnier_List
 * @subpackage SKBN_Turnier_List/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    SKBN_Turnier_List
 * @subpackage SKBN_Turnier_List/includes
 * @author     Your Name <email@example.com>
 */
class SKBN_Turnier_List_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
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

	    $labels = array(
			'name'                          => esc_attr__('Event', 'super-simple-event-calendar'),
			'singular_name'                 => esc_attr__('Event', 'super-simple-event-calendar'),
			'add_new'                       => esc_attr__('New Event', 'super-simple-event-calendar'),
			'add_new_item'                  => esc_attr__('Add new Event', 'super-simple-event-calendar'),
			'edit_item'                     => esc_attr__('Edit Event', 'super-simple-event-calendar'),
			'new_item'                      => esc_attr__('New Event', 'super-simple-event-calendar'),
			'view_item'                     => esc_attr__('View Event', 'super-simple-event-calendar'),
			'search_items'                  => esc_attr__('Search Event', 'super-simple-event-calendar'),
			'not_found'                     => esc_attr__('No Event found', 'super-simple-event-calendar'),
			'not_found_in_trash'            => esc_attr__('No Event found in trash', 'super-simple-event-calendar'),
			'parent_item_colon'             => '',
			'menu_name'                     => esc_attr__('Events', 'super-simple-event-calendar'),
		);
		register_post_type('ssec_event', array(
			'public'                        => true,
			'show_in_menu'                  => true,
			'show_ui'                       => true,
			'labels'                        => $labels,
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

}
