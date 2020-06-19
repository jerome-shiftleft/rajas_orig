<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>
	<!--single product full width header -->
	<div id="page-header-wrap" data-animate-in-effect="none" data-midnight="light" class="" style="height: 650px; margin-top: 0;">	    		<div class="" data-animate-in-effect="none" id="page-header-bg" data-midnight="light" data-text-effect="none" data-bg-pos="center" data-alignment="center" data-alignment-v="middle" data-parallax="0" data-height="650" style="background-color: rgb(0, 0, 0); height: 650px; overflow: visible;">
            <?php
            $product_banner = get_field('product_banner');
            $product_banner_url = $product_banner['url'];
            if( !empty($product_banner_url) ): ?>
				<div class="page-header-bg-image" style="background-image: url('<?php echo $product_banner_url; ?>');">
					<div class="container">
						<div class="row" style="top: 0; visibility: visible;">
							<div class="col span_6" style="top: 52.25px;">
								<div class="inner-wrap">
									<h1><?php the_title(); ?></h1>
									<span class="subheader"><?php echo get_field('shop_subheading'); ?></span>
								</div>

							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<!--single product full width header ends-->
	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>

<?php get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
