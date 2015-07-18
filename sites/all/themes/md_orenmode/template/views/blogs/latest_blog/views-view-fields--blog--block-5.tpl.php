<li>
    <a href="<?php print $fields['path']->content;?>" class="post-thumb">
        <img src="<?php print $fields['field_blog_thumbnail']->content; ?>" alt="">
    </a>
    <a href="<?php print $fields['path']->content;?>" class="post-name"><?php print $fields['title']->content;?></a>
    <span class="post-date"><?php print $fields['created']->content;?></span>
</li>