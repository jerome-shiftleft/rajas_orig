<?php

/**
 * Load the style sheet from the parent theme.
 *
 */

// Require for PHPWord
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/phpoffice/phpword/tests/bootstrap.php';

function theme_name_parent_styles()
{

    // Enqueue the parent stylesheet
    wp_enqueue_style('theme-name-parent-style', get_template_directory_uri() . '/style.css', array(), '0.1', 'all');

    // Enqueue the parent stylesheet
    wp_enqueue_style('theme-name-parent-responsive', get_stylesheet_directory_uri() . '/responsive.css', '0.1', 'all');

    wp_enqueue_script('wcba-custom', get_stylesheet_directory_uri() . '/js/wcba-custom.js');



    $classes = get_body_class();
    if (in_array('single-product', $classes)) {
        wp_enqueue_script('wcba-custom-filter', get_stylesheet_directory_uri() . '/js/wcba-custom-filter.js');
    }


    // Enqueue the parent rtl stylesheet
    if (is_rtl()) {
        wp_enqueue_style('theme-name-parent-style-rtl', get_template_directory_uri() . '/rtl.css', array(), '0.1', 'all');
    }

}

add_action('wp_enqueue_scripts', 'theme_name_parent_styles');

// allow theme to upload svg files

function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');


// Enqueue google font Open Sans
function load_fonts()
{
    wp_register_style('googleFonts', 'https://fonts.googleapis.com/css?family=Open+Sans:300italic,400&subset=latin,latin-ext');
    wp_enqueue_style('googleFonts');
}

add_action('wp_print_styles', 'load_fonts');

//enque google fonts
function google_fonts()
{
    $query_args = array(
        'family' => 'Oswald:400,300,700',
        'subset' => 'latin',
    );
    wp_register_style('google_fonts', add_query_arg($query_args, "//fonts.googleapis.com/css"),
        array(), null);
}

add_action('wp_enqueue_scripts', 'google_fonts');

//shortcode for contact 7

add_filter('wpcf7_form_elements', 'mycustom_wpcf7_form_elements');
function mycustom_wpcf7_form_elements($form)
{
    $form = do_shortcode($form);
    return $form;
}

//change the email sender to clients email

add_filter('wp_mail_from', 'my_mail_from');
function my_mail_from($email)
{
    return "bobby@rajasfashions.com";
}

add_filter('wp_mail_from_name', 'my_mail_from_name');

function my_mail_from_name($name)
{
    return "Raja's Fashion";
}

//dynamic copyright shortcode
function copyright_year()
{
    ob_start();
    $date = getdate();
    $site_title = get_bloginfo('name');
    $site_description = get_bloginfo('description'); ?>
    <p class="text-center">
        &copy; <?php echo $date['year']; ?> <?php echo $site_title; ?> <?php echo $site_description; ?></p>
    <?php return '<div class="copyright">' . ob_get_clean() . '</div>';
}

add_shortcode('copyright-year', 'copyright_year');

//Remove Review tab from single product, Disable product review (tab)
function woo_remove_product_tabs($tabs)
{
    //unset($tabs['description']);     			// Remove Description tab
    //unset($tabs['additional_information']);  	// Remove Additional Information tab
    unset($tabs['reviews']);                    // Remove Reviews tab

    return $tabs;
}

add_filter('woocommerce_product_tabs', 'woo_remove_product_tabs', 98);

//change add to cart text
add_filter('woocommerce_product_single_add_to_cart_text', 'woo_custom_single_add_to_cart_text');  // 2.1 +

function woo_custom_single_add_to_cart_text()
{

    return __('Add to collection', 'woocommerce');

}


// Remove prices everywhere

add_filter('woocommerce_variable_sale_price_html', 'wcba_remove_prices', 10, 2);
add_filter('woocommerce_variable_price_html', 'wcba_remove_prices', 10, 2);
add_filter('woocommerce_get_price_html', 'wcba_remove_prices', 10, 2);

function wcba_remove_prices($price, $product)
{
    $price = '';
    return $price;
}

////remove quantity from single product page
//function wcba_remove_all_quantity_fields( $return, $product ) {
//    return true;
//}
//add_filter( 'woocommerce_is_sold_individually', 'wcba_remove_all_quantity_fields', 10, 2 );
//
///**
// * Change the heading title on the "Product Description" tab section for single products.
// */
//add_filter( 'woocommerce_product_description_heading', 'wcba_product_description_heading' );

function wcba_product_description_heading()
{
    return 'Additional information';
}

// remove sku from entire site, including admin

add_filter('wc_product_sku_enabled', '__return_false');

// remove sku only from product page

//function sv_remove_product_page_skus( $enabled ) {
//    if ( ! is_admin() && is_product() ) {
//        return false;
//    }
//
//    return $enabled;
//}
//add_filter( 'wc_product_sku_enabled', 'sv_remove_product_page_skus' );

