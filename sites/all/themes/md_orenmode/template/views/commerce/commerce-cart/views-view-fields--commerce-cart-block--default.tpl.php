<?php
	$product = commerce_product_load((int)$row->commerce_product_field_data_commerce_product_product_id);
	$query = new EntityFieldQuery;
	$result = $query->entityCondition('entity_type', 'node', '=')
	  ->propertyCondition('type', 'product')
	  ->fieldCondition('field_product_ref', 'product_id', (int)$row->commerce_product_field_data_commerce_product_product_id, '=')
	  ->range(0, 1)->execute();
	 
	  
	$nids = array();
	foreach ($result['node'] as $node) {
	  $nids[] = $node->nid;
	}
	$node = node_load((int)$nids[0]);
?>
<li>
    <a href="#" class="img">
        <img src="<?php print image_style_url('product_thumbnail_60x79', $node->field_product_thumbnail['und'][0]['uri']); ?>" alt="">
    </a>
    <div class="text">
        <div class="name">
            <?php print $node->title; ?>
        </div>
        <span class="price"><?php print $fields['commerce_total']->content ?></span>
        <a class="delete"><?php print $fields['edit_delete']->content ?></a>
    </div>
</li>