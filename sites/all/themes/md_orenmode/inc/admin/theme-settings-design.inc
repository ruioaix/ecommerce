<?php

/**
 * @file
 * Theme settings .
 */

function md_orenmode_theme_settings_design(&$form, &$form_state) {
    global $base_url;
	$form['md_orenmode_settings']['design'] = array(
		'#type' 					=> 'fieldset',
		'#weight' 				=> -4,
		'#prefix'  				=> '<div id="md-design" class="md-tabcontent clearfix">',
		'#suffix'        => '</div><!-- / #md-design -->',
	);
	
	$form['md_orenmode_settings']['design']['design_htmllist'] = array(
		'#markup' 				=> '<div id="md-content-sidebar" class="md-content-sidebar">
                                        <ul class="clearfix">
                                            <li><a href="#ds-skin"><i class="fa fa-magic"></i>Skins</a></li>
                                            <li><a href="#ds-layout"><i class="fa fa-building"></i>Layout</a></li>
                                            <li><a href="#ds-sidebar"><i class="fa fa-th-list"></i>Sidebar</a></li>
                                            <li><a href="#ds-banner"><i class="fa fa-align-justify"></i>Banner</a></li>
                                            <li><a href="#ds-footer"><i class="fa fa-question"></i>Footer</a></li>
                                        </ul>
                                    </div><!-- /.md-content-sidebar -->
			                        <div class="md-content-main">',
		'#weight' 				=> -15,
	);
	$form['md_orenmode_settings']['design']['design_htmllistclose'] = array(
		'#markup' 				=> '</div><!-- /.md-listleft -->',
		'#weight' 				=> 15,
	);
    $form['md_orenmode_settings']['design']['design_skin'] = array(
        '#type' 					=> 'fieldset',
        '#weight' 				=> 1,
        '#prefix'  				=> '<div id="ds-skin">
                                        <div class="md-tabcontent-row">',
        '#suffix'               => '    </div>
                                    </div><!-- / #ds-general -->',
    );
/* ================================================================================
================================= Skins ===========================================
==================================================================================*/
    $form['md_orenmode_settings']['design']['design_skin'] = array(
        '#type'             => 'fieldset',
        '#weight'           => -8,
        '#prefix'           => '<div id="ds-skin" class="md-tabcontent clearfix">',
        '#suffix'           => '</div><!-- / #ds-skin -->',
    );

    $form['md_orenmode_settings']['design']['design_skin']['skin_color'] = array(
        '#type'             => 'textfield',
        '#title'            => t('Skin Color'),
        '#default_value' => theme_get_setting('skin_color','md_orenmode') ? theme_get_setting('skin_color','md_orenmode') : '#d5375f',
        '#attributes'       => array(
            'class' => array(
                'form-colorpicker',
            ),
        ),
        '#field_prefix'     => '<div class="form-group label-inline">',
        '#field_suffix'     => '</div>'
    );
/* ================================================================================
================================= Layout ===========================================
==================================================================================*/
    $form['md_orenmode_settings']['design']['design_layout'] = array(
        '#type'             => 'fieldset',
        '#weight'           => -8,
        '#prefix'           => '<div id="ds-layout" class="md-tabcontent clearfix">',
        '#suffix'           => '</div><!-- / #ds-layout -->',
    );

    $form['md_orenmode_settings']['design']['design_layout']['layout_type'] = array(
        '#type'          => 'select',
        '#default_value' => theme_get_setting('layout_type','md_orenmode') ? theme_get_setting('layout_type','md_orenmode') : '_1',
        '#options'       => array(
            '_1'         => t('Layout 1'),
            '_2'         => t('Layout 2'),
            '_3'         => t('Layout 3'),
        ),
        '#attributes'           => array(
            'class'             => array('select')
        ),
        '#prefix'                     => '<h3 class="md-tabcontent-title">Layout Types</h3><div class="form-group">',
        '#suffix'                     => '</div>',
        '#field_prefix'               => '<div class="md-selection medium">',
        '#field_suffix'               => '</div>'
    );
    $form['md_orenmode_settings']['design']['design_layout']['layout_enable'] = array(
        '#type'                 => 'checkbox',
        '#field_suffix'         => '<label class="label-checkbox" for="edit-layout-enable">Enable Boxed Layout</label>',
        '#attributes'           => array(
            'class' => array('input-checkbox')
        ),
        '#prefix'               =>  '<div class="form-elements">',
        '#suffix'               => '</div>',
        '#default_value'        => theme_get_setting('layout_enable','md_orenmode'),
        '#states'   => array(
            // Hide the logo settings when using the default logo.
            'visible' => array(
                ':input[name="layout_type"]' => array(
                    array('value' => '_1'),
                    array('value' => '_3'),
                ),
            ),
        ),

    );

    $form['md_orenmode_settings']['design']['design_layout']['layout_image'] = array(
        '#type'     => 'fieldset',
        '#title'    => '<h4 class="md-row-title">Body Background Image</h4>',
        '#prefix'   => '<div id="layout-image-wrapper">',
        '#suffix'   => '</div>',
        '#states'   => array(
            // Hide the logo settings when using the default logo.
            'visible' => array(
                ':input[name="layout_enable"]' => array('checked' => TRUE),
                ':input[name="layout_type"]' => array(
                    array('value' => '_1'),
                    array('value' => '_3'),
                ),
            ),
        ),
    );
    if(module_exists('media')) {
        $static = theme_get_setting('layout_image_upload','md_orenmode');
        $form['md_orenmode_settings']['design']['design_layout']['layout_image']['layout_image_media_wrapper'] = array(
            '#type' => 'container',
            '#attributes'   => array(
                'class'     => array('md-media-wrapper')
            )
        );
        $static_image_file = new stdClass();
        $static_image_file->url = '';
        $static_image_file->fid = '';

        $static_image_file_hidden_value = theme_get_setting('layout_image_upload','md_orenmode');
        if(is_array($static_image_file_hidden_value)) {
            if($static_image_file_hidden_value['fid'] != 0) {
                $file = file_load($static_image_file_hidden_value['fid']);
                if($file) {
                    $static_image_file->url = $file->url;
                    $static_image_file->fid = $file->fid;
                }
            }
        } else {
            if(!empty($static_image_file_hidden_value)) {
                $static_image_file = json_decode($static_image_file_hidden_value);
            }

        }

        $form['md_orenmode_settings']['design']['design_layout']['layout_image']['layout_image_media_wrapper']['layout_image_upload_media'] = array(
            '#markup'       => '
                <div class="form-wrapper  mb-20">
                    <h4 class="md-row-title">'.t('Upload Background Image').'</h4>
                        <div class="form-elements">
                            <div class="preview">
                                <img class="img-preview" src="'.(!empty($static_image_file->url) ? $static_image_file->url : $base_url.'/'.THEME_PATH.'/img/theme-settings/no_image.png').'" alt="">
                            </div>
                        </div>
                        <a href="#" class="media-select-button button element-hidden md-button">'.t('Select').'</a>
                </div>'
        );
        $form['md_orenmode_settings']['design']['design_layout']['layout_image']['layout_image_media_wrapper']['layout_image_upload'] = array(
            '#type'         => 'hidden',
            '#default_value' => theme_get_setting('layout_image_upload','md_orenmode'),
            '#attributes'       =>  array(
                'class'         => array('media-hidden-value')
            )
        );
    }

/* ==================================================================================
================================= Sidebar ===========================================
====================================================================================*/
    $form['md_orenmode_settings']['design']['design_sidebar'] = array(
        '#type'             => 'fieldset',
        '#weight' 				=> -5,
        '#prefix'  				=> '<div id="ds-sidebar">',
        '#suffix'        => '</div><!-- / #ds-block -->',
    );
    $form['md_orenmode_settings']['design']['design_sidebar']['sidebar_position'] = array(
        '#type'          => 'select',
        '#default_value' => theme_get_setting('sidebar_position','md_orenmode') ? theme_get_setting('sidebar_position','md_orenmode') : 'right',
        '#options'       => array(
            'no'        => t('No sidebar'),
            'left'      => t('Left'),
            'right' 	=> t('Right'),
        ),
        '#attributes'           => array(
            'class'             => array('select')
        ),
        '#prefix'                     => '<h3 class="md-tabcontent-title">Sidebar position</h3><div class="form-group">',
        '#suffix'                     => '</div>',
        '#field_prefix'               => '<div class="md-selection medium">',
        '#field_suffix'               => '</div>'
    );

    /*   Banner
    --------------------------------------------------------------------------*/
    $form['md_orenmode_settings']['design']['design_banner'] = array(
        '#type'                     => 'fieldset',
        '#weight'                   => -7,
        '#prefix'                   => '<div id="ds-banner"><h3 class="md-tabcontent-title">Banner</h3>',
        '#suffix'                   => '</div><!-- / #ds-block -->',
    );
    $form['md_orenmode_settings']['design']['design_banner']['banner_htmllist'] = array(
        '#markup'                   => '<div id="md-subtabs" class="md-tabs md-subtabs">
                                      <ul class="clearfix">
                                        <li> <a href="#banner-1-form">Banner 1</a> </li>
                                        <li> <a href="#banner-2-form">Banner 2</a> </li>
                                        <li> <a href="#banner-3-form">Banner 3</a> </li>
                                      </ul>',
        '#weight'                   => -15,
    );

    $form['md_orenmode_settings']['design']['design_banner']['banner_htmllistclose'] = array(
        '#markup'                   => '</div><!-- /#sub-tab -->',
        '#weight'                   => 15,
    );

    $form['md_orenmode_settings']['design']['design_banner']['banner_1'] = array(
        '#type'                 => 'fieldset',
        '#description'          => t(''),
        '#prefix'               => '<div id="banner-1-form" class="md-subtabcontent clearfix">',
        '#suffix'               => '</div><!-- / #banner-1 -->',
    );

    /* ================================================================================
================================= Header 1 ==========================================
==================================================================================*/
    $form['md_orenmode_settings']['design']['design_banner']['banner_1']['design_header_1'] = array(
        '#type'                 => 'fieldset',
        '#weight'               => -6,
        '#prefix'               => '<div id="ds-header" class="md-tabcontent clearfix">',
        '#suffix'               => '</div><!-- / #ds-block -->',
    );

    $form['md_orenmode_settings']['design']['design_banner']['banner_1']['design_header_1']['header_1_background'] = array(
        '#type'                 => 'fieldset',
        '#prefix'               => '<div id="header-background">',
        '#suffix'               => '</div>',
    );


    $form['md_orenmode_settings']['design']['design_banner']['banner_1']['design_header_1']['header_1_background']['header_1_image'] = array(
        '#type'                         => 'fieldset',
        '#title'                        => '<h4 class="md-row-title">Custom Slide Image Background</h4>',
        '#prefix'                       => '<div id="header-image-wrapper">',
        "#suffix"                       => '</div>',
    );
    $form['md_orenmode_settings']['design']['design_banner']['banner_1']['design_header_1']['header_1_background']['header_1_image']['hd_1_image_slide_wrapper'] = array(
        '#type'                     => 'fieldset',
        '#prefix'                   => '<div id="hd-1-image-slide-wrapper" class="hd-1-image-slide-wrapper"><h5 class="md-row-title">Header Image Slide</h5>',
        '#suffix'                   => '</div>'
    );
    $max_num = theme_get_setting('hd_1_image_slide_max_num','md_orenmode') ? theme_get_setting('hd_1_image_slide_max_num','md_orenmode') : 1;
    $form['md_orenmode_settings']['design']['design_banner']['banner_1']['design_header_1']['header_1_background']['header_1_image']['hd_1_image_slide_content_wrapper']['hd_1_popup_add_wrapper'] = array(
        '#markup'                   => '<a class="add-more md-button" data-preview="hd_1_image_slide_preview" data-max-num="'.$max_num.'" href="#hd-1-image-slide-sortable-no'.$max_num.'">Add More</a>',
    );
    $form['md_orenmode_settings']['design']['design_banner']['banner_1']['design_header_1']['header_1_background']['header_1_image']['hd_1_image_slide_content_wrapper']['hd_1_popup_close_wrapper'] = array(
        '#markup'                   => '</div>'
    );
    $form['md_orenmode_settings']['design']['design_banner']['banner_1']['design_header_1']['header_1_background']['header_1_image']['hd_1_image_slide_content_wrapper']['hd_1_image_slide_preview'] = array(
        '#type'                     => 'fieldset',
        '#prefix'                   => '<div id="hd_1_image_slide_preview" class="data-container"><div class="popup-wrapper"></div>',
        '#sufix'                    => '</div>'
    );
    $form['md_orenmode_settings']['design']['design_banner']['banner_1']['design_header_1']['header_1_background']['header_1_image']['hd_1_image_slide_content_wrapper']['hd_1_image_slide_order'] = array(
        '#type'                     => 'hidden',
        '#attributes'               => array(
            'class'                 => 'hidden-order'
        ),
    );
    $form['md_orenmode_settings']['design']['design_banner']['banner_1']['design_header_1']['header_1_background']['header_1_image']['hd_1_image_slide_content_wrapper']['hd_1_image_slide_max_num'] = array(
        '#type'                     => 'hidden',
        '#attributes'               => array(
            'class'                 => 'hidden-num'
        ),
        '#default_value'            => isset($max_num) ? $max_num : 1,
    );
    $form['md_orenmode_settings']['design']['design_banner']['banner_1']['design_header_1']['header_1_background']['header_1_image']['hd_1_image_slide_content_wrapper']['hd_1_image_slide_preview']["hd_1_image_slide_preview_openhtml"] = array(
        '#markup'                   => '<ul id="hd_1_image_slide_sortable" class="sortable">'
    );
    if(theme_get_setting('hd_1_image_slide','md_orenmode') == null) {
        $hd_1_image_slide = array(
            'hd_1_image_slide_sortable_no1' => array(
                'image' => '',
                'align' => '',
                'title'     => '',
                'subtitle'  => '',
                'link_label'  => '',
                'link'  => ''
            )
        );
    } else {
        $hd_1_image_slide = theme_get_setting('hd_1_image_slide','md_orenmode');
    }
    foreach($hd_1_image_slide as $key => $value) {
        $explode = explode("_",$key);
        end($explode);
        $num = current($explode);
        if($hd_1_image_slide[$key]['image'] != null && $hd_1_image_slide[$key]['image'] != 0) {
            // Load file from fid
            $file = file_load($hd_1_image_slide[$key]['image']);
            if(!empty($file->uri)) {
                $img_preview = image_style_url('theme_settings_small',$file->uri);
            }
        } else {
            $img_preview = $base_url.'/'.theme_path().'/img/theme-settings/no_image.png';
        }
        $form['md_orenmode_settings']['design']['design_banner']['banner_1']['design_header_1']['header_1_background']['header_1_image']['hd_1_image_slide_content_wrapper']['hd_1_image_slide_preview'][$key.'_openhtml'] = array(
            '#markup'               => '<li id="hd-1-image-slide-sortable-'.$num.'" class="draggable-item sortable-item toggle-item" data-num="'.substr($num,2).'" data-id="hd-1-image-slide-sortable-no'.substr($num,2).'"><a href="#" class="md-remove">X</a>'
        );
        $form['md_orenmode_settings']['design']['design_banner']['banner_1']['design_header_1']['header_1_background']['header_1_image']['hd_1_image_slide_content_wrapper']['hd_1_image_slide_preview'][$key]['hd_1_image_slide_preview_no1'] = array(
            '#markup'               => '<div class="media-preview"><img class="media-preview" src="'.$img_preview.'"></div><a href="#" class="select-media md-button">Choose Image</a><input type="hidden" class="data-image-hidden" value="'.$hd_1_image_slide[$key]['image'].'" name="hd_1_image_slide_upload_'.$num.'"/>'
        );
        $form['md_orenmode_settings']['design']['design_banner']['banner_1']['design_header_1']['header_1_background']['header_1_image']['hd_1_image_slide_content_wrapper']['hd_1_image_slide_preview'][$key]['hd_1_image_slide_align_preview_'.$num] = array(
                '#type'             => 'select',
                '#title'            => 'Image Position',
                '#default_value'    => $hd_1_image_slide[$key]['align'],
                '#options'          => array(
                    'left'          => t('Left'),
                    'right'         => t('Right'),
                ),
                '#attributes'           => array(
                    'class'             => array('select')
                ),
        );
        $form['md_orenmode_settings']['design']['design_banner']['banner_1']['design_header_1']['header_1_background']['header_1_image']['hd_1_image_slide_content_wrapper']['hd_1_image_slide_preview'][$key]['hd_1_image_slide_title_preview_'.$num] = array(
            '#type' => 'textfield',
            '#title'    => 'First Content',
            '#attributes' => array(
                'class' => array('input-border'),
            ),
            '#default_value' => $hd_1_image_slide[$key]['title'],
            '#maxlength' => 1000,
            '#prefix'               => '<div class="form-group">',
            '#suffix'               => '</div>',
        );

        $form['md_orenmode_settings']['design']['design_banner']['banner_1']['design_header_1']['header_1_background']['header_1_image']['hd_1_image_slide_content_wrapper']['hd_1_image_slide_preview'][$key]['hd_1_image_slide_subtitle_preview_'.$num] = array(
            '#type'       => 'textarea',
            '#format'     => 'full_html',
            '#title'      => 'Second Content',
            '#attributes' => array(
                'class' => array('input-border'),
            ),
            '#default_value' => $hd_1_image_slide[$key]['subtitle'],
            '#prefix'               => '<div class="form-group">',
            '#suffix'               => '</div>'
        );
        $form['md_orenmode_settings']['design']['design_banner']['banner_1']['design_header_1']['header_1_background']['header_1_image']['hd_1_image_slide_content_wrapper']['hd_1_image_slide_preview'][$key]['hd_1_image_slide_link_label_preview_'.$num] = array(
            '#type'       => 'textfield',
            '#title'      => 'Link Label',
            '#attributes' => array(
                'class' => array('input-border'),
            ),
            '#default_value' => $hd_1_image_slide[$key]['link_label'],
            '#prefix'               => '<div class="form-group">',
            '#suffix'               => '</div>'
        );
        $form['md_orenmode_settings']['design']['design_banner']['banner_1']['design_header_1']['header_1_background']['header_1_image']['hd_1_image_slide_content_wrapper']['hd_1_image_slide_preview'][$key]['hd_1_image_slide_link_preview_'.$num] = array(
            '#type'       => 'textfield',
            '#title'      => 'Link',
            '#attributes' => array(
                'class' => array('input-border'),
            ),
            '#default_value' => $hd_1_image_slide[$key]['link'],
            '#prefix'               => '<div class="form-group">',
            '#suffix'               => '</div>'
        );
        $form['md_orenmode_settings']['design']['design_banner']['banner_1']['design_header_1']['header_1_background']['header_1_image']['hd_1_image_slide_content_wrapper']['hd_1_image_slide_preview'][$key.'_closehtml'] = array(
            '#markup'               => '</li>'
        );
    }

    $form['md_orenmode_settings']['design']['design_banner']['banner_1']['design_header_1']['header_1_background']['header_1_image']['hd_1_image_slide_content_wrapper']['hd_1_image_slide_preview']["hd_1_image_slide_preview_closehtml"] = array(
        '#markup'                   => '</ul>'
    );



    $form['md_orenmode_settings']['design']['design_banner']['banner_2'] = array(
        '#type'                 => 'fieldset',
        '#description'          => t(''),
        '#prefix'               => '<div id="banner-2-form" class="md-subtabcontent clearfix">',
        '#suffix'               => '</div><!-- / #banner-2 -->',
    );

    /* ================================================================================
================================= Header 2 ==========================================
==================================================================================*/
    $form['md_orenmode_settings']['design']['design_banner']['banner_2']['design_header_2'] = array(
        '#type'                 => 'fieldset',
        '#weight'               => -6,
        '#prefix'               => '<div id="ds-header" class="md-tabcontent clearfix">',
        '#suffix'               => '</div><!-- / #ds-block -->',
    );

    $form['md_orenmode_settings']['design']['design_banner']['banner_2']['design_header_2']['header_2_background'] = array(
        '#type'                 => 'fieldset',
        '#prefix'               => '<div id="header-background">',
        '#suffix'               => '</div>',
    );


    $form['md_orenmode_settings']['design']['design_banner']['banner_2']['design_header_2']['header_2_background']['header_2_image'] = array(
        '#type'                         => 'fieldset',
        '#title'                        => '<h4 class="md-row-title">Custom Slide Image Background</h4>',
        '#prefix'                       => '<div id="header-image-wrapper">',
        "#suffix"                       => '</div>',
    );
    $form['md_orenmode_settings']['design']['design_banner']['banner_2']['design_header_2']['header_2_background']['header_2_image']['hd_2_image_slide_wrapper'] = array(
        '#type'                     => 'fieldset',
        '#prefix'                   => '<div id="hd-2-image-slide-wrapper" class="hd-2-image-slide-wrapper"><h5 class="md-row-title">Header Image Slide</h5>',
        '#suffix'                   => '</div>'
    );
    $max_num = theme_get_setting('hd_2_image_slide_max_num','md_orenmode') ? theme_get_setting('hd_2_image_slide_max_num','md_orenmode') : 1;
    $form['md_orenmode_settings']['design']['design_banner']['banner_2']['design_header_2']['header_2_background']['header_2_image']['hd_2_image_slide_content_wrapper']['hd_2_popup_add_wrapper'] = array(
        '#markup'                   => '<a class="add-more md-button" data-preview="hd_2_image_slide_preview" data-max-num="'.$max_num.'" href="#hd-2-image-slide-sortable-no'.$max_num.'">Add More</a>',
    );
    $form['md_orenmode_settings']['design']['design_banner']['banner_2']['design_header_2']['header_2_background']['header_2_image']['hd_2_image_slide_content_wrapper']['hd_2_popup_close_wrapper'] = array(
        '#markup'                   => '</div>'
    );
    $form['md_orenmode_settings']['design']['design_banner']['banner_2']['design_header_2']['header_2_background']['header_2_image']['hd_2_image_slide_content_wrapper']['hd_2_image_slide_preview'] = array(
        '#type'                     => 'fieldset',
        '#prefix'                   => '<div id="hd_2_image_slide_preview" class="data-container"><div class="popup-wrapper"></div>',
        '#sufix'                    => '</div>'
    );
    $form['md_orenmode_settings']['design']['design_banner']['banner_2']['design_header_2']['header_2_background']['header_2_image']['hd_2_image_slide_content_wrapper']['hd_2_image_slide_order'] = array(
        '#type'                     => 'hidden',
        '#attributes'               => array(
            'class'                 => 'hidden-order'
        ),
    );
    $form['md_orenmode_settings']['design']['design_banner']['banner_2']['design_header_2']['header_2_background']['header_2_image']['hd_2_image_slide_content_wrapper']['hd_2_image_slide_max_num'] = array(
        '#type'                     => 'hidden',
        '#attributes'               => array(
            'class'                 => 'hidden-num'
        ),
        '#default_value'            => isset($max_num) ? $max_num : 1,
    );
    $form['md_orenmode_settings']['design']['design_banner']['banner_2']['design_header_2']['header_2_background']['header_2_image']['hd_2_image_slide_content_wrapper']['hd_2_image_slide_preview']["hd_2_image_slide_preview_openhtml"] = array(
        '#markup'                   => '<ul id="hd_1_image_slide_sortable" class="sortable">'
    );
    if(theme_get_setting('hd_2_image_slide','md_orenmode') == null) {
        $hd_2_image_slide = array(
            'hd_2_image_slide_sortable_no1' => array(
                'image' => '',
                'align' => '',
                'title'     => '',
                'subtitle'  => '',
                'link_label'  => '',
                'link'  => '',
                'link_label_2'  => '',
                'link_2'  => ''
            )
        );
    } else {
        $hd_2_image_slide = theme_get_setting('hd_2_image_slide','md_orenmode');
    }
    foreach($hd_2_image_slide as $key => $value) {
        $explode = explode("_",$key);
        end($explode);
        $num = current($explode);
        if($hd_2_image_slide[$key]['image'] != null && $hd_2_image_slide[$key]['image'] != 0) {
            // Load file from fid
            $file = file_load($hd_2_image_slide[$key]['image']);
            if(!empty($file->uri)) {
                $img_preview = image_style_url('theme_settings_small',$file->uri);
            }
        } else {
            $img_preview = $base_url.'/'.theme_path().'/img/theme-settings/no_image.png';
        }
        $form['md_orenmode_settings']['design']['design_banner']['banner_2']['design_header_2']['header_2_background']['header_2_image']['hd_2_image_slide_content_wrapper']['hd_2_image_slide_preview'][$key.'_openhtml'] = array(
            '#markup'               => '<li id="hd-2-image-slide-sortable-'.$num.'" class="draggable-item sortable-item toggle-item" data-num="'.substr($num,2).'" data-id="hd-2-image-slide-sortable-no'.substr($num,2).'"><a href="#" class="md-remove">X</a>'
        );
        $form['md_orenmode_settings']['design']['design_banner']['banner_2']['design_header_2']['header_2_background']['header_2_image']['hd_2_image_slide_content_wrapper']['hd_2_image_slide_preview'][$key]['hd_2_image_slide_preview_no1'] = array(
            '#markup'               => '<div class="media-preview"><img class="media-preview" src="'.$img_preview.'"></div><a href="#" class="select-media md-button">Choose Image</a><input type="hidden" class="data-image-hidden" value="'.$hd_2_image_slide[$key]['image'].'" name="hd_2_image_slide_upload_'.$num.'"/>'
        );
        $form['md_orenmode_settings']['design']['design_banner']['banner_2']['design_header_2']['header_2_background']['header_2_image']['hd_2_image_slide_content_wrapper']['hd_2_image_slide_preview'][$key]['hd_2_image_slide_align_preview_'.$num] = array(
                '#type'             => 'select',
                '#title'            => 'Text Position',
                '#default_value'    => $hd_2_image_slide[$key]['align'],
                '#options'          => array(
                    'style-1'       => t('Center'),
                    'style-left'    => t('Left'),
                    'style-right'   => t('Right'),
                ),
                '#attributes'           => array(
                    'class'             => array('select')
                ),
        );
        $form['md_orenmode_settings']['design']['design_banner']['banner_2']['design_header_2']['header_2_background']['header_2_image']['hd_2_image_slide_content_wrapper']['hd_2_image_slide_preview'][$key]['hd_2_image_slide_title_preview_'.$num] = array(
            '#type' => 'textfield',
            '#title'    => 'First Content',
            '#attributes' => array(
                'class' => array('input-border'),
            ),
            '#default_value' => $hd_2_image_slide[$key]['title'],
            '#maxlength' => 1000,
            '#prefix'               => '<div class="form-group">',
            '#suffix'               => '</div>',
        );

        $form['md_orenmode_settings']['design']['design_banner']['banner_2']['design_header_2']['header_2_background']['header_2_image']['hd_2_image_slide_content_wrapper']['hd_2_image_slide_preview'][$key]['hd_2_image_slide_subtitle_preview_'.$num] = array(
            '#type'       => 'textarea',
            '#format'     => 'full_html',
            '#title'      => 'Second Content',
            '#attributes' => array(
                'class' => array('input-border'),
            ),
            '#default_value' => $hd_2_image_slide[$key]['subtitle'],
            '#prefix'               => '<div class="form-group">',
            '#suffix'               => '</div>'
        );
        $form['md_orenmode_settings']['design']['design_banner']['banner_2']['design_header_2']['header_2_background']['header_2_image']['hd_2_image_slide_content_wrapper']['hd_2_image_slide_preview'][$key]['hd_2_image_slide_link_label_preview_'.$num] = array(
            '#type'       => 'textfield',
            '#title'      => 'Link Label',
            '#attributes' => array(
                'class' => array('input-border'),
            ),
            '#default_value' => $hd_2_image_slide[$key]['link_label'],
            '#prefix'               => '<div class="form-group">',
            '#suffix'               => '</div>'
        );
        $form['md_orenmode_settings']['design']['design_banner']['banner_2']['design_header_2']['header_2_background']['header_2_image']['hd_2_image_slide_content_wrapper']['hd_2_image_slide_preview'][$key]['hd_2_image_slide_link_preview_'.$num] = array(
            '#type'       => 'textfield',
            '#title'      => 'Link',
            '#attributes' => array(
                'class' => array('input-border'),
            ),
            '#default_value' => $hd_2_image_slide[$key]['link'],
            '#prefix'               => '<div class="form-group">',
            '#suffix'               => '</div>'
        );
        $form['md_orenmode_settings']['design']['design_banner']['banner_2']['design_header_2']['header_2_background']['header_2_image']['hd_2_image_slide_content_wrapper']['hd_2_image_slide_preview'][$key]['hd_2_image_slide_link_label_2_preview_'.$num] = array(
            '#type'       => 'textfield',
            '#title'      => 'Link Label 2',
            '#attributes' => array(
                'class' => array('input-border'),
            ),
            '#default_value' => $hd_2_image_slide[$key]['link_label_2'],
            '#prefix'               => '<div class="form-group">',
            '#suffix'               => '</div>'
        );
        $form['md_orenmode_settings']['design']['design_banner']['banner_2']['design_header_2']['header_2_background']['header_2_image']['hd_2_image_slide_content_wrapper']['hd_2_image_slide_preview'][$key]['hd_2_image_slide_link_2_preview_'.$num] = array(
            '#type'       => 'textfield',
            '#title'      => 'Link 2',
            '#attributes' => array(
                'class' => array('input-border'),
            ),
            '#default_value' => $hd_2_image_slide[$key]['link_2'],
            '#prefix'               => '<div class="form-group">',
            '#suffix'               => '</div>'
        );
        $form['md_orenmode_settings']['design']['design_banner']['banner_2']['design_header_2']['header_2_background']['header_2_image']['hd_2_image_slide_content_wrapper']['hd_2_image_slide_preview'][$key.'_closehtml'] = array(
            '#markup'               => '</li>'
        );
    }

    $form['md_orenmode_settings']['design']['design_banner']['banner_2']['design_header_2']['header_2_background']['header_2_image']['hd_2_image_slide_content_wrapper']['hd_2_image_slide_preview']["hd_2_image_slide_preview_closehtml"] = array(
        '#markup'                   => '</ul>'
    );

    $form['md_orenmode_settings']['design']['design_banner']['banner_3'] = array(
        '#type'                 => 'fieldset',
        '#description'          => t(''),
        '#prefix'               => '<div id="banner-3-form" class="md-subtabcontent clearfix">',
        '#suffix'               => '</div><!-- / #banner-3 -->',
    );

    /* ================================================================================
================================= Header 3 ==========================================
==================================================================================*/
    $form['md_orenmode_settings']['design']['design_banner']['banner_3']['design_header_3'] = array(
        '#type'                 => 'fieldset',
        '#weight'               => -6,
        '#prefix'               => '<div id="ds-header" class="md-tabcontent clearfix">',
        '#suffix'               => '</div><!-- / #ds-block -->',
    );

    $form['md_orenmode_settings']['design']['design_banner']['banner_3']['design_header_3']['header_3_background'] = array(
        '#type'                 => 'fieldset',
        '#prefix'               => '<div id="header-background">',
        '#suffix'               => '</div>',
    );


    $form['md_orenmode_settings']['design']['design_banner']['banner_3']['design_header_3']['header_3_background']['header_3_image'] = array(
        '#type'                         => 'fieldset',
        '#title'                        => '<h4 class="md-row-title">Custom Slide Image Background</h4>',
        '#prefix'                       => '<div id="header-image-wrapper">',
        "#suffix"                       => '</div>',
    );
    $form['md_orenmode_settings']['design']['design_banner']['banner_3']['design_header_3']['header_3_background']['header_3_image']['hd_3_image_slide_wrapper'] = array(
        '#type'                     => 'fieldset',
        '#prefix'                   => '<div id="hd-3-image-slide-wrapper" class="hd-3-image-slide-wrapper"><h5 class="md-row-title">Header Image Slide</h5>',
        '#suffix'                   => '</div>'
    );
    $max_num = theme_get_setting('hd_3_image_slide_max_num','md_orenmode') ? theme_get_setting('hd_3_image_slide_max_num','md_orenmode') : 1;
    $form['md_orenmode_settings']['design']['design_banner']['banner_3']['design_header_3']['header_3_background']['header_3_image']['hd_3_image_slide_content_wrapper']['hd_3_popup_add_wrapper'] = array(
        '#markup'                   => '<a class="add-more md-button" data-preview="hd_3_image_slide_preview" data-max-num="'.$max_num.'" href="#hd-3-image-slide-sortable-no'.$max_num.'">Add More</a>',
    );
    $form['md_orenmode_settings']['design']['design_banner']['banner_3']['design_header_3']['header_3_background']['header_3_image']['hd_3_image_slide_content_wrapper']['hd_3_popup_close_wrapper'] = array(
        '#markup'                   => '</div>'
    );
    $form['md_orenmode_settings']['design']['design_banner']['banner_3']['design_header_3']['header_3_background']['header_3_image']['hd_3_image_slide_content_wrapper']['hd_3_image_slide_preview'] = array(
        '#type'                     => 'fieldset',
        '#prefix'                   => '<div id="hd_3_image_slide_preview" class="data-container"><div class="popup-wrapper"></div>',
        '#sufix'                    => '</div>'
    );
    $form['md_orenmode_settings']['design']['design_banner']['banner_3']['design_header_3']['header_3_background']['header_3_image']['hd_3_image_slide_content_wrapper']['hd_3_image_slide_order'] = array(
        '#type'                     => 'hidden',
        '#attributes'               => array(
            'class'                 => 'hidden-order'
        ),
    );
    $form['md_orenmode_settings']['design']['design_banner']['banner_3']['design_header_3']['header_3_background']['header_3_image']['hd_3_image_slide_content_wrapper']['hd_3_image_slide_max_num'] = array(
        '#type'                     => 'hidden',
        '#attributes'               => array(
            'class'                 => 'hidden-num'
        ),
        '#default_value'            => isset($max_num) ? $max_num : 1,
    );
    $form['md_orenmode_settings']['design']['design_banner']['banner_3']['design_header_3']['header_3_background']['header_3_image']['hd_3_image_slide_content_wrapper']['hd_3_image_slide_preview']["hd_3_image_slide_preview_openhtml"] = array(
        '#markup'                   => '<ul id="hd_1_image_slide_sortable" class="sortable">'
    );
    if(theme_get_setting('hd_3_image_slide','md_orenmode') == null) {
        $hd_3_image_slide = array(
            'hd_3_image_slide_sortable_no1' => array(
                'image' => '',
                'link'  => ''
            )
        );
    } else {
        $hd_3_image_slide = theme_get_setting('hd_3_image_slide','md_orenmode');
    }
    foreach($hd_3_image_slide as $key => $value) {
        $explode = explode("_",$key);
        end($explode);
        $num = current($explode);
        if($hd_3_image_slide[$key]['image'] != null && $hd_3_image_slide[$key]['image'] != 0) {
            // Load file from fid
            $file = file_load($hd_3_image_slide[$key]['image']);
            if(!empty($file->uri)) {
                $img_preview = image_style_url('theme_settings_small',$file->uri);
            }
        } else {
            $img_preview = $base_url.'/'.theme_path().'/img/theme-settings/no_image.png';
        }
        $form['md_orenmode_settings']['design']['design_banner']['banner_3']['design_header_3']['header_3_background']['header_3_image']['hd_3_image_slide_content_wrapper']['hd_3_image_slide_preview'][$key.'_openhtml'] = array(
            '#markup'               => '<li id="hd-3-image-slide-sortable-'.$num.'" class="draggable-item sortable-item toggle-item" data-num="'.substr($num,2).'" data-id="hd-3-image-slide-sortable-no'.substr($num,2).'"><a href="#" class="md-remove">X</a>'
        );
        $form['md_orenmode_settings']['design']['design_banner']['banner_3']['design_header_3']['header_3_background']['header_3_image']['hd_3_image_slide_content_wrapper']['hd_3_image_slide_preview'][$key]['hd_3_image_slide_preview_no1'] = array(
            '#markup'               => '<div class="media-preview"><img class="media-preview" src="'.$img_preview.'"></div><a href="#" class="select-media md-button">Choose Image</a><input type="hidden" class="data-image-hidden" value="'.$hd_3_image_slide[$key]['image'].'" name="hd_3_image_slide_upload_'.$num.'"/>'
        );
        
        $form['md_orenmode_settings']['design']['design_banner']['banner_3']['design_header_3']['header_3_background']['header_3_image']['hd_3_image_slide_content_wrapper']['hd_3_image_slide_preview'][$key]['hd_3_image_slide_link_preview_'.$num] = array(
            '#type'       => 'textfield',
            '#title'      => 'Link',
            '#attributes' => array(
                'class' => array('input-border'),
            ),
            '#default_value' => $hd_3_image_slide[$key]['link'],
            '#prefix'               => '<div class="form-group">',
            '#suffix'               => '</div>'
        );
        $form['md_orenmode_settings']['design']['design_banner']['banner_3']['design_header_3']['header_3_background']['header_3_image']['hd_3_image_slide_content_wrapper']['hd_3_image_slide_preview'][$key.'_closehtml'] = array(
            '#markup'               => '</li>'
        );
    }

    $form['md_orenmode_settings']['design']['design_banner']['banner_3']['design_header_3']['header_3_background']['header_3_image']['hd_3_image_slide_content_wrapper']['hd_3_image_slide_preview']["hd_3_image_slide_preview_closehtml"] = array(
        '#markup'                   => '</ul>'
    );

    
   // 5. ---------------------------------- Footer --------------------------------------------
    $form['md_orenmode_settings']['design']['design_footer'] = array(
        '#type'                     => 'fieldset',
        '#weight' 				    => -8,
        '#prefix'  				    => '<div id="ds-footer">',
        '#suffix'                   => '</div><!-- / #ds-block -->',
    );
    $form['md_orenmode_settings']['design']['design_footer']['footer_social'] = array(
        '#type'                     => 'fieldset',
        '#prefix'                   => '<div id="footer-social"><h3 class="md-tabcontent-title">Custom Social Account</h3>',
        '#suffix'                   => '</div>',
    );
    $form['md_orenmode_settings']['design']['design_footer']['footer_social']['social_acc_wrapper'] = array(
        '#type'                     => 'fieldset',
        '#prefix'                   => '<div id="ft-social-acc-wrapper">',
        '#suffix'                   => '</div>',
        '#attributes'               => array(
            'class'                 => array('ft-social-acc-wrapper'),
        )
    );
    $max_num = theme_get_setting('ft_social_max_num','md_orenmode') ? theme_get_setting('ft_social_max_num','md_orenmode') : 1;
    $form['md_orenmode_settings']['design']['design_footer']['footer_social']['social_acc_wrapper']['ft_popup_add_wrapper'] = array(
        '#markup'                   => '<a class="add-more md-button" data-preview="ft_social_preview" data-max-num="'.$max_num.'" href="#ft-social-sortable-no'.$max_num.'">Add More</a>',
    );
    $form['md_orenmode_settings']['design']['design_footer']['footer_social']['social_acc_wrapper']['ft_popup_close_wrapper'] = array(
        '#markup'                   => '</div>'
    );
    $form['md_orenmode_settings']['design']['design_footer']['footer_social']['social_acc_wrapper']['ft_social_preview'] = array(
        '#type' => 'fieldset',
        '#prefix'   => '<div id="ft_social_preview" class="data-container"><div class="popup-wrapper"></div>',
        '#sufix'    => '</div>'
    );
    $form['md_orenmode_settings']['design']['design_footer']['footer_social']['social_acc_wrapper']['ft_social_preview']['ft_social_order'] = array(
        '#type' => 'hidden',
        '#attributes' => array(
            'class'    => 'hidden-order'
        ),
    );
    $form['md_orenmode_settings']['design']['design_footer']['footer_social']['social_acc_wrapper']['ft_social_preview']['ft_social_max_num'] = array(
        '#type' => 'hidden',
        '#attributes' => array(
            'class'    => 'hidden-num'
        ),
        '#default_value' => theme_get_setting('ft_social_max_num','md_orenmode') ? theme_get_setting('ft_social_max_num','md_orenmode') : 1,
    );
    $form['md_orenmode_settings']['design']['design_footer']['footer_social']['social_acc_wrapper']['ft_social_preview']["ft_social_preview_openhtml"] = array(
        '#markup'   => '<ul id="ft_social_sortable" class="sortable">'
    );
    if(theme_get_setting('ft_social','md_orenmode') == null) {
        $ft_social = array(
            'ft_social_sortable_no1' => array(
                'icon' => array(
                    'icon' => '',
                    'bundle' => ''
                ),
                'link'  => ''
            )
        );
    } else {
        $ft_social = theme_get_setting('ft_social','md_orenmode');
    }

    foreach($ft_social as $key => $value){
        $explode = explode("_",$key);
        end($explode);
        $num = current($explode);
        $social_icon = $ft_social[$key]['icon'];
        $form['md_orenmode_settings']['design']['design_footer']['footer_social']['social_acc_wrapper']['ft_social_preview'][$key.'_openhtml'] = array(
            '#markup' => '<li id="ft-social-sortable-'.$num.'" class="draggable-item sortable-item toggle-item" data-num="'.substr($num,2).'" data-id="ft-social-sortable-no'.substr($num,2).'"><a href="#" class="md-remove">X</a>'
        );
        $form['md_orenmode_settings']['design']['design_footer']['footer_social']['social_acc_wrapper']['ft_social_preview'][$key]['ft_social_icon_'.$num] = array(
            '#type' => 'icon_selector',
            '#title'    => 'Social Icon',
            '#default_bundle' => isset($social_icon['bundle']) ? $social_icon['bundle'] : '',
            '#default_icon' => isset($social_icon['icon']) ? $social_icon['icon'] : '',
            '#prefix'               => '<div class="form-group icon-picker">',
            '#suffix'               => '</div>',
        );

        $form['md_orenmode_settings']['design']['design_footer']['footer_social']['social_acc_wrapper']['ft_social_preview'][$key]['ft_social_link_'.$num] = array(
            '#type' => 'textfield',
            '#title'    => 'Social Link',
            '#attributes' => array(
                'class' => array('input-border'),
            ),
            '#default_value' => $ft_social[$key]['link'],
            '#maxlength' => 1000,
            '#prefix'               => '<div class="form-group">',
            '#suffix'               => '</div>'
        );
        $form['md_orenmode_settings']['design']['design_footer']['footer_social']['social_acc_wrapper']['ft_social_preview'][$key.'_closehtml'] = array(
            '#markup' => '</li>'
        );
    }
    $form['md_orenmode_settings']['design']['design_footer']['footer_social']['social_acc_wrapper']['ft_social_preview']["ft_social_preview_closehtml"] = array(
        '#markup'   => '</ul>'
    );

    $form['md_orenmode_settings']['design']['design_footer']['footer_content_wrapper'] = array(
        '#type' => 'fieldset',
        '#prefix'   => '<div id="ft-content-wrapper">',
        '#suffix'   => '</div>'
    );
    $form['md_orenmode_settings']['design']['design_footer']['footer_content_wrapper']['footer_text'] = array(
        '#type' => 'textarea',
        '#format' => 'full_html',
        '#title'    => '<h3 class="md-tabcontent-title">'.t('Footer Text Display').'</h3>',
        '#resizable'    => false,
        '#default_value'    => theme_get_setting('footer_text','md_orenmode') ? theme_get_setting('footer_text','md_orenmode') : 'Orenmode - Megadrupal Theme - ©2015 - All rights reserved.',
        '#attributes'       => array(
            'class'         => array('textarea-border big')
        )
    );

    $form['md_orenmode_settings']['design']['design_footer']['footer_content_wrapper']['footer_column'] = array(
        '#type'          => 'select',
        '#default_value' => theme_get_setting('footer_column','md_orenmode') ? theme_get_setting('footer_column','md_orenmode') : 'pattern1',
        '#options'       => array(
            '12'             => t('1 column'),
            '6'              => t('2 columns'),
            '4'              => t('3 columns'),
            '3'              => t('4 columns'),
        ),
        '#attributes'           => array(
            'class'             => array('select')
        ),
        '#prefix'                     => '<h3 class="md-tabcontent-title">Footer Columns</h3><div class="form-group">',
        '#suffix'                     => '</div>',
        '#field_prefix'               => '<div class="md-selection medium">',
        '#field_suffix'               => '</div>'
    );
}