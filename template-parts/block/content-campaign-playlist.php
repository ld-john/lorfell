<?php
global $post;
$playlist = get_field('playlist');
$videos_query = array(
    'post_type' => 'videos',
    'posts_per_page' => '4',
    'tax_query' => array (
        array (
            'taxonomy' => 'video_category',
            'field' => 'slug',
            'terms' => '"' . $playlist . '"',
        )
    )
);
$videos = new WP_Query( $videos_query );
if($videos->have_posts()) {
    ?>
    <div class="my-10">

        <div class="text-4xl bg-linear-to-b/oklch from-fbf-blue-700 to-fbf-blue text-white !border !border-b-0 !border-white font-handwriting px-6 pt-2 pb-3 rounded-t-lg inline-block">Videos</div>
        <div class="bg-fbf-blue !border-white !border p-6 rounded-br-lg font-display">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <?php while ( $videos->have_posts() ) :
                    $videos->the_post();
                    get_template_part('template-parts/archive/archive-vertical-videos');
                endwhile; ?>
            </div>
            <?php wp_reset_query(); ?>
            <div class="text-sunshade text-3xl px-2 py-4 ml-auto font-handwriting flex justify-end mt-4">
                <div class="bg-white/75 !shadow px-4 py-2">

                    See more videos from <a class="fbf--button" href="<?php echo site_url(); ?>/video_category/<?php echo $playlist ?>/">
                        <?php echo get_the_title($post->ID); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

