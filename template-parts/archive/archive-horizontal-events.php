<?php
$image = null;
if (isset($args['image'])) {
    $image = $args['image'];
}

$text = '';
$location = '';
if (has_blocks()) {
    global $post;
    $blocks = parse_blocks( $post->post_content);
    foreach ($blocks as $block) {
        if ('fbf/event-details' === $block['blockName']) {
            $text = $block['attrs']['data']['description'];
            $location = $block['attrs']['data']['address'];
            break;

        }
    }
} else {
    $text = fbf_snippet('excerpt', 20);
}
$startDate = get_field('start_date', get_the_ID());

$start = new DateTime($startDate);
$date_start = $start->format('Y-m-d');
$start_year = $start->format('Y');
$start_month = $start->format('F d');

$thumb_id = get_post_thumbnail_id();
$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'small', true);
$img = $thumb_url_array[0];
if (strpos($img, 'media/default.png') !== false) {
    $img = get_stylesheet_directory_uri(). '/assets/img/placeholder.png';
}
?>

<a href="<?php echo get_permalink(); ?>" class="flex bg-white transition hover:shadow-xl">
    <div class="rotate-180 pt-2 pr-2 [writing-mode:_vertical-lr] text-xs font-display font-bold uppercase text-gray-900">
        Starting at:
    </div>
    <div class="rotate-180 p-2 [writing-mode:_vertical-lr]">
        <time
                datetime="<?php echo $date_start ?>"
                class="flex items-center justify-between gap-4 text-sm font-display font-bold uppercase text-gray-900"
        >
            <span><?php echo $start_year ?></span>
            <span class="w-px flex-1 bg-gray-900/10"></span>
            <span><?php echo $start_month ?></span>
        </time>
    </div>

    <div class="flex flex-1 flex-col justify-between">
        <div class="border-s border-gray-900/10 p-4 sm:border-l-transparent sm:p-6">

            <h3 class="font-bold font-handwriting !text-4xl text-balance text-gray-900">
                <?php echo get_the_title(); ?>
            </h3>
            <?php if ($location) { ?>
            <h4 class="font-semibold font-handwriting text-balance text-gray-900 text-lg">
                <?php echo $location; ?>
            </h4>
            <?php } ?>
            <p class="mt-2 text-gray-700 line-clamp-3 font-display">
                <?php echo $text ?>
            </p>
        </div>

        <div class="sm:flex sm:items-end sm:justify-end">
            <span
                    class="block bg-fbf-blue border border-white px-5 py-3 text-center font-display font-light uppercase text-white"
            >
                More Details
            </span>
        </div>
    </div>
</a>
