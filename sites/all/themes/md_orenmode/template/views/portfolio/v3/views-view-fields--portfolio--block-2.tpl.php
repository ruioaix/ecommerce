<!-- portfolio -->
<div class="col-xs-6 col-sm-6 col-md-4" data-content="#colio_<?php print $fields['nid']->content;?>">
    <div class="portfolio-item _3">

        <div class="img">
            <a href="<?php print $fields['path']->content;?>">
                <img src="<?php print $fields['field_portfolio_thumbnail']->content;?>" alt="">
            </a>

            <a href="#" class="quick-view portfolio-link"><i class="fa fa-search"></i></a>

            <div class="text">
                <h2><a href="<?php print $fields['path']->content;?>"><?php print $fields['title']->content;?></a></h2>
                <p><?php print $fields['field_portfolio_categories']->content;?></p>
            </div>

        </div>

    </div>
</div>
<!-- END portfolio -->
<div id="colio_<?php print $fields['nid']->content;?>" class="colio-content"><div class="container">
	<div class="quick-view-cn">
		<div class="row">

			<div class="col-sm-7">
				<div class="portfolio-text">
					<h2><?php print t('Project Desciption'); ?></h2>
					<?php print $fields['field_portfolio_description']->content;?>
				</div>
			</div>

			<div class="col-sm-5">
				<div class="portfolio-info">
					<h2><?php print t('Project Info'); ?></h2>
					<ul>
						<li>
							<span class="label-inf"><i class="fa fa-user"></i> <?php print t('Client'); ?>:</span>
							<p><a href=""><?php print $fields['field_portfolio_client']->content;?></a></p>
						</li>
						<li>
							<span class="label-inf"><i class="fa fa-calendar-o"> </i> <?php print t('Created on'); ?>:</span>
							<p><?php print $fields['created']->content;?></p>
						</li>
						<li>
							<span class="label-inf"><i class="fa fa-file-text-o"></i> <?php print t('Skills'); ?>:</span>
							<p><?php print $fields['field_portfolio_skills']->content;?></p>
						</li>
						<li>
							<span class="label-inf"><i class="fa fa-tag"></i> <?php print t('Categories'); ?>:</span>
							<p><?php print $fields['field_portfolio_categories']->content;?></p>
						</li>
						<li>
							<span class="label-inf"><i class="fa fa-link"></i> <?php print t('Live Demo'); ?></span>
							<p><a href="<?php print $fields['field_portfolio_link']->content;?>" target="_blank"><?php print $fields['field_portfolio_link']->content;?></a></p>
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
</div></div>