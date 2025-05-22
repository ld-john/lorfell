<?php
if ($args['id']) {
    $postID = $args['id'];
} else {
    $postID = get_the_id();
}
$image = get_the_post_thumbnail_url($postID);
?>

<a href="<?php echo get_permalink($postID); ?>" class="max-w-sm w-full lg:max-w-full lg:flex group">
    <?php if($image) { ?>
    <div class="h-36 lg:h-auto lg:w-48 flex-none bg-cover bg-center rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden relative"
         style="background-image: url(<?php echo $image ?>)"
         title="<?php echo get_the_title($postID); ?>"
    >
    </div>
    <?php } ?>
    <div class="fbf-horizontal-card <?php if ($image) { ?> fbf-horizontal-card--image <?php } else { ?> fbf-horizontal-card--no-image <?php } ?>">
        <div class="mb-8 not-prose">
            <div class="text-gray-900 font-handwriting text-3xl mb-2 dark:text-gray-200"><?php echo get_the_title($postID); ?></div>
            <div class="text-gray-700 font-display dark:text-gray-200 line-clamp-3">
                <?php echo get_field('intro', $postID); ?>
            </div>
        </div>
    </div>
</a>
