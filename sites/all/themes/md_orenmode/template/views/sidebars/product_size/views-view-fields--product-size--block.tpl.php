<?php $count_size = orenmode_config_count_node_by_product_size(); ?>
<li>
  <a href="<?php print url('taxonomy/term/' . $fields['tid']->content); ?>">
    <?php print $fields['name']->content; ?> (<?php print isset($count_size[$fields['tid']->content]) ? $count_size[$fields['tid']->content] : 0 ; ?>)
  </a>
</li>