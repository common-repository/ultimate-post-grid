<?php

    if( !defined( 'ABSPATH' ) ){
        exit;
    }

    $ultpgrid_theme_id                   = get_post_meta( $postid, 'ultpgrid_theme_id', true ); 
    $excerpt_lenght                      = get_post_meta( $postid, 'excerpt_lenght', true ); 
    $font_size           	             = get_post_meta( $postid, 'font_size', true );
    $heading_color_picker	             = get_post_meta( $postid, 'heading_color_picker', true );
    $content_color                       = get_post_meta( $postid, 'content_color', true );
    $date_textcolor_picker               = get_post_meta( $postid, 'date_textcolor_picker', true );
    $date_color_picker                   = get_post_meta( $postid, 'date_color_picker', true );
    $ultpgrid_title                      = get_post_meta( $postid, 'ultpgrid_title', true );
    $ultpgrid_content_info               = get_post_meta( $postid, 'ultpgrid_content_info', true );
    $btn_readmore                        = get_post_meta( $postid, 'btn_readmore', true );    
    $excerpt_color                       = get_post_meta( $postid, 'excerpt_color', true );
    $image_size                          = get_post_meta( $postid, 'image_size', true );  
    $img_height                          = get_post_meta( $postid, 'img_height', true );  
    $img_width                           = get_post_meta( $postid, 'img_width', true );    
    $img_show_hide                       = get_post_meta( $postid, 'img_show_hide', true ); 
    $go_back                             = get_post_meta( $postid, 'go_back', true );
    if( empty($go_back) ) {
        $go_back = "Previous";
    } else {
        $go_back = $go_back;
    }

    $go_forward                         = get_post_meta( $postid, 'go_forward', true ); 
    if( empty($go_forward) ) {
        $go_forward = "Next";
    } else {
        $go_forward = $go_forward;
    }

    $pagination_text_color               = get_post_meta( $postid, 'pagination_text_color', true );
    if( $pagination_text_color == "" ) {
        $pagination_text_color = "ff00ff";
    } else {
        $pagination_text_color = $pagination_text_color;
    }

    $pagination_back_color     = get_post_meta( $postid, 'pagination_back_color', true );
    if( $pagination_back_color == "" ) {
        $pagination_back_color = "ddd";
    } else {
        $pagination_back_color = $pagination_back_color;
    }

    $paginate_hover_color     = get_post_meta( $postid, 'paginate_hover_color', true );
    if( $paginate_hover_color == "" ) {
        $paginate_hover_color = "ddd";
    } else {
        $paginate_hover_color = $paginate_hover_color;
    } 

    $grid_column                         = get_post_meta( $postid, 'grid_column', true );
    $div_height                          = get_post_meta( $postid, 'div_height', true );
    $pagination                          = get_post_meta( $postid, 'pagination', true );
    $pagination_style                    = get_post_meta( $postid, 'pagination_style', true );
	$post_per_page						 = get_option( 'posts_per_page' );  
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
    $ultpgrid_show_date                  = get_post_meta( $postid, 'ultpgrid_show_date', true );
    $date_fontsize                       = get_post_meta( $postid, 'date_fontsize', true );

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

    $content = '';
    if( $image_size == "custom" ) {
       $img_height  = $img_height; 
    }
    else
    {
        $img_height = '172';
    }

    $content .='<style>';
    $content .='.postgrid-style-2 header h3 > a {
                    font-size:'.$font_size.'px; 
                    color: #'.$heading_color_picker.';
                } 
                .postgrid-style-2 header h3 > a:hover {
                    color: #'.$heading_hcolor.';
                } 

                .postgrid-style-2 .box p{
                   color: #'.$content_color.'; 
                   font-size:'.$content_fontsize.'px;
                } 
                .postgrid-style-2 .readmore-btn > a {
                    color:#'.$excerpt_color.'; 
                    font-size:'.$excerpt_fontsize.'px; 
                }
                .postgrid-style-2 .readmore-btn > a:hover {
                    color:#'.$excerpt_hcolor.'; 
                }

                .postgrid-style-2 .box img {
                    height:'.$img_height.'px;                    
                }
                .postgrid-style-2 .authorinfo > a {
                    color:#'.$ultpgrid_ccolor.'; 
                    font-size:'.$ultpgrid_cfontsize.'px;   
                } 
                .postgrid-style-2 .authorinfo .catinfo > a {
                    color:#'.$ultpgrid_ccolor.'; 
                    font-size:'.$ultpgrid_cfontsize.'px;   
                }                 
                .postgrid-style-2 .authorinfo > a:hover {
                    color:#'.$ultpgrid_catcolor.'; 
                } 
                .postgrid-style-2 .authorinfo .catinfo > a:hover {
                     color:#'.$ultpgrid_catcolor.';  
                }
                .grids-post-pagination .page-numbers {
                    border-color:#'.$paginate_bcolor.';
                    font-size:'.$paginate_fontsize.'px;
                }
                .grids-post-pagination .page-numbers.current { 
                    border-color:#'.$paginate_bcolor.';
                    background:#'.$pagination_back_color.';
                    color:#'.$pagination_text_color.';
                    font-size:'.$paginate_fontsize.'px;
                }
                .grids-post-pagination .page-numbers:hover {
                    border-color:#'.$paginate_bcolor.';
                    background: #'.$paginate_hover_color.' none repeat scroll 0 0;
                    color:#'.$pagination_hover_color.';
                    font-size:'.$paginate_fontsize.'px;
                } 
                .grids-post-pagination .next.page-numbers:hover {
                    border-color:#'.$paginate_bcolor.';
                    background: #'.$paginate_hover_color.' none repeat scroll 0 0;
                    color:#'.$pagination_hover_color.';
                    font-size:'.$paginate_fontsize.'px;
                } 
                .load_more{
                    background:#'.$pagination_back_color.';
                    color:#'.$pagination_text_color.';
                }

                a{
                    box-shadow:none !important;
                }';
    $content .='.postgrid-style-2 .pdate{
                    color:#'.$date_textcolor_picker.';
                    font-size:'.$date_fontsize.'px;
                    margin-top: 15px;
                    overflow: hidden;
                    padding: 0 10px;
                }';                 
            if( $pagination_align == "center" ) { 
    $content .='.paginate {display:table;margin:auto; }';
            } else if( $pagination_align == "right" ) {
    $content .='.paginate {display: block;margin: auto;float: right;}';
            };                
    $content .='</style>';


    $content .= '<div class="postgrid-style-2" id="posts">';
        while ($query->have_posts()) : $query->the_post();

            $post_thumb  = "";
            if( $img_show_hide == 1 && has_post_thumbnail() ) {

                if( $image_size == "custom" ) {
                    $post_thumb = get_the_post_thumbnail_url( $post->ID, array($img_width, $img_height) );
                } else {
                    $post_thumb = get_the_post_thumbnail_url( $post->ID, $image_size ); 
                }
            }     // End Check Thubnail Image

            $content .= '<div class="ultpgrid-col-lg-'.$grid_column.' ultpgrid-col-md-4 ultpgrid-col-sm-2 ultpgrid-col-xs-1">';
                $content .= '<section class="box">';
                if( $img_show_hide == 1 && has_post_thumbnail() ) {                
                    $content .= '<a href="'.esc_url( get_the_permalink() ).'" class="image featured"><img src="'.$post_thumb.'" alt="" /></a>';
                }
                    if( $ultpgrid_title == 1 ) {
                        $content .= '<header><h3><a href="'.esc_url( get_the_permalink() ).'">'.get_the_title().'</a></h3></header>';
                    }
                    if( $ultpgrid_show_date == 1 ) {
                        $content .='<span class="pdate"><strong>Date: '.get_the_date().'</strong></span>';
                    }
                    if( $ultpgrid_content_info == 1 ) {    // Author / Categories 
                    $content .= '<div class="authorinfo">';
                        $content .= '<a href="'.get_author_posts_url(get_the_author_meta('ID'), get_the_author_meta( 'user_nicename')).'">'.get_the_author().'</a>';

                        $catId = get_the_ID();
                        $cats  = get_the_category( $catId );
                        $content .= '<span class="catinfo">';
                            foreach( $cats as $cat ) {
                                $content .=' / <a href="'.get_category_link( $cat->cat_ID ).'">'.$cat->name.'</a>';    
                            }
                        $content .= '</span>';
                    $content .= '</div>';                        
                    }

                    $content .= '<p>'.ultpgrid_get_excerpt( $excerpt_lenght ).'</p>';
                    $content .= '<span class="readmore-btn">';                    
                        $content .= '<a href="'.esc_url( get_the_permalink() ).'">'.$btn_readmore.'</a>';
                    $content .= '</span>';                                         
                $content .= '</section>';
            $content .= '</div>';

        endwhile;        
    $content .= '</div>';

    // Start Pagination
    $content .= '<div class="grids-post-pagination">';

       if( $pagination == "true" && $pagination_style == "number" ) {
            $content .= '<div class="paginate">';
				$max_num_pages = $query->max_num_pages;
				$big = 999999999; // need an unlikely integer
				$content.= paginate_links( array(
					'base' 			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'format' 		=> '?paged=%#%',
					'current' 		=> max( 1, $paged ),
					'total' 		=> $max_num_pages,
					'prev_text'     => $go_back,
					'next_text'     => $go_forward,
				) );
            $content .= '</div>';
        }

    $content .= '</div>';