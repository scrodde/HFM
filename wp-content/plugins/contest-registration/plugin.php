<?php
/*
Plugin Name: Contest Registration
Plugin URI: http://www.milkpluschocolate.com
Description: 
Author: Niklas Schröder / Milk & Chocolate
Version: 1.0
Author URI: http://wwww.milkpluschocolate.com
*/

/*
	KILPAILU ILMOITTAUTUMISET
*/
add_action( 'init', 'register_cpt_contest_registration' );

function register_cpt_contest_registration() {

    $labels = array( 
        'name' => _x( 'Kilpailukutsut', 'contest-regicontest-invitationstration' ),
        'singular_name' => _x( 'kilpailukutsu', 'contest-invitation' ),
        'add_new' => _x( 'Add New', 'contest-invitation' ),
        'add_new_item' => _x( 'Add New kilpailukutsu', 'contest-invitation' ),
        'edit_item' => _x( 'Edit kilpailukutsu', 'contest-invitation' ),
        'new_item' => _x( 'New kilpailukutsu', 'contest-invitation' ),
        'view_item' => _x( 'View kilpailukutsu', 'contest-invitation' ),
        'search_items' => _x( 'Search kilpailukutsu', 'contest-invitation' ),
        'not_found' => _x( 'No kilpailukutsu found', 'contest-invitation' ),
        'not_found_in_trash' => _x( 'No kilpailukutsu found in Trash', 'contest-invitation' ),
        'parent_item_colon' => _x( 'Parent kilpailukutsu', 'contest-invitation' ),
        'menu_name' => _x( 'Kilpailukutsut', 'contest-invitation' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        'description' => 'blaa blaa',
        'supports' => array( 'title', 'editor'),
        
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        
        
        'show_in_nav_menus' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'contest-invitation', $args );
}



function addContestMeta() {
    add_meta_box( 
        'contest-validity-id',
        __( 'Ilmoittautuminen', 'contest-invitation' ),
        'contestValidityMeta',
        'contest-invitation' 
    );
   
	add_meta_box(
		'contest-settings',
        __( 'Tiedot', 'contest-invitation' ),
		'contestInformationMeta',
		'contest-invitation'
	);

}
add_action( 'add_meta_boxes', 'addContestMeta' );

function contestInformationMeta($post) {
	
	$meta = get_post_custom($post->ID);
	
	include_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'contest-settings.php');
}

/* Prints the box content */
function contestValidityMeta( $post ) {

  // Use nonce for verification
 	wp_nonce_field( plugin_basename( __FILE__ ), 'contest-invitation-nonce' );

	$meta = get_post_custom($post->ID);
	$registrationStart = $meta['registration_start'][0];
	$registrationEnd = $meta['registration_end'][0];
	
	if($registrationStart == null) 
		$registrationStart = date('Y-m-d');
	if($registrationEnd == null)
		$registrationEnd= date('Y-m-d');
	
  // The actual fields for data entry
  	echo '<label for="registration_start">';
       	_e("Ilmoittautuminen alkaa", 'myplugin_textdomain' );
  	echo '</label> ';
  	echo '<input type="text" id="registration_start" name="registration_start" value="'.$registrationStart.'" size="25" class="datepicker"/><br />';
  // The actual fields for data entry
  	echo '<label for="registration_end">';
      	_e("Ilmoittautuminen päättyy", 'myplugin_textdomain' );
  	echo '</label> ';
  	echo '<input type="text" id="registration_end" name="registration_end" value="'.$registrationEnd.'" size="25" class="datepicker"/>';
}

/* When the post is saved, saves our custom data */
function saveContestMeta( $postId ) {
  // verify if this is an auto save routine. 
  // If it is our form has not been submitted, so we dont want to do anything
  	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      	return;

  // verify this came from the our screen and with proper authorization,
  // because save_post can be triggered at other times

  	if ( !wp_verify_nonce( $_POST['contest-invitation-nonce'], plugin_basename( __FILE__ ) ) )
      	return;
	  
  // Check permissions
  	if ( 'contest-invitation' == $_POST['post_type'] ) 
  	{
    	if ( !current_user_can( 'edit_page', $postId ) )
        	return;
  	}else{
    	if ( !current_user_can( 'edit_post', $postId ) )
        	return;
  	}
	
	
		
	update_post_meta($postId, 'registration_start', $_POST['registration_start']);
	update_post_meta($postId, 'registration_end', $_POST['registration_end']);
}

add_action( 'save_post', 'saveContestMeta' );

function addContestAdminScripts( $hook ) {

    global $post;

    if ( $hook == 'post-new.php' || $hook == 'post.php' ) {
        if ( 'contest-invitation' === $post->post_type ) {
	        wp_enqueue_script(  'jquery-ui-datepicker', plugin_dir_url(__FILE__).'js/jquery-ui-1.8.18.datepicker.min.js' );     
            wp_enqueue_script(  'contest-invitation-admin-js', plugin_dir_url(__FILE__).'js/admin.js' );
			echo "<link rel=\"stylesheet\" href=\"".plugin_dir_url(__FILE__)."css/ui-lightness/jquery-ui-1.8.18.datepicker.css\" type=\"text/css\" />\n";
        }
    }
}
add_action( 'admin_enqueue_scripts', 'addContestAdminScripts', 10, 1 );

function getContestDefaults($category) {
	if(strcmp($category, 'gender')) 
		return array('Miehet', 'Naiset');
	if(strcmp($category, 'genre')) 
		return array('Floretti', 'Kalpa', 'Säilä');
	if(strcmp($category, 'age')) 
		return null;
}




include_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'template-tags.php');
?>
