<div class="container">
    <div class="parallax-video-cn">
        <p>
			<?php if(isset($content['field_parallax_text'])): ?>
				<?php print $content['field_parallax_text']['#items'][0]['value']; ?>
            <?php endif; ?>
        </p>
    </div>
</div>
<div class="overlay"></div>
<div class="bg-video" style="background-image:url(<?php print file_create_url($content['field_parallax_image']['#items'][0]['uri']); ?>)"></div>