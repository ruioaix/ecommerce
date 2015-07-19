<?php

include_once './' . drupal_get_path('theme', 'md_orenmode') . '/inc/front/template.process.inc';
/**
 * Global $base_url
 */
function base_url() {
    global $base_url;
    return $base_url;
}
/**
 * Implements theme_menu_tree().
 */
function md_orenmode_menu_tree__main_menu($variables) {
	return '<ul class="menu">' . $variables['tree'] . '</ul>';
}

/**
 * Implements theme_menu_tree().
 */
function md_orenmode_menu_tree__user_menu($variables) {
	return '<ul>' . $variables['tree'] . '</ul>';
}

/**
 * Implements theme_menu_link__[MENU NAME].
 */
function md_orenmode_menu_link__main_menu($variables) {

  $element = $variables['element'];
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  $sub_menu = drupal_render($element['#below']);
  
  if($element['#below']) {
	if($element['#attributes']['layout'][0] == "menu-list") {
		$sub_menu = str_replace('class="menu"','class="sub-menu"',$sub_menu);
		return '<li class="menu-parent">' . $output . $sub_menu . "</li>\n";
	}
	if($element['#attributes']['layout'][0] == "menu-col") {
		$sub_menu = str_replace('class="menu"','class="sub-menu"',$sub_menu);
		$sub_menu = str_replace('</a><ul class="sub-menu">','</a><ul>',$sub_menu);
		$sub_menu = str_replace('class="menu-parent"','',$sub_menu);
		return '<li class="megamenu col-'. $element['#attributes']['layout_col'][0] .' menu-parent">' . $output . $sub_menu . "</li>\n";
	}
	if($element['#attributes']['layout'][0] == "menu-col-img") {
		$sub_menu = str_replace('class="menu"','class="sub-menu bg-'. $element['#attributes']['layout_image_align'][0] .' bg-'. $element['#attributes']['layout_col'][0] .'" style="background-image:url('. $element['#attributes']['layout_img'][0] .'); min-height: '. $element['#attributes']['layout_height'][0] .'"',$sub_menu);
		$sub_menu = str_replace('</a><ul class="sub-menu">','</a><ul>',$sub_menu);
		$sub_menu = str_replace('class="menu-parent"','',$sub_menu);
		return '<li class="megamenu col-'. $element['#attributes']['layout_col'][0] .' menu-parent">' . $output . $sub_menu . "</li>\n";
	}
  }
  else {
	return '<li>' . $output . "</li>\n";
  }
}

/**
 * Implements theme_field__field_type().
 */
function md_orenmode_field__taxonomy_term_reference($variables) {
    $output = '';

    // Render the label, if it's not hidden.
    if (!$variables['label_hidden']) {
        $output .= '<h3 class="field-label">' . $variables['label'] . ': </h3>';
    }

    // Render the items.
    $output .= ($variables['element']['#label_display'] == 'inline') ? '<ul class="links inline">' : '<ul class="links">';
    foreach ($variables['items'] as $delta => $item) {
        $output .= '<li class="taxonomy-term-reference-' . $delta . '"' . $variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</li>';
    }
    $output .= '</ul>';

    // Render the top-level DIV.
    $output = '<div class="' . $variables['classes'] . (!in_array('clearfix', $variables['classes_array']) ? ' clearfix' : '') . '">' . $output . '</div>';

    return $output;
}

/**
 * Override of theme('textarea').
 * Deprecate misc/textarea.js in favor of using the 'resize' CSS3 property.
 */
function md_orenmode_textarea($variables) {
    $element = $variables['element'];
    $element['#attributes']['name'] = $element['#name'];
    $element['#attributes']['id'] = $element['#id'];
    $element['#attributes']['cols'] = $element['#cols'];
    $element['#attributes']['rows'] = $element['#rows'];
    _form_set_class($element, array('form-textarea'));

    $wrapper_attributes = array(
        'class' => array('form-textarea-wrapper'),
    );

    // Add resizable behavior.
    if (!empty($element['#resizable'])) {
        $wrapper_attributes['class'][] = 'resizable';
    }

    $output = '<div' . drupal_attributes($wrapper_attributes) . '>';
    $output .= '<textarea' . drupal_attributes($element['#attributes']) . '>' . check_plain($element['#value']) . '</textarea>';
    $output .= '</div>';
    return $output;
}


/**
 * @param $variables
 * @return Main menu
 */
function md_orenmode_links__menu_header_navigation($variables) {
    $html = "<div class='link-holder fade'>\n";
    $html .= "  <ul>\n";

    foreach ($variables['links'] as $link) {

        if(isset($link['fragment'])) {
            $link['attributes']['class'] = array('scroll-link transition');
        } else {
            $link['attributes']['class'] = array('transition unscroll-link');
        }
        $html .= "<li>".l($link['title'], $link['href'], $link)."</li>";

    }
    //kpr($variables);die;
    $html .= "  </ul>\n";
    $html .= "</div>\n";

    return $html;
}
function phptemplate_preprocess_page(&$vars){
    if ( isset($_GET['ajax']) && $_GET['ajax'] == 1 ) {
        $vars['template_file'] = 'page-ajax';
    }
}

