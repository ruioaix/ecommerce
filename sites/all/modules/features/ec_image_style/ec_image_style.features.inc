<?php
/**
 * @file
 * ec_image_style.features.inc
 */

/**
 * Implements hook_image_default_styles().
 */
function ec_image_style_image_default_styles() {
  $styles = array();

  // Exported image style: avatar_52x62.
  $styles['avatar_52x62'] = array(
    'label' => 'Avatar (52x62)',
    'effects' => array(
      9 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 52,
          'height' => 62,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: avatar_thumbnail_45x45.
  $styles['avatar_thumbnail_45x45'] = array(
    'label' => 'Avatar Thumbnail (45x45)',
    'effects' => array(
      3 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 45,
          'height' => 45,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: blog_thumbnail_278x123.
  $styles['blog_thumbnail_278x123'] = array(
    'label' => 'Blog Thumbnail (278x123)',
    'effects' => array(
      14 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 278,
          'height' => 123,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: blog_thumbnail_347x153.
  $styles['blog_thumbnail_347x153'] = array(
    'label' => 'Blog Thumbnail (347x153)',
    'effects' => array(
      13 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 347,
          'height' => 153,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: blog_thumbnail_370x230.
  $styles['blog_thumbnail_370x230'] = array(
    'label' => 'Blog Thumbnail (370x230)',
    'effects' => array(
      2 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 370,
          'height' => 230,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: blog_thumbnail_455x200.
  $styles['blog_thumbnail_455x200'] = array(
    'label' => 'Blog Thumbnail (455x200)',
    'effects' => array(
      12 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 455,
          'height' => 200,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: blog_thumbnail_66x76.
  $styles['blog_thumbnail_66x76'] = array(
    'label' => 'Blog Thumbnail (66x76)',
    'effects' => array(
      15 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 66,
          'height' => 76,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: blog_thumbnail_745x328.
  $styles['blog_thumbnail_745x328'] = array(
    'label' => 'Blog Thumbnail (745x328)',
    'effects' => array(
      8 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 745,
          'height' => 328,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: partner_thumbnail_150x80.
  $styles['partner_thumbnail_150x80'] = array(
    'label' => 'Partner Thumbnail (150x80)',
    'effects' => array(
      4 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 150,
          'height' => 80,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: portfolio_thumbnail_270x270.
  $styles['portfolio_thumbnail_270x270'] = array(
    'label' => 'Portfolio Thumbnail (270x270)',
    'effects' => array(
      6 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 270,
          'height' => 270,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: portfolio_thumbnail_370x370.
  $styles['portfolio_thumbnail_370x370'] = array(
    'label' => 'Portfolio Thumbnail (370x370)',
    'effects' => array(
      5 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 370,
          'height' => 370,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: portfolio_thumbnail_390x264.
  $styles['portfolio_thumbnail_390x264'] = array(
    'label' => 'Portfolio Thumbnail (390x264)',
    'effects' => array(
      7 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 390,
          'height' => 264,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: product_thumbnail_145x118.
  $styles['product_thumbnail_145x118'] = array(
    'label' => 'Product Thumbnail(145x118)',
    'effects' => array(
      1 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 145,
          'height' => 118,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: product_thumbnail_150x180.
  $styles['product_thumbnail_150x180'] = array(
    'label' => 'Product Thumbnail(150x180)',
    'effects' => array(
      11 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 150,
          'height' => 180,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: product_thumbnail_60x79.
  $styles['product_thumbnail_60x79'] = array(
    'label' => 'Product Thumbnail(60x79)',
    'effects' => array(
      10 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 60,
          'height' => 79,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: theme_settings_small.
  $styles['theme_settings_small'] = array(
    'label' => 'Theme Settings Small',
    'effects' => array(),
  );

  // Exported image style: thumblist_75x75.
  $styles['thumblist_75x75'] = array(
    'label' => 'Thumblist(75x75)',
    'effects' => array(
      16 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 75,
          'height' => 75,
        ),
        'weight' => 1,
      ),
    ),
  );

  return $styles;
}
