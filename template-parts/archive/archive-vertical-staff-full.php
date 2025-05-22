<?php
$postID = $args['id'] ?? get_the_id();
if (has_post_thumbnail($postID)) {
    $image = get_the_post_thumbnail_url($postID) ?? 'Hello';
} else {
    $image = get_stylesheet_directory_uri() . '/assets/img/placeholder.png';
}
$intro = get_field('intro', $postID);

$facebook = $youtube = $twitch = $twitter = $instagram = $etsy = $sites = null;

if (has_blocks($postID)) {
    $post = get_post($postID);
    $blocks = parse_blocks($post->post_content);
    foreach ($blocks as $block) {
        if ('fbf/staff-profiles' === $block['blockName']) {
            $intro = $block['attrs']['data']['intro'];
            if (isset($block['attrs']['data']['facebook_url'])) {
                $facebook = $block['attrs']['data']['facebook_url'];
            }
            if (isset($block['attrs']['data']['youtube_url'])) {
                $youtube = $block['attrs']['data']['youtube_url'];
            }
            if (isset($block['attrs']['data']['twitch'])) {
                $twitch = $block['attrs']['data']['twitch'];
            }
            if (isset($block['attrs']['data']['instagram_url'])) {
                $instagram = $block['attrs']['data']['instagram_url'];
            }
            if (isset($block['attrs']['data']['etsy_store_url'])) {
                $etsy = $block['attrs']['data']['etsy_store_url'];
            }

            if (isset($block['attrs']['data']['other_websites']) && $block['attrs']['data']['other_websites'] > 0) {

                for ($i = 0; $i < $block['attrs']['data']['other_websites']; $i++) {
                    $sites[$i]['url'] = $block['attrs']['data']['other_websites_0_site_url'];
                    $sites[$i]['name'] = $block['attrs']['data']['other_websites_0_site_name'];
                }
            }
        }
    }
}

?>
<div class="bg-linear-to-r/oklch from-fbf-blue-600 to-fbf-blue-300 !border-2 !border-white grid grid-rows-[412px_auto] !shadow-lg">
    <a href="<?php echo get_permalink($postID); ?>" class="group relative block bg-black">
        <img
                alt="<?php echo get_the_title($postID); ?>"
                src="<?php echo $image ?>"
                class="absolute inset-0 !size-full object-cover opacity-75 transition-opacity group-hover:opacity-50"
        />

        <div class="relative p-4 sm:p-6 lg:p-8 h-full flex flex-col justify-between">
            <p class="text-xl text-balance text-white font-handwriting sm:text-3xl"><?php echo get_the_title($postID); ?></p>

            <div>
                <div
                        class="translate-y-8 transform opacity-0 transition-all group-hover:translate-y-0 group-hover:opacity-100"
                >
                    <div class="font-display text-white line-clamp-3">
                        <?php echo $intro ?>
                    </div>
                </div>
            </div>
        </div>
    </a>
    <div class="has-[a]:my-4 flex items-center justify-center gap-4 flex-wrap">
        <?php if ($facebook) { ?>
            <a href="<?php echo $facebook; ?>" class="group inline-flex justify-center items-center size-12 rounded-full !border-4 !border-fbf-blue-50 bg-fbf-blue-100 dark:!border-fbf-blue-900 dark:bg-fbf-blue-800 transition inset-ring-2 inset-ring-fbf-blue-600 hover:inset-ring-4 hover:!border-fbf-blue-200 hover:inset-ring-sunshade">
                <i class="fa-brands fa-square-facebook fa-xl text-fbf-blue-600 dark:text-fbf-blue-400 transition duration-300 group-hover:text-sunshade group-hover:scale-125 group-hover:rotate-12 group-hover:shadow"></i>
            </a>
        <?php } ?>
        <?php if ($youtube) { ?>
            <a href="<?php echo $youtube; ?>" class="group inline-flex justify-center items-center size-12 rounded-full !border-4 !border-fbf-blue-50 bg-fbf-blue-100 dark:!border-fbf-blue-900 dark:bg-fbf-blue-800 transition inset-ring-2 inset-ring-fbf-blue-600 hover:inset-ring-4 hover:!border-fbf-blue-200 hover:inset-ring-sunshade">
                <i class="fa-brands fa-youtube fa-xl text-fbf-blue-600 dark:text-fbf-blue-400 transition duration-300 group-hover:text-sunshade group-hover:scale-125 group-hover:rotate-12 group-hover:shadow"></i>
            </a>
        <?php } ?>
        <?php if ($twitch) { ?>
            <a href="https://www.twitch.tv/<?php echo $twitch; ?>" class="group inline-flex justify-center items-center size-12 rounded-full !border-4 !border-fbf-blue-50 bg-fbf-blue-100 dark:!border-fbf-blue-900 dark:bg-fbf-blue-800 transition inset-ring-2 inset-ring-fbf-blue-600 hover:inset-ring-4 hover:!border-fbf-blue-200 hover:inset-ring-sunshade">
                <i class="fa-brands fa-twitch fa-xl text-fbf-blue-600 dark:text-fbf-blue-400 transition duration-300 group-hover:text-sunshade group-hover:scale-125 group-hover:rotate-12 group-hover:shadow"></i>
            </a>
        <?php } ?>
        <?php if ($instagram) { ?>
            <a href="<?php echo $instagram; ?>" class="group inline-flex justify-center items-center size-12 rounded-full !border-4 !border-fbf-blue-50 bg-fbf-blue-100 dark:!border-fbf-blue-900 dark:bg-fbf-blue-800 transition inset-ring-2 inset-ring-fbf-blue-600 hover:inset-ring-4 hover:!border-fbf-blue-200 hover:inset-ring-sunshade">
                <i class="fa-brands fa-instagram fa-xl text-fbf-blue-600 dark:text-fbf-blue-400 transition duration-300 group-hover:text-sunshade group-hover:scale-125 group-hover:rotate-12 group-hover:shadow"></i>
            </a>
        <?php } ?>

        <?php if ($etsy) { ?>
            <a href="<?php echo $etsy ?>" class="group inline-flex justify-center items-center size-12 rounded-full !border-4 !border-fbf-blue-50 bg-fbf-blue-100 dark:!border-fbf-blue-900 dark:bg-fbf-blue-800 transition inset-ring-2 inset-ring-fbf-blue-600 hover:inset-ring-4 hover:!border-fbf-blue-200 hover:inset-ring-sunshade">
                <i class="fa-brands fa-etsy fa-xl text-fbf-blue-600 dark:text-fbf-blue-400 transition duration-300 group-hover:text-sunshade group-hover:scale-125 group-hover:rotate-12 group-hover:shadow"></i>
            </a>
        <?php } ?>
        <?php if ($sites) {
            foreach ($sites as $site) { ?>
                <a href="<?php echo $site['url'] ?>" title="<?php echo $site['name'] ?>" class="group inline-flex justify-center items-center size-12 rounded-full !border-4 !border-fbf-blue-50 bg-fbf-blue-100 dark:!border-fbf-blue-900 dark:bg-fbf-blue-800 transition inset-ring-2 inset-ring-fbf-blue-600 hover:inset-ring-4 hover:!border-fbf-blue-200 hover:inset-ring-sunshade">
                    <i class="fa-solid fa-globe fa-xl text-fbf-blue-600 dark:text-fbf-blue-400 transition duration-300 group-hover:text-sunshade group-hover:scale-125 group-hover:rotate-12 group-hover:shadow"></i>
                </a>
            <?php }
        } ?>
    </div>
</div>
