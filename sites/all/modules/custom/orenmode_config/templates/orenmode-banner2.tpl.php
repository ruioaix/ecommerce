<?php
$hd_image_slide = theme_get_setting('hd_2_image_slide','md_orenmode');
?>
<div class="slide-watch-cn" id="slide-watch">
    <?php
		foreach ($hd_image_slide as $key => $value) :
		  $explode = explode("_", $key);
		  end($explode);
		  $num = current($explode);
		  if ($hd_image_slide[$key]['image'] != null && $hd_image_slide[$key]['image'] != 0) :
			// Load file from fid
			$file = file_load($hd_image_slide[$key]['image']);
			if ($file) :
	?>
    			<!-- SLIDE ITEM -->
                <div class="item <?php print $hd_image_slide[$key]['align']; ?>">
                    <div class="text">
                        <h2><?php print $hd_image_slide[$key]['subtitle']; ?></h2>
                        <p><?php print $hd_image_slide[$key]['title']; ?></p>
                        <?php if($hd_image_slide[$key]['link_label'] || $hd_image_slide[$key]['link_label_2']) : ?>
                            <div class="group">
                                <a href="<?php print $hd_image_slide[$key]['link']; ?>" class="btn btn-9"><?php print $hd_image_slide[$key]['link_label']; ?></a>
                                <a href="<?php print $hd_image_slide[$key]['link_2']; ?>" class="btn btn-9"><?php print $hd_image_slide[$key]['link_label_2']; ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                    <img src="<?php print file_create_url($file->uri); ?>" alt="">
                </div>	
                <!-- SLIDE ITEM -->
    <?php
			endif;
		  endif;
		endforeach;
	?>
</div>