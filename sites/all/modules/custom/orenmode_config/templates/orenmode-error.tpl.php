<?php
if (theme_get_setting('404_static_image_upload', 'md_orenmode')) :
  $file = json_decode(theme_get_setting('404_static_image_upload', 'md_orenmode'));
endif;
?>
<!-- PAGE 404 -->
<div class="page-404">
    
    <!-- BACKGROUND -->
    <div class="bg-parallax bg-1" style="background-image:url(<?php print $file->url; ?>);"></div>
    <!-- END BACKGROUND -->

    <!-- OVERLAY -->
    <div class="overlay"></div>
    <!-- END OVERLAY -->
    
    <!-- CONTENT -->
    <div class="page-404-cn  text-center">
        <div class="container">
            <h2><?php print theme_get_setting('404_title','md_orenmode'); ?></h2>
            <p>
                <?php print theme_get_setting('404_subtitle','md_orenmode'); ?>
            </p>
            <div class="search-page">
                <?php
				  	$block = module_invoke('search', 'block_view', 'form');
					print render($block['content']);
				?>
            </div>
            <a href="<?php print base_path(); ?>" class="btn btn-10 text-uppercase"><?php print theme_get_setting('404_link','md_orenmode'); ?></a>
        </div>
    </div>
    <!--END CONTENT -->

</div>
<!-- PAGE 404 -->