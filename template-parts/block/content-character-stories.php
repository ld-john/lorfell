<?php

/*
*  Query posts for a relationship value.
*  This method uses the meta_query LIKE to match the string "123" to the database value a:1:{i:0;s:3:"123";} (serialized array)
*/

$stories = get_posts(array(
    'post_type' => 'post',
    'posts_per_page' => '4',
    'meta_query' => array(
        array(
            'key' => 'features', // name of custom field
            'value' => '"' . get_the_ID() . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
            'compare' => 'LIKE'
        )
    )
));

?>
<?php
if( $stories ): ?>
<div class="my-10">
    <div class="text-4xl bg-linear-to-b/oklch from-fbf-blue-700 to-fbf-blue text-white !border !border-b-0 !border-white font-handwriting px-6 pt-2 pb-3 rounded-t-lg inline-block">Stories featuring <?php echo get_the_title(); ?></div>
    <div class="bg-fbf-blue !border-white !border p-6 rounded-br-lg">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php foreach( $stories as $story ):

                get_template_part('template-parts/archive/archive-vertical-post', null, ['postID' => $story->ID]);

            endforeach; ?>
        </div>
    </div>
</div>
<?php endif; ?>
