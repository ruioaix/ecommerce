<div class="col-xs-6 col-sm-4 col-md-3">
  	<!-- GRID ITEM -->
    <div class="grid-item _3 ">
        <div class="image">
            <a href="<?php print $fields['path']->content;?>">
                <img src="<?php print $fields['field_product_thumbnail']->content;?>" alt="">
            </a>     
            <div class="rating-view">
                <a href="<?php print $fields['path']->content;?>" class="btn btn-16"><i class="fa fa-eye"></i></a>
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
            <div class="action">
                <?php if(user_is_logged_in()) : ?>
                    <span class="wishlist btn btn-12 round"><?php print flag_create_link('bookmark', $fields['nid']->content); ?></span>
                <?php else : ?>
                    <a href="<?php print base_path().'user'; ?>" class="btn btn-12 round"><i class="fa fa-heart-o"></i></a>
                <?php endif; ?>
                <a href="#" class="btn btn-16 add-cart text-uppercase"><i class="fa fa-cart-plus"></i><?php print $fields['add_to_cart_form']->content;?></a>
                <?php if(user_is_logged_in()) : ?>
                    <span class="compare btn btn-12 round"><?php print flag_create_link('compare', $fields['nid']->content); ?></span>
                <?php else : ?>
                    <a href="<?php print base_path().'user'; ?>" class="btn btn-12 round"><i class="fa fa-refresh"></i></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- END GRID ITEM -->
</div>