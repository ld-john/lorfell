<?php
$text = '';

if (has_blocks()) {
    global $post;
    $blocks = parse_blocks( $post->post_content);
    foreach ($blocks as $block) {
        if ('acf/event-details' === $block['blockName']) {
            $text = $block['attrs']['data']['description'];
            break;

        }
    }
} else {
    $text = fbf_snippet('excerpt', 20);
}
$thumb_id = get_post_thumbnail_id();
$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'small', true);
$img = $thumb_url_array[0];
if (strpos($img, 'media/default.png') !== false) {
    $img = get_stylesheet_directory_uri(). '/assets/img/placeholder.png';
}

$start_date = get_field('start_date', get_the_ID());

?>


<article class="relative overflow-hidden rounded-lg shadow transition hover:shadow-lg bg-white">
    <img
            alt="<?php echo get_the_title(); ?>"
            src="<?php echo $img; ?>"
            class="absolute inset-0 h-full w-full object-cover"
    />

    <div
            class="relative bg-gradient-to-t from-gray-900/80 to-gray-900/50 pt-32 sm:pt-48 lg:pt-64"
    >
        <div class="p-4 sm:p-6">
            <time datetime="2022-10-10" class="block text-sm font-condensed text-white/90">
                <?php echo $start_date ?>
            </time>

            <a href="<?php echo get_permalink(); ?>">
                <h3 class="mt-0.5 text-xl text-white font-condensed font-bold line-clamp-1">
                    <?php echo get_the_title(); ?>
                </h3>
            </a>

            <p class="mt-2 line-clamp-3 text-sm/relaxed font-display text-white/95 min-h-[4.5rem]">
                <?php echo $text; ?>
            </p>
        </div>
    </div>
</article>
