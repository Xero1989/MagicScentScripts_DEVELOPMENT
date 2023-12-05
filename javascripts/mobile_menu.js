jQuery(document).ready(function () {
    console.log("Mobile Menu Scripts LOADED");

    mobile_menu_add_icons();
    
    add_custom_search_bar();

    mobile_menu_apply_dinamic_style();

});


function mobile_menu_add_icons() {
    jQuery("header#qodef-page-mobile-header div#qodef-page-mobile-header-inner").prepend("<img src='https://themagicscent.com/wp-content/uploads/2023/11/icon_search.png' id='img_menu_search_icon' style='width: 1.5em;cursor:pointer'  onclick='javascript:toggle_mobile_search_form()' />");
    jQuery("header#qodef-page-mobile-header div#qodef-page-mobile-header-inner").prepend("<img src='https://themagicscent.com/wp-content/uploads/2023/11/icon-x.png' id='img_menu_search_close_icon' style='cursor:pointer;display:none;margin-right: 1em;width: 1.3em;'  onclick='javascript:toggle_mobile_search_form()' />");
    // let search_html =
    //     '<div id="woocommerce_product_search-4" class="mobile_search_form widget woocommerce widget_product_search qodef-top-bar-widget" style="display:none;cursor:pointer;background-color:white; position:absolute;top:3.5em;laft:0;padding-left: 3em;width:100%" ><form role="search" method="get" class="qodef-search-form qodef-woo-product-search" action="https://magicscentdev.wpengine.com/">	<label class="screen-reader-text" for="woocommerce-product-search-field-0">Search for:</label>	<div class="qodef-search-form-inner clear">		<input type="search" id="woocommerce-product-search-field-0" class="qodef-search-form-field" placeholder="Search" value="" name="s">		<button type="submit" class="qodef-search-form-button" style="right: unset;" role="link"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="25px" viewBox="0 0 30 25" enable-background="new 0 0 30 25" xml:space="preserve"><circle cx="15.224" cy="11.08" r="5.412"></circle><line x1="18.275" y1="15.55" x2="20.454" y2="18.72"></line></svg></button>	</div>	<input type="hidden" name="post_type" value="product"></form></div>';
    // jQuery("header#qodef-page-mobile-header div#qodef-page-mobile-header-inner").append(search_html);
    jQuery("header#qodef-page-mobile-header div#qodef-page-mobile-header-inner").prepend("<img src='https://themagicscent.com/wp-content/uploads/2023/11/icone-menu.png' id='img_menu_sandwich_icon' style='cursor:pointer;margin-right: 1em;width: 1.5em;' onclick='javascript:toggle_mobile_menu()' />");
    jQuery("header#qodef-page-mobile-header div#qodef-page-mobile-header-inner").prepend("<img src='https://themagicscent.com/wp-content/uploads/2023/11/icon-x.png' id='menu_close_icon' style='cursor:pointer;display:none;margin-right: 1em;width: 1.3em;' onclick='javascript:toggle_mobile_menu()' /> ");
    jQuery(
        "header#qodef-page-mobile-header div#qodef-page-mobile-header-inner"
    ).append(
        "<img src='https://themagicscent.com/wp-content/uploads/2023/11/icon_bag.png' class='cfw-side-cart-open-trigger menu_bag_cart_icon' style='cursor:pointer;width: 1.5em;' />"
    );
}

function mobile_menu_apply_dinamic_style() {
    let height_adminbar = 0;
    if (jQuery("#wpadminbar").css("height") !== undefined)
        height_adminbar = jQuery("#wpadminbar").css("height").replace("px", "");

    let height_mobile_header = 0;
    if (jQuery("header#qodef-page-mobile-header").css("height") !== undefined)
        height_mobile_header = jQuery("header#qodef-page-mobile-header").css("height").replace("px", "");

    let height_top_bannner = 0;
    if (jQuery('div.ancr-group').css('height') !== undefined)
        height_top_bannner = jQuery('div.ancr-group').css('height').replace('px', '');

    let mobile_menu_bar_margin_top = parseInt(height_adminbar) + parseInt(height_top_bannner);
    let navigation_bar_margin_top = parseInt(height_adminbar) + parseInt(height_mobile_header) + parseInt(height_top_bannner);

    // alert("height_adminbar: "+height_adminbar);
    // alert("height_mobile_header: "+height_mobile_header);
    // alert("height_top_bannner: "+height_top_bannner);
    // alert("navigation_bar_margin_top: "+navigation_bar_margin_top);

    jQuery("aside.gm-navigation-drawer").css("top", navigation_bar_margin_top + "px");
    jQuery("aside.gm_navigation_drawer_custom_search_barside").css("top", navigation_bar_margin_top + "px");
    jQuery("#qodef-page-mobile-header").css("top", mobile_menu_bar_margin_top + "px");
   
}

