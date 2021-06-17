<?php
//new code for custom post types
//This would ad books post type.
/*
add_action('init', function(){
	$label = 'Books';
	$type = 'book';
	register_post_type($type, ['public' =>true, 'label' => $label] );
});
*/

/**
 * The below code will add a Study custom post type.
 * 
 */


//Add theme support for featured image / thumbnails
add_theme_support('post-thumbnails');


//new code for custom post types
  add_action( 'init', function() {
    $type = 'study';
 
    // Call the function and save it to $labels
    $labels = xcompile_post_type_labels('Study', 'Studies');

	//Declares what the post type supports. This at the bottom of page edit section
	$supports = ['title','editor','revisions','page-attributes', 'thumbnail','comments','excerpt'];
 
    $arguments = [
	  'supports' => $supports,	
      'public' => true,
      'description' => 'Case studies for portfolio.',
	   'menu_icon' => 'dashicons-edit', // Set icon	
	   'menu_position' => 2,
      'labels' => $labels // Changed to labels
    ];
    register_post_type( $type, $arguments);
  });

//Label new post type
  function xcompile_post_type_labels($singular = 'Post', $plural = 'Posts') {
    $p_lower = strtolower($plural);
    $s_lower = strtolower($singular);
 
    return [
      'name' => $plural,
      'singular_name' => $singular,
      'add_new_item' => "New $singular",
      'edit_item' => "Edit $singular",
      'view_item' => "View $singular",
      'view_items' => "View $plural",
      'search_items' => "Search $plural",
      'not_found' => "No $p_lower found",
      'not_found_in_trash' => "No $p_lower found in trash",
      'parent_item_colon' => "Parent $singular",
      'all_items' => "All $plural",
      'archives' => "$singular Archives",
      'attributes' => "$singular Attributes",
      'insert_into_item' => "Insert into $s_lower",
      'uploaded_to_this_item' => "Uploaded to this $s_lower",
    ];
  }

?>
