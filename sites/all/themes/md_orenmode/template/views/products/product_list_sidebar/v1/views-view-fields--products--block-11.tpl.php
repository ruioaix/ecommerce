<!-- ITEM -->
<div class="list-item  _1">
  <div class="image">
      <a href="<?php print $fields['path']->content;?>">
          <img src="<?php print $fields['field_product_thumbnail']->content;?>" alt="">
      </a>
      <?php if($fields['field_product_group']->content == "new") : ?>
        <span class="state-box _4"><?php print $fields['field_product_group']->content; ?></span>
      <?php endif; ?>
  </div>
  <div class="text">
      <h2 class="name">
          <a href="<?php print $fields['path']->content;?>"><?php print $fields['title']->content;?></a>
      </h2>
      <div class="rating">
          <span class="star">
              <i class="fa <?php ($row->field_field_product_rating[0]['raw']['average'] >= 20) ? print 'fa-star' : print 'fa-star-o'; ?>"></i>
              <i class="fa <?php ($row->field_field_product_rating[0]['raw']['average'] >= 40) ? print 'fa-star' : print 'fa-star-o'; ?>"></i>
              <i class="fa <?php ($row->field_field_product_rating[0]['raw']['average'] >= 60) ? print 'fa-star' : print 'fa-star-o'; ?>"></i>
              <i class="fa <?php ($row->field_field_product_rating[0]['raw']['average'] >= 80) ? print 'fa-star' : print 'fa-star-o'; ?>"></i>
              <i class="fa <?php ($row->field_field_product_rating[0]['raw']['average'] >= 100) ? print 'fa-star' : print 'fa-star-o'; ?>"></i>
          </span>
          <?php print $fields['comment_count']->content;?> <?php print t('Review(s)'); ?>
          <small>|</small>
          <a href="#"><?php print t('Add reviews'); ?></a>
      </div>
      <?php if($fields['field_product_available']->content) : ?>
        <div class="stock">
            <?php print t('Available in stock'); ?>
        </div>
      <?php endif; ?>
      <div class="hr _1"></div>
      <div class="sku">
          <?php print t('SKU'); ?>: <span>#<?php print $fields['sku']->content; ?></span>
      </div>
      <div class="desc">
          <p>
              <?php print $fields['field_product_short_description']->content; ?>
          </p>
      </div>
      <div class="group">
          <div class="price-box"> 
              <p class="special-price">
                  <span class="price"><?php print $fields['commerce_price']->content;?></span> 
              </p> 
              <?php if($fields['field_old_price']->content) : ?>
                  <p class="old-price"> 
                      <span class="price"><?php print $fields['field_old_price']->content; ?></span> 
                  </p>
              <?php endif; ?>     
          </div>
          <div class="action">
              <a href="#" class="btn btn-2 btn-add-cart text-uppercase"><i class="fa fa-cart-plus"></i> <?php print $fields['add_to_cart_form']->content;?></a>
              <?php if(user_is_logged_in()) : ?>
                    <span class="wishlist btn btn-13">
						<?php print flag_create_link('bookmark', $fields['nid']->content); ?>
                    </span>
              		<span class="compare btn btn-13">
						<?php print flag_create_link('compare', $fields['nid']->content); ?>
                    </span>
              <?php else : ?>
                    <a href="<?php print base_path().'user'; ?>" class="btn btn-13"><i class="fa fa-heart-o"></i> <span><?php print t('Add to WishList'); ?></span></a>
                    <a href="<?php print base_path().'user'; ?>" class="btn btn-13"><i class="fa fa-refresh"></i> <span><?php print t('Add to Compare'); ?></span></a>
              <?php endif; ?>
          </div>
          <div class="share">
              <span><?php print t('Share'); ?>:</span>
              <a href="http://www.facebook.com/sharer.php?u=<?php print $fields['path']->content; ?>&t=<?php print $fields['title']->content; ?>" class="_1"><i class="fa fa-facebook-square"></i></a>
              <a href="http://twitter.com/home?status=<?php print $fields['title']->content; ?> <?php print $fields['path']->content; ?>" class="_2"><i class="fa fa-twitter-square"></i></a>
              <a href="http://google.com/bookmarks/mark?op=edit&amp;bkmk=<?php print $fields['path']->content; ?>/&amp;title=<?php print $fields['title']->content; ?>" class="_3"><i class="fa fa-pinterest-square"></i></a>
          </div>
      </div>
  </div>
</div>
<!-- END ITEM -->