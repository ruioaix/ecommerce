<div class="blog">
    <!-- SINGLE POST -->
    <div class="post post-single ">
        <div class="entry-header">
            <div class="entry-photo-slide">
               <?php if(count($node->field_blog_multimedia['und']) == 1) : ?>
                  <?php if(render($content['field_blog_multimedia'][0]['#bundle']) == 'image') : ?>
                      <img src="<?php print file_create_url(render($content['field_blog_multimedia'][0]['file']['#item']['uri'])); ?>" alt="">
                  <?php elseif(render($content['field_blog_multimedia'][0]['#bundle']) == 'video') : ?>
                      <?php
                          if(strpos($content['field_blog_multimedia'][0]['file']['#uri'], 'vimeo') !== FALSE) :
							  $uri = explode('v/',$content['field_blog_multimedia'][0]['file']['#uri']);
							  print '<iframe src="http://player.vimeo.com/video/'. $uri[1].'?title=0&amp;byline=0&amp;portrait=0&amp;color=ec155a" height="460"></iframe>';
						  else :
							  $uri = explode('v/',$content['field_blog_multimedia'][0]['file']['#uri']);
							  print '<iframe src="http://www.youtube.com/embed/'. $uri[1].'?feature=oembed" height="460"></iframe>';
						  endif;
                      ?>
                  <?php elseif(render($content['field_blog_multimedia'][0]['#bundle']) == 'audio') : ?>
                      <?php print render($content['field_blog_multimedia']);?>
                  <?php endif; ?>
                <?php else : ?>
                  <?php for($i=0; $i < count($node->field_blog_multimedia['und']); $i++) : ?>
                      <?php if(render($content['field_blog_multimedia'][$i]['file']['#item']['type']) == 'image') : ?>
                          <img src="<?php print file_create_url(render($content['field_blog_multimedia'][$i]['file']['#item']['uri'])); ?>" alt="">
                      <?php endif; ?>
                  <?php endfor; ?>
                <?php endif; ?>
            </div>
            <h1 class="entry-title"><?php print $node->title; ?></h1>
            <ul class="entry-meta">
                <li class="post-date"><?php print format_date($node->created, 'custom', 'd M'); ?><span><?php print format_date($node->created, 'custom', 'Y'); ?></span></li>
                <li class="post-author"><?php print t('By'); ?> <a href="#"><?php print $node->name; ?></a></li>
                <li class="post-comment">
                    <a href="#">
                        <img src="<?php print base_path().path_to_theme() ?>/images/icon-comment.png" alt="">
                        <span><?php print $node->comment_count; ?></span>
                    </a>
                </li>
                <li class="post-share">
                    <img src="<?php print base_path().path_to_theme() ?>/images/icon-share.png" alt="">
                    <div class="share-list">
                        <a href="#" class="_1"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="_2"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="_3"><i class="fa fa-youtube"></i></a>
                        <a href="#" class="_4"><i class="fa fa-linkedin"></i></a>
                    </div>
                </li>
            </ul>
            <div class="entry-content">
                <?php print render($content['body']['#items'][0]['value']); ?>
            </div>
        </div>
    </div>
    <!-- END SINGLE POST -->
    <?php print render($content['comments']); ?>
</div>