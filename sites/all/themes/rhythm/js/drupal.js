(function() {
  
  var $ = jQuery;

  Drupal.behaviors.table_responsive = {
    attach: function (context, settings) {
       $('.table', context).wrap('<div class = "table-responsive"></div>');
    }
  };

  Drupal.behaviors.required_fix = {
    attach: function (context, settings) {
       $('*[required="required"]', context).each(function() {
        $(this).after('<span class = "required-span">*</span>');
       });
    }
  };

  Drupal.behaviors.href_click = {
    attach: function (context, settings) {
       $('a[href="#"]', context).click(function() {
        return false;
       });
    }
  };



  Drupal.behaviors.cart_remove_wrap = {
    attach: function (context, settings) {
      $('.cart-remove-wrap a', context).click(function() {
        $(this).parent().find('input').click();
        return false;
      });
    }
  };

  Drupal.behaviors.products_filter = {
    attach: function (context, settings) {
      if($('#block-rhythm-cms-products-filter').length > 0 && $('#edit-commerce-price-amount-wrapper').length > 0) {
        $('#edit-commerce-price-amount-wrapper').hide();
        $('.products-filter-from input').val($('#edit-commerce-price-amount-wrapper #edit-commerce-price-amount-min').val());
        $('.products-filter-to input').val($('#edit-commerce-price-amount-wrapper #edit-commerce-price-amount-max').val());
        $('#block-rhythm-cms-products-filter button').click(function() {
          $('#edit-commerce-price-amount-wrapper #edit-commerce-price-amount-min').val($('.products-filter-from input').val());
          $('#edit-commerce-price-amount-wrapper #edit-commerce-price-amount-max').val($('.products-filter-to input').val());
          $('#edit-commerce-price-amount-wrapper').closest('form').submit();
          return false;
        });
      }
    }
  };

  Drupal.behaviors.product_zoom = {
    attach: function (context, settings) {
        $(".lightbox-gallery-3", context).magnificPopup({
            gallery: {
                enabled: true,
                tCounter: '<span class="mfp-counter">%curr% ' + Drupal.t('of') + ' %total%</span>' // markup of counter
            }
        });
    }
  };

  Drupal.behaviors.tb_megamenu_align = {
    attach: function (context, settings) {
      $('.mega-align-right .mn-sub', context).addClass('to-left');
    }
  };

}());