add_filter('woocommerce_product_additional_information_heading', 'isa_product_additional_information_heading');

function isa_product_additional_information_heading()
{
    echo '';
}

//Set default price 0
function wpa104760_default_price($post_id, $post)
{

    if (isset($_POST['_regular_price']) && trim($_POST['_regular_price']) == '') {
        update_post_meta($post_id, '_regular_price', '0');
    }

}

add_action('woocommerce_process_product_meta', 'wpa104760_default_price');

/**
 * Add the field to the checkout page
 */
add_action('woocommerce_after_order_notes', 'customise_checkout_field');

function measurement($img, $title, $desc)
{ ?>

    <div>
    <div>
        <img src="<?php echo $img ?>"/>
    </div>
    <div>
    <h4><?php echo $title ?></h4>
    <p><?php echo $desc ?></p>


<?php }

function posture($img, $text)
{ ?>
    <div>
        <div>
            <img src="<?php echo $img ?>"/>
        </div>
        <div>
            <h4><?php echo $text ?></h4>
        </div>
    </div>
<?php }


function customise_checkout_field($checkout)
{ ?>


    <div class="measurement-form shirt">
        <div id="customise_checkout_field">
            <div CLASS="title">
                <h2><?php __('MEASUREMENTS THAT HAVE CHANGED?') ?></h2>
                <p class="please-fill">PLEASE FILL IN YOUR MEASUREMENTS (IN INCH)</p>
                <h3>SHIRT</h3>
            </div><!--.title-->

            <?php
            measurement('http://' . $_SERVER['SERVER_NAME'] . '/wp-content/uploads/2017/10/neck.svg', 'Neck', 'Measure around your neck, keep abit of gap for your comfort level.');
            woocommerce_form_field(
                'neck_field',
                array(
                    'type' => 'text',
                    'required' => false,
                    //        'placeholder' => __('Guidence') ,
                ),
                $checkout->get_value('neck_field')); ?>
        </div><!--#customise_checkout_field-->
    </div><!--.measurement-form.shirt-->

    <?php
    measurement('http://' . $_SERVER['SERVER_NAME'] . '/wp-content/uploads/2017/10/chest.svg', 'Chest', 'Measure the largest part of the chest, under the armpits');
    woocommerce_form_field(
        'chest_field_shirt',
        array(
            'type' => 'text',
            'required' => false,
        ),
        $checkout->get_value('chest_field_shirt')); ?>
    </div>
    </div>

    <?php
    measurement('http://' . $_SERVER['SERVER_NAME'] . '/wp-content/uploads/2017/10/stomach.svg', 'Stomach', 'Measure the largest part of your stomach.');
    woocommerce_form_field(
        'stomach_field_shirt',
        array(
            'type' => 'text',
            'required' => false,
        ),
        $checkout->get_value('stomach_field_shirt')); ?>
    </div>
    </div>

    <?php
    measurement('http://' . $_SERVER['SERVER_NAME'] . '/wp-content/uploads/2017/10/hips.svg', 'Hips', 'Measure the widest point of your hips.');
    woocommerce_form_field(
        'hips_field_shirt',
        array(
            'type' => 'text',
            'required' => false,
        ),
        $checkout->get_value('hips_field_shirt')); ?>
    </div>
    </div>

    <?php measurement('http://' . $_SERVER['SERVER_NAME'] . '/wp-content/uploads/2017/10/sleeves.svg', 'Sleeves', 'Measure from one armhole to other armhole at back.');
    woocommerce_form_field(
        'sleeves_field_shirt',
        array(
            'type' => 'text',
            'required' => false,
        ),
        $checkout->get_value('sleeves_field_shirt')); ?>
    </div>
    </div>

    <?php
    measurement('http://' . $_SERVER['SERVER_NAME'] . '/wp-content/uploads/2017/10/length.svg', 'Length', 'Measure from the top of the Shoulder Seam to the desired length.');
    woocommerce_form_field(
        'length_field_shirt',
        array(
            'type' => 'text',
            'required' => false,
        ),
        $checkout->get_value('length_field_shirt')); ?>
    </div>
    </div>

    <?php
    measurement('http://' . $_SERVER['SERVER_NAME'] . '/wp-content/uploads/2017/10/shoulders.svg', 'Shoulders', 'Measure from one armhole to other armhole at back.');
    woocommerce_form_field(
        'shoulders_field_shirt',
        array(
            'type' => 'text',
            'required' => false,
        ),
        $checkout->get_value('shoulders_field_shirt')); ?>
    </div>
    </div>

    <?php
    measurement('http://' . $_SERVER['SERVER_NAME'] . '/wp-content/uploads/2017/10/biceps.svg', 'Bicep', 'Measure around the largest part of the bicep');
    woocommerce_form_field(
        'bicep_field',
        array(
            'type' => 'text',
            'required' => false,
        ),
        $checkout->get_value('bicep_field')); ?>
    </div>
    </div>
    <!--Jacket-->
    <div class="measurement-form jacket">
        <div id="customise_checkout_field">
            <div class="title">
                <h3>Jacket</h3>
            </div>

            <?php
            measurement('http://' . $_SERVER['SERVER_NAME'] . '/wp-content/uploads/2017/10/chest.svg', 'Chest', 'Measure the largest part of the chest, under the armpits');
            woocommerce_form_field(
                'chest_field_jacket',
                array(
                    'type' => 'text',
                    'required' => false,
                ),
                $checkout->get_value('chest_field_jacket')); ?>
        </div>
    </div>

    <?php
    measurement('http://' . $_SERVER['SERVER_NAME'] . '/wp-content/uploads/2017/10/stomach.svg', 'Stomach', 'Measure the largest part of your stomach');
    woocommerce_form_field(
        'stomach_field_jacket',
        array(
            'type' => 'text',
            'required' => false,
        ),
        $checkout->get_value('stomach_field_jacket')); ?>
    </div>
    </div>
    <?php
    measurement('http://' . $_SERVER['SERVER_NAME'] . '/wp-content/uploads/2017/10/hips.svg', 'Hips', 'Measure the largest part of your hips');
    woocommerce_form_field(
        'hips_field_jacket',
        array(
            'type' => 'text',
            'required' => false,
        ),
        $checkout->get_value('hips_field_jacket')); ?>
    </div>
    </div>

    <?php measurement('http://' . $_SERVER['SERVER_NAME'] . '/wp-content/uploads/2017/10/length.svg', 'Length', 'Measure from the top of the Shoulder Seam to the desired length');
    woocommerce_form_field(
        'length_field_jacket',
        array(
            'type' => 'text',
            'required' => false,
        ),
        $checkout->get_value('length_field_jacket')); ?>
    </div>
    </div>

    <?php measurement('http://' . $_SERVER['SERVER_NAME'] . '/wp-content/uploads/2017/10/front.svg', 'Front', 'Measure from one armhole to other armhole in front');
    woocommerce_form_field(
        'front_field',
        array(
            'type' => 'text',
            'required' => false,
        ),
        $checkout->get_value('front_field')); ?>
    </div>
    </div>

    <?php measurement('http://' . $_SERVER['SERVER_NAME'] . '/wp-content/uploads/2017/10/back.svg', 'Back', 'Measure from one armhole to other armhole at back');
    woocommerce_form_field(
        'back_field_jacket',
        array(
            'type' => 'text',
            'required' => false,
        ),
        $checkout->get_value('back_field_jacket')); ?>
    </div>
    </div>
    <?php
    measurement('http://' . $_SERVER['SERVER_NAME'] . '/wp-content/uploads/2017/10/sleeves.svg', 'Sleeves', 'Measure sleeves from shoulder seam to the desired length');
    woocommerce_form_field(
        'sleeves_field_jacket',
        array(
            'type' => 'text',
            'required' => false,
        ),
        $checkout->get_value('sleeves_field_jacket')); ?>
    </div>
    </div>
    <?php
    measurement('http://' . $_SERVER['SERVER_NAME'] . '/wp-content/uploads/2017/10/shoulders.svg', 'Shoulders', 'Measure from the end of the right shoulder to the end of the left shoulder');
    woocommerce_form_field(
        'shoulders_field_jacket',
        array(
            'type' => 'text',
            'required' => false,
        ),
        $checkout->get_value('shoulders_field_jacket')); ?>
    </div>
    </div>
    </div>
    <!--Trousers-->
    <div class="measurement-form trousers">
        <div id="customise_checkout_field">
            <div class="title">
                <h3>Trousers</h3>
            </div>
            <?php
            measurement('http://' . $_SERVER['SERVER_NAME'] . '/wp-content/uploads/2017/10/waist.svg', 'Waist', 'Measure around the waistline where you would wear the trousers.');
            woocommerce_form_field('waist_field',
                array(
                    'type' => 'text',
                    'required' => false,
                ),
                $checkout->get_value('waist_field')); ?>
        </div>
    </div>
    <?php
    measurement('http://' . $_SERVER['SERVER_NAME'] . '/wp-content/uploads/2017/10/hips.svg', 'Hips', 'Measure around the widest point of your hips.');
    woocommerce_form_field(
        'hips_field_trouser',
        array(
            'type' => 'text',
            'required' => false,
        ),
        $checkout->get_value('hips_field_trouser')); ?>
    </div>
    </div>
    <?php
    measurement('http://' . $_SERVER['SERVER_NAME'] . '/wp-content/uploads/2017/10/length.svg', 'Length', 'Measure from the top of your trouser waistband to the bottom of cuﬀ.');
    woocommerce_form_field(
        'length_field_trouser',
        array(
            'type' => 'text',
            'required' => false,
        ),
        $checkout->get_value('length_field_trouser')); ?>
    </div>
    </div>

    <?php
    measurement('http://' . $_SERVER['SERVER_NAME'] . '/wp-content/uploads/2017/10/inseam.svg', 'Inseam', 'Measure from the bottom of the crotch to the bottom cuﬀ.');
    woocommerce_form_field(
        'inseam_field',
        array(
            'type' => 'text',
            'required' => false,
        ),
        $checkout->get_value('inseam_field')); ?>
    </div>
    </div>

    <?php
    measurement('http://' . $_SERVER['SERVER_NAME'] . '/wp-content/uploads/2017/10/cuff.svg', 'Cuff', 'Measure the width around the cuﬀ of existing trousers.');
    woocommerce_form_field(
        'cuff_field',
        array('type' => 'text',
            'required' => false,
        ),
        $checkout->get_value('cuff_field')); ?>
    </div>
    </div>

    <?php
    measurement('http://' . $_SERVER['SERVER_NAME'] . '/wp-content/uploads/2017/10/crotch.svg', 'Crotch', 'Measure from the top of the waistband in the front, to the top of the waistband in the back.');
    woocommerce_form_field(
        'crotch_field',
        array(
            'type' => 'text',
            'required' => false,
        ),
        $checkout->get_value('crotch_field')); ?>
    </div>
    </div>

    <div class="extra">
        <h4>Extra Note</h4>
        <?php
        woocommerce_form_field(
            'extra_field',
            array(
                'type' => 'textarea',
                'required' => false,
            ),
            $checkout->get_value('extra_field')); ?>

        <!--Misc-->
        <div class="measurement-form misc">
            <div id="customise_checkout_field">
                <div class="title">
                    <h3>Miscellaneous Measurements</h3>
                </div>


                <div class="info">

                    <div class="fit">
                        <h5>Fit:</h5>
                        <p>Slim</p>
                        <p>Regular</p>
                        <p>Loose</p>
                        <?php
                        woocommerce_form_field(
                            'fit_field',
                            array(
                                'type' => 'text',
                                'required' => false,
                            ),
                            $checkout->get_value('fit_field'));
                        echo ''; ?>
                    </div><!--.fit-->


                    <?php
                    woocommerce_form_field(
                        'height_field',
                        array(
                            'type' => 'text',
                            'placeholder' => __('Height:'),
                            'required' => false,
                        ),
                        $checkout->get_value('height_field')
                    );
                    echo '';
                    woocommerce_form_field(
                        'weight_field',
                        array(
                            'type' => 'text',
                            'placeholder' => __('Weight:'),
                            'required' => false,
                        ),
                        $checkout->get_value('weight_field')
                    );
                    echo '';
                    woocommerce_form_field(
                        'age_field',
                        array(
                            'type' => 'text',
                            'placeholder' => __('Age:'),
                            'required' => false,
                        ),
                        $checkout->get_value('age_field')
                    );
                    echo ''; ?>

                </div> <!-- End Info-->
                <div class="posture">
                    <?php
                    posture('/wp-content/uploads/2017/07/normal-posture.svg', 'Normal Posture');
                    posture('/wp-content/uploads/2017/07/erect.svg', 'Erect');
                    posture('/wp-content/uploads/2017/07/fowardor-stooper.svg', 'Forwardor Stooper');
                    posture('/wp-content/uploads/2017/07/fowards-stomach.svg', 'Forwards Stomach');
                    posture('/wp-content/uploads/2017/07/stout.svg', 'Stout');

                    woocommerce_form_field(
                        'posture_field',
                        array(
                            'type' => 'text',
                            'required' => false,
                        ),
                        $checkout->get_value('posture_field'));
                    echo ''; ?>
                </div>  <!--End Posture-->


                <div class="shoulder">
                    <?php
                    posture('/wp-content/uploads/2017/07/normal-shoulders-normal-neck.svg', 'Normal Shoulders Normal Neck');
                    posture('/wp-content/uploads/2017/07/sloping-shoulders-long-neck.svg', 'Sloping Shoulders Long Neck');
                    posture('/wp-content/uploads/2017/07/square-shoulders-short-neck.svg', 'Square Shoulders Short Neck');

                    woocommerce_form_field(
                        'shoulders_field',
                        array(
                            'type' => 'text',
                            'required' => false,
                        ),
                        $checkout->get_value('shoulders_field')
                    );
                    echo '';
                    ?>

                    <div>
                        <p>RIGHT OR LEFT SHOULDER LOWER TICK NEAREST TO YOUR FIGURE.</p>
                    </div>

                </div> <!-- End Shoulder -->

                <div class="measurement-next">
                    <p>NEXT</p>
                </div>
            </div><!--#customise_checkout_field-->
        </div><!--.measurement-form.misc-->
    </div><!--.extra-->

    </div>
    </div>
    </div>
    </div>
    </div>

<?php }

