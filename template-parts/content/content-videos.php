<?php
$channel_id = get_field('youtube_channel');

$cat = get_the_terms(get_the_ID(), 'video_category');

// The Query.
$the_query =
    array(
        'post_type' => 'videos',
        'posts_per_page' => 6,
        'post__not_in' => array( get_the_ID() ),
    );

if ($cat) {
    $the_query['tax_query'] = array(
        array(
            'taxonomy' => 'video_category',
            'field' => 'slug',
            'terms' => $cat[0]->slug,
        ),
    );
}

$the_query = new WP_Query($the_query);
?>
<div class="flex gap-6">
    <div>
        <div class="bg-gray-100 border border-gray-400 p-6">
            <h1 class="dark:text-gray-200 font-handwriting text-5xl mb-4"><?php the_title() ?></h1>
            <div class="max-w-screen-lg mx-auto">
                <div class="aspect-w-16 aspect-h-9">
                    <?php echo get_field('video') ?>
                </div>
            </div>
            <div class="prose max-w-full mt-4 dark:text-gray-200 font-display">
                <?php the_content(); ?>
            </div>
        </div>
        <div class="my-10">
            <h2 class="text-4xl bg-fbf-blue-700 text-white border border-b-0 border-white font-handwriting px-6 pt-2 pb-3 rounded-t-lg inline-block">Like this content?</h2>
            <div class="bg-fbf-blue border-white border p-6 rounded-br-lg font-display">
                <div class="card-content">
                    <p class="mb-5">We have a YouTube channel with a collection of videos just like this one! Why not click below to Subscribe?</p>
                    <script src="https://apis.google.com/js/platform.js"></script>
                    <div class="g-ytsubscribe" data-channelid="<?php echo($channel_id ? $channel_id : 'UCX7vxdVapKMBodalw0HzLNw') ?>" data-layout="full" data-count="default"></div>
                </div>
                <?php /*fbf_social_sharing_buttons() */?>
            </div>
        </div>
    </div>
    <?php
    if ( $the_query->have_posts() ) { ?>
        <div class="w-1/4 shrink-0 bg-gray-100 border border-gray-400 p-6">
            <h2 class="dark:text-gray-200 font-handwriting text-3xl mb-4">More <?php echo isset($cat[0]) ? $cat[0]->name : 'Videos'; ?></h2>
            <ul class="mt-4 space-y-2">
                <?php while ( $the_query->have_posts() ) {
                $the_query->the_post(); ?>
                    <li>
                        <a href="#" class="block h-full rounded-lg border border-gray-700 p-4 hover:border-fbf-blue-600 bg-fbf-blue hover:bg-fbf-blue-100">
                            <strong class="font-medium text-white font-handwriting text-balance text-xl line-clamp-2"><?php echo get_the_title(); ?></strong>

                            <p class="mt-1 text-sm line-clamp-3 font-medium text-white font-display">
                                <?php echo fbf_snippet('excerpt', 30); ?>
                            </p>
                        </a>
                    </li>
                <?php } ?>
            </ul>
            <?php if ($the_query->found_posts > 6) { ?>
                <a class="fbf--button block float-right mt-2" href="<?php echo isset($cat[0]) ? get_term_link($cat[0]->term_id, 'video_category') : '/videos/' ?>">See More <?php echo isset($cat[0]) ? $cat[0]->name : '' ?></a>
            <?php } ?>
        </div>
    <?php } ?>
</div>
<h2 class="text-4xl bg-fbf-blue-700 text-white border border-b-0 border-white font-handwriting px-6 pt-2 pb-3 rounded-t-lg inline-block">Featuring</h2>
<div class="bg-fbf-blue border-white border p-6 rounded-br-lg">
    <div class="py-6 clear-both">
        <?php $contrib = get_field( 'contributors' ); ?>

        <?php if( $contrib ) { ?>
            <div class="grid md:grid-cols-4 gap-8 grid-cols-1">
                <?php foreach ($contrib as $c):
                    get_template_part('template-parts/archive/archive-vertical-staff',null,['id' => $c->ID]);
                endforeach; ?>
            </div>
        <?php } ?>

    </div>
</div>
