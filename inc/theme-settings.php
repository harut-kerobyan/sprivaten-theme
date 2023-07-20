<?php

if ( ! function_exists( 'sprivaten_theme_setup_theme' ) ) {
	/**
	 * General Theme Settings.
	 *
	 * @return void
	 * @since v1.0
	 *
	 */
	function sprivaten_theme_setup_theme() {
		// Make theme available for translation: Translations can be filed in the /languages/ directory.
		load_theme_textdomain( 'sprivaten-theme', get_template_directory() . '/languages' );

		/**
		 * Set the content width based on the theme's design and stylesheet.
		 *
		 * @since v1.0
		 */
		global $content_width;
		if ( ! isset( $content_width ) ) {
			$content_width = 800;
		}

		// Theme Support.
		add_theme_support( 'title-tag' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
				'navigation-widgets',
			)
		);

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );
		// Add support for full and wide alignment.
		add_theme_support( 'align-wide' );
		// Add support for Editor Styles.
		add_theme_support( 'editor-styles' );
		// Enqueue Editor Styles.
		add_editor_style( 'style-editor.css' );

		// Default attachment display settings.
		update_option( 'image_default_align', 'none' );
		update_option( 'image_default_link_type', 'none' );
		update_option( 'image_default_size', 'large' );

		// Custom CSS styles of WorPress gallery.
		add_filter( 'use_default_gallery_style', '__return_false' );
	}
	add_action( 'after_setup_theme', 'sprivaten_theme_setup_theme' );

	// Disable Block Directory: https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/filters/editor-filters.md#block-directory
	remove_action( 'enqueue_block_editor_assets', 'wp_enqueue_editor_block_directory_assets' );
	remove_action( 'enqueue_block_editor_assets', 'gutenberg_enqueue_block_editor_assets_block_directory' );
}

if ( ! function_exists( 'wp_body_open' ) ) {
	/**
	 * Fire the wp_body_open action.
	 *
	 * Added for backwards compatibility to support pre 5.2.0 WordPress versions.
	 *
	 * @return void
	 * @since v2.2
	 *
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

/**
 * Init Widget areas in Sidebar.
 *
 * @return void
 * @since v1.0
 *
 */
function sprivaten_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => 'Widget Area 1',
			'id'            => 'widget_area_1',
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);

    register_sidebar(
        array(
            'name'          => 'Widget Area 2',
            'id'            => 'widget_area_2',
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '<h5 class="widget-title">',
            'after_title'   => '</h5>',
        )
    );

    register_sidebar(
        array(
            'name'          => 'Widget Area 3',
            'id'            => 'widget_area_3',
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '<h5 class="widget-title">',
            'after_title'   => '</h5>',
        )
    );

    register_sidebar(
        array(
            'name'          => 'Widget Area 4',
            'id'            => 'widget_area_4',
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '<h5 class="widget-title">',
            'after_title'   => '</h5>',
        )
    );
}
add_action( 'widgets_init', 'sprivaten_theme_widgets_init' );

if ( function_exists( 'register_nav_menus' ) ) {
	/**
	 * Nav menus.
	 *
	 * @return void
	 * @since v1.0
	 *
	 */
    register_nav_menus(
        array(
            'main-menu' => 'Main Navigation Menu'
        )
    );
}

/**
 * Loading All CSS Stylesheets and Javascript Files.
 *
 * @return void
 * @since v1.0
 *
 */
function sprivaten_theme_scripts_loader() {
	$theme_version = wp_get_theme()->get( 'Version' );

	// 1. Styles.
	wp_enqueue_style( 'style', get_theme_file_uri( 'style.css' ), [], $theme_version );
	wp_enqueue_style( 'main', get_theme_file_uri( 'assets/dist/main.css' ), [], $theme_version );

	// 2. Scripts.
    wp_enqueue_script( 'main-js', get_theme_file_uri( 'assets/dist/main.bundle.js' ), [], $theme_version, true );

    // Localize Javascript variables
    $ajax_nonce = wp_create_nonce('sprivaten_ajax_nonce');
    wp_localize_script( 'main-js', 'ajax', [ 'url' => admin_url( 'admin-ajax.php' ), 'nonce' => $ajax_nonce ] );
}
add_action( 'wp_enqueue_scripts', 'sprivaten_theme_scripts_loader' );

/**
 * Add theme settings page by ACF Pro
 */
if ( function_exists( 'acf_add_options_page' ) ) {

	acf_add_options_page( array(
		'page_title' => 'Theme Settings',
		'menu_title' => 'Theme Settings',
		'menu_slug'  => 'theme-settings',
		'capability' => 'edit_posts',
		'redirect'   => false
	) );
}

/**
 * Create "appointment" table when theme is activated
 * @return void
 */
function create_appointment_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'appointment';

    // Check if the table already exists
    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") !== $table_name) {

        // Define the SQL query for creating the custom table
        $sql = "CREATE TABLE $table_name (
            id INT NOT NULL AUTO_INCREMENT,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            department VARCHAR(255) NOT NULL,
            time VARCHAR(255) NOT NULL,
            message VARCHAR(500) NOT NULL,
            created_at DATETIME NOT NULL,
            PRIMARY KEY (id)
        )";

        // Include the upgrade.php file to use dbDelta function
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

        // Execute the SQL query
        dbDelta($sql);
    }
}
add_action('after_switch_theme', 'create_appointment_table', 20);
