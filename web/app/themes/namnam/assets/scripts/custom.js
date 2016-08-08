(function($) {

  var winWidth = $(window).width();
  var winHeight = $(window).height();

  var home = '.homepage ';
  var wrap_left = '.thm-jog-left ';
  var wrap_right = '.thm-jog-right ';

  function woo_manip_once() {
    var el = $('body');
    $(home + 'img.size-shop_catalog').wrap("<div class='product-images'></div>");
    $('.page-header').remove();
    el = $(home + '.woocommerce-LoopProduct-link h3');
    el.each(function() {
      var _ = $(this);
      _.html(_.text().slice(0,15));
    });
  }
  woo_manip_once();

  // WooCommerce Manipulation
  function changeCartBtn(area, btnType) {
    var add_to_cart = $(area + ' .add_to_cart_button');
    $(area + ' .button').removeClass().addClass('btn ' + btnType);
    add_to_cart.addClass('add_to_cart_button ajax_add_to_cart btn ' + btnType);
  }
  function woo_manip() {
    $('.quantity').css({'width': '60px'});
    $('input[name="coupon_code"]').css({'width': '100px', 'display': 'inline-block'});

    $('.submit').removeClass().removeAttr('id').addClass('btn btn-info');
    changeCartBtn('.homepage', 'btn-danger');
    changeCartBtn('.web', 'btn-info');
    $('.input-text').removeClass().addClass('form-control');
  }
  woo_manip();
  $(document).bind("DOMSubtreeModified", woo_manip);

  $(document.body).on("added_to_cart", function( data ) {
    $('.added_to_cart').remove();
    swal({
      title: "Sukses!",
      text: "Produk berhasil ditambahkan ke keranjang belanja.",
      type: "success",
      showConfirmButton: false,
      timer: 3000,
    });
  });

  function set_element_size() {
    var tugu_img = $(wrap_right + 'img');

    // $(wrap_right + 'img').attr('height', winHeight >= 500 ? winHeight-200 : 500);

    // $(wrap_left).css('width', ((75-((tugu_img.width()/winWidth)*100))*winWidth)/100);
    $(home + wrap_left + '.product-images').wrap();
    $('.add_to_cart_button').html('Beli');
  }
  set_element_size();

  // Element Size Manipulation
  $(window).resize(function () {
    winWidth = $(window).width();
    winHeight = $(window).height();

    set_element_size();
  });

})(jQuery);
