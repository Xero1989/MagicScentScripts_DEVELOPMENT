<?php

/*
Plugin Name: Magic Scent Scripts
Plugin URI:
Description: Magic Scent Scripts
Version: 0.1
Author: Jorge Blanco Suárez
Author URI: https://xerocode.net/curriculum
License: GPL2+
 */



define('MSS_PATH', __DIR__);

require 'useful.php';

// Filter for AUTHORIZE.NET Gateway
add_filter('wc_payment_gateway_authorize_net_cim_activate_apple_pay', '__return_true');

// Filters on category product page
add_action('woocommerce_before_shop_loop', 'action_woocommerce_before_shop_loop');

function action_woocommerce_before_shop_loop()
{
    $current_category = get_queried_object();

    $id = $current_category->term_id;

    global $post;

    $terms = get_the_terms($post->ID, 'product_cat');

    if (is_product_category($id)) {

        $custom_style = '#qodef-page-inner{
            padding-top:3em;
    }';

        // echo $terms[0]->name;

        if ($terms[0]->name == "Scent Diffusers" || $terms[0]->name == "Best Sellers Diffuser" || $terms[0]->name == "Large Room Diffusers" || $terms[0]->name == "Large Room Diffusers" || $terms[0]->name == "HVAC Scent Diffusers" || $terms[0]->name == "Best Sellers Diffusers" || $terms[0]->name == "Cars") {

            $site_url = get_site_url();

            echo '
            <style>'
                . $custom_style .
                '.filter_diffuser {
            border-collapse: separate;
            margin: 5em 0;
            text-align: center;
            }

            .filter_diffuser #select_filter_diffuser,.filter_diffuser #bt_filter_diffuser {
                border-radius: 40px;
                width: 43%;
            }

            .filter_diffuser a {
                padding: 0.4em;
                background-color: transparent;
                color: black;
                text-align: center;
                display: block;
                margin: 0 auto;
                font-size: 1.2em;
                border-radius: 40px;
                border: solid 1px black;
            }
            .filter_diffuser a:hover {
                color:#000000;
                background-color: #B1B1B1;
            }

            .filter_diffuser span {
                display: block;
                margin-top: 1em;
                color: #707070;
                font-family: "Helvetica", Sans-serif;
                font-style: italic;
                font-size: 15px;
                line-height: 1.66em;
                font-weight: 600;
            }


            .filter_diffuser tbody {
                width: 100%;
                display: inline-table;
            }

            .filter_diffuser td {
                text-align: center;
                width: 25%;
                border: none;
            }

            #select_filter_diffuser{
                width: fit-content;
                display: inline-block;     
                padding: 8px !important;        
            }

            #bt_filter_diffuser{
                width: fit-content;                
                display: inline-block;
                margin-left: 1em;
            }

            .desktop_view {
                display: block;
            }

            .tablet_view {
                display: none;
            }

            .mobile_view {
                display: none;
            }

            @media screen and (min-width: 581px) and (max-width: 1200px) {
                .desktop_view {
                    display: none !important;
                }

                .tablet_view {
                    display: block !important;
                }

                .mobile_view {
                    display: none !important;
                }
            }

            @media screen and (max-width: 580px) {
                .desktop_view {
                    display: none !important;
                }

                .tablet_view {
                    display: none !important;
                }

                .mobile_view {
                    display: block !important;
                }
            }

             @media screen and (max-width: 281px) {
               #bt_filter_diffuser{
                margin: 1em 0;
                display: block;
                }

                .filter_diffuser #select_filter_diffuser,.filter_diffuser #bt_filter_diffuser {                    
                    width: 100%;
                }
            }
         </style>

            <table class="filter_diffuser desktop_view">
                   <tr>
                   <td>
                       <a href="' . $site_url . '/product-category/best-sellers-diffusers">BEST SELLERS</a>
                   </td>
                   <td>
                       <a href="' . $site_url . '/product-category/small-room-diffusers">SHOP SMALL SPACES</a>
                       <span>up to 1,000 sq.ft</span>
                   </td>
                   <td>
                       <a href="' . $site_url . '/product-category/medium-room-diffusers">SHOP MEDIUM SPACES</a>
                       <span>up to 5,000 sq.ft</span>
                   </td>
                   <td>
                       <a href="' . $site_url . '/product-category/large-room-diffusers">SHOP LARGE SPACES</a>
                       <span>up to 15,000 sq.ft</span>
                   </td>

                </tr>

                <tr>
                   <td> </td>
                   <td>
                       <a href="' . $site_url . '/product-category/hvac-scent-diffusers">SHOP HVAC SYSTEMS</a>
                       <span>1,000 sq.ft to 15,000 sq.ft</span>
                   </td>
                   <td>
                       <a href="' . $site_url . '/product-category/cars">CARS</a>
                   </td>
                   <td> </td>
                </tr>
           </table>

           <table class="filter_diffuser tablet_view">
                <tr>
                   <td>
                      <a href="' . $site_url . '/product-category/small-room-diffusers">SHOP SMALL SPACES</a>
                      <span>up to 1,000 sq.ft</span>
                   </td>
                   <td>
                      <a href="' . $site_url . '/product-category/medium-room-diffusers">SHOP MEDIUM SPACES</a>
                      <span>up to 5,000 sq.ft</span>
                   </td>
                </tr>
                <tr>
                   <td>
                      <a href="' . $site_url . '/product-category/large-room-diffusers">SHOP LARGE SPACES</a>
                      <span>up to 15,000 sq.ft</span>
                   </td>
                   <td>
                      <a href="' . $site_url . '/product-category/hvac-scent-diffusers">SHOP HVAC SYSTEMS</a>
                      <span>1,000 sq.ft to 15,000 sq.ft</span>
                   </td>
                </tr>
                <tr>
                   <td>
                     <a href="' . $site_url . '/product-category/best-sellers-diffusers">BEST SELLERS</a>
                   </td>
                   <td>
                     <a href="' . $site_url . '/product-category/cars">CARS</a>
                   </td>
                </tr>
            </table>

            <div class="filter_diffuser mobile_view">

            <select id="select_filter_diffuser">            
            <option value="">---Filter By---</option>
            <option value="best_sellers">BEST SELLERS</option>
            <option value="small">SHOP SMALL SPACES</option>
            <option value="medium">SHOP MEDIUM SPACES</option>
            <option value="large">SHOP LARGE SPACES</option>
            <option value="hvac">SHOP HVAC SYSTEMS</option>            
            <option value="cars">CARS</option>
            </select>

            <a id="bt_filter_diffuser" href="#" onclick="javascript:diffusers_filter_by()">Filter</a>

            </div>       
            ';
        }
    }
}

