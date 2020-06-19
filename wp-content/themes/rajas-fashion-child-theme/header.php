<!doctype html>
<html <?php language_attributes(); ?>>
<head>

<!-- Google Tag Manager -->
<!--<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':-->
<!--new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],-->
<!--j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=-->
<!--'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);-->
<!--})(window,document,'script','dataLayer','GTM-TLW3S4');</script>-->
<!-- End Google Tag Manager -->

<meta name="google-site-verification" content="hN3-Asqevddgy4jz3rYUtsX2t5-aXVZSJfaygy4hTiw" />

<!-- Meta Tags -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<?php $options = get_option('salient'); ?>

<?php if(!empty($options['responsive']) && $options['responsive'] == 1) { ?>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />

<?php } else { ?>
	<meta name="viewport" content="width=1200" />
<?php } ?>

<!--Shortcut icon-->
<?php if(!empty($options['favicon'])) { ?>
	<link rel="shortcut icon" href="<?php echo nectar_options_img($options['favicon']); ?>" />
<?php } ?>


<title> <?php wp_title("|",true, 'right'); ?> <?php if (!defined('WPSEO_VERSION')) { bloginfo('name'); } ?></title>

<?php wp_head(); ?>

<!--google fonts -->
<link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>

<!-- <script type='text/javascript' src='http://www.agencyclients.com/wp-content/themes/rajas-fashion-child-theme/js/init.js'></script> -->

<?php if(is_home() || is_front_page()){ ?>
<script type="application/ld+json">
{ "@context" : "http://schema.org",
"@type" : "ProfessionalService",
"geo": {
"@type": "GeoCoordinates",
"latitude": "13.739985",
"longitude": "100.555982"
},
"name" : "Raja's Fashions",
"image" : "http://www.rajasfashions.com/wp-content/uploads/2015/04/Logo.png",
"description" : "Bangkok's premier gentleman's tailor. In business for 52 years, we have produced bespoke
menswear for business leaders, diplomats and military professionals from across the world.",
"address" : { "@type" : "PostalAddress",
"addressCountry" : "TH",
"addressLocality" : "Bangkok",
"postalCode" : "10110",
"streetAddress" : "160 Sukhumvit Road, Khwaeng Khlong Toei, Khet Khlong Toei"
},
"telephone" : "+66 (0) 2253 8379",
"url" : "http://www.rajasfashions.com",
"logo" : "http://www.rajasfashions.com/wp-content/uploads/2015/04/Logo.png",
"sameAs" : ["https://www.facebook.com/rajasfashions",
"https://www.linkedin.com/in/bobbygulati",
"https://www.instagram.com/rajasfashions/",
"https://plus.google.com/+RajasFashions",
"https://www.youtube.com/user/rajasfashions"]
}
</script>
<?php } ?>
<link rel="stylesheet" href="/wp-content/themes/rajas-fashion-child-theme/pignose.calendar.min.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<script src="/wp-content/themes/rajas-fashion-child-theme/pignose.calendar.full.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js"></script>
</head>

<?php
 global $post;
 global $woocommerce;

if($woocommerce && is_shop() || $woocommerce && is_product_category() || $woocommerce && is_product_tag()) {
	$header_title = get_post_meta(woocommerce_get_page_id('shop'), '_nectar_header_title', true);
	$header_bg = get_post_meta(woocommerce_get_page_id('shop'), '_nectar_header_bg', true);
	$header_bg_color = get_post_meta(woocommerce_get_page_id('shop'), '_nectar_header_bg_color', true);
}
else if(is_home() || is_archive()){
	$header_title = get_post_meta(get_option('page_for_posts'), '_nectar_header_title', true);
	$header_bg = get_post_meta(get_option('page_for_posts'), '_nectar_header_bg', true);
	$header_bg_color = get_post_meta(get_option('page_for_posts'), '_nectar_header_bg_color', true);
}  else {
	$header_title = get_post_meta($post->ID, '_nectar_header_title', true);
	$header_bg = get_post_meta($post->ID, '_nectar_header_bg', true);
	$header_bg_color = get_post_meta($post->ID, '_nectar_header_bg_color', true);
}

