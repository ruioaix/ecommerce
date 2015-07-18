<?php

/**
 * @file
 * Theme settings .
 */

function md_orenmode_theme_settings_display(&$form, &$form_state) {
    global $base_url;
	$form['md_orenmode_settings']['display'] = array(
		'#type' 			    => 'fieldset',
		'#weight' 				=> -1,
		'#prefix'  				=> '<div id="md-display" class="md-tabcontent clearfix">',
		'#suffix'               => '</div><!-- / #md-display -->',
	);

	$form['md_orenmode_settings']['display']['display_htmllist'] = array(
		'#markup' 				=> '<div id="md-content-sidebar" class="md-content-sidebar">
                                        <ul class="clearfix">
                                            <li><a href="#s-404"><i class="fa fa-chain-broken"></i>404 Page</a></li>
                                            <li><a href="#s-flickr"><i class="fa fa-flickr"></i>Flickr</a></li>
                                        </ul>
                                    </div><!-- /.md-content-sidebar -->
			                        <div class="md-content-main">',
		'#weight' 				=> -15,
	);

	$form['md_orenmode_settings']['display']['display_htmllistclose'] = array(
		'#markup' 				=> '</div><!-- /.md-listleft -->',
		'#weight' 				=> 15,
	);

////////////////////////////////////////////////////// 404 Page //////////////////////////////////////////////////////
    $form['md_orenmode_settings']['display']['404'] = array(
        '#type'                 => 'fieldset',
        '#weight'               => 1,
        '#prefix'               => '<div id="s-404">',
        '#suffix'               => '</div><!-- / #404-page -->',
    );

    $form['md_orenmode_settings']['display']['404']['404_title'] = array(
        '#type'                 => 'textfield',
        '#format'               => 'full_html',
        '#prefix'               => '<div class="md-tabcontent-header">
                                            <h3 class="md-tabcontent-title">404 Title</h3>
                                        </div><!-- /.md-row-description -->
                                        <div class="form-group">',
        '#suffix'               => '</div>',
        '#default_value'        =>  theme_get_setting('404_title','md_orenmode') ? theme_get_setting('404_title','md_orenmode') : t('404 Error!'),
        '#attributes'           => array(
            'class'             => array('input-border normal')
        )
    );
    $form['md_orenmode_settings']['display']['404']['404_subtitle'] = array(
        '#type'                 => 'textfield',
        '#prefix'               => '<div class="md-tabcontent-header">
                                            <h3 class="md-tabcontent-title">404 Sub-Title</h3>
                                        </div><!-- /.md-row-description -->
                                        <div class="form-group">',
        '#suffix'               => '</div>',
        '#default_value'        =>  theme_get_setting('404_subtitle','md_orenmode') ? theme_get_setting('404_subtitle','md_orenmode') : t('The page you are looking for doesn\'t exist.'),
        '#attributes'           => array(
            'class'             => array('input-border normal')
        )
    );
    $form['md_orenmode_settings']['display']['404']['404_link'] = array(
        '#type'                 => 'textfield',
        '#prefix'               => '<div class="md-tabcontent-header">
                                            <h3 class="md-tabcontent-title">404 Link Label</h3>
                                        </div><!-- /.md-row-description -->
                                        <div class="form-group">',
        '#suffix'               => '</div>',
        '#default_value'        =>  theme_get_setting('404_link','md_orenmode') ? theme_get_setting('404_link','md_orenmode') : t('Go back!'),
        '#attributes'           => array(
            'class'             => array('input-border normal')
        )
    );

    $form['md_orenmode_settings']['display']['404']['404_static_image'] = array(
        '#type'     => 'fieldset',
        '#title'    => '<h4 class="md-row-title">Custom 404 Static Image Background</h4>',
        '#prefix'   => '<div id="404-static-image-wrapper">',
        '#suffix'   => '</div>',
    );
    if(module_exists('media')) {
        $static = theme_get_setting('404_static_image_upload','md_orenmode');
        $form['md_orenmode_settings']['display']['404']['404_static_image']['404_static_image_media_wrapper'] = array(
            '#type' => 'container',
            '#attributes'   => array(
                'class'     => array('md-media-wrapper')
            )
        );
        $error_static_image_file = new stdClass();
        $error_static_image_file->url = '';
        $error_static_image_file->fid = '';

        $error_static_image_file_hidden_value = theme_get_setting('404_static_image_upload','md_orenmode');
        if(is_array($error_static_image_file_hidden_value)) {
            if($error_static_image_file_hidden_value['fid'] != 0) {
                $file = file_load($error_static_image_file_hidden_value['fid']);
                if($file) {
                    $error_static_image_file->url = $file->url;
                    $error_static_image_file->fid = $file->fid;
                }
            }
        } else {
            if(!empty($error_static_image_file_hidden_value)) {
                $error_static_image_file = json_decode($error_static_image_file_hidden_value);
            }

        }

        $form['md_orenmode_settings']['display']['404']['404_static_image']['404_static_image_media_wrapper']['404_static_image_upload_media'] = array(
            '#markup'       => '
                <div class="form-wrapper  mb-20">
                    <h4 class="md-row-title">'.t('Upload 404 Static Image').'</h4>
                        <div class="form-elements">
                            <div class="preview">
                                <img class="img-preview" src="'.(!empty($error_static_image_file->url) ? $error_static_image_file->url : $base_url.'/'.THEME_PATH.'/img/theme-settings/no_image.png').'" alt="">
                            </div>
                        </div>
                        <a href="#" class="media-select-button button element-hidden md-button">'.t('Select').'</a>
                </div>'
        );
        $form['md_orenmode_settings']['display']['404']['404_static_image']['404_static_image_media_wrapper']['404_static_image_upload'] = array(
            '#type'         => 'hidden',
            '#default_value' => theme_get_setting('404_static_image_upload','md_orenmode'),
            '#attributes'       =>  array(
                'class'         => array('media-hidden-value')
            )
        );
    }

//////////////////////////////////////////// Flickr ///////////////////////////////////////////////////////
    $form['md_orenmode_settings']['display']['flickr'] = array(
        '#type'                 => 'fieldset',
        '#weight'               => 1,
        '#prefix'               => '<div id="s-flickr"><h3 class="md-tabcontent-title">Flickr</h3>',
        '#suffix'               => '</div><!-- / #footer -->',
    );
    $form['md_orenmode_settings']['display']['flickr']['flickr_uid'] = array(
        '#type' => 'textfield',
        '#title'    => 'User ID',
        '#attributes' => array(
            'class' => array('input-border'),
        ),
        '#default_value' => theme_get_setting('flickr_uid' , 'md_orenmode'),
        '#prefix'               => '<div class="form-group">',
        '#suffix'               => '</div>',
        '#description'          =>  t('Enter your user ID on Flickr'),
    );
    $form['md_orenmode_settings']['display']['flickr']['flickr_images'] = array(
        '#type' => 'textfield',
        '#title'    => 'Number of images',
        '#attributes' => array(
            'class' => array('input-border'),
        ),
        '#default_value' => theme_get_setting('flickr_images' , 'md_orenmode'),
        '#prefix'               => '<div class="form-group">',
        '#suffix'               => '</div>',
        '#description'          =>  t('Enter number of images to display'),
    );

}