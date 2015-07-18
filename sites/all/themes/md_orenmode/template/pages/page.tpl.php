<!-- LOADING -->
<div class="loading-container" id="loading">
    <div class="loading-inner">
        <span class="loading-1"></span>
        <span class="loading-2"></span>
        <span class="loading-3"></span>
    </div>
</div>
<!-- END LOADING -->

<div class="wrap-page">

    <!-- HEADER -->
    <header class="header <?php print theme_get_setting('layout_type','md_orenmode'); ?>">
        <div class="container">
            
            <!-- HEADER CONTENT -->
            <div class="header-cn clearfix">

                <?php if($page['header']) : ?>
				  <?php print render($page['header']);  ?>
                <?php endif; ?>

                <!-- LOGO -->
                <div class="logo">
                    <a href="<?php print base_path(); ?>"><img src="<?php ($logo_path) ? print $logo_path : print $logo ; ?>" alt=""></a>
                </div>
                <!-- END LOGO -->

                <!-- MENU BAR -->
                <div id="menu-bar" class="menu-bar ">
                    <span class="one"></span>
                    <span class="two"></span>
                    <span class="three"></span>
                </div>
                <!-- END MENU BAR -->

                <div class="clear"></div>
                
                <?php if($page['menu']):?>
                    <!-- NAVIGATION -->
                    <nav class="navigation">
                        <?php print render($page['menu']);?>
                    </nav>
                    <!-- END NAVIGATION -->
                <?php endif; ?>

            </div>
            <!-- END HEADER CONTENT -->

        </div>
    </header>
    <!-- END HEADER -->
    
    <?php if($page['banner_left']):?>
        <?php if($page['banner_right']):?>
			<div class="col-md-8">
				<?php print render($page['banner_left']);?>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-4">
            	<?php print render($page['banner_right']);?>
            </div>
        <?php else : ?>
        	<?php print render($page['banner_left']);?>
        <?php endif; ?>
    <?php endif; ?>
    
    <!-- BREAKCRUMB -->
    <section class="breakcrumb bg-grey">
        <div class="container">
            <?php
				if($title) :
					print '<h3 class="pull-left">'. $title .'</h3>';
				endif;
			?>
            <?php print $breadcrumb; ?>
        </div>
    </section>
    <!-- END BREAKCRUMB -->

    <section class="product-grid">
		<div class="container">
			<?php print $messages; ?>
            <?php if ($page['sidebar']) : ?>
            	<?php if(theme_get_setting('sidebar_position','md_orenmode') == "left") : ?>
                	<div class="col-md-3">
						<?php print render($page['sidebar']); ?>
                    </div>
				<?php endif; ?>
				<?php if(theme_get_setting('sidebar_position','md_orenmode') != "no") : ?>
                    <div class="col-md-9">
                        <?php print render($tabs); ?>
						<?php print render($page['content']); ?>
                    </div>
                <?php else : ?>
                	<div class="col-md-12">
                        <?php print render($tabs); ?>
						<?php print render($page['content']); ?>
                    </div>
                <?php endif; ?>
                <?php if(theme_get_setting('sidebar_position','md_orenmode') == "right") : ?>
                	<div class="col-md-3">
						<?php print render($page['sidebar']); ?>
                    </div>
				<?php endif; ?>
            <?php else : ?>
            	<?php print render($tabs); ?>
				<?php print render($page['content']); ?>
            <?php endif; ?>
        </div>
    </section>
    
    <?php if ($page['bottom']) : ?>
		<?php print render($page['bottom']); ?>
    <?php endif; ?>

    <!-- FOOTER -->
    <footer class="dark">
        <?php if ($page['footer']) : ?>
            <div class="container">
                <div class="row">
            		<?php print render($page['footer']); ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="footer-b">
            <div class="container">
                <div class="row">
                    
                    <?php if ($page['copyright']) : ?>
                        <?php print render($page['copyright']); ?>
                    <?php endif; ?>

                    <div class="col-md-6 col-md-pull-6 copyright">
                        <p>
                            <?php print theme_get_setting('footer_text','md_orenmode'); ?>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </footer>
    <!-- END FOOTER -->
    
    <!-- SCROLL TOP -->
    <div id="scroll-top" class="<?php print theme_get_setting('layout_type','md_orenmode'); ?>">Scroll Top</div>
    <!-- END SCROLL TOP -->

</div>