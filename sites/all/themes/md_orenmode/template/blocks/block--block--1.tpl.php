<!-- WIDGET FOLLOW -->
<aside class="widget widget_social_icons sidebar sidebar-cat _1 <?php print $classes; ?>" <?php print $attributes; ?>>
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
<!-- END WIDGET FOLLOW -->