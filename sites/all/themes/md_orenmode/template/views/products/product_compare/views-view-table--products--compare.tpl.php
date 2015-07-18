<?php $total = count($rows); ?>
<!-- TABLE CART -->
<table class="table table-compare">
    <tbody>
        <tr>
            <td class="td-caption"></td>
			<?php for($i=0; $i < $total; $i++) : ?>
                <td class="td-compare">
                    <div class="img">
                        <a href="<?php print $rows[$i]['path']; ?>">
                            <img src="<?php print image_style_url('product_thumbnail_150x180', $rows[$i]['field_product_thumbnail']); ?>" alt="">
                        </a>
                    </div>
                    <h2>
                        <a href="<?php print $rows[$i]['path']; ?>"><?php print $rows[$i]['title']; ?></a>
                    </h2>
                    <div class="product_review">
                        <span class="review_star">
                            <?php print $rows[$i]['field_product_rating']; ?>
                        </span>
                        <a href="#"><?php print $rows[$i]['comment_count']; ?> <?php print t('Review(s)'); ?></a>
                    </div>
                    <span class="price"><?php print $rows[$i]['commerce_price']; ?></span>
                    <div class="compare-action">
                        <span class="btn btn-1 add-to-cart"><?php print $rows[$i]['add_to_cart_form']; ?></span>
                        <span class="btn btn btn-17"><?php print flag_create_link('bookmark', $rows[$i]['nid']); ?></span>
                    </div>
                </td>
            <?php endfor; ?>
        </tr>
        <tr>
            <td class="td-caption"><?php print t('Short Description'); ?></td>
            <?php for($i=0; $i < $total; $i++) : ?>
                <td class="td-compare-text">
                    <p><?php print $rows[$i]['field_product_short_description']; ?></p>
                </td>
            <?php endfor; ?>
        </tr>
        <tr>
            <td class="td-caption"><?php print t('SKU'); ?></td>
            <?php for($i=0; $i < $total; $i++) : ?>
                <td class="td-compare-text">
                    <?php print $rows[$i]['sku']; ?>
                </td>
            <?php endfor; ?>
        </tr>
        <tr>
            <td class="td-caption"><?php print t('Color'); ?></td>
            <?php for($i=0; $i < $total; $i++) : ?>
                <td class="td-compare-text">
                    <?php print $rows[$i]['field_product_colors']; ?>
                </td>
            <?php endfor; ?>
        </tr>
        <tr>
            <td class="td-caption"><?php print t('Size'); ?></td>
            <?php for($i=0; $i < $total; $i++) : ?>
                <td class="td-compare-text">
                    <?php print $rows[$i]['field_product_size']; ?>
                </td>
            <?php endfor; ?>
        </tr>
        <tr>
            <td class="td-caption"><?php print t('Remove'); ?></td>
            <?php for($i=0; $i < $total; $i++) : ?>
                <td class="td-compare-text">
                    <?php print $rows[$i]['ops']; ?>
                </td>
            <?php endfor; ?>
        </tr>
    </tbody>
</table>
<!-- END TABLE CART -->