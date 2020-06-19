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

        global $product;
        $product_name = $product;
        global $woocommerce;
        $items = $woocommerce->cart->get_cart();

        $relevent_product_array = array();
        foreach($items as $item) {
            $decoded = json_decode($item['data']); // decode due to private objects
            if ($decoded->slug !== $product_name){
                continue;
            }
            array_push($relevent_product_array, $item);
        }
        echo '<div class="wcba-previous-cart-item-variation" style="display: none">';
        $numItems = count($relevent_product_array);
        $i = 0;
        foreach($relevent_product_array as $item) {
            if(++$i === $numItems) {
                foreach($item['variation'] as $variation) {
                    echo '<input type="hidden" data-variation="'.$variation.'">';
                }
            }
        }
        echo '</div>';


get_header( 'shop' ); ?>

    <div class="wcba-item-cart-text">
        <p><?php the_field('if_item_exist_in_cart_text', 'option'); ?></p>
    </div>

	<!--single product full width header -->
	<div id="page-header-wrap" data-animate-in-effect="none" data-midnight="light" class="" style="height: 650px; margin-top: 0;">
		<div class="" data-animate-in-effect="none" id="page-header-bg" data-midnight="light" data-text-effect="none" data-bg-pos="center" data-alignment="center" data-alignment-v="middle" data-parallax="0" data-height="650" style="background-color: rgb(0, 0, 0); height: 650px; overflow: visible;">
            <?php
            $product_banner = get_field('product_banner');
            $product_banner_url = $product_banner['url'];
            if( !empty($product_banner_url) ): ?>
				<div class="page-header-bg-image" style="background-image: url('<?php echo $product_banner_url; ?>');"></div>
					<div class="container">
						<div class="row" style="top: 0; visibility: visible;">
							<div class="col span_6">
								<div class="inner-wrap">
									<h1><?php the_title(); ?></h1>
									<span class="subheader"><?php echo get_field('shop_subheading'); ?></span>
								</div>
							</div>
						</div>
					</div>
			<?php endif; ?>
		</div>
	</div>
	<!--single product full width header ends-->



    <?php
    $classes = get_body_class();
    if (!in_array('postid-2945',$classes)) {
    ?>
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

    <?php
    }
    else {
    ?>
        <div class="container-wrap" style="opacity: 1; margin-top: 0px; padding-top: 30px;">
            <div class="container main-content">
                <div class="row">
                    <div class="wcba-accessories-page-subheader">
                        <?php
                        $field = get_field('subheader_text');
                        ?>
                        <h3><?php echo $field; ?></h3>
                        <img data-shadow="none" data-shadow-direction="middle" class="img-with-animation  animated-in" data-delay="0" height="100" width="100" data-animation="fade-in" src="/wp-content/uploads/2015/04/golden-separator.svg" alt="" style="opacity: 1;">
                    </div>

        <ul class="products" data-product-style="classic"><?php
        $args = array(
            'post_type' => 'product',
            'tax_query' => array(                     //(array) - use taxonomy parameters (available with Version 3.1).

                array(
                    'taxonomy' => 'product_cat',                //(string) - Taxonomy.
                    'field' => 'slug',                    //(string) - Select taxonomy term by ('id' or 'slug')
                    'terms' => array( 'accessory' ),    //(int/string/array) - Taxonomy term(s).
                    'include_children' => true,           //(bool) - Whether or not to include children for hierarchical taxonomies. Defaults to true.
                    'operator' => 'IN'                    //(string) - Operator to test. Possible values are 'IN', 'NOT IN', 'AND'.
                )
            ),
        );

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
        //        echo the_post_thumbnail('shop_catalog');
                $shop_image = get_field( "shop_page_image" );
                echo '<img src="'.$shop_image.'" />';
                echo '</a>';
                echo '</div>';
                echo '<h2 class="woocommerce-loop-product__title">' . get_the_title() . '</h2>';
                echo '<div class="product-divider">
                    <img src="/wp-content/uploads/2015/05/golden-arrow.svg" alt="">
                    </div>';
                echo '<a class="shop-cta" href="'.$permalink.'">Customize Now</a>';
                echo '</li>';
            }

            /* Restore original Post Data */
            wp_reset_postdata();

        } else {
            // no posts found
        }
        ?>
            </ul>
            <div class="wcba-accessories-page-subfooter">
                <img src="/wp-content/uploads/2015/04/golden-separator2.svg" alt="">
                <p id="stylish" style="text-align: center;">Dress Sharp – Look Sharp – Feel Sharp</p>
            </div>
        </div>
        </div>
        </div>


        <?php
    }
    ?> <!-- // End of check for bodyclass -->

<?php get_footer( 'shop' );
/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
