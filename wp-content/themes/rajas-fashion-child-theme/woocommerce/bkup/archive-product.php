<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
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
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 * @hooked WC_Structured_Data::generate_website_data() - 30
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

    <header class="woocommerce-products-header">

		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

			<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>

		<?php endif; ?>

		<?php
			/**
			 * woocommerce_archive_description hook.
			 *
			 * @hooked woocommerce_taxonomy_archive_description - 10
			 * @hooked woocommerce_product_archive_description - 10
			 */
			do_action( 'woocommerce_archive_description' );
		?>

    </header>

<ul class="products" data-product-style="classic">
<?php
$args = array( 'post_type' => 'product' );

// The Query
$the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ) {

    while ( $the_query->have_posts() ) {
        $the_query->the_post();
        echo '<li class="product type-product">';
        $permalink = get_the_permalink();
        echo '<div class="product-wrap">';
        echo '<a href="' . $permalink . '">';
        echo the_post_thumbnail();
        echo '</a>';
        echo '</div>';
        echo '<h2 class="woocommerce-loop-product__title">' . get_the_title() . '</h2>';
        echo '<div class="product-divider">
			<img src="http://rajasfashion.dev/wp-content/uploads/2015/05/golden-arrow.svg" alt="">
        	</div>';
        echo '</li>';
    }

    /* Restore original Post Data */
    wp_reset_postdata();

} else {
    // no posts found
}
?>
</ul>

	<!--Shop page acf divider-->
	<?php

	$divider = get_field('shop_page_bottom_divider', 2547 );

	if( !empty($divider) ): ?>

		<img src="<?php echo $divider['url']; ?>" alt="<?php echo $divider['alt']; ?>" />

	<?php endif; ?>
	<!--Shop page acf divider ends-->
	<!--Shop page acf footer slogan-->
	<p id="stylish" style="text-align: center;"><?php echo the_field('rajas_slogan', 2547); ?></p>
	<!--Shop page acf footer slogan ends-->
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

<?php get_footer( 'shop' ); ?>
