<?php
/**
 * @file
 * ec_flag.features.inc
 */

/**
 * Implements hook_flag_default_flags().
 */
function ec_flag_flag_default_flags() {
  $flags = array();
  // Exported flag: "Wishlist".
  $flags['bookmark'] = array(
    'entity_type' => 'node',
    'title' => 'Wishlist',
    'global' => 0,
    'types' => array(
      0 => 'product',
    ),
    'flag_short' => 'Add to wishlist',
    'flag_long' => '',
    'flag_message' => '',
    'unflag_short' => 'Remove from Wishlist',
    'unflag_long' => '',
    'unflag_message' => '',
    'unflag_denied_text' => '',
    'link_type' => 'toggle',
    'weight' => 0,
    'show_in_links' => array(
      'full' => 'full',
      'teaser' => 'teaser',
      'rss' => 0,
      'search_index' => 0,
      'search_result' => 0,
      'email_plain' => 0,
      'email_html' => 0,
      'email_textalt' => 0,
      'token' => 0,
    ),
    'show_as_field' => 1,
    'show_on_form' => 1,
    'access_author' => '',
    'show_contextual_link' => 0,
    'i18n' => 0,
    'api_version' => 3,
    'module' => 'ec_flag',
    'locked' => array(
      0 => 'name',
    ),
  );
  // Exported flag: "Compare".
  $flags['compare'] = array(
    'entity_type' => 'node',
    'title' => 'Compare',
    'global' => 0,
    'types' => array(
      0 => 'product',
    ),
    'flag_short' => 'Add to compare',
    'flag_long' => '',
    'flag_message' => '',
    'unflag_short' => 'Remove from Compare',
    'unflag_long' => '',
    'unflag_message' => '',
    'unflag_denied_text' => '',
    'link_type' => 'toggle',
    'weight' => -6,
    'show_in_links' => array(
      'full' => 'full',
      'teaser' => 'teaser',
      'rss' => 0,
      'search_index' => 0,
      'search_result' => 0,
      'email_plain' => 0,
      'email_html' => 0,
      'email_textalt' => 0,
      'token' => 0,
    ),
    'show_as_field' => 1,
    'show_on_form' => 1,
    'access_author' => '',
    'show_contextual_link' => 0,
    'i18n' => 0,
    'api_version' => 3,
    'module' => 'ec_flag',
    'locked' => array(
      0 => 'name',
    ),
  );
  return $flags;

}
