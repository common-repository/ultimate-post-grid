<?php

	if( !defined( 'ABSPATH' ) ){
	    exit;
	}

	function ultpgrid_custom_post_type() {		

		# Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x( 'Ultimate Post Grid', 'Post Type General Name' ),
			'singular_name'       => _x( 'Ultimate Post Grid', 'Post Type Singular Name' ),
			'menu_name'           => __( 'Ultimate Post Grid' ),
			'parent_item_colon'   => __( 'Parent Post Grid' ),
			'all_items'           => __( 'All Post Grid' ),
			'view_item'           => __( 'View Post Grid' ),
			'add_new_item'        => __( 'Add New Post Grid' ),
			'add_new'             => __( 'Add Post Grid' ),
			'edit_item'           => __( 'Edit Post Grid' ),
			'update_item'         => __( 'Update Post Grid' ),
			'search_items'        => __( 'Search Post Grid' ),
			'not_found'           => __( 'Not Found' ),
			'not_found_in_trash'  => __( 'Not found in Trash' )
		);
		
		# Set other options for Custom Post Type...
		$args = array(
			'labels'              => $labels,
			'label'               => __( 'ultimate-post-grid' ),
			'description'         => __( 'Ultimate Post Grid news and reviews' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'supports'            => array( 'title' ),
			'menu_icon'		      => 'dashicons-media-spreadsheet'	
		);
		register_post_type( 'ultpgrid', $args );
		
	}
	add_action( 'init', 'ultpgrid_custom_post_type', 0 );

	function ultpgrid_add_shortcode_column( $columns ) {

		return array_merge( $columns, 
	  		array( 
	  			'shortcode' => __( 'Shortcode', 'ultpgrid' ),
	  			'doshortcode' => __( 'Template Shortcode', 'ultpgrid' ) )
	   		);
	}
	add_filter( 'manage_ultpgrid_posts_columns' , 'ultpgrid_add_shortcode_column' );


	function ultpgrid_add_posts_shortcode_display( $ultpgrid_column, $post_id ) {
		 if ( $ultpgrid_column == 'shortcode' ) {
		  ?>
		  <input style="background:#ddd;" type="text" onClick="this.select();" value="[grid_composer <?php echo 'id=&quot;'.$post_id.'&quot;';?>]" />
		  <?php
		}
	 	if ( $ultpgrid_column == 'doshortcode' ) {
	  	?>
	  	<textarea cols="40" rows="2" style="background:#ddd;" onClick="this.select();" ><?php echo '<?php echo do_shortcode("[grid_composer id='; echo "'".$post_id."']"; echo '"); ?>'; ?></textarea>
	  	<?php  
	  
	 	}
	}		
	add_action( 'manage_ultpgrid_posts_custom_column' , 'ultpgrid_add_posts_shortcode_display', 10, 2 );