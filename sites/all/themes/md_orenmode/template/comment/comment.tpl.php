<ul class="commentlist">
    <li class="comment">
        <div class="comment-author">
            <?php if(isset($comment->picture->uri)) : ?>
            	<img src="<?php print image_style_url('avatar_52x62', $comment->picture->uri); ?>" alt="" />
            <?php endif; ?>
        </div>
        <div class="comment-body">
            <cite class="fn"><?php print $content['comment_body']['#object']->name; ?></cite>
            <span class="comment-date"><?php print format_date($comment->created, 'custom', 'F d, Y. h:i A.');?></span>
            <?php
				hide($content['links']);
				hide($content['field_comment_email']);
				print '<p>'.$content['comment_body']['#object']->comment_body['und'][0]['value'].'</p>';
		    ?>
            <div class="comment-f">
                <?php print render($content['links']);?>
            </div>
        </div>
    </li>
</ul>