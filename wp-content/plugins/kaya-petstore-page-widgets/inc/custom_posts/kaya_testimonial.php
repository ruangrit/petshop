<?php
if( !function_exists('kaya_testimonial_register') ){
function kaya_testimonial_register() {
	$labels = array(
		'name'				=> _x('Testimonial','Testimonial','Testimonial'),
		'singular_name'		=> _x('Testimonial','Testimonial', 'Testimonial'),
		'add_new'			=> _x('Add New Testimonial', 'Testimonial Listing','Testimonial'),
		'add_new_item'		=> __('Add New Testimonial','Testimonial'),
		'edit_item'			=> __('Edit Testimonial','Testimonial'),
		'new_item'			=> __('New Testimonial Item','Testimonial'),
		'view_item'			=> __('View Testimonial Item','Testimonial'),
		'search_items'		=> __('Search Testimonial','Testimonial'),
		'not_found'			=> __('Nothing found','Testimonial'),
		'not_found_in_trash'=> __('Nothing found in Trash','Testimonial'),
		'parent_item_colon'	=> ''
	);
 
	$args = array(
		'labels'			=> $labels,
		'public'			=> true,
		'exclude_from_search'=> false,
		'show_ui'			=> true,
		'capability_type'	=> 'post',
		'hierarchical'		=> false,
		'rewrite' => array( 'slug' => 'testimonial', 'with_front' => false ),
		'query_var'			=> false,	
		'menu_icon'			=> 'dashicons-id-alt',  		
		'supports'			=> array('title', '', '', 'thumbnail', '', '')
	); 
	register_post_type( 'testimonial' , $args );
	//register_taxonomy_for_object_type('post_tag', 'testimonial');
}
	register_taxonomy("testimonial_category", 'testimonial', array(
	'hierarchical'		=> true,
	'label'				=> 'Testimonial Categories',
	'singular_label'	=> 'Testimonial Categories',
	'show_ui'			=> true,
	'query_var'			=> true,
	'rewrite'			=> false,
	'orderby' => 'name',
	)
);
	
add_action('init', 'kaya_testimonial_register');

function testimonial_columns($columns) {
	$columns['testimonial_category'] = __('Testimonial Category','atp_admin');
    $columns['thumbnail'] =  __('Post Image','atp_admin');

    return $columns;
}

function kaya_manage_testimonial_columns($name) {
    global $post;global $wp_query;
    switch ($name) {
	 case 'testimonial_category':
               $terms = get_the_terms($post->ID, 'testimonial_category');

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
add_action('manage_posts_custom_column', 'kaya_manage_testimonial_columns', 10, 2);
add_filter('manage_edit-testimonial_columns', 'testimonial_columns');
// Change Default thumbnial Label Name
add_action('do_meta_boxes', 'testimonial_featured_image_label');  
function testimonial_featured_image_label()  
{  
    remove_meta_box( 'postimagediv', 'testimonial', 'side' );  
    add_meta_box('postimagediv', __('Testimonial Image', 'petstore'), 'post_thumbnail_meta_box', 'testimonial', 'side', 'low');  
}
// Title Place holder name Change
function testimonial_slider_title( $title ){
	$screen = get_current_screen();
	//print_r($screen);
	if ( 'testimonial' == $screen->post_type ){
	$title = __('Enter Testimonial Name Here','petstore');
	}
	return $title;
	}
add_filter( 'enter_title_here', 'testimonial_slider_title' );
}
?>