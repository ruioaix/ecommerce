<?php
/**
 * Add body classes if certain regions have content.
 */
function md_orenmode_preprocess_html(&$vars) {
    global $base_url;
    $css = "";
    $themepath = drupal_get_path('theme', 'md_orenmode');
    drupal_add_js(array('themePath' => $themepath),'setting');
    if(module_exists('icon') && module_exists('fontello')) {
        $icon_bundles = icon_bundles();
        foreach($icon_bundles as $key => $value) {
            if($value['status'] == 1) {
                fontello_process_attached($key);
            }
        }
    }
    drupal_add_css($themepath . '/css/front/library/font-awesome.min.css');
    drupal_add_css($themepath . '/css/front/library/bootstrap.min.css');
    drupal_add_css($themepath . '/css/front/library/owl.carousel.css');
    drupal_add_css($themepath . '/css/front/library/jquery-ui.min.css');
    drupal_add_css($themepath . '/css/front/library/jquery.fancybox.css');
    drupal_add_css($themepath . '/css/front/library/colio.css');
    drupal_add_css($themepath . '/css/front/library/isotope.css');
    drupal_add_css($themepath . '/css/front/style.css');
    drupal_add_css($themepath . '/css/front/custom.css');
    drupal_add_css($themepath . '/css/front/color-pink.css');


    drupal_add_js('https://maps.googleapis.com/maps/api/js?sensor=false');
    drupal_add_js($themepath . '/js/front/library/jquery-ui.min.js');
    drupal_add_js($themepath . '/js/front/library/bootstrap.min.js');
    drupal_add_js($themepath . '/js/front/library/owl.carousel.min.js');
    drupal_add_js($themepath . '/js/front/library/jquery.ui.touch-punch.min.js');
    drupal_add_js($themepath . '/js/front/library/parallax.min.js');
    drupal_add_js($themepath . '/js/front/library/jquery.countdown.min.js');
    drupal_add_js($themepath . '/js/front/library/jquery.mb.YTPlayer.js');
    drupal_add_js($themepath . '/js/front/library/jquery.responsiveTabs.min.js');
    drupal_add_js($themepath . '/js/front/library/jquery.fancybox.js');
    drupal_add_js($themepath . '/js/front/library/SmoothScroll.js');
    drupal_add_js($themepath . '/js/front/library/isotope.min.js');
    drupal_add_js($themepath . '/js/front/library/jquery.colio.min.js');
    drupal_add_js($themepath . '/js/front/library/jflickrfeed.min.js');
    drupal_add_js($themepath . '/js/front/script.js');

//////////////////////////////////////////// SKIN SETTING ////////////////////////////////////////////

    if (theme_get_setting('skin_color')) {
        $skin_color = theme_get_setting('skin_color','md_orenmode');
        $rgb_color = md_orenmode_hex2rgb($skin_color);

        $css .= '.breakcrumb .nav-breakcrumb.om-color li a:hover { color: '.$skin_color.' }'."\n";

        $css .= '.breakcrumb .nav-breakcrumb.om-color li span { color: '.$skin_color.'; border-bottom: 1px solid '.$skin_color.'; }'."\n";

        $css .= '.top-menu .box .flags a.current, .top-menu .box .flags a:hover, .top-menu .bar-icon:hover {border-color: '.$skin_color.'; }'."\n";

        $css .= '.top-menu .bar-icon:hover::after {background-color: '.$skin_color.'; }'."\n";

        $css .= '.mini-cart.show-view .cart-head:after {color: '.$skin_color.'; }'."\n";

        $css .= '.mini-cart .cart-head label span, .mini-cart .cart-head p {color: '.$skin_color.'; }'."\n";

        $css .= '.mini-cart .cart-head .cart-count {background-color: '.$skin_color.'; }'."\n";

        $css .= '.mini-cart .cart-cn .cart-list li .text .name a:hover, .mini-cart .cart-cn .cart-list li .text span {color: '.$skin_color.'; }'."\n";

        $css .= '.mini-cart .cart-cn .cart-bt .btn:hover {background-color: '.$skin_color.'; border-color: '.$skin_color.'; }'."\n";

        $css .= '.mini-cart .cart-cn .cart-total span { color: '.$skin_color.'; }'."\n";

        $css .= '.menu-bar { background-color: '.$skin_color.'; }'."\n";

        $css .= '.header._1 .header-cn .navigation .menu li a:hover,
                 .header._2 .header-cn .navigation .menu li a:hover,
                 .header._3 .header-cn .navigation .menu li a:hover,
                 .header._1 .header-cn .navigation .menu li.current-menu-item > a,
                 .header._2 .header-cn .navigation .menu li.current-menu-item > a,
                 .header._3 .header-cn .navigation .menu li.current-menu-item > a,
                 .header._1 .header-cn .navigation .menu li.current-menu-parent > a,
                 .header._2 .header-cn .navigation .menu li.current-menu-parent > a,
                 .header._3 .header-cn .navigation .menu li.current-menu-parent > a,
                 .header._1 .header-cn .navigation .menu li > a.active,
                 .header._2 .header-cn .navigation .menu li > a.active,
                 .header._3 .header-cn .navigation .menu li > a.active {color: '.$skin_color.'; }'."\n";

        $css .= '.header._1 .header-cn .navigation .menu > li > .sub-menu:before {border-top-color: '.$skin_color.'; }'."\n";

        $css .= '.header._1 .header-cn .navigation .menu > li.menu-parent > a:after {border-top-color: '.$skin_color.'; border-left-color: '.$skin_color.'; }'."\n";

        $css .= '.header._1 .header-cn .navigation .menu > li > a:before, .header._1 .header-cn .navigation .menu > li.current-menu-item > a:before {border-bottom-color: '.$skin_color.'; }'."\n";

        $css .= '.slide .slide-cn._2 .slide-item .text h2 {color: '.$skin_color.'; }'."\n";

        $css .= '.slide-cn .slide-item .text .group .btn { border-color: '.$skin_color.'; color: '.$skin_color.'; }'."\n";

        $css .= '.light_section h1 a:hover, .light_section h2 a:hover, .light_section h3 a:hover, .light_section h4 a:hover, .light_section h5 a:hover, .light_section h6 a:hover { color: '.$skin_color.'; }'."\n";

        $css .= '.slide-cn .slide-item .text .group .btn:hover {background-color: '.$skin_color.'; color: #fff; }'."\n";

        $css .= '.trend-rated-item .text h2 a:hover {color: '.$skin_color.'; }'."\n";

        $css .= '.trend-rated-item .text .price-box .special-price .price {color: '.$skin_color.'; }'."\n";

        $css .= '.featured-slide._2 .owl-prev:hover, .featured-slide._2 .owl-next:hover {border-color: '.$skin_color.'; background-color: '.$skin_color.'; }'."\n";

        $css .= '.selles-rate-item .text .price-box .special-price .price {color: '.$skin_color.'; }'."\n";

        $css .= '.sidebar-slider .slider .ui-slider-range, .sidebar-slider .slider .btn-filter {background-color: '.$skin_color.'; }'."\n";

        $css .= '.nav-cat li .check-box .checkbox:checked ~ label {color: '.$skin_color.'; }'."\n";

        $css .= '.nav-cat li .check-box .checkbox:checked ~ label span {color: '.$skin_color.'; }'."\n";

        $css .= '.sidebar-tags .sidebar-cloud a:hover { color: #fff; border-color: '.$skin_color.'; background-color: '.$skin_color.'; }'."\n";

        $css .= '.view a:after { background-color: '.$skin_color.'; }'."\n";

        $css .= '.view .view-grid:hover { background-position: -19px 0; }'."\n";

        $css .= '.view .view-grid.active { background-position: -19px 0; }'."\n";

        $css .= '.view .view-grid.active:after, .view .view-list.active:after { opacity: 1; }'."\n";

        $css .= '.view .view-list:hover, .view .view-list.active { background-position: -18px 0; }'."\n";

        $css .= '.filter:after { border-color: '.$skin_color.'; }'."\n";

        $css .= '.filter-cn:before { border-color: '.$skin_color.'; }'."\n";

        $css .= '.paging-p li a:hover, .paging-p li.current a {color: '.$skin_color.'; }'."\n";

        $css .= '.list-item .text .name a:hover,
                 .list-item .text .sku span,
                 .list-item .text .rating a:hover,
                 .list-item .text .star,
                 .list-item .text .stock,
                 .list-item .text .group .price-box .special-price .price {color: '.$skin_color.'; } }'."\n";

        $css .= '.list-item._1 .text .group .action .btn-add-cart:hover {background-color: '.$skin_color.'; }'."\n";

        $css .= '.list-item._1 .text .group .action .btn:hover { background-color: '.$skin_color.'; border-color: '.$skin_color.'; }'."\n";

        $css .= '.list-item._2 .text .group .action .btn-add-cart:hover, .list-item._3 .text .group .action .btn-add-cart:hover { background-color: '.$skin_color.'; }'."\n";

        $css .= '.list-item._2 .text .group .price-box .special-price .price, .list-item._3 .text .group .price-box .special-price .price {color: '.$skin_color.'; }'."\n";

        $css .= '.list-item._2 .text .group .action .btn:hover, .list-item._3 .text .group .action .btn:hover { background-color: '.$skin_color.'; border-color: '.$skin_color.'; }'."\n";

        $css .= '.grid-item._1 .image .action .group a:hover { color: '.$skin_color.'; }'."\n";

        $css .= '.grid-item._1 .text .price-box .price { color: '.$skin_color.'; }'."\n";

        $css .= '.grid-item._2 .image .action .btn:hover { background-color: '.$skin_color.'; border-color: '.$skin_color.'; }'."\n";

        $css .= '.grid-item._3 .image .rating-view .btn {border-color: '.$skin_color.'; background-color: '.$skin_color.'; }'."\n";

        $css .= '.grid-item._3 .image .rating-view .btn:hover {background-color: transparent; color: '.$skin_color.'; }'."\n";

        $css .= '.grid-item._3 .text .action .btn:hover { border-color: '.$skin_color.'; background-color: '.$skin_color.'; }'."\n";

        $css .= '.grid-item._3 .text .action .btn.add-cart {background-color: '.$skin_color.'; border-color: '.$skin_color.'; }'."\n";

        $css .= '.grid-item._3 .text .action .btn.add-cart:hover {background-color: transparent; color: '.$skin_color.'; }'."\n";

        $css .= '.grid-item .text .name a:hover { color: '.$skin_color.'; }'."\n";

        $css .= '.grid-item .text .price-box .price { color: '.$skin_color.'; }'."\n";

        $css .= '.grid-item .rating .star { color: '.$skin_color.'; }'."\n";

        $css .= '.grid-item .count-date._1 { background-color: '.$skin_color.'; }'."\n";

        $css .= '.product-detail .product-image .view-block .thumb_list li.active:after,
                 .product-detail .product-image .view-block .thumb_list li:hover::after,
                 .product-detail .product-text .attribute_fieldset .attribute_list .attribute_color li.active:after,
                 .product-detail .product-text .attribute_fieldset .attribute_list .attribute_color li:hover::after {border-color: '.$skin_color.'; }'."\n";

        $css .= '.product-detail .product-text .product_sku span,
                 .product-detail .r-tabs .r-tabs-accordion-title a,
                 .product-detail .product-collateral .nav-tab li.active a,
                 .product-detail .product-text .product_review .review_star {color: '.$skin_color.'; }'."\n";

        $css .= '.product-detail .product-text .price-box .special-price .price {color: '.$skin_color.'; }'."\n";

        $css .= '.product-detail .product-text .add-to-box .add-to-cart .btn {background-color: '.$skin_color.'; border-color: '.$skin_color.'; }'."\n";

        $css .= '.product-detail .product-text .add-to-box .add-to-cart .btn:hover { background-color: transparent; color: '.$skin_color.'; }'."\n";

        $css .= '.product-detail .product-text .add-to-box .add-to-user .btn, .product-detail .product-text .add-to-box .add-to-user .btn a { border-color: '.$skin_color.'; color: '.$skin_color.'; }'."\n";

        $css .= '.product-detail .product-text .add-to-box .add-to-user .btn:hover { background-color: '.$skin_color.'; color: #fff; }'."\n";

        $css .= '.product-detail .product-text .add-to-box .add-to-user .btn:hover a { color: #fff; text-decoration: none; }'."\n";

        $css .= '.related-cn._2 .owl-prev:hover, .related-cn._2 .owl-next:hover { background-color: '.$skin_color.'; border-color: '.$skin_color.'; }'."\n";

        $css .= '.check-out-step li.current:before { background-color: '.$skin_color.'; }'."\n";

        $css .= '.check-out-step li.current span { color: '.$skin_color.'; }'."\n";

        $css .= '.heading-tabs._1 ul li a:hover,
                 .heading-tabs._3 ul li a:hover,
                 .heading-tabs._1 ul li.active a,
                 .heading-tabs._3 ul li.active a { color: '.$skin_color.'; }'."\n";

        $css .= '.heading-tabs._2 ul li a:hover, .heading-tabs._2 ul li.active a { background-color: '.$skin_color.'; border-color: '.$skin_color.'; }'."\n";

        $css .= '.table-cn .table-cart tbody tr td.td-sub,
                 .table-cn .table-cart tbody tr td .info a:hover,
                 .table-cn .table-cart tfoot tr td,
                 .table-cn .table-cart tbody tr td .info .attr span { color: '.$skin_color.'; }'."\n";

        $css .= '.shop-button .btn:hover, .cart-collaterals .btn:hover { background-color: '.$skin_color.'; border-color: '.$skin_color.'; color: #fff; }'."\n";

        $css .= '.blog-item .img .blog-date,
                 .blog-item .text .blog-meta li a span,
                 .blog-item .text h2 a { color: '.$skin_color.'; }'."\n";

        $css .= '.blog-item .text h2 a:hover { text-shadow: 1px 1px 0px rgba(215, 31, 83, 0.3); }'."\n";

        $css .= '.blog-item .img .blog-date { color: '.$skin_color.'; border: 2px solid; border-right: 0; }'."\n";

        $css .= '.blog-item .img .blog-date:before {content: \'\'; display: block; position: absolute; width: 0; height: 15px; border-left: 3px solid; right: -1px; top: -2px; transform-origin: 0 0; transform: skew(45deg); }'."\n";

        $css .= '.blog-item .img .blog-date:after {content: \'\'; display: block; position: absolute; width: 0; height: 15px; border-left: 3px solid; right: -1px; bottom: -2px; transform-origin: 0 100%; transform: skew(-45deg); }'."\n";

        $css .= '.state-box._5, .state-box._6 {color: '.$skin_color.'; border: 2px solid; border-right: 0; }'."\n";

        $css .= '.state-box._5:before, .state-box._6:before { content: \'\'; display: block; position: absolute; width: 0; height: 12px; border-left: 3px solid; right: -1px; top: -2px; -webkit-transform-origin: 0 0; -moz-transform-origin: 0 0; -ms-transform-origin: 0 0; -o-transform-origin: 0 0; transform-origin: 0 0; -webkit-transform: skew(45deg); -moz-transform: skew(45deg); -ms-transform: skew(45deg); -o-transform: skew(45deg); transform: skew(45deg); }'."\n";

        $css .= '.state-box._5:after, .state-box._6:after { content: \'\'; display: block; position: absolute; width: 0; height: 12px; border-left: 3px solid; right: -1px; bottom: -2px; -webkit-transform-origin: 0 100%; -moz-transform-origin: 0 100%; -ms-transform-origin: 0 100%; -o-transform-origin: 0 100%; transform-origin: 0 100%; -webkit-transform: skew(-45deg); -moz-transform: skew(-45deg); -ms-transform: skew(-45deg); -o-transform: skew(-45deg); transform: skew(-45deg); }'."\n";

        $css .= '.widget_categories ul li a:hover,
                 .widget_archive ul li a:hover,
                 .widget_categories ul li.current-cat a,
                 .widget_archive ul li.current-cat a { color: '.$skin_color.'; }'."\n";

        $css .= '.widget_recent_entries ul li .post-name:hover { color: '.$skin_color.'; }'."\n";

        $css .= '.widget_tag_cloud .tag_cloud a:hover { color: #fff; border-color: '.$skin_color.'; background-color: '.$skin_color.'; }'."\n";

        $css .= '.post .entry-header .entry-title a:hover,
                 .post .entry-content .more-link a,
                 .post .entry-header .entry-meta li.post-author a,
                 .post .entry-header .entry-meta li.post-comment a span { color: '.$skin_color.'; }'."\n";

        $css .= '.post .entry-header .entry-thumb a:after { background-color: '.$skin_color.'; }'."\n";

        $css .= '.paging ul li a { color: '.$skin_color.'; }'."\n";

        $css .= '.paging ul li a:hover { background-color: '.$skin_color.'; color: #fff; }'."\n";

        $css .= '.paging ul li.current a { background-color: '.$skin_color.'; color: #fff; }'."\n";

        $css .= '.post-single blockquote:before { background-color: '.$skin_color.'; }'."\n";

        $css .= '#comments .commentlist .comment .comment-body .comment-f a { color: '.$skin_color.'; border-bottom: 1px solid '.$skin_color.'; }'."\n";

        $css .= '.comment-respond .btn { background-color: '.$skin_color.'; border-color: '.$skin_color.'; }'."\n";

        $css .= '.comment-respond .btn:hover { background-color: transparent; color: '.$skin_color.'; }'."\n";

        $css .= '.partner-cn._2 .owl-next:hover, .partner-cn._2 .owl-prev:hover { background-color: '.$skin_color.'; border-color: '.$skin_color.'; }'."\n";

        $css .= '.check-out-form .btn:hover { background-color: '.$skin_color.'; border-bottom-color: '.$skin_color.'; }'."\n";

        $css .= '.collection-item .text .btn:hover { background-color: '.$skin_color.'; border-color: '.$skin_color.'; }'."\n";

        $css .= '.form.login .btn-submit:hover { background-color: '.$skin_color.'; border-color: '.$skin_color.'; color: #fff; }'."\n";

        $css .= '.page-404-cn .btn { background-color: '.$skin_color.'; border-color: '.$skin_color.'; }'."\n";

        $css .= '.page-404-cn .btn:hover { color: '.$skin_color.'; background-color: transparent; }'."\n";

        $css .= '.portfolio .portfolio-item._1:after { background-color: '.$skin_color.'; }'."\n";

        $css .= '.portfolio .portfolio-item._1:hover::after { opacity: 0.8; }'."\n";

        $css .= '.portfolio .portfolio-item._2 .img .quick-view:hover { background-color: '.$skin_color.'; }'."\n";

        $css .= '.portfolio .portfolio-item._2 .text p span { color: '.$skin_color.'; }'."\n";

        $css .= '.portfolio .portfolio-item._2:hover .text { background-color: '.$skin_color.'; }'."\n";

        $css .= '.portfolio .portfolio-item._2:hover .text:after { background-color: '.$skin_color.'; }'."\n";

        $css .= '.load-more-pf .btn { border-color: '.$skin_color.'; color: '.$skin_color.'; }'."\n";

        $css .= '.load-more-pf .btn:hover { background-color: '.$skin_color.'; color: #fff; }'."\n";

        $css .= '.load-more-pf .btn.load-active { background-color: '.$skin_color.'; }'."\n";

        $css .= '.portfolio-info ul li .label-inf i { color: '.$skin_color.'; }'."\n";

        $css .= '.portfolio-info ul li p a { color: '.$skin_color.'; }'."\n";

        $css .= '.colio .colio-close:hover::before, .colio .colio-close:hover::after { background-color: '.$skin_color.'; }'."\n";

        $css .= '.shipping-item .inner .icon { color: '.$skin_color.'; }'."\n";

        $css .= '.shipping-item:hover { background-color: '.$skin_color.'; border-color: '.$skin_color.'; }'."\n";

        $css .= '#scroll-top { background-color: '.$skin_color.'; }'."\n";

        $css .= '#scroll-top:after { border-bottom-color: '.$skin_color.'; }'."\n";

        $css .= '.view a svg { fill: '.$skin_color.'; }'."\n";

        $css .= '.grid-cn-3 .action .add-cart:hover i { color: '.$skin_color.'; }'."\n";

        $css .= '.pager > li > a:hover, .pager > li > a:focus { background-color: '.$skin_color.'; border-color: '.$skin_color.'; }'."\n";

        $css .= '.pager > .pager-current,
                 .pager > .pager-current,
                 .pager > .pager-current { background-color: '.$skin_color.'; border-color: '.$skin_color.'; }'."\n";

        $css .= '.portfolio .portfolio-item._2 .text p a { color: '.$skin_color.'; }'."\n";

        $css .= '.portfolio .portfolio-item._2:hover .text p a { color: '.$skin_color.'; }'."\n";

        $css .= '.cart-cn .line-item-summary .line-item-total-raw,
                 .page-cart .line-item-total .line-item-total-raw,
                 .page-checkout .line-item-total .component-total { color: '.$skin_color.'; }'."\n";

        $css .= '.table-wishlist .form-submit:hover { color: '.$skin_color.'; border-color: '.$skin_color.'; }'."\n";

        $css .= '.state-box._4 { color: '.$skin_color.'; }';

        $css .= '.grid-item._1 .image .action .group .add-to-cart:hover i { color: '.$skin_color.'; }'."\n";

        $css .= '.product-compare .compare-content .table-compare .td-compare .price { color: '.$skin_color.'; }'."\n";

        $css .= '.product-compare .compare-content .table-compare .td-compare .product_review .review_star { color: '.$skin_color.'; }'."\n";

        $css .= '.product-compare .compare-content .table-compare .td-compare h2 a:hover { color: '.$skin_color.'; }'."\n";

        $css .= '.btn.btn-1:hover { color: '.$skin_color.'; border-color: '.$skin_color.'; }'."\n";

        $css .= '.product-compare .compare-content .table-compare .td-compare .compare-action .btn.btn-17:hover { border-color: '.$skin_color.'; color: '.$skin_color.'; }'."\n";

        $css .= '.product-compare .compare-content .table-compare .td-compare .compare-action .btn.btn-17:hover a { color: '.$skin_color.'; text-decoration: none; }'."\n";

        $css .= '.product-text .attribute_fieldset .attribute_list .attribute_size li.active { background-color: '.$skin_color.'; }'."\n";

        $css .= '.product-text .attribute_fieldset .attribute_list .attribute_size li.active a { color: #fff; }'."\n";

        $css .= 'ul.tabs.primary li.active a, ul.tabs.primary li:hover a { color: #fff; background-color: '.$skin_color.';  }'."\n";

        $css .= '.page-404 .page-404-cn h2 span { color: '.$skin_color.';  }'."\n";

        $css .= '.btn.btn-3 { border-color: '.$skin_color.'; background-color: '.$skin_color.';  }'."\n";

        $css .= '.btn.btn-3:hover { color: '.$skin_color.'; }'."\n";
    }


