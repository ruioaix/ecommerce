<!-- POST ITEM -->
<div class="col-md-4 three-cols">
  <div class="post">
      <div class="entry-header">
          <ul class="entry-meta">
              <li class="post-date"><?php print $fields['created']->content;?><span><?php print $fields['created_1']->content;?></span></li>
              <li class="post-author"><?php print t('By');?> <a href="#"><?php print $fields['name']->content;?></a></li>
              <li class="post-comment">
                  <a href="#">
                      <img src="<?php print base_path().path_to_theme() ?>/images/icon-comment.png" alt="">
                      <span><?php print $fields['comment_count']->content;?></span>
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
          <div class="entry-photo-slide">
              <?php if(count($row->field_field_blog_multimedia) == 1) : ?>
                  <?php if($row->field_field_blog_multimedia[0]['rendered']['#file']->type == 'image') : ?>
                      <img src="<?php print image_style_url('blog_thumbnail_347x153', $row->field_field_blog_multimedia[0]['rendered']['#file']->uri); ?>" alt="">
                  <?php elseif($row->field_field_blog_multimedia[0]['rendered']['#file']->type == 'video') : ?>
                      <?php
                          if($row->field_field_blog_multimedia[0]['rendered']['#file']->filemime == "video/vimeo") :
                              $uri = explode('v/',$row->field_field_blog_multimedia[0]['rendered']['#file']->uri);
                              print '<iframe src="http://player.vimeo.com/video/'. $uri[1].'?title=0&amp;byline=0&amp;portrait=0&amp;color=ec155a" height="153"></iframe>';
                          else :
                              $uri = explode('v/',$row->field_field_blog_multimedia[0]['rendered']['#file']->uri);
                              print '<iframe src="http://www.youtube.com/embed/'. $uri[1].'?feature=oembed" height="153"></iframe>';
                          endif;
                      ?>
                  <?php elseif($row->field_field_blog_multimedia[0]['rendered']['#file']->type == 'audio') : ?>
                      <?php print $fields['field_blog_multimedia']->content;?>
                  <?php endif; ?>
              <?php else : ?>
                  <?php for($i=0; $i < count($row->field_field_blog_multimedia); $i++) : ?>
                      <?php if($row->field_field_blog_multimedia[$i]['rendered']['#file']->type == 'image') : ?>
                          <img src="<?php print image_style_url('blog_thumbnail_347x153', $row->field_field_blog_multimedia[$i]['rendered']['#file']->uri); ?>" alt="">
                      <?php endif; ?>
                  <?php endfor; ?>
              <?php endif; ?>
          </div>
          <h2 class="entry-title"><a href="<?php print $fields['path']->content;?>"><?php print $fields['title']->content;?></a></h2>
          <div class="entry-content">
              <p>
                  <?php print $fields['body']->content;?>
              </p>
              <div class="more-link">
                  <a href="<?php print $fields['path']->content;?>"><?php print t('Read more'); ?></a>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- END POST ITEM -->