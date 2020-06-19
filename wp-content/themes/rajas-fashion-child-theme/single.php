<?php get_header(); ?>

<?php

global $nectar_theme_skin, $options;

$bg = get_post_meta($post->ID, '_nectar_header_bg', true);
$bg_color = get_post_meta($post->ID, '_nectar_header_bg_color', true);
$fullscreen_header = (!empty($options['blog_header_type']) && $options['blog_header_type'] == 'fullscreen' && is_singular('post')) ? true : false;
$fullscreen_class = ($fullscreen_header == true) ? "fullscreen-header full-width-content" : null;
$theme_skin = (!empty($options['theme-skin']) && $options['theme-skin'] == 'ascend') ? 'ascend' : 'default';
$hide_sidebar = (!empty($options['blog_hide_sidebar'])) ? $options['blog_hide_sidebar'] : '0';
$blog_type = $options['blog_type'];

if(have_posts()) : while(have_posts()) : the_post();

	nectar_page_header($post->ID);

endwhile; endif;



 if($fullscreen_header == true) {

	if(empty($bg) && empty($bg_color)) { ?>
		<div class="not-loaded default-blog-title fullscreen-header" id="page-header-bg" data-alignment="center" data-parallax="0" data-height="450" style="height: 450px;">
			<div class="container">
				<div class="row">
					<div class="col span_6 section-title blog-title">
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<div class="author-section">
						 	<span class="meta-author vcard author">
						 		<?php if (function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email'), 100 ); }?>
						 	</span>
							 <div class="avatar-post-info">
							 	<span class="fn"><?php the_author_posts_link(); ?></span>
							 	<span class="meta-date date updated"><i><?php echo get_the_date(); ?></i></span>
							 </div>
						</div>
					</div>
				</div>
			</div>
			<a href="#" class="section-down-arrow"><i class="icon-salient-down-arrow icon-default-style"> </i></a>
		</div>
	<?php }


	if($theme_skin != 'ascend') { ?>
		<div class="container">
			<div id="single-below-header" class="<?php echo $fullscreen_class; ?> custom-skip">
				<span class="meta-share-count"><i class="icon-default-style steadysets-icon-share"></i> <?php echo '<a href=""><span class="share-count-total">0</span> <span class="plural">'. __('Shares',NECTAR_THEME_NAME) . '</span> <span class="singular">'. __('Share',NECTAR_THEME_NAME) .'</span></a>'; nectar_blog_social_sharing(); ?> </span>
				<span class="meta-category"><i class="icon-default-style steadysets-icon-book2"></i> <?php the_category(', '); ?></span>
				<span class="meta-comment-count"><i class="icon-default-style steadysets-icon-chat-3"></i> <a href="<?php comments_link(); ?>"><?php comments_number( __('No Comments', NECTAR_THEME_NAME), __('One Comment ', NECTAR_THEME_NAME), __('% Comments', NECTAR_THEME_NAME) ); ?></a></span>
			</div><!--/single-below-header-->
		</div>

	<?php }

 } ?>





<div class="container-wrap <?php echo ($fullscreen_header == true) ? 'fullscreen-blog-header': null; ?> <?php if($blog_type == 'std-blog-fullwidth' || $hide_sidebar == '1') echo 'no-sidebar'; ?>">

	<div class="container main-content">

		<?php if(get_post_format() != 'quote' && get_post_format() != 'status' && get_post_format() != 'aside') { ?>

			<?php if(have_posts()) : while(have_posts()) : the_post();

			    if((empty($bg) && empty($bg_color)) && $fullscreen_header != true) { ?>

					<div class="row heading-title">
						<div class="col span_12 section-title blog-title">
							<h1 class="entry-title"><?php the_title(); ?></h1>

							<div id="single-below-header">
								<span class="meta-author vcard author"><span class="fn"><?php echo __('By', NECTAR_THEME_NAME); ?> <?php the_author_posts_link(); ?></span></span>
								<?php if( !empty($options['blog_social']) && $options['blog_social'] == 1) { ?>
									<span class="meta-date date updated"><?php echo get_the_date(); ?></span>
								<?php } ?>
								<span class="meta-category"><?php the_category(', '); ?></span>
								<span class="meta-comment-count"><a href="<?php comments_link(); ?>"><?php comments_number( __('No Comments', NECTAR_THEME_NAME), __('One Comment ', NECTAR_THEME_NAME), __('% Comments', NECTAR_THEME_NAME) ); ?></a></span>

								<!--</ul>project-additional-->
							</div><!--/single-below-header-->

							<div id="single-meta" data-sharing="<?php echo ( !empty($options['blog_social']) && $options['blog_social'] == 1 ) ? '1' : '0'; ?>">
								<ul>

									<?php if( empty($options['blog_social']) || $options['blog_social'] == 0 ) { ?>

										   	<li>
										   		<?php echo '<span class="n-shortcode">'.nectar_love('return').'</span>'; ?>
										   	</li>
											<li>
												<?php echo get_the_date(); ?>
											</li>

									<?php } ?>

								</ul>

								<?php nectar_blog_social_sharing(); ?>

							</div><!--/single-meta-->
						</div><!--/section-title-->
					</div><!--/row-->

			<?php }

			endwhile; endif; ?>

		<?php } ?>

		<div class="row">

			<?php $options = get_option('salient');

			global $options;
			$exclude = get_the_ID();

			if($blog_type == 'std-blog-fullwidth' || $hide_sidebar == '1'){
				echo '<div id="post-area" class="col span_12 col_last">';
			} else {
				echo '<div id="post-area" class="col span_9">';
			}

				 if(have_posts()) : while(have_posts()) : the_post();


					if ( floatval(get_bloginfo('version')) < "3.6" ) {
						//old post formats before they got built into the core
						 get_template_part( 'includes/post-templates-pre-3-6/entry', get_post_format() );
					} else {
						//WP 3.6+ post formats
						 get_template_part( 'includes/post-templates/entry', get_post_format() );
					}

				 endwhile; endif;

				 wp_link_pages(); ?>

				 

				 	<div data-bg-mobile-hidden="" class="wpb_row vc_row-fluid vc_row full-width-section standard_section  " style="padding: 0 213px; margin-left: -213px; visibility: visible;">

				 		<div class="row-bg-wrap">
				 			<div class="row-bg  using-bg-color " id="your-crafty-border"></div>
				 		</div>


				 		<div class="col span_12 dark left">
							<div class="vc_col-sm-12 wpb_column column_container col no-extra-padding" data-padding-pos="all" data-hover-bg="" data-animation="" data-delay="0">
								<div class="wpb_wrapper">
									<div class="wpb_text_column wpb_content_element ">
										<div class="wpb_wrapper">

											<?php do_action('crafty-social-share-buttons'); ?>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- <center><img src="../wp-content/uploads/2015/04/golden-separator.svg" alt="golden-separator" width="1" height="1" class="alignnone size-medium wp-image-56" id="upper-separator" /></center> -->

					<div class="author-text">

				    <?php $options = get_option('salient');

				    if($theme_skin != 'ascend') {
						if( !empty($options['author_bio']) && $options['author_bio'] == true){
							$grav_size = 80;
							$fw_class = null;
						?>

							<div id="author-bio" class="<?php echo $fw_class; ?>">

								<div class="span_12">

									<?php if (function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email'), $grav_size ); }?>
									<div id="author-info">
										<h3><span><?php if(!empty($options['theme-skin']) && $options['theme-skin'] == 'ascend') { _e('Author', NECTAR_THEME_NAME); } else {?> <h3 id="golden-wording"><?php echo get_field('authors_wording', 'user_'.$post->post_author); ?></h3> <?php } ?></span></h3>
										<p><?php the_author_meta('description'); ?></p>
									</div>
									<?php if(!empty($options['theme-skin']) && $options['theme-skin'] == 'ascend'){ echo '<a href="'. get_author_posts_url(get_the_author_meta( 'ID' )).'" data-hover-text-color-override="#fff" data-hover-color-override="false" data-color-override="#000000" class="nectar-button see-through-2 large"> '. __("More posts by",NECTAR_THEME_NAME) . ' ' .get_the_author().' </a>'; } ?>
									<div class="clear"></div>
								</div>
							</div>


					<a href="index.php?page_id=13" class="golden-button" id="author-button">VIEW OUR CLOTHES</a>

					</div>

					<img src="../wp-content/uploads/2015/06/author-image.png" alt="author" class="author-image"/>

					<img style="margin: 0 auto; display: block;" src="../wp-content/uploads/2015/04/golden-separator2.svg" alt="golden-separator" width="1" height="1" class="alignnone size-medium wp-image-56" id="lower-separator"/>

					<h2 id="more-posts">Wait there's more...</h2>

					<?php } ?>

						<div class="comments-section">
						   <?php comments_template(); ?>
					 	</div>

					<?php } ?>

			</div><!--/span_9-->

			<?php if($blog_type != 'std-blog-fullwidth' && $hide_sidebar != '1') { ?>

				<div id="sidebar" class="col span_3 col_last">
					<?php get_sidebar(); ?>
				</div><!--/sidebar-->

			<?php } ?>

		</div><!--/row-->




		<!--ascend only author/comment positioning-->
		<div class="row comments-row">

			<?php if($theme_skin == 'ascend' && $fullscreen_header == true) { ?>

			<div id="single-below-header" class="<?php echo $fullscreen_class; ?> custom-skip">
				<span class="meta-share-count"><i class="icon-default-style steadysets-icon-share"></i> <?php echo '<a href=""><span class="share-count-total">0</span> <span class="plural">'. __('Shares',NECTAR_THEME_NAME) . '</span> <span class="singular">'. __('Share',NECTAR_THEME_NAME) .'</span> </a>'; nectar_blog_social_sharing(); ?> </span>
				<span class="meta-category"><i class="icon-default-style steadysets-icon-book2"></i> <?php the_category(', '); ?></span>
				<span class="meta-comment-count"><i class="icon-default-style steadysets-icon-chat-3"></i> <a class="comments-link" href="<?php comments_link(); ?>"><?php comments_number( __('No Comments', NECTAR_THEME_NAME), __('One Comment ', NECTAR_THEME_NAME), __('% Comments', NECTAR_THEME_NAME) ); ?></a></span>
			</div><!--/single-below-header-->

			<?php }

			if($theme_skin == 'ascend') nectar_next_post_display(); ?>

			<?php if( !empty($options['author_bio']) && $options['author_bio'] == true && $theme_skin == 'ascend'){
						$grav_size = 80;
						$fw_class = 'full-width-section ';
						$next_post = get_previous_post();
						$next_post_button = (!empty($options['blog_next_post_link']) && $options['blog_next_post_link'] == '1') ? 'on' : 'off';
					?>

						<div id="author-bio" class="<?php echo $fw_class; if(empty($next_post) || $next_post_button == 'off' || $fullscreen_header == false && $next_post_button == 'off') echo 'no-pagination'; ?>">
							<div class="span_12">
								<?php if (function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email'), $grav_size ); }?>
								<div id="author-info">
									<h3><span><?php if(!empty($options['theme-skin']) && $options['theme-skin'] == 'ascend') {  echo '<i>' . __('Author', NECTAR_THEME_NAME) . '</i>'; } else { _e('About', NECTAR_THEME_NAME); } ?></span> <?php the_author(); ?></h3>
									<p><?php the_author_meta('description'); ?></p>
								</div>
								<?php if(!empty($options['theme-skin']) && $options['theme-skin'] == 'ascend'){ echo '<a href="'. get_author_posts_url(get_the_author_meta( 'ID' )).'" data-hover-text-color-override="#fff" data-hover-color-override="false" data-color-override="#000000" class="nectar-button see-through-2 large">' . __("More posts by",NECTAR_THEME_NAME) . ' ' . get_the_author().' </a>'; } ?>
								<div class="clear"></div>
							</div>
						</div>

			 <?php } ?>


			  <?php if($theme_skin == 'ascend') { ?>

			 	 <div class="comments-section">
					   <?php comments_template(); ?>
				 </div>

			 <?php } ?>

		</div>

		<div class="custom-related-posts">
			<h2 id="contact-header">Wait, there's more...</h2>
			<?php $orig_post = $post;
							global $post;
							$categories = get_the_category($post->ID);
								if ($categories) {
							$category_ids = array();
								foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
							$args=array(
							'category__in' => $category_ids,
							'post__not_in' => array($post->ID),
							'posts_per_page'=> 3,
							'orderby' => 'date',
							'order' => 'DESC', // Number of related posts that will be shown.
							'caller_get_posts'=>1
						);
				$my_query = new wp_query( $args );
				if( $my_query->have_posts() ) {
				while( $my_query->have_posts() ) { $my_query->the_post();?>
					<div class="col span_4">
		      <article class="regular post type-post">
		            <div class="post-content">
		              <a href="<?php echo get_permalink(); ?>"><span class="post-feature-img"><?php the_post_thumbnail( 'full' ); ?></span></a>
		              <h5><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h5>
									<?php the_time('M j, Y') ?>
		              <p><?php the_excerpt(); ?></p>
		              <a href="<?php echo get_permalink(); ?>" class="read-more">Read more</a>
		            </div><!--/post-content-->
		      </article><!--/article-->
		    </div><!--/vc_col-sm-3-->

				<?php
					}

					}
				}
					$post = $orig_post; wp_reset_query(); ?>
    	</div>

	   <?php if($theme_skin != 'ascend') nectar_next_post_display(); ?>

	</div><!--/container-->

	<p id="stylish" style="text-align: center;">Dress Sharp - Look Sharp - Feel Sharp</p>

	</div><!--/container-wrap-->

<?php get_footer(); ?>