/**
 * @param $form
 * @param $form_state
 * @param $form_id
 */
function md_orenmode_form_alter(&$form, &$form_state, $form_id) {
    if (strpos((string)($form_id),"webform_client_form") === false) {
        switch ($form_id) {
            case 'user_login':
                $form['name']['#attributes']['class'][] = '';
                $form['name']['#prefix'] = '<div class="control-group"><div class="controls">';
                $form['name']['#suffix'] = '</div></div>';
                $form['pass']['#attributes']['class'][] = '';
                $form['pass']['#prefix'] = '<div class="control-group"><div class="controls">';
                $form['pass']['#suffix'] = '</div></div>';
                $form['actions']['submit']['#value'] = t('Login');
                $form['actions']['submit']['#prefix'] = '';
                $form['actions']['submit']['#suffix'] = '';
                break;
            case 'user_register_form':
                $form['account']['name']['#attributes']['class'][] = '';
                $form['account']['name']['#prefix'] = '<div class="control-group"><div class="controls">';
                $form['account']['name']['#suffix'] = '</div></div>';
                $form['account']['mail']['#attributes']['class'][] = '';
                $form['account']['mail']['#prefix'] = '<div class="control-group"><div class="controls">';
                $form['account']['mail']['#suffix'] = '</div></div>';
                $form['actions']['submit']['#value'] = t('Create new account');
                $form['actions']['submit']['#prefix'] = '';
                $form['actions']['submit']['#suffix'] = '';
                break;
            case 'user_login_block':
                $form['name']['#attributes']['class'][] = '';
                $form['name']['#prefix'] = '<div class="control-group"><div class="controls">';
                $form['name']['#suffix'] = '</div></div>';
                $form['pass']['#attributes']['class'][] = '';
                $form['pass']['#prefix'] = '<div class="control-group"><div class="controls">';
                $form['pass']['#suffix'] = '</div></div>';
                $form['actions']['submit']['#value'] = t('Login');
                $form['actions']['submit']['#prefix'] = '';
                $form['actions']['submit']['#suffix'] = '';
                break;
            case 'user_pass':
                $form['name']['#attributes']['class'][] = '';
                $form['name']['#prefix'] = '<div class="control-group"><div class="controls">';
                $form['name']['#suffix'] = '</div></div>';
                $form['pass']['#attributes']['class'][] = '';
                $form['pass']['#prefix'] = '';
                $form['pass']['#suffix'] = '';
                $form['actions']['submit']['#value'] = t('Request new password');
                $form['actions']['submit']['#prefix'] = '';
                $form['actions']['submit']['#suffix'] = '';
                break;
            case 'search_block_form':
				$form['search_block_form']['#attributes']['class'][] = 'input-text';
                $form['search_block_form']['#attributes']['placeholder'] = t('Search...');
                $form['actions']['submit']['#attributes'] = array(
                    'class' => array('search-btn'),
                );
				$form['actions']['submit']['#prefix'] = '<button class="search-btn" type="submit">Submit</button>';
                $form['actions']['submit']['#value'] = t('');
                break;
            case 'search_form':
                //kpr($form);die;
                $form['basic']['submit']['#prefix'] = '<div class="form-submit"><div class="form-controls">';
                $form['basic']['submit']['#suffix'] = '</div></div>';
                $form['basic']['submit']['#attributes'] = array(
                    'class' => array('transition button'),
                );
                $form['advance']['#prefix'] = '<div class="row"><div class="container">';
                $form['advance']['#suffix'] = '</div></div>';
                $form['advance']['submit']['#prefix'] = '<div class="form-submit"><div class="form-controls">';
                $form['advance']['submit']['#suffix'] = '</div></div>';
                $form['advance']['submit']['#attributes'] = array(
                    'class' => array('transition button'),
                );
                break;
			case 'simplenews_block_form_30':
				$form['mail']['#title_display'] = 'invisible';
				$form['mail']['#attributes']['placeholder'] = t('Enter Email...');
				$form['mail']['#attributes']['class'][] = t('input-text');
				
				$form['submit']['#attributes']['class'][] = 'theme_button hidden';
				$form['submit']['#prefix'] = '<button class="letter-btn"><i class="fa fa-play"></i></button>';
				$form['submit']['#value'] = t('Send');
				break;
        }
    } else {
        $form['#prefix'] = '<fieldset id="contact_form">';
        $form['#suffix'] = '</fieldset>';
        //$form['actions']['submit']['#value'] = t('Send Message');
        $form['actions']['submit']['#attributes']['class'][] = 'submit_btn transition';
        $form['actions']['submit']['#field_prefix'] = '<i class="fa fa-search transition"></i>';
        $form['actions']['submit']['#sufix'] = '';
    }

    if (strpos((string)($form_id), "commerce_cart_add_to_cart_form") !== false) {
      $form['quantity']['#title'] = '';
      $form['quantity']['#attributes']['class'] = array('input-text qty');
      $node = menu_get_object();
      if (!isset($form_state['#is_product_page']) && $node && $node->type == 'product') {
        $form_state['#is_product_page'] = TRUE;
      }
      if (isset($form_state['#is_product_page'])) {
        $form['#is_product_page'] = TRUE;
      }
    }
    if ($form_id == 'views_exposed_form') {
      $view = $form_state['view'];
      if ($view->name == 'products') {
        $form['#theme'] = array();
        $form['#theme'][] = 'commerce_product_expose';
//        kpr($form);exit;
      }
      
    }
    
}
/**
 * Process variables for comment.tpl.php.
 *
 * @see comment.tpl.php
 */
