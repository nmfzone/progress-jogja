<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;
use Roots\Sage\Assets;
use Roots\Sage\Extras;

require_once get_template_directory() . "/lib/helpers.php";
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body class="<?php echo Extras\body_class_custom(); ?>">
    <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
    <?php
      do_action('get_header');
      get_template_part('templates/header');
    ?>
    <div class="wrapper" role="document">
      <div class="content row">
      <?php if (is_front_page()) { ?>
        <main class="thm-jog-left">
          <h3>Produk Unggulan</h3>
          <?php include Wrapper\template_path(); ?>
        </main>
        <aside class="thm-jog-right">
          <div class="brand-logo">
            <img src="<?php asset('/images/logo.png'); ?>" width="300px">
          </div>
          <div class="jogja-logo">
            <img src="<?php asset('/images/jogja_istimewa.png'); ?>" width="200px">
          </div>
        </aside>
        <?php } else { ?>
        <div class="kendi-outer col-md-12 col-xs-12 col-sm-12">
          <div class="kendi-tutup col-md-12 col-xs-12 col-sm-12">
          </div>
          <div class="kendi-body col-md-12 col-xs-12 col-sm-12">
            <main class="wrap col-md-8 col-xs-9 col-sm-8">
              <?php include Wrapper\template_path(); ?>
            </main>
            <?php if (Setup\display_sidebar()) : ?>
              <aside class="sidebar col-md-4 col-xs-3 col-sm-4">
                <?php include Wrapper\sidebar_path(); ?>
              </aside>
            <?php endif; ?>
          </div>
          <div class="kendi-bawah col-md-12 col-xs-12 col-sm-12">
          </div>
        </div>
      <?php } ?>
      </div>
      <?php
        do_action('get_footer');
        if (!is_front_page()) {
          get_template_part('templates/footer');
        }
        wp_footer();
      ?>
    </div>
  </body>
</html>

<?php
  // ob_start();
  //
  // $contents = ob_get_clean();
  // ob_end_flush();
  //
  // $params = [
  //   'indent' => true,
  //   'output-xhtml' => true,
  //   'wrap' => 200
  // ];
  //
  // $tidy = tidy_parse_string($contents, $params, 'UTF8');
  // $tidy->cleanRepair();
  // echo $tidy;
?>
