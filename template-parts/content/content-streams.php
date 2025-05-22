<?php
$start_date = get_field('start_date');
$deadline = new DateTime($start_date);
$start = $deadline->format('F j, Y - g:ia');
$month = $deadline->format('F');
$daynum = $deadline->format('j');
$daytext = $deadline->format('D');
$time = $deadline->format('h:i a');
?>

<div class="prose max-w-full">
    <h1><?php the_title() ?></h1>
</div>
<div class="bg-gradient-to-b from-fbf-blue to-fbf-blue-200 border border-fbf-blue flex flex-col md:flex-row space-y-4 md:space-y-0 items-center justify-between rounded shadow my-6 p-3">
    <div class="text-center">
        <h2 class="text-3xl my-3 font-bold tracking-tight">Playing</h2>
        <p><?php echo get_field('playing'); ?></p>
    </div>
    <div class="text-center">
        <div id="clockdiv" class="flex gap-4">
            <div class="bg-white rounded-lg shadow-lg p-3">
                <span class="days text-5xl font-bold leading-tight"></span>
                <div class="text-sm">Days</div>
            </div>
            <div class="bg-white rounded-lg shadow-lg p-3">
                <span class="hours text-5xl font-bold leading-tight"></span>
                <div class="text-sm">Hours</div>
            </div>
            <div class="bg-white rounded-lg shadow-lg p-3">
                <span class="minutes text-5xl font-bold leading-tight"></span>
                <div class="text-sm">Minutes</div>
            </div>
            <div class="bg-white rounded-lg shadow-lg p-3">
                <span class="seconds text-5xl font-bold leading-tight"></span>
                <div class="text-sm">Seconds</div>
            </div>
        </div>
    </div>
    <div class="text-center">
        <h2 class="text-3xl my-3 font-bold tracking-tight">Starting</h2>
        <div class="min-w-32 min-h-48 p-3 mb-4 font-medium">
            <div class="w-32 flex-none rounded-t lg:rounded-t-none lg:rounded-l text-center shadow-lg ">
                <div class="block rounded-t overflow-hidden  text-center ">
                    <div class="bg-blue-500 text-white py-1">
                        <?php echo $month; ?>
                    </div>
                    <div class="pt-1 border-l border-r border-white bg-white">
                        <span class="text-5xl font-bold leading-tight">
                            <?php echo $daynum; ?>
                        </span>
                    </div>
                    <div class="border-l border-r border-b rounded-b-lg text-center border-white bg-white -pt-2 -mb-1">
                        <span class="text-sm">
                            <?php echo $daytext; ?>
                        </span>
                    </div>
                    <div class="pb-2 border-l border-r border-b rounded-b-lg text-center border-white bg-white">
                        <span class="text-xs leading-normal">
                            <?php echo $time ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="prose max-w-full">
    <?php the_content(); ?>
</div>
<a href="https://twitch.tv/<?php echo get_field('twitch_channel'); ?>" class="text-center block bg-twitch hover:bg-twitch-700 text-white font-bold py-2 px-4 border border-fbf-blue-700 rounded">Click Here to follow the streamer</a>
<div class="py-6 clear-both">
    <h2 class="text-3xl my-3 font-bold tracking-tight">Featuring</h2>
    <?php $contrib = get_field( 'contributors' ); ?>

    <?php if( $contrib ) { ?>
        <div class="grid md:grid-cols-4 gap-4 grid-cols-1">
            <?php foreach ($contrib as $c):
                get_template_part('template-parts/archive/archive-vertical-staff','',['id' => $c->ID]);
            endforeach; ?>
        </div>
    <?php } ?>

</div>

<script>
    const second = 1000,
        minute = second * 60,
        hour = minute * 60,
        day = hour * 24;

    let countDown = new Date('<?php echo $deadline->format("M d, Y H:i:s")?>').getTime(),
        x = setInterval(function() {

            let now = new Date().getTime(),
                distance = countDown - now;

            document.querySelector('.days').innerText = Math.floor(distance / (day)),
                document.querySelector('.hours').innerText = Math.floor((distance % (day)) / (hour)),
                document.querySelector('.minutes').innerText = Math.floor((distance % (hour)) / (minute)),
                document.querySelector('.seconds').innerText = Math.floor((distance % (minute)) / second);

            //do something later when date is reached
            if (distance < 0) {
                document.getElementById('clockdiv').style.display = 'none'
                clearInterval(x);
            }

        }, second)
</script>
