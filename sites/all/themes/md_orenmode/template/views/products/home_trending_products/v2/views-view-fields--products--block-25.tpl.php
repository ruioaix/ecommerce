<!-- ITEM -->
<div class="trend-rated-item ">
    <div class="img">
        <a href="<?php print $fields['path']->content;?>"><img src="<?php print $fields['field_product_thumbnail']->content;?>" alt=""></a>
    </div>
    <div class="text text-right">
        <h2><a href="<?php print $fields['path']->content;?>"><?php print $fields['title']->content;?></a></h2>
        <div class="price-box"> 
            <p class="special-price">
                <span class="price"><?php print $fields['commerce_price']->content;?></span> 
            </p>   
        </div>
    </div>
</div>	
<!-- END ITEM -->