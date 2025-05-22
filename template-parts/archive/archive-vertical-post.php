<?php
$postID = $args['postID'] ?? get_the_id();
$contrib = get_field( 'contributors', $postID );

?>

<a href="<?php echo get_permalink($postID); ?>" class="flex bg-white transition !shadow inset-ring-0 hover:!inset-ring-2 inset-ring-sunshade transition hover:!shadow-xl">
    <div class="rotate-180 p-2 [writing-mode:_vertical-lr]">
        <time
                datetime="<?php echo get_the_date('Y-m-d') ?>"
                class="flex items-center justify-between gap-4 font-display font-bold uppercase text-gray-900"
        >
            <span><?php echo get_the_date('Y', $postID) ?></span>
            <span class="w-px flex-1 bg-gray-900/10"></span>
            <span><?php echo get_the_date('F d', $postID) ?></span>
        </time>
    </div>
    <div class="flex flex-col">

        <div class="flex flex-1 flex-col justify-between">
            <div class="border-s border-gray-900/10 p-4 sm:border-l-transparent sm:p-6">

                <div class="font-bold font-handwriting text-4xl text-balance text-gray-900 line-clamp-3">
                    <?php echo get_the_title($postID); ?>
                </div>


                <p class="mt-2 line-clamp-3 font-display text-gray-700">
                    <?php echo fbf_snippet('excerpt', 30, $postID); ?>
                </p>
            </div>
        </div>

    </div>
</a>
