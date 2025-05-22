<?php
$postID = get_the_id();
$contrib = get_field( 'contributors', $postID );
$images = get_field('gallery', $postID);
$imgCount = count($images);
$image = get_the_post_thumbnail_url($postID);
?>

<article class="relative overflow-hidden rounded-lg shadow transition hover:shadow-lg">
    <img
            alt=""
            src="<?php echo $image ?>"
            class="absolute inset-0 !size-full object-cover"
    />

    <div class="relative bg-gradient-to-t from-gray-900/50 to-gray-900/25 pt-32 sm:pt-48 lg:pt-64 h-full">
        <span class="absolute top-3 right-3 text-sm inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-fbf-blue-200/75 text-fbf-blue-700 rounded-full">
            <i class="fas fa-camera mr-2"></i>
            <?php echo $imgCount ?>
        </span>
        <div class="p-4 sm:p-6">
            <time datetime="<?php echo get_the_date('Y-m-d') ?>" class="block text-sm font-display text-white/90"> <?php echo get_the_date('dS F Y') ?></time>

            <a href="<?php echo get_permalink(); ?>" class="mt-0.5 font-bold font-handwriting text-4xl text-balance text-white hover:!text-sunshade">
                <?php echo get_the_title(); ?>
            </a>
        </div>
    </div>
</article>
