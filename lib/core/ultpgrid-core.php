<?php

if( !defined( 'ABSPATH' ) ){
	exit;
}
/****************************
*
*	Ultimate Post Grid Core
*
*****************************/	

function ultpgrid_get_taxonomy_categories( $postid ) {
	
	if( current_user_can('manage_options') ) {

		if( isset($_POST['post_types']) ) {

			$post_types 		= stripslashes_deep( $_POST['post_types'] );
			$postid 			= sanitize_text_field( $_POST['postid'] );		
			$grid_meta_options 	= get_post_meta( $postid, 'grid_meta_options', true );
			
			if( !empty( $grid_meta_options['categories']) )
			{
				$categories = $grid_meta_options['categories'];
			}
			else
			{
				$categories = array();
			}
		}
		else
		{
			$grid_meta_options = get_post_meta( $postid, 'grid_meta_options', true );
			
			if(	!empty($grid_meta_options['post_types']) )
			{
				$post_types = $grid_meta_options['post_types'];
			}
			else
			{
				$post_types = array();
			}
			
			if( !empty($grid_meta_options['categories']) ){
				$categories = $grid_meta_options['categories'];
			}
			else
			{
				$categories = array();
			}
		}

		if( isset($_POST['postid']) )
		{
			$postid = sanitize_text_field( $_POST['postid'] );
		}
		
		$taxonomies = get_object_taxonomies( $post_types );
		
		if( !empty($taxonomies) )
		{
			echo '<select required style="min-width:162px !important"  class="timezone_string" name="grid_meta_options[categories][]" multiple="multiple" size="10">';

			foreach ( $taxonomies as $taxonomy ){
				
				$the_taxonomy = get_taxonomy( $taxonomy );				
				$args = array(
				  'orderby' 	=> 'name',
				  'order' 		=> 'ASC',
				  'taxonomy' 	=> $taxonomy,
				  'hide_empty'  => false,
				  );				
				$categories_all = get_categories( $args );
				
				if( !empty( $categories_all ) )
				{

					foreach( $categories_all as $category_info )
					{
						if( in_array($taxonomy.','.$category_info->cat_ID, $categories) ){
							$selected = 'selected';
						}
						else
						{
							$selected = '';
						}						
					?>
						<option <?php echo $selected; ?> value="<?php echo $taxonomy.','.$category_info->cat_ID; ?>" ><?php echo $category_info->cat_name; ?></option>

					<?php
					}
				}
			}
			echo '</select>';
		}
		else
		{
			esc_html_e('No categories found.', 'ultimate-post-grid');
		}
	}

	if( isset($_POST['post_types']) )
	{
		die();
	}
}	
add_action('wp_ajax_ultpgrid_get_taxonomy_categories', 'ultpgrid_get_taxonomy_categories');