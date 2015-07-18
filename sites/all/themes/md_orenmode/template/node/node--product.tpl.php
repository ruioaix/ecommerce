<!-- PRODUCT DETAIL -->
<section class="product-detail _1 ">
  <div class="container">
    <div class="row">
      <div class="col-l text-center">
        <?php print render($content['product:field_product_gallery']); ?>
      </div>
      <div class="col-r">
        <div class="product-text">
          <h1 class="name"><?php print $title; ?></h1>
          <div class="product_review">
            <?php print render($content['field_product_rating']); ?>
            <ul class="review_text">
              <li><a href="#"><span>(<?php print $node->comment_count; ?>)</span><?php print t('Reviews'); ?></a></li>
              <li><a href="#tabs-responsive"><?php print t('Add reviews'); ?></a></li>
            </ul>
          </div>
          <?php if (isset($content['field_product_available']['#items'][0]['value']) && $content['field_product_available']['#items'][0]['value']): ?>
            <span class="product_stock"><?php print t('Available in stock'); ?></span>
          <?php else : ?>
          	<span class="product_stock out-stock"><?php print t('Unavailable in stock'); ?></span>
          <?php endif; ?>
          <span class="product_sku"><?php print render($content['product:sku']); ?></span></span>
          <div class="hr _1"></div>
          <div class="price-box"> 
            <?php for($i=0; $i < count($node->field_product_ref['und']); $i++) : ?>
                <?php $product = commerce_product_load((int)$node->field_product_ref['und'][$i]['product_id']);	?>
                <div class="product-price product-price-<?php print $product->field_product_colors['und'][0]['tid']; ?>-<?php print $product->field_product_size['und'][0]['tid']; ?>" <?php if($i > 0) print 'style="display:none"'; ?>>
                    <p class="special-price">
                      <span class="price">
					  	<?php print commerce_currency_format($product->commerce_price['und'][0]['amount'], $product->commerce_price['und'][0]['currency_code']); ?>
                      </span> 
                    </p> 
                    <p class="old-price"> 
                      <span class="price">
					  	<?php if(isset($product->field_old_price['und'])) : ?>
							<?php print commerce_currency_format($product->field_old_price['und'][0]['amount'], $product->field_old_price['und'][0]['currency_code']); ?>
                        <?php endif; ?>
                      </span> 
                    </p>
                </div>
            <?php endfor; ?>
          </div>

          <div class="short-description">
            <?php print render($content['field_product_short_description']); ?>
          </div>

          <div class="hr _1"></div>

          <?php print render($content['field_product_ref']); ?>

        </div>
      </div>
    </div>

    <div class="product-collateral" id="tabs-responsive">
      <ul class="nav-tab">
        <li class="active"><a href="#description" aria-controls="description" data-toggle="tab"><?php print t('Product Description'); ?></a></li>
        <li><a href="#information" aria-controls="information" data-toggle="tab"><?php print t('Information'); ?></a></li>
        <li><a href="#customer" aria-controls="customer" data-toggle="tab"><?php print t("Customer Reviews ($node->comment_count)"); ?></a></li>
        <li><a href="#shipping" aria-controls="shipping" data-toggle="tab"><?php print t('Shipping &amp; Returns'); ?></a></li>
      </ul>

      <div class="tab-content">
        <div class="tab-pane" id="description">
          <div class="text-content">
            <?php print render($content['body']); ?>
          </div>
        </div>
        <div class="tab-pane" id="information">
          <div class="text-content">
            <?php print render($content['field_product_information']); ?>
          </div>
        </div>
        <div class="tab-pane" id="customer">
          <div class="text-content">
            <?php print render($content['comments']); ?>
          </div>
        </div>
        <div class="tab-pane" id="shipping">
          <div class="text-content">
            <?php print render($content['field_product_policy']); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- END PRODUCT DETAIL -->

<!-- PRODUCT RELATED -->
<section class="product-related">
  <div class="container">
    <div class="heading _1 text-center">
      <h2 class="text-uppercase"><?php print t('Related Products'); ?></h2>
    </div>
    <div class="related-cn _1">
      <div class="row">
        <?php print views_embed_view('product_relate', 'block'); ?>
      </div>
    </div>
  </div>
</section>
<!-- END PRODUCT RELATED -->