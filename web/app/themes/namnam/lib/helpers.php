<?php

if (! function_exists('url')) {
  function url($path)
  {
    echo esc_url(home_url( $path ));
  }
}

if (! function_exists('asset')) {
  function asset($path)
  {
    echo get_template_directory_uri() . '/dist' . $path;
  }
}

?>