function md_orenmode_preprocess_comment(&$variables) {
    $comment = $variables['elements']['#comment'];
    $node = $variables['elements']['#node'];
    $variables['comment']   = $comment;
    $variables['node']      = $node;
    $variables['author']    = theme('username', array('account' => $comment));

    $variables['created']   = date('d F Y',$comment->created);

    // Avoid calling format_date() twice on the same timestamp.
    if ($comment->changed == $comment->created) {
        $variables['changed'] = $variables['created'];
    }
    else {
        $variables['changed'] = format_date($comment->changed);
    }

    $variables['new']       = !empty($comment->new) ? t('new') : '';
    $variables['picture']   = theme_get_setting('toggle_comment_user_picture') ? theme('user_picture', array('account' => $comment)) : '';
    $variables['signature'] = $comment->signature;

    $uri = entity_uri('comment', $comment);
    $uri['options'] += array('attributes' => array('class' => 'permalink', 'rel' => 'bookmark'));

    $variables['title']     = l($comment->subject, $uri['path'], $uri['options']);
    $variables['permalink'] = l(t('Permalink'), $uri['path'], $uri['options']);
    $variables['submitted'] = t('!username  on !datetime', array('!username' => $variables['author'], '!datetime' => date('d F Y',$comment->created)));

    // Preprocess fields.
    field_attach_preprocess('comment', $comment, $variables['elements'], $variables);

    // Helpful $content variable for templates.
    foreach (element_children($variables['elements']) as $key) {
        $variables['content'][$key] = $variables['elements'][$key];
    }

    // Set status to a string representation of comment->status.
    if (isset($comment->in_preview)) {
        $variables['status'] = 'comment-preview';
    }
    else {
        $variables['status'] = ($comment->status == COMMENT_NOT_PUBLISHED) ? 'comment-unpublished' : 'comment-published';
    }

    // Gather comment classes.
    // 'comment-published' class is not needed, it is either 'comment-preview' or
    // 'comment-unpublished'.
    if ($variables['status'] != 'comment-published') {
        $variables['classes_array'][] = $variables['status'];
    }
    if ($variables['new']) {
        $variables['classes_array'][] = 'comment-new';
    }
    if (!$comment->uid) {
        $variables['classes_array'][] = 'comment-by-anonymous';
    }
    else {
        if ($comment->uid == $variables['node']->uid) {
            $variables['classes_array'][] = 'comment-by-node-author';
        }
        if ($comment->uid == $variables['user']->uid) {
            $variables['classes_array'][] = 'comment-by-viewer';
        }
    }
}

/**
 * template_preprocess_user_picture()
 */
function md_orenmode_preprocess_user_picture(&$variables) {
    $variables['user_picture'] = '';
    if (variable_get('user_pictures', 0)) {
        $account = $variables['account'];
        if (!empty($account->picture)) {
            // @TODO: Ideally this function would only be passed file objects, but
            // since there's a lot of legacy code that JOINs the {users} table to
            // {node} or {comments} and passes the results into this function if we
            // a numeric value in the picture field we'll assume it's a file id
            // and load it for them. Once we've got user_load_multiple() and
            // comment_load_multiple() functions the user module will be able to load
            // the picture files in mass during the object's load process.
            if (is_numeric($account->picture)) {
                $account->picture = file_load($account->picture);
            }
            if (!empty($account->picture->uri)) {
                $filepath = $account->picture->uri;
            }
        }
        elseif (variable_get('user_picture_default', '')) {
            $filepath = variable_get('user_picture_default', '');
        }
        if (isset($filepath)) {
            $alt = t("@user's picture", array('@user' => format_username($account)));
            // If the image does not have a valid Drupal scheme (for eg. HTTP),
            // don't load image styles.
            if (module_exists('image') && file_valid_uri($filepath) && $style = variable_get('user_picture_style', '')) {
                $variables['user_picture'] = theme('image_style', array('style_name' => $style, 'path' => $filepath, 'alt' => $alt, 'title' => $alt, 'attributes' => array('class' => array('thumb img-rounded'))));
            }
            else {
                $variables['user_picture'] = theme('image', array('path' => $filepath, 'alt' => $alt, 'title' => $alt));
            }
            if (!empty($account->uid) && user_access('access user profiles')) {
                $attributes = array(
                    'attributes' => array('title' => t('View user profile.')),
                    'html' => TRUE,
                );
                $variables['user_picture'] = l($variables['user_picture'], "user/$account->uid", $attributes);
            }
        }
    }

}

