<?php

use Roots\Sage\Extras;

?>
<header class="header">
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php url('/') ?>">
          <div class="br-fst">Kuali Emas</div>
          <div class="br-sec">Wedang Uwuh Nikmat, Khasiat Mantab</div>
        </a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="<?php url('/tentang-kami') ?>">Tentang</a></li>
          <li><a href="<?php echo WC()->cart->get_cart_url(); ?>" class="cart-contents">Keranjang Belanja</a></li>
          <li class="active"><a href="<?php url('/shop') ?>">Produk Selengkapnya<span class="sr-only">(current)</span></a></li>
          <li><?php Extras\display_user_menu(); ?></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>
  <div class="menu-space"></div>
  <div class="container">
    <?php if (!is_front_page()) { ?>
    <?php } ?>
  </div>
</header>
