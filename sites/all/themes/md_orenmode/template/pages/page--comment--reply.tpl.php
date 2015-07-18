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

    <section id="comments">
		<div class="container">
			<?php print $messages; ?>
            <?php print render($page['content']); ?>
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