/**
 * @param $theme_registry
 * An implementation of hook_theme_registry_alter() Substitute our own custom version of the standard 'theme_form_element' function. If the theme has overridden it, we'll be bypassed, but in most cases this will work nicely..
 */
function md_orenmode_theme_registry_alter(&$theme_registry) {
    if (!empty($theme_registry['form_element'])) {
        $theme_registry['form_element']['function'] = 'md_orenmode_form_element';
    }
}
/**
 * Returns HTML for a form element.
 *
 * Each form element is wrapped in a DIV container having the following CSS
 * classes:
 * - form-item: Generic for all form elements.
 * - form-type-#type: The internal element #type.
 * - form-item-#name: The internal form element #name (usually derived from the
 *   $form structure and set via form_builder()).
 * - form-disabled: Only set if the form element is #disabled.
 *
 * In addition to the element itself, the DIV contains a label for the element
 * based on the optional #title_display property, and an optional #description.
 *
 * The optional #title_display property can have these values:
 * - before: The label is output before the element. This is the default.
 *   The label includes the #title and the required marker, if #required.
 * - after: The label is output after the element. For example, this is used
 *   for radio and checkbox #type elements as set in system_element_info().
 *   If the #title is empty but the field is #required, the label will
 *   contain only the required marker.
 * - invisible: Labels are critical for screen readers to enable them to
 *   properly navigate through forms but can be visually distracting. This
 *   property hides the label for everyone except screen readers.
 * - attribute: Set the title attribute on the element to create a tooltip
 *   but output no label element. This is supported only for checkboxes
 *   and radios in form_pre_render_conditional_form_element(). It is used
 *   where a visual label is not needed, such as a table of checkboxes where
 *   the row and column provide the context. The tooltip will include the
 *   title and required marker.
 *
 * If the #title property is not set, then the label and any required marker
 * will not be output, regardless of the #title_display or #required values.
 * This can be useful in cases such as the password_confirm element, which
 * creates children elements that have their own labels and required markers,
 * but the parent element should have neither. Use this carefully because a
 * field without an associated label can cause accessibility challenges.
 *
 * @param $variables
 *   An associative array containing:
 *   - element: An associative array containing the properties of the element.
 *     Properties used: #title, #title_display, #description, #id, #required,
 *     #children, #type, #name.
 *
 * @ingroup themeable
 */
function md_orenmode_form_element($variables) {
    $element = &$variables['element'];

    // This function is invoked as theme wrapper, but the rendered form element
    // may not necessarily have been processed by form_builder().
    $element += array(
        '#title_display' => 'before',
    );

    // Add element #id for #type 'item'.
    if (isset($element['#markup']) && !empty($element['#id'])) {
        $attributes['id'] = $element['#id'];
    }
    // Add element's #type and #name as class to aid with JS/CSS selectors.
    $attributes['class'] = array('form-item');
    if (!empty($element['#type'])) {
        $attributes['class'][] = 'form-type-' . strtr($element['#type'], '_', '-');
    }
    if (!empty($element['#name'])) {
        $attributes['class'][] = 'form-item-' . strtr($element['#name'], array(' ' => '-', '_' => '-', '[' => '-', ']' => ''));
    }
    // Add a class for disabled elements to facilitate cross-browser styling.
    if (!empty($element['#attributes']['disabled'])) {
        $attributes['class'][] = 'form-disabled';
    }
    $output = '<div' . drupal_attributes($attributes) . '>' . "\n";

    // If #title is not set, we don't display any label or required marker.
    if (!isset($element['#title'])) {
        $element['#title_display'] = 'none';
    }
    $prefix = isset($element['#field_prefix']) ? '' . $element['#field_prefix'] . '' : '';
    $suffix = isset($element['#field_suffix']) ? '' . $element['#field_suffix'] . '' : '';

    switch ($element['#title_display']) {
        case 'before':
        case 'invisible':
            $output .= ' ' . theme('form_element_label', $variables);
            $output .= ' ' . $prefix . $element['#children'] . $suffix . "\n";
            break;

        case 'after':
            $output .= ' ' . $prefix . $element['#children'] . $suffix;
            $output .= ' ' . theme('form_element_label', $variables) . "\n";
            break;

        case 'none':
        case 'attribute':
            // Output no label and no required marker, only the children.
            $output .= ' ' . $prefix . $element['#children'] . $suffix . "\n";
            break;
    }

    if (!empty($element['#description'])) {
        $output .= '<div class="description">' . $element['#description'] . "</div>\n";
    }

    $output .= "</div>\n";

    return $output;
}

/**
 * Theme textfield
 */
