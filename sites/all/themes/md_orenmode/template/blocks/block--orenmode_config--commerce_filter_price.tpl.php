<!-- SIDEBAR SLIDER -->
<aside class="sidebar sidebar-slider sidebar-cat _1 <?php print $classes; ?>" <?php print $attributes; ?>>
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
  <?php print render($content); ?>
</aside>
<!-- END SIDEBAR SLIDER -->