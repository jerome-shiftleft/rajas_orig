jQuery(document).ready(function($){
    // Single Product: Materials/Fabric Filter
    // WCBA Filter

    // Static:
    // Setup Template

    var container1 = ".wcba-filter-container.container-1 ";
    var source = "#picker_pa_materials";
    var source2 = "#picker_pa_materials-shirt";
    var source3 = "#picker_pa_materials-sports-jackets";
    //var source4 = "#picker_pa_cufflinks";
    //var source5 = "#picker_pa_silk-ties";
    //var source6 = "#picker_pa_silk-pocket-squares";

    $("<div class='wcba-filter-container container-1'><div><div class='wcba-filter' /></div></div></div>").insertBefore('#picker_pa_materials, #picker_pa_materials-shirt, #picker_pa_materials-sports-jackets, #picker_pa_cufflinks, #picker_pa_silk-ties, #picker_pa_silk-pocket-squares');
    $(source+', '+source2+', '+source3).clone().addClass('wcba-filter-content').insertAfter(container1+'.wcba-filter');
    $("<div class='inactive-container'><input></div>").insertAfter(container1+'.wcba-filter-content');
    $("<div class='wcba-pagination'><ul class='pagination'></ul></div>").insertAfter(container1+'.wcba-filter-content');
    $("<div class='button'><button>Confirm</button></div>").insertAfter(container1+'.wcba-pagination');
    $("<div class='window'></div>").insertAfter(container1+'.wcba-filter');
    $(container1+".wcba-filter-content a").removeAttr('href');
    $('<div class="zoom">+</div>').insertAfter(container1+'.swatch-control > .swatch-wrapper img');
    $("<p></p>").insertBefore(container1 + '.wcba-filter');

    var pageSize = 8;
    var divideBy = pageSize;
    var sort_class = ".variations "+source+" p.description, .variations "+source2+" p.description, .variations "+source3+" p.description"; // Source of sorting classes; etc. data-class=""
    var sort_class_data = "description"; // data-* of class
    var sort_button = ".variations "+source+", .variations "+source2+", .variations "+source3; // Where to append button inside of; etc. .superman, .superbro
    var sort_button_text = "Choose Materials";

    var desc_array = [];
    // Get Material Category from Material Description
    $(sort_class).each(function(){
        var desc = $(this).data(sort_class_data);
        if (desc_array.includes(desc)){return;}
        desc_array.push(desc);
    });

    // Create Sorting Options
    var total = $(desc_array).length;
    // $("<p class='wcba-button'>"+sort_button_text+"</p>").appendTo(sort_button);
    if (total > 1) {
        $(desc_array).each(function (i) {
            if (i === 0) {
                $("<div class='wcba'>" + this + "</div>").appendTo(container1 + '.wcba-filter');
            }
            else if (i === total - 1) {
                $("<div class='wcba'>" + this + "</div>").appendTo(container1 + '.wcba-filter');
                $("<div class='wcba active'>All</div>").appendTo(container1 + '.wcba-filter');

            }
            else {
                $("<div class='wcba'>" + this + "</div>").appendTo(container1 + '.wcba-filter');
            }
        });
    }

    // STATIC :

    // Sort On-click
    $(document).on("click", container1+'div.wcba', function(){
        $(container1+'div.wcba').removeClass('active'); // Maybe not need
        $(this).addClass("active"); //Maybe not need
        var value = $(this).text();

        if (value === 'All'){
            $(container1+'.wcba-filter-content > *').show();
            $(container1+' .inactive-container .description').parent().parent().appendTo(container1+'.wcba-filter-content');
            wcba_paginate(container1, 1);
        }
        else{
            $(container1+'.wcba-filter-content > *').show();
            $(container1+'.wcba-filter-content .description').not(container1+'.description[data-description="'+value+'"]').parent().parent().insertAfter(container1+'.inactive-container input');
            $(container1+' .inactive-container .description[data-description="'+value+'"]').parent().parent().appendTo(container1+' .wcba-filter-content');
            wcba_paginate(container1, 1);
        }
    });

    // Pagination
    function generate_pagination_html(currentPage, totalPages) {
        var prevText = '&laquo;';
        var nextText ='&raquo;';
        var ellipsisText = '&hellip;';

        var disableClassName = 'pager-disabled';
        var activeClassName = 'pager-current';

        var pageRange = 4;
        var rangeStart = currentPage - pageRange;
        var rangeEnd = currentPage + pageRange;

        if (rangeEnd > totalPages) {
            rangeEnd = totalPages;
            rangeStart = totalPages - pageRange * 2;
            rangeStart = rangeStart < 1 ? 1 : rangeStart;
        }

        if (rangeStart <= 1) {
            rangeStart = 1;
            rangeEnd = Math.min(pageRange * 2 + 1, totalPages);
        }

        var i;
        var html = '';

        if (currentPage <= 1) {
            html += '<li class="' + disableClassName + '">' + prevText + '<\/li>';
        } else {
            html += '<li class="pager" data-num="' + (currentPage - 1) + '" title="Previous page">' + prevText + '<\/li>';
        }

        if (rangeStart <= 3) {
            for (i = 1; i < rangeStart; i++) {
                if (i == currentPage) {
                    html += '<li class="pager ' + activeClassName + '" data-num="' + i + '">' + i + '<\/li>';
                } else {
                    html += '<li class="pager" data-num="' + i + '">' + i + '<\/li>';
                }
            }
        } else {
            html += '<li class="pager" data-num="1">1<\/li>';
            html += '<li class="pager'+ disableClassName + '">' + ellipsisText + '<\/li>';
        }

        for (i = rangeStart; i <= rangeEnd; i++) {
            if (i == currentPage) {
                html += '<li class="pager ' + activeClassName + '" data-num="' + i + '">' + i + '<\/li>';
            } else {
                html += '<li class="pager" data-num="' + i + '">' + i + '<\/li>';
            }
        }

        if (rangeEnd >= totalPages - 2) {
            for (i = rangeEnd + 1; i <= totalPages; i++) {
                html += '<li class="pager" data-num="' + i + '">' + i + '<\/li>';
            }
        } else {
            html += '<li class="pager '+ disableClassName + '">' + ellipsisText + '<\/li>';
            html += '<li class="pager" data-num="' + totalPages + '">' + totalPages + '<\/li>';
        }

        if (currentPage >= totalPages) {
            html += '<li class="' + disableClassName + '">' + nextText + '<\/li>';
        } else {
            html += '<li class="pager" data-num="' + (currentPage + 1) + '" title="Next page">' + nextText + '<\/li>';
        }

        return html;
    }

    function hide_results(container, page, pageSize) {
        var calc = parseInt(page * pageSize);
        var calc1 = parseInt(calc + 2);
        var calc2 = parseInt(calc - pageSize);
        var calc3 = parseInt(calc2 + 1);

        $(container+'.wcba-filter-content > *').show();
        $(container+'.wcba-filter-content > *:nth-child(n+'+calc1+')').hide();
        $(container+'.wcba-filter-content > *:nth-child(-n+'+calc3+')').hide();
    }


    function wcba_paginate(container, page) {
        var totalNumber = $(container+'.wcba-filter-content .select-option').length;
        var pageSize = 8;
        var totalPages = Math.floor((totalNumber-1)/pageSize)+1;

        var rangeStart = 3;
        var rangeEnd = 8;

        var html = generate_pagination_html(page, totalPages, rangeStart, rangeEnd);
        $(container).find('ul').first().html(html);
        hide_results(container, page, pageSize);

    } // End paginate

    // On-click Pagination
    $(document).on("click", container1+'.wcba-pagination li', function(){
        var clickedPage = parseInt($(this).attr('data-num'));
        wcba_paginate(container1, clickedPage);
    });

    // Turn on filter box
    $(document).on("click", source+' .wcba-button, '+source2+' .wcba-button', function(){
        $(container1).addClass("active");
        $('body').addClass("filter-active");
    });
    // Turn off filter box
    $(document).on("click", 'body.filter-active .window, '+container1+'> div > p, '+container1+'.button > button', function(){
        $('body').removeClass("filter-active");
        $(container1).removeClass("active");
    });
    // Select Option
    $(document).on("click", container1+'.wcba-filter-content .select-option', function(){
        var title = $(this).find('a').attr('title');
        $(container1+'.wcba-filter-content .select-option').not(this).removeClass('wcba-selected');
        $(this).toggleClass('wcba-selected');
        $('.variations .value > .swatch-control a.swatch-anchor[title="'+title+'"]').click();
    });
    // Paginate on init
    //wcba_paginate(container1, 1);
    $(container1+'.wcba-filter div:nth-last-child(1)').click();

    // Static:
    // Setup Template lining

    var container2 = ".wcba-filter-container.container-2 ";
    var source = "#picker_pa_fabrics-suit";
    var source2 = "#picker_pa_fabrics-sports-jacket";
    var source3 = "#picker_pa_fabrics-tuxedo";
    var source4 = "#picker_pa_cufflinks";
    var source5 = "#picker_pa_silk-ties";
    var source6 = "#picker_pa_silk-pocket-squares";
    var source7 = "#picker_pa_tie-bars";
    var source8 = "#picker_pa_collar-stays";
    var source9 = "#picker_pa_belts";

    $("<div class='wcba-filter-container container-2'><div><div class='wcba-filter' /></div></div></div>").insertBefore('#picker_pa_fabrics-suit, #picker_pa_fabrics-sports-jacket, #picker_pa_fabrics-tuxedo, #picker_pa_cufflinks, #picker_pa_silk-ties, #picker_pa_silk-pocket-squares, #picker_pa_tie-bars, #picker_pa_collar-stays, #picker_pa_belts');
    $(source+", "+source2+", "+source3+", "+source4+", "+source5+", "+source6+", "+source7+", "+source8+", "+source9).clone().addClass('wcba-filter-content').insertAfter(container2+'.wcba-filter');
    $("<div class='inactive-container'><input></div>").insertAfter(container2+'.wcba-filter-content');
    $("<div class='wcba-pagination'><ul></ul></div>").insertAfter(container2+'.wcba-filter-content');
    $("<div class='button'><button>Confirm</button></div>").insertAfter(container2+'.wcba-pagination');
    $("<div class='window'></div>").insertAfter(container2+'.wcba-filter');
    $(container2+".wcba-filter-content a").removeAttr('href');
    $('<div class="zoom">+</div>').insertAfter(container2+'.swatch-control > .swatch-wrapper img');
    $("<p></p>").insertBefore(container2+'.wcba-filter');

    var sort_class = ".variations "+source+" p.description, .variations "+source2+" p.description,  .variations "+source3+" p.description,  .variations "+source4+" p.description,  .variations "+source5+" p.description,  .variations "+source6+" p.description"; // Source of sorting classes; etc. data-class=""
    var sort_class_data = "description"; // data-* of class


    var desc_array = [];
    // Get Material Category from Material Description
    $(sort_class).each(function(){
        var desc = $(this).data(sort_class_data);
        if (desc_array.includes(desc)){return;}
        desc_array.push(desc);
    });

    // Create Sorting Options
    var total = $(desc_array).length;
    if (total > 1){
        $(desc_array).each(function(i){
            if ( i === 0) {

                $("<div class='wcba'>"+this+"</div>").appendTo(container2+'.wcba-filter');
            }
            else if (i === total - 1){
                $("<div class='wcba'>"+this+"</div>").appendTo(container2+'.wcba-filter');
                $("<div class='wcba active'>All</div>").appendTo(container2+'.wcba-filter');

            }
            else {
                $("<div class='wcba'>"+this+"</div>").appendTo(container2+'.wcba-filter');
            }
        });
    }


    // STATIC :

    // Sort On-click
    $(document).on("click", container2+'div.wcba', function(){
        $(container2+'div.wcba').removeClass('active'); // Maybe not need
        $(this).addClass("active"); //Maybe not need
        // $(this).insertBefore('.wcba-filter option:nth-child(1)');
        var value = $(this).text();
        if (value === 'All'){
            $(container2+'.wcba-filter-content > *').show();
            $(container2+' .inactive-container .description').parent().parent().appendTo(container2+'.wcba-filter-content');
            wcba_paginate(container2, 1);
        }
        else{
            $(container2+'.wcba-filter-content > *').show();
            $(container2+'.wcba-filter-content .description').not(container2+'.description[data-description="'+value+'"]').parent().parent().insertAfter(container2+'.inactive-container input');
            $(container2+' .inactive-container .description[data-description="'+value+'"]').parent().parent().appendTo(container2+' .wcba-filter-content');
            wcba_paginate(container2, 1);
        }
    });

    // On-click Pagination
    $(document).on("click", container2+'.wcba-pagination li', function(){
        var clickedPage = parseInt($(this).attr('data-num'));
        wcba_paginate(container2, clickedPage);

    });

    // Turn on filter box
    $(document).on("click", source+' .wcba-button, '+source2+' .wcba-button, '+source3+' .wcba-button, '+source4+' .wcba-button, '+source5+' .wcba-button, '+source6+' .wcba-button', function(){
        $(container2).addClass("active");
        $('body').addClass("filter-active");
    });
    // Turn off filter box
    $(document).on("click", 'body.filter-active .window, '+container2+'> div > p, '+container2+'.button > button', function(){
        $('body').removeClass("filter-active");
        $(container2).removeClass("active");
    });
    // Select Option
    $(document).on("click", container2+'.wcba-filter-content .select-option', function(){
        var title = $(this).find('a').attr('title');
        $(container2+'.wcba-filter-content .select-option').not(this).removeClass('wcba-selected');
        $(this).toggleClass('wcba-selected');
        $('.variations .value > .swatch-control a.swatch-anchor[title="'+title+'"]').click();
    });
    // Paginate on init
    wcba_paginate(container2, 1);


    // Zoom in function
    $('<div class="wcba-fabric-zoom"><img src="" /></div><div class="wcba-window"></div>').appendTo('body');

    $(document).on("click", '.wcba-filter-container .zoom', function(){
        var img_element = $(this).prev();
        var img_src = $(img_element).attr('src');
        var img_src2 = img_src.replace('-200x169','');
        $('.wcba-fabric-zoom img').attr('src',img_src2);
        $('.wcba-fabric-zoom, .wcba-window').addClass('active');
    });

    $(document).on("click", '.wcba-window.active', function(){
        $('.wcba-fabric-zoom, .wcba-window').removeClass('active');
    });
});
