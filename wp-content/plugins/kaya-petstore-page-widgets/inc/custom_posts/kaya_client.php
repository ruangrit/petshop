<?php
if( !function_exists('kaya_client_register') ){
function kaya_client_register() {
	$labels = array(
		'name'				=> __('Client','petstore'),
		'singular_name'		=> __('Client','petstore'),
		'add_new'			=> __('Add New Client', 'petstore'),
		'add_new_item'		=> __('Add New Client','petstore'),
		'edit_item'			=> __('Edit Client','petstore'),
		'new_item'			=> __('New Client Item','petstore'),
		'view_item'			=> __('View Client Item','petstore'),
		'search_items'		=> __('Search Client','petstore'),
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
		'rewrite' => array( 'slug' => 'client', 'with_front' => false ),
		'query_var'			=> false,	
		'menu_icon'			=> 'dashicons-businessman',  		
		'supports'			=> array('title', '', '', 'thumbnail', '', '')
	); 
	register_post_type( 'client' , $args );
	//register_taxonomy_for_object_type('post_tag', 'client');
}
	register_taxonomy("client_category", 'client', array(
	'hierarchical'		=> true,
	'label'				=> 'Client Categories',
	'singular_label'	=> 'Client Categories',
	'show_ui'			=> true,
	'query_var'			=> true,
	'rewrite'			=> false,
	'orderby' => 'name',
	)
);
	
add_action('init', 'kaya_client_register');

function client_columns($columns) {
	$columns['client_category'] = __('Client Category','atp_admin');
    $columns['thumbnail'] =  __('Post Image','atp_admin');

    return $columns;
}

function kaya_manage_client_columns($name) {
    global $post;global $wp_query;
    switch ($name) {
	 case 'client_category':
               $terms = get_the_terms($post->ID, 'client_category');

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
add_action('manage_posts_custom_column', 'kaya_manage_client_columns', 10, 2);
add_filter('manage_edit-client_columns', 'client_columns');
// Change Default thumbnial Label Name
add_action('do_meta_boxes', 'client_featured_image_label');  
function client_featured_image_label()  
{  
	
    remove_meta_box( 'postimagediv', 'client', 'side' );  
    add_meta_box('postimagediv', __('Client Logo Image', 'petstore'), 'post_thumbnail_meta_box', 'client', 'side', 'low');  
}
// Title Place holder name Change
function client_slider_title( $title ){
	
	$screen = get_current_screen();
	//print_r($screen);
	if ( 'client' == $screen->post_type ){
	$title = __('Enter Client Name Here','petstore');
	}
	return $title;
	}
add_filter( 'enter_title_here', 'client_slider_title' );
}  
?>