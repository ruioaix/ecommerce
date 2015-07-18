<?php
/**
 * @file
 * Default simple view template to display a list of summary lines.
 *
 * @ingroup views_templates
 */
?>
<ul>
  <?php foreach ($rows as $id => $row): ?>
    <li>
    	<a href="<?php print base_path().'blog-archives/'.$row->created_year_month; ?>"<?php print !empty($row_classes[$id]) ? ' class="' . $row_classes[$id] . '"' : ''; ?>>
			<?php print $row->link; ?> <?php if (!empty($options['count'])): ?><span>(<?php print $row->count?>)</span><?php endif; ?>
        </a>
    </li>
  <?php endforeach; ?>
</ul>