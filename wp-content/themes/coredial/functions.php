<?php
/**
 * @package WordPress
 * @subpackage CoreDial Intranet
 */

	include_once('class.wp_bootstrap_navwalker.php');
	include_once('class.Google_Calendar_Widget.php');

	show_admin_bar(false);


	if ( function_exists('register_sidebar') ){
        register_sidebar(array(
	        'before_widget'                 => '<li id="%1$s" class="widget %2$s">',
            'after_widget'                  => '</li>',
            'before_title'                  => '<h2 class="widgettitle">',
	        'after_title'                   => '</h2>',
        ));
	}

	function register_my_menus() {
		register_nav_menus(
			array(
				'top-left-navigation'		=> __( 'Top Left Navigation Menu' ),
				'top-right-navigation'		=> __( 'Top Right Navigation Menu' ),
				'main-navigation'			=> __( 'Main Navigation Menu' ),
				'footer-row-1-navigation'	=> __( 'Footer Row 1 Navigation Menu' ),
				'footer-row-2-navigation'	=> __( 'Footer Row 2 Navigation Menu' ),
			)
		);
	}
	add_action( 'init', 'register_my_menus' );

	// register the meta box
	add_action( 'add_meta_boxes', 'calendar_field_checkboxes' );
	function calendar_field_checkboxes() {
	    add_meta_box(
	        'my_meta_box_id',          // this is HTML id of the box on edit screen
	        'My Plugin Checkboxes',    // title of the box
	        'calendar_box_content',   // function to be called to display the checkboxes, see the function below
	        'post',        // on which edit screen the box should appear
	        'side',      // part of page where the box should appear
	        'default'      // priority of the box
	    );
	}

	// display the metabox
	function calendar_box_content( $post ) {
	    // nonce field for security check, you can have the same
	    // nonce field for all your meta boxes of same plugin
	    wp_nonce_field( plugin_basename( __FILE__ ), 'calendar_nonce' );

		$calendar_link = get_post_meta( $post->ID, 'calendar_link', true );
		$calendar_add_link = get_post_meta( $post->ID, 'calendar_add_link', true );

	    echo '<label for="calendar_link">Calendar Link <input type="input" name="calendar_link" value="'.esc_attr($calendar_link).'" /></label><br />';
	    echo '<label for="calendar_add_link">Calendar Add Link <input type="input" name="calendar_add_link" value="'.esc_attr($calendar_add_link).'" /></label>';
	}

	// save data from checkboxes
	add_action('save_post', 'calendar_field_data');
	function calendar_field_data($post_id) {

	    // check if this isn't an auto save
	    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
	        return;
	    }

	    // security check
	    if ( !wp_verify_nonce( $_POST['calendar_nonce'], plugin_basename( __FILE__ ) ) ){
	        return;
	    }

	    // further checks if you like,
	    // for example particular user, role or maybe post type in case of custom post types

	    // now store data in custom fields based on checkboxes selected
	    if ( isset( $_POST['calendar_link'] ) ){
	        update_post_meta( $post_id, 'calendar_link', $_POST['calendar_link'] );
		}else{
	        update_post_meta( $post_id, 'calendar_link', '' );
		}

	    if ( isset( $_POST['calendar_add_link'] ) ){
	        update_post_meta( $post_id, 'calendar_add_link', $_POST['calendar_add_link'] );
		}else{
	        update_post_meta( $post_id, 'calendar_add_link', '' );
		}
	}

	function alternateu_register_widgets() {
		register_widget('Google_Calendar_Widget');
	}

	add_action('widgets_init', 'alternateu_register_widgets');
