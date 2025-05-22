<?php
$conventions = new WP_Query(
    array(
        'post_type' => 'events',
        'posts_per_page' => 2,
        'orderby' => 'meta_value',
        'meta_key' => 'start_date',
        'order' => 'ASC',
        'meta_query' => array(
            array(
                'key' => 'start_date',
                'value' => array(date('Y-m-d H:i:s'), date('Y-m-d H:i:s', strtotime('6 months'))),
                'compare' => 'BETWEEN',
                'type' => 'DATE'
            )
        )
    )
);
if ($conventions->found_posts === 0) {
    $schedule = get_Multiple_Schedules(['finalbossfightlive', 'angelsgameplayer', 'rhibles', 'benthequestgiver']);
} else {
    $schedule = get_Multiple_Schedules(['finalbossfightlive', 'angelsgameplayer', 'rhibles', 'benthequestgiver'], ['number' => 2]);
}
if ($schedule) {
    ?>
    <div class="container p-4 mx-auto flex flex-col md:flex-row gap-8">
        <div class="w-full">
            <div class="text-4xl bg-linear-to-b/oklch from-fbf-blue-700 to-fbf-blue text-white !border !border-b-0 !border-white font-handwriting px-6 pt-2 pb-3 rounded-t-lg inline-block">
                <h3>Upcoming Streams</h3>
            </div>
            <div class="h-full bg-linear-to-tl/oklch from-twitch to-fbf-blue !border-white !border p-6 rounded-br-lg relative">
                <a class="fbf--button absolute bottom-0 right-0" href="/upcoming-streams/">See More Streams</a>
                <div class="grid grid-cols-1 <?php if ($conventions->found_posts === 0) { ?> md:grid-cols-2 <?php } ?> gap-8">
                    <?php

                    foreach ($schedule as $event) {
                        $title = $event->title;
                        $start = new DateTime($event->start_time, new DateTimeZone('UTC'));
                        // get the local timezone
                        $start->setTimezone(new DateTimeZone('Europe/London'));
                        // change the timezone of the object without changing its time
                        $time = $start->format('g:i a');
                        $start_date = $start->format('Y-m-d');
                        $start = $start->format('F d');
                        if (isset($event->category)) {
                            $thumbnail = get_Twitch_Game_Thumbnail($event->category->id);
                        } else {
                            $thumbnail = null;
                        }
                        ?>
                        <a href="https://twitch.tv/<?php echo strtolower($event->streamer); ?>" class="flex bg-white transition !shadow inset-ring-0 hover:!inset-ring-2 inset-ring-sunshade hover:!shadow-xl">
                            <div class="rotate-180 pt-2 pr-2 [writing-mode:_vertical-lr] text-xs font-display font-bold uppercase text-gray-900">
                                Starting at:
                            </div>
                            <div class="rotate-180 p-2 [writing-mode:_vertical-lr]">
                                <time
                                        datetime="<?php echo $start_date ?>"
                                        class="flex items-center justify-between gap-4 text-sm font-display font-bold uppercase text-gray-900"
                                >
                                    <span><?php echo $time ?></span>
                                    <span class="w-px flex-1 bg-gray-900/10"></span>
                                    <span><?php echo $start ?></span>
                                </time>
                            </div>
                            <?php if ($thumbnail) { ?>
                                <div class="hidden sm:block sm:basis-44">
                                    <img
                                            alt=""
                                            src="<?php echo $thumbnail; ?>"
                                            class="lg:h-full h-[204px] w-full lg:w-[153px] shrink-0 object-cover"
                                    />
                                </div>
                            <?php } ?>

                            <div class="flex flex-1 flex-col justify-between">
                                <div class="border-s border-gray-900/10 p-4 sm:border-l-transparent sm:p-6">

                                        <p class="font-bold font-handwriting text-4xl text-balance text-gray-900">
                                            <?php echo $title; ?>
                                        </p>
                                    <?php if ($event->category) { ?>
                                        <p class="mt-2 text-gray-700 font-display"><span
                                                    class="font-bold">Playing -</span> <?php echo $event->category->name ?>
                                        </p>
                                    <?php } ?>
                                </div>

                                <div class="sm:flex sm:items-end sm:justify-end">
                                    <span
                                            href="#"
                                            class="block bg-fbf-blue px-5 py-3 text-center font-display font-light uppercase text-white border border-white"
                                    >
                                        <?php echo $event->streamer ?>
                                    </span>
                                </div>
                            </div>
                        </a>
<!--                        <a href="https://twitch.tv/--><?php //echo strtolower($event->streamer); ?><!--"-->
<!--                           class="max-w-sm min-h-[204px] w-full lg:max-w-full lg:flex group relative">-->
<!--                            <img class="absolute top-[-50px] left-[-100px] z-10 -rotate-45 scale-50" src="--><?php //echo get_stylesheet_directory_uri(); ?><!--/assets/img/tape.png" alt="tape">-->
<!--                            <img class="absolute top-[-60px] right-[-75px] z-10 rotate-12 scale-50" src="--><?php //echo get_stylesheet_directory_uri(); ?><!--/assets/img/tape.png" alt="tape">-->
<!--                            --><?php //if ($event->category) { ?>
<!--                                <div class="lg:h-full h-[204px] w-full lg:w-[153px] shrink-0 bg-fbf-blue border border-b-0 lg:border-0 border-gray-400 bg-cover bg-no-repeat rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden relative"-->
<!--                                     style="background-image: url(--> <?php //echo $title; ?><!--"-->
<!--                                >-->
<!--                                </div>-->
<!--                            --><?php //} ?>
<!--                            <div class="fbf-horizontal-card --><?php //if ($event->category) { ?><!-- fbf-horizontal-card--image --><?php //} else { ?><!-- fbf-horizontal-card--no-image --><?php //} ?><!--">-->
<!--                                <div class="mb-8 ">-->
<!--                                    <div class="flex justify-between">-->
<!--                                        <p class="text-orange-600 font-handwriting mb-2 text-2xl">--><?php //echo $day ?><!--</p>-->
<!--                                        <p class="text-gray-700 text-xl font-handwriting dark:text-gray-200">--><!--</p>-->
<!--                                    </div>-->
<!--                                    <p class="text-gray-700 text-xl font-handwriting dark:text-gray-200">--><?php //echo $start ?><!--</p>-->
<!--                                    <div class="text-gray-900 font-handwriting text-3xl line-clamp-1 mb-2 dark:text-gray-200">--><!--</div>-->

<!--                                </div>-->
<!--                            </div>-->
<!--                        </a>-->

                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php if ( $conventions->have_posts() ) { ?>
            <div class="w-2/5 shrink-0">
                <h2 class="text-4xl bg-fbf-blue-700 text-white border border-b-0 border-white font-handwriting px-6 pt-2 pb-3 rounded-t-lg inline-block">Upcoming Conventions</h2>
                <div class="h-full bg-fbf-blue border-white border p-6 rounded-br-lg relative">
                    <div class="grid grid-cols-1 gap-8">
                        <?php while ( $conventions->have_posts() ) {
                            $conventions->the_post();
                            get_template_part('template-parts/archive/archive-horizontal-events', null, ['image' => 'hidden']);
                        }
                        ?>
                    </div>
                    <a class="fbf--button absolute bottom-0 right-0" href="/events/">See More Conventions</a>
                </div>
            </div>
        <?php } ?>
    </div>
    <?php
}

