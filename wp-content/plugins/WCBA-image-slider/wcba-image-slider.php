<?php

/**
 * @package Custom Plugin utilizing ACF for WordPress
 * @version 1.0
 */
/*
Plugin Name: WCBA image slider
Description: Image slider plugin by WCB DESIGN AGENCY.
Author: Ivan Sumlikin - WCB DESIGN AGENCY
Version: 1.0
Author URI: http://www.webcoursesagency.com/
*/

 /*
 Copyright 2016 WCB Design Agency  (http://www.webcoursesagency.com/)
 This slider is based on Slick slider jQuery plugin http://kenwheeler.github.io/slick/ and ACF PRO (https://www.advancedcustomfields.com)
 */

 /*--------------------------------------------------------------
 # create a plugin class
 --------------------------------------------------------------*/

 if(!class_exists("WcbaSlidePlugin"))
 {
    class WcbaSlidePlugin
     {
        public function __construct()
         {

             add_filter('acf/settings/path', function() {
                 return sprintf("%s/includes/acf/", dirname(__FILE__));
             });
             add_filter('acf/settings/dir', function() {
                 return sprintf("%s/includes/acf/", plugin_dir_url(__FILE__));
             });

             require_once(sprintf("%s/includes/acf/acf.php", dirname(__FILE__)));

             add_action('init', 'load_exported_fields');
             function load_exported_fields(){
               require_once(sprintf("%s/includes/fields/slider-fields.php", dirname(__FILE__)));
             }

             /*--------------------------------------------------------------
              # Registering the Slider post type
              --------------------------------------------------------------*/

              function wcba_slider_cpt() {

               $labels = array(
                 'name'                  => _x( 'WCBA Sliders', 'Post Type General Name', 'wcb-agency-theme' ),
                 'singular_name'         => _x( 'WCBA Slider', 'Post Type Singular Name', 'wcb-agency-theme' ),
                 'menu_name'             => __( 'WCBA Slider', 'wcb-agency-theme' ),
                 'name_admin_bar'        => __( 'WCBA Slider', 'wcb-agency-theme' ),
                 'archives'              => __( 'WCBA Sliders', 'wcb-agency-theme' ),
                 'parent_item_colon'     => __( 'Parent WCBA Slider:', 'wcb-agency-theme' ),
                 'all_items'             => __( 'All WCBA Sliders', 'wcb-agency-theme' ),
                 'add_new_item'          => __( 'Add New WCBA Slider', 'wcb-agency-theme' ),
                 'add_new'               => __( 'Add New', 'wcb-agency-theme' ),
                 'new_item'              => __( 'New WCBA Slider', 'wcb-agency-theme' ),
                 'edit_item'             => __( 'Edit WCBA Slider', 'wcb-agency-theme' ),
                 'update_item'           => __( 'Update WCBA Slider', 'wcb-agency-theme' ),
                 'view_item'             => __( 'View WCBA Slider', 'wcb-agency-theme' ),
                 'search_items'          => __( 'Search WCBA Slider', 'wcb-agency-theme' ),
                 'not_found'             => __( 'Not found', 'wcb-agency-theme' ),
                 'not_found_in_trash'    => __( 'Not found in Trash', 'wcb-agency-theme' ),
                 'featured_image'        => __( 'Featured Image', 'wcb-agency-theme' ),
                 'set_featured_image'    => __( 'Set featured image', 'wcb-agency-theme' ),
                 'remove_featured_image' => __( 'Remove featured image', 'wcb-agency-theme' ),
                 'use_featured_image'    => __( 'Use as featured image', 'wcb-agency-theme' ),
                 'insert_into_item'      => __( 'Insert into WCBA Slider', 'wcb-agency-theme' ),
                 'uploaded_to_this_item' => __( 'Uploaded to this WCBA Slider', 'wcb-agency-theme' ),
                 'items_list'            => __( 'WCBA Sliders list', 'wcb-agency-theme' ),
                 'items_list_navigation' => __( 'WCBA Sliders list navigation', 'wcb-agency-theme' ),
                 'filter_items_list'     => __( 'Filter WCBA Sliders list', 'wcb-agency-theme' ),
               );
               $args = array(
                 'label'                 => __( 'WCBA Slider', 'wcb-agency-theme' ),
                 'description'           => __( 'Slider content model by WCBA', 'wcb-agency-theme' ),
                 'labels'                => $labels,
                 'supports'              => array( 'title', 'revisions', 'custom-fields', ),
                 'hierarchical'          => true,
                 'public'                => true,
                 'show_ui'               => true,
                 'show_in_menu'          => true,
                 'menu_position'         => 5,
                 'menu_icon'             => 'dashicons-slides',
                 'show_in_admin_bar'     => true,
                 'show_in_nav_menus'     => true,
                 'can_export'            => true,
                 'has_archive'           => true,
                 'exclude_from_search'   => false,
                 'publicly_queryable'    => true,
                 'capability_type'       => 'page',
               );
               register_post_type( 'wcba_slider_cpt', $args );

             }

             add_action( 'init', 'wcba_slider_cpt', 0 );
        }
    }
 }

 /*--------------------------------------------------------------
 # Enqueue the assets
 --------------------------------------------------------------*/

