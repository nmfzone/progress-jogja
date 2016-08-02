<?php
/**
 * Template Name: Woocommerce Page
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php echo do_shortcode(the_content()); ?>
<?php endwhile; ?>
