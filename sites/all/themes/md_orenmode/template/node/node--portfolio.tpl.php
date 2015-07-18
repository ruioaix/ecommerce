<div class="portfolio-dt">
	<div class="portfolio-dt-cn">
          <div class="portfolio-slide" id="portfolio-slide">
              <?php if(count($node->field_portfolio_multimedia['und']) == 1) : ?>
				  <?php if(render($content['field_portfolio_multimedia'][0]['#bundle']) == 'image') : ?>
                      <img src="<?php print file_create_url(render($content['field_portfolio_multimedia'][0]['file']['#item']['uri'])); ?>" alt="">
                  <?php elseif(render($content['field_portfolio_multimedia'][0]['#bundle']) == 'video') : ?>
                      <?php
                          if(render($content['field_portfolio_multimedia'][0]['file']['#files'][0]['filemime']) == "video/vimeo") :
                              $uri = explode('v/',render($content['field_portfolio_multimedia'][0]['file']['#uri']));
                              print '<iframe src="http://player.vimeo.com/video/'. $uri[1].'?title=0&amp;byline=0&amp;portrait=0&amp;color=ec155a" height="600"></iframe>';
                          else :
                              $uri = explode('v/',render($content['field_portfolio_multimedia'][0]['file']['#files'][0]['uri']));
                              print '<iframe src="http://www.youtube.com/embed/'. $uri[1].'?feature=oembed" height="600"></iframe>';
                          endif;
                      ?>
                  <?php elseif(render($content['field_portfolio_multimedia'][0]['#bundle']) == 'audio') : ?>
                      <?php print render($content['field_portfolio_multimedia']);?>
                  <?php endif; ?>
              <?php else : ?>
				  <?php for($i=0; $i < count($node->field_portfolio_multimedia['und']); $i++) : ?>
                      <?php if(render($content['field_portfolio_multimedia'][$i]['file']['#item']['type']) == 'image') : ?>
                          <img src="<?php print file_create_url(render($content['field_portfolio_multimedia'][$i]['file']['#item']['uri'])); ?>" alt="">
                      <?php endif; ?>
                  <?php endfor; ?>
              <?php endif; ?>
          </div>
          <div class="row">
              <div class="col-sm-6 col-md-7">
                  <div class="portfolio-text">
                      <h2><?php print t('Project Desciption'); ?></h2>
                      <?php print render($content['field_portfolio_description']['#items'][0]['value']); ?>
                  </div>
              </div>
              <div class="col-sm-6 col-md-5">
                  <div class="portfolio-info">
                      <h2><?php print t('Project Info'); ?></h2>
                      <ul>
						<li>
							<span class="label-inf"><i class="fa fa-user"></i> <?php print t('Client'); ?>:</span>
							<p><a href=""><?php print render($content['field_portfolio_client']['#items'][0]['value']); ?></a></p>
						</li>
						<li>
							<span class="label-inf"><i class="fa fa-calendar-o"> </i> <?php print t('Created on'); ?>:</span>
							<p><?php print format_date($node->created, 'custom', 'd/m/Y'); ?></p>
						</li>
						<li>
							<span class="label-inf"><i class="fa fa-file-text-o"></i> <?php print t('Skills'); ?>:</span>
							<p>
                            	<?php $skills = array();?>
                                <?php if (isset($content['field_portfolio_skills']['#items'])): ?>
                                  <?php foreach ($content['field_portfolio_skills']['#items'] as $item): ?>
                                    <?php $skills[] =  $item['value']; ?>
                                  <?php endforeach; ?>
                                <?php endif;?>
                                <?php print implode(" / ", $skills); ?>
                            </p>
						</li>
						<li>
							<span class="label-inf"><i class="fa fa-tag"></i> <?php print t('Categories'); ?>:</span>
							<p>
                            	<?php $categories = array();?>
                                <?php if (isset($content['field_portfolio_categories']['#items'])): ?>
                                  <?php foreach ($content['field_portfolio_categories']['#items'] as $item): ?>
                                    <?php $categories[] =  l($item['taxonomy_term']->name, 'taxonomy/term/' . $item['tid']); ?>
                                  <?php endforeach; ?>
                                <?php endif;?>
                                <?php print implode(", ", $categories); ?>
                            </p>
						</li>
						<li>
							<span class="label-inf"><i class="fa fa-link"></i> <?php print t('Live Demo'); ?></span>
							<p><a href="<?php print render($content['field_portfolio_link']['#items'][0]['value']); ?>" target="_blank"><?php print render($content['field_portfolio_link']['#items'][0]['value']); ?></a></p>
						</li>
					  </ul>
                      <div class="portfolio-social">
						<?php print t('Share on'); ?>: 
						<a href="#" class="_1"><i class="fa fa-facebook"></i></a>
						<a href="#" class="_2"><i class="fa fa-twitter"></i></a>
						<a href="#" class="_3"><i class="fa fa-youtube"></i></a>
						<a href="#" class="_4"><i class="fa fa-skype"></i></a>
						<a href="#" class="_5"><i class="fa fa-pinterest"></i></a>
					  </div>
                  </div>
              </div>
          </div>
      </div>
</div>