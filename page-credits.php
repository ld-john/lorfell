<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/style.css">
    <title>Roll Credits</title>
</head>
<body>
<div class="post">
	<?php
	$streamers = proper_parse_str($_SERVER['QUERY_STRING'])['streamer'];
    $style = proper_parse_str($_SERVER['QUERY_STRING'])['style'] ?? null;
    if ($streamers) {
        if (gettype($streamers) === 'string') {
            $schedule = get_Multiple_Schedules([$streamers], ['number' => 15, 'days' => 8, 'start' => 'tomorrow']);
        } else {
            $schedule = get_Multiple_Schedules($streamers, ['number' => 15, 'days' => 8, 'start' => 'tomorrow']);
        }
    } else {
        $schedule = [];
    }
    ?>
<div class="grid grid-cols-3 gap-8 px-8 py-6">
    <?php foreach ($schedule as $event) {
        $start = new DateTime($event->start_time, new DateTimeZone('UTC'));
        // get the local timezone
        $start->setTimezone(new DateTimeZone('Europe/London'));
        // change the timezone of the object without changing its time
        $day = $start->format('D');
        $start = $start->format('F jS, g:ia');
        $thumbnail = get_Twitch_Game_Thumbnail($event->category->id);
        ?>
        <div class="rounded bg-white border border-gray-200 shadow-lg flex relative">
            <?php if ($style === 'tape') { ?>
                <img class="absolute top-[-50px] left-[-100px] z-10 -rotate-45 scale-50" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/tape.png" alt="tape">
                <img class="absolute top-[-60px] right-[-75px] z-10 rotate-12 scale-50" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/tape.png" alt="tape">
            <?php } ?>
            <?php if ($event->category) { ?>
                <img class="object-contain rounded-l" src="<?php echo $thumbnail; ?>" alt="<?php echo $event->title ?>">
            <?php } else { ?>
                <div class="h-[204px]"></div>
            <?php } ?>
            <div class="px-6 py-4 w-full">
                <div class="flex justify-between items-center">
                    <p class="text-orange-600 font-handwriting text-4xl"><?php echo $day ?></p>
                    <p class="text-gray-700 text-2xl font-handwriting dark:text-gray-200"><?php echo $event->streamer ?></p>
                </div>
                <p class="text-gray-700 text-4xl font-handwriting dark:text-gray-200"><?php echo $start ?></p>
                <div class="text-gray-900 font-handwriting text-5xl line-clamp-3 mb-2 dark:text-gray-200"><?php echo $event->title; ?></div>
                <?php if ($event->category) { ?>
                    <p class="text-gray-700 text-2xl font-display dark:text-gray-200"><span
                            class="font-bold font-condensed">Playing -</span> <?php echo $event->category->name ?>
                    </p>
                <?php } ?>
            </div>
        </div>

    <?php } ?>
</div>

</div>
</body>
</html>