//check if parallax nectar slider is being used
$parallax_nectar_slider = using_nectar_slider();
$force_effect = get_post_meta($post->ID, '_force_transparent_header', true);

//header vars
$logo_class = (!empty($options['use-logo']) && $options['use-logo'] == '1') ? null : 'class="no-image"';
$sideWidgetArea = (!empty($options['header-slide-out-widget-area'])) ? $options['header-slide-out-widget-area'] : 'off';
$fullWidthHeader = (!empty($options['header-fullwidth']) && $options['header-fullwidth'] == '1') ? 'true' : 'false';
$headerSearch = (!empty($options['header-disable-search']) && $options['header-disable-search'] == '1') ? 'false' : 'true';
$headerFormat = (!empty($options['header_format'])) ? $options['header_format'] : 'default';
$fullWidthHeader = (!empty($options['header-fullwidth']) && $options['header-fullwidth'] == '1') ? 'true' : 'false';
$headerColorScheme = (!empty($options['header-color'])) ? $options['header-color'] : 'light';
$userSetBG = (!empty($options['header-background-color']) && $headerColorScheme == 'custom') ? $options['header-background-color'] : '#ffffff';
if($headerColorScheme == 'dark') { $userSetBG = '#1f1f1f'; }

if($headerFormat == 'centered-menu-under-logo') $fullWidthHeader = 'false';

?>

<body <?php body_class(); ?> data-header-inherit-rc="<?php echo (!empty($options['header-inherit-row-color']) && $options['header-inherit-row-color'] == '1') ? "true" : "false"; ?>" data-header-search="<?php echo $headerSearch; ?>" data-animated-anchors="<?php echo (!empty($options['one-page-scrolling']) && $options['one-page-scrolling'] == '1') ? 'true' : 'false'; ?>" data-ajax-transitions="<?php echo (!empty($options['ajax-page-loading']) && $options['ajax-page-loading'] == '1') ? 'true' : 'false'; ?>" data-full-width-header="<?php echo $fullWidthHeader; ?>" data-slide-out-widget-area="<?php echo ($sideWidgetArea == '1') ? 'true' : 'false';  ?>" data-loading-animation="<?php echo (!empty($options['loading-image-animation'])) ? $options['loading-image-animation'] : 'none'; ?>" data-bg-header="<?php echo (!empty($header_bg) || !empty($header_bg_color) || !empty($header_title) || $parallax_nectar_slider == 1 || $force_effect == 'on') ? 'true' : 'false'; ?>" data-ext-responsive="<?php echo (!empty($options['responsive']) && $options['responsive'] == 1 && !empty($options['ext_responsive']) && $options['ext_responsive'] == '1') ? 'true' : 'false'; ?>" data-header-resize="<?php if(!empty($options['header-resize-on-scroll'])) { echo $options['header-resize-on-scroll']; } else { echo '0'; } ?>" data-header-color="<?php echo (!empty($options['header-color'])) ? $options['header-color'] : 'light' ; ?>" <?php echo (!empty($options['transparent-header']) && $options['transparent-header'] == '1') ? null : 'data-transparent-header="false"'; ?> data-smooth-scrolling="<?php echo $options['smooth-scrolling']; ?>" data-responsive="<?php echo (!empty($options['responsive']) && $options['responsive'] == 1) ? '1'  : '0' ?>" >

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-67148966-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-67148966-1');
</script>



<?php if(!empty($options['boxed_layout']) && $options['boxed_layout'] == '1') { echo '<div id="boxed">'; } ?>

<?php $using_secondary = (!empty($options['header_layout'])) ? $options['header_layout'] : ' ';

