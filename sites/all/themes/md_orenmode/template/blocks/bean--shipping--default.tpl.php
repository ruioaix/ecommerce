<?php $col = 12/count($content['field_shipping_item']['#items']); ?>
<?php for($i=0; $i < count($content['field_shipping_item']['#items']); $i++) : ?>
	<?php if($content['field_shipping_display']['#items'][0]['value'] == "style-1") : ?>
        <div class="col-xs-<?php print $col; ?>">
            <div class="item">
                <div class="img">
                    <img src="<?php print file_create_url($content['field_shipping_item'][$i]['entity']['field_collection_item'][$content['field_shipping_item']['#items'][$i]['value']]['field_shipping_image']['#items'][0]['uri']); ?>" alt="" />
                    <span class="icon"><i class="fa <?php print $content['field_shipping_item'][$i]['entity']['field_collection_item'][$content['field_shipping_item']['#items'][$i]['value']]['field_shipping_icon']['#items'][0]['value']; ?>"></i></span>
                </div>
                <div class="text">
                    
                    <h2><?php print $content['field_shipping_item'][$i]['entity']['field_collection_item'][$content['field_shipping_item']['#items'][$i]['value']]['field_shipping_title']['#items'][0]['value']; ?></h2>
                    <?php print $content['field_shipping_item'][$i]['entity']['field_collection_item'][$content['field_shipping_item']['#items'][$i]['value']]['field_shipping_text']['#items'][0]['value']; ?>
                </div>
            </div>
        </div>
    <?php elseif($content['field_shipping_display']['#items'][0]['value'] == "style-2") : ?>
    	<!-- ITEM -->
        <div class="col-sm-<?php print $col; ?>">
            <div class="shipping-item">
                <div class="inner">
                    <span class="icon"><i class="fa <?php print $content['field_shipping_item'][$i]['entity']['field_collection_item'][$content['field_shipping_item']['#items'][$i]['value']]['field_shipping_icon']['#items'][0]['value']; ?>"></i></span>
                    <h2><?php print $content['field_shipping_item'][$i]['entity']['field_collection_item'][$content['field_shipping_item']['#items'][$i]['value']]['field_shipping_title']['#items'][0]['value']; ?></h2>
                    <p><?php print $content['field_shipping_item'][$i]['entity']['field_collection_item'][$content['field_shipping_item']['#items'][$i]['value']]['field_shipping_text']['#items'][0]['value']; ?></p>
                </div>
            </div>
        </div>
        <!-- END ITEM -->
    <?php endif; ?>
<?php endfor; ?>