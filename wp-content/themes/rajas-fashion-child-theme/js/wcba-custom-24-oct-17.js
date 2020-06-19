jQuery(document).ready(function($){

	// On click the screen scrolls to the desired div - Function
	$('#quality-button').click(function(){
		$('html,body').animate({
			scrollTop: $('.quality-box').offset().top -100
		}, 1000);
	});
	$('#value-button').click(function(){
		$('html,body').animate({
			scrollTop: $('.value-box').offset().top -100
		}, 1000);
	});
	$('#service-button').click(function(){
		$('html,body').animate({
			scrollTop: $('.service-box').offset().top -100
		}, 1000);
	});

    // ===============================================================

    // Single Product

    // ===============================================================



    // Change main product image on click for options
    $(document).on("click", ".variations img", function(){
        var imgsrc = $(this).attr('src');
        $('img.attachment-shop_single.size-shop_single.wp-post-image').attr('srcset',imgsrc);
        console.log(imgsrc);

        if( $('img.attachment-shop_single.size-shop_single.wp-post-image').length ) {
            $('img.attachment-shop_single.size-shop_single.wp-post-image').remove();
            $('<img class="wcba-product-main-image" src="'+imgsrc+'">').appendTo('.woocommerce-product-gallery__image.flex-active-slide a');
            $('img.zoomImg').attr('src',imgsrc);
        }
        else {
            $('.wcba-product-main-image').attr('src', imgsrc);
            $('img.zoomImg').attr('src',imgsrc);
        }

    });

    // Summary of your order Container for attributes
    $('.attr-container').insertAfter(".woocommerce-tabs .panel#tab-description > *:nth-last-child(1)");

    // Summary of your order Attributes show hide
    $(document).on("click", "div.swatch-wrapper", function(){
        var attr_slug = $(this).data('attribute');
        var value_slug = $(this).data('value');
        var attr_value = $('.attr-container').find("." + attr_slug + " ." + value_slug);
        var attr_value_others = $('.attr-container').find("." + attr_slug + " *");
        $(attr_value_others).hide();

        if ($(this).hasClass("selected")) {
            $(attr_value).show();
        }
        else{
            $(attr_value).hide();
        }
    });
    // Single Product: Show Variation Description
    $( ".attr-container > div > p:not([data-description=''])" ).each(function(i) {
        var value_name = $(this).data('valuename');
        var target = $('.swatch-wrapper[data-value="'+value_name+'"] img');
        console.log($(this).clone());
        $(this).clone().insertAfter(target);
    });

    // // Expand all labels
    // $(document).on("click", 'body.single-product div.product .product_title', function(){
    //     $('.woocommerce div.product form.cart .variations tr:not(.active) td.label').click();
    // });

    // Single Product: Initials Variation
    $('label:contains("Initials Type")').parent().parent().addClass('disabled transition');
    $('#picker_pa_initials-type .select-option[data-value="none"]').hide();

    $(document).on("click", '#picker_pa_initials-shirt div[data-value="cuff"], #picker_pa_initials-shirt div[data-value="pocket"]', function(){
        $('label:contains("Initials Type")').parent().parent().removeClass('disabled');
        $('label:contains("Initials Type")').parent().parent().addClass('active');
        $('#picker_pa_initials-type .select-option.selected[data-value="none"]').click();
    });
    $(document).on("click", '#picker_pa_initials-shirt div[data-value="none"]', function(){
        $('label:contains("Initials Type")').parent().parent().addClass('disabled');
        $('label:contains("Initials Type")').parent().parent().removeClass('active');
        $('#picker_pa_initials-type .select-option[data-value="none"]').click();
    });


    // Single Product: Pop-up
    if ($("body").hasClass("single-product")) {
        if($( ".wcba-previous-cart-item-variation input" ).length){
            $('body').addClass("variation-check");
            $('<div class="wcba-variation-popup"><div><p>Would you like to use previous choices for your product?</p><div><button>Yes</button><button>No</button></div></div><div class="window"></div></div></div>').insertBefore('body > *:nth-child(1)');
        }

        $(document).on("click", ".wcba-variation-popup button", function(){
            var value =$(this).text();
            if (value === 'Yes'){

                $('body').removeClass('variation-check');
                $( ".wcba-previous-cart-item-variation input" ).each(function() {
                    var variation = $(this).data('variation');
                    $(".swatch-control:not([id|='picker_pa_materials']):not([id|='picker_pa_fabrics']) .select-option.swatch-wrapper[data-value='" + variation + "']:not(.selected)").click();
                    $(".swatch-control.wcba-filter-content .select-option.swatch-wrapper[data-value='" + variation + "']:not(.selected)").click();

                    // $(".swatch-control.wcba-filter-content .select-option.swatch-wrapper[data-value='" + variation + "']").click();
                    // $(".variations .value > .swatch-control .select-option[data-value='" + variation + "']").click();
                    // var variation2 = variation.toUpperCase();
                    // $('.wcba-filter-content a.swatch-anchor[title="'+variation2+'"]').click();
                    // var next = $(".wcba-filter-container").next();
                    // $(".wcba-filter-container").next().find('a.swatch-anchor[title="'+variation2+'"]').click();

                    // THIS IS DISABLED
                    // $(next+' a.swatch-anchor[title="'+variation2+'"]').click();
                });

                if($('div#picker_pa_buttons-single-breast-pocket .selected').length) {}
                else {
                    $('div#picker_pa_buttons-single-breast-pocket div[data-value="none"]').click();
                }
                if($('div#picker_pa_buttons-single-bp-tuxedo .selected').length) {}
                else {
                    $('div#picker_pa_buttons-single-bp-tuxedo div[data-value="none"]').click();
                }
                if($('div#picker_pa_buttons-double-breast-pocket .selected').length) {}
                else {
                    $('div#picker_pa_buttons-double-breast-pocket div[data-value="none"]').click();
                }
                if($('div#picker_pa_buttons-double-bp-tuxedo .selected').length) {}
                else {
                    $('div#picker_pa_buttons-double-bp-tuxedo div[data-value="none"]').click();
                }
            }
            else{
                $('body').removeClass('variation-check');
                $('.reset_variations').remove();
            }
        });
    }
    // Button Zoom
    $('<div class="zoom">+</div>').insertBefore('#picker_pa_buttons.swatch-control > .swatch-wrapper img,\n' +
        '#picker_pa_collar-stays.swatch-control > .swatch-wrapper img,\n'+
        '#picker_pa_cufflinks.swatch-control > .swatch-wrapper img,\n'+
        '#picker_pa_tie-bars.swatch-control > .swatch-wrapper img,\n'+
        '#picker_pa_belts.swatch-control > .swatch-wrapper img,\n'+
        '#picker_pa_silk-pocket-squares > .swatch-wrapper img,\n'+
        '#picker_pa_silk-ties > .swatch-wrapper img,\n'+
        '#picker_pa_sleeves > .swatch-wrapper img\n'+
        '');
    $('<div class="wcba-fabric-zoom"><img src="" /></div><div class="wcba-window"></div>').appendTo('body');

    // $(document).on("c    lick", '#picker_pa_buttons .zoom', function(){
    $(document).on("click", '.select:not(.wcba-filter-content) .swatch-wrapper .zoom', function(){
        var img_element = $(this).next();
        var img_src = $(img_element).attr('src');
        var img_src2 = img_src.replace('-400x400','');
        $('.wcba-fabric-zoom img').attr('src',img_src2);
        $('.wcba-fabric-zoom, .wcba-window').addClass('active');
    });

    $(document).on("click", '.wcba-window.active', function(){
        $('.wcba-fabric-zoom, .wcba-window').removeClass('active');
    });

    // Template Setup
    $('div#picker_pa_fabrics-tuxedo,\n' +
        'div#picker_pa_fabrics-suit,\n' +
        'div#picker_pa_fabrics-sports-jacket,\n' +
        'div#picker_pa_materials-shirt,\n' +
        'div#picker_pa_materials').parent().addClass('wcba-lower-padding');

    // Variation out of stock
    $('.variation-out-of-stock').parent().parent().addClass('variation-out-of-stock');

    // Hide breast pocket pocket buttons by default
    // $('#picker_pa_buttons-single-breast-pocket, #picker_pa_buttons-double-breast-pocket, #picker_pa_buttons-double-bp-tuxedo, #picker_pa_buttons-single-bp-tuxedo').parent().parent().hide();
    $('#picker_pa_buttons-single-breast-pocket, #picker_pa_buttons-double-breast-pocket, #picker_pa_buttons-double-bp-tuxedo, #picker_pa_buttons-single-bp-tuxedo').parent().parent().addClass('inactive');

    // Show breast pocket pocket buttons on click
    $(document).on("click", ".select-option.swatch-wrapper[data-value='double-breasted']", function(){
        $('#picker_pa_buttons-single-breast-pocket, #picker_pa_buttons-single-bp-tuxedo').parent().parent().addClass('inactive');
        $('#picker_pa_buttons-double-breast-pocket, #picker_pa_buttons-double-bp-tuxedo').parent().parent().removeClass('inactive');
        $('#picker_pa_buttons-double-breast-pocket, #picker_pa_buttons-double-bp-tuxedo').parent().parent().addClass('active');
        $('.select-option.swatch-wrapper[data-value="none"][data-attribute="pa_buttons-single-breast-pocket"]:not(.selected), .select-option.swatch-wrapper[data-value="none"][data-attribute="pa_buttons-single-bp-tuxedo"]:not(.selected)').click();
    });
    $(document).on("click", ".select-option.swatch-wrapper[data-value='single-breasted']", function(){
        $('#picker_pa_buttons-single-breast-pocket, #picker_pa_buttons-single-bp-tuxedo').parent().parent().removeClass('inactive');
        $('#picker_pa_buttons-double-breast-pocket, #picker_pa_buttons-double-bp-tuxedo').parent().parent().addClass('inactive');
        $('#picker_pa_buttons-single-breast-pocket, #picker_pa_buttons-single-bp-tuxedo').parent().parent().addClass('active');
        $('.select-option.swatch-wrapper[data-value="none"][data-attribute="pa_buttons-double-breast-pocket"]:not(.selected), .select-option.swatch-wrapper[data-value="none"][data-attribute="pa_buttons-double-bp-tuxedo"]:not(.selected)').click();
    });

    // Single Product : Accessories
    if (window.location.href.indexOf("/product/accessories/") > -1) {
        $('table.variations').one('click', function(e) {
            $('div[data-value=none]').click();
        });
    }

	// Single Product Swatch Name
    $( ".swatch-anchor" ).each(function() {
    	var title =  $( this ).attr( "title" );
        // console.log(title);
        var found = $( this ).find( "img" );
        $( "<p>"+title+"</p>" ).insertAfter( found );
    });

    $( ".woocommerce div.product form.cart .variations td.label" ).click(function() {
        $( this ).parent().toggleClass( 'active' );
    });

    // ====================================================================================================

    // Cart Page

    // ====================================================================================================

    if (window.location.href.indexOf("/cart/") > -1) {
        // Submit button check
        $(document).on("click", ".submit-form", function(){
            var attr = $('.actions > input:nth-child(1)').attr('disabled');
            if (typeof attr !== typeof undefined && attr !== false) {
                window.location = "/checkout/";
            }
            else{
                $(".woocommerce-cart.page.logged-in input.button").click();
                $("<div class='submit-form'>SUBMIT YOUR FORM</div>").insertAfter("<body>");
            }
        });
    }

    // ??
    $('.gfield_group').each(function(){
        $(this).next().andSelf().wrapAll('<div class="test"/>');
    });

    // ====================================================================================================

    // Checkout Page

    // ====================================================================================================

    if (window.location.href.indexOf("/checkout/") > -1) {

        $('.woocommerce-checkout .questionaire > *:nth-child(n+2)').show();
        $('<p>Mailing Address </p><p class="mailing-subtitle">Please provide mailing address so we can accurately quote mailing charges</p>').insertAfter('p#billing_address_1_field label');
        var $label = $('p#billing_address_1_field label').text('Mailing Addressaa');
        $label.html($label.html().replace("Name", "Title"));
        $( ".measurement-form" ).insertBefore( 'div#customer_details' );

        // Live change of value attr
        $('.measurement-form input').bind('input propertychange', function() {
            var val = $(this).val();
            $(this).attr('value', val);
        });

        // Questionaire next button
        $(document).on("click", ".questionaire", function(){
            $('body .checkout #order_review input[type="submit"]').attr("value", "Request a quote");
            if (window.existing == false){
                $('.measurement-form h2').html('PLEASE FILL IN THE FORM BELOW');
            }
            else{}
        });
        // $(document).on("click", ".questionaire .default", function(){
        $(document).on("click", ".questionaire .default, .questionaire .no-measurement", function(){
            $( ".questionaire" ).addClass( 'inactive' );
            $( ".measurement-form" ).addClass( 'active' );
            $("html, body").animate({ scrollTop: 500 }, "slow");
            return false;
        });
        //  $(document).on("click", ".questionaire .no-measurement", function(){
        //     $( ".questionaire" ).addClass( 'inactive' );
        //     $( ".measurement-form" ).addClass( 'active' );
        //     $('.measurement-form:nth-child(2)').hide();
        //     $('.measurement-form:nth-child(3)').hide();
        //     $('.measurement-form:nth-child(4)').hide();
        //     $('.misc > div > div:nth-last-child(n+3)').hide();
        //     $('.extra h4').html('Please fill in only measurements that changed.');
        //      $("html, body").animate({ scrollTop: 500 }, "slow");
        //      return false;
        // });

         // Input Radio Check
        $('input:radio[name="input_1"]').change(
            function(){
                if (this.checked && this.value == 'No') {
                    window.existing = false;
                    $( ".questionaire > div:nth-child(5)" ).addClass( 'active' );
                    $( ".questionaire > div:nth-child(3)" ).removeClass( 'active' );
                    $( ".questionaire > div:nth-child(4)" ).removeClass( 'active' );
                    $('input:radio[name="input_2"], input:radio[name="input_3"]').prop('checked', false);
                    $( ".questionaire button" ).removeClass( 'no-measurement' );
                    $( ".questionaire button" ).addClass( 'default' );
                }
                else {
                    window.existing = true;
                    $( ".questionaire > div:nth-child(3)" ).addClass( 'active' );
                    $( ".questionaire > div:nth-child(5)" ).removeClass( 'active' );
                    $( ".questionaire button" ).removeClass( 'no-measurement' );
                    $( ".questionaire button" ).addClass( 'default' );
                }
            });
        $('input:radio[name="input_2"]').change(
            function(){
                if (this.checked && this.value == 'No') {
                    $( ".questionaire > div:nth-child(5)" ).addClass( 'active' );
                    $( ".questionaire > div:nth-child(4)" ).removeClass( 'active' );
                    $( ".questionaire button" ).addClass( 'no-measurement' );
                    $( ".questionaire button" ).removeClass( 'default' );
                }
                else {
                    $( ".questionaire > div:nth-child(4)" ).addClass( 'active' );
                    $( ".questionaire > div:nth-child(5)" ).addClass( 'active' );
                    $( ".questionaire button" ).removeClass( 'no-measurement' );
                    $( ".questionaire button" ).addClass( 'default' );
                }
            });

        // Check for types of products in checkouts and adjust measurement form
        var el = document.getElementById("order_review")
        if (el.innerHTML.indexOf("Shirt Measurement") !== -1) {
            var shirt = 'have';
        }
        if (el.innerHTML.indexOf("Trouser Measurement") !== -1) {
            var legs = 'have';
        }
        if (el.innerHTML.indexOf("Jacket Measurement") !== -1) {
            var jacket = 'have';
        }

        // If only accessories exist in cart
        if (shirt == undefined && shirt == null) {
            if (legs == undefined && legs == null) {
                if (jacket == undefined && jacket == null) {
                    $( ".questionaire" ).addClass( 'inactive' );
                    $( "div#customer_details" ).addClass( 'active' );
                    $( ".checkout-title" ).addClass( 'active' );
                    $( ".checkout #order_review" ).addClass( 'active' );
                    $( "h3#order_review_heading" ).addClass( 'active' );
                }
            }
        }

        // Measurement next button
        $(document).on("click", '.measurement-next *', function(){
            // Check for product types in the cart
            var products = '.measurement-form.misc input[type=text]';
            // console.log(shirt);
            if (shirt !== undefined && shirt !== null) {
                    products += ', .measurement-form.shirt input[type=text]';
            }
            if (jacket !== undefined && jacket !== null) {
                    products += ', .measurement-form.jacket input[type=text]';
            }
            if (legs !== undefined && legs !== null) {
                    products += ', .measurement-form.trousers input[type=text]';
            }

            function execute_if_not_empty() {
                $( "div#customer_details" ).addClass( 'active' );
                $( ".checkout-title" ).addClass( 'active' );
                $( ".checkout #order_review" ).addClass( 'active' );
                $( "h3#order_review_heading" ).addClass( 'active' );
                $( ".measurement-form" ).removeClass( 'active' );
                // $("html, body").animate({ scrollTop: 500 }, "slow");
                return false;
            }
            // If not existing customer; check if fields empty
            if (window.existing == false){
                $(products).each(function(){
                    if($(this).attr('value')!=""){
                        $(this).parent().removeClass('error');
                        if($(products).parent('.error').length){
                        }
                        else{
                            execute_if_not_empty();
                        }
                    }
                    else{
                        $(this).parent().addClass('error');

                    }
                });
            }
            else{
                execute_if_not_empty()
            }

            // Check if error text exists if not add
            if ($('.measurement-form .title p.error').length){
            }
            else{
                $('<p class="error">PLEASE FILL IN REQUIRED FIELDS</p>').insertAfter('.please-fill');
            }
            $("html, body").animate({ scrollTop: 500 }, "slow");
            return false;
        }); // End Measurement Next

        if (shirt !== undefined && shirt !== null) {
            $('.measurement-form:nth-child(2)').show();
        }
        if (shirt == undefined && shirt == null) {
            if (jacket == undefined && jacket == null) {
                $('.measurement-form.shirt .title h2').insertBefore('.measurement-form.trousers .title h3');
                $('.please-fill').insertBefore('.measurement-form.trousers .title h3');
            }
            else{
                $('.measurement-form.shirt .title h2').insertBefore('.measurement-form.jacket .title h3');
                $('.please-fill').insertBefore('.measurement-form.jacket .title h3');
            }
        }
        if (jacket !== undefined && jacket !== null) {
            $('.measurement-form:nth-child(3)').show();
        }
        if (legs !== undefined && legs !== null) {
            $('.measurement-form:nth-child(4)').show();
        }

        $(".extra").insertBefore('.measurement-next');

        // Measurement form : fit, posture, and shoulder section choice
        // Fit
        $(document).on("click", '.fit p', function(){
            var value = $( this ).html();
            $('#fit_field').val(value);
            $('.fit p').removeClass('active');
            $(this).addClass('active');
        });
        // Posture
        $(document).on("click", 'div#customise_checkout_field > .posture> div', function(){
            var value = $( this ).find('h4').html();
            $('#posture_field').val(value);
            $('div#customise_checkout_field > .posture> div').removeClass('active');
            $(this).addClass('active');
        });
        $(document).on("click", 'div#customise_checkout_field > .shoulder> div:nth-last-child(n+2)', function(){
            var value = $( this ).find('h4').html();
            $('#shoulders_field').val(value);
            $('div#customise_checkout_field > .shoulder> div:nth-last-child(n+2)').removeClass('active');
            $(this).addClass('active');
        });
    }
















});










