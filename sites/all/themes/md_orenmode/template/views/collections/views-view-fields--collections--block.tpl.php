<div class="col-xs-6 col-md-4">
    <!-- COLLECTION ITEM -->
    <div class="collection-item">
        <div class="text">
            <h2><?php print $fields['name']->content;?></h2>
            <div class="hr"></div>
            <a href="<?php print url('taxonomy/term/' . $fields['tid']->content); ?>" class="btn btn-14 text-uppercase"><?php print t('View Collection'); ?></a>
        </div>
        <div class="img">
            <img src="<?php print $fields['field_collections_image']->content;?>" alt="">
        </div>
    </div>
    <!-- END COLLECTION ITEM -->
</div>