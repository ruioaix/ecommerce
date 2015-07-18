<section class="partner partner-list <?php print $classes; ?>" <?php print $attributes; ?>>
    <div class="container">
        <?php print render($title_prefix); ?>
        <?php if ($block->subject): ?>
            <div class="heading _1 text-center">
                <h2 class="text-uppercase"><?php print $block->subject; ?></h2>
            </div>
        <?php endif; ?>
        <?php print render($title_suffix); ?>
        <div class="partner-cn _1">
            <?php print render($content); ?>         
        </div>
    </div>
</section>