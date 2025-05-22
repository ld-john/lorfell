<?php
$postID = get_the_id();
$vid = get_field('video', $postID);
preg_match('/youtube.com\/embed\/(\S{11})/', $vid, $matches);
$youtube_id = $matches[1];
$category = null;
$series_name = null;
if (isset($args['series-name'])) {
    $series_name = $args['series-name'];
}
$terms = get_the_terms( get_the_ID() , 'video_category' );
if ($terms) {
    foreach ($terms as $term) {
        if (empty($term->name)) {
            $category = 'foo';
        } else {
            $category = $term->name;
            $catSlug = $term->slug;
        }
    }
}
$contrib = get_field( 'contributors', $postID );

?>

<article
        class="group rounded-xl bg-gradient-to-r from-fbf-blue-100 via-fbf-blue-600 to-purple-600 p-0.5 shadow-xl transition hover:bg-[length:400%_400%] hover:shadow-sm hover:[animation-duration:_4s]"
>
    <div class="rounded-[10px] bg-white p-4 h-full !pt-20 sm:p-6 flex flex-col md:flex-row gap-4">
        <img
                alt="<?php echo get_the_title(); ?>"
                src="https://img.youtube.com/vi/<?php echo $youtube_id; ?>/hqdefault.jpg"
                class="h-48 w-full md:w-1/3 md:shrink-0 rounded-xl object-cover shadow-xl transition group-hover:grayscale-[50%]"
        />
        <div>
            <time datetime="<?php echo get_the_date('Y-m-d') ?>" class="block font-condensed text-xs text-gray-500"> <?php echo get_the_date('dS M Y') ?> </time>

            <a href="<?php echo get_permalink(); ?>">
                <h3 class="mt-0.5 text-lg font-condensed font-bold text-gray-900 line-clamp-2">
                    <?php echo get_the_title(); ?>
                </h3>
                <p class="mt-4 text-sm font-display text-gray-900 line-clamp-3">
                    <?php echo fbf_snippet('excerpt', 30); ?>
                </p>
            </a>
        </div>
    </div>
</article>
