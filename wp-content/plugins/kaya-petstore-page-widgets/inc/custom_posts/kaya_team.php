<?php
if( !function_exists('kaya_team_register') ){
function kaya_team_register() {
	$labels = array(
		'name'				=> __('Team','petstore'),
		'singular_name'		=> __('Team','petstore'),
		'add_new'			=> __('Add New Team', 'petstore'),
		'add_new_item'		=> __('Add New Team','petstore'),
		'edit_item'			=> __('Edit Team','petstore'),
		'new_item'			=> __('New Team Item','petstore'),
		'view_item'			=> __('View Team Item','petstore'),
		'search_items'		=> __('Search Team','petstore'),
		'not_found'			=> __('Nothing found','petstore'),
		'not_found_in_trash'=> __('Nothing found in Trash','petstore'),
		'parent_item_colon'	=> ''
	);
 
	$args = array(
		'labels'			=> $labels,
		'public'			=> true,
		'exclude_from_search'=> false,
		'show_ui'			=> true,
		'capability_type'	=> 'post',
		'hierarchical'		=> false,
		'rewrite' => array( 'slug' => 'Team', 'with_front' => false ),
		'query_var'			=> false,	
		'menu_icon'			=> 'dashicons-groups',  		
		'supports'			=> array('title', '', '', 'thumbnail', '', '')
	); 
	register_post_type( 'team' , $args );
	//register_taxonomy_for_object_type('post_tag', 'team');
}
	register_taxonomy("team_category", 'team', array(
	'hierarchical'		=> true,
	'label'				=> 'Team Categories',
	'singular_label'	=> 'Team Categories',
	'show_ui'			=> true,
	'query_var'			=> true,
	'rewrite'			=> false,
	'orderby' => 'name',
	)
);
	
add_action('init', 'kaya_team_register');

function team_columns($columns) {
	
	$columns['team_category'] = __('Team Category','atp_admin');
    $columns['thumbnail'] =  __('Post Image','atp_admin');

    return $columns;
}

function kaya_manage_team_columns($name) {
    global $post;global $wp_query;
    switch ($name) {
	 case 'team_category':
               $terms = get_the_terms($post->ID, 'team_category');

        //If the terms array contains items... (dupe of core)
        if ( !empty($terms) ) {
            //Loop through terms
            foreach ( $terms as $term ){
                //Add tax name & link to an array
                $post_terms[] = esc_html(sanitize_term_field('name', $term->name, $term->term_id, '', 'edit'));
            }
            //Spit out the array as CSV
            echo implode( ', ', $post_terms );
        } else {
            //Text to show if no terms attached for post & tax
            echo '<em>No terms</em>';
        }
				break;
        case 'thumbnail':
          
				//echo the_post_thumbnail(array(100,100));
				break;
       
    }
}
add_action('manage_posts_custom_column', 'kaya_manage_team_columns', 10, 2);
add_filter('manage_edit-team_columns', 'team_columns');
// Change Default thumbnial Label Name
add_action('do_meta_boxes', 'team_featured_image_label');  
function team_featured_image_label()  
{  
    remove_meta_box( 'postimagediv', 'team', 'side' );  
    add_meta_box('postimagediv', __('Team Member Image', 'petstore'), 'post_thumbnail_meta_box', 'team', 'side', 'low');  
}
// Title Place holder name Change
function team_slider_title( $title ){
	$screen = get_current_screen();
	//print_r($screen);
	if ( 'team' == $screen->post_type ){
	$title = __('Enter Team Member Name Here','petstore');
	}
	return $title;
	}
add_filter( 'enter_title_here', 'team_slider_title' );
}
?>