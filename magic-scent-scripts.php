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


    if ($current_url == "product-category/aroma-diffusers" || $current_url == "product-category/best-sellers-diffusers" || $current_url == "product-category/small-room-diffusers" || $current_url == "product-category/medium-room-diffusers" || $current_url == "product-category/large-room-diffusers" || $current_url == "product-category/hvac-scent-diffusers") {
        global $product;
        $id_product = $product->id;

        $value = get_field('properties_resume', $id_product);

        echo "<div class='product-meta'><span class='product-meta-properties'>" . $value . " </span></div>  ";
    }
}

add_filter('woocommerce_get_price_html', 'custom_price_message_custom_product_properties');

function custom_price_message_custom_product_properties($price)
{
    global $wp;
    $current_url = add_query_arg(array(), $wp->request);

    if ($current_url == "product-category/scent-marketing" || $current_url == "product-category/bestsellers" || $current_url == "product-category/scent-marketing/hotel-collection" || $current_url == "product-category/scent-marketing/luxury-fragrances" || $current_url == "product-category/scent-marketing/citrus" || $current_url == "product-category/scent-marketing/floral" || $current_url == "product-category/scent-marketing/fresh" || $current_url == "product-category/scent-marketing/gourmand" || $current_url == "product-category/scent-marketing/wood") {
        global $product;
        $id_product = $product->id;

        $properties_resume = get_field('properties_resume', $id_product);

        return $price . '<div class="scents_custom_properties"><span >' . $properties_resume . '</span></div>';
    } else return $price;
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
add_action('woocommerce_share', 'add_payments_buttons', 10);
function add_payments_buttons()
{
    echo do_shortcode('[afterpay_paragraph]');

    //     echo '<a href="/checkout" class="bt_checkout_now">
    //    <button type="submit" class="single_add_to_cart_button button alt" role="link">Checkout Now (credit card)</button>
    //    </a>';
}

// add_action('woocommerce_before_add_to_cart_button', 'woocommerce_before_add_to_cart_button', 10);
// function woocommerce_before_add_to_cart_button()
// {
//     echo do_shortcode('[yith_wcwl_add_to_wishlist]');
// }

add_action('init', function () {
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
    add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 60);

    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 30);
    add_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 10);

    // remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
    // add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 9);

    // remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
    // add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 70);
});

add_action('woocommerce_after_add_to_cart_quantity', 'woocommerce_after_add_to_cart_quantity', 1);
function woocommerce_after_add_to_cart_quantity()
{
    global $product;
    $product_id = $product->get_id();

    echo '<button type="submit" name="add-to-cart" value="' . $product_id . '" class="single_add_to_cart_button button alt mobile_add_to_cart_button" role="link" >Add to cart</button>';
}