add_action('woocommerce_checkout_update_order_meta', 'customise_checkout_field_update_order_meta');

function customise_checkout_field_update_order_meta($order_id)
{


    // Shirt
    update_post_meta($order_id, 'Neck', sanitize_text_field($_POST['neck_field']));
    update_post_meta($order_id, 'Chest Shirt', sanitize_text_field($_POST['chest_field_shirt']));

    update_post_meta($order_id, 'Stomach Shirt', sanitize_text_field($_POST['stomach_field_shirt']));
    update_post_meta($order_id, 'Back Shirt', sanitize_text_field($_POST['back_field_shirt']));

    update_post_meta($order_id, 'Hips Shirt', sanitize_text_field($_POST['hips_field_shirt']));
    update_post_meta($order_id, 'Sleeves Shirt', sanitize_text_field($_POST['sleeves_field_shirt']));

    update_post_meta($order_id, 'Length Shirt', sanitize_text_field($_POST['length_field_shirt']));
    update_post_meta($order_id, 'Shoulders Shirt', sanitize_text_field($_POST['shoulders_field_shirt']));

    update_post_meta($order_id, 'Bicep', sanitize_text_field($_POST['bicep_field']));

    // Jacket
    update_post_meta($order_id, 'Chest Jacket', sanitize_text_field($_POST['chest_field_jacket']));
    update_post_meta($order_id, 'Stomach Jacket', sanitize_text_field($_POST['stomach_field_jacket']));

    update_post_meta($order_id, 'Hips Jacket', sanitize_text_field($_POST['hips_field_jacket']));
    update_post_meta($order_id, 'Length Jacket', sanitize_text_field($_POST['length_field_jacket']));

    update_post_meta($order_id, 'Front', sanitize_text_field($_POST['front_field']));
    update_post_meta($order_id, 'Back Jacket', sanitize_text_field($_POST['back_field_jacket']));

    update_post_meta($order_id, 'Sleeves Jacket', sanitize_text_field($_POST['sleeves_field_jacket']));
    update_post_meta($order_id, 'Shoulders Jacket', sanitize_text_field($_POST['shoulders_field_jacket']));

    // Trousers
    update_post_meta($order_id, 'Waist', sanitize_text_field($_POST['waist_field']));
    update_post_meta($order_id, 'Hips Trouser', sanitize_text_field($_POST['hips_field_trouser']));

    update_post_meta($order_id, 'Length Trouser', sanitize_text_field($_POST['length_field_trouser']));
    update_post_meta($order_id, 'Inseam', sanitize_text_field($_POST['inseam_field']));

    update_post_meta($order_id, 'Cuff', sanitize_text_field($_POST['cuff_field']));
    update_post_meta($order_id, 'Crotch', sanitize_text_field($_POST['crotch_field']));

    // Miscellaneous
    update_post_meta($order_id, 'Fit', sanitize_text_field($_POST['fit_field']));

    update_post_meta($order_id, 'Height', sanitize_text_field($_POST['height_field']));
    update_post_meta($order_id, 'Weight', sanitize_text_field($_POST['weight_field']));
    update_post_meta($order_id, 'Age', sanitize_text_field($_POST['age_field']));

    update_post_meta($order_id, 'Posture', sanitize_text_field($_POST['posture_field']));

    update_post_meta($order_id, 'Shoulders', sanitize_text_field($_POST['shoulders_field']));

    update_post_meta($order_id, 'Extra', sanitize_text_field($_POST['extra_field']));


    update_post_meta($order_id, 'Have you shopped with us before?', sanitize_text_field($_POST['billing_existingcustomer']));

    update_post_meta($order_id, 'Would you like to use your existing measurements on file for this order?', sanitize_text_field($_POST['billing_use_same_measurements']));

}

