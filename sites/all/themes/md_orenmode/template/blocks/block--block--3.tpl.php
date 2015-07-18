<div class="col-xs-6 col-md-<?php print theme_get_setting('footer_column','md_orenmode'); ?> <?php print $classes; ?>" <?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <?php if ($block->subject): ?>
      <h2 class="title-f"><?php print $block->subject; ?></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <?php print render($content); ?>
</div>