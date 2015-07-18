<!-- WIDGET CATEGORIES -->
<aside class="widget widget_recent_entries sidebar sidebar-cat <?php print theme_get_setting('layout_type','md_orenmode'); ?> <?php print $classes; ?>" <?php print $attributes; ?>>  
    <?php print render($title_prefix); ?>
	<?php if ($block->subject): ?>
        <?php
			$ARR_title = explode(" ", $block->subject);
			if(sizeof($ARR_title) > 1 ) :
				$ARR_title[0] = "<span>".$ARR_title[0]."</span>";
				$title = implode(" ", $ARR_title);
			endif;
		?>
        <h2 class="sidebar-title"><?php print $title; ?></h2>
    <?php endif; ?>
    <?php print render($title_suffix); ?>
    <div class="content">
		<?php print render($content); ?>
    </div>
</aside>
<!-- END WIDGET CATEGORIES -->