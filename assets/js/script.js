jQuery(document).ready(function($){
	"use strict";

	$(".changer").on('change', function(){

		var post_types  = $(this).val();
		var postid 		= $(this).attr('postid');      			
		$.ajax({
			type: 'POST',
			url: ultimate_post_grid_ajax.ultimate_post_grid_ajaxurl,
			data: { "action": "ultpgrid_get_taxonomy_categories","post_types":post_types,"postid":postid },
			success: function(data) {
				$("#get_cate_area").html(data);
			}
		});

	});

	// End Ajax Call

	$("#pagination").on('change', function(){

		var pagination = $("#pagination").val();
		if(pagination == "false")
		{
			$("#p_style_area").hide();
			$("#posts_number").hide();
			$("#paginate_area").hide();
			$("#paginate_color").hide();
			$("#paginate_barfea").hide();
			$("#paginate_hcolor").hide();
		}
		else
		{
			$("#p_style_area").show();
			if($("#pagination_style").val() == "number" || $("#pagination_style").val() == "load"){

				$("#posts_number").show();
				$("#paginate_area").show();
				$("#paginate_color").show();
				$("#paginate_barfea").show();
				$("#paginate_hcolor").show();				
			}
		}

	});

	var pagination = $("#pagination").val();
	if(pagination == "false")
	{
		$("#p_style_area").hide();	
		$("#posts_number").hide();
		$("#paginate_area").hide();
		$("#posts_number").hide();
		$("#paginate_area").hide();
		$("#paginate_color").hide();
		$("#paginate_barfea").hide();
		$("#paginate_hcolor").hide();			
	}

	$("#pagination_style").on('change', function(){

		var pagination_style = $("#pagination_style").val();
		if(pagination_style == 'number'|| $("#pagination_style").val() == "load")
		{
			$("#posts_number").show();		
		}
		else
		{
			$("#posts_number").hide();
		}

	});

	var pagination_style = $("#pagination_style").val();
	var pagination 		= $("#pagination").val();
	if( $("#pagination").val() == "true" && (pagination_style == "number" || pagination_style == "load"))
	{	
		$("#posts_number").show();	
	}

	$("#pagination_style").on('change', function(){

		var pagination_style = $("#pagination_style").val();
		if(pagination_style == 'number')
		{
			$("#back_forward").show();
			$("#load_toggle").hide();
		}
		else if($("#pagination_style").val() == "load")
		{
			$("#load_toggle").show();
			$("#back_forward").hide();
		}

	});

	var pagination_style = $("#pagination_style").val();
	if(pagination_style == 'number')
	{
		$("#back_forward").show();
		$("#load_toggle").hide();
	}
	else if($("#pagination_style").val() == "load")
	{
		$("#load_toggle").show();
		$("#back_forward").hide();
	}	
	// End Pagination
	 	
	if($("#grid_meta_options").val() == ""){
		$("#get_cate_area").html("Select above any Post Type");
	}

	$("#ultpgrid_show_excerpt").on('change', function(){
		var getVal = $(this).val();
		if(getVal == "excerpt"){
			$(".excerpt_details").show();
			$("#excerpt_color_area").show();
		}
		else
		{
			$(".excerpt_details").hide();
			$("#excerpt_color_area").hide();	
		}
	});

	$("#img_show_hide").on('change', function(){

		var getImgVal = $(this).val();
		if(getImgVal  == 2){
			$("#img_controller").hide();
			$(".custom_details").hide();
		}

		if(getImgVal  == 1){
			$("#img_controller").show();
			if($("#image_size").val() == "custom"){
				$(".custom_details").show();
			}
		}
	});		


	var getImgVal = $("#img_show_hide").val();
	if(getImgVal  == 2){
		$("#img_controller").hide();
		$(".custom_details").hide();
	}
	if(getImgVal  == 1){
		$("#img_controller").show();
		if($("#image_size").val() == "custom"){
			$(".custom_details").show();
		}		
	}	

	$("#image_size").on('change', function(){

		var getVal3 = $(this).val();
		if( getVal3 == "custom" ){
			$(".custom_details").show();
		}
		else
		{
			$(".custom_details").hide();	
		}
		
	});

	var custom_size = $("#image_size").val();
	if($("#img_show_hide").val() == 1 &&  custom_size == "custom" ){
		$(".custom_details").show();
	} else{
		$(".custom_details").hide();
	}

	var getVal2 = $("#ultpgrid_show_excerpt").val();
	if(getVal2 == "excerpt"){
		$(".excerpt_details").show();
		$("#excerpt_color_area").show();
	}

	$("#ultpgrid_theme_id").on('change', function(){

		if($("#ultpgrid_theme_id").val() == 1){

			$("#date_div").show();
			$("#date_color").show();

		} else{
			$("#date_div").hide();
			$("#date_color").hide();
		}

	});

	if($("#ultpgrid_theme_id").val() == 1){
		$("#date_div").show();
		$("#date_color").show();
	} else
	{
		$("#date_div").hide();
		$("#date_color").hide();
	}

	$("#ultpgrid_theme_id").on('change', function(){

		var theme_id = $("#ultpgrid_theme_id").val();
		if(theme_id == 1)
		{
			$("#opacity_area").show();
		}
		else
		{
			$("#opacity_area").hide();
		}

	});	

	var theme_id = $("#ultpgrid_theme_id").val();
	if(theme_id == 1)
	{
		$("#opacity_area").show();
	}
	else
	{
		$("#opacity_area").hide();
	}

	// Iso Top 

    $(".all-portfolios").isotope({
        itemSelector: '.single-portfolio',
        layoutMode: 'fitRows',
    });
    
    $('ul.filter li').click(function(){
        
      $("ul.filter li").removeClass("active");
      $(this).addClass("active");        

        var selector = $(this).attr('data-filter'); 
        $(".all-portfolios").isotope({ 
            filter: selector, 
            animationOptions: { 
                duration: 750, 
                easing: 'linear', 
                queue: false, 
            } 
        }); 
      return false; 
    });

    $("#ultpgrid_theme_id").on('change', function(){
    	if($("#ultpgrid_theme_id").val() == 4){
			
    		$("#isotop_align_area").show();
    		$("#isotop_color_area").show();
    		$("#isotop_activecolor_area").show();
    		$("#isotop_hovercolor_area").show();

			//Pagination
			$("#pagination_area").hide(); 
			$("#p_style_area").hide();
			$("#paginate_area").hide();
			$("#paginate_font_area").hide();
			$("#paginate_color").hide();
			$("#paginate_hcolor").hide();
			$("#paginate_align_area").hide();
			$("#paginate_barfea").hide(); 
			$("#paginate_bcolor").hide(); 

    	} else{

    		$("#isotop_align_area").hide();
    		$("#isotop_color_area").hide();
    		$("#isotop_activecolor_area").hide();
    		$("#isotop_hovercolor_area").hide(); 

    		//Pagination
    		$("#pagination_area").show(); 
    		$("#p_style_area").show();
    		$("#paginate_area").show();
    		$("#paginate_font_area").show();
    		$("#paginate_color").show();
    		$("#paginate_hcolor").show();
    		$("#paginate_align_area").show();
    		$("#paginate_barfea").show(); 
    		$("#paginate_bcolor").show();
    	}
    });

    if($("#ultpgrid_theme_id").val() == 4){
		$("#isotop_align_area").show();
		$("#isotop_color_area").show();
		$("#isotop_activecolor_area").show();
		$("#isotop_hovercolor_area").show();

		//Pagination
		$("#pagination_area").hide(); 
		$("#p_style_area").hide();
		$("#paginate_area").hide();
		$("#paginate_font_area").hide();
		$("#paginate_color").hide();
		$("#paginate_hcolor").hide();
		$("#paginate_align_area").hide();
		$("#paginate_barfea").hide(); 
		$("#paginate_bcolor").hide();
   	} 
   	else {
		$("#isotop_align_area").hide();
		$("#isotop_color_area").hide();
		$("#isotop_activecolor_area").hide(); 
		$("#isotop_hovercolor_area").hide(); 

		//Pagination
		$("#pagination_area").show(); 
		$("#p_style_area").show();
		$("#paginate_area").show();
		$("#paginate_font_area").show();
		$("#paginate_color").show();
		$("#paginate_hcolor").show();
		$("#paginate_align_area").show();
		$("#paginate_barfea").show(); 
		$("#paginate_bcolor").show();

   	}
	
});