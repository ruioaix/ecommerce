<?php for($i=0; $i < count($content['field_banner_item']['#items']); $i++) : ?>
	<?php
		$class = $link = $image = "";
		
		if(isset($content['field_banner_item'][$i]['entity']['field_collection_item'][$content['field_banner_item']['#items'][$i]['value']]['field_banner_class'])) :
			$class = $content['field_banner_item'][$i]['entity']['field_collection_item'][$content['field_banner_item']['#items'][$i]['value']]['field_banner_class']['#items'][0]['value'];
		endif;
		
		if(isset($content['field_banner_item'][$i]['entity']['field_collection_item'][$content['field_banner_item']['#items'][$i]['value']]['field_banner_link'])) :
			$link = $content['field_banner_item'][$i]['entity']['field_collection_item'][$content['field_banner_item']['#items'][$i]['value']]['field_banner_link']['#items'][0]['value'];
		endif;
		
		if(isset($content['field_banner_item'][$i]['entity']['field_collection_item'][$content['field_banner_item']['#items'][$i]['value']]['field_banner_image'])) :
			$image = $content['field_banner_item'][$i]['entity']['field_collection_item'][$content['field_banner_item']['#items'][$i]['value']]['field_banner_image']['#items'][0]['uri'];
		endif;
	?>
    <div class="<?php print $class ; ?>">
        <div class="banner-item">
            <a href="<?php print $link; ?>"><img src="<?php print file_create_url($image); ?>" alt=""></a>
        </div>
    </div>
<?php endfor; ?>