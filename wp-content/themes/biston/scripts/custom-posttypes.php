<?
/** custom post types for Projects **/
/**to register post types */
add_action('init', 'projects_register');
 
function projects_register() {
 
	$labels = array(
		'name' => _x('Projects', 'post type general name'),
		'singular_name' => _x('Project', 'post type singular name'),
		'add_new' => _x('Add New', 'homebox'),
		'add_new_item' => __('Add New Project'),
		'edit_item' => __('Edit Project'),
		'new_item' => __('New Project'),
		'view_item' => __('View Project'),
		'search_items' => __('Search Project'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor')
	  ); 
 
	register_post_type( 'projects' , $args );
}

 
/*registering custom category box for this post type*/
register_taxonomy("project_category", 
				   array("projects"), 
				   array("hierarchical" => true, 
				   "label" => "Project Category", 
				   "singular_label" => "Project Category",
				   "add_new_item" => "New Category",
				   "rewrite" => true
				   
				   )
				   );
				   
/**displaying the fields in columns from the post types contents **/

add_action("manage_posts_custom_column",  "projects_custom_columns");
add_filter("manage_edit-projects_columns", "projects_edit_columns");
 
function projects_edit_columns($columns){
  $columns = array(
    "cb" => "<input type=\"checkbox\" />",
    "title" => "Project Name",
    "description" => "Project Description",
	"projectcat" => "Project Category"
  );
 
  return $columns;
}
function projects_custom_columns($column){
  global $post;
 
  switch ($column) {
    case "description":
      the_excerpt();
      break;
    case "projectcat":
      echo get_the_term_list($post->ID, 'project_category', '', ', ','');
      break;
  }
}




//Custom Post type for Clients

/**to register post types */
add_action('init', 'clients_register');
 
function clients_register() {
 
	$labels = array(
		'name' => _x('Clients', 'post type general name'),
		'singular_name' => _x('Client', 'post type singular name'),
		'add_new' => _x('Add New', 'slider'),
		'add_new_item' => __('Add New Client'),
		'edit_item' => __('Edit Client'),
		'new_item' => __('New Client'),
		'view_item' => __('View Client'),
		'search_items' => __('Search Client'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor', 'thumbnail')
	  ); 
 
	register_post_type( 'clients' , $args );
}

				   
/**displaying the fields in columns from the post types contents **/

add_action("manage_posts_custom_column",  "clients_custom_columns");
add_filter("manage_edit-clients_columns", "clients_edit_columns");
 
function clients_edit_columns($columns){
  $columns = array(
    "cb" => "<input type=\"checkbox\" />",
    "title" => "Client Name",
    "description" => "Description",
  );
 
  return $columns;
}
function clients_custom_columns($column){
  global $post;
 
  switch ($column) {
    case "description":
      the_excerpt();
      break;
  }
}
?>