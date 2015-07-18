<?php
	  $product = commerce_product_load((int)$form['product_id']['#value']);
	  $query = new EntityFieldQuery;
	  $result = $query->entityCondition('entity_type', 'node', '=')
		->propertyCondition('type', 'product')
		->fieldCondition('field_product_ref', 'product_id', (int)$form['product_id']['#value'], '=')
		->range(0, 1)->execute();
	   
		
	  $nids = array();
	  foreach ($result['node'] as $node) {
		$nids[] = $node->nid;
	  }
	  $node = node_load((int)$nids[0]);
?>
<?php if (isset($form['#is_product_page']) && $form['#is_product_page'] && isset($form['attributes'])): ?>
  <div id="attribute" class="attribute clearfix">
    <?php if (isset($form['attributes'])): ?>
      <fieldset class="attribute_fieldset"> 
        <label class="attribute_label"><?php print t('Color'); ?>:</label>
        <div class="attribute_list"> 
          <ul class="attribute_color">
            <?php foreach ($form['attributes']['field_product_colors']['#options'] as $id => $color) : ?>
              <?php $color = md_orenmode_get_color($id);?>
              <?php if ($id == $form['attributes']['field_product_colors']['#default_value']): ?>
                <li class="active"><a href="#" style="background-color: <?php print $color;?>" data-color="<?php print $id; ?>" class="_<?php print $id; ?>"></a></li>
              <?php else: ?>
                <li><a href="#" style="background-color: <?php print $color;?>" data-color="<?php print $id; ?>" class="_<?php print $id; ?>"></a></li>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>
        </div>
      </fieldset>
      <fieldset class="attribute_fieldset"> 
        <label class="attribute_label"><?php print t('Size'); ?>:</label>
        <div class="attribute_list">
          <ul class="attribute_size">
            <?php foreach ($form['attributes']['field_product_size']['#options'] as $id => $size) : ?>
              <?php if ($id == $form['attributes']['field_product_size']['#default_value']): ?>
                <li class="active"><a href="#" data-size="<?php print $id; ?>"><?php print $size; ?></a></li>
              <?php else: ?>
                <li><a href="#" data-size="<?php print $id; ?>"><?php print $size; ?></a></li>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>
        </div>
      </fieldset>
    <?php endif; ?>
    <div class="js-hide">
      <?php print render($form['attributes']) ?> 
    </div>
  </div>
  <div class="add-to-box clearfix">
    <div class="input-content">
      <label for="qty"><?php print t('QTY'); ?>:</label>
      <div class="qty-box">
        <button class="qty-decrease" id="qty-plus"></button>
        <?php print render($form['quantity']) ?>
        <button class="qty-increase" id="qty-minus"></button>
      </div>
    </div>

    <div class="add-to-cart">
      <div class="js-hide"><?php print render($form['submit']) ?></div>
      <a href="#" class="btn btn-3 text-uppercase"><i class="fa fa-cart-plus"></i> <span><?php print t('Add To Cart'); ?></span></a>
    </div>

    <div class="add-to-user">
      <?php if(user_is_logged_in()) : ?>
      	<span class="btn btn-13"><?php print flag_create_link('bookmark', $node->nid); ?></span>
      	<span class="btn btn-13"><?php print flag_create_link('compare', $node->nid); ?></span>
      <?php else : ?>
      	<a href="<?php print base_path().'user'; ?>" class="btn btn-13"><i class="fa fa-heart-o"></i> <span><?php print t('Add to WishList'); ?></span></a>
		<a href="<?php print base_path().'user'; ?>" class="btn btn-13"><i class="fa fa-refresh"></i> <span><?php print t('Add to Compare'); ?></span></a>
      <?php endif; ?>
    </div>
  </div>
<?php endif; ?>

<?php print drupal_render_children($form); ?>
