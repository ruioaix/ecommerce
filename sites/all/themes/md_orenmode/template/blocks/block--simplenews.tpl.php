<div class="col-xs-6 col-md-<?php print theme_get_setting('footer_column','md_orenmode'); ?> <?php print $classes; ?>" <?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <?php if ($block->subject): ?>
      <h2 class="title-f"><?php print $block->subject; ?></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <div class="letter-from">
  	<?php print render($content); ?>
  </div>
  <div class="follow-f">
      <h2 class="title-f"><?php print t('Follow us'); ?></h2>
      <div class="follow-sc">
          <?php
			  $ft_social = theme_get_setting('ft_social','md_orenmode');
			  if(isset($ft_social)) :
				  foreach($ft_social as $key => $value) :
					  print '<a href="'. $ft_social[$key]['link'] .'"><i class="fa '. $ft_social[$key]['icon']['icon'] .'"></i></a>';
				  endforeach;
			  endif;
		  ?>
      </div>
  </div>
</div>