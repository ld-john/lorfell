<?php
$achievements = get_posts(array(
    'post_type' => array('achievements'),
    'meta_query' => array(
        array(
            'key' => 'awarded_to', // name of custom field
            'value' => '"' . get_the_ID() . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
            'compare' => 'LIKE'
        )
    )
));


$facebook = $youtube = $twitch = $twitter = $instagram = $etsy = $sites = null;

$facebook = get_field('facebook_url');
$youtube = get_field('youtube_url');
$twitch = get_field('twitch');
$twitter = get_field('twitter');
$instagram = get_field('instagram_url');
$etsy = get_field('etsy_store_url');
$sites = get_field('other_websites');

?>

<div class="flex flex-col md:flex-row gap-4 my-6">
    <div class="w-full md:w-1/3">
        <div class="text-4xl bg-linear-to-b/oklch from-fbf-blue-700 to-fbf-blue text-white !border !border-b-0 !border-white font-handwriting px-6 pt-2 pb-3 rounded-t-lg inline-block">
            <h1>About <?php the_title(); ?></h1>
        </div>
        <div class="bg-fbf-blue !border-white !border p-6 rounded-br-lg font-display">
            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="rounded max-h-96 mx-auto">
        </div>

    </div>
    <div class="w-full md:w-2/3">
        <div class="mb-10">
            <div class="text-4xl bg-linear-to-b/oklch from-fbf-blue-700 to-fbf-blue text-white !border !border-b-0 !border-white font-handwriting px-6 pt-2 pb-3 rounded-t-lg inline-block">Intro</div>
            <div class="bg-fbf-blue !border-white !border p-6 rounded-br-lg font-display text-fbf-blue-900">
                <div><?php echo get_field('intro') ?></div>
            </div>
        </div>
        <?php if ($facebook || $twitch || $instagram || $youtube || $etsy || $sites ) : ?>
            <div class="my-10">
                <div class="text-4xl bg-linear-to-b/oklch from-fbf-blue-700 to-fbf-blue text-white !border !border-b-0 !border-white font-handwriting px-6 pt-2 pb-3 rounded-t-lg inline-block">Social</div>
                <div class="bg-fbf-blue !border-white !border p-6 rounded-br-lg font-display">
                    <div class="flex flex-col md:flex-row flex-wrap align-middle w-full space-y-4 md:space-y-0 md:space-x-6 ">
                        <?php if ($facebook) { ?>
                            <a href="<?php echo $facebook; ?>" class="group inline-flex justify-center items-center size-[62px] rounded-full !border-4 !border-fbf-blue-50 bg-fbf-blue-100 dark:!border-fbf-blue-900 dark:bg-fbf-blue-800 transition inset-ring-2 inset-ring-fbf-blue-600 hover:inset-ring-4 hover:!border-fbf-blue-200 hover:inset-ring-sunshade">
                                <i class="fa-brands fa-square-facebook fa-2x text-fbf-blue-600 dark:text-fbf-blue-400 transition duration-300 group-hover:text-sunshade group-hover:scale-125 group-hover:rotate-12 group-hover:shadow"></i>
                            </a>
                        <?php } ?>
                        <?php if ($youtube) { ?>
                            <a href="<?php echo $youtube; ?>" class="group inline-flex justify-center items-center size-[62px] rounded-full !border-4 !border-fbf-blue-50 bg-fbf-blue-100 dark:!border-fbf-blue-900 dark:bg-fbf-blue-800 transition inset-ring-2 inset-ring-fbf-blue-600 hover:inset-ring-4 hover:!border-fbf-blue-200 hover:inset-ring-sunshade">
                                <i class="fa-brands fa-youtube fa-2x text-fbf-blue-600 dark:text-fbf-blue-400 transition duration-300 group-hover:text-sunshade group-hover:scale-125 group-hover:rotate-12 group-hover:shadow"></i>
                            </a>
                        <?php } ?>
                        <?php if ($twitch) { ?>
                            <a href="https://www.twitch.tv/<?php echo $twitch; ?>" class="group inline-flex justify-center items-center size-[62px] rounded-full !border-4 !border-fbf-blue-50 bg-fbf-blue-100 dark:!border-fbf-blue-900 dark:bg-fbf-blue-800 transition inset-ring-2 inset-ring-fbf-blue-600 hover:inset-ring-4 hover:!border-fbf-blue-200 hover:inset-ring-sunshade">
                                <i class="fa-brands fa-twitch fa-2x text-fbf-blue-600 dark:text-fbf-blue-400 transition duration-300 group-hover:text-sunshade group-hover:scale-125 group-hover:rotate-12 group-hover:shadow"></i>
                            </a>
                        <?php } ?>
                        <?php if ($instagram) { ?>
                            <a href="<?php echo $instagram; ?>" class="group inline-flex justify-center items-center size-[62px] rounded-full !border-4 !border-fbf-blue-50 bg-fbf-blue-100 dark:!border-fbf-blue-900 dark:bg-fbf-blue-800 transition inset-ring-2 inset-ring-fbf-blue-600 hover:inset-ring-4 hover:!border-fbf-blue-200 hover:inset-ring-sunshade">
                                <i class="fa-brands fa-instagram fa-2x text-fbf-blue-600 dark:text-fbf-blue-400 transition duration-300 group-hover:text-sunshade group-hover:scale-125 group-hover:rotate-12 group-hover:shadow"></i>
                            </a>
                        <?php } ?>
                        <?php if ($etsy) { ?>
                            <a href="<?php echo $etsy; ?>" class="group inline-flex justify-center items-center size-[62px] rounded-full !border-4 !border-fbf-blue-50 bg-fbf-blue-100 dark:!border-fbf-blue-900 dark:bg-fbf-blue-800 transition inset-ring-2 inset-ring-fbf-blue-600 hover:inset-ring-4 hover:!border-fbf-blue-200 hover:inset-ring-sunshade">
                                <i class="fa-brands fa-etsy fa-2x text-fbf-blue-600 dark:text-fbf-blue-400 transition duration-300 group-hover:text-sunshade group-hover:scale-125 group-hover:rotate-12 group-hover:shadow"></i>
                            </a>
                        <?php } ?>

                        <?php if ($sites) {
                            foreach ($sites as $site) { ?>
                                <a href="<?php echo $site['site_url'] ?>" title="<?php echo $site['site_name'] ?>" class="group inline-flex justify-center items-center size-[62px] rounded-full !border-4 !border-fbf-blue-50 bg-fbf-blue-100 dark:!border-fbf-blue-900 dark:bg-fbf-blue-800 transition inset-ring-2 inset-ring-fbf-blue-600 hover:inset-ring-4 hover:!border-fbf-blue-200 hover:inset-ring-sunshade">
                                    <i class="fa-solid fa-globe fa-2x text-fbf-blue-600 dark:text-fbf-blue-400 transition duration-300 group-hover:text-sunshade group-hover:scale-125 group-hover:rotate-12 group-hover:shadow"></i>
                                </a>
                            <?php }
                        } ?>

                    </div>
                </div>
            </div>
        <?php endif; ?>

    </div>
</div>

<?php if ($achievements) : ?>
<div class="my-10">
    <div class="text-4xl bg-linear-to-b/oklch from-fbf-blue-700 to-fbf-blue text-white !border !border-b-0 !border-white font-handwriting px-6 pt-2 pb-3 rounded-t-lg inline-block">Achievements</div>
    <div class="bg-fbf-blue !border-white !border p-6 rounded-br-lg">
        <div class="flex flex-wrap gap-8 w-full">
            <?php foreach ($achievements as $achievement) { ?>
                <div style="background: url('<?php echo get_stylesheet_directory_uri() ?>/assets/img/golden-plate.png')" class="bg-contain bg-no-repeat w-[240px] h-[100px] flex justify-center items-center px-[30px] flex-col relative group">
                    <div class="font-bold text-xl font-condensed mb-0 text-gray-900 line-clamp-1">
                        <?php echo $achievement->post_title; ?>
                    </div>
                    <div class="absolute bottom-0 bg-linear-to-r/oklch from-fbf-blue-700 to-fbf-blue-500 px-4 py-2 rounded !shadow hidden group-hover:!block">
                        <div class="font-display font-light text-white">
                            <?php echo $achievement->post_content; ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
    <?php endif; ?>
