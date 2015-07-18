<?php if ($header): ?>
  <div class="title-trend-rated">
    <?php print $header; ?>
  </div>
<?php endif; ?>
<?php if ($rows): ?>
  <?php print $rows; ?>
<?php elseif ($empty): ?>
  <div class="view-empty">
    <?php print $empty; ?>
  </div>
<?php endif; ?>