//////////////////////////////////////////// FAVICON SETTING ////////////////////////////////////////////
    // Add favicon.
    if (theme_get_setting('toggle_fvicon','md_orenmode')) {
        $favicon_path = '';
        if(theme_get_setting('default_favicon','md_orenmode') == 0) {
            $favicon = theme_get_setting('fvicon_upload','md_orenmode');
            if(!empty($favicon)) {
                if(is_array($favicon)) {
                    if($favicon['fid'] != 0) {
                        $file = file_load((string)($favicon['fid']));
                        if($file) {
                            $favicon_path = file_create_url($file->uri);
                        }
                    }
                } else {
                    $file = json_decode($favicon);
                    $favicon_path = $file->url;
                }
            } else {
                $favicon_path = base_url().'/'.$themepath.'/favicon.ico';
            }
        } else {
            $favicon_path = base_url().'/'.$themepath.'/favicon.ico';
        }
        $type = theme_get_setting('favicon_mimetype','md_orenmode');
        drupal_add_html_head_link(array('rel' => 'shortcut icon', 'href' => drupal_strip_dangerous_protocols($favicon_path), 'type' => $type));
    }
    // iOs webclip
    if(theme_get_setting('webclip_57_upload','md_orenmode')) {
        $file_upload = theme_get_setting('webclip_57_upload','md_orenmode');
        if(is_array($file_upload)) {
            if($file_upload['fid'] != 0) {
                $file = file_load($file_upload['fid']);
                if($file) {
                    $path = file_create_url($file->uri);
                    $vars['ios_57'] = $path;
                }
            } else {
                $vars['ios_57'] = '';
            }
        } else {
            $file = json_decode($file_upload);
            $vars['ios_57'] = $file->url;
        }
    } else {
        $vars['ios_57'] = '';
    }
    if(theme_get_setting('webclip_72_upload','md_orenmode')) {
        $file_upload = theme_get_setting('webclip_72_upload','md_orenmode');
        if(is_array($file_upload)) {
            if($file_upload['fid'] != 0) {
                $file = file_load($file_upload['fid']);
                if($file) {
                    $path = file_create_url($file->uri);
                    $vars['ios_72'] = $path;
                }
            } else {
                $vars['ios_72'] = '';
            }
        } else {
            $file = json_decode($file_upload);
            $vars['ios_72'] = $file->url;
        }
    }
    if(theme_get_setting('webclip_114_upload','md_orenmode')) {
        $file_upload = theme_get_setting('webclip_114_upload','md_orenmode');
        if(is_array($file_upload)) {
            if($file_upload['fid'] != 0) {
                $file = file_load($file_upload['fid']);
                if($file) {
                    $path = file_create_url($file->uri);
                    $vars['ios_114'] = $path;
                }
            } else {
                $vars['ios_114'] = '';
            }
        } else {
            $file = json_decode($file_upload);
            $vars['ios_114'] = $file->url;
        }
    }
    if(theme_get_setting('webclip_144_upload','md_orenmode')) {
        $file_upload = theme_get_setting('webclip_144_upload','md_orenmode');
        if(is_array($file_upload)) {
            if($file_upload['fid'] != 0) {
                $file = file_load($file_upload['fid']);
                if($file) {
                    $path = file_create_url($file->uri);
                    $vars['ios_144'] = $path;
                }
            } else {
                $vars['ios_144'] = '';
            }
        } else {
            $file = json_decode($file_upload);
            $vars['ios_144'] = $file->url;
        }
    }


    /* ------------------------- Blog Page ------------------------*/

    if(in_array('node-type-blog',$vars['classes_array'])) {
        $vars['classes_array'][] = 'blog-page';
    }

    /* ----------------------------------------------- Menu ---------------------------------------------------------*/
    /*if(theme_get_setting('menu_sticky','md_orenmode')) {
        drupal_add_js(array('menuStickyEnable' => theme_get_setting('menu_sticky','md_orenmode')),'setting');
    }
    if(theme_get_setting('menu_bg_color','md_orenmode')) {
        $css .= '.main-menu {background-color: #'.theme_get_setting('menu_bg_color','md_orenmode').'}'."\n";
    }
    if(theme_get_setting('menu_link_color','md_orenmode')) {
        $css .= '.menu-nav li a {color: #'.theme_get_setting('menu_link_color','md_orenmode').'}'."\n";
    }
    if(theme_get_setting('menu_link_hover_color','md_orenmode')) {
        $css .= '.menu-nav li a:hover {color: #'.theme_get_setting('menu_link_hover_color','md_orenmode').'}'."\n";
    }*/
    /* ---------------------------------------------- Header -----------------------------------------------------*/
    $header_bg_type = theme_get_setting('header_background_type','md_orenmode');
    drupal_add_js(array('hdBgType' => $header_bg_type),'setting');
    if($header_bg_type == 'image') {
        if(theme_get_setting('header_slide_delay_time','md_orenmode')) {
            drupal_add_js(array('hdSlideDelayTime' => theme_get_setting('header_slide_delay_time','md_orenmode')),'setting');
        }
        if(theme_get_setting('header_slide_effect','md_orenmode')) {
            drupal_add_js(array('hdSlideEffect' => theme_get_setting('header_slide_effect','md_orenmode')),'setting');
        }
        if(theme_get_setting('header_slide_animation','md_orenmode')) {
            drupal_add_js(array('hdSlideAnimation' => theme_get_setting('header_slide_animation','md_orenmode')),'setting');
        }
    }
    if($header_bg_type == 'video') {
        if(theme_get_setting('header_video_resolution','md_orenmode')){
            $hd_video_res = theme_get_setting('header_video_resolution','md_orenmode');
            drupal_add_js(array('headerVideoRes' => $hd_video_res),'setting');
        }
    }
    if($header_bg_type == 'static') {
        if(theme_get_setting('header_static_image_upload','md_orenmode')) {
            $file_upload =  theme_get_setting('header_static_image_upload','md_orenmode');
            if(is_array($file_upload)) {
                if($file_upload['fid'] != 0) {
                    $file = file_load($file_upload['fid']);
                    if($file) {
                        $css .= '.text-ticker-holder {background-image : url("'.file_create_url($file->uri).'");}';
                    }
                }
            } else {
                $file = json_decode(($file_upload));
                $css .= '.text-ticker-holder {background-image : url("'.$file->url.'");}';
            }
        }
    }

    /* ---------------------------------------------- 404 Page -----------------------------------------------------*/
    if(theme_get_setting('choose_nf_pattern','md_orenmode')) {
        $css .= ".nf-pattern { background: #000000 url(" . $base_url .'/'. $themepath ."/images/background/patterns/". theme_get_setting('choose_nf_pattern','md_orenmode') . ".png) repeat scroll center center;}\n";
    }

    $vars['theme_setting_css'] = $css;


	// Enable Responsive
	if (theme_get_setting('responsive','md_orenmode')) {
		$menuid = 'main-menu';
		if (!empty($vars['page']['superfish'])) {
			$tmp_array_keys = array_keys($vars['page']['superfish']);
			$menuid = str_replace("_","-",$tmp_array_keys[0]);
		}
		$selecnav = '(function ($) {
			$(function(){
				selectnav(\''.$menuid.'\', {
					label: \''.t('--- Table of content ---').'\',//first select field
					nested: true,
					indent: \'-\'
			 });
		});
		})(jQuery);';
		drupal_add_js($selecnav, 'inline');
		$vp = array(
          '#type' => 'html_tag',
          '#tag' => 'meta',
          '#attributes' => array(
            'name' =>  'viewport',
            'content' =>  'width=100%, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no'
          )
        );
        drupal_add_html_head($vp, 'viewport');
	}

    $vars['theme_setting_css'] = $css;
    //Google Fonts
    if(theme_get_setting('googlewebfonts','md_orenmode')) {
        drupal_add_css(theme_get_setting('googlewebfonts'),'external');
    }
	// Typekit
	if (theme_get_setting('typekit_id','md_orenmode')) {
		drupal_add_js('http://use.typekit.net/'.theme_get_setting('typekit_id','md_orenmode').'.js', 'external');
		drupal_add_js('try{Typekit.load();}catch(e){}', 'inline');
	}

	/* Text/typography
	---------------------------------------------------------------------------------------- */
	$typography = '';
	// common text
	if (theme_get_setting('text_font','md_orenmode') || theme_get_setting('ts_font_color','md_orenmode')) {
    $typography = "body {";
    $typography .= md_orenmode_font_to_css(theme_get_setting('text_font','md_orenmode'));
		if (theme_get_setting('ts_font_color','md_orenmode')) {
      $typography .= 'color: #' . theme_get_setting('ts_font_color') . ';';
		}
    $typography   .= "}\n";
	}
    /////
  $text_font_arr = explode("|", theme_get_setting('text_font','md_orenmode'));
  if (count($text_font_arr) == 5 && $text_font_arr[0] != '0') {
    $typography   .= '#forum, ul.quicktabs-tabs, #nav ul.sf-menu li li,.ui-widget {font-family: '.$text_font_arr[4].';}';
  }
    /////
	// Text selection
	if (theme_get_setting('tss_bgcolor','md_orenmode') || theme_get_setting('tss_tcolor','md_orenmode')) {
    $tss_bgcolor = '';
    $tss_tcolor = '';
		if (theme_get_setting('tss_bgcolor','md_orenmode')) {
		  $tss_bgcolor   = 'background: #'.theme_get_setting('tss_bgcolor','md_orenmode').';';
		}
		if (theme_get_setting('tss_tcolor','md_orenmode')) {
		  $tss_tcolor   = 'color: #'.theme_get_setting('tss_tcolor','md_orenmode').';';
		}
    $typography   .= "::-moz-selection {". $tss_bgcolor . $tss_tcolor . "text-shadow: none;}\n";
    $typography   .= "::selection {" . $tss_bgcolor . $tss_tcolor. "text-shadow: none;}\n";
	}
	// link regular
	if (theme_get_setting('l_regular_color','md_orenmode') || theme_get_setting('l_regular_st','md_orenmode') || theme_get_setting('l_regular__hl','md_orenmode') || theme_get_setting('l_regular_ts','md_orenmode')) {
    $typography   .= "a:link, #node-title a {";
		if (theme_get_setting('l_regular_color','md_orenmode')) {
      $typography   .= 'color: #'.theme_get_setting('l_regular_color','md_orenmode').';';
		}
		if (theme_get_setting('l_regular__hl','md_orenmode')) {
		  $typography   .= 'background-color: #'.theme_get_setting('l_regular__hlc','md_orenmode').';';
		}
        if(theme_get_setting('l_regular_st','md_orenmode') == 1) {
            $typography .= 'text-decoration: line-through';
        }
		$l_text_style = theme_get_setting('l_regular_ts','md_orenmode');
		if ($l_text_style['bold']) {
		  $typography   .= 'font-weight: '.$l_text_style['bold'].';';
		}
		if ($l_text_style['italic']) {
		  $typography   .= 'font-style: '.$l_text_style['italic'].';';
		}
		if ($l_text_style['underline']) {
		  $typography   .= 'text-decoration: '.$l_text_style['underline'].';';
		}
		$typography   .= "}\n";
	}
	// link rollover
	if (theme_get_setting('l_rollover_color','md_orenmode') || theme_get_setting('l_rollover_st','md_orenmode') || theme_get_setting('l_rollover__hl','md_orenmode') || theme_get_setting('l_rollover_ts','md_orenmode')) {
		$typography   .= "a:hover, #node-title a:hover {";
		if (theme_get_setting('l_rollover_color')) {
		  $typography   .= 'color: #'.theme_get_setting('l_rollover_color','md_orenmode').';';
		}
		if (theme_get_setting('l_rollover__hl')) {
		  $typography   .= 'background-color: #'.theme_get_setting('l_rollover__hlc','md_orenmode').';';
		}
        if(theme_get_setting('l_rollover_st','md_orenmode') == 1) {
            $typography .= 'text-decoration: line-through';
        }
		$l_text_style = theme_get_setting('l_rollover_ts','md_orenmode');
		if ($l_text_style['bold']) {
		  $typography   .= 'font-weight: '.$l_text_style['bold'].';';
		}
		if ($l_text_style['italic']) {
		  $typography   .= 'font-style: '.$l_text_style['italic'].';';
		}
		if ($l_text_style['underline']) {
		  $typography   .= 'text-decoration: '.$l_text_style['underline'].';';
		}
		$typography   .= "}\n";
	}

	// link visited
	if (theme_get_setting('l_visited_color','md_orenmode') || theme_get_setting('l_visited_st','md_orenmode') || theme_get_setting('l_visited__hl','md_orenmode') || theme_get_setting('l_visited_ts','md_orenmode')) {
		$typography   .= "a:visited, #node-title a:visited {";
		if (theme_get_setting('l_visited_color')) {
		  $typography   .= 'color: #'.theme_get_setting('l_visited_color','md_orenmode').';';
		}
		if (theme_get_setting('l_visited__hl')) {
		  $typography   .= 'background-color: #'.theme_get_setting('l_visited__hlc','md_orenmode').';';
		}
        if(theme_get_setting('l_visited_st','md_orenmode') == 1) {
            $typography .= 'text-decoration: line-through';
        }
		$l_text_style = theme_get_setting('l_visited_ts','md_orenmode');
		if ($l_text_style['bold']) {
		  $typography   .= 'font-weight: '.$l_text_style['bold'].';';
		}
		if ($l_text_style['italic']) {
		  $typography   .= 'font-style: '.$l_text_style['italic'].';';
		}
		if ($l_text_style['underline']) {
		  $typography   .= 'text-decoration: '.$l_text_style['underline'].';';
		}
		$typography   .= "}\n";
	}

	// link on
	if (theme_get_setting('l_on_color','md_orenmode') || theme_get_setting('l_on_st','md_orenmode') || theme_get_setting('l_on_hl','md_orenmode') || theme_get_setting('l_on_ts','md_orenmode')) {
		$typography   .= "a:focus, a:active, #node-title a:focus, #node-title a:active {";
		if (theme_get_setting('l_on_color')) {
		  $typography   .= 'color: #'.theme_get_setting('l_on_color','md_orenmode').';';
		}
		if (theme_get_setting('l_on_hl')) {
		  $typography   .= 'background-color: #'.theme_get_setting('l_on_hlc','md_orenmode').';';
		}
        if(theme_get_setting('l_on_st','md_orenmode') == 1) {
            $typography .= 'text-decoration: line-through';
        }
		$l_text_style = theme_get_setting('l_on_ts','md_orenmode');
		if ($l_text_style['bold']) {
		  $typography   .= 'font-weight: '.$l_text_style['bold'].';';
		}
		if ($l_text_style['italic']) {
		  $typography   .= 'font-style: '.$l_text_style['italic'].';';
		}
		if ($l_text_style['underline']) {
		  $typography   .= 'text-decoration: '.$l_text_style['underline'].';';
		}
		$typography   .= "}\n";
	}
	// Main menu
	if (theme_get_setting('typo_menu_style','md_orenmode') || theme_get_setting('typo_menu_color','md_orenmode')) {
		$typography   .= "#menu li{";
		if (theme_get_setting('text_font','md_orenmode')) {
		  $typography   .= md_orenmode_font_to_css(theme_get_setting('typo_menu_style','md_orenmode'));
		}

		if (theme_get_setting('typo_menu_color','md_orenmode')) {
		  $typography   .= 'color: #'.theme_get_setting('typo_menu_color','md_orenmode').';';
		}
		$typography   .= "}\n";

		if (theme_get_setting('typo_menu_color','md_orenmode')) {
		  $typography   .= '#menu li a, #nav ul.sf-menu li a {color: #'.theme_get_setting('typo_menu_color','md_orenmode').';}';
		}
		if (theme_get_setting('typo_menu_hover_color','md_orenmode')) {
		  $typography   .= '#menu li > a:hover,#menu li.sfHover > a, #main li:hover a {color: #'.theme_get_setting('typo_menu_hover_color','md_orenmode').';}'."\n";
		}
		if (theme_get_setting('typo_menu_active_color','md_orenmode')) {
		  $typography   .= '#menu li > a:hover, #menu li.sfHover > a, #menu li a.active, #menu li.active a {color: #'.theme_get_setting('typo_menu_active_color','md_orenmode').';}'."\n";
		}
	}
    /*-------------------------------------- Heading --------------------------------*/
    if(theme_get_setting('typo_heading_style_enable','md_orenmode') == 1){
        for($i=1;$i<=6;$i++){
            $typography .= 'h'.$i.' {';
            if(theme_get_setting('typo_heading_h'.$i.'_style') || theme_get_setting('typo_heading_h'.$i.'_color','md_orenmode')){
                if(theme_get_setting('typo_heading_h'.$i.'_style')){
                    $typography .= md_orenmode_font_to_css(theme_get_setting('typo_heading_h'.$i.'_style'));
                }
                if(theme_get_setting('typo_heading_h'.$i.'_color','md_orenmode')){
                    $typography .= ' color: #'.theme_get_setting('typo_heading_h'.$i.'_color').';';
                }
            }
            $typography .= "}\n";
        }
    }
	/*------------------------------------ Node title ---------------------------------*/
	if (theme_get_setting('typo_nodetitle_style','md_orenmode') || theme_get_setting('nodetitle_color','md_orenmode')) {
		$typography   .= "#node-title {";
		if (theme_get_setting('typo_nodetitle_style')) {
		  $typography   .= md_orenmode_font_to_css(theme_get_setting('typo_nodetitle_style'));
		}

		if (theme_get_setting('nodetitle_color','md_orenmode')) {
		  $typography   .= 'color: #'.theme_get_setting('nodetitle_color','md_orenmode').';';
		}
		$typography   .= "}\n";

		if (theme_get_setting('nodetitle_color')) {
		  $typography   .= '#node-title a {color: #'.theme_get_setting('nodetitle_color','md_orenmode').';}'."\n";
		}

		if (theme_get_setting('nodetitle_hover_color')) {
		  $typography   .= '#node-title a:hover {color: #'.theme_get_setting('nodetitle_hover_color','md_orenmode').';}'."\n";
		}
	}

	if (theme_get_setting('nodetitle_enable','md_orenmode') == 1) {
		foreach (node_type_get_types() as $type => $name) {
			if (theme_get_setting('typo_n'.$type.'title_style') || theme_get_setting('n'.$type.'title_color','md_orenmode')) {
				$typography   .= "#node-title span.node-$type-title {";
				if (theme_get_setting('typo_n'.$type.'title_style')) {
				  $typography   .= md_orenmode_font_to_css(theme_get_setting('typo_n'.$type.'title_style','md_orenmode'));
				}

				if (theme_get_setting('n'.$type.'title_color','md_orenmode')) {
				  $typography   .= 'color: #'.theme_get_setting('n'.$type.'title_color','md_orenmode').';';
				}
				$typography   .= "}\n";

				if (theme_get_setting('n'.$type.'title_color','md_orenmode')) {
				  $typography   .= '#node-title span.node-'.$type.'-title a {color: #'.theme_get_setting('n'.$type.'title_color','md_orenmode').';}'."\n";
				}

				if (theme_get_setting('n'.$type.'title_hover_color','md_orenmode')) {
				  $typography   .= '#node-title span.node-'.$type.'-title a:hover {color: #'.theme_get_setting('n'.$type.'title_hover_color','md_orenmode').';}'."\n";
				}
			}
		}
	}

    // View block title
    if (theme_get_setting('typo_view_title_style','md_orenmode') || theme_get_setting('typo_view_title_color','md_orenmode')) {
        $typography   .= ".flx-intro-2 h2 {";
        if (theme_get_setting('typo_view_title_style','md_orenmode')) {
            $typography   .= md_orenmode_font_to_css(theme_get_setting('typo_view_title_style','md_orenmode'));
        }

        if (theme_get_setting('typo_view_title_color')) {
            $typography   .= 'color: #'.theme_get_setting('typo_view_title_color','md_orenmode').' !important;';
        }
        $typography   .= "}\n";

    }

    if (theme_get_setting('typo_view_title_enable','md_orenmode') == 1) {
        $views = views_get_all_views($reset = FALSE);
        foreach ($views as $view_name => $view) {
            if(($view->disabled) !== true){
                $view_title = $view->name;

                if (theme_get_setting('typo_view_'.$view_title.'_title_style') || theme_get_setting('typo_view_'.$view_title.'_title_color','md_orenmode')) {
                    $typography   .= ".flx-intro-2 h2.view-".$view_title."-title {";
                    if (theme_get_setting('typo_view_'.$view_title.'_title_style')) {
                        $typography   .= md_orenmode_font_to_css(theme_get_setting('typo_view_'.$view_title.'_title_style','md_orenmode'));
                    }

                    if (theme_get_setting('typo_view_'.$view_title.'_title_color','md_orenmode')) {
                        $typography   .= 'color: #'.theme_get_setting('typo_view_'.$view_title.'_title_color','md_orenmode').' !important;';
                    }
                    $typography   .= "}\n";
                }
            }

        }
    }
    //View block description
    if (theme_get_setting('typo_view_description_style','md_orenmode') || theme_get_setting('typo_view_description_color','md_orenmode')) {
        $typography   .= ".flx-intro-2 h5.flx-intro-excerpt {";
        if (theme_get_setting('typo_view_description_style','md_orenmode')) {
            $typography   .= md_orenmode_font_to_css(theme_get_setting('typo_view_description_style','md_orenmode'));
        }

        if (theme_get_setting('typo_view_description_color','md_orenmode')) {
            $typography   .= 'color: #'.theme_get_setting('typo_view_description_color','md_orenmode').' !important;';
        }
        $typography   .= "}\n";

    }

    if (theme_get_setting('typo_view_description_enable','md_orenmode') == 1) {
        $views = views_get_all_views($reset = FALSE);
        foreach ($views as $view_name => $view) {
            if(($view->disabled) !== true){
                $view_title = $view->name;

                if (theme_get_setting('typo_view_'.$view_title.'_description_style','md_orenmode') || theme_get_setting('typo_view_'.$view_title.'_description_color','md_orenmode')) {
                    $typography   .= ".flx-intro-2 span.view-".$view_title."-description {";
                    if (theme_get_setting('typo_view_'.$view_title.'_description_style','md_orenmode')) {
                        $typography   .= md_orenmode_font_to_css(theme_get_setting('typo_view_'.$view_title.'_description_style','md_orenmode'));
                    }

                    if (theme_get_setting('typo_view_'.$view_title.'_description_color','md_orenmode')) {
                        $typography   .= 'color: #'.theme_get_setting('typo_view_'.$view_title.'_description_color','md_orenmode').' !important;';
                    }
                    $typography   .= "}\n";
                }
            }

        }
    }
    if (theme_get_setting('typo_webformtitle_style','md_orenmode') || theme_get_setting('typo_webformtitle_color','md_orenmode')) {
        $typography   .= ".flx-map-form span.webform-title{";
        if (theme_get_setting('typo_webformtitle_style','md_orenmode')) {
            $typography   .= md_orenmode_font_to_css(theme_get_setting('typo_webformtitle_style','md_orenmode'));
        }

        if (theme_get_setting('typo_webformtitle_color','md_orenmode')) {
            $typography   .= 'color: #'.theme_get_setting('typo_webformtitle_color','md_orenmode').' !important;';
        }
        $typography   .= "}\n";

    }
    if (theme_get_setting('typo_webformdescription_style','md_orenmode') || theme_get_setting('typo_webformdescription_color','md_orenmode')) {
        $typography   .= ".flx-map-form span.webform-description{";
        if (theme_get_setting('typo_webformdescription_style','md_orenmode')) {
            $typography   .= md_orenmode_font_to_css(theme_get_setting('typo_webformdescription_style','md_orenmode'));
        }

        if (theme_get_setting('typo_webformdescription_color','md_orenmode')) {
            $typography   .= 'color: #'.theme_get_setting('typo_webformdescription_color','md_orenmode').' !important;';
        }
        $typography   .= "}\n";
    }

	$vars['typography'] = $typography;

	/* Get theme settings
	---------------------------------------------------------------------------------------- */
	$vars['footer_text']   = theme_get_setting('footer_text','md_orenmode');
	$vars['header_code']   = theme_get_setting('header_code','md_orenmode');
	$vars['footer_code']   = theme_get_setting('footer_code','md_orenmode');
	if (theme_get_setting('custom_css','md_orenmode')) {
		$vars['custom_css']  = theme_get_setting('custom_css','md_orenmode');
	}
	drupal_add_css(path_to_theme() . '/css/ie7.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lte IE 7', '!IE' => FALSE), 'preprocess' => FALSE));
}