add_action('woocommerce_after_shop_loop_item_title', 'action_woocommerce_after_shop_loop_item_title');

function action_woocommerce_after_shop_loop_item_title()
{

    // $current_page_object = get_queried_object();
    // $name_category = $current_page_object->name;   

    global $wp;
    $current_url = add_query_arg(array(), $wp->request);
    
    if ($current_url == "product-category/aroma-diffusers" || $current_url == "product-category/best-sellers-diffusers" || $current_url == "product-category/small-room-diffusers" || $current_url == "product-category/medium-room-diffusers" || $current_url == "product-category/large-room-diffusers" || $current_url == "product-category/hvac-scent-diffusers" || str_contains($current_url,'shop/aroma-diffusers') ) {
        global $product;
        $id_product = $product->id;

        $value = get_field('properties_resume', $id_product);        

        echo "<div class='product-meta'><span class='product-meta-properties'>" . $value . " </span></div>  ";
    }
}



add_filter('woocommerce_get_price_html', 'custom_price_html',10,2);
// add_filter( 'woocommerce_variable_price_html', 'custom_price_html', 10, 2 );
function custom_price_html($price,$product)
{     
    
    $id_product = $product->id;    

    global $wp;
    $current_url = add_query_arg(array(), $wp->request);


      if (str_contains($current_url, 'shop/aroma-diffusers') || str_contains($current_url, 'shop/scent-marketing')){
      
        $regular_price = intval($product->get_regular_price());
        $sale_price = intval($product->get_sale_price());

      if ($regular_price > 0 && $sale_price > 0) {       

        $temp = $regular_price - $sale_price;
        $sale_percentage = $temp * 100 / $regular_price;
        
        $sale_percentage = round($sale_percentage, 2);    
        
        MSS_Useful::log('sale percentage ');
        MSS_Useful::log($sale_percentage);
        
  //20% badge html
  $percent_badge_html = '<div style="margin-left: 1em; font-size: 0.6em; color: white; background: black; border-radius: 35px; padding: 0.2em 0.6em 0.2em 0.4em; display: inline-block; vertical-align: middle;line-height: 1em;"> - '.$sale_percentage.'%</div>';
  
  $price .= $percent_badge_html;

    } 
}
    
    if ($current_url == "product-category/scent-marketing" || $current_url == "product-category/bestsellers" || $current_url == "product-category/scent-marketing/hotel-collection" || $current_url == "product-category/scent-marketing/luxury-fragrances" || $current_url == "product-category/scent-marketing/citrus" || $current_url == "product-category/scent-marketing/floral" || $current_url == "product-category/scent-marketing/fresh" || $current_url == "product-category/scent-marketing/gourmand" || $current_url == "product-category/scent-marketing/wood" || str_contains($current_url, 'shop/scent-marketing')) {
       
        // $id_product = $product->id;

        $properties_resume = get_field('properties_resume', $id_product);

        $price .= '<div class="scents_custom_properties"><span>' . $properties_resume . '</span></div>';
    } 
    
    return $price;

}


