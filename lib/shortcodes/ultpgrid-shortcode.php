<?php 

	if ( ! defined( 'ABSPATH' ) )
		exit; # Exit if accessed directly

	# shortocde
	function ultpgrid_post_query( $atts, $content = null ) {

		$atts = shortcode_atts(
			array(
				'id' => "",
				), $atts);
		global $post, $paged, $query;
		if( isset($_POST['offset']) ) $offset = (int)$_POST['offset'];
		$postid = $atts['id'];

		$grid_meta_options = get_post_meta(  $postid, 'grid_meta_options', true );
		
		if( !empty($grid_meta_options['post_types']) ) {
			$post_types = $grid_meta_options['post_types'];
		}
		else
		{
			$post_types = array('post');
		}
		
		if( !empty($grid_meta_options['categories']) )
		{
			$categories = $grid_meta_options['categories'];
		}
		else
		{
			$categories = array();
		}

		$ultpgrid_order_cat           		= get_post_meta( $postid, 'ultpgrid_order_cat', true );
		$ultpgrid_theme_id            		= get_post_meta( $postid, 'ultpgrid_theme_id', true );
		$image_size          				= get_post_meta( $postid, 'image_size', true );
		$img_width           				= get_post_meta( $postid, 'img_width', true ); 
		$img_height          				= get_post_meta( $postid, 'img_height', true ); 	
		$ultpgrid_title            			= get_post_meta( $postid, 'ultpgrid_title', true );
		$ultpgrid_show_date        			= get_post_meta( $postid, 'ultpgrid_show_date', true );
		$excerpt_lenght      				= get_post_meta( $postid, 'excerpt_lenght', true );
		$btn_readmore 		 				= get_post_meta( $postid, 'btn_readmore', true );
		$nav_text_color     				= get_post_meta( $postid, 'nav_text_color', true );	
		$nav_bg_color       				= get_post_meta( $postid, 'nav_bg_color', true );
		$pagination_color   				= get_post_meta( $postid, 'pagination_color', true );
		$pagination_bg_color				= get_post_meta( $postid, 'pagination_bg_color', true );

		foreach( $categories as $category ) {
			$tax_cat = explode( ',',$category );
			$tax_terms[$tax_cat[0]][] = $tax_cat[1];
		}

		if( empty($tax_terms) ) {
			$tax_terms = array(); 
		}

		foreach( $tax_terms as $taxonomy=>$terms ) {
			$tax_query[] = array(
							'taxonomy' => $taxonomy,
							'field'    => 'term_id',
							'terms'    => $terms
							);
		}

		if( empty($tax_query) ) {
			$tax_query = array();
		}


		if ( get_query_var('paged') ) {
			$paged = get_query_var('paged');		
		} elseif ( get_query_var('page') ) {
			$paged = get_query_var('page');
		} else {
			$paged = 1;
		}

		$args = array (
			'post_type' 		=> $post_types,
			'post_status' 		=> 'publish',
			'tax_query' 		=> $tax_query,
			'posts_per_page' 	=> get_option( 'posts_per_page' ),
			'paged' 			=> (int)$paged,
			'offset'			=> '',
		);

	  	$query = new WP_Query( $args );

		switch ( $ultpgrid_theme_id ) {
		    case '1':
		        require_once( ULTPGRID_PLUGIN_DIR.'styles/style-1.php' );
		        break;
		    case '2':
		        require_once( ULTPGRID_PLUGIN_DIR.'styles/style-2.php' );
		        break;
		    case '3':
		        require_once( ULTPGRID_PLUGIN_DIR.'styles/style-3.php' );
		        break; 
		    case '4':
		        require_once( ULTPGRID_PLUGIN_DIR.'styles/style-4.php' );
		        break;    		           
		}

		return $content; 			
	}
	add_shortcode( 'grid_composer', 'ultpgrid_post_query' );