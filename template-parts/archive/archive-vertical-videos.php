<?php
$postID = get_the_id();
$vid = get_field('video', $postID);
preg_match('/youtube.com\/embed\/(\S{11})/', $vid, $matches);
$youtube_id = $matches[1];


$terms = get_the_terms( get_the_ID() , 'video_category' );
$category = null;
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

?>

<a href="<?php echo get_permalink(); ?>" class="flex bg-white !shadow inset-ring-0 hover:!inset-ring-2 inset-ring-sunshade transition hover:!shadow-xl">
    <div class="rotate-180 p-2 [writing-mode:_vertical-lr]">
        <time
                datetime="<?php echo get_the_date('Y-m-d') ?>"
                class="flex items-center justify-between gap-4 font-display font-bold uppercase text-gray-900"
        >
            <span><?php echo get_the_date('Y') ?></span>
            <span class="w-px flex-1 bg-gray-900/10"></span>
            <span><?php echo get_the_date('F d') ?></span>
        </time>
    </div>
    <div class="flex flex-col">

        <div class="hidden sm:block">
            <img
                    alt="<?php echo get_the_title(); ?>"
                    src="https://img.youtube.com/vi/<?php echo $youtube_id; ?>/hqdefault.jpg"
                    class="aspect-h-9 size-full object-cover"
            />
        </div>

        <div class="flex flex-1 flex-col justify-between">
            <div class="border-s border-gray-900/10 p-4 sm:border-l-transparent sm:p-6">

                    <div class="font-bold font-handwriting text-4xl text-balance text-gray-900 line-clamp-3">
                        <?php echo get_the_title(); ?>
                    </div>


                <p class="mt-2 line-clamp-3 font-display text-gray-700">
                    <?php echo fbf_snippet('excerpt', 30); ?>
                </p>
            </div>
        </div>

    </div>
</a>