add_action('woocommerce_after_shop_loop', 'action_woocommerce_after_shop_loop');
function action_woocommerce_after_shop_loop()
{
    // global $post;
    // $post_slug = $post->post_name; 
    // $current_url = home_url($_SERVER['REQUEST_URI']);

    // $current_page_object = get_queried_object();
    // $name_category = $current_page_object->name;    

    global $wp;
    $current_url = add_query_arg(array(), $wp->request);

    MSS_Useful::log('current_url ' . $current_url);

    // MSS_Useful::log('name_category '.$name_category);

    if ($current_url == "product-category/scent-marketing") {
        echo do_shortcode('[elementor-template id="69706"]');
    } else if ($current_url == "product-category/aroma-diffusers" || $current_url == "product-category/best-sellers-diffusers" || $current_url == "product-category/small-room-diffusers" || $current_url == "product-category/medium-room-diffusers" || $current_url == "product-category/large-room-diffusers" || $current_url == "product-category/hvac-scent-diffusers") {
        echo do_shortcode('[elementor-template id="69658"]');
    }

    // MSS_Useful::log('category name  '.$name_category);

    // $terms = get_the_terms($post->ID, 'product_cat');

    //echo $terms[0]->name;

    // MSS_Useful::log('woocommerce_after_main_content');
    // MSS_Useful::log('current category term id: ' . $id_category_term);
    // MSS_Useful::log($terms);

}

add_filter('loop_shop_per_page', 'my_remove_pagination', 20);
function my_remove_pagination($cols)
{

    $cols = 90;

    return $cols;
}

