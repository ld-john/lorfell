<?php
$posts_query = array(
    'post_type' => array('post', 'gallery'),
    'posts_per_page' => 6,
    'meta_query' => array(
        array(
            'key' => 'contributors',
            'value' => '"' . get_the_ID() . '"',
            'compare' => 'LIKE'
        )
    )
);

$videos_query = array(
    'post_type' => array('videos'),
    'posts_per_page' => 4,
    'meta_query' => array(
        array(
            'key' => 'contributors', // name of custom field
            'value' => '"' . get_the_ID() . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
            'compare' => 'LIKE'
        )
    )
);
$post_type = get_field('post_types');

 if ($post_type === 'video') :
     $videos = new WP_Query( $videos_query )
     ?>
<div class="text-4xl bg-linear-to-b/oklch from-fbf-blue-700 to-fbf-blue text-white !border !border-b-0 !border-white font-handwriting px-6 pt-2 pb-3 rounded-t-lg inline-block">Videos featuring <?php echo get_the_title() ?></div>
<div class="bg-fbf-blue !border-white !border p-6 rounded-br-lg font-display">
    <div class="grid grid-cols-2 gap-8">
        <?php while ( $videos->have_posts() ) :
            $videos->the_post();
            get_template_part('template-parts/archive/archive-horizontal-videos');
        endwhile; ?>
    </div>
</div>
 <?php elseif ($post_type === 'posts' ) :
 $posts = new WP_Query( $posts_query )
     ?>
     <div class="text-4xl bg-linear-to-b/oklch from-fbf-blue-700 to-fbf-blue text-white !border !border-b-0 !border-white font-handwriting px-6 pt-2 pb-3 rounded-t-lg inline-block">Posts by <?php echo get_the_title() ?></div>
     <div class="bg-fbf-blue !border-white !border p-6 rounded-br-lg font-display">
         <div class="grid grid-cols-2 gap-8">
             <?php while ( $posts->have_posts() ) :
                 $posts->the_post();
                 get_template_part('template-parts/archive/archive-vertical-' . get_post_type() );
             endwhile; ?>
         </div>
     </div>
<?php
else :
    $videos = new WP_Query( $videos_query );
    $posts = new WP_Query( $posts_query );?>
<div class="flex flex-col lg:flex-row gap-8 my-6">
    <div class="w-full">
        <div class="text-4xl bg-linear-to-b/oklch from-fbf-blue-700 to-fbf-blue text-white !border !border-b-0 !border-white font-handwriting px-6 pt-2 pb-3 rounded-t-lg inline-block">Posts by <?php echo get_the_title() ?></div>
        <div class="bg-fbf-blue !border-white !border p-6 rounded-br-lg font-display">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <?php while ( $posts->have_posts() ) :
                    $posts->the_post();
                    get_template_part('template-parts/archive/archive-vertical-'  . get_post_type());
                endwhile; ?>
            </div>
        </div>
    </div>
    <?php wp_reset_query(); ?>
    <div class="w-full">
        <div class="text-4xl bg-linear-to-b/oklch from-fbf-blue-700 to-fbf-blue text-white !border !border-b-0 !border-white font-handwriting px-6 pt-2 pb-3 rounded-t-lg inline-block">Videos featuring <?php echo get_the_title() ?></div>
        <div class="bg-fbf-blue !border-white !border p-6 rounded-br-lg font-display">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <?php while ( $videos->have_posts() ) :
                    $videos->the_post();
                    get_template_part('template-parts/archive/archive-vertical-videos');
                endwhile; ?>
            </div>
        </div>
    </div>
</div>
<?php
 endif;
