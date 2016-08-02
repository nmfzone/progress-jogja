<?php
do_action('woocommerce_before_shop_loop');
?>

<?php woocommerce_product_loop_start(); ?>

<?php woocommerce_product_subcategories(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<?php wc_get_template_part( 'content', 'product' ); ?>

<?php endwhile; ?>

<?php woocommerce_product_loop_end(); ?>

<?php
do_action('woocommerce_after_shop_loop');
?>
