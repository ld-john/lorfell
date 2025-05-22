<?php
$postID = $args['postID'] ?? get_the_id();

$game = $synopsis = null;

if (has_blocks($postID)) {
    $post = get_post($postID);
    $blocks = parse_blocks($post->post_content);
    foreach ($blocks as $block) {
        if ('acf/campaign-details' === $block['blockName']) {
            if (isset($block['attrs']['data']['game'])) {
                $game = $block['attrs']['data']['game'];
            }
            if (isset($block['attrs']['data']['synopsis'])) {
                $synopsis = $block['attrs']['data']['synopsis'];
            }

        }
    }
}

$image = PostThumbnail($postID);
?>

<a href="<?php echo get_permalink($postID); ?>" class="flex bg-white !shadow inset-ring-0 hover:!inset-ring-2 inset-ring-sunshade transition hover:!shadow-xl group">
    <div class="rotate-180 p-2 [writing-mode:_vertical-lr]">
        <span
                class="flex items-center justify-between gap-4 font-display font-bold uppercase text-gray-900"
        >
            <span></span>
            <span><?php echo $game; ?></span>
        </span>
    </div>
    <?php if ($image) : ?>
    <div class="hidden sm:block sm:basis-56 bg-fbf-blue-200">
        <img
                alt=""
                src="<?php echo $image ?>"
                class="aspect-square size-full object-contain"
        />
    </div>
    <?php endif; ?>

    <div class="flex flex-1 flex-col justify-between">
        <div class="border-s border-gray-900/10 p-4 sm:border-l-transparent sm:p-6">

            <div class="font-bold font-handwriting text-4xl text-balance text-gray-900 line-clamp-3">
                <?php echo get_the_title($postID); ?>
            </div>

            <p class="mt-2 line-clamp-3 font-display text-relaxed text-gray-700">
                <?php echo $synopsis ?>
            </p>
        </div>

        <div class="sm:flex sm:items-end sm:justify-end">
            <span
                    class="block bg-fbf-blue transition group-hover:bg-sunshade !border border-white group-hover:!border-sunshade font-display px-5 py-3 text-center font-light uppercase text-gray-900 transition text-white"
            >
                More Info
            </span>
        </div>
    </div>
</a>

