<div class="col-md-6 col-md-push-6 payment-icon <?php print $classes; ?>" <?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <?php if ($block->subject): ?>
      <h2 class="title-f"><?php print $block->subject; ?></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <?php print render($content); ?>
</div>