function md_orenmode_textfield($variables) {
    $element = $variables['element'];
    $element['#attributes']['type'] = 'text';
    element_set_attributes($element, array('id', 'name', 'value', 'size', 'maxlength'));
    _form_set_class($element, array('form-text '));

    $extra = '';
    if ($element['#autocomplete_path'] && drupal_valid_path($element['#autocomplete_path'])) {
        drupal_add_library('system', 'drupal.autocomplete');
        $element['#attributes']['class'][] = 'form-autocomplete';

        $attributes = array();
        $attributes['type'] = 'hidden';
        $attributes['id'] = $element['#attributes']['id'] . '-autocomplete';
        $attributes['value'] = url($element['#autocomplete_path'], array('absolute' => TRUE));
        $attributes['disabled'] = 'disabled';
        $attributes['class'][] = 'autocomplete';
        $extra = '<input' . drupal_attributes($attributes) . ' />';
    }

    $output = '<input' . drupal_attributes($element['#attributes']) . ' />';

    return $output . $extra;
}
/**
 * Theme_button
 */
function md_orenmode_button($variables) {
    $element = $variables['element'];
    $element['#attributes']['type'] = 'submit';
    element_set_attributes($element, array('id', 'name', 'value'));

    $element['#attributes']['class'][] = 'form-' . $element['#button_type'] . ' transition button';
    if (!empty($element['#attributes']['disabled'])) {
        $element['#attributes']['class'][] = 'form-button-disabled';
    }

    return '<input' . drupal_attributes($element['#attributes']) . ' />';
}

function md_orenmode_css_alter(&$css) {
  unset($css[drupal_get_path('module', 'system') . '/system.menus.css']);
  unset($css[drupal_get_path('module', 'commerce') . '/modules/line_item/theme/commerce_line_item.theme.css']);
}

/**
 * @see template_preprocess_panels_pane().
 */
//function md_orenmode_preprocess_panels_pane(&$vars) {
//  $pane = $vars['pane'];
//  $display = $vars['display'];
//  $vars['bg_style'] = variable_get("bg_style__{$display->uuid}_{$pane->subtype}", '');
//  $vars['bg_image'] = variable_get("bg_image__{$display->uuid}_{$pane->subtype}", '');
//  $vars['bg_effect'] = variable_get("bg_effect__{$display->uuid}_{$pane->subtype}", '');
//  $bg_image = variable_get("bg_image__{$display->uuid}_{$pane->subtype}", '');
//  if($bg_image) {
//  	$vars['bg_image'] = md_orenmode_theme_setting_check_path($bg_image['bg_image_path']);
//  } else {
//  	$vars['bg_image'] = "";
//  }
//}

function md_orenmode_form_comment_form_alter(&$form, &$form_state) {
	unset($form['actions']['preview']);
	unset($form['subject']);
	
	$form['author']['name']['#attributes'] = array('placeholder' => t('Name (required)'));
	$form['author']['_author']['#title_display'] = 'invisible';
	$form['author']['name']['#title_display'] = 'invisible';
	$form['author']['name']['#attributes']['class'][] = 'input-text';
	$form['author']['name']['#prefix'] = '<div class="col-sm-6">';
	$form['author']['name']['#suffix'] = '</div>';
	
	$form['field_comment_email']['und'][0]['email']['#attributes'] = array('placeholder' => t('Email (required)'));
	$form['field_comment_email']['und'][0]['email']['#title_display'] = 'invisible';
	$form['field_comment_email']['und'][0]['email']['#attributes']['class'][] = 'input-text';
	$form['field_comment_email']['und'][0]['email']['#prefix'] = '<div class="col-sm-6">';
	$form['field_comment_email']['und'][0]['email']['#suffix'] = '</div>';
	
	$form['comment_body']['und'][0]['value']['#attributes'] = array('placeholder' => t('Your Message (required)'));
	$form['comment_body']['und'][0]['value']['#title_display'] = 'invisible';
	$form['comment_body']['und'][0]['value']['#attributes']['class'][] = 'textarea';
	$form['comment_body']['und'][0]['value']['#prefix'] = '<div class="col-sm-12">';
	$form['comment_body']['und'][0]['value']['#suffix'] = '</div>';
	
	$form['actions']['submit']['#value'] = 'Submit';
	$form['actions']['submit']['#attributes']['class'][] = 'btn btn-3 text-uppercase';
	$form['actions']['submit']['#prefix'] = '<div class="col-sm-12">';
	$form['actions']['submit']['#suffix'] = '</div>';
	
}

function md_orenmode_form_user_login_alter(&$form, &$form_state) {	
	$form['name']['#attributes']['class'][] = 'form-control';	
	$form['pass']['#attributes']['class'][] = 'form-control';
	$form['actions']['submit']['#attributes']['class'][] = 'btn btn-3 text-uppercase';
}

function md_orenmode_form_user_register_form_alter(&$form, &$form_state) {
	$form['account']['name']['#attributes']['class'][] = 'form-control';
	$form['account']['mail']['#attributes']['class'][] = 'form-control';
	$form['actions']['submit']['#attributes']['class'][] = 'btn btn-3 text-uppercase';
}

function md_orenmode_form_user_pass_alter(&$form, &$form_state) {
	$form['name']['#attributes']['class'][] = 'form-control';
	$form['actions']['submit']['#attributes']['class'][] = 'btn btn-3 text-uppercase';

}

