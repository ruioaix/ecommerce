<?php $count_manufacturer = orenmode_config_count_node_by_product_manufacturer(); ?>
<li>
  <a href="<?php print url('taxonomy/term/' . $fields['tid']->content); ?>">
    <?php print $fields['name']->content; ?> (<?php print isset($count_manufacturer[$fields['tid']->content]) ? $count_manufacturer[$fields['tid']->content] : 0 ; ?>)
  </a>
</li>