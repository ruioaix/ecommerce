<?php $active = array_shift($items); ?>
<div class="product-image">
  <?php if (isset($active)): ?>
    <div class="image-block">
      <a id="view_full_size" class="fancybox" href="<?php print file_create_url($active['#item']['uri']); ?>">
        <img src="<?php print file_create_url($active['#item']['uri']); ?>" alt=""/>
        <span class="view-link"></span>
      </a>
    </div>
  <?php endif; ?>
  <div class="view-block">
    <ul class="thumb_list">
      <li class="active" data-src="<?php print file_create_url($active['#item']['uri']); ?>"><img src="<?php print image_style_url('thumblist_75x75', $active['#item']['uri']); ?>" alt=""/></li>
      <?php foreach ($items as $item): ?>
        <li data-src="<?php print file_create_url($item['#item']['uri']); ?>"><img src="<?php print image_style_url('thumblist_75x75', $item['#item']['uri']); ?>" alt=""/></li>
      <?php endforeach; ?>
    </ul>
  </div>
  <div class="share">
    <span><?php print t('Share'); ?>:</span>
    <a href="#" class="_1"><i class="fa fa-facebook-square"></i></a>
    <a href="#" class="_2"><i class="fa fa-twitter-square"></i></a>
    <a href="#" class="_3"><i class="fa fa-pinterest-square"></i></a>
  </div>
</div>
