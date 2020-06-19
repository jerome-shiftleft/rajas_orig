<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
?>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
		/**
		 * woocommerce_before_single_product_summary hook.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
	?>

    <?php
    $categories = get_the_terms($post->ID, 'product_cat');
    $product_type = $categories[0];
    $product_name = $product_type->name;
    $product_name_proper = strtolower($product_name);


    echo '<div class="summary entry-summary '.$product_name_proper.'">';
    ?>


		<?php
			/**
			 * woocommerce_single_product_summary hook.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 * @hooked WC_Structured_Data::generate_product_data() - 60
			 */
			do_action( 'woocommerce_single_product_summary' );
		?>

	</div><!-- .summary -->

	<?php
		/**
		 * woocommerce_after_single_product_summary hook.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		//do_action( 'woocommerce_after_single_product_summary' );
	?>

</div><!-- #product-<?php the_ID(); ?> -->

<!--custom product information section-->
<div style="clear:both;"></div>
<div class="additional-information">
    <div class="additional-title">
        <h2>Summary of Your Order</h2>
    </div>
    <?php echo apply_filters( 'woocommerce_after_single_product_summary', $post->post_excerpt ) ?>

    <?php
    global $product;
    $attribute = $product->get_attributes();
    $attribute_arr = array();

    if( count($attribute) > 0 ){
        ?><div class="attr-container"><?php
            foreach ($attribute as $indiv => $value){
                $terms = get_terms($indiv);
                ?><div class="<?php echo $indiv ?>"><?php
                foreach ( $terms as $term ) {
                    echo "<p style='display: none' class='description " . $term->slug . "' data-valuename='". $term->slug."' data-description='".$term->description."'><span>" . $term->name; echo ": </span>"; echo $term->description . "</p>";
                }
                ?></div><?php
            }
        ?></div><?php
    }
    ?>



</div>
<!--custom product information sections ends-->
<?php do_action( 'woocommerce_after_single_product' ); ?>

<p id="stylish" style="text-align: center; margin-bottom: 40px;">Dress Sharp – Look Sharp – Feel Sharp</p>
