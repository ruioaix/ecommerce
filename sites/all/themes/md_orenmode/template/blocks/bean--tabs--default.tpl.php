<?php 
	$tab_class = "";
	if($content['field_tabs_display']['#items'][0]['value'] == "tabs") :
		$tab_class = "_1";
	elseif($content['field_tabs_display']['#items'][0]['value'] == "tabs-2") :
		$tab_class = "_2";
	elseif($content['field_tabs_display']['#items'][0]['value'] == "tabs-3") :
		$tab_class = "_3";
	endif;
?>
<?php if($content['field_tabs_display']['#items'][0]['value'] == "tabs" || $content['field_tabs_display']['#items'][0]['value'] == "tabs-2" || $content['field_tabs_display']['#items'][0]['value'] == "tabs-3") : ?>
    <div class="heading-tabs <?php print $tab_class; ?>  text-center">
        <ul>
            <?php for($i=0; $i < count($content['field_tabs_item']['#items']); $i++) : ?>
                <?php if($i==0) : ?>
                    <li class="active"><a href="#<?php print strtolower(str_replace(" ","-",$content['field_tabs_item'][$i]['entity']['field_collection_item'][$content['field_tabs_item']['#items'][$i]['value']]['field_tabs_title']['#items'][0]['value'])); ?>" data-toggle="tab"><?php print $content['field_tabs_item'][$i]['entity']['field_collection_item'][$content['field_tabs_item']['#items'][$i]['value']]['field_tabs_title']['#items'][0]['value']; ?></a></li>
                <?php else : ?>
                    <li><a href="#<?php print strtolower(str_replace(" ","-",$content['field_tabs_item'][$i]['entity']['field_collection_item'][$content['field_tabs_item']['#items'][$i]['value']]['field_tabs_title']['#items'][0]['value'])); ?>" data-toggle="tab"><?php print $content['field_tabs_item'][$i]['entity']['field_collection_item'][$content['field_tabs_item']['#items'][$i]['value']]['field_tabs_title']['#items'][0]['value']; ?></a></li>
                <?php endif; ?>
            <?php endfor; ?>
        </ul>
    </div>
    <div class="tab-content">
        <?php for($i=0; $i < count($content['field_tabs_item']['#items']); $i++) : ?>
            <div class="tab-pane fade <?php if($i==0) print "active"; ?> in hot-deals" id="<?php print strtolower(str_replace(" ","-",$content['field_tabs_item'][$i]['entity']['field_collection_item'][$content['field_tabs_item']['#items'][$i]['value']]['field_tabs_title']['#items'][0]['value'])); ?>">
                <?php print $content['field_tabs_item'][$i]['entity']['field_collection_item'][$content['field_tabs_item']['#items'][$i]['value']]['field_tabs_content']['#markup']; ?>
            </div>
        <?php endfor; ?>
    </div>
<?php elseif($content['field_tabs_display']['#items'][0]['value'] == "col") : ?>
    <?php for($i=0; $i < count($content['field_tabs_item']['#items']); $i++) : ?>
		<div class="col-sm-6 col-lg-4">
			<?php print $content['field_tabs_item'][$i]['entity']['field_collection_item'][$content['field_tabs_item']['#items'][$i]['value']]['field_tabs_content']['#markup']; ?>
        </div>
    <?php endfor; ?>
<?php endif; ?>