function md_orenmode_form_views_form_commerce_cart_form_default_alter(&$form, &$form_state) {
	$form['actions']['submit']['#attributes']['class'][] = 'btn btn-13 pull-left';
	$form['actions']['submit']['#value'] = 'Update Cart';
	
	$form['actions']['checkout']['#attributes']['class'][] = 'btn btn-13 pull-right';
	$form['actions']['checkout']['#value'] = 'Process to Checkout';
}

function md_orenmode_form_commerce_checkout_form_checkout_alter(&$form, &$form_state) {
	$form['#attributes']['class'][] = 'form' ;

	$form['customer_profile_billing']['commerce_customer_address']['und'][0]['name_block']['#prefix'] = '<div class="col-xs-12">';
	$form['customer_profile_billing']['commerce_customer_address']['und'][0]['name_block']['#suffix'] = '</div><p>&nbsp</p>';
	$form['customer_profile_billing']['commerce_customer_address']['und'][0]['name_block']['name_line']['#attributes']['class'][] = 'input-text';
	
	$form['customer_profile_billing']['commerce_customer_address']['und'][0]['country']['#prefix'] = '<div class="col-xs-12">';
	$form['customer_profile_billing']['commerce_customer_address']['und'][0]['country']['#suffix'] = '</div><p>&nbsp</p>';
	$form['customer_profile_billing']['commerce_customer_address']['und'][0]['country']['#attributes']['class'][] = 'input-text';
	
	$form['customer_profile_billing']['commerce_customer_address']['und'][0]['street_block']['thoroughfare']['#prefix'] = '<div class="col-xs-12">';
	$form['customer_profile_billing']['commerce_customer_address']['und'][0]['street_block']['thoroughfare']['#suffix'] = '</div><p>&nbsp</p>';
	$form['customer_profile_billing']['commerce_customer_address']['und'][0]['street_block']['thoroughfare']['#attributes']['class'][] = 'input-text';
	
	$form['customer_profile_billing']['commerce_customer_address']['und'][0]['street_block']['premise']['#prefix'] = '<div class="col-xs-12">';
	$form['customer_profile_billing']['commerce_customer_address']['und'][0]['street_block']['premise']['#suffix'] = '</div><p>&nbsp</p>';
	$form['customer_profile_billing']['commerce_customer_address']['und'][0]['street_block']['premise']['#attributes']['class'][] = 'input-text';
	
	$form['customer_profile_billing']['commerce_customer_address']['und'][0]['locality_block']['locality']['#prefix'] = '<div class="col-xs-12">';
	$form['customer_profile_billing']['commerce_customer_address']['und'][0]['locality_block']['locality']['#suffix'] = '</div><p>&nbsp</p>';
	$form['customer_profile_billing']['commerce_customer_address']['und'][0]['locality_block']['locality']['#attributes']['class'][] = 'input-text';
	
	$form['customer_profile_billing']['commerce_customer_address']['und'][0]['locality_block']['dependent_locality']['#prefix'] = '<div class="col-xs-12">';
	$form['customer_profile_billing']['commerce_customer_address']['und'][0]['locality_block']['dependent_locality']['#suffix'] = '</div><p>&nbsp</p>';
	$form['customer_profile_billing']['commerce_customer_address']['und'][0]['locality_block']['dependent_locality']['#attributes']['class'][] = 'input-text';
	
	$form['customer_profile_billing']['commerce_customer_address']['und'][0]['locality_block']['administrative_area']['#prefix'] = '<div class="col-xs-12">';
	$form['customer_profile_billing']['commerce_customer_address']['und'][0]['locality_block']['administrative_area']['#suffix'] = '</div><p>&nbsp</p>';
	$form['customer_profile_billing']['commerce_customer_address']['und'][0]['locality_block']['administrative_area']['#attributes']['class'][] = 'input-text';
	
	$form['customer_profile_billing']['commerce_customer_address']['und'][0]['locality_block']['postal_code']['#prefix'] = '<div class="col-xs-12">';
	$form['customer_profile_billing']['commerce_customer_address']['und'][0]['locality_block']['postal_code']['#suffix'] = '</div><p>&nbsp</p>';
	$form['customer_profile_billing']['commerce_customer_address']['und'][0]['locality_block']['postal_code']['#attributes']['class'][] = 'input-text';
	
	$form['buttons']['continue']['#attributes']['class'][] = 'btn btn-13 text-uppercase pull-left';
	$form['buttons']['cancel']['#prefix'] = '&nbsp;';
	$form['buttons']['cancel']['#attributes']['class'][] = 'btn btn-13 text-uppercase pull-right';
}

