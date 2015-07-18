<?php
$hd_image_slide = theme_get_setting('hd_1_image_slide','md_orenmode');
?>
<div class="slide-cn _1" id="slide-home">
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
                <div class="slide-item ">
                    <div class="item-inner">
                        <div class="text <?php if($hd_image_slide[$key]['align'] == "left") print "text-r"; ?>">
                            <h2><?php print $hd_image_slide[$key]['subtitle']; ?></h2>                         
                            <p><?php print $hd_image_slide[$key]['title']; ?></p>
                            <div class="group">
                                <a href="<?php print $hd_image_slide[$key]['link']; ?>" class="btn btn-8"><?php print $hd_image_slide[$key]['link_label']; ?></a>
                            </div>
                        </div>
                        <div class="img <?php if($hd_image_slide[$key]['align'] == "left") print "img-l"; ?>">
                            <img src="<?php print file_create_url($file->uri); ?>" alt="">
                        </div>
                    </div>        
                </div>	
                <!-- SLIDE ITEM -->
    <?php
			endif;
		  endif;
		endforeach;
	?>
</div>