if($using_secondary == 'header_with_secondary') { ?>

	<div id="header-secondary-outer" data-full-width="<?php echo (!empty($options['header-fullwidth']) && $options['header-fullwidth'] == '1') ? 'true' : 'false' ; ?>">
		<div class="container">
			<nav>




				<?php if(!empty($options['enable_social_in_header']) && $options['enable_social_in_header'] == '1') { ?>
					<ul id="social">
						<?php  if(!empty($options['use-twitter-icon-header']) && $options['use-twitter-icon-header'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['twitter-url']; ?>"><i class="icon-twitter"></i> </a></li> <?php } ?>
						<?php  if(!empty($options['use-facebook-icon-header']) && $options['use-facebook-icon-header'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['facebook-url']; ?>"><i class="icon-facebook"></i> </a></li> <?php } ?>
						<?php  if(!empty($options['use-vimeo-icon-header']) && $options['use-vimeo-icon-header'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['vimeo-url']; ?>"><i class="icon-vimeo"></i> </a></li> <?php } ?>
						<?php  if(!empty($options['use-pinterest-icon-header']) && $options['use-pinterest-icon-header'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['pinterest-url']; ?>"><i class="icon-pinterest"></i> </a></li> <?php } ?>
						<?php  if(!empty($options['use-linkedin-icon-header']) && $options['use-linkedin-icon-header'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['linkedin-url']; ?>"><i class="icon-linkedin"></i> </a></li> <?php } ?>
						<?php  if(!empty($options['use-youtube-icon-header']) && $options['use-youtube-icon-header'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['youtube-url']; ?>"><i class="icon-youtube"></i> </a></li> <?php } ?>
						<?php  if(!empty($options['use-tumblr-icon-header']) && $options['use-tumblr-icon-header'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['tumblr-url']; ?>"><i class="icon-tumblr"></i> </a></li> <?php } ?>
						<?php  if(!empty($options['use-dribbble-icon-header']) && $options['use-dribbble-icon-header'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['dribbble-url']; ?>"><i class="icon-dribbble"></i> </a></li> <?php } ?>
						<?php  if(!empty($options['use-rss-icon-header']) && $options['use-rss-icon-header'] == 1) { ?> <li><a target="_blank" href="<?php echo (!empty($options['rss-url'])) ? $options['rss-url'] : get_bloginfo('rss_url'); ?>"><i class="icon-rss"></i> </a></li> <?php } ?>
						<?php  if(!empty($options['use-github-icon-header']) && $options['use-github-icon-header'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['github-url']; ?>"><i class="icon-github-alt"></i></a></li> <?php } ?>
						<?php  if(!empty($options['use-behance-icon-header']) && $options['use-behance-icon-header'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['behance-url']; ?>"><i class="icon-be"></i> </a></li> <?php } ?>
						<?php  if(!empty($options['use-google-plus-icon-header']) && $options['use-google-plus-icon-header'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['google-plus-url']; ?>"><i class="icon-google-plus"></i> </a></li> <?php } ?>
						<?php  if(!empty($options['use-instagram-icon-header']) && $options['use-instagram-icon-header'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['instagram-url']; ?>"><i class="icon-instagram"></i></a></li> <?php } ?>
						<?php  if(!empty($options['use-stackexchange-icon-header']) && $options['use-stackexchange-icon-header'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['stackexchange-url']; ?>"><i class="icon-stackexchange"></i></a></li> <?php } ?>
						<?php  if(!empty($options['use-soundcloud-icon-header']) && $options['use-soundcloud-icon-header'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['soundcloud-url']; ?>"><i class="icon-soundcloud"></i></a></li> <?php } ?>
						<?php  if(!empty($options['use-flickr-icon-header']) && $options['use-flickr-icon-header'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['flickr-url']; ?>"><i class="icon-flickr"></i></a></li> <?php } ?>
						<?php  if(!empty($options['use-spotify-icon-header']) && $options['use-spotify-icon-header'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['spotify-url']; ?>"><i class="icon-salient-spotify"></i></a></li> <?php } ?>
						<?php  if(!empty($options['use-vk-icon-header']) && $options['use-vk-icon-header'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['vk-url']; ?>"><i class="icon-vk"></i></a></li> <?php } ?>
						<?php  if(!empty($options['use-vine-icon-header']) && $options['use-vine-icon-header'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['vine-url']; ?>"><i class="fa-vine"></i></a></li> <?php } ?>
					</ul>
				<?php } ?>

				<?php if(has_nav_menu('secondary_nav')) { ?>
					<ul class="sf-menu">
				   	   <?php wp_nav_menu( array('walker' => new Nectar_Arrow_Walker_Nav_Menu, 'theme_location' => 'secondary_nav', 'container' => '', 'items_wrap' => '%3$s' ) ); ?>
				    </ul>
				<?php }	?>

			</nav>
		</div>
	</div>

<?php } ?>


<!-- Google Tag Manager (noscript) -->
<!--<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TLW3S4"-->
<!--height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>-->
<!-- End Google Tag Manager (noscript) -->

<div id="header-space"></div>

<?php
	// header transparent option
	$transparency_markup = null;
	$activate_transparency = null;

	$using_fw_slider = using_nectar_slider();
    $using_fw_slider = (!empty($options['transparent-header']) && $options['transparent-header'] == '1') ? $using_fw_slider : 0;
    if($force_effect == 'on') $using_fw_slider = '1';
    $disable_effect = get_post_meta($post->ID, '_disable_transparent_header', true);

	if(!empty($options['transparent-header']) && $options['transparent-header'] == '1') {

		$starting_color = (empty($options['header-starting-color'])) ? '#ffffff' : $options['header-starting-color'];
		$activate_transparency = using_page_header($post->ID);
		$remove_border = (!empty($options['header-remove-border']) && $options['header-remove-border'] == '1') ? 'true' : 'false';
		$transparency_markup = ($activate_transparency == 'true') ? 'data-transparent-header="true" data-remove-border="'.$remove_border.'" class="transparent"' : null ;
	}

?>



<div id="header-outer" data-has-menu="<?php echo (has_nav_menu('top_nav')) ? 'true' : 'false'; ?>" <?php echo $transparency_markup; ?> data-user-set-bg="<?php echo $userSetBG; ?>" data-format="<?php echo $headerFormat; ?>" data-cart="<?php echo ($woocommerce && !empty($options['enable-cart']) && $options['enable-cart'] == '1') ? 'true': 'false';?>" data-transparency-option="<?php if($disable_effect == 'on') { echo '0'; } else { echo $using_fw_slider; } ?>" data-shrink-num="<?php echo (!empty($options['header-resize-on-scroll-shrink-num'])) ? $options['header-resize-on-scroll-shrink-num'] : 6; ?>" data-full-width="<?php echo $fullWidthHeader; ?>" data-using-secondary="<?php echo ($using_secondary == 'header_with_secondary') ? '1' : '0'; ?>" data-using-logo="<?php if(!empty($options['use-logo'])) echo $options['use-logo']; ?>" data-logo-height="<?php if(!empty($options['logo-height'])) echo $options['logo-height']; ?>" data-padding="<?php echo (!empty($options['header-padding'])) ? $options['header-padding'] : "28"; ?>" data-header-resize="<?php if(!empty($options['header-resize-on-scroll'])) echo $options['header-resize-on-scroll']; ?>">

	<!-- topbar-announcement -->
	<!--<div class="topbar"><a class="event-name" href="/golf">28th Annual Raja's Fashions Charity Golf Tournament</a> | WEDNESDAY 19th FEBRUARY 2020 | <a href="/play-form">Play</a> | <a href="/sponsorship-register">Sponsor</a> | <a href="/donation">Donate</a>
	</div>-->
	<!-- end of topbar-announcement -->

	<?php if(empty($options['theme-skin'])) {
		get_template_part('includes/header-search');
	}
	elseif(!empty($options['theme-skin']) && $options['theme-skin'] != 'ascend')  {
		 get_template_part('includes/header-search');
	} ?>

	<header id="top">

		<div class="container">

			<div class="row">

				<div class="col span_3">

					<a id="logo" href="<?php echo home_url(); ?>" <?php echo $logo_class; ?>>

						 <?php //if(!empty($options['use-logo'])) {

						// 		$default_logo_class = (!empty($options['retina-logo'])) ? 'default-logo' : null;
						// 		$dark_default_class = (empty($options['header-starting-logo-dark'])) ? ' dark-version': null;

						// 		 echo '<img class="'.$default_logo_class. $dark_default_class.'" alt="'. get_bloginfo('name') .'" src="' . nectar_options_img($options['logo']) . '" />';

						// 		 if(!empty($options['retina-logo'])) echo '<img class="retina-logo '.$dark_default_class.'" alt="'. get_bloginfo('name') .'" src="' . nectar_options_img($options['retina-logo']) . '" />';

						// 		 //starting logo
						// 		 if($activate_transparency == 'true'){
						// 		 	 if(!empty($options['header-starting-logo'])) echo '<img class="starting-logo '.$default_logo_class.'"  alt="'. get_bloginfo('name') .'" src="' . nectar_options_img($options['header-starting-logo']) . '" />';
						// 			 if(!empty($options['header-starting-retina-logo'])) echo '<img class="retina-logo starting-logo" alt="'. get_bloginfo('name') .'" src="' . nectar_options_img($options['header-starting-retina-logo']) . '" />';

						// 			 if(!empty($options['header-starting-logo-dark'])) echo '<img class="starting-logo dark-version '.$default_logo_class.'"  alt="'. get_bloginfo('name') .'" src="' . nectar_options_img($options['header-starting-logo-dark']) . '" />';
						// 			 if(!empty($options['header-starting-retina-logo-dark'])) echo '<img class="retina-logo starting-logo dark-version " alt="'. get_bloginfo('name') .'" src="' . nectar_options_img($options['header-starting-retina-logo-dark']) . '" />';

						// 		 }

						// 	 } else { echo get_bloginfo('name'); } ?>

						<img class="default-logo dark-version" alt="Raja's Fashions" src="/wp-content/uploads/2015/04/Logo.png" style="height: 75px;">
					</a>

				</div><!--/span_3-->

				<div class="col span_9 col_last">

					<?php if(has_nav_menu('top_nav')) echo '<a href="#mobilemenu" id="toggle-nav"><i class="icon-reorder"></i></a>'; ?>

					<?php
					$sideWidgetArea = (!empty($options['header-slide-out-widget-area'])) ? $options['header-slide-out-widget-area'] : 'off';

					if (!empty($options['enable-cart']) && $options['enable-cart'] == '1') {
						if ($woocommerce) { ?>
							<!--mobile cart link-->
							<a id="mobile-cart-link" href="<?php echo esc_url( wc_get_cart_url() ); ?>"><i class="icon-salient-cart"></i></a>
						<?php }
					}

					if($sideWidgetArea == '1') { ?>
						<div class="slide-out-widget-area-toggle">
							<div> <a href="#sidewidgetarea" class="closed"> <i class="icon-reorder"></i> </a> </div>
       					</div>
					<?php } ?>



					<nav>
						<ul class="buttons">
							<li id="search-btn"><div><a href="#searchbox"><span class="icon-salient-search" aria-hidden="true"></span></a></div> </li>

							<?php if($sideWidgetArea == '1') { ?>
								<li class="slide-out-widget-area-toggle">
									<div> <a href="#sidewidgetarea" class="closed"> <span> <i class="lines-button x2"> <i class="lines"></i> </i> </span> </a> </div>
       							</li>
							<?php } ?>
						</ul>
						<ul class="sf-menu">
							<?php
							if(has_nav_menu('top_nav')) {
							    wp_nav_menu( array('walker' => new Nectar_Arrow_Walker_Nav_Menu, 'theme_location' => 'top_nav', 'container' => '', 'items_wrap' => '%3$s' ) );
							}
							elseif($sideWidgetArea != '1') {
								echo '<li><a href="">No menu assigned!</a></li>';
							}
							?>


                            <?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
                                $count = WC()->cart->cart_contents_count;
                                ?>
<!--                                <a class="cart-contents" href="--><?php //echo WC()->cart->get_cart_url(); ?><!--" title="--><?php //_e( 'View your shopping cart' ); ?><!--">-->
<!--                            --><?php //if ( $count > 0 ) {?>
                                <li style="height: 50px;">
                                    <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php _e( 'View your shopping cart' ); ?>">
                                        <div class="have-cart-item">
																					<!--<img src="/wp-content/uploads/2017/07/2772.svg">-->
																					<span class="get-q">Get a Quote</span>
                                    <?php
                                    if ( $count > 0 ) {
                                        ?>
<!--                                        <span class="cart-contents-count">--><?php //echo esc_html( $count ); ?><!--</span>-->
                                            <div></div>
                                        <?php
                                    }
//                                    else {
//                                        ?><!--<p>asd</p>--><?php
//                                    }
                                    ?>
                                        </div>
                                    </a>
                                </li>
<!--                            --><?php //} ?>
                            <?php } ?>


						</ul>



					</nav>

				</div><!--/span_9-->

			</div><!--/row-->

		</div><!--/container-->

	</header>


	<?php if (!empty($options['enable-cart']) && $options['enable-cart'] == '1') { ?>
		<?php
		if ($woocommerce) { ?>

		<div class="cart-outer">
			<div class="cart-menu-wrap">
				<div class="cart-menu">
					<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>"><div class="cart-icon-wrap"><i class="icon-salient-cart"></i> <div class="cart-wrap"><span><?php echo $woocommerce->cart->cart_contents_count; ?> </span></div> </div></a>
				</div>
			</div>

			<div class="cart-notification">
				<span class="item-name"></span> <?php echo __('was successfully added to your cart.', NECTAR_THEME_NAME); ?>
			</div>

			<?php
				// Check for WooCommerce 2.0 and display the cart widget
				if ( version_compare( WOOCOMMERCE_VERSION, "2.0.0" ) >= 0 ) {
					the_widget( 'WC_Widget_Cart', 'title= ' );
				} else {
					the_widget( 'WooCommerce_Widget_Cart', 'title= ' );
				}
			?>

		</div>

	 <?php }

   }


   echo '<div class="ns-loading-cover"></div>';

   ?>


</div><!--/header-outer-->

<?php if(!empty($options['theme-skin']) && $options['theme-skin'] == 'ascend') { get_template_part('includes/header-search'); } ?>

<div id="mobile-menu">

	<div class="container">
		<ul>
			<?php
				if(has_nav_menu('top_nav')) {

				    wp_nav_menu( array('theme_location' => 'top_nav', 'menu' => 'Top Navigation Menu', 'container' => '', 'items_wrap' => '%3$s' ) );

					echo '<li id="mobile-search">
					<form action="'.home_url().'" method="GET">
			      		<input type="text" name="s" value="" placeholder="'.__('Search..', NECTAR_THEME_NAME) .'" />
					</form>
					</li>';
				}
				else {
					echo '<li><a href="">No menu assigned!</a></li>';
				}
			?>
			<!--custom Woocommerce cart item-->
			<?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
					$count = WC()->cart->cart_contents_count;
					?>
<!--                                <a class="cart-contents" href="--><?php //echo WC()->cart->get_cart_url(); ?><!--" title="--><?php //_e( 'View your shopping cart' ); ?><!--">-->
<!--                            --><?php //if ( $count > 0 ) {?>
					<li style="height: 50px;">
							<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php _e( 'View your shopping cart' ); ?>">
									<div class="have-cart-item">
										<!--<img src="/wp-content/uploads/2017/07/2772.svg">-->
										<span class="get-q">Get a Quote</span>
							<?php
							if ( $count > 0 ) {
									?>
<!--                                        <span class="cart-contents-count">--><?php //echo esc_html( $count ); ?><!--</span>-->
											<div></div>
									<?php
							}
//                                    else {
//                                        ?><!--<p>asd</p>--><?php
//                                    }
							?>
									</div>
							</a>
					</li>
<!--                            --><?php //} ?>
			<?php } ?>
		</ul>
	</div>

</div>


<div id="ajax-loading-screen" data-method="<?php echo (!empty($options['transition-method'])) ? $options['transition-method'] : 'ajax' ; ?>"><span class="loading-icon <?php echo (!empty($options['loading-image-animation']) && !empty($options['loading-image'])) ? $options['loading-image-animation'] : null; ?>"> <?php if(empty($options['loading-image'])) { if(!empty($options['theme-skin']) && $options['theme-skin'] == 'ascend') { echo '<span class="default-loading-icon spin"></span>'; } else { echo '<span class="default-skin-loading-icon"></span>'; } } ?> </span></div>
<div id="ajax-content-wrap">