// Add JS for menu fixed bars responsiveness
add_action('wp_footer', function () {
    global $wp;
    $current_url = add_query_arg(array(), $wp->request);

    wp_enqueue_script('js_magic_scent', plugin_dir_url(__FILE__) . 'magic-scent-scripts.js');
    wp_add_inline_script('js_magic_scent', 'var url_admin_ajax = "' . admin_url('admin-ajax.php') . '";');

    // $args = array(
    //     'limit' => -1,
    //     'status' => 'publish',
    //     'return' => 'ids');
    // $products = wc_get_products($args);

    // $categories = get_terms(
    //     array(
    //         'taxonomy'   => 'product_cat',
    //         'orderby'    => 'name',
    //         'hide_empty' => false,
    //     )
    // );

    // $categories = treeify_terms($categories);

    wp_enqueue_style('css_mobile_menu', plugin_dir_url(__FILE__) . 'styles/mobile_menu.css');
    wp_enqueue_script('js_mobile_menu', plugin_dir_url(__FILE__) . 'javascripts/mobile_menu.js');
    // wp_add_inline_script('js_mobile_menu', 'var product_categories = '. json_encode($categories));

    // wp_enqueue_style('css-toggle-header-scroll', plugin_dir_url(__FILE__) . 'styles/toggle-header-scroll.css');

    if (is_front_page()) {
        wp_enqueue_style('css-align-products-home', plugin_dir_url(__FILE__) . 'styles/products-align/home.css');
        wp_enqueue_script('js_klaviyo_form', "https://static.klaviyo.com/onsite/js/klaviyo.js?company_id=RmdU49");           
    }

    // Shop Page
    else if (is_page('shop-2')) {
        wp_enqueue_style('css-align-products-shop', plugin_dir_url(__FILE__) . 'styles/products-align/shop.css');
    }
    // Shop Page

    // Category Pages
      else if ($current_url == "product-category/scent-marketing" || $current_url == "product-category/bestsellers" || $current_url == "product-category/scent-marketing/hotel-collection" || $current_url == "product-category/scent-marketing/luxury-fragrances" || $current_url == "product-category/scent-marketing/citrus" || $current_url == "product-category/scent-marketing/floral" || $current_url == "product-category/scent-marketing/fresh" || $current_url == "product-category/scent-marketing/gourmand" || $current_url == "product-category/scent-marketing/wood") {
        wp_enqueue_style('css-align-products-scent-marketing', plugin_dir_url(__FILE__) . 'styles/products-align/scent-marketing.css');
        //jQuery('.qodef-woo-product-list ul').removeClass().addClass('products columns-4')    
    } else if ($current_url == "product-category/aroma-diffusers" || $current_url == "product-category/best-sellers-diffusers" || $current_url == "product-category/small-room-diffusers" || $current_url == "product-category/medium-room-diffusers" || $current_url == "product-category/large-room-diffusers" || $current_url == "product-category/hvac-scent-diffusers" || $current_url == "product-category/car-diffuser") {
        wp_enqueue_style('css-align-products-diffusers', plugin_dir_url(__FILE__) . 'styles/products-align/diffusers.css');
    } else if ($current_url == 'product-category/reed-diffusers') {
        wp_enqueue_style('css-align-products-diffusers', plugin_dir_url(__FILE__) . 'styles/products-align/reed-diffusers.css');
    }
    // Category Pages

    //Single Product Page Scents
    if (str_contains($current_url,'shop/scent-marketing') ) {
        wp_enqueue_style('css_single_product_page_scents', plugin_dir_url(__FILE__) . 'styles/single_product_page_scents.css'); 
        wp_enqueue_style('css-align-products-scent-marketing', plugin_dir_url(__FILE__) . 'styles/products-align/scent-marketing.css'); 
        wp_enqueue_script('js_single_product_page_scents', plugin_dir_url(__FILE__) . 'javascripts/single_product_page_scents.js');  
    }
    //Single Product Page Scents

     //Single Product Page Diffusers
     if (str_contains($current_url,'shop/aroma-diffusers') ) {
        wp_enqueue_style('css_single_product_page_diffusers', plugin_dir_url(__FILE__) . 'styles/single_product_page_diffusers.css');    
        // wp_enqueue_style('css-align-products-diffusers', plugin_dir_url(__FILE__) . 'styles/products-align/diffusers.css');
    }
    //Single Product Page Diffusers
});

