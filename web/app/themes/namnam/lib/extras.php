<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

function the_url($path) {
  return esc_url(home_url( $path ));
}

function body_class_custom() {
  if(is_front_page()) {
    return "homepage";
  }
  if (is_cart()) {
    return "web woocommerce-cart woocommerce-page cart";
  }
  if (is_account_page()) {
    return "web woocommerce-account woocommerce-page my-account";
  }
  if (is_singular('product') || is_archive() || is_page_template('woo-page.php')) {
    return "web woocommerce woocommerce-page";
  }

  return "web";
}

function display_user_menu() {
  if (is_user_logged_in()) {
    echo "<a href='" . the_url('/my-account') . "'>Akun</a>";
    return;
  }

  echo "<a href='" . the_url('/wp/wp-login.php') . "'>Login</a>";
  return;
}

function css_registrant_only() {
  if (is_user_logged_in()) {
    $css = "<style>
      .navbar-fixed-top {
        top: 30px;
      }
      @media(max-width: 782px) {
        .navbar-fixed-top {
          top: 50px;
        }
      }
    </style>";

    echo $css;
  }
  echo "";
}

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

// Woocommerce Control
/*add_filter ( 'wc_add_to_cart_message', 'wc_add_to_cart_message_filter', 10, 2 );
function wc_add_to_cart_message_filter($message, $product_id = null) {
$titles[] = get_the_title( $product_id );

$titles = array_filter( $titles );
$added_text = sprintf( _n( '%s has been added to your cart.', '%s have been added to your cart.', sizeof( $titles ), 'woocommerce' ), wc_format_list_of_items( $titles ) );

$message = sprintf( '%s <a href="%s" class="button">%s</a>&nbsp;<a href="%s" class="button">%s</a>',
esc_html( $added_text ),
esc_url( wc_get_page_permalink( 'checkout' ) ),
esc_html__( 'Checkout', 'woocommerce' ),
esc_url( wc_get_page_permalink( 'cart' ) ),
esc_html__( 'View Cart', 'woocommerce' ));

return $message;
}*/
add_action('woo_before_index_page', 'wc_print_notices', 10);

// Remove Wordpress Emoji
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

// Remove another Wordpress Stuff
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);

// ============== HTML COMPRESS =============
function ob_html_compress($buf){
  return preg_replace(array('/<!--(.*)-->/Uis',"/[[:blank:]]+/"),array('',' '),str_replace(array("\n","\r","\t"),'',$buf));
}
