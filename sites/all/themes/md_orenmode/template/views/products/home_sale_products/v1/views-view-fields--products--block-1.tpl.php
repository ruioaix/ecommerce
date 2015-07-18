<!-- GRID ITEM -->
<div class="grid-item _1 ">
    <div class="image">
        <a href="<?php print $fields['path']->content;?>">
            <img src="<?php print $fields['field_product_thumbnail']->content;?>" alt="">
        </a>
        <div class="action">
            <div class="group">
                <div class="add-to-cart"><i class="fa fa-cart-plus"></i><?php print $fields['add_to_cart_form']->content;?></div>
                <?php if(user_is_logged_in()) : ?>
                	<span class="wishlist"><?php print flag_create_link('bookmark', $fields['nid']->content); ?></span>
                	<span class="compare"><?php print flag_create_link('compare', $fields['nid']->content); ?></span>
              	<?php else : ?>
                	<a href="<?php print base_path().'user'; ?>"><i class="fa fa-heart-o"></i></a>
                	<a href="<?php print base_path().'user'; ?>"><i class="fa fa-refresh"></i></a>
              	<?php endif; ?>
                <a href="<?php print $fields['path']->content;?>"><i class="fa fa-eye"></i></a>
            </div>
            <div class="rating">
                <span class="star">
                    <i class="fa <?php ($row->field_field_product_rating[0]['raw']['average'] >= 20) ? print 'fa-star' : print 'fa-star-o'; ?>"></i>
                    <i class="fa <?php ($row->field_field_product_rating[0]['raw']['average'] >= 40) ? print 'fa-star' : print 'fa-star-o'; ?>"></i>
                    <i class="fa <?php ($row->field_field_product_rating[0]['raw']['average'] >= 60) ? print 'fa-star' : print 'fa-star-o'; ?>"></i>
                    <i class="fa <?php ($row->field_field_product_rating[0]['raw']['average'] >= 80) ? print 'fa-star' : print 'fa-star-o'; ?>"></i>
                    <i class="fa <?php ($row->field_field_product_rating[0]['raw']['average'] >= 100) ? print 'fa-star' : print 'fa-star-o'; ?>"></i>
                </span>
                <?php print $fields['comment_count']->content;?> <?php print t('Review(s)'); ?>
            </div>
        </div>
    </div>
    <div class="text">
        <h2 class="name">
            <a href="<?php print $fields['path']->content;?>"><?php print $fields['title']->content;?></a>	
        </h2>	
        <div class="price-box"> 
            <p class="special-price">
                <span class="price"><?php print $fields['commerce_price']->content;?></span> 
            </p>   
        </div>
    </div>
</div>
<!-- END GRID ITEM -->