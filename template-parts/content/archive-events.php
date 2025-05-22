<h2 class="text-4xl bg-fbf-blue-700 text-white border border-b-0 border-white font-handwriting px-6 pt-2 pb-3 rounded-t-lg inline-block">Events</h2>
<div class="bg-fbf-blue border-white border p-6 rounded-br-lg font-display">
    <p>We love heading to conventions, and this is where you will find the details about the conventions we are heading to.</p>
</div>
<?php
$date_now = date('Y-m-d H:i:s');
$upcoming = new WP_Query(array(
    'post_type' => 'events',
    'posts_per_page' => -1,
    'orderby' => 'meta_value',
    'meta_key' => 'start_date',
    'order' => 'ASC',
    'meta_query' => array( // WordPress has all the results, now, return only the events after today's date
        array(
            'key' => 'end_date', // Check the start date field
            'value' => $date_now, // Set today's date (note the similar format)
            'compare' => '>=', // Return the ones greater than today's date
            'type' => 'DATETIME' // Let WordPress know we're working with date
        ),
    ),

));
?>
<div class="my-10">
    <h2 class="text-4xl bg-fbf-blue-700 text-white border border-b-0 border-white font-handwriting px-6 pt-2 pb-3 rounded-t-lg inline-block">Upcoming Events</h2>
    <?php if ($upcoming->have_posts()): ?>
    <div class="bg-fbf-blue border-white border p-6 rounded-br-lg font-display space-y-8">
        <?php while ($upcoming->have_posts()) : $upcoming->the_post();
            get_template_part('template-parts/archive/archive-horizontal-events');
        endwhile; ?>
    </div>
</div>
<?php endif;
wp_reset_query(); ?>
<div class="my-10">
    <h2 class="text-4xl bg-fbf-blue-700 text-white border border-b-0 border-white font-handwriting px-6 pt-2 pb-3 rounded-t-lg inline-block">Past Events</h2>
    <div class="bg-fbf-blue border-white border p-6 rounded-br-lg font-display">

        <?php
        $past_events = new WP_Query(array(
            'post_type' => 'events',
            'posts_per_page' => -1,
            'orderby' => 'meta_value',
            'meta_key' => 'end_date',
            'order' => 'DSC',
            'meta_query' => array( // WordPress has all the results, now, return only the events after today's date
                array(
                    'key' => 'end_date', // Check the start date field
                    'value' => $date_now, // Set today's date (note the similar format)
                    'compare' => '<=', // Return the ones greater than today's date
                    'type' => 'DATETIME' // Let WordPress know we're working with date
                ),
            ),

        )); ?>
        <?php if ($past_events->have_posts()): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php while ($past_events->have_posts()) : $past_events->the_post();
                get_template_part('template-parts/archive/archive-vertical-events');
            endwhile; ?>
        </div>
        <?php endif; ?>
    </div>
</div>