function toggle_mobile_menu() {
    //console.log("toggle mobile menu");
    setTimeout(function () {

        // Toggle Sandwich menu
    jQuery("header#qodef-page-mobile-header img#img_menu_sandwich_icon").toggle();
    jQuery("header#qodef-page-mobile-header img#menu_close_icon").toggle();

       // Toggle Search Icon
    if (jQuery("header#qodef-page-mobile-header img#img_menu_search_icon").css("display") == "none") {
        jQuery("header#qodef-page-mobile-header img#img_menu_search_icon").toggle();
        jQuery("header#qodef-page-mobile-header img#img_menu_search_close_icon").toggle();

        jQuery('.gm_navigation_drawer_custom_search_barside').addClass('gm-navigation-drawer--open gm-navigation-drawer--delay gm-navigation-drawer--left');                
    }      

        // Wait until search bar is completly hidden
        let interval = setInterval(function () {
            console.log("checking if search bar is hidden");
            if (jQuery('.gm_navigation_drawer_custom_search_barside').css('transform') != "none") {

                // Show the menu barside
                if (jQuery("header#qodef-page-mobile-header img#img_menu_sandwich_icon").css("display") == "none") {
                    jQuery("aside.gm-navigation-drawer").addClass( "gm-navigation-drawer--open gm-navigation-drawer--delay" );
                } else {
                    jQuery("aside.gm-navigation-drawer").removeClass( "gm-navigation-drawer--open gm-navigation-drawer--delay" );                    
                }        

                clearInterval(interval);
            }
        },300);

        
    }, 200);

    // setTimeout(function () {
    //   jQuery("header span.gm-menu-btn").click();
    // }, 200);
}

function toggle_mobile_search_form() {
    // if (jQuery("header#qodef-page-mobile-header img#img_menu_sandwich_icon").css("display") == "none") {
    //     jQuery("header#qodef-page-mobile-header img#img_menu_sandwich_icon").toggle();
    //     jQuery("header#qodef-page-mobile-header img#menu_close_icon").toggle();     
    // }

      // Toogle search icon and close icon
      jQuery("header#qodef-page-mobile-header img#img_menu_search_icon").toggle();
      jQuery("header#qodef-page-mobile-header img#img_menu_search_close_icon").toggle();

       
    if (jQuery("header#qodef-page-mobile-header img#img_menu_sandwich_icon").css("display") == "none") {        
        jQuery("header#qodef-page-mobile-header img#img_menu_sandwich_icon").toggle();
        jQuery("header#qodef-page-mobile-header img#menu_close_icon").toggle();

        jQuery("aside.gm-navigation-drawer").removeClass( "gm-navigation-drawer--open gm-navigation-drawer--delay" );                    
    }

    // Wait until search bar is completly hidden
    let interval = setInterval(function () {
        if (jQuery('.gm_navigation_drawer').css('transform') != "none") {           
           
          if (jQuery("header#qodef-page-mobile-header img#img_menu_search_icon").css("display") == "none") {
            jQuery('.gm_navigation_drawer_custom_search_barside').removeClass('gm-navigation-drawer--open gm-navigation-drawer--delay gm-navigation-drawer--left');
         }else{
            jQuery('.gm_navigation_drawer_custom_search_barside').addClass('gm-navigation-drawer--open gm-navigation-drawer--delay gm-navigation-drawer--left');        
         }

            clearInterval(interval);
        }
    },300);




   

    // jQuery("aside div.gm-search").click();
    

    // if (jQuery("header#qodef-page-mobile-header .mobile_search_form").css("display") == "none") {

    //   //If nav menu is visible, close it
    //   if(jQuery("header#qodef-page-mobile-header img#menu_close_icon").css("display") != "none"){
    //     jQuery("header#qodef-page-mobile-header .qodef-opener-icon").click();
    //     jQuery("header#qodef-page-mobile-header img#menu_close_icon").toggle();
    //     jQuery("header#qodef-page-mobile-header img#img_menu_sandwich_icon").toggle();
    //   }

    //     //If sidecart bar is visible, close it
    //     // if(jQuery("#cfw-side-cart").css("visibility") == "visible"){
    //     //   jQuery('#cfw-side-cart-open-trigger').click();
    //     // }

    //     // Show or close search form
    //   jQuery("header#qodef-page-mobile-header .mobile_search_form").fadeIn(800);
    // } else
    //   jQuery("header#qodef-page-mobile-header .mobile_search_form").fadeOut(800);
}

