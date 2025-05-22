<h1 class="text-3xl my-3 font-bold tracking-tight"><?php echo get_the_archive_title();?></h1>
<div id="content" role="main" class="archive-streams--flex-container">
    <?php
    $startDate  = get_field('start_date');
    $date_now = date('Y-m-d H:i:s', strtotime( 'now' ) );
    $i = 0;
    $the_query = new WP_Query(array(
        'post_type'			=> 'streams',
        'posts_per_page'	=> -1,
        'orderby' => 'meta_value',
        'meta_key' => 'start_date',
        'order' => 'ASC',
        'meta_query' => array( // WordPress has all the results, now, return only the events after today's date

            array(
                'key' => 'start_date', // Check the start date field
                'value' => $date_now, // Set today's date (note the similar format)
                'compare' => '>=', // Return the ones greater than today's date
                'type' => 'DATETIME' // Let WordPress know we're working with date
            ),
        ),

    )); ?>
    <?php if( $the_query->have_posts() ): ?>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <?php while( $the_query->have_posts() ) : $the_query->the_post();
                get_template_part('template-parts/archive/archive-vertical-streams');
            endwhile; ?>
        </div>
    <?php endif; ?>
</div>