function md_orenmode_font_to_css($font) {
    $font_arr = explode("|", $font);
    $css = "";
    if(count($font_arr) == 6) {
        if ($font_arr[0] != '0') {
            $css = ''.$font_arr[5].';';
        }
    }
    return $css;
}

function md_orenmode_expand_font_weight($fw) {
				switch($fw) {
					case 'n1':
						$fontExpand = "font-style: normal; font-weight: 100;";
				  	break;
					case 'i1':
						$fontExpand = "font-style: italic; font-weight: 100;";
						break;
					case 'n2':
						$fontExpand = "font-style: normal; font-weight: 200;";
				  	break;
					case 'i2':
						$fontExpand = "font-style: italic; font-weight: 200;";
						break;
					case 'n3':
						$fontExpand = "font-style: normal; font-weight: 300;";
				  	break;
					case 'i3':
						$fontExpand = "font-style: italic; font-weight: 300;";
						break;
					case 'n4':
						$fontExpand = "font-style: normal; font-weight: normal;";
				  	break;
					case 'i4':
						$fontExpand = "font-style: italic; font-weight: normal";
						break;
					case 'n5':
						$fontExpand = "font-style: normal; font-weight: 500;";
				  	break;
					case 'i5':
						$fontExpand = "font-style: italic; font-weight: 500;";
						break;
					case 'n6':
						$fontExpand = "font-style: normal; font-weight: 600;";
				  	break;
					case 'i6':
						$fontExpand = "font-style: italic; font-weight: 600;";
						break;
					case 'n7':
						$fontExpand = "font-style: normal; font-weight: bold;";
				  	break;
					case 'i7':
						$fontExpand = "font-style: italic; font-weight: bold;";
						break;
					case 'n8':
						$fontExpand = "font-style: normal; font-weight: 800;";
				  	break;
					case 'i8':
						$fontExpand = "font-style: italic; font-weight: 800;";
						break;
					case 'n9':
						$fontExpand = "font-style: normal; font-weight: 800;";
				  	break;
					case 'i9':
						$fontExpand = "font-style: italic; font-weight: 800;";
						break;
					default:
						$fontExpand = "";
				}

				return $fontExpand;
			}

