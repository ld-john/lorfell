<?php
$postID = $args['id'] ?? get_the_id();
$image = get_the_post_thumbnail_url($postID);
$intro = get_field('intro', $postID);

if (has_blocks($postID)) {
    $post = get_post($postID);
    $blocks = parse_blocks($post->post_content);
    foreach ($blocks as $block) {
        if ('fbf/staff-profiles' === $block['blockName']) {
            $intro = $block['attrs']['data']['intro'];
        }
    }
}

?>

<a href="<?php echo get_permalink($postID); ?>" class="group relative block bg-black">
    <img
            alt="<?php echo get_the_title($postID); ?>"
            src="<?php echo $image ?>"
            class="absolute inset-0 !size-full object-cover opacity-75 transition-opacity group-hover:opacity-50"
    />

    <div class="relative p-4 sm:p-6 lg:p-8">

        <p class="text-xl font-bold text-white sm:text-3xl font-handwriting text-balance"><?php echo get_the_title($postID); ?></p>

        <div class="mt-32">
            <div
                    class="translate-y-8 transform opacity-0 transition-all group-hover:translate-y-0 group-hover:opacity-100"
            >
                <p class="text-sm text-white font-display">
                    <?php echo fbf_snippet($intro); ?>
                </p>
            </div>
        </div>
    </div>
</a>