function md_orenmode_form_commerce_checkout_form_review_alter(&$form, &$form_state) {
	$form['#attributes']['class'][] = 'form' ;
	
	$form['commerce_payment']['payment_method']['#prefix'] = '<div class="col-xs-12">';
	$form['commerce_payment']['payment_method']['#suffix'] = '</div><p>&nbsp</p>';
	
	$form['commerce_payment']['payment_details']['credit_card']['number']['#prefix'] = '<div class="col-xs-12">';
	$form['commerce_payment']['payment_details']['credit_card']['number']['#suffix'] = '</div><p>&nbsp</p>';
	$form['commerce_payment']['payment_details']['credit_card']['number']['#attributes']['class'][] = 'input-text';
	
	$form['commerce_payment']['payment_details']['credit_card']['exp_month']['#prefix'] = '<div class="col-xs-12">';
	$form['commerce_payment']['payment_details']['credit_card']['exp_month']['#attributes']['class'][] = 'input-text auto';
	
	$form['commerce_payment']['payment_details']['credit_card']['exp_year']['#suffix'] = '</div><p>&nbsp</p>';
	$form['commerce_payment']['payment_details']['credit_card']['exp_year']['#attributes']['class'][] = 'input-text auto';
	
	$form['buttons']['continue']['#attributes']['class'][] = 'btn btn-13 text-uppercase pull-left';
	$form['buttons']['back']['#prefix'] = '&nbsp;';
	$form['buttons']['back']['#attributes']['class'][] = 'btn btn-13 text-uppercase pull-right';
}

/**
 * Override theme_breadcrumb().
 */
function md_orenmode_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];
  $output = '';
  if (!empty($breadcrumb)) {
    $output = '<ul class="nav-breakcrumb pull-right">';
    $is_first = TRUE;
    foreach($breadcrumb as $value) {
      if ($is_first) {
        $output .= '<li>' . $value . '</li>';
        $is_first = FALSE;
      } else {
        $output .= '<li>' . $value . '</li>';
      }
    }
    $output .= '<li>' . drupal_get_title() . '</li>';
    $output .= '</ul>';
  }
  return $output;
}

function md_orenmode_status_messages($variables) {
  $display = $variables['display'];
  $output = '';

  $status_heading = array(
    'status' => t('Status message'),
    'error' => t('Error message'),
    'warning' => t('Warning message'),
  );
  foreach (drupal_get_messages($display) as $type => $messages) {
    switch($type) {
		case "status" :
			$output .= '<div class="alert alert-success" role="alert">';
			$output .= '<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>';
			if (count($messages) > 1) {
			  $output .= " <ul>\n";
			  foreach ($messages as $message) {
				$output .= '  <li>' . $message . "</li>\n";
			  }
			  $output .= " </ul>\n";
			}
			else {
			  $output .= $messages[0];
			}
			$output .= "</div>\n";
		break;
		case "error" :
			$output .= '<div class="alert alert-danger" role="alert">';
			$output .= '<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>';
			if (count($messages) > 1) {
			  $output .= " <ul>\n";
			  foreach ($messages as $message) {
				$output .= '  <li>' . $message . "</li>\n";
			  }
			  $output .= " </ul>\n";
			}
			else {
			  $output .= $messages[0];
			}
			$output .= "</div>\n";
		break;
		case "warning" :
			$output .= '<div class="alert alert-warning" role="alert">';
			$output .= '<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>';
			if (count($messages) > 1) {
			  $output .= " <ul>\n";
			  foreach ($messages as $message) {
				$output .= '  <li>' . $message . "</li>\n";
			  }
			  $output .= " </ul>\n";
			}
			else {
			  $output .= $messages[0];
			}
			$output .= "</div>\n";
		break;
	}
  }
  return $output;
}


function md_orenmode_preprocess_field(&$vars) {
  // Attach product fancybox js
  if ($vars['element']['#field_name'] == 'field_product_gallery') {
    drupal_add_js(drupal_get_path('theme', 'md_orenmode') . '/js/front/custom/product-fancybox.js');
  }
}

/**
 * Implement hook_theme().
 */
function md_orenmode_theme($existing, $type, $theme, $path) {
  return array(
    'commerce_cart_add_to_cart_form' => array(
      'render element' => 'form',
      'template' => 'commerce-cart-add-to-cart-form',
      'path' => drupal_get_path('theme', 'md_orenmode') . '/template/forms', 
    ),
    'commerce_product_filter_price' => array(
      'variables' => array('url' => NULL),
      'template' => 'commerce-product-filter-price',
      'path' => drupal_get_path('theme', 'md_orenmode') . '/template/custom', 
    ),
  );
}

/**
 * Add js for product cart
 */
function md_orenmode_preprocess_commerce_cart_add_to_cart_form(&$vars) {
  if (isset($vars['form']['#is_product_page']) && $vars['form']['#is_product_page']) {
    drupal_add_js(drupal_get_path('theme', 'md_orenmode') . '/js/front/custom/product-cart.js');
  }
}

/**
 * Get color of taxonomy term.
 */
function md_orenmode_get_color($taxonomy_tid) {
  $term = taxonomy_term_load($taxonomy_tid);
  return $term->field_color[LANGUAGE_NONE][0]['rgb'];
}

