<div class="block <?php print $classes; ?>" <?php print $attributes; ?>>
    <?php print render($title_prefix); ?>
	<?php if ($block->subject): ?>
        <h2><?php print $block->subject; ?></h2>
    <?php endif; ?>
    <?php print render($title_suffix); ?>
    <div class="block-item">
		<?php print render($content); ?>
    </div>
</div>