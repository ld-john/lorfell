<?php
$postID = $args['postID'] ?? get_the_id();
$contrib = get_field( 'contributors', $postID );
$image = get_the_post_thumbnail_url($postID);
?>

<article
        class="group rounded-xl bg-gradient-to-r from-fbf-blue-100 via-fbf-blue-600 to-purple-600 p-0.5 shadow-xl transition hover:bg-[length:400%_400%] hover:shadow-sm hover:[animation-duration:_4s]"
>
    <div class="rounded-[10px] bg-white p-4 h-full !pt-20 sm:p-6 flex flex-col md:flex-row gap-4">
        <?php if($image) { ?>
        <img
                alt="<?php echo get_the_title(); ?>"
                src="<?php echo $image ?>"
                class="h-48 w-full md:w-1/3 md:shrink-0 rounded-xl object-cover shadow-xl transition group-hover:grayscale-[50%]"
        />
        <?php } ?>
        <div>
            <time datetime="<?php echo get_the_date('Y-m-d') ?>" class="block font-condensed text-xs text-gray-500"> <?php echo get_the_date('dS M Y') ?> </time>

            <a href="<?php echo get_permalink(); ?>">
                <div class="mt-0.5 font-handwriting font-bold text-4xl text-gray-900 line-clamp-2">
                    <?php echo get_the_title(); ?>
                </div>
                <p class="mt-4 text-sm font-display text-gray-900 line-clamp-3">
                    <?php echo fbf_snippet('excerpt', 30); ?>
                </p>
            </a>
        </div>
    </div>
</article>