function md_orenmode_preprocess_commerce_product_expose(&$vars) {
  $query_parameters = drupal_get_query_parameters();

  $has_fitler = FALSE;
  $form = $vars['form'];
  
  if (isset($form['colors'])) {
    $vars['colors'] = array();
    $v = taxonomy_vocabulary_machine_name_load('product_color');
    $colors = taxonomy_get_tree($v->vid, 0, NULL, TRUE);
    foreach ($colors as $color) {
      $vars['colors'][$color->tid] = array(
        'rgb' => $color->field_color[LANGUAGE_NONE][0]['rgb'],
        'checked' => isset($query_parameters['colors']) && is_array($query_parameters['colors']) && in_array($color->tid, $query_parameters['colors']),
      );
    }
    
    $has_fitler = TRUE;
  }
  
  if (isset($form['sizes'])) {
    $count_size = orenmode_config_count_node_by_product_size();
    $vars['sizes'] = array();
    $v = taxonomy_vocabulary_machine_name_load('product_size');
    $sizes = taxonomy_get_tree($v->vid, 0, NULL, TRUE);
    foreach ($sizes as $size) {
      $vars['sizes'][$size->tid] = array(
        'name' => $size->name,
        'checked' => isset($query_parameters['sizes']) && is_array($query_parameters['sizes']) && in_array($size->tid, $query_parameters['sizes']),
        'count' => isset($count_size[$size->tid]) ? $count_size[$size->tid] : 0,
      );
    }
    
    $has_fitler = TRUE;
  }
  
  if (isset($form['categories'])) {
    $count_categories = orenmode_config_count_node_by_product_categories();
    $vars['categories'] = array();
    $v = taxonomy_vocabulary_machine_name_load('product_categories');
    $categories = taxonomy_get_tree($v->vid, 0, NULL, TRUE);
    foreach ($categories as $category) {
      $vars['categories'][$category->tid] = array(
        'name' => $category->name,
        'checked' => isset($query_parameters['categories']) && is_array($query_parameters['categories']) && in_array($category->tid, $query_parameters['categories']),
        'count' => isset($count_categories[$category->tid]) ? $count_categories[$category->tid] : 0
      );
    }
    
    $has_fitler = TRUE;
  }
  
  $vars['GET'] = $query_parameters;
  $vars['hasFitler'] = $has_fitler;
  if ($has_fitler) {
    $vars['theme_hook_suggestions'][] = 'commerce_product_expose__filter';
  } else {
    $vars['theme_hook_suggestions'][] = 'commerce_product_expose__sort';
  }
  $vars['theme_hook_original'] = 'commerce_product_expose__filter';

  $price_min = variable_get('gprice_min', 0);
  $price_max = variable_get('gprice_max', 10000);
  $settings['price_min'] = isset($query_parameters['price_min']) && !empty($query_parameters['price_min']) ? $query_parameters['price_min'] : $price_min;
  $settings['price_max'] = isset($query_parameters['price_max']) && !empty($query_parameters['price_max']) ? $query_parameters['price_max'] : $price_max;
  $settings['config_price_min'] = $price_min;
  $settings['config_price_max'] = $price_max;
  $settings['currentFilters'] = empty($query_parameters) ? new stdClass : $query_parameters;
  $settings['baseUrl'] = $GLOBALS['base_url'] . '/' . current_path();
  drupal_add_js(array('orenmodePrice' => array('setting' => $settings)), 'setting');
  
  drupal_add_js(drupal_get_path('theme', 'md_orenmode') . '/js/front/custom/product-filters.js');
}

function md_orenmode_preprocess_commerce_product_filter_price(&$vars) {
  $query_parameters = drupal_get_query_parameters();
  
  if (empty($vars['url'])) {
    $vars['url'] = $GLOBALS['base_url'] . '/' . current_path();
  }
  
  $vars['htmlId'] = drupal_html_id('slider');
  $price_min = variable_get('gprice_min', 0);
  $price_max = variable_get('gprice_max', 10000);
  $settings['price_min'] = isset($query_parameters['price_min']) && !empty($query_parameters['price_min']) ? $query_parameters['price_min'] : $price_min;
  $settings['price_max'] = isset($query_parameters['price_max']) && !empty($query_parameters['price_max']) ? $query_parameters['price_max'] : $price_max;
  $settings['config_price_min'] = $price_min;
  $settings['config_price_max'] = $price_max;
  $settings['currentFilters'] = empty($query_parameters) ? new stdClass : $query_parameters;
  $settings['baseUrl'] = $vars['url'];
  $settings['htmlId'] = $vars['htmlId'];
  
  drupal_add_js(array('priceFilter' => array('setting' => $settings)), 'setting');
  drupal_add_js(drupal_get_path('theme', 'md_orenmode') . '/js/front/custom/product-filter-price.js');
}

/*
 * Retrieve taxonomy node count by Term ID as by taxonomy_term_count_nodes.
 *
 * @param tid
 *   Term ID
 * @param type
 *   Node type
 * @param child_count
 *   TRUE - Also count all nodes in child terms (if they exists) - Default
 *   FALSE - Count only nodes related to Term ID
 */
