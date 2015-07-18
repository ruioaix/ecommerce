<table class="table table-wishlist">
  <thead>
      <tr>
          <?php foreach ($header as $field => $label): ?>
			<?php if ($field != 'field_product_thumbnail' && $field != 'commerce_price' && $field != 'path' && $field != 'field_product_short_description') : ?>
                <th <?php if ($header_classes[$field]) { print 'class="'. $header_classes[$field] . '" '; } ?> <?php if($field == "title") print 'colspan="2"'; ?>>
				  <?php print $label; ?>
                </th>
            <?php endif; ?>
          <?php endforeach; ?>
      </tr>
  </thead>
  <tbody>
      <?php $i = 0; ?>
	  <?php foreach ($rows as $row_count => $row): ?>
        <tr <?php if ($row_classes[$row_count]) { print 'class="' . implode(' ', $row_classes[$row_count]) .'"';  } ?>>
          <?php foreach ($row as $field => $content): ?>
			  <?php if ($field == 'title') : ?>
                <td class="td-img">
                    <a href="<?php print $rows[$i]['path']; ?>">
                        <img src="<?php print image_style_url('product_thumbnail_150x180', $rows[$i]['field_product_thumbnail']); ?>" alt="">
                    </a>
                </td>
                <td class="td-wishlist">
                  <?php if($field == 'title') : ?>
                  	<h2>
                      <a href="<?php print $rows[$i]['path']; ?>"><?php print $content; ?></a>
                  	</h2>
                  <?php endif; ?>
                  <p><?php print $rows[$i]['field_product_short_description']; ?></p>
                </td>
              <?php endif; ?>
              <?php if ($field == 'add_to_cart_form') : ?>
                <td class="td-action">
                  <span class="price"><?php print $rows[$i]['commerce_price']; ?></span>
                  <?php if ($field == 'add_to_cart_form') : ?><?php print $content; ?><?php endif; ?>
                </td>
              <?php endif; ?>
              <?php if ($field == 'ops') : ?>
                <td class="td-remove">
                  <?php print $content; ?>
                </td>
              <?php endif; ?>
          <?php endforeach; ?>
        </tr>
        <?php $i++; ?>
      <?php endforeach; ?>
  </tbody>
</table>