/**
 * Override or insert vars into the page template for HTML output.
 */
function md_orenmode_process_html(&$vars) {
  // Hook into color.module.
  if (module_exists('color')) {
    _color_html_alter($vars);
  }

	$classes = explode(' ', $vars['classes']);
  if ($node = menu_get_object()) {
    $node_type_class = drupal_html_class('node-type-' . $node->type);
    if (in_array($node_type_class, $classes)) {
      theme_get_setting('extra_page_classes','md_orenmode') == 0 ? '' : $classes = str_replace($node_type_class, '', $classes);
      $classes = str_replace('node-type-', 'page-type-', $classes);
    }
  }
  $vars['classes'] = trim(implode(' ', $classes));
}



/**
 * Override or insert vars into the page template.
 */
function md_orenmode_process_page(&$vars) {
  if(isset($vars['node'])) {
    $node = $vars['node'];
    $vars['page_title'] = $vars['node']->type;
    // Check and create previous and next link of current node
    $nid = $node->nid;
    $node_type = $node->type;
    $query = db_select('node', 'n');
    $query->fields('n', array('nid'))
        ->condition('type', $node_type)
        ->orderBy('nid');
    $result = $query->execute();
    $nids = array();
    while ($record = $result->fetchAssoc()) {
        $nids[] .= $record['nid'];
    }
    $current_node_key =  array_search($nid, $nids);
    if(($current_node_key-1) > 0) {
        $vars['previous_link'] = url('node/'.$nids[$current_node_key-1],array('absolute'=>true));
    }
    if(($current_node_key + 1) != sizeof($nids)) {
        $vars['next_link'] = url('node/'.$nids[$current_node_key+1],array('absolute'=>true));
    }
  }
  
  // Hook into color.module.
  if (module_exists('color')) {
    _color_page_alter($vars);
  }

	$status = drupal_get_http_header("status");
  if($status == "404 Not Found") {
    $vars['theme_hook_suggestions'][] = 'page__404';
  }

	$vars['social_links'] = 0;

  // Always print the site name and slogan, but if they are toggled off, we'll
  // just hide them visually.
  $vars['hide_site_name']   = theme_get_setting('toggle_name','md_orenmode') ? FALSE : TRUE;
  $vars['hide_site_slogan'] = theme_get_setting('toggle_slogan','md_orenmode') ? FALSE : TRUE;
  if ($vars['hide_site_name']) {
    // If toggle_name is FALSE, the site_name will be empty, so we rebuild it.
    $vars['site_name'] = filter_xss_admin(variable_get('site_name', 'Drupal'));
  }
  if ($vars['hide_site_slogan']) {
    // If toggle_site_slogan is FALSE, the site_slogan will be empty, so we rebuild it.
    $vars['site_slogan'] = filter_xss_admin(variable_get('site_slogan', ''));
  }
  // Since the title and the shortcut link are both block level elements,
  // positioning them next to each other is much simpler with a wrapper div.
  if (!empty($vars['title_suffix']['add_or_remove_shortcut']) && $vars['title']) {
    // Add a wrapper div using the title_prefix and title_suffix render elements.
    $vars['title_prefix']['shortcut_wrapper'] = array(
      '#markup' => '<div class="shortcut-wrapper clearfix">',
      '#weight' => 100,
    );
    $vars['title_suffix']['shortcut_wrapper'] = array(
      '#markup' => '</div>',
      '#weight' => -99,
    );
    // Make sure the shortcut link is the first item in title_suffix.
    $vars['title_suffix']['add_or_remove_shortcut']['#weight'] = -100;
  }

}