//Allow the logged user to write a review on Single Product Page only if he buy it previously
add_action('woocommerce_after_single_product_summary', 'allow_or_deny_create_reviews_to_logged_user', 10);
function allow_or_deny_create_reviews_to_logged_user()
{
    if (!is_user_logged_in()) {
        wp_enqueue_style('css-hide-product-review-button', plugin_dir_url(__FILE__) . 'styles/hide-product-review-button.css');
        return;
    }

    $logged_user_id = get_current_user_id();

    global $product;
    $product_id = $product->get_id();

    // MSS_Useful::log("logged_user_id");
    // MSS_Useful::log($logged_user_id);

    // MSS_Useful::log("product_id");
    // MSS_Useful::log($product_id);

    $is_allow_to_write_reviews = aux_is_product_purchase_by_user($product_id, $logged_user_id);

    if (!$is_allow_to_write_reviews) {
        wp_enqueue_style('css-hide-product-review-button', plugin_dir_url(__FILE__) . 'styles/hide-product-review-button.css');
    }
}

function aux_is_product_purchase_by_user($product_id, $user_id)
{
    $comprado = false;

    // Aquí asignamos los productos a evaluar en el array
    $prod_arr = array($product_id);

    $args = array(
        'customer_id' => $user_id,
        'limit' => -1, // to retrieve all orders by this user
    );
    $orders = wc_get_orders($args);

    // // Obtenemos todos los pedidos del cliente que están en wc-processing o wc-completed
    // $customer_orders = get_posts(array(
    //     'numberposts' => -1,
    //     'meta_key' => '_customer_user',
    //     'meta_value' => $user_id,
    //     'post_type' => 'shop_order', // WC orders post type
    //     'post_status' => array('wc-processing', 'wc-completed')
    // ));

    foreach ($orders as $order) {
        // Para mantener la compatibilidad con WooCommerce 3+
        //   $order_id = method_exists( $order, 'get_id' ) ? $order->get_id() : $order->id;
        // $order = wc_get_order($customer_order);

        // Buscamos en cada producto comprado por el cliente en el pedido
        foreach ($order->get_items() as $item) {
            // WC 3+ compatibility
            if (version_compare(WC_VERSION, '3.0', '<')) {
                $product_id = $item['product_id'];
            } else {
                $product_id = $item->get_product_id();
            }

            // Si el producto ha sido comprado, estará en el array
            if (in_array($product_id, $prod_arr)) {
                $comprado = true;
                break;
            }
        }

        if ($comprado) {
            break;
        }
    }
    // devolvemos «true» si alguno de los productos especificados ha sido comprado
    return $comprado;
}

// Single Product Page Template
add_action('woocommerce_share', 'add_payments_buttons', 30);
function add_payments_buttons()
{
    global $wp;
    $current_url = add_query_arg(array(), $wp->request);

    if (str_contains($current_url,'shop/scent-marketing') ) {
        echo do_shortcode('[afterpay_paragraph]');
    }       

    
    echo '<div id="div_payment_logos" style="text-align: center;margin-bottom:1em">
    <img src="https://themagicscent.com/wp-content/uploads/2023/12/payment-methods-logos.png" style="margin: 1em auto; display: block;" />';

    if (str_contains($current_url,'shop/scent-marketing') ) {
        echo '<div class="product_sticker" style="margin-bottom: 1em;">
              <img src="https://themagicscent.com/wp-content/uploads/2024/02/sticker-1.png" style="display: block;margin: 0 auto;margin-bottom: 1em;width: 45%;" />
              <img src="https://themagicscent.com/wp-content/uploads/2024/02/sticker-2.png" style="display: inline-block;margin-right: 1em;width: 45%;" />
              <img src="https://themagicscent.com/wp-content/uploads/2024/02/sticker-3.png" style="display: inline-block;width: 45%;" />
              </div>
              ';
    }

    echo '<div class="div_money_back_guarantee">
    <img src="https://themagicscent.com/wp-content/uploads/2023/11/Money-Back-Badge.png" style="display: inline-block; width: 3em;" />
    <label style="display: inline-block; font-size: 18px; font-family: \'noir_et_blancregular\'; font-style: italic;">Money-Back Happiness Guarantee</label>
    <span class="desktop_span_logo_description" style="display: block; text-align: left; font-size: 13px; color: #666666 !important; margin-top: 0.5em;" id="span_logo_description" >You’re bound to love our products! But in that rare case, you don’t, it’s backed<br>by our money-back happiness guarantee.</span>
    <span class="mobile_span_logo_description" id="span_logo_description" >You’re bound to love our products! But in that rare case, you don’t, it’s backed by our money-back happiness guarantee.</span>
    </div>

    </div>';
   
    if (str_contains($current_url,'shop/scent-marketing') ) {
        global $post;
        echo $post->post_excerpt;
    } 

    // echo do_shortcode('[elementor-template id="69933"]');
}

