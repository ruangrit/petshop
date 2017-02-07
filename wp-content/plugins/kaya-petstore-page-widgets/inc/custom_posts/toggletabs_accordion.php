<?php
if( !function_exists('kaya_toggletabs_register') ){
function kaya_toggletabs_register() {
	$labels = array(
		'name'				=> _x('Tab Items','Toggle Tabs','Toggle Tabs'),
		'singular_name'		=> _x('Toggle Tabs','Toggle Tabs', 'Toggle Tabs'),
		'add_new'			=> _x('Add New Tab Post', 'Toggle Tabs Listing','Toggle Tabs'),
		'add_new_item'		=> __('Add New Tabs ','Toggle Tabs'),
		'edit_item'			=> __('Edit Tabs','Toggle Tabs'),
		'new_item'			=> __('New Tabs','Testimonial'),
		'view_item'			=> __('View Tabs Item','Toggle Tabs'),
		'search_items'		=> __('Search Tabs',''),
		'not_found'			=> __('Nothing found','Tab Items'),
		'not_found_in_trash'=> __('Nothing found in Trash','Tab Items'),
		'parent_item_colon'	=> ''
	);
 
	$args = array(
		'labels'			=> $labels,
		'public'			=> true,
		'exclude_from_search'=> false,
		'show_ui'			=> true,
		'capability_type'	=> 'post',
		'hierarchical'		=> false,
		'rewrite' => array( 'slug' => 'tabs', 'with_front' => false ),
		'query_var'			=> false,	
		'menu_icon'			=> 'dashicons-archive',  		
		'supports'			=> array('title', 'editor', '', '', '', 'page-attributes')
	); 
	register_post_type( 'toogletabs' , $args );
	//register_taxonomy_for_object_type('post_tag', 'testimonial');
}
	register_taxonomy("toggletabs_category", 'toogletabs', array(
	'hierarchical'		=> true,
	'label'				=> 'Tabs Categories',
	'singular_label'	=> 'Toggle Tabs / Accordion Categories',
	'show_ui'			=> true,
	'query_var'			=> true,
	'rewrite'			=> false,
	'orderby' => 'name',
	)
);
	
add_action('init', 'kaya_toggletabs_register');

function toggletabs_columns($columns) {
	$columns['toggletabs_category'] = __('Toggle Tabs Category','atp_admin');
    $columns['thumbnail'] =  __('Post Image','atp_admin');

    return $columns;
}

function kaya_manage_toggletabs_columns($name) {
    global $post;global $wp_query;
    switch ($name) {
	 case 'toggletabs_category':
               $terms = get_the_terms($post->ID, 'toggletabs_category');

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
add_action('manage_posts_custom_column', 'kaya_manage_toggletabs_columns', 10, 2);
add_filter('manage_edit-toggletabs_columns', 'toggletabs_columns');
// Title Placeholder Name
function toogletabs_title( $title ){
	$screen = get_current_screen();
	//print_r($screen);
	if ( 'toogletabs' == $screen->post_type ){
	$title = __('Enter Toggle/Tabs Title Here','petstore');
	}
	return $title;
	}
add_filter( 'enter_title_here', 'toogletabs_title' );  
}
?>