/**
 * Implements hook_preprocess_page().
 */
function md_orenmode_preprocess_page(&$vars, $hook) {
    // Page title in node page

    $vars['logo_path']="";
    if(theme_get_setting('default_logo', 'md_orenmode')) {
        $vars['logo_path'] = '';
    }else{
        if(theme_get_setting('logo_normal_upload','md_orenmode')) {
            $file_upload = json_decode(theme_get_setting('logo_normal_upload','md_orenmode'));
            if($file_upload->fid != 0) {
                $vars['logo_path'] = $file_upload->url;
            } else {
                $vars['logo_path'] = '';
            }
        }
    }


    if(isset($vars['node'])) {
        $node = $vars['node'];
        $vars['page_title'] = $vars['node']->type;
        // Check and create previous and next link of current node
        $nid = $node->nid;
        $node_type = $node->type;
        $query = db_select('node', 'n');
        $query->fields('n', array('nid'))
            ->condition('type', $node_type)
            ->orderBy('nid');
        $result = $query->execute();
        $nids = array();
        while ($record = $result->fetchAssoc()) {
            $nids[] .= $record['nid'];
        }
        $current_node_key =  array_search($nid, $nids);
        if(($current_node_key-1) > 0) {
            $vars['previous_link'] = url('node/'.$nids[$current_node_key-1],array('absolute'=>true));
        }
        if(($current_node_key + 1) != sizeof($nids)) {
            $vars['next_link'] = url('node/'.$nids[$current_node_key+1],array('absolute'=>true));
        }
    }
    

    $themepath = drupal_get_path('theme', 'md_orenmode');
    md_orenmode_show_flickr();
}
/**
 * Implements hook_preprocess_maintenance_page().
 */
