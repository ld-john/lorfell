<?php
$post_ID = get_the_ID();
$startDate = get_field('start_date', $post_ID);
$endDate = get_field('end_date', $post_ID);
$address = get_field('address');
$deadline = new DateTime($startDate);
$dateNow = new DateTime();
$month = $deadline->format('F');
$daynum = $deadline->format('j');
$daytext = $deadline->format('D');
$time = $deadline->format('h:i a');

$date_start = $deadline->format('Y-m-d');
$start_year = $deadline->format('Y');
$start_month = $deadline->format('M d');

$thumb_id = get_post_thumbnail_id();
$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'small', true);
$img = $thumb_url_array[0];
if (strpos($img, 'media/default.png') !== false) {
    $img = get_stylesheet_directory_uri(). '/assets/img/placeholder.png';
}

?>

    <article class="flex bg-white my-10">

        <div class="rotate-180 p-2 [writing-mode:_vertical-lr]">
            <time
                    datetime="<?php echo $date_start ?>"
                    class="flex items-center justify-between gap-4 font-condensed font-bold uppercase text-gray-900"
            >
                <span><?php echo $start_year ?></span>
                <span class="w-px flex-1 bg-gray-900/10"></span>
                <span><?php echo $start_month ?></span>
            </time>
            <p class="font-bold font-condensed uppercase text-gray-900 text-center">Start</p>
        </div>

        <div class="hidden sm:block sm:basis-56">
            <img
                    alt="<?php the_title(); ?>"
                    src="<?php echo $img; ?>"
                    class="aspect-square h-full w-full object-cover"
            />
        </div>

        <div class="flex font-display flex-1 flex-col justify-between">
            <div class="border-s border-gray-900/10 p-4 sm:border-l-transparent sm:p-6">
                <?php if ($address) { ?>
                <h4 class="font-semibold text-gray-900 text-lg">
                    <?php echo $address; ?>
                </h4>
                <?php } ?>
                <div class="mt-2 text-gray-700 prose max-w-full">
                    <?php echo get_field('description'); ?>
                </div>
            </div>
        </div>
        <?php
        if ($dateNow < $deadline) {
        ?>
        <div class="text-center self-center mr-4 ">
            <div id="clockdiv" class="flex gap-4">
                <div class="bg-fbf-blue rounded-lg shadow-lg p-3">
                    <div class="font-handwriting text-3xl">Starting in:</div>
                    <span class="days text-6xl font-condensed"></span>
                    <div class="font-handwriting text-2xl">Days</div>
                </div>
            </div>
        </div>
        <?php } ?>
    </article>






<script>
    const second = 1000,
        minute = second * 60,
        hour = minute * 60,
        day = hour * 24;

    let countDown = new Date('<?php echo $deadline->format("M d, Y H:i:s")?>').getTime(),
        x = setInterval(function() {

            let now = new Date().getTime(),
                distance = countDown - now;

            document.querySelector('.days').innerText = Math.floor(distance / (day)).toString();
            console.log(distance < 0)

            //do something later when date is reached
            if (distance < 0) {
                document.getElementById('clockdiv').style.display = 'none'
                clearInterval(x);
            }

        }, second)
</script>
