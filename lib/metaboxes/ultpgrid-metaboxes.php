<?php

	if( !defined( 'ABSPATH' ) ){
	    exit;
	}

	function ultpgrid_register_meta_boxes() {

		$a = array( 'ultpgrid' );
	    add_meta_box( 
	        'custom_meta_box_id',                               # Metabox
	        __( 'Settings', 'ultimate-post-grid' ),           	# Title
	        'ultpgrid_display_inputs',                      # Call Back func
	       	$a,                                         		# post type
	        'normal'                                            # Text Content
	    );
	    add_meta_box( 
			'custom_meta_box_set',                              # Metabox
			__( 'Shortcode', 'ultimate-post-grid' ),           	# Title
			'ultpgrid_shortcodes_preview',                      # Call Back func
			$a,                                         		# post type
			'side'                                              # Text Content
    	);   

	}
	add_action('add_meta_boxes', 'ultpgrid_register_meta_boxes');

	# Call Back Function...
	function ultpgrid_display_inputs( $post, $args ) {

	#Call get post meta.
	$grid_meta_options		= get_post_meta( $post->ID, 'grid_meta_options', true );
	if( !empty($grid_meta_options['post_types']) ) 
	{
		$post_types = $grid_meta_options['post_types'];
	}
	else
	{
		$post_types = array();
	}

	if( !empty($grid_meta_options['categories']) )
	{
		$categories = $grid_meta_options['categories'];
	}
	else
	{
		$categories = array();
	}

	$ultpgrid_content_info         		= get_post_meta( $post->ID, 'ultpgrid_content_info', true );
	$ultpgrid_theme_id 			  		= get_post_meta( $post->ID, 'ultpgrid_theme_id', true );
	$ultpgrid_order_cat 			  	= get_post_meta( $post->ID, 'ultpgrid_order_cat', true );
	$img_show_hide						= get_post_meta( $post->ID, 'img_show_hide', true );
	$image_size 		  				= get_post_meta( $post->ID, 'image_size', true );
	//$img_width            			= get_post_meta( $post->ID, 'img_width', true );
	$img_height           				= get_post_meta( $post->ID, 'img_height', true );
	$ultpgrid_title 			  		= get_post_meta( $post->ID, 'ultpgrid_title', true );
	$ultpgrid_show_date 		  		= get_post_meta( $post->ID, 'ultpgrid_show_date', true );
	$excerpt_lenght 	  				= get_post_meta( $post->ID, 'excerpt_lenght', true );
	$btn_readmore         				= get_post_meta( $post->ID, 'btn_readmore', true );
	$font_size 			  				= get_post_meta( $post->ID, 'font_size', true );
	$heading_color_picker 				= get_post_meta( $post->ID, 'heading_color_picker', true );
	$content_color          			= get_post_meta( $post->ID, 'content_color', true ); 
	$date_textcolor_picker 				= get_post_meta( $post->ID, 'date_textcolor_picker', true );
	$img_color          				= get_post_meta( $post->ID, 'img_color', true );
	$opacity                			= get_post_meta( $post->ID, 'opacity', true );
	$excerpt_color          			= get_post_meta( $post->ID, 'excerpt_color', true );
	$grid_column          				= get_post_meta( $post->ID, 'grid_column', true );
	$pagination               			= get_post_meta( $post->ID, 'pagination', true );
	$pagination_style               	= get_post_meta( $post->ID, 'pagination_style', true );
	$go_back							= get_post_meta( $post->ID, 'go_back', true );
	$go_forward							= get_post_meta( $post->ID, 'go_forward', true );
	$pagination_text_color              = get_post_meta( $post->ID, 'pagination_text_color', true );
	$pagination_back_color				= get_post_meta( $post->ID, 'pagination_back_color', true );
	$paginate_hover_color				= get_post_meta( $post->ID, 'paginate_hover_color', true );
	//$div_height          				= get_post_meta( $post->ID, 'div_height', true );

	$ultpgrid_ccolor					= get_post_meta( $post->ID, 'ultpgrid_ccolor', true );
	$ultpgrid_cfontsize					= get_post_meta( $post->ID, 'ultpgrid_cfontsize', true );
	$ultpgrid_catcolor					= get_post_meta( $post->ID, 'ultpgrid_catcolor', true );
	$paginate_fontsize					= get_post_meta( $post->ID, 'paginate_fontsize', true );
	$pagination_hover_color				= get_post_meta( $post->ID, 'pagination_hover_color', true );
	$pagination_align					= get_post_meta( $post->ID, 'pagination_align', true );
	$content_fontsize					= get_post_meta( $post->ID, 'content_fontsize', true );
	$date_hcolor_picker					= get_post_meta( $post->ID, 'date_hcolor_picker', true );
	$excerpt_fontsize					= get_post_meta( $post->ID, 'excerpt_fontsize', true );
	$excerpt_hcolor						= get_post_meta( $post->ID, 'excerpt_hcolor', true );
	$isotop_align						= get_post_meta( $post->ID, 'isotop_align', true );
	$isotop_color                 		= get_post_meta( $post->ID, 'isotop_color', true );
	$isotop_activecolor                 = get_post_meta( $post->ID, 'isotop_activecolor', true );
	$isotop_hovercolor            		= get_post_meta( $post->ID, 'isotop_hovercolor', true );	
?>
<div class="wrap">
	<table class="form-table">

		<tr valign="top">
			<th scope="row">
				<label for="post-type"><?php esc_html_e('Post Type', 'ultimate-post-grid'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<select required name="grid_meta_options[post_types][]" id="grid_meta_options" class="timezone_string changer">
					<option value=""><?php esc_html_e('Select', 'ultimate-post-grid'); ?></option>	
					<?php 
						foreach ( get_post_types( '', 'names' ) as $post_type ) {
							global $wp_post_types;
							
							if( in_array($post_type,$post_types) ) {
								$selected = "selected";
							} else {
								$selected = '';
							}						  
					?>
					<option value="<?php echo $post_type; ?>" <?php echo esc_attr($selected); ?>><?php echo esc_html__($post_type, 'ultimate-post-grid'); ?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<!-- End Post Type -->

		<tr valign="top">
			<th scope="row">
				<label for="ultpgrid_name"><?php esc_html_e('Categories', 'ultimate-post-grid'); ?></label>
			</th>
			<td style="vertical-align: middle;" id="get_cate_area">		
	            <?php
					echo ultpgrid_get_taxonomy_categories( get_the_ID() );
				?> 
			</td>
		</tr>
		<!-- End Categories -->	

		<tr valign="top">
			<th scope="row">
				<label for="ultpgrid_content_info"><?php esc_html_e('Hide Content Info', 'ultimate-post-grid'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<input type="checkbox" name="ultpgrid_content_info" id="ultpgrid_content_info" value="1" class="timezone_string" 
				<?php  checked( $ultpgrid_content_info, 0, true );	?>
				> <?php esc_html_e('Hide Category', 'ultimate-post-grid'); ?>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row">
				<label for="ultpgrid_ccolor"><?php esc_html_e('Category Color', 'ultimate-post-grid'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<input type="text" name="ultpgrid_ccolor" value="<?php if( $ultpgrid_ccolor !='' ) { echo esc_attr($ultpgrid_ccolor); } else { echo "#345332"; } ?>" class="jscolor" readonly>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row">
				<label for="ultpgrid_catcolor"><?php esc_html_e('Category Hover Color', 'ultimate-post-grid'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<input type="text" name="ultpgrid_catcolor" value="<?php if( $ultpgrid_catcolor !='' ) { echo esc_attr($ultpgrid_catcolor); } else { echo "#345666"; } ?>" class="jscolor" readonly>	
			</td>
		</tr>		
		<tr valign="top">
			<th scope="row">
				<label for="ultpgrid_cfontsize"><?php esc_html_e('Category Font Size', 'ultimate-post-grid'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="ultpgrid_cfontsize" id="ultpgrid_cfontsize">
					<?php for( $i=12; $i<=72; $i++ ) { ?>
					<option value="<?php echo $i; ?>" <?php if ( isset ( $ultpgrid_cfontsize ) ) selected( esc_attr($ultpgrid_cfontsize), $i ); ?>><?php echo $i."px";?></option>
					<?php } ?>
				</select>	
			</td>
		</tr>				
		<!-- Hide Content Info -->	

		<tr valign="top">
			<th scope="row">
				<label for="ultpgrid_theme_id"><?php esc_html_e('Styles', 'ultimate-post-grid'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="ultpgrid_theme_id" id="ultpgrid_theme_id" class="timezone_string">
					<option value="1" <?php if ( isset ( $ultpgrid_theme_id ) ) selected( esc_attr($ultpgrid_theme_id), '1' ); ?>><?php esc_html_e('Style 1', 'ultimate-post-grid'); ?></option>
					<option value="2" <?php if ( isset ( $ultpgrid_theme_id ) ) selected( esc_attr($ultpgrid_theme_id), '2' ); ?>><?php esc_html_e('Style 2', 'ultimate-post-grid'); ?></option>
					<option value="3" <?php if ( isset ( $ultpgrid_theme_id ) ) selected( esc_attr($ultpgrid_theme_id), '3' ); ?>><?php esc_html_e('Style 3', 'ultimate-post-grid'); ?></option>
					<option value="4" <?php if ( isset ( $ultpgrid_theme_id ) ) selected( esc_attr($ultpgrid_theme_id), '4' ); ?>><?php esc_html_e('Isotop Style', 'ultimate-post-grid'); ?></option>					
				</select>
			</td>
		</tr>

		<tr valign="top" id="isotop_align_area">
			<th scope="row">
				<label for="isotop_align"><?php esc_html_e('Isotop Align', 'ultimate-post-grid'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="isotop_align" id="isotop_align" class="timezone_string">
					<option value="left" <?php if ( isset ( $isotop_align ) ) selected( esc_attr($isotop_align), 'left' ); ?>><?php esc_html_e('Left', 'ultimate-post-grid'); ?></option>
					<option value="center" <?php if ( isset ( $isotop_align ) ) selected( esc_attr($isotop_align), 'center' ); ?>><?php esc_html_e('Center', 'ultimate-post-grid'); ?></option>
					<option value="right" <?php if ( isset ( $isotop_align ) ) selected( esc_attr($isotop_align), 'right' ); ?>><?php esc_html_e('Right', 'ultimate-post-grid'); ?></option>				
				</select>
			</td>
		</tr>
		<tr valign="top" id="isotop_color_area">
			<th scope="row">
				<label for="isotop_color"><?php esc_html_e('Isotop Text Color', 'ultimate-post-grid'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<input name="isotop_color" value="<?php if( $isotop_color !='') { echo esc_attr($isotop_color); } else { echo "#454545"; } ?>" class="jscolor" readonly>				
			</td>
		</tr>
		<tr valign="top" id="isotop_activecolor_area">
			<th scope="row">
				<label for="isotop_activecolor"><?php esc_html_e('Isotop Active Color', 'ultimate-post-grid'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<input name="isotop_activecolor" value="<?php if( $isotop_activecolor !='') { echo esc_attr($isotop_activecolor); } else { echo "#549DC5"; } ?>" class="jscolor" readonly>				
			</td>
		</tr>
		<tr valign="top" id="isotop_hovercolor_area">
			<th scope="row">
				<label for="isotop_hovercolor"><?php esc_html_e('Isotop Hover Color', 'ultimate-post-grid'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<input name="isotop_hovercolor" value="<?php if( $isotop_hovercolor !='') { echo esc_attr($isotop_hovercolor); } else { echo "#65CCEF"; } ?>" class="jscolor" readonly>			
			</td>
		</tr>										
		<!-- End Styles -->

		<tr valign="top">
			<th scope="row">
				<label for="grid_column"><?php esc_html_e('Column', 'ultimate-post-grid'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="grid_column" id="grid_column" class="timezone_string">
					<option value="3" <?php if ( isset ( $grid_column ) ) selected( esc_attr($grid_column), '3' ); ?>><?php esc_html_e('3', 'ultimate-post-grid'); ?></option>				
					<option value="4" <?php if ( isset ( $grid_column ) ) selected( esc_attr($grid_column), '4' ); ?>><?php esc_html_e('4', 'ultimate-post-grid'); ?></option>
					<option value="2" <?php if ( isset ( $grid_column ) ) selected( esc_attr($grid_column), '2' ); ?>><?php esc_html_e('2', 'ultimate-post-grid'); ?></option>			
					<option value="1" <?php if ( isset ( $grid_column ) ) selected( esc_attr($grid_column), '1' ); ?>><?php esc_html_e('1', 'ultimate-post-grid'); ?></option>
				</select>
			</td>
		</tr>
		<!-- End Column -->

		<tr valign="top" id="pagination_area">
			<th scope="row">
				<label for="pagination" ><?php esc_html_e('Pagination ', 'ultimate-post-grid'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="pagination" id="pagination" class="timezone_string">
					<option value="true" <?php if ( isset ( $pagination ) ) selected( esc_attr($pagination), 'true' ); ?>><?php esc_html_e('True', 'ultimate-post-grid'); ?></option>
					<option value="false" <?php if ( isset ( $pagination ) ) selected( esc_attr($pagination), 'false' ); ?>><?php esc_html_e('False', 'ultimate-post-grid'); ?></option>					
				</select>
			</td>
		</tr>
		<!-- End Pagination-->	

		<tr valign="top" id="p_style_area" >
			<th scope="row">
				<label for="pagination_style"><?php esc_html_e('Pagination Style', 'ultimate-post-grid'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="pagination_style" id="pagination_style" class="timezone_string">
					<option value="number" <?php if ( isset ( $pagination_style ) ) selected( esc_attr($pagination_style), 'number' ); ?>><?php esc_html_e('Number', 'ultimate-post-grid'); ?></option>										
				</select>
			</td>
		</tr>
		<!-- End Pagination-->

		<tr valign="top" id="paginate_area">
			<th scope="row">
				<label for="pagi_label"><?php esc_html_e('Pagination Text', 'ultimate-post-grid'); ?></label>
			</th>
			<td style="vertical-align: middle;" id="back_forward">
				<input type="go_back" name="go_back" id="go_back" size='7' maxlength="30" class="timezone_string" value="<?php echo esc_attr($go_back); ?>" placeholder="Previous">
				&nbsp;
				<input type="go_forward" name="go_forward" id="go_forward" size='7' maxlength="30" class="timezone_string" value="<?php echo esc_attr($go_forward); ?>" placeholder="Next">
			</td>		
		</tr>	

		<tr valign="top" id="paginate_font_area">
			<th scope="row">
				<label for="pagi_label"><?php esc_html_e('Pagination Font Size', 'ultimate-post-grid'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="paginate_fontsize" id="paginate_fontsize">
					<?php for( $i=12; $i<=72; $i++ ) { ?>
					<option value="<?php echo $i; ?>" <?php if ( isset ( $paginate_fontsize ) ) selected( esc_attr($paginate_fontsize), $i ); ?>><?php echo $i."px";?></option>
					<?php } ?>
				</select>	
			</td>		
		</tr>					
		<!-- End Pagination Next -->

		<tr valign="top" id="paginate_color">
			<th scope="row">
				<label for="pagination_text_color"><?php esc_html_e('Pagination Text Color', 'ultimate-post-grid'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<input name="pagination_text_color" value="<?php if( $pagination_text_color !='') { echo esc_attr($pagination_text_color); } else { echo "#345673"; } ?>" class="jscolor" readonly>
			</td>
		</tr>

		<tr valign="top" id="paginate_hcolor">
			<th scope="row">
				<label for="pagination_hover_color"><?php esc_html_e('Pagination Text Hover Color', 'ultimate-post-grid'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<input name="pagination_hover_color" value="<?php if( $pagination_hover_color !='') { echo esc_attr($pagination_hover_color); } else { echo "#345000"; } ?>" class="jscolor" readonly>
			</td>
		</tr>
		<!-- End Pagination Text Color -->	

		<tr valign="top" id="paginate_align_area">
			<th scope="row">
				<label for="pagination_align"><?php esc_html_e('Pagination Align', 'ultimate-post-grid'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="pagination_align" class="timezone_string">
					<option value="left" <?php if ( isset ( $pagination_align ) ) selected( esc_attr($pagination_align), 'left' ); ?>><?php esc_html_e('Left', 'ultimate-post-grid'); ?></option>
					<option value="center" <?php if ( isset ( $pagination_align ) ) selected( esc_attr($pagination_align), 'center' ); ?>><?php esc_html_e('Center', 'ultimate-post-grid'); ?></option>
					<option value="right" <?php if ( isset ( $pagination_align ) ) selected( esc_attr($pagination_align), 'right' ); ?>><?php esc_html_e('Right', 'ultimate-post-grid'); ?></option>					
				</select>
			</td>
		</tr>				

		<tr valign="top" id="paginate_barfea">
			<th scope="row">
				<label for="pagination_back_color"><?php esc_html_e('Pagination Back Color', 'ultimate-post-grid'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<input name="pagination_back_color" value="<?php if( $pagination_back_color !='') { echo esc_attr($pagination_back_color); } else { echo "#349587"; } ?>" class="jscolor" readonly>
			</td>
		</tr>				
		<!-- End Pagination Back Color -->	

		<tr valign="top" id="paginate_hcolor">
			<th scope="row">
				<label for="paginate_hover_color"><?php esc_html_e('Pagination Hover Color', 'ultimate-post-grid'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<input name="paginate_hover_color" value="<?php if( $paginate_hover_color !='') { echo esc_attr($paginate_hover_color); } else { echo "#349587"; } ?>" class="jscolor" readonly>
			</td>
		</tr>
		<!-- End Pagination Hover Color -->

		<tr valign="top" id="paginate_bcolor">
			<th scope="row">
				<label for="paginate_bcolor"><?php esc_html_e('Pagination Border Color', 'ultimate-post-grid'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<input name="paginate_bcolor" value="<?php if( $paginate_bcolor !='') { echo esc_attr($paginate_bcolor); } else { echo "#349345"; } ?>" class="jscolor" readonly>
			</td>
		</tr>						
		<!-- End Pagination Border Color -->							

		<tr valign="top">
			<th scope="row">
				<label for="ultpgrid_order_cat"><?php esc_html_e('Order By', 'ultimate-post-grid'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="ultpgrid_order_cat" id="ultpgrid_order_cat" class="timezone_string">
					<option value="author" <?php if ( isset ( $ultpgrid_order_cat ) ) selected( esc_attr($ultpgrid_order_cat), 'author' ); ?>><?php esc_html_e('Author', 'ultimate-post-grid'); ?></option>
					<option value="post_date" <?php if ( isset ( $ultpgrid_order_cat ) ) selected( esc_attr($ultpgrid_order_cat), 'post_date' ); ?>><?php esc_html_e('date', 'ultimate-post-grid'); ?></option>
					<option value="title" <?php if ( isset ( $ultpgrid_order_cat ) ) selected( esc_attr($ultpgrid_order_cat), 'title' ); ?>><?php esc_html_e('Title', 'ultimate-post-grid'); ?></option>
					<option value="modified" <?php if ( isset ( $ultpgrid_order_cat ) ) selected( esc_attr($ultpgrid_order_cat), 'modified' ); ?>><?php esc_html_e('Modified', 'ultimate-post-grid'); ?></option>
					<option value="rand" <?php if ( isset ( $ultpgrid_order_cat ) ) selected( esc_attr($ultpgrid_order_cat), 'rand' ); ?>><?php esc_html_e('Rand', 'ultimate-post-grid'); ?></option>
					<option value="comment_count" <?php if ( isset ( $ultpgrid_order_cat ) ) selected( esc_attr($ultpgrid_order_cat), 'comment_count' ); ?>><?php esc_html_e('Popularity', 'ultimate-post-grid'); ?></option>
				</select>
			</td>
		</tr>
		<!-- End Order By -->

		<tr valign="top">
			<th scope="row">
				<label for="img_show_hide"><?php esc_html_e('Image', 'ultimate-post-grid'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="img_show_hide" id="img_show_hide" class="timezone_string">
					<option value="1" <?php if ( isset ( $img_show_hide ) ) selected( esc_attr($img_show_hide), '1' ); ?>><?php esc_html_e('Show', 'ultimate-post-grid'); ?></option>
					<option value="2" <?php if ( isset ( $img_show_hide ) ) selected( esc_attr($img_show_hide), '2' ); ?>><?php esc_html_e('Hide', 'ultimate-post-grid'); ?></option>
				</select>
			</td>
		</tr>

		<tr valign="top" id="img_controller" style="<?php if( $img_show_hide == 2 ) { echo "display:none;"; } ?>">
			<th scope="row">
				<label for="image_size"><?php esc_html_e('Image Size', 'ultimate-post-grid'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="image_size" id="image_size" class="timezone_string">
					<option value="full" <?php if ( isset ( $image_size ) ) selected( esc_attr($image_size), 'full' ); ?>><?php esc_html_e('Full', 'ultimate-post-grid'); ?></option>	
					<option value="medium" <?php if ( isset ( $image_size ) ) selected( esc_attr($image_size), 'medium' ); ?>><?php esc_html_e('Medium', 'ultimate-post-grid'); ?></option>	
					<option value="large" <?php if ( isset ( $image_size ) ) selected( esc_attr($image_size), 'large' ); ?>><?php esc_html_e('Large', 'ultimate-post-grid'); ?></option>												
					<option value="thumbnail" <?php if ( isset ( $image_size ) ) selected( esc_attr($image_size), 'thumbnail' ); ?>><?php esc_html_e('Thumbnail', 'ultimate-post-grid'); ?></option>
					<option value="custom" <?php if ( isset ( $image_size ) ) selected( esc_attr($image_size), 'custom' ); ?>><?php esc_html_e('Custom', 'ultimate-post-grid'); ?></option>
				</select>
			</td>
		</tr>

		<tr valign="top" class="custom_details">
			<th scope="row">
				<label for="img_size"><?php esc_html_e('Height (px)', 'ultimate-post-grid'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<!-- <input type="number" name="img_width" id="img_width" size='7' maxlength="4" class="timezone_string" value="<?php //echo $img_width; ?>" > <?php //esc_html_e('px', 'ultimate-post-grid'); ?> -->
				&nbsp;
				<input type="number" name="img_height" id="img_height" size='7' maxlength="4" class="timezone_string" value="<?php echo esc_attr($img_height); ?>" ><?php esc_html_e('px', 'ultimate-post-grid'); ?>
			</td>
		</tr>		
		<!-- End Image Size -->	

		<tr valign="top">
			<th scope="row">
				<label for="ultpgrid_title"><?php esc_html_e('Hide Title', 'ultimate-post-grid'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<input type="checkbox" name="ultpgrid_title" id="ultpgrid_title" value="1" class="timezone_string" 
				<?php  checked( $ultpgrid_title, 0, true );	?> 
				> <?php esc_html_e('Hide Title', 'ultimate-post-grid'); ?>
			</td>
		</tr>
		<!-- End Hide Title -->	

		<tr valign="top">
			<th scope="row">
				<label for="font_size"><?php esc_html_e('Title Font Size', 'ultimate-post-grid'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="font_size" id="font_size">
					<?php for( $i=12; $i<=72; $i++ ) { ?>
					<option value="<?php echo (int)$i; ?>" <?php if ( isset ( $font_size ) ) selected( esc_attr($font_size), $i ); ?>><?php echo $i."px";?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<!-- End Title Font Size-->

		<tr valign="top">
			<th scope="row">
				<label for="heading_color_picker"><?php esc_html_e('Title Font Color', 'ultimate-post-grid'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<input name="heading_color_picker" value="<?php if( $heading_color_picker !='') { echo esc_attr($heading_color_picker); } else { echo "#7A4B94"; } ?>" class="jscolor" readonly>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row">
				<label for="heading_hcolor"><?php esc_html_e('Title Hover Color', 'ultimate-post-grid'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<input name="heading_hcolor" value="<?php if( $heading_hcolor !='') { echo esc_attr($heading_hcolor) ;} else { echo "#7A4432"; } ?>" class="jscolor" readonly>
			</td>
		</tr>

		<!-- End Title Font Color -->

		<tr valign="top">
			<th scope="row">
				<label for="content_color"><?php esc_html_e('Content Color', 'ultimate-post-grid'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<input name="content_color" value="<?php if( $content_color !='') { echo esc_attr($content_color); } else { echo "#666666"; } ?>" class="jscolor" readonly>
			</td>
		</tr>

		<tr valign="top">
			<th scope="row">
				<label for="content_fontsize"><?php esc_html_e('Content Font Size', 'ultimate-post-grid'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="content_fontsize" id="content_fontsize">
					<?php for( $i=12; $i<=72; $i++ ) {?>
					<option value="<?php echo (int)$i; ?>" <?php if ( isset ( $content_fontsize ) ) selected( esc_attr($content_fontsize), $i ); ?>><?php echo $i."px";?></option>
					<?php } ?>
				</select>
			</td>
		</tr>		
		<!-- End Content Color -->

		<tr valign="top" id="date_div">
			<th scope="row">
				<label for="ultpgrid_show_date"><?php esc_html_e('Show Date', 'ultimate-post-grid'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<input type="checkbox" name="ultpgrid_show_date" id="ultpgrid_show_date" value="1" class="timezone_string" <?php checked( esc_attr($ultpgrid_show_date), 0, true ); ?>> <?php esc_html_e('Hide Date', 'ultimate-post-grid'); ?>
			</td>
		</tr>
		<!-- End Show Date -->

		<tr valign="top" id="date_fontsize_area">
			<th scope="row">
				<label for="date_fontsize"><?php esc_html_e('Date Font Size', 'ultimate-post-grid'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="date_fontsize" id="date_fontsize">
					<?php for( $i=12; $i<=72; $i++ ) {?>
					<option value="<?php echo (int)$i; ?>" <?php if ( isset ( $date_fontsize ) ) selected( esc_attr($date_fontsize), $i ); ?>><?php echo $i."px";?></option>
					<?php } ?>
				</select>
			</td>
		</tr>		

		<tr valign="top" id="date_color">
			<th scope="row">
				<label for="date_textcolor_picker"><?php esc_html_e('Date Color', 'ultimate-post-grid'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<input name="date_textcolor_picker" value="<?php if( $date_textcolor_picker !='') { echo esc_attr($date_textcolor_picker); } else { echo "#7A4B94"; } ?>" class="jscolor" readonly>
			</td>
		</tr>

		<tr valign="top" id="date_hcolor">
			<th scope="row">
				<label for="date_hcolor_picker"><?php esc_html_e('Date Hover Color', 'ultimate-post-grid'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<input name="date_hcolor_picker" value="<?php if( $date_hcolor_picker !='' ) { echo esc_attr($date_hcolor_picker); } else { echo "#7A4B65"; } ?>" class="jscolor" readonly>
			</td>
		</tr>
		<!-- End Date Text Color -->

		<tr valign="top" class="excerpt_details">
			<th scope="row">
				<label for="excerpt_lenght"><?php esc_html_e('Excerpt Length in Words', 'ultimate-post-grid'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<input type="number" name="excerpt_lenght"  id="excerpt_lenght" maxlength="3" class="timezone_string" value="<?php echo esc_attr($excerpt_lenght); ?>" placeholder="Excerpt Length">
				<input type="text" name="btn_readmore" id="btn_readmore" maxlength="20" class="timezone_string" value="<?php echo esc_attr($btn_readmore); ?>"  placeholder="Excerpt Word">
			</td>
		</tr>	
		<!-- End Excerpt Length -->


		<tr valign="top" id="excerpt_fontsize_area">
			<th scope="row">
				<label for="excerpt_fontsize"><?php esc_html_e('Excerpt Font Size', 'ultimate-post-grid'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="excerpt_fontsize" id="excerpt_fontsize">
					<?php for( $i=12; $i<=72; $i++ ) {?>
					<option value="<?php echo (int)$i; ?>" <?php if ( isset ( $excerpt_fontsize ) ) selected( esc_attr($excerpt_fontsize), $i ); ?>><?php echo $i."px";?></option>
					<?php } ?>
				</select>			
			</td>
		</tr> 

		<tr valign="top" id="excerpt_color_area">
			<th scope="row">
				<label for="excerpt_color"><?php esc_html_e('Excerpt Color', 'ultimate-post-grid'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<input name="excerpt_color" value="<?php if( $excerpt_color !='') { echo esc_attr($excerpt_color); } else { echo "#DBEAF7"; } ?>" class="jscolor" readonly>
			</td>
		</tr> 

		<tr valign="top" id="excerpt_hcolor_area">
			<th scope="row">
				<label for="excerpt_hcolor"><?php esc_html_e('Excerpt Hover Color', 'ultimate-post-grid'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<input name="excerpt_hcolor" value="<?php if( $excerpt_hcolor !='' ) { echo esc_attr($excerpt_hcolor); } else { echo "#DBEaaa"; } ?>" class="jscolor" readonly>
			</td>
		</tr>

		<!-- End Excerpt Color -->

		<tr valign="top" id="opacity_area">
			<th scope="row">
				<label for="img_color"><?php esc_html_e('Image Opacity', 'ultimate-post-grid'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<input name="img_color" value="<?php if( $img_color !='' ) { echo esc_attr($img_color); } else { echo "#DC005A"; } ?>" class="jscolor" readonly>
				<select name="opacity" id="opacity" class="timezone_string">
					<option value="0.1" <?php if ( isset ( $opacity ) ) selected( $opacity, '0.1' ); ?>><?php esc_html_e('0.1', 'ultimate-post-grid'); ?></option>
					<option value="0.2" <?php if ( isset ( $opacity ) ) selected( $opacity, '0.2' ); ?>><?php esc_html_e('0.2', 'ultimate-post-grid'); ?></option>
					<option value="0.3" <?php if ( isset ( $opacity ) ) selected( $opacity, '0.3' ); ?>><?php esc_html_e('0.3', 'ultimate-post-grid'); ?></option>
					<option value="0.4" <?php if ( isset ( $opacity ) ) selected( $opacity, '0.4' ); ?>><?php esc_html_e('0.4', 'ultimate-post-grid'); ?></option>
					<option value="0.5" <?php if ( isset ( $opacity ) ) selected( $opacity, '0.5' ); ?>><?php esc_html_e('0.5', 'ultimate-post-grid'); ?></option>
					<option value="0.6" <?php if ( isset ( $opacity ) ) selected( $opacity, '0.6' ); ?>><?php esc_html_e('0.6', 'ultimate-post-grid'); ?></option>
					<option value="0.7" <?php if ( isset ( $opacity ) ) selected( $opacity, '0.7' ); ?>><?php esc_html_e('0.7', 'ultimate-post-grid'); ?></option>
					<option value="0.8" <?php if ( isset ( $opacity ) ) selected( $opacity, '0.8' ); ?>><?php esc_html_e('0.8', 'ultimate-post-grid'); ?></option>
					<option value="0.9" <?php if ( isset ( $opacity ) ) selected( $opacity, '0.9' ); ?>><?php esc_html_e('0.9', 'ultimate-post-grid'); ?></option>
					<option value="1"   <?php if ( isset ( $opacity ) ) selected( $opacity, '1' ); ?>><?php esc_html_e('1', 'ultimate-post-grid'); ?></option>		
				</select>				
			</td>
		</tr> 
		<!-- End Image Opacity -->	

<!-- 	<tr valign="top">
			<th scope="row">
				<label for="div_height"><?php //esc_html_e('Div Height', 'ultimate-post-grid'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<input name="div_height" value="<?php //echo $div_height; ?>"> px
			</td>
		</tr>  -->
		<!-- End Div Height -->															
	</table>
</div>
<?php } //

	function ultpgrid_shortcodes_preview() {
		$post_id = get_the_ID();
?>
<div class="wrap">
	<table class="form-table">
		<tr valign="top">
		<td>
	  		<input style="background:#65CCEF;width:100%" type="text" onClick="this.select();" value="[grid_composer <?php echo 'id=&quot;'.$post_id.'&quot;';?>]" />			
		</td>
		
		</tr>
		<tr valign="top">
		<td>
  			<textarea cols="40" rows="2" style="background:#65CCEF;width:100%" onClick="this.select();" ><?php echo '<?php echo do_shortcode("[grid_composer id='; echo "'".$post_id."']"; echo '"); ?>'; ?></textarea>			
		</td>
		</tr>
	</table>
</div>					
<?php
	}

# Data save in custom metabox field
function ultpgrid_save_func( $post_id ){

	# Doing autosave then return.
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;

	#Value check and saves if needed
	if( isset($_POST['isotop_hovercolor']) ) {
	    update_post_meta( $post_id, 'isotop_hovercolor', sanitize_hex_color($_POST['isotop_hovercolor']) );
	}

	#Value check and saves if needed
	if( isset($_POST['isotop_activecolor']) ) {
	    update_post_meta( $post_id, 'isotop_activecolor', sanitize_hex_color($_POST['isotop_activecolor']) );
	}

	#Value check and saves if needed
	if( isset($_POST['isotop_color']) ) {
	    update_post_meta( $post_id, 'isotop_color', sanitize_hex_color($_POST['isotop_color']) );
	}

	#Value check and saves if needed
	if( isset($_POST['isotop_align']) ) {
	    update_post_meta( $post_id, 'isotop_align', sanitize_text_field($_POST['isotop_align']) );
	}

	#Value check and saves if needed
	if( isset($_POST['ultpgrid_cfontsize']) ) {
	    update_post_meta( $post_id, 'ultpgrid_cfontsize', sanitize_text_field($_POST['ultpgrid_cfontsize']) );
	}

	#Value check and saves if needed
	if( isset($_POST['paginate_bcolor']) ) {
	    update_post_meta( $post_id, 'paginate_bcolor', sanitize_hex_color($_POST['paginate_bcolor']) );
	}

	#Value check and saves if needed
	if( isset($_POST['ultpgrid_catcolor']) ) {
	    update_post_meta( $post_id, 'ultpgrid_catcolor', sanitize_hex_color($_POST['ultpgrid_catcolor']) );
	}

	#Value check and saves if needed
	if( isset($_POST['ultpgrid_ccolor']) ) {
	    update_post_meta( $post_id, 'ultpgrid_ccolor', sanitize_hex_color($_POST['ultpgrid_ccolor']) );
	}

	#Value check and saves if needed
	if( isset($_POST['pagination_align']) ) {
	    update_post_meta( $post_id, 'pagination_align', sanitize_text_field($_POST['pagination_align']) );
	}

	#Value check and saves if needed
	if( isset($_POST['paginate_fontsize']) ) {
	    update_post_meta( $post_id, 'paginate_fontsize', sanitize_text_field($_POST['paginate_fontsize']) );
	}

	#Value check and saves if needed
	if( isset($_POST['date_fontsize']) ) {
	    update_post_meta( $post_id, 'date_fontsize', sanitize_text_field($_POST['date_fontsize']) );
	}

	#Value check and saves if needed
	if( isset($_POST['date_hcolor_picker']) ) {
	    update_post_meta( $post_id, 'date_hcolor_picker', sanitize_hex_color($_POST['date_hcolor_picker']) );
	}

	#Value check and saves if needed
	if( isset($_POST['pagination_hover_color']) ) {
	    update_post_meta( $post_id, 'pagination_hover_color', sanitize_hex_color($_POST['pagination_hover_color']) );
	}

	#Value check and saves if needed
	if( isset($_POST['excerpt_fontsize']) ) {
	    update_post_meta( $post_id, 'excerpt_fontsize', sanitize_text_field($_POST['excerpt_fontsize']) );
	}

	#Value check and saves if needed
	if( isset($_POST['excerpt_hcolor']) ) {
	    update_post_meta( $post_id, 'excerpt_hcolor', sanitize_hex_color($_POST['excerpt_hcolor']) );
	}

	#Value check and saves if needed
	if( isset($_POST['heading_hcolor']) ) {
	    update_post_meta( $post_id, 'heading_hcolor', sanitize_hex_color($_POST['heading_hcolor']) );
	}

	#Value check and saves if needed
	if( isset($_POST['content_fontsize']) ) {
	    update_post_meta( $post_id, 'content_fontsize', sanitize_text_field($_POST['content_fontsize']) );
	}

	#Value check and saves if needed
	if( isset($_POST['grid_meta_options']) ) {
		update_post_meta( $post_id, 'grid_meta_options', array_map('stripslashes_deep', $_POST['grid_meta_options']) );
	}

	#Value check and saves
	if( isset($_POST['ultpgrid_content_info']) ) {
		update_post_meta( $post_id, 'ultpgrid_content_info', '0' );
	} else {
	    update_post_meta( $post_id, 'ultpgrid_content_info', '1' );
	}

	#Value check and saves if needed
	if( isset($_POST['ultpgrid_theme_id']) ) {
	    update_post_meta( $post_id, 'ultpgrid_theme_id', sanitize_text_field($_POST['ultpgrid_theme_id']) );
	}

	#Value check and saves if needed
	if( isset($_POST['grid_column']) ) {
	    update_post_meta( $post_id, 'grid_column', sanitize_text_field($_POST['grid_column']) );
	}

	#Value check and saves if needed
	if( isset($_POST['pagination']) ) {
	    update_post_meta( $post_id, 'pagination', sanitize_text_field($_POST['pagination']) );
	}

	#Value check and saves if needed
	if( isset($_POST['pagination_style']) ) {
	    update_post_meta( $post_id, 'pagination_style', $_POST['pagination_style']);
	}

	#Value check and saves if needed
	if( isset($_POST['go_back']) ) {
		if( $_POST['go_back'] == "" || $_POST['go_back'] == null || $_POST['go_back'] == '0' || strlen($_POST['go_back']) >= 15 || is_numeric($_POST['go_back'])){
			update_post_meta( $post_id, 'go_back', 'Previous' );
		}
		else {
			update_post_meta( $post_id, 'go_back', sanitize_text_field($_POST['go_back']) );
		}	    
	}

	#Value check and saves if needed
	if( isset($_POST['go_forward']) ) {
		if( $_POST['go_forward'] == "" || $_POST['go_forward'] == null || $_POST['go_forward'] == '0' || strlen($_POST['go_forward']) >= 15 || is_numeric($_POST['go_forward'])){
			update_post_meta( $post_id, 'go_forward', 'Next' );
		}
		else {
			update_post_meta( $post_id, 'go_forward', sanitize_text_field($_POST['go_forward']) );
		}		
	}	

	#Value check and saves if needed
	if( isset($_POST['pagination_text_color']) ) {
	    update_post_meta( $post_id, 'pagination_text_color', sanitize_hex_color($_POST['pagination_text_color']) );
	}
	#Value check and saves if needed
	if( isset($_POST['pagination_back_color']) ) {
	    update_post_meta( $post_id, 'pagination_back_color', sanitize_hex_color($_POST['pagination_back_color']) );
	}

	#Value check and saves if needed
	if( isset($_POST['paginate_hover_color']) ) {
	    update_post_meta( $post_id, 'paginate_hover_color', sanitize_hex_color($_POST['paginate_hover_color']) );
	}

	#Value check and saves if needed
	if( isset($_POST['ultpgrid_order_cat']) ) {
	    update_post_meta( $post_id, 'ultpgrid_order_cat', sanitize_text_field($_POST['ultpgrid_order_cat']) );
	}

	#Value check and saves if needed
	if( isset($_POST['img_show_hide']) ) {
	    update_post_meta( $post_id, 'img_show_hide', sanitize_text_field($_POST['img_show_hide']) );
	}

	#Value check and saves if needed
	if( isset($_POST['image_size']) ) {
	    update_post_meta( $post_id, 'image_size', sanitize_text_field($_POST['image_size']) );
	}

	#Value check and saves if needed
	if( isset($_POST['img_height']) && ($_POST['img_height'] != '') && ( strlen($_POST['img_height']) <= 4) && is_numeric($_POST['img_height'])) {
	    update_post_meta( $post_id, 'img_height', sanitize_text_field($_POST['img_height']) );
	}
			
	#Value check and saves
	if( isset($_POST['ultpgrid_title']) ) {
		update_post_meta( $post_id, 'ultpgrid_title', '0' );
	} else {
	    update_post_meta( $post_id, 'ultpgrid_title', '1' );
	}

	#Value check and saves
	if( isset($_POST['font_size']) ) {
	    update_post_meta( $post_id, 'font_size', sanitize_text_field($_POST['font_size']) );
	}

	#Value check and saves
	if( isset($_POST['heading_color_picker']) ) {
	    update_post_meta( $post_id, 'heading_color_picker', sanitize_hex_color($_POST['heading_color_picker']) );
	}
	
	#Value check and saves
	if( isset($_POST['content_color']) ) {
	    update_post_meta( $post_id, 'content_color', sanitize_hex_color($_POST['content_color']) );
	}

	#Value check and saves
	if( isset($_POST['ultpgrid_show_date']) ) {
	    update_post_meta( $post_id, 'ultpgrid_show_date', '0' );
	} else {
	    update_post_meta( $post_id, 'ultpgrid_show_date', '1' );
	}

	#Value check and saves
	if( isset($_POST['date_textcolor_picker']) ) {

	    update_post_meta( $post_id, 'date_textcolor_picker', sanitize_hex_color($_POST['date_textcolor_picker']) );
	}

	#Value check and saves
	if( isset($_POST['excerpt_color']) ) {
	    update_post_meta( $post_id, 'excerpt_color', sanitize_hex_color($_POST['excerpt_color']) );
	}

    if( isset($_POST['excerpt_lenght']) ) {
		if( $_POST['excerpt_lenght'] == '' || $_POST['excerpt_lenght'] == 0 || $_POST['excerpt_lenght'] == null || ( strlen($_POST['excerpt_lenght']) > 3) ||  !is_numeric($_POST['excerpt_lenght'])){
			update_post_meta( $post_id, 'excerpt_lenght', 62 );	
		} else
		{
      		update_post_meta( $post_id, 'excerpt_lenght', sanitize_text_field($_POST['excerpt_lenght']) );  			
		}
    } 

	#Checks for input and sanitizes/saves if needed
    if( isset($_POST['btn_readmore']) ) {
		if( $_POST['btn_readmore'] == '' || $_POST['btn_readmore'] == 0 || $_POST['btn_readmore'] == null || ( strlen($_POST['btn_readmore']) >= 20) || is_numeric($_POST['btn_readmore'])){
			update_post_meta( $post_id, 'btn_readmore',  'Read More' );	
		} else
		{
      		update_post_meta( $post_id, 'btn_readmore', sanitize_text_field($_POST['btn_readmore']) );  		
		}
    }

	#Value check and saves
	if( isset($_POST['img_color']) ) {
	    update_post_meta( $post_id, 'img_color', sanitize_hex_color($_POST['img_color']) );
	}

	#Value check and saves
	if( isset($_POST['opacity']) ) {
	    update_post_meta( $post_id, 'opacity', sanitize_text_field($_POST['opacity']) );
	}

	// #Value check and saves
	// if( isset($_POST['div_height']) ) {
	//     update_post_meta( $post_id, 'div_height', sanitize_text_field($_POST['div_height']) );
	// }   
}
add_action( 'save_post', 'ultpgrid_save_func' );
# Custom metabox field end