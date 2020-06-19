//Radio button value check
// $('.questionaire h2').click(function() {
//     if($('input:radio[value="Yes"]').is(':checked')) {
//         alert("it's checked");
//     }
// });

// // If have torso
// if (torso !== undefined && torso !== null) {
//     if (both == null) {
//         // If no legs
//         if (legs == null) {
//             $("form.checkout.woocommerce-checkout .measurement-form:nth-child(3)").hide();
//             $("form > div:nth-child(2) > div#customise_checkout_field > div:nth-last-child(2)").addClass('no-border');
//             $(".extra").insertAfter('form.checkout.woocommerce-checkout .measurement-form:nth-child(2) > div > div:nth-last-child(1)');
//             $(".measurement-next").insertAfter('form.checkout.woocommerce-checkout .measurement-form:nth-child(2) > #customise_checkout_field');
//             console.log('brocolli');
//         }
//     }
// }
// // If have legs
// if (legs !== undefined && legs !== null){
//     if (both == null) {
//         $( "form.checkout.woocommerce-checkout .measurement-form:nth-child(2)" ).hide();
//         // Check if have a single torso
//         if (torso !== undefined && torso !== null){
//             $( "form.checkout.woocommerce-checkout .measurement-form:nth-child(2)" ).show();
//         }
//     }
// }

// Measurement Form : Miscellaneous Measurements and Size options

// $(function () {
//     $('.misc div#customise_checkout_field > div:nth-child(n+2) > div:nth-child(1)').on('click', function () {
//         var text = $('#posture_field');
//         text.val('after clicking');
//     });
// });



// =============================================================================================================
// STATIK VERSION

// Check for types of products in checkouts and adjust measurement form
// =============================================================================================================

// if (el.innerHTML.indexOf("Shirt") !== -1) {
//     var shirt = 'have';
// }
// if (el.innerHTML.indexOf("Sports") !== -1) {
//     var sports = 'have';
// }
// if (el.innerHTML.indexOf("Suits") !== -1) {
//     var suits = 'have';
// }
// if (el.innerHTML.indexOf("Trousers") !== -1) {
//     var trousers = 'have';
// }
// // If no trousers
// if (trousers == null){
//     $( "form.checkout.woocommerce-checkout .measurement-form:nth-child(3)" ).hide();
//     $( "form > div:nth-child(2) > div#customise_checkout_field > div:nth-last-child(2)" ).addClass('no-border');
//     $( ".extra" ).insertAfter('form.checkout.woocommerce-checkout .measurement-form:nth-child(2) > div > div:nth-last-child(1)');
//     $( ".measurement-next" ).insertAfter('form.checkout.woocommerce-checkout .measurement-form:nth-child(2) > #customise_checkout_field');
// }
// If have trousers
// if (trousers !== undefined && trousers !== null){
//     $( "form.checkout.woocommerce-checkout .measurement-form:nth-child(2)" ).hide();
//     // Check if have a single shirt product
//     if (shirt !== undefined && shirt !== null){
//         $( "form.checkout.woocommerce-checkout .measurement-form:nth-child(2)" ).show();
//     }
//     if (sports !== undefined && sports !== null){
//         $( "form.checkout.woocommerce-checkout .measurement-form:nth-child(2)" ).show();
//     }
//     if (suits !== undefined && suits !== null){
//         $( "form.checkout.woocommerce-checkout .measurement-form:nth-child(2)" ).show();
//     }
// }


// if (document.location.pathname.indexOf("/checkout/order-received/") == 0) {
//     $(function(){
//         myAjax();
//     });
// }

// function myAjax () {
//     var root = document.location.hostname;
//     $.ajax( { type : 'POST',
//         data : { },
//         url  : 'http://'+root+'/phpwordfunction.php',              // <=== CALL THE PHP FUNCTION HERE.
//         success: function ( data ) {
//             alert( data );               // <=== VALUE RETURNED FROM FUNCTION.
//         },
//         error: function ( xhr ) {
//             alert( "error" );
//         }
//     });
// }
































//