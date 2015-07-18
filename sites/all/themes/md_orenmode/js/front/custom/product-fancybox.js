(function($){
  Drupal.behaviors.productFancyBox = {
    attach: function(context, settings) {
      
      Fancybox();
      /*==========  Full Size Image Detail Product ==========*/
      function Fancybox() {

        $('.thumb_list li').on('click', function () {

          var $this = $(this);

          if ($this.hasClass('active') == false) {

            var src = $this.attr('data-src');
            $this.parent('.thumb_list').find('li').removeClass('active');
            $this.addClass('active');
            $('#view_full_size').attr('href', src).find('img').attr('src', src);

          }

        })

        if ($('.fancybox').length) {
          $(".fancybox").fancybox({
            helpers: {
              title: {
                type: 'outside'
              },
              overlay: {
                speedOut: 0
              }
            }
          });
        }
      }
      // End attach
    }
  }
})(jQuery);

