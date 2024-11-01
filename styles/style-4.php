<?php

    if( !defined( 'ABSPATH' ) ){
        exit;
    }

    $excerpt_lenght                      = get_post_meta( $postid, 'excerpt_lenght', true ); 
    $font_size           	             = get_post_meta( $postid, 'font_size', true );
    $heading_color_picker	             = get_post_meta( $postid, 'heading_color_picker', true );
    $content_color                       = get_post_meta( $postid, 'content_color', true );
    $date_textcolor_picker               = get_post_meta( $postid, 'date_textcolor_picker', true );
    $date_color_picker                   = get_post_meta( $postid, 'date_color_picker', true );
    $ultpgrid_title                      = get_post_meta( $postid, 'ultpgrid_title', true );
    $ultpgrid_content_info               = get_post_meta( $postid, 'ultpgrid_content_info', true ); 
    $img_opc_color                       = get_post_meta( $postid, 'img_opc_color', true );
    $opacity                             = get_post_meta( $postid, 'opacity', true );
    $image_size                          = get_post_meta( $postid, 'image_size', true );  
    $img_height                          = get_post_meta( $postid, 'img_height', true );  
    $img_width                           = get_post_meta( $postid, 'img_width', true );
    $excerpt_color                       = get_post_meta( $postid, 'excerpt_color', true );
    $img_show_hide                       = get_post_meta( $postid, 'img_show_hide', true ); 
    $grid_column                         = get_post_meta( $postid, 'grid_column', true );
    $div_height                          = get_post_meta( $postid, 'div_height', true );
	$post_per_page					     = get_option( 'posts_per_page' ); 
    $content_fontsize                    = get_post_meta( $postid, 'content_fontsize', true );
    $heading_hcolor                      = get_post_meta( $postid, 'heading_hcolor', true );
    $excerpt_fontsize                    = get_post_meta( $postid, 'excerpt_fontsize', true );
    $excerpt_hcolor                      = get_post_meta( $postid, 'excerpt_hcolor', true );
    $paginate_hover_color                = get_post_meta( $postid, 'paginate_hover_color', true );
    $paginate_bcolor                     = get_post_meta( $postid, 'paginate_bcolor', true );
    $paginate_fontsize                   = get_post_meta( $postid, 'paginate_fontsize', true );
    $pagination_hover_color              = get_post_meta( $postid, 'pagination_hover_color', true );
    $ultpgrid_ccolor                     = get_post_meta( $postid, 'ultpgrid_ccolor', true );
    $ultpgrid_catcolor                   = get_post_meta( $postid, 'ultpgrid_catcolor', true );
    $ultpgrid_cfontsize                  = get_post_meta( $postid, 'ultpgrid_cfontsize', true ); 
    $pagination_align                    = get_post_meta( $postid, 'pagination_align', true ); 
    $date_fontsize                       = get_post_meta( $postid, 'date_fontsize', true );  
    $isotop_align                        = get_post_meta( $postid, 'isotop_align', true );
    $isotop_color                        = get_post_meta( $postid, 'isotop_color', true ); 
    $isotop_activecolor                  = get_post_meta( $postid, 'isotop_activecolor', true );
    $isotop_hovercolor                   = get_post_meta( $postid, 'isotop_hovercolor', true );

    $content = '';
    $content .='<style>';
    $content  .='.portfolio-filter {text-align:'.$isotop_align.'}'; 
    $content  .='ul.filter { color: #'.$isotop_color.'}';
    $content  .='ul.filter li.active  { color: #'.$isotop_activecolor.'}';  
    $content  .='ul.filter li:hover { color: #'.$isotop_hovercolor.'}';     
    $content .='.postgrid-style-3 .dash-lined > a {
            color:#'.$heading_color_picker.';
            font-size: '.$font_size.'px;
            box-shadow: none;
        }
        .postgrid-style-3 .dash-lined > a:hover{
            color:#'.$heading_hcolor.';
        }
        .postgrid-style-3 .authorinfo > a {
            color:#'.$ultpgrid_ccolor.'; 
            font-size:'.$ultpgrid_cfontsize.'px;   
        } 
        .postgrid-style-3 .authorinfo .catinfo > a {
            color:#'.$ultpgrid_ccolor.'; 
            font-size:'.$ultpgrid_cfontsize.'px; 
            box-shadow:none;  
        }                 
        .postgrid-style-3 .authorinfo > a:hover {
            color:#'.$ultpgrid_catcolor.'; 
        } 
        .postgrid-style-3 .authorinfo .catinfo > a:hover {
             color:#'.$ultpgrid_catcolor.';  
        } 

        .postgrid-style-3 .info p {
            color: #'.$content_color .';
            font-size:'.$content_fontsize.'px;
        }
        .postgrid-style-3 a.read-more {
            color:#'.$excerpt_color.'; 
            box-shadow: none; 
            font-size:'.$excerpt_fontsize.'px;       
        }
        .postgrid-style-3 a.read-more:hover {
            color:#'.$excerpt_hcolor.'; 
        } ';
    $content .='.postgrid-style-3 .pdate{
                color:#'.$date_textcolor_picker.';
                font-size:'.$date_fontsize.'px;
                margin-top: 15px;
                overflow: hidden;
                padding: 0 0px;
        }';                  
    $content .='.postgrid-style-3 .overlay img {';
            if($image_size == "custom"){
                $content .='height:'.$img_height.'px;';
            } else {
                $content .='height: 172px;'; 
            };
        '}                  
        a{
            box-shadow:none !important;
        }
    ';     
    $content .='</style>';

    function ultpgrid_get_excerpt( $excerpt_lenght ) {
        $excerpt = get_the_content();
        $excerpt = preg_replace( " ( [.*?])",'',$excerpt );
        $excerpt = strip_shortcodes( $excerpt );
        $excerpt = strip_tags( $excerpt );
        $excerpt = substr( $excerpt, 0, $excerpt_lenght );
        $excerpt = substr( $excerpt, 0, strripos( $excerpt, " ") );
        $excerpt = trim( preg_replace( '/s+/', ' ', $excerpt) );
        return $excerpt;
    }
	$grid_meta_options = get_post_meta(  $postid, 'grid_meta_options', true );
    $categories = $grid_meta_options['categories'];

	$content .='<div class="portfolio-filter">
    			<ul class="filter">';
					 $content.='<li class="active" data-filter="*">Show All</li>';
					 	foreach( $categories as $ak ) {
						$category_name = get_cat_name( substr($ak, 9,10) );
					    $content.='<li data-filter=".'.substr($ak, 9,10).'">'.$category_name.'</a></li>';
						} 
			$content.=' </ul>
    		</div>';

		$content.='<div class="all-portfolios">';
        $inc=0;
        while ($query->have_posts()) : $query->the_post();
            $post_thumb = '';
            if( $img_show_hide == 1 && has_post_thumbnail() ) {

                if($image_size == "custom") {
                    $post_thumb = get_the_post_thumbnail_url($post->ID, array($img_width, $img_height) );
                }
                else{
                    $post_thumb = get_the_post_thumbnail_url($post->ID, $image_size);
                }
            }   // End Check Thubnail Image

            $cat_id ='';
            if( $inc >= count($categories) ) {
                $inc = 0;
            }
            for( $i=$inc; $i< $inc+1; $i++ ) {

                $cat_id = substr($categories[$i], 9,10);
                $content .= '<div class="postgrid-style-3">';                 
                $content .= '<div class="ultpgrid-col-lg-'.$grid_column.' ultpgrid-col-md-4 ultpgrid-col-sm-2 ultpgrid-col-xs-1 single-portfolio '.$cat_id.'">';
                        $content .= '<li class="style3box-item">';
                        if( $img_show_hide == 1 && has_post_thumbnail() ) {    
                            $content .= '<div class="overlay">';                        
                                $content .= '<a href=""><img src="'.$post_thumb.'" alt=""></a>';                    
                            $content .= '</div>';
                        }
                            $content .= '<div class="info">';
                                if( $ultpgrid_title == 1 ) {
                                    $content .='<h4 class="dash-lined"><a href="'.esc_url( get_the_permalink() ).'">'.get_the_title().'</a></h4>';                
                                }
                                if( $ultpgrid_show_date == 1 ) {
                                    $content .='<span class="pdate"><strong>Date: '.get_the_date().'</strong></span>';
                                }                    

                                if( $ultpgrid_content_info == 1 ) {    // Author / Categories 
                                $content .= '<div class="authorinfo">';
                                    $content .= '<a href="'.get_author_posts_url(get_the_author_meta('ID'), get_the_author_meta( 'user_nicename')).'">'.get_the_author().'</a>';
                                    $catId = get_the_ID();
                                    $cats = get_the_category( $catId );
                                    $content .= '<span class="catinfo">';
                                        foreach( $cats as $cat ) {
                                            $content .=' / <a href="'.get_category_link( $cat->cat_ID ).'">'.$cat->name.'</a>';    
                                        }
                                    $content .= '</span>';
                                $content .= '</div>';                        
                                }   // End Info

                                $content .= '<p>'.ultpgrid_get_excerpt( $excerpt_lenght ).'</p>';
                                $content .= '<a href="'.esc_url( get_the_permalink() ).'" class="read-more">'.$btn_readmore.'</a>';
                            $content .= '</div>';
                        $content .= '</li>';
                    $content .= '</div>';  
                $content .= '</div>';                                        
            }
            $inc++;
			endwhile;
			$content.='</div>'; 







