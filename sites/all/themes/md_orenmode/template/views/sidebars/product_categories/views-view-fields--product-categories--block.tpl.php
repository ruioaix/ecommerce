<?php $count_categories = orenmode_config_count_node_by_product_categories(); ?>
<li>
  <a href="<?php print url('taxonomy/term/' . $fields['tid']->content); ?>">
    <?php print $fields['name']->content;?> (<?php print isset($count_categories[$fields['tid']->content]) ? $count_categories[$fields['tid']->content] : 0 ;?>)
  </a>
</li>