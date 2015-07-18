<?php
$hd_image_slide = theme_get_setting('hd_3_image_slide','md_orenmode');

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
		<a href="<?php print $hd_image_slide[$key]['link']; ?>">
        	<img src="<?php print file_create_url($file->uri); ?>" alt="">
        </a>
        <!-- SLIDE ITEM -->
<?php
	endif;
  endif;
endforeach;
?>