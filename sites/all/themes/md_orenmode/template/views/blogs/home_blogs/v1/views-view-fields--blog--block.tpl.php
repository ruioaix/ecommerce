<!-- BLOG ITEM -->
<div class="blog-item ">
    <div class="img">
        <a href="<?php print $fields['path']->content;?>"><img src="<?php print $fields['field_blog_thumbnail']->content;?>" alt=""></a>
        <span class="blog-date"><?php print $fields['created']->content;?></span>
    </div>
    <div class="text">
        <ul class="blog-meta">
            <li>
                <a href="#">
                    <?php print $fields['picture']->content;?>
                    <?php print t('By'); ?> <span><?php print $fields['name']->content;?></span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span><?php print $fields['comment_count']->content;?></span> <?php print t('Comments'); ?>   
                </a>
            </li>
            <li>
                <?php print $fields['field_blog_categories']->content;?>
            </li>
        </ul>
        <h2><a href="<?php print $fields['path']->content;?>"><?php print $fields['title']->content;?></a></h2>
        <p>
            <?php print $fields['body']->content;?>
        </p>
    </div>
</div>
<!-- END BLOG ITEM -->