add_action('woocommerce_before_add_to_cart_button', 'woocommerce_before_add_to_cart_button', 10);
function woocommerce_before_add_to_cart_button()
{ 

    global $wp;
    $current_url = add_query_arg(array(), $wp->request);

    if (str_contains($current_url,'shop/scent-marketing') ) {
     $img_refund_1 = plugin_dir_url(__FILE__)."images/refund_1.png";
     $img_refund_2 = plugin_dir_url(__FILE__)."images/refund_2.png";

     echo '<div class="div_subscription_benefits">
        <label style="display:block;margin-bottom: 1em;color: #212121;font-weight: 600;font-size: 15px;">Subscription
     Benefits</label>

 <div id="scents_seondary_description" style="background-color: #F5F5F5;padding: 1.5em 1.5em 0.8em;margin-bottom: 2em;">

     <div style="margin-bottom: 1em;color: #5F5F5F;">
         <img src="'.$img_refund_1.'"
             style="display: inline-block;vertical-align: top;margin-right: 1em;">

         <div style=" display: inline-block;">
             <label style="display: block;font-weight: 600;margin-bottom: 0.3em;">Modify your subscription
                 anytime</label>
             <label>Change fragrances, delivery schedule, products and so much more.</label>
         </div>
     </div>

     <div style="color: #5F5F5F;">
         <img src="'.$img_refund_2.'"
             style="display: inline-block;vertical-align: top;margin-right: 1em;">

         <div style="display: inline-block;">
             <label style="display: block;font-weight: 600;margin-bottom: 0.3em;">No commitment</label>
             <label>Cancel, swap, skip, or pause at any time.</label>
         </div>
     </div>

 </div>
 
 <div class="magic_border" style="border-top:1px solid #707070;margin-bottom: 1.6em;"></div>
 
 </div>';


 show_product_variations();

    }
    else if (str_contains($current_url,'shop/aroma-diffusers') ) {
        global $post;
        echo $post->post_excerpt;
    } 


    //print variations if there is any 

    // MSS_Useful::log('attributes_xero');
    // MSS_Useful::log($_SESSION['attributes_xero']);

  

    


    // echo do_shortcode('[yith_wcwl_add_to_wishlist]');    
}

add_action('init', function () {

    global $wp;
    $current_url = add_query_arg(array(), $wp->request);

    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
    // add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 30);

    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 30);
    add_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 10);

    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
    add_action( 'woocommerce_single_product_summary', 'add_product_resume_property', 5);

    // remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
    // add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 9);

    // remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 5);
    
    // remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 20);
    // remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 30);
    // remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 40);
    // add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 70);

    

    
    // remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);

    if (str_contains($current_url,'shop/aroma-diffusers') ) {
    remove_action( 'woocommerce_single_variation', 'woocommerce_single_variation', 10 );    
    add_action( 'woocommerce_after_add_to_cart_quantity', 'woocommerce_single_variation', 30 );
    }
    
    
    // add_action( 'woocommerce_single_product_summary', 'woocommerce_single_variation', 5 );
});

function add_product_resume_property(){
    global $product;
    $id_product = $product->id;

    $product_resume_property = get_field('properties_resume', $id_product);
    
    echo '<span class="product_meta_resume_properties" style="margin-bottom: 0.7em; font-size: 0.9em; display: block; color: #353535">'. $product_resume_property .'</span>';
}

// add_action('woocommerce_after_add_to_cart_quantity', 'woocommerce_after_add_to_cart_quantity', 1);
function woocommerce_after_add_to_cart_quantity()
{
    global $product;
    $product_id = $product->get_id();

    echo '<button type="submit" name="add-to-cart" value="' . $product_id . '" class="single_add_to_cart_button button alt mobile_add_to_cart_button" role="link" >Add to cart</button>';
    
}

