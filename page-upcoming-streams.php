<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Axiom
 * @since Axiom 1.0.1
 */

get_header();

$schedule = get_Multiple_Schedules(['finalbossfightlive', 'angelsgameplayer', 'benthequestgiver'], ['number' => 12]);

/* Start the Loop */ ?>

    <div id="tiles"></div>

    <article id="post-<?php the_ID(); ?>" <?php post_class('container mx-auto p-4'); ?>>
        <div class="text-4xl bg-linear-to-b/oklch from-fbf-blue-700 to-fbf-blue text-white !border !border-b-0 !border-white font-handwriting px-6 pt-2 pb-3 rounded-t-lg inline-block">
            <h1>Upcoming Streams</h1>
        </div>
        <div class="bg-fbf-blue !border-white !border p-6 rounded-br-lg">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
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
                    $thumbnail = null;
                    if ($event->category) {
                        $thumbnail = get_Twitch_Game_Thumbnail($event->category->id);
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

                                <div class="font-handwriting text-4xl text-balance text-gray-900">
                                    <?php echo $title; ?>
                                </div>
                                <?php if ($event->category) { ?>
                                    <p class="mt-2 text-gray-700 font-display"><span
                                                class="font-bold">Playing -</span> <?php echo $event->category->name ?>
                                    </p>
                                <?php } ?>
                            </div>

                            <div class="sm:flex sm:items-end sm:justify-end">
                                    <span class="block bg-fbf-blue px-5 py-3 text-center font-display font-light uppercase text-white border border-white">
                                        <?php echo $event->streamer ?>
                                    </span>
                            </div>
                        </div>
                    </a>
                    <?php
                }
                ?>
            </div>
        </div>
    </article>
<?php
get_footer();
