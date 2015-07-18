<?php
global $user;
$quantity = 0;
$order = commerce_cart_order_load($user->uid);
if ($order) :
    $wrapper = entity_metadata_wrapper('commerce_order', $order);
    $line_items = $wrapper->commerce_line_items;
    $quantity = commerce_line_items_quantity($line_items, commerce_product_line_item_types());
    $total = commerce_line_items_total($line_items);
    $currency = commerce_currency_load($total['currency_code']);
endif;
?>
<!-- MINI CART -->
<div class="mini-cart ">
    
    <!-- HEADER CART -->
    <div class="cart-head" id="cart-head">
        <label><?php print t('My cart'); ?> <span>(<?php print format_plural($quantity, '1', '@count'); ?>)</span></label>
        <?php if($quantity > 0): ?>
        	<p><span><?php print t('Total'); ?>:</span> <?php print commerce_currency_format($order->commerce_order_total['und'][0]['amount'], $order->commerce_order_total['und'][0]['currency_code']); ?></p>
        <?php else : ?>
        	<p><span><?php print t('Total'); ?>:</span> <?php print '$'.$quantity; ?>&nbsp;</p>
		<?php endif; ?>
    </div>
    <!-- END HEADER CART -->
    <!-- CART CONTENT -->
	<div class="cart-cn">
		<?php print $content ;?>
    </div>
    <!-- END CART CONTENT -->

</div>
<!-- END MINI CART -->