function add_custom_search_bar() {

let style = 'width:100%; height: calc(100% - 46px);background-color: rgba(255, 255, 255, 1);position: fixed;transition: transform cubic-bezier(0.7, 0, 0.3, 1) 0.4s, -webkit-transform cubic-bezier(0.7, 0, 0.3, 1) 0.4s;will-change: transform;z-index: 999999;';        

let custom_aside_search_bar = '<aside class="gm_navigation_drawer_custom_search_barside gm-navigation-drawer--mobile gm-mobile-submenu-style-slider gm-navigation-drawer--left" style="'+style+'">'+
'<div class="gm-grid-container d-flex flex-column h-100 ps" data-ps-id="0">'+
    '<div class="gm-menu-btn-close-mobile-drawer gm-hamburger-close" aria-label="close"><span class="gm-menu-btn"> <span class="gm-menu-btn__inner"> <i class="fa fa-times"></i> </span></span></div>'+
    '<div class="gm-mobile-menu-container">'+
        '<ul id="menu-main-mobile-menu-1" class="gm-navbar-nav" style="list-style: none;">'+

        '<div onclick="javascript:toggle_mobile_menu()">'+
        '<span class="gm-caret" aria-label="dropdown" style="display: inline-block; padding-left:0 !important;"><i class="fa fa-fw fa-angle-left"></i></span>'+
        '<label style="font-weight: 600;color: black;font-size: 18px;font-family: Work Sans;margin-top: 1em;margin-bottom: 1.5em;display: inline-block;">Menu</label>' +
        '</div>'+

        '<img src="https://themagicscent.com/wp-content/uploads/2023/11/icon_search.png" style="position: absolute; right: 2.3em; margin-top: 0.9em;z-index: 4;" onclick="javascript:jQuery(\'form.menu_mobile_search_form\').submit();">' +
        '<form action="https://magicscentdev.wpengine.com/" method="get" class="gm-search-wrapper-form menu_mobile_search_form">' +
        '<div class="gm-form-group">' +
        '<input type="text" name="s" style="border: 1px solid black; border-radius: 25px !important; padding: 1em 4em 1em 2em;margin-bottom: 2em;" placeholder="Search..." class="menu_mobile_search_form_input">' +
        '</div>' +
        '</form>' +
        '<div class="menu_mobile_search_suggested_words" style="margin-bottom: 2em; margin-top: 0.5em; font-weight: 400; color: #707070;">Suggested Searches</div>'+

            '<li id="menu-item-mobile-69767" class="menu-item menu-item-type-custom menu-item-object-custom gm-menu-item gm-menu-item--lvl-0" style="margin-bottom: 1.5em;"><a href="/product-category/scent-marketing" class="gm-anchor" role="link" style="text-transform:unset !important;"><span class="gm-menu-item__txt-wrapper"><span class="gm-menu-item__txt">Scents</span></span></a></li>'+
            '<li id="menu-item-mobile-69767" class="menu-item menu-item-type-custom menu-item-object-custom gm-menu-item gm-menu-item--lvl-0" style="margin-bottom: 1.5em;"><a href="/product-category/aroma-diffusers/" class="gm-anchor" role="link" style="text-transform:unset !important;"><span class="gm-menu-item__txt-wrapper"><span class="gm-menu-item__txt">Diffusers</span></span></a></li>'+
            '<li id="menu-item-mobile-69767" class="menu-item menu-item-type-custom menu-item-object-custom gm-menu-item gm-menu-item--lvl-0" style="margin-bottom: 1.5em;"><a href="/product-category/scent-sample-kit" class="gm-anchor" role="link" style="text-transform:unset !important;"><span class="gm-menu-item__txt-wrapper"><span class="gm-menu-item__txt">Scent Sample Pack</span></span></a></li>'+
            '<li id="menu-item-mobile-69767" class="menu-item menu-item-type-custom menu-item-object-custom gm-menu-item gm-menu-item--lvl-0" style="margin-bottom: 1.5em;"><a href="/hotel-scenting" class="gm-anchor" role="link" style="text-transform:unset !important;"><span class="gm-menu-item__txt-wrapper"><span class="gm-menu-item__txt">Hotel Scenting</span></span></a></li>'+
            '<li id="menu-item-mobile-69767" class="menu-item menu-item-type-custom menu-item-object-custom gm-menu-item gm-menu-item--lvl-0" style="margin-bottom: 1.5em;"><a href="/product-category/hvac-scent-diffusers" class="gm-anchor" role="link" style="text-transform:unset !important;"><span class="gm-menu-item__txt-wrapper"><span class="gm-menu-item__txt">HVAC Systems</span></span></a></li>'+

        '</ul>'+
    '</div>'+

    '<div class="flex-grow-1"></div>'+

    '<div class="gm-mobile-action-area-wrapper d-flex justify-content-center align-items-center text-center mb-4 mt-5">'+
        '<div class="gm-search fullscreen">'+
            '<i class="gm-icon gmi gmi-zoom-search"></i>'+
            '<span class="gm-search__txt">Search</span>'+
        '</div>'+
    '</div>'+
    '<div class="ps__rail-x" style="left: 0px; bottom: 0px;">'+
        '<div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>'+
    '</div>'+
    '<div class="ps__rail-y" style="top: 0px; right: 0px;">'+
        '<div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>'+
    '</div>'+
'</div>'+
'<div class="gm-mobile-postwrap"></div>'+
'</aside>';

    jQuery('aside.gm-navigation-drawer').after(custom_aside_search_bar);

    return;



    // jQuery('.gm-mobile-menu-container').prepend('<label style="font-weight: 600;color: black;font-size: 18px;font-family: Work Sans;margin-top: 1em;margin-bottom: 1.5em;">Menu</label>' +
    //     '<img src="https://themagicscent.com/wp-content/uploads/2023/11/icon_search.png" style="position: absolute; right: 2.3em; margin-top: 0.9em;z-index: 4;" onclick="javascript:jQuery(\'form.menu_mobile_search_form\').submit();">' +
    //     '<form action="https://magicscentdev.wpengine.com/" method="get" class="gm-search-wrapper-form menu_mobile_search_form">' +
    //     '<div class="gm-form-group">' +
    //     '<input type="text" name="s" style="border: 1px solid black; border-radius: 25px !important; padding: 1em 4em 1em 2em;margin-bottom: 2em;" placeholder="Search..." class="menu_mobile_search_form_input">' +
    //     '</div>' +
    //     '</form>' +

    //     '<div class="menu_mobile_search_suggested_words" style="margin-bottom: 1em; font-weight: 400; color: #707070;">Suggested Searches</div>');   

    // // let list_word = ["manzana", "pera", "naranja", "mandarina"];

    // jQuery('.menu_mobile_search_form_input').keyup(function (e) {
    //     let code = (e.keyCode ? e.keyCode : e.which);
    //     if (code == 13) {
    //         jQuery('.menu_mobile_search_form').submit();
    //         return;
    //     }
    //     let input_value = jQuery(this).val().toLowerCase();

    //     console.log("input value: " + input_value);

    //     jQuery('.menu_mobile_search_suggested_words').empty();

    //     if (input_value.length == 0) {
    //         jQuery('.menu_mobile_search_suggested_words').append('Suggested Searches');
    //     } else product_categories.forEach(element => {
    //         let category_name = element['name'].toLowerCase();

    //         if (category_name.includes(input_value)) {
    //             console.log("suggested search: " + element['name']);

    //             jQuery('.menu_mobile_search_suggested_words').append('<div class="menu_mobile_search_suggested_word" style=" display: inline-block; background-color: lightgrey; padding: 0.2em 0.7em 0.1em; color: black; border-radius: 25px; margin: 0 0.5em 0.5em 0;" onclick="javascript: jQuery(\'.menu_mobile_search_form_input\').val(\'' + element['name'] + '\'); jQuery(\'.menu_mobile_search_form\').submit();">' + element['name'] + '</div>');
    //         }
    //     });

    // });

}