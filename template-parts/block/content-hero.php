<?php getTwitchAPIToken();

$stream = twitchStreamInfoHero(get_field('twitch_channel', 'option'));
?>

<section class="relative border-b border-white/[.5]">
    <div class="h-96 hero-image bg-right-bottom bg-cover flex" style="background-image: url(<?php echo site_url(); ?>/wp-content/uploads/2021/09/fbf-bg-forest-1-fbf-blue-scaled.jpg);">
        <div class="relative container mx-auto p-4 flex justify-center items-center">
            <img src="<?php echo site_url(); ?>/wp-content/uploads/2020/04/logo-color@2x.png" class="max-h-full" alt="">
        </div>
    </div>
    <?php if($stream) { ?>
    <div class="bg-twitch-700 text-center py-4 lg:px-4">
        <a
                href="https://twitch.tv/ <?php echo get_field('twitch_channel', 'option'); ?>"
                class="p-2 bg-twitch items-center text-white leading-none lg:rounded-full flex lg:inline-flex hover:bg-twitch-300"
                role="alert"
        >
            <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3">Live</span>
            <span class="font-semibold mr-2 text-left flex-auto">Final Boss Fight is live on Twitch. Join the Party!</span>
            <svg class="fill-current opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/></svg>
        </a>
    </div>
    <?php } ?>
</section>