function md_orenmode_preprocess_maintenance_page(&$vars) {
    $theme_path = drupal_get_path('theme','md_orenmode');
    if(module_exists('fontello')) {
        drupal_add_css(drupal_get_path('module','fontello').'/css/fontello.fix.css');
        drupal_add_css('public://icon/fontello/fontello/css/fontello.css');
        drupal_add_css('public://icon/fontello/fontello/css/animation.css');
    }
   
    /********************************** Skin ********************************/
    if (theme_get_setting('skins') != '0') {
        drupal_add_css($theme_path . '/css/colors/'.theme_get_setting('skins').'.css', array('group' => CSS_THEME));
    }
    if (!$vars['db_is_active']) {
        unset($vars['site_name']);
    }
    // Always print the site name and slogan, but if they are toggled off, we'll
    // just hide them visually.
    $vars['hide_site_name']   = theme_get_setting('toggle_name') ? FALSE : TRUE;
    $vars['hide_site_slogan'] = theme_get_setting('toggle_slogan') ? FALSE : TRUE;
    if ($vars['hide_site_name']) {
        // If toggle_name is FALSE, the site_name will be empty, so we rebuild it.
        $vars['site_name'] = filter_xss_admin(variable_get('site_name', 'Drupal'));
    }
    if ($vars['hide_site_slogan']) {
        // If toggle_site_slogan is FALSE, the site_slogan will be empty, so we rebuild it.
        $vars['site_slogan'] = filter_xss_admin(variable_get('site_slogan', ''));
    }
}

function md_orenmode_check_und($param) {
	if (isset($param['und'])) {
		return $param['und'][0];
	} else {
		return $param[0];
	}
}
function theme_path() {
    $theme_path = drupal_get_path('theme','md_orenmode');

    return $theme_path;
}
function md_orenmode_show_flickr() { 

    $uid    = theme_get_setting('flickr_uid','md_orenmode');
    $images = theme_get_setting('flickr_images','md_orenmode');   
    
    $output = "$('#flickr').jflickrfeed({
                limit: ".$images.",
                qstrings: {
                    id: '".$uid."'
                },
                    itemTemplate: '<a class=\"trigger-fancybox\" href=\"{{image_b}}\"><img src=\"{{image_s}}\" alt=\"{{title}}\" /></a>'
                });";
    
    variable_set("FlickrScript", $output);

}
function md_orenmode_hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = 'rgba('.$r.','.$g.','.$b;
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}