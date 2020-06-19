jQuery(document).ready(function($){

    // Order Details: Extract Order Details

    if ($("body").hasClass("post-type-shop_order")) {
        if ($("body").hasClass("post-php")) {

            var $id = $('.order-id').data('value')

            function myAjax () {
                var root = document.location.hostname;
                $.ajax( { type : 'POST',
                    dataType:'json',
                    data : ({'id': $id}),
                    url  : 'http://'+root+'/wcba-order-export.php',              // <=== CALL THE PHP FUNCTION HERE.
                    // url  : 'http://'+root+'/wp-content/themes/rajas-fashion-child-theme/functions.php',              // <=== CALL THE PHP FUNCTION HERE.
                    success: function ( data ) {
                        alert( data );               // <=== VALUE RETURNED FROM FUNCTION.
                    },
                    error: function ( xhr ) {
                        alert( "error" );
                    }
                });
                //console.log(url);
            }

            $('<input class="export-order" value="Export">').insertAfter('.order_actions > *:nth-last-child(1) > *:nth-last-child(1)');

            $(document).on("click", ".export-order", function(){
                // myAjax ();

                var url = window.location.href;
                if (url.indexOf('?') > -1){
                    url += '&param=1'
                }else{
                    url += '?param=1'
                }
                window.location.href = url;

            });

        }
    }



});