function wcbs_slider_scripts() {

   	/*-----------------------------------------
   	# Slick slider integration
   	-----------------------------------------*/

    wp_enqueue_script( 'slick.js', plugins_url( '/assets/js/slick.js' , __FILE__ ), array( 'jquery' ) );

   	wp_enqueue_style( 'slick.css', plugins_url( '/assets/css/slick.css' , __FILE__ ));

   	/*----------------------------------------
   	# Slider Scripts and Styles
   	----------------------------------------*/

    wp_enqueue_style( 'wcba-css.css', plugins_url( '/assets/css/wcba-is.css' , __FILE__ ));


 }
 add_action( 'wp_enqueue_scripts', 'wcbs_slider_scripts' );


 /*--------------------------------------------------------------
  # Allow theme to upload svg files
  --------------------------------------------------------------*/

 function cc_mime_types( $mimes ){
   $mimes['svg'] = 'image/svg+xml'; return $mimes;
   }

   add_filter( 'upload_mimes', 'cc_mime_types' );

 add_filter('widget_text', 'do_shortcode');

/*--------------------------------------------------------------
# Adding the slider Shortcode

SYNTAX: [wcba-slider slider_id="some_id"]
--------------------------------------------------------------*/

// Add Shortcode
function wcbagency_slider( $atts ) {

  ob_start();
	// Attributes
	$atts = shortcode_atts(
		array(
			'slider_id' => ' ',
		),	$atts
	);

	  // WP_Query arguments
	$args = array (
    'p'                      => $atts['slider_id'],
		'post_type'              => array( 'wcba_slider_cpt' ),
		'post_status'            => array( 'publish' ),
	);

	// The Query
	$slider_query = new WP_Query( $args );

	  // The Loop
	  if ( $slider_query->have_posts() ) {
      $i = 0;
	  	while ( $slider_query->have_posts() ) {
	  		$slider_query->the_post();

        // SLIDER SETTINGS

        if (get_field('slides_per_view') ) {
           $spv = get_field('slides_per_view');
         }else {
           $spv = 1;
         }

         if (get_field('slides_to_scroll') ) {
            $sts = get_field('slides_to_scroll');
          }else {
            $sts = 1;
          }

          if (get_field('slides_gap') ) {
             $sg = get_field('slides_gap');
           }else {
             $sg = 0;
           }

           if (get_field('custom_left_arrow') ) {
              $la = get_field('custom_left_arrow');
            }else {
              $la = plugins_url( '/assets/images/wcbas-arrow-left.svg' , __FILE__ );
            }

            if (get_field('custom_right_arrow') ) {
               $ra = get_field('custom_right_arrow');
             }else {
               $ra = plugins_url( '/assets/images/wcbas-arrow-right.svg' , __FILE__ );
             }

           if (get_field('slider_height_px') ) {
              $sh = get_field('slider_height_px');
            }else {
              $sh = 450;
            }


         if (get_field('enable_arrows') ) {
            $arr = 'true';
          }else {
            $arr= 'false';
          }

        if (get_field('autoplay') ) {
             $atp = 'true';
           }else {
             $atp= 'false';
           }



        if (get_field('responsive_settings')) {

          $responsive = 'true';

          if (get_field('height_on_tablets') ) {
             $hot = get_field('height_on_tablets');
           }else {
             $hot = 350;
           }

         if (get_field('slides_per_view_tablets') ) {
            $spvot = get_field('slides_per_view_tablets');
          }else {
            $spvot = 1;
          }

          if (get_field('slides_to_scroll_tablets') ) {
             $stsot = get_field('slides_to_scroll_tablets');
           }else {
             $stsot = 1;
           }

           if (get_field('enable_arrows_tabs') ) {
              $arrot = 'true';
            }else {
              $arrot = 'false';
            }

            // -

            if (get_field('height_on_mobile') ) {
               $hom = get_field('height_on_mobile');
             }else {
               $hom = 250;
             }

           if (get_field('slides_per_view_mobile') ) {
              $spvom = get_field('slides_per_view_mobile');
            }else {
              $spvom = 1;
            }

            if (get_field('image_fit_mode') ) {
               $ifm = get_field('image_fit_mode');
             }else {
               $ifm = 'none';
             }

            if (get_field('slides_to_scroll_mobile') ) {
               $stsom = get_field('slides_to_scroll_mobile');
             }else {
               $stsom = 1;
             }

             if (get_field('enable_arrows_on_mobile') ) {
                $arrom = 'true';
              }else {
                $arrom = 'false';
              }
        }

          // SLIDER SETTINGS

          if (get_field('responsive_settings'))
          { ?>
            <script type="text/javascript">
              jQuery(document).ready(function($){
                var $sliderId = '<?php echo $atts['slider_id']; ?>',
                    $svp = parseInt('<?php echo $spv; ?>'),
                    $sts = parseInt('<?php echo $sts; ?>'),
                    $la = '<?php echo $la; ?>',
                    $ra = '<?php echo $ra; ?>',
                    $defArr = '<?php echo $arr; ?>',
                    $defAtp = '<?php echo $atp; ?>',
                    $hot = parseInt('<?php echo $hot; ?>'),
                    $spvot = parseInt('<?php echo $spvot; ?>'),
                    $stsot = parseInt('<?php echo $stsot; ?>'),
                    $defArrot = '<?php echo $arrot; ?>',
                    $hom = parseInt('<?php echo $hom; ?>'),
                    $spvom = parseInt('<?php echo $spvom; ?>')
                    $stsom = parseInt('<?php echo $stsom; ?>')
                    $defArrom = '<?php echo $arrom; ?>';
                    if ($defArr == 'true') {
                      $arr = true;
                    }else {
                      $arr = false;
                    }

                    if ($defAtp == 'true') {
                      $atp = true;
                    }else {
                      $atp = false;
                    }
                    if ($defArrot == 'true') {
                      $arrot = true;
                    }else {
                      $arrot = false;
                    }
                    if ($defArrom == 'true') {
                      $arrom = true;
                    }else {
                      $arrom = false;
                    }

                  $('.wcba-slides-' + $sliderId + '').slick({
                    slidesToShow: $svp,
                    slidesToScroll: $sts,
                    arrows: $arr,
                    autoplay: $atp,
                    autoplaySpeed: 2000,
                    prevArrow : '<img class="wcba-slider-controls wcba-left-arrow" src="'+ $la +'" alt="Left arrow" />',
                    nextArrow : '<img class="wcba-slider-controls wcba-right-arrow" src="'+ $ra +'" alt="Left arrow" />',
                    responsive: [
                              {
                                breakpoint: 768,
                                settings: {
                                  slidesToShow: $spvot,
                                  slidesToScroll: $stsot,
                                  arrows: $arrot
                                }
                              },
                              {
                                breakpoint: 480,
                                settings: {
                                  slidesToShow: $spvom,
                                  slidesToScroll: $stsom,
                                  arrows: $arrom
                                }
                              },
                            ]
                  });
              });
            </script>
            <style media="screen">
              @media only screen and (min-width: 769px ){

                .wcba-slides-<?php echo $atts['slider_id']; ?> .slick-slide img{
                  object-fit: <?php echo $ifm; ?>;
                }

                .wcba-slides-<?php echo $atts['slider_id']; ?> .slick-slide{
                  max-height: <?php echo $sh; ?>px;
                  height: 100vh;
                }
              }

              @media only screen and (max-width: 768px){
                .wcba-slides-<?php echo $atts['slider_id']; ?> .slick-slide{
                  max-height: <?php echo $hot; ?>px;
                  height: 100vh;
                }
              }

              @media only screen and (max-width: 480px){
                .wcba-slides-<?php echo $atts['slider_id']; ?> .slick-slide{
                  max-height: <?php echo $hom; ?>px;
                  height: 100vh;
                }
              }
            </style>
          <?php }
          else
          { ?>
            <script type="text/javascript">
              jQuery(document).ready(function($){
                var $sliderId = '<?php echo $atts['slider_id']; ?>',
                    $svp = parseInt('<?php echo $spv; ?>'),
                    $sts = parseInt('<?php echo $sts; ?>'),
                    $la = '<?php echo $la; ?>',
                    $ra = '<?php echo $ra; ?>',
                    $defArr = '<?php echo $arr; ?>',
                    $defAtp = '<?php echo $atp; ?>';
                    responsive = '<?php echo responsive; ?>';
                    if ($defArr == 'true') {
                      $arr = true;
                    }else {
                      $arr = false;
                    }

                    if ($defAtp == 'true') {
                      $atp = true;
                    }else {
                      $atp = false;
                    }

                $('.wcba-slides-' + $sliderId + '').slick({
                    slidesToShow: $svp,
                    slidesToScroll: $sts,
                    arrows: $arr,
                    autoplay: $atp,
                    autoplaySpeed: 2000,
                    prevArrow : '<img class="wcba-slider-controls wcba-left-arrow" src="'+ $la +'" alt="Left arrow" />',
                    nextArrow : '<img class="wcba-slider-controls wcba-right-arrow" src="'+ $ra +'" alt="Left arrow" />',
                  });
              });
            </script>
            <style media="screen">
                .wcba-slides-<?php echo $atts['slider_id']; ?> .slick-slide img{
                  object-fit: <?php echo $ifm; ?>;
                }

                .wcba-slides-<?php echo $atts['slider_id']; ?> .slick-slide{
                  max-height: <?php echo $sh; ?>px;
                  height: 100vh;
                }
            </style>
          <?php }

        ?>

           <?php // repeater field call
           if( have_rows('slide') ): ?>
  	  			<ul class="wcba-slides-<?php echo $atts['slider_id']; ?> uk-padding-remove uk-margin-remove">

  	  			<?php while( have_rows('slide') ): the_row();
              $i++;
  	  				// vars
  	  				$image = get_sub_field('slide_image');
  	  				$link = get_sub_field('slide_link');

  	  				?>

  	  				<li class="slide" style="padding: 0 <?php echo $sg/2 ?>px;">

  	  					<?php if( $link ): ?>
  	  						<a href="<?php echo $link; ?>">
  	  					<?php endif; ?>

  	  						<img src="<?php echo $image; ?>" alt="slide-<?php echo $i; ?>" />

  	  					<?php if( $link ): ?>
  	  						</a>
  	  					<?php endif; ?>

  	  				    <?php echo $content; ?>

  	  				</li>

  	  			<?php endwhile; ?>

  	  			</ul>

  	  		<?php endif;
          // repeater field call ends

	  	}
	  } else {
	  	echo "<h2>Sorry there're no slides found in this slider</h2>";
	  }

	  // Restore original Post Data
	  wp_reset_postdata();

    ?>



    <?php return '<div class="wcba-slider-wrapper">'.ob_get_clean().'</div>';
}
add_shortcode( 'wcba-slider', 'wcbagency_slider' );



if(class_exists('WcbaSlidePlugin'))
{
    // instantiate the plugin class
    $plugin = new WcbaSlidePlugin();
}
