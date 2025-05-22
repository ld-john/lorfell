<?php
$postID = $args['postID'] ?? get_the_id();
$contrib = get_field( 'contributors', $postID );
$image = get_the_post_thumbnail_url($postID);

$meta = get_post_meta($postID);

$title = get_the_title($postID);
if (isset($meta['itunes_title'])) {
    $title = $meta['itunes_title'][0];
}

$episode = null;
if (isset($meta['itunes_episode_number'])) {
    $episode = $meta['itunes_episode_number'][0];
}

?>


<a href="<?php echo get_the_permalink($postID) ?>" class="flex bg-white transition !shadow hover:!shadow-xl inset-ring-0 hover:!inset-ring-2 inset-ring-sunshade">
    <?php if ($episode) { ?>
    <div class="rotate-180 p-2 [writing-mode:_vertical-lr]">
        <div
                class="flex items-center justify-between gap-4 text-xs font-display font-bold uppercase text-gray-900"
        >
            <span></span>
            <span>Episode #<?php echo $episode ?></span>
        </div>
    </div>
    <?php }
    if ($image) { ?>
    <div class="hidden sm:block sm:basis-24">
        <img
                alt=""
                src="<?php echo $image; ?>"
                class="aspect-square size-full object-contain"
        />
    </div>
    <?php } ?>

    <div class="flex flex-1 flex-col justify-between">
        <div class="!border-s !border-gray-900/10 p-4 sm:!border-l-transparent sm:p-6">

                <div class="font-bold font-handwriting text-4xl text-balance text-gray-900">
                    <?php echo $title; ?>
                </div>


            <p class="mt-2 line-clamp-3 font-display text-gray-700">
                <?php echo fbf_snippet('excerpt', 50, $postID); ?>
            </p>
            <div class="mt-4 font-display sm:flex sm:items-center sm:gap-2">
                <?php if (isset($meta['duration'])) { ?>
                    <div class="flex items-center gap-1 text-gray-500">
                        <svg
                                class="h-4 w-4"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                            ></path>
                        </svg>

                        <p class="text-xs font-display font-medium"><?php echo $meta['duration'][0]; ?> minutes</p>
                    </div>

                    <span class="hidden sm:block" aria-hidden="true">&middot;</span>
                <?php } ?>

                <p class="mt-2 text-xs font-display font-medium text-gray-500 sm:mt-0">
                    Featuring <?php
                    $contribCount = count($contrib);
                    $i = 1;
                    foreach ( $contrib as $c) {
                        $i++;
                        ?>
                        <span><?php echo $c->post_title ?></span><?php
                        if ($contribCount > 1) {
                            if ($i < $contribCount) {
                                echo ', ';
                            } elseif ($i === $contribCount) {
                                echo ' and ';
                            }
                        }
                    }
                    ?>
                </p>
            </div>
        </div>
    </div>
</a>
