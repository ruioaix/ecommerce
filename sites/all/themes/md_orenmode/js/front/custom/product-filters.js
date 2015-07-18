(function($){
  Drupal.behaviors.productFilters = {
    attach: function(context, settings) {
      ShowFilter();
      /*==========  Click Show Filter Grid Product ==========*/
      function ShowFilter() {
          $('#filter-grid').on('click',function(e) {
              if($(this).hasClass('show-view')){
                  $(this).removeClass('show-view');
                  $('#filter-cn-grid').removeClass('show-view');
              }else{
                  $(this).addClass('show-view');
                  $('#filter-cn-grid').addClass('show-view');
              }
              
              e.stopPropagation();
          });
      }
      
      
      FilterPriceSlider();
      /*==========  Price Slider ==========*/
      function FilterPriceSlider(){
          if($('#slider').length && Drupal.settings.hasOwnProperty('orenmodePrice')) {
              $("#slider").slider({
                  min: parseInt(Drupal.settings.orenmodePrice.setting.config_price_min),
                  max: parseInt(Drupal.settings.orenmodePrice.setting.config_price_max),
                  step: 5,
                  values: [ 
                    parseInt(Drupal.settings.orenmodePrice.setting.price_min), 
                    parseInt(Drupal.settings.orenmodePrice.setting.price_max) 
                  ],
                  range: true,
                  slide: function( event, ui ) {

                      var $this=$(this),

                          values=ui.values;

                      $('#price-f').text('$'+values[0]);

                      $('#price-t').text('$'+values[1]);

                  }
              });

              var values = $( "#slider" ).slider( "option", "values" )

              $('#price-f').text('$'+values[0]);

              $('#price-t').text('$'+values[1]);
          }
      }
    
      
      
      
      function productFilters(jquery) {
        this.jquery = jquery;
      };  
      productFilters.prototype.filter = function (queryString) {
        window.location.href = Drupal.settings.orenmodePrice.setting.baseUrl + '?' + queryString;
      }
      
      productFilters.prototype.buildQueryString = function (data) {
        var currentFilters = Drupal.settings.orenmodePrice.setting.currentFilters;
        currentFilters = this.jquery.extend(currentFilters, data);
        return this.jquery.param(currentFilters);
      }
    
      var filterContainer = $('.top-filter');
      productFilter = new productFilters($);
      filterContainer.find('.btn-filter').click(function(event) {
        event.preventDefault();
        
        var data = {};
        
        // Get price
        var values = $( "#slider" ).slider( "option", "values" );
        data.price_min = values[0];
        data.price_max = values[1];
        
        // Get size
        var sizes = [];
        filterContainer.find('.filter-sizes input[type="checkbox"]').each(function() {
          if($(this).prop('checked')) {
            sizes.push(parseInt($(this).val()));
          }
        });
        data.sizes = sizes;
        
        // Get categories
        var categories = [];
        filterContainer.find('.filter-cat input[type="checkbox"]').each(function() {
          if($(this).prop('checked')) {
            categories.push(parseInt($(this).val()));
          }
        });
        data.categories = categories;
        
        // Get categories
        var colors = [];
        filterContainer.find('.nav-color input[type="checkbox"]').each(function() {
          if($(this).prop('checked')) {
            colors.push(parseInt($(this).val()));
          }
        });
        data.colors = colors;
        
        console.log(data);
        
        var queryString = productFilter.buildQueryString(data);
        productFilter.filter(queryString);
      });
      
      filterContainer.find('.sidebar-color a').click(function(event) {
        event.preventDefault();
        var color = $(this).data("color");
        var checkbox = filterContainer.find('input[id="color-' + color + '"]');
        
        checkbox.prop('checked', !checkbox.is(':checked'));
        $(this).closest( 'li' ).toggleClass('active');
      });
      
      filterContainer.find('.show-page.filter-select select').change(function(event) {
        event.preventDefault();
        var data = {};
        data.items_per_page = $(this).val();
        var queryString = productFilter.buildQueryString(data);
        productFilter.filter(queryString);
      });
      
      filterContainer.find('.sort.filter-select select#sort').change(function(event) {
        event.preventDefault();
        var data = {};
        data.sort_by = $(this).val();
        var queryString = productFilter.buildQueryString(data);
        productFilter.filter(queryString);
      });
      
      filterContainer.find('.sort.filter-select select#order').change(function(event) {
        event.preventDefault();
        var data = {};
        data.sort_order = $(this).val();
        var queryString = productFilter.buildQueryString(data);
        productFilter.filter(queryString);
      });
      
      
      filterContainer.find('.sort .selected-asc').click(function(event) {
        var sort = filterContainer.find('.sort.filter-select select#order');
        sort.val('DESC');
        sort.trigger('change');
      });
      
      filterContainer.find('.sort .selected-desc').click(function(event) {
        var sort = filterContainer.find('.sort.filter-select select#order');
        sort.val('ASC');
        sort.trigger('change');
      });
      
      var paging = $('.bottom-list ul.paging-p');
      if (paging.length > 0) {
        filterContainer.find('.paging-p').html(paging.html());
      }
    
    // End attach
    }
  }
})(jQuery);