// Checkout page: order button text
add_filter('woocommerce_order_button_text', 'custom_order_button_text', 1);
function custom_order_button_text($order_button_text)
{
    $order_button_text = 'SUBMIT';
    return $order_button_text;

}

//Order Details Fail
//add_action( 'woocommerce_admin_order_data_after_billing_address', 'my_custom_checkout_field_display_admin_order_meta', 10, 1 );
//function my_custom_checkout_field_display_admin_order_meta($order){
//    echo '<p><strong>'.__('My Field').':</strong> ' . get_post_meta( $order->id, 'neck_field', true ) . '</p>';
//}

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);

//add_filter( 'woocommerce_email_attachments', 'attach_terms_conditions_pdf_to_email', 10, 3);
//function attach_terms_conditions_pdf_to_email ( $attachments , $id, $object ) {
//
//    $your_path = dirname(FILE) . '/terms.pdf';
////    $your_pdf_path = dirname(FILE) . 'helloworld.docx';
//    $your_pdf_path = ;
//    $attachments[] = $your_pdf_path;
//    return $attachments;
//}


// Pass session variables for phpword
add_action('woocommerce_checkout_order_processed', 'is_express_delivery', 1, 1);
function is_express_delivery($order_id)
{
    $order = new WC_Order($order_id);

    $order_array = array();
    foreach ($order->get_items() as $item_id => $item_obj) {
        $decoded = json_decode($item_obj, true); // De-encode object
        array_push($order_array, $decoded);
    }
    $order_array = array();
    foreach ($order->get_items() as $item_id => $item_obj) {
        $decoded = json_decode($item_obj, true); // De-encode object
        array_push($order_array, $decoded);
    }
    $send_order_data = json_encode($order_array);

    $material_images_array = array();
    foreach ($order->get_items() as $item_id => $item_obj) {
        $output = json_decode($item_obj, true); // De-encode object

        foreach ($output['meta_data'] as $meta) {
            if (strpos($meta['key'], 'pa_material') === false && strpos($meta['key'], 'pa_fabric') !== 0) {
                continue;
            }
            $category = get_term_by('slug', $meta['value'], $meta['key']);
            $thumbnail_id = get_woocommerce_term_meta($category->term_id, $meta['key'] . '_swatches_id_photo', true);
            $textureImg = wp_get_attachment_image_src($thumbnail_id);
            array_push($material_images_array, $textureImg[0]);
        }
    }
    $send_product_image_data = json_encode($material_images_array);

    $meta = $order->meta_data;
    $postarray = array(
        "product_images" => $send_product_image_data,
        "product" => $send_order_data,
        "order" => $order,
        "id" => $order->id,
        "customer_ip_address" => $order->customer_ip_address,
        "date" => $order->order_date,
        "first_name" => $order->billing_first_name,
        "last_name" => $order->billing_last_name,
        "company" => $order->billing_company,
        "address_1" => $order->billing_address_1,
        "address_2" => $order->billing_address_2,
        "city" => $order->billing_city,
        "country" => WC()->countries->countries[$order->billing_country],
        "state" => WC()->countries->states[$order->billing_country][$order->billing_state],
        "postcode" => $order->billing_postcode,
        "email" => $order->billing_email,
        "phone" => $order->billing_phone,
        "existingcustomer"  => $order->billing_existingcustomer,
        "use_same_measurements"  => $order->billing_use_same_measurements,
    );

    foreach ($meta as $key => $value) {
        if (($value->key === "ss_wc_mailchimp_opt_in") || ($value->key === '_order_stock_reduced') || ($value->key === '_download_permissions_granted') || ($value->key === 'slide_template') || ($value->key === '_vc_post_settings')) {
            continue;
        }
        $purevalue = $value->key;
        $stringfix = strtolower($purevalue);
        $propervalue = str_replace(' ', '_', $stringfix);

        $variablename = $propervalue;
        ${$variablename} = $value->key;
        $result = $value->value;

        $resultarray = array($propervalue => $result);
        $postarray = array_merge((array)$postarray, (array)$resultarray);
    }

    $billing = $order->billing;
    post_to_url("http://" . $_SERVER['SERVER_NAME'] . "/phpwordfunction.php", $postarray);
}


