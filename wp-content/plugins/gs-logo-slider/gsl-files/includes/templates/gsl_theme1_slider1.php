<?php 

// $options = array(
//   	"mode" 				=> 'horizontal',
//   	"speed" 			=> (int) $speed,
//   	"auto" 				=>  $inf_loop,
//   	"controls" 			=>  $gs_l_ctrl,
//   	"pager"             => false,
//   	"autoHover"         => true,
//   	"slideMargin" 		=> (int) 10,
//   	//"slideWidth" 		=> (int) $gs_l_slide_w,
// 	//"minSlides" 		=> (int) $gs_l_mob_logo,
// 	//"responsive"        =>false,
//     "maxSlides"			=> (int) $gs_l_max_logo,
//   	"moveSlides" 		=> (int) $gs_l_move_logo,
//   	"useCSS" 			=> false
// );

// $options = json_encode($options, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);

$output .= '<div class="gs_logo_container" data-options="{slideMargin:5,speed:\''.(int) $speed.'\',auto:\''.$inf_loop.'\',autoReload:true,autoHover:true, pager:false, maxSlides:\''.(int) $gs_l_max_logo.'\',moveSlides:\''.(int) $gs_l_move_logo.'\',controls:\''.$gs_l_ctrl.'\',useCSS:false}" data-breaks="[{screen:320, slides:\''.(int) $gs_l_mob_logo.'\'},{screen:460, slides:\''.(int) $gs_l_mob_logo.'\'},{screen:768, slides:\''.(int) $gs_l_tab_logo.'\'},{screen:1024, slides:\''.(int) $gs_l_min_logo.'\'}]">';

	// The Loop
	if ( $gsl->have_posts() ) {
		while ( $gsl->have_posts() ) {
			$gsl->the_post();

				$gsl_post_id = get_the_ID();
				$gs_logo_id = get_post_thumbnail_id($gsl_post_id);
				$gs_logo_url = wp_get_attachment_image_src($gs_logo_id, 'full', true);
				$meta = get_post_meta( get_the_id() );
				// $gs_logo = aq_resize_gsl( $gs_logo_url[0], $gs_l_width, $gs_l_height, true );
				$gs_logo = $gs_logo_url[0];
				$gs_logo_alt = get_post_meta($gs_logo_id,'_wp_attachment_image_alt',true);

			$output .= '<div class="gs_logo_single">';

				if ($meta['client_url'][0]) :
			 		$output .= '<a href="'. $meta['client_url'][0] .'" target="_blank">';
			 	endif;

			 	if ($gs_logo) :
					$output .= '<img src="'.$gs_logo.'" alt="'.$gs_logo_alt.'" title="'. get_the_title() .'" >';
				endif;

				if ($meta['client_url'][0]) :
					$output .= '</a>';
				endif;
				
				if ( $title == "yes" ) :
					$output .= '<h3 class="gs_logo_title">'. get_the_title() .'</h3>';
				endif;
			$output .= '</div>';
		}
	} else {
		$output .= "No Logo Added!";
	}
	// Restore original Post Data
	wp_reset_postdata();

$output .= '</div>';
return $output;