add_action("woocommerce_after_single_product","woocommerce_after_single_product", 10);
function woocommerce_after_single_product(){
    global $wp;
    $current_url = add_query_arg(array(), $wp->request);

    if (str_contains($current_url, 'shop/scent-marketing')) {
        echo do_shortcode('[elementor-template id="69942"]');
    }else if (str_contains($current_url, 'shop/aroma-diffusers')) {
    echo do_shortcode('[elementor-template id="69840"]');
}
}


add_filter( 'woocommerce_after_quantity_input_field', 'sw_custom_woocommerce_quantity_select' );
function sw_custom_woocommerce_quantity_select() {
	
    if( ! is_product() ) return;
	
    global $product;
    if ( ! $product || $product->is_sold_individually() || ! $product->is_purchasable() || ! $product->is_in_stock() ) return;

    $max_value = 10; $min_value = 1; $step_value =  1; $classes = [ 'qty' ];
    $options = '';
	
    for ($i = 1; $i <= 10; $i++) {
        $selected = ($i == 1) ? 'selected' : '';
        $options .= '<option value="' . esc_attr($i) . '" ' . $selected . '>Quantity ' . esc_html($i) . '</option>';
    }

    echo '<select class="qty" name="quantity" title="">' . $options . '</select>';
}

add_action('woocommerce_before_variations_form', 'woocommerce_before_variations_form', 10);
function woocommerce_before_variations_form()
{
    global $wp;
    $current_url = add_query_arg(array(), $wp->request);

    if (str_contains($current_url, 'shop/aroma-diffusers')) {
     show_product_variations();
    }
}

function show_product_variations(){
    global $product;

    if ( $product->is_type( 'variable' )){
        $attributes = $_SESSION['custom_script_attributes'];
        $available_variations = $_SESSION['custom_script_available_variations'];
        
        $attribute_keys = array_keys( $attributes );
        // $variations_json = wp_json_encode( $available_variations );
        // $variations_attr = function_exists( 'wc_esc_json' ) ? wc_esc_json( $variations_json ) : _wp_specialchars( $variations_json, ENT_QUOTES, 'UTF-8', true );     
        
             if ( empty( $available_variations ) && false !== $available_variations ) { 
                     echo '<p class="stock out-of-stock">';
                     echo esc_html( apply_filters( 'woocommerce_out_of_stock_message', __( 'This product is currently out of stock and unavailable.', 'woocommerce' ) ) );
                     echo '</p>';
             }
             else {
                 echo '<table class="variations test" cellspacing="0" role="presentation">
                      <tbody>';
                   
                      foreach ( $attributes as $attribute_name => $options ) {
                        echo '<th class="label"><label>'. wc_attribute_label( $attribute_name ).'</label></th>';
                             echo '<tr>';             					
                                 echo '<td class="value">';							
                                         wc_dropdown_variation_attribute_options(
                                             array(
                                                 'options'   => $options,
                                                 'attribute' => $attribute_name,
                                                 'product'   => $product,
                                             )
                                         );
                                         echo end( $attribute_keys ) === $attribute_name ? wp_kses_post( apply_filters( 'woocommerce_reset_variations_link', '<a class="reset_variations" href="#">' . esc_html__( 'Clear', 'woocommerce' ) . '</a>' ) ) : '';
                                    
                                 echo '</td>
                             </tr>';
            }
                     echo '</tbody>
                 </table>';
                 }
    }
}


// add_action( 'wp_head', 'sw_hide_qty' );
// function sw_hide_qty() { 
// 	if ( is_product() ) echo '<style type="text/css">.quantity input.qty { width:0; height:0; display: none; visibility: hidden; }</style>';
// }



// add_filter( 'woocommerce_add_to_cart_redirect', 'bbloomer_redirect_checkout_add_cart' ); 
// function bbloomer_redirect_checkout_add_cart() {
// //    return wc_get_checkout_url();

// return 'checkout';

// }