function post_to_url($url, $data)
{
    $fields = '';
    foreach ($data as $key => $value) {
        $fields .= $key . '=' . urlencode($value) . '&';
    }
    rtrim($fields, '&');

    $post = curl_init();

    curl_setopt($post, CURLOPT_URL, $url);
    curl_setopt($post, CURLOPT_POST, true);
    curl_setopt($post, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($post, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($post);
    echo $result;

    curl_close($post);
}

add_filter('woocommerce_email_attachments', 'add_new_order_csv_and_pdf', 10, 3);
function add_new_order_csv_and_pdf($attachments, $email_type, $order)
{
    $email_types = array('new_order');
    $attachments = array();
    if (isset($email_type) && in_array($email_type, $email_types)) {
        $attachments[0] = $_SERVER['DOCUMENT_ROOT'] . '/order_list.docx';
    }
    return $attachments;
}

// JS for admin
function wpdocs_enqueue_custom_admin_style()
{
    wp_enqueue_script('wcba-custom', get_stylesheet_directory_uri() . '/js/wcba-custom-admin.js');
    wp_enqueue_style('theme-name-parent-style', get_stylesheet_directory_uri() . '/style-admin.css', array(), '0.1', 'all');
}

add_action('admin_enqueue_scripts', 'wpdocs_enqueue_custom_admin_style');


function download($filename)
{
    if (!empty($filename)) {
        // Specify file path.
        $path = $_SERVER['DOCUMENT_ROOT']; // '/uplods/'
        $download_file = $path . $filename;
        // Check file is exists on given path.
        if (file_exists($download_file)) {
            // Getting file extension.
            $extension = explode('.', $filename);
            $extension = $extension[count($extension) - 1];
            // For Gecko browsers
            header('Content-Transfer-Encoding: binary');
            header('Last-Modified: ' . gmdate('D, d M Y H:i:s', filemtime($path)) . ' GMT');
            // Supports for download resume
            header('Accept-Ranges: bytes');
            // Calculate File size
            header('Content-Length: ' . filesize($download_file));
            header('Content-Encoding: none');
            // Change the mime type if the file is not PDF
            header('Content-Type: application/' . $extension);
            // Make the browser display the Save As dialog
            header('Content-Disposition: attachment; filename=' . $filename);
            readfile($download_file);
            exit;
        } else {
            echo 'File does not exists on given path';
        }

    }
}

// CURRENT BOOKMARK 2
// Get Post ID for Dashboard side Order Details
function id()
{
    global $pagenow;
    global $post;
    $id = $post->ID;

    if ('post.php' === $pagenow && isset($_GET['post']) && 'shop_order' === get_post_type($_GET['post'])) {
        if ($slide = (isset ($_GET["param"]) && trim($_GET["param"]) == '1') ? trim($_GET["param"]) : '') {

            echo '<br>';

            $order = wc_get_order($id);
            $order_array = array();
            foreach ($order->get_items() as $item_id => $item_obj) {
                $decoded = json_decode($item_obj, true); // De-encode object
                array_push($order_array, $decoded);
            }
            $send_order_data = json_encode($order_array);


            $material_images_array = array();
            foreach ($order->get_items() as $item_id => $item_obj) {
                $output = json_decode($item_obj, true); // De-encode object
                foreach ($output['meta_data'] as $meta) {
                    //var_dump($output['meta_data']);
                    if (strpos($meta['key'], 'pa_material') === false && strpos($meta['key'], 'pa_fabric') !== 0) {
                        continue;
                    }
                    $category = get_term_by('slug', $meta['value'], $meta['key']);
                    $thumbnail_id = get_woocommerce_term_meta($category->term_id, $meta['key'] . '_swatches_id_photo', true);
                    $textureImg = wp_get_attachment_image_src($thumbnail_id);
                    array_push($material_images_array, $textureImg[0]);
                }
            }
            $send_product_image_data = json_encode($material_images_array);


            $meta = $order->meta_data;
            $postarray = array(
                "product_images" => $send_product_image_data,
                "product" => $send_order_data,

                "order" => $order,
                "id" => $order->id,
                "customer_ip_address" => $order->customer_ip_address,
                "date" => $order->order_date,
                "first_name" => $order->billing_first_name,
                "last_name" => $order->billing_last_name,
                "company" => $order->billing_company,
                "address_1" => $order->billing_address_1,
                "address_2" => $order->billing_address_2,
                "city" => $order->billing_city,
                //        "country" => WC()->countries->countries[ $order->shipping_country ],
                "country" => WC()->countries->countries[$order->billing_country],
                "state" => WC()->countries->states[$order->billing_country][$order->billing_state],
                "postcode" => $order->billing_postcode,
                "email" => $order->billing_email,
                "phone" => $order->billing_phone,
                "existingcustomer"  => $order->billing_existingcustomer,
                "use_same_measurements"  => $order->billing_use_same_measurements,

            );

            foreach ($meta as $key => $value) {
                if (($value->key === "ss_wc_mailchimp_opt_in") || ($value->key === '_order_stock_reduced') || ($value->key === '_download_permissions_granted') || ($value->key === 'slide_template') || ($value->key === '_vc_post_settings')) {
                    continue;
                }
                $purevalue = $value->key;
                $stringfix = strtolower($purevalue);
                $propervalue = str_replace(' ', '_', $stringfix);

                $variablename = $propervalue;
                ${$variablename} = $value->key;
                $result = $value->value;

                $resultarray = array($propervalue => $result);
                $postarray = array_merge((array)$postarray, (array)$resultarray);
            }

            $billing = $order->billing;

            post_to_url("http://" . $_SERVER['SERVER_NAME'] . "/phpwordfunction-download.php", $postarray);


            header('Location: http://' . $_SERVER['SERVER_NAME'] . '/order_list_export_' . $id . '.docx');
            exit();
        }
    }
}

add_action('admin_notices', 'id');

/**
 * Ensure cart contents update when products are added to the cart via AJAX
 */
function my_header_add_to_cart_fragment($fragments)
{

    ob_start();
    $count = WC()->cart->cart_contents_count;
    ?>
    <a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>"
         title="<?php _e('View your shopping cart'); ?>"><?php
    if ($count > 0) {
        ?>
        <span class="cart-contents-count"><?php echo esc_html($count); ?></span>
        <?php
    }
    ?></a><?php

    $fragments['a.cart-contents'] = ob_get_clean();

    return $fragments;
}

add_filter('woocommerce_add_to_cart_fragments', 'my_header_add_to_cart_fragment');

add_filter('woocommerce_default_address_fields', 'moso_custom_override_default_address_fields');

function moso_custom_override_default_address_fields($address_fields)
{
    $address_fields['postcode']['required'] = false;
//    $address_fields['first_name']['required'] = false;
//    $address_fields['last_name']['required'] = false;
//    $address_fields['address_1']['required'] = false;
//    $address_fields['address_2']['required'] = false;
    $address_fields['city']['required'] = false;
    $address_fields['state']['required'] = false;
    return $address_fields;
}

add_filter('woocommerce_billing_fields', 'wc_require_email', 10, 1);
function wc_require_email($address_fields)
{
    $address_fields['billing_email']['required'] = true;
    return $address_fields;
}

// Hook in
add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields',0);
// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields($fields)
{
//    $fields['billing']['billing_email']['required'] = false;
    $fields['billing']['billing_phone']['required'] = false;
    $fields['billing']['billing_existingcustomer']['placeholder'] = 'Have you shopped with us before?';
    $fields['billing']['billing_use_same_measurements']['placeholder'] = 'Would you like to use your existing measurements on file for this order?';
    return $fields;
}


add_filter('woocommerce_swatches_get_swatch_image_css_class', 'custom_override_sold_out_variation', 10, 2);
function custom_override_sold_out_variation($cssclass, $term)
{
    $out_of_stock = get_field('woo_attributes_out_of_stock', 'term_' . $term->term_id);
    if ($out_of_stock == 1) {
        return $cssclass . ' variation-out-of-stock';
    } else {
    }
}

class ACF_Product_Options
{
    static $slug = 'woo_attributes';

    public static function init()
    {
//		Gather the global attribute types
        $attribute_terms = wc_get_attribute_taxonomy_names();
//		Initialize the array for holding the location rules
        $group_filter = array();
//		Loop through the attribute types and build our field group location rules: IF this OR this OR this
        foreach ($attribute_terms as $attribute_term) {
            $group_filter[] = array(array(
                'param' => 'taxonomy',
                'operator' => '==',
                'value' => $attribute_term,
                'order_no' => 0,
                'group_no' => 0,
            ));
        }
        if (function_exists('acf_add_local_field_group')) {
            acf_add_local_field_group(array(
                'key' => self::$slug,
                'title' => __('Product Options', 'custom-site'),
                'fields' => array(
                    array(
                        'key' => self::$slug . '_out_of_stock',
                        'label' => __('Out of Stock', 'out-of-stock'),
                        'name' => 'out_of_stock',
                        'type' => 'true_false',
                        'message' => 'Select True if it is out of stock'
                    )
                ),
                'location' => $group_filter,
                'options' => array(
                    'position' => 'normal',
                    'layout' => 'default',
                    'hide_on_screen' => array(),
                ),
                'menu_order' => 0,
            ));
        }
    }
}

add_action('init', 'ACF_Product_Options::init');

/**
 * Set a custom add to cart URL to redirect to
 * @return string
 */
function custom_add_to_cart_redirect()
{
    $protocol = "http" . (!empty($_SERVER['HTTPS']) ? "s" : "");
//    $url = $protocol . "://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    $url = get_permalink(woocommerce_get_page_id('shop'));
    return $url;
}

add_filter('woocommerce_add_to_cart_redirect', 'custom_add_to_cart_redirect');


add_filter('wc_order_is_editable', 'wc_make_processing_orders_editable', 10, 2);
function wc_make_processing_orders_editable($is_editable, $order)
{
    if ($order->get_status() == 'processing') {
        $is_editable = true;
    }

    return $is_editable;
}

if (function_exists('acf_add_options_page')) {

    acf_add_options_page();

}


//new acf updates hides wp default meta fields which messes up woocomerce meta fields also, the functions below solve this problem
add_filter('acf/settings/remove_wp_meta_box', '__return_false');


//Adding fields to order emails:
/**
 * Add the field to order emails
 **/
add_filter('woocommerce_email_order_meta_keys', 'wcba_woocommerce_email_order_meta_keys');

function my_woocommerce_email_order_meta_keys( $keys ) {
    $keys['Have you shopped with us before?'] = 'billing_existingcustomer';
    $keys['Would you like to use your existing measurements on file for this order?'] = 'billing_use_same_measurements';
    return $keys;
}
