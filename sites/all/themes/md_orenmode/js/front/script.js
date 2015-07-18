/*------------------------------------------------------------------------
# OrenMode
# ------------------------------------------------------------------------
# HTML5 by MegaDrupal
# Websites:  http://www.megadrupal.com -  Email: info@megadrupal.com
--------------------------------------------------------------------------*/
jQuery(document).ready(function ($) {
    "use strict";

    $(window).load(function (event) {
        LoadPage();
        Portfolio();
        SliderHome();
        ResizeSliderHome();
    });

    $(window).resize(function (event) {
        MeuResize();
        ResizeSliderHome();
        SetHeight404();
    });

    $(window).scroll(function(event) {
        
    });

    /*========== Loading ==========*/
    function LoadPage(){
        $('#loading').fadeOut();
    }

    TopBar();
    /*========== Top Menu Click ==========*/
    function TopBar(){
        $('#bar-icon').on('click',function(e){
            if($(this).parent('.top-menu').hasClass('show-view')){
                $(this).parent('.top-menu').removeClass('show-view');
            }else{
                $(this).parent('.top-menu').addClass('show-view');
            }
            e.stopPropagation();
        });
    }

    ShowSearchForm();
    /*========== Click Show Search Form Header ==========*/
    function ShowSearchForm(){
        $('#icon-search').on('click',function(e){
            if($(this).parents('.search-h').hasClass('show-view')){
                $(this).parents('.search-h').removeClass('show-view');
            }else{
                $(this).parents('.search-h').addClass('show-view');
            }
            e.stopPropagation();
        });
    }

    ShowCart();
    /*========== Click Show Cart Mini ==========*/
    function ShowCart(){
        $('#cart-head').on('click',function(e) {
            if($(this).parent('.mini-cart').hasClass('show-view')){
                $(this).parent('.mini-cart').removeClass('show-view');
            }else{
                $(this).parent('.mini-cart').addClass('show-view');
            }

            e.stopPropagation();
        });
    }

    SubMenu();
    /*========== Click Show Sub Menu ==========*/
    function SubMenu() {
        $('.navigation ul li').find('> ul').parent('li').find('>a').append('<span class="nav-plus"></span>')
        $('.navigation a').on('click','.nav-plus',function(){
            if($(this).hasClass('nav-minus')==false){
                $(this).parent('a').parent('li').find('> ul').slideDown();
                $(this).addClass('nav-minus');
            }else{
                $(this).parent('a').parent('li').find('> ul').slideUp();
                $(this).removeClass('nav-minus');
            }
            return false;
        });
    }

    /*========== Menu Resize ==========*/
    function MeuResize(){
        if($(window).width() >991){
            $('.nav-menu ul,.nav-menu .mega-wrap').removeAttr('style');
        }
    }

    ShowMenu();
    /*========== Click Show Menu ==========*/
    function ShowMenu(){
        $('#menu-bar').on('click',function(e){
            if($('.navigation').hasClass('show-view')){
                $(this).removeClass('show-view');
                $('.navigation').removeClass('show-view');
            }else{
                $(this).addClass('show-view');
               $('.navigation').addClass('show-view'); 
            }

            e.stopPropagation();
        })
    }

    Partner();
    /*========== Partner Slide ==========*/
    function Partner(){
        if($('#partner').length) {

            var custom=[],
                $this=$('#partner');

            if($this.attr('data-custom') !=='' && typeof $this.attr('data-custom') !== 'undefined' ) {
                var array=($this.attr('data-custom')).split(',');
                for(var i=0; i<array.length ;i++ ){
                    custom[i]=array[i].split('-').map(Number);
                }
            }

            $this.owlCarousel({
                slideSpeed : 300,
                navigation:true,
                navigationText:["",""],
                itemsCustom: custom,
                pagination:false
            }); 
        }
    }

    RelatedSlide();
    /*========== Product Related Slide ==========*/
    function RelatedSlide(){
        if($('#related-slide').length) {

            var custom=[],
                $this=$('#related-slide');

            if($this.attr('data-custom') !=='' && typeof $this.attr('data-custom') !== 'undefined' ) {
                var array=($this.attr('data-custom')).split(',');
                for(var i=0; i<array.length ; i++ ){
                    custom[i]=array[i].split('-').map(Number);
                }
            }

            $this.owlCarousel({
                slideSpeed : 1000,
                navigation:true,
                navigationText:["",""],
                itemsCustom: custom,
                pagination:false
            }); 
        }
    }

    PostSlide();
    /*========== Slide In Post ========== */
    function PostSlide(){
        if($('.entry-photo-slide').length){
            $('.entry-photo-slide').owlCarousel({
                autoPlay: false,
                navigation: true,
                pagination: false,
                navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
                singleItem: true
            });
            
        }
    }

    SlideBlogSidebar();
    /*========== Photo Slide Blog Sidebar ========== */
    function SlideBlogSidebar(){
        if($('#photo_slide').length){
            $('#photo_slide').owlCarousel({
                autoPlay: false,
                navigation: true,
                pagination: false,
                navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
                itemsCustom: [[320, 2],[480, 3], [768, 4], [992, 1], [1200, 1]]
            });
            
        }
    }

    ClickSubCatBlog();
    /*========== CLick DropDown Category Blog ========== */
    function ClickSubCatBlog(){
        $('.widget_categories ul li').find(' >ul').parent('li').find('>a').append('<span class="nav-plus"></span>')
        $('.widget_categories ul li a').on('click','.nav-plus',function(){
            if($(this).hasClass('nav-minus')){
                $(this).removeClass('nav-minus');
                $(this).parent('a').parent('li').find('>ul').slideUp();
            }else{
                $(this).addClass('nav-minus');
                $(this).parent('a').parent('li').find('>ul').slideDown();
            }
        });
    }

    SetHeight404();
    /*========== Set Height Page 404 ========== */
    function SetHeight404(){
        if($('.page-404').length){
            if($(window).width()>768){
                var _height=$(window).height();
                $('.page-404').height(_height);
            }
            else{
                $('.page-404').removeAttr('style');
            }
        }
    }

//    PriceSlider();
    /*==========  Price Slider ==========*/
    function PriceSlider(){
        if($('#slider').length) {
            $("#slider").slider({
                min: 0,
                max: 1500,
                step: 5,
                values: [ 200, 1200 ],
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

//    ShowFilter()
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

    Fancybox();
    /*==========  Full Size Image Detail Product ==========*/
    function Fancybox() {

        $('.thumb_list li').on('click', function() {

            var $this=$(this);

            if($this.hasClass('active')==false){

                var src=$this.attr('data-src');
                $this.parent('.thumb_list').find('li').removeClass('active');
                $this.addClass('active');
                $('#view_full_size').attr('href',src).find('img').attr('src',src);

            }

        })

        if($('.fancybox').length) {
            $(".fancybox").fancybox({
                helpers: {
                    title : {
                        type : 'outside'
                    },
                    overlay : {
                        speedOut : 0
                    }
                }
            });
        }
		
		$(".trigger-fancybox").fancybox();
    }

    TabsResponsive();
    /*==========  Tabs Responsive ==========*/
    function TabsResponsive(){
        if($('#tabs-responsive').length){
            $('#tabs-responsive').responsiveTabs({
                rotate: false,
                active:0,
                startCollapsed: 'accordion',
                collapsible: 'accordion',
                animation: 'slide',
                duration:300,
                setHash: false
            });
        }

        if($('#tab-featured').length){
            $('#tab-featured').responsiveTabs({
                rotate: false,
                active:0,
                startCollapsed: 'accordion',
                collapsible: 'accordion',
                animation: 'slide',
                duration:300,
                setHash: false
            });
        }

    }

    TrendingRatedAccess();
    /*==========  TRENDING TOPRATED ACCESSORIES ==========*/
    function TrendingRatedAccess(){

        var taget="";

        if($('#tranding').length)
            taget+=",#tranding";

        if($('#top-rated').length)
            taget+=",#top-rated";

        if($('#accessories').length)
            taget+=",#accessories";

        if(taget!=="") {

            if(taget.substring(0, 1)==",")

                taget = taget.substring(1);

            $(taget).owlCarousel({
                autoPlay: false,
                navigation: false,
                pagination: true,
                singleItem: true
            });

        }
    }

    DealsFeaturedSellers();
    /*==========  Deals Featured Sellers Slide ==========*/
    function DealsFeaturedSellers(){

        if($('.featured-slide').length) {

            $('.featured-slide').each(function(index, el) {
                var custom=[],

                $this=$(this);

                if($this.attr('data-custom') !=='' && typeof $this.attr('data-custom') !== 'undefined' ) {
                    var array=($this.attr('data-custom')).split(',');
                    for(var i=0; i<array.length ;i++ ){
                        custom[i]=array[i].split('-').map(Number);
                    }
                }

                $this.owlCarousel({
                    slideSpeed : 1000,
                    navigation:true,
                    itemsCustom: custom,
                    navigationText:["",""],
                    pagination:true
                }); 

            });
        }
    }

    FromBlogSlide();
    /*==========  From Blog Slide ==========*/
    function FromBlogSlide(){

        if($('#blog-slide').length) {

            var $this=$('#blog-slide'),
                custom=[];

            if($this.attr('data-custom') !=='' && typeof $this.attr('data-custom') !== 'undefined' ) {
                var array=($this.attr('data-custom')).split(',');
                for(var i=0; i<array.length ;i++ ){
                    custom[i]=array[i].split('-').map(Number);
                }
            }

            $('#blog-slide').owlCarousel({
                slideSpeed : 1000,
                navigation:true,
                itemsCustom: custom,
                pagination:true
            }); 
        }
    }

    ParallaxScorll();
    /*==========  Parallax Scroll ==========*/
    function ParallaxScorll(){

        if($(window).width() > 1199){
            if($('.bg-parallax').length) {
                $('.bg-parallax').each(function() {
                    $(this).parallax("50%", 0.1);
                });
            }
        }
    }

    /*==========  Slider Home ==========*/
    function SliderHome(){
        if($('#slide-home').length){
            $('#slide-home').owlCarousel({
                autoPlay: 5000,
                navigation: false,
                pagination: true,
                singleItem: true,
                mouseDrag:false,
                addClassActive:true,
                transitionStyle:'fade'
            });
        }
    }

    /*==========  Resize Slider Home ==========*/
    function ResizeSliderHome() {
        if($('#slide-home')) {
            var parentWidth = $('.slide-cn._1').innerWidth(),
              imgWidth = $('.item-inner').width(),
              imgHeight = $('.item-inner').height(),
              scale = parentWidth/imgWidth,
              ratio = imgWidth/imgHeight,
              heightItem = parentWidth/ratio;

          $('.slide-item').css({'height': heightItem});

          if ($(window).width() <= 1200) {

            $('.item-inner').css({
              '-webkit-transform': 'scale(' + scale + ')',
              '-moz-transform': 'scale(' + scale + ')',
              '-ms-transform': 'scale(' + scale + ')',
              'transform': 'scale(' + scale + ')'
            });

          } else {

            $('.item-inner').css({
                '-webkit-transform': 'scale(1)',
                '-moz-transform': 'scale(1)',
                '-ms-transform': 'scale(1)',
                'transform': 'scale(1)'
            });

          }
      }
    }

    /*==========  Slider WATCH ==========*/
    SliderWatch();
    function SliderWatch(){
        if($('#slide-watch').length){
            $('#slide-watch').owlCarousel({
                autoPlay: false,
                navigation: false,
                pagination: true,
                singleItem: true,
                mouseDrag:false,
                addClassActive:true,
                transitionStyle:'fade'
            });
        }
    }


    SliderBlock();
    /*==========  Slider Block ==========*/
    function SliderBlock(){
        if($('#slide-block').length){
            $('#slide-block').owlCarousel({
                autoPlay: 4000,
                navigation: true,
                navigationText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
                pagination: false,
                singleItem: true,
                mouseDrag:false 
            });
        }
    }

    CountDate();
    /*==========  Slider Home ==========*/
    function CountDate(){
        if($('.count-date').length){
            $('.count-date').each(function(index, el) {
                var $this = $(this),
                    end_date = $this.attr('data-end'),
                    view_as = $this.attr('data-view');

                if($this.attr('data-end') !=='' && typeof $this.attr('data-end') !== 'undefined' ) {

                   $this.countdown(end_date, function(event) {
                     $(this).html(
                        event.strftime('<span> %D <small>Days</small></span> <span> %H <small>Hrs</small></span> <span> %M <small>Mins</small></span> <span> %S <small>Sec</small></span>')
                     );
                  });

                }

            });
        }
    }

    VideoParallax();
    /*==========  Video Parallax ==========*/
    function VideoParallax(){
        if($('.fullscreen-video').length) {

            $('.fullscreen-video').mb_YTPlayer({
                containment: ".parallax-video",
                mute: true,
                loop: true,
                startAt: 0,
                autoPlay: false,
                showYTLogo: false,
                showControls: false
            });

            var video = $('.fullscreen-video');
            var videoPlay = $('.control-play');
            var controlWrap=$('.controls-video');
            var videoPause = $('.controls-video .pause');
            var videoVolume = $('.controls-video .volume');

            controlWrap.hide();

            videoPlay.on('click',function() {
                video.playYTP();
                $('.parallax-video-cn').css('opacity', 0);
                controlWrap.show();
                return false;
            });

            videoPause.on('click',function() {
                video.pauseYTP();
                $('.parallax-video-cn').css('opacity', 1);
                controlWrap.hide();
            });

            videoVolume.on('click',function() {
                video.toggleVolume();
            });
        }
    }

    ScrollTop();
    /*==========  Scroll Top ==========*/
    function  ScrollTop(){
        $('#scroll-top').on('click', function(event) {
            $('html, body').stop().animate({
                scrollTop: 0
            }, 1500, 'easeInOutExpo');
            event.preventDefault();
        });
    }

    QtyProduct();
    /*==========  Quantity Product ==========*/
    function  QtyProduct(){
        var qty_el = $('#qty'); 
        
        $('#qty-plus').on('click',function() {
            var qty = qty_el.value;

            if( !isNaN( qty )) 
                qty_el.value++;

            return false;
        });

        $('#qty-minus').on('click',function() {
            var qty = qty_el.value;

            if( !isNaN( qty ) && qty > 0) 
                qty_el.value--;
            
            return false;
        });
        
    }

    VideoPlayer();
    /*==========  Click Video Player Parallax ==========*/
    function  VideoPlayer(){
        $('#play-paused').on('click',function() {

            var video_e=document.getElementById('video');
            if(video_e.paused) {
                video_e.play();
                $(this).addClass('play');
            }
            else {
                video_e.pause();
                $(this).removeClass('play');
            }

            return false   
        })
    }

    /*==========  Portfolio Isotoper ==========*/
    function Portfolio() {

        if($('#portfolio').length) {

            var $this= $('#portfolio'),
                name_theme='';

            if($this.attr('data-theme') !=='' && typeof $this.attr('data-theme') !== 'undefined'){
                name_theme=$this.attr('data-theme');
            }

            var colioFun =function() { 
                $('#colio').remove();  

                $('#portfolio').colio({  
                    id: 'colio',
                    expandLink: '.portfolio-link', 
                    placement: 'before',
                    navigation:false,
                    closeText: '', 
                    theme: name_theme,
                    hiddenItems: '.isotope-hidden'
                });
            }

            colioFun();

            /* "isotope" plugin */

            var $isotop = $('#portfolio'), list;

            var isotope_run = function(f) {

                list = $isotop.isotope({layoutMode : 'fitRows', filter: f}); 

            };

            $('#load-more-pf').on('click',function(e) {
                e.preventDefault();
                var $this = $(this);
                var page = parseInt($this.attr('data-page'), 10);
                var href = $this.attr('href');

                $.ajax({
                    url: href,
                    type: 'GET',
                    dataType: 'html',
                    data: { page: page },
                    beforeSend:function(){
                       $this.addClass('load-active');
                    }
                })

                .done(function (data) {
                    if (data != null) {
                        var newitem = $(data);
                        $isotop.prepend(newitem).isotope('appended', newitem);
                        colioFun();
                    }
                })
                .fail(function () {
                    $this.text('Error');
                })
                .always(function () {
                    $this.removeClass('load-active');
                });

                

            });

            isotope_run("*");
        }
    }

    PortfolioSlide();
    /*========== Portfolio Slide ========== */
    function PortfolioSlide(){
        if($('#portfolio-slide').length){
            $('#portfolio-slide').owlCarousel({
                autoPlay: 5000,
                navigation: true,
                pagination: false,
                navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
                singleItem: true
            });
            
        }
    }

    HeighShipping();
    /*========== Set Height Animation Shipping ========== */
    function HeighShipping(){
        if($('.shipping-item').length){
            if($(window).width()<767){
                $('.shipping-item').each(function(index, el) {
                    var $this=$(this),
                        heightP=$this.find('p').height();
                        $this.find('.inner').css('margin-top', heightP+'px');
                });
            }
            else {
                $('.shipping-item').find('.inner').removeAttr('style');
            }
        }
    }

    HidenDropdown();
    /*========== Hiden Dropdown ========== */
    function HidenDropdown(){
        $(document).on('click', function(event) {
            if($('.show-view').length) {
                $('.show-view').removeClass('show-view');
            }
        });

        $(document).on('click','.show-view', function(e) {
            e.stopPropagation();
        });
    }   

	$('.navigation .menu .megamenu').each(function() {
	  var total = $(this).find('.sub-menu > li').length;
	  var i =0;
	  if($(this).attr('class').indexOf('col-3') != -1){
		for(i=1; i<= total; i++) {
			if(i%3==0) {
				$(this).find('.sub-menu > li:eq(' + i + ')').css('clear', 'left');
			}
		}
	  } else if($(this).attr('class').indexOf('col-4') != -1) {
		for(i=1; i<= total; i++) {
			if(i%4==0) {
				$(this).find('.sub-menu > li:eq(' + i + ')').css('clear', 'left');
			}
		}  
	  } else if($(this).attr('class').indexOf('col-5') != -1) {
	  	for(i=1; i<= total; i++) {
			if(i%5==0) {
				$(this).find('.sub-menu > li:eq(' + i + ')').css('clear', 'left');
			}
		}
	  }
	});
});