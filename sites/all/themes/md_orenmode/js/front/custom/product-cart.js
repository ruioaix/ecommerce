(function($){
  Drupal.behaviors.productCart = {
    attach: function(context, settings) {
      var form_commerce = $('.commerce-add-to-cart');
	  var att_class = "";
	  var att_color = "";
	  var att_size = "";
      form_commerce.find('.attribute_color').find('a').click(function (event) {
        event.preventDefault();
        if ($(this).closest('li').hasClass('active')) {
          return ;
        }
        var color = $(this).data("color");
        activeColor(color);
        
        // Let php add class active.
        // $(this).parent('.attribute_color').find('li').removeClass('active');
        // $(this).closest('li').addClass('active');
      });
      form_commerce.find('.attribute_size').find('a').once('processed-attribute_size', function() {
        form_commerce.find('.attribute_size').find('a').click(function (event) {
          event.preventDefault();

          var size = $(this).data("size");
          activeSize(size);
        });
      });
      
      form_commerce.find('.add-to-cart a.btn').once('processed-qty-add-to-cart', function() {
        form_commerce.find('.add-to-cart a.btn').click(function(event) {
          event.preventDefault();
          form_commerce.find('.add-to-cart input[type="submit"]').trigger('click');
        });
      });
      
      form_commerce.find('.add-to-box .qty-increase').once('processed-qty-increase', function() {
        form_commerce.find('.add-to-box .qty-increase').click(function(event) {
          event.preventDefault();
          qtyChange('increase');
        });
      });
      
      form_commerce.find('.add-to-box .qty-decrease').once('processed-qty-decrease', function() {
        form_commerce.find('.add-to-box .qty-decrease').click(function(event) {
          event.preventDefault();
          qtyChange('decrease');
        });
      });
      
      var qtyChange = function(type) {
        var qty = form_commerce.find('.add-to-box input[name="quantity"]');
        var currentQty = parseInt(qty.val());
        if (type === 'decrease') {
          currentQty++;
        } 
        if (type === 'increase' && currentQty > 1) {
          currentQty--; 
        } 
        console.log(currentQty);
        console.log(type);
        qty.val(currentQty);
      }
      
      var activeColor = function (color_id) {
        var radioColor = $('input[name="attributes[field_product_colors]"][value=' + color_id +']');
        radioColor.trigger('click');
      }
      
      var activeSize = function (size_id) {
        var radioSize = $('input[name="attributes[field_product_size]"][value=' + size_id +']');
        radioSize.trigger('click');
      }
      
      // End attach
	  
	  $( document ).ajaxComplete(function() {
		  att_color = form_commerce.find('.attribute_color').find('li.active a').attr('data-color');
		
		  att_size = form_commerce.find('.attribute_size').find('li.active a').attr('data-size');
		  
		  att_class = "product-price-" + att_color + "-" + att_size;
		  
		  $('.product-price').hide();
		  $("." + att_class).show();
	  });
    }
  }
})(jQuery);

