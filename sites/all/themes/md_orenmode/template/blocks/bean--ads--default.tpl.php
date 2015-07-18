<?php if($content['field_ads_display']['#items'][0]['value'] == "type1") : ?>
<div class="accessories" id="accessories">
	<?php for($i=0; $i < count($content['field_ads_item']['#items']); $i++) : ?>
        <!-- ITEM -->
        <div class="accessories-item">
            <img src="<?php print file_create_url($content['field_ads_item'][$i]['entity']['field_collection_item'][$content['field_ads_item']['#items'][$i]['value']]['field_ads_image']['#items'][0]['uri']); ?>" alt="">
            <?php if(isset($content['field_ads_item'][$i]['entity']['field_collection_item'][$content['field_ads_item']['#items'][$i]['value']]['field_ads_text'])) : ?>
                <div class="text">
                    <p><?php print $content['field_ads_item'][$i]['entity']['field_collection_item'][$content['field_ads_item']['#items'][$i]['value']]['field_ads_text']['#items'][0]['value']; ?></p>
                </div>
            <?php endif; ?>
        </div>	
        <!-- END ITEM -->
    <?php endfor; ?>
</div>
<?php elseif($content['field_ads_display']['#items'][0]['value'] == "type2") : ?>
<div class="photo-slide">
    <div id="photo_slide">
        <?php for($i=0; $i < count($content['field_ads_item']['#items']); $i++) : ?>
            <!-- ITEM -->
            <img src="<?php print file_create_url($content['field_ads_item'][$i]['entity']['field_collection_item'][$content['field_ads_item']['#items'][$i]['value']]['field_ads_image']['#items'][0]['uri']); ?>" alt="">
            <?php if(isset($content['field_ads_item'][$i]['entity']['field_collection_item'][$content['field_ads_item']['#items'][$i]['value']]['field_ads_text'])) : ?>
                <div class="text">
                    <p><?php print $content['field_ads_item'][$i]['entity']['field_collection_item'][$content['field_ads_item']['#items'][$i]['value']]['field_ads_text']['#items'][0]['value']; ?></p>
                </div>
            <?php endif; ?>
            <!-- END ITEM -->
        <?php endfor; ?>
    </div>
</div>
<?php endif; ?>