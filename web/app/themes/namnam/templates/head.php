<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
  <?php
    use Roots\Sage\Extras;

    Extras\css_registrant_only();
  ?>
</head>
