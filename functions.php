<?php
/* enqueue scripts and style from parent theme */

add_action( 'wp_enqueue_scripts', 'axiom_enqueue_styles' );
function axiom_enqueue_styles() {
    $parenthandle = 'axiomwind'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css',
        array(),  // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version') // this only works if you have Version in the style header
    );

    wp_enqueue_style('tailwind', get_stylesheet_directory_uri() . '/build.css',);
}

require_once( get_stylesheet_directory() . '/custom-functions/post-types.php' );

/**
 * Registers an editor stylesheet for the theme.
 */
function link_theme_add_editor_styles() {
    add_editor_style( 'build.css' );
}
add_action( 'admin_init', 'link_theme_add_editor_styles' );

function final_boss_fight_blocks_registration() {
    if ( ! function_exists( 'register_block_type' ) ) {
        // Block editor is not available.
        return;
    }

    register_block_type( dirname(__FILE__) . '/blocks/hero-block.json' );
    register_block_type( dirname(__FILE__) . '/blocks/podcasts-block.json' );
    register_block_type( dirname(__FILE__) . '/blocks/upcoming-streams-block.json' );
    register_block_type( dirname(__FILE__) . '/blocks/archive-block.json' );
    register_block_type( dirname(__FILE__) . '/blocks/staff/profiles-block.json' );
    register_block_type( dirname(__FILE__) . '/blocks/staff/bio-block.json' );
    register_block_type( dirname(__FILE__) . '/blocks/staff/twitch-block.json' );
    register_block_type( dirname(__FILE__) . '/blocks/staff/characters-block.json' );
    register_block_type( dirname(__FILE__) . '/blocks/staff/posts-block.json' );
    register_block_type( dirname(__FILE__) . '/blocks/event/details-block.json' );
    register_block_type( dirname(__FILE__) . '/blocks/event/attendees-block.json' );
    register_block_type( dirname(__FILE__) . '/blocks/event/sub-events-block.json' );
    register_block_type( dirname(__FILE__) . '/blocks/rpg/character/profile-block.json' );
    register_block_type( dirname(__FILE__) . '/blocks/rpg/character/gallery-block.json' );
    register_block_type( dirname(__FILE__) . '/blocks/rpg/character/relationships-block.json' );
    register_block_type( dirname(__FILE__) . '/blocks/rpg/campaign/trailer-block.json' );
    register_block_type( dirname(__FILE__) . '/blocks/text-box-block.json' );
}

// Hook: Editor assets.
add_action( 'init', 'final_boss_fight_blocks_registration' );

add_action('acf/init', 'my_child_acf_init');
function my_child_acf_init() {

    // check function exists
    if( function_exists('acf_register_block') ) {

        acf_register_block(array(
            'name' => 'character-stories',
            'title' => __('Character Stories'),
            'description' => __('A block to display stories about the character'),
            'render_template'   => 'template-parts/block/content-character-stories.php',
            'category' => 'formatting',
            'icon' => 'align-full-width',
            'keywords' => array('rpg'),
            'align' => 'full',
        ));
        acf_register_block(array(
            'name' => 'character-playlists',
            'title' => __('Character Playlists'),
            'description' => __('A block to display the playlist of the character'),
            'render_template'   => 'template-parts/block/content-character-playlists.php',
            'category' => 'formatting',
            'icon' => 'align-full-width',
            'keywords' => array('rpg'),
            'align' => 'full',
        ));
        acf_register_block(array(
            'name' => 'campaign-details',
            'title' => __('Campaign Details'),
            'description' => __('A block to show the details of the campaign'),
            'render_template'   => 'template-parts/block/content-campaign-details.php',
            'category' => 'formatting',
            'icon' => 'align-full-width',
            'keywords' => array('campaign'),
            'align' => 'full',
        ));
        acf_register_block(array(
            'name' => 'campaign-characters',
            'title' => __('Campaign Characters'),
            'description' => __('A block to display the characters in a campaign'),
            'render_template'   => 'template-parts/block/content-campaign-characters.php',
            'category' => 'formatting',
            'icon' => 'align-full-width',
            'keywords' => array('campaign'),
            'align' => 'full',
        ));
        acf_register_block(array(
            'name' => 'campaign-playlist',
            'title' => __('Campaign Playlist'),
            'description' => __('A block to display the video playlist of a campaign'),
            'render_template'   => 'template-parts/block/content-campaign-playlist.php',
            'category' => 'formatting',
            'icon' => 'align-full-width',
            'keywords' => array('campaign'),
            'align' => 'full',
        ));
    }
}

/**
 * get a certain amount of words for either title or excerpt
 * defaults = title
 *
 * usage fbf_snippet( type, words, post_id )
 */

function fbf_snippet($type='title', $limit = 20, $id=NULL) {
    if( !$id ){
        $id=get_the_id();
    }

    if ( $type == 'title' ) {
        $snippet = explode(' ', get_the_title($id), $limit);
    } elseif ( $type == 'excerpt' ) {
        $snippet = explode( ' ', get_the_excerpt($id), $limit );
    } else {
        $snippet = explode( ' ', $type, $limit);
    }

    if ( count( $snippet ) >= $limit ) {
        array_pop( $snippet );
        $snippet = implode(" ", $snippet ).'...';
    } else {
        $snippet = implode(" ", $snippet );
    }
    return preg_replace('`\[[^\]]*\]`','',$snippet);
}
function getTwitchAPIToken()
{
    $client_id = get_field('client_id', 'option');
    $client_secret = get_field('client_secret', 'option');
    $auth_token = get_field('twitch_api_access_token', 'option');

    $args = array(
        'headers' => array(
            'Authorization' => $auth_token,
            'Client-Id' => $client_id
        )
    );

    $test = wp_remote_get('https://api.twitch.tv/helix/channels?broadcaster_id=55775590', $args);

    if(!is_wp_error($test)){
        if ($test['response']['code'] !== '200') {
            $twitch_call = wp_remote_post('https://id.twitch.tv/oauth2/token?client_id='. $client_id .'&client_secret=' . $client_secret . '&grant_type=client_credentials');
            $twitch_call = json_decode($twitch_call['body']);
            $access_token = 'Bearer ' . $twitch_call->access_token;
            update_field('twitch_api_access_token', $access_token, 'option');
        }
    }
}

function Twitch_Call_args(): array
{
    $client_id = get_field('client_id', 'option');
    $auth_token = get_field('twitch_api_access_token', 'option');

    return array(
        'headers' => array(
            'Authorization' => $auth_token,
            'Client-Id' => $client_id
        )
    );
}

function get_Twitch_Channel_ID($twitch)
{
    $args = Twitch_Call_args();
    $data = wp_remote_get('https://api.twitch.tv/helix/users?login='. $twitch, $args);
    $data = json_decode($data['body']);
    $data = $data->data[0];
    return  $data->id;
}

function get_Twitch_Channel_Details($twitch): string
{

//$twitch = 'teething_korea';
    $args = Twitch_Call_args();

    $data = wp_remote_get('https://api.twitch.tv/helix/users?login='. $twitch, $args);
    $data = json_decode($data['body']);
    $data = $data->data[0];
    $channel_id = $data->id;
    $stream = wp_remote_get('https://api.twitch.tv/helix/streams?user_login='. $twitch, $args);
    $stream = json_decode($stream['body']);
    $stream = $stream->data[0] ?? null;
    $html = '';
    if ($stream) {
        $thumb = str_replace('{width}x{height}', '500x289', $stream->thumbnail_url) ?? null;
        $date = strtotime($stream->started_at);
        $full_date = strtotime('Y-m-d', $date);
        $date_2 = date('F d', $date);
        $date = date( 'Y', $date);


        $html .= '<article class="flex bg-white transition hover:shadow-xl">
  <div class="rotate-180 p-2 [writing-mode:_vertical-lr]">
    <time
      datetime="'. $full_date .'"
      class="flex items-center justify-between gap-4 font-bold uppercase text-gray-900"
    >
      <span>'. $date .'</span>
      <span class="w-px flex-1 bg-gray-900/10"></span>
      <span>'. $date_2 .'</span>
    </time>
  </div>

  <div class="hidden sm:block sm:basis-72">
    <img
      alt=""
      src="'. $thumb .'"
      class="aspect-square h-full w-full object-cover"
    />
  </div>

  <div class="flex flex-1 flex-col justify-between">
    <div class="border-s border-gray-900/10 p-4 sm:border-l-transparent sm:p-6">
      <a href="https://www.twitch.tv/'. $twitch .'">
        <h3 class="text-4xl font-handwriting text-balance text-gray-900">
          '. $data->display_name . ' is live now, playing ' . $stream->game_name .'
        </h3>
      </a>

      <p class="mt-2 line-clamp-3 font-display text-relaxed text-gray-700">
        '. $stream->title .'
      </p>
    </div>

    <div class="sm:flex sm:items-end sm:justify-end">
      <a
        href="https://www.twitch.tv/'. $twitch .'"
        class="block bg-fbf-blue px-5 py-3 text-center text-xl font-light font-display uppercase text-gray-900 transition text-white"
      >
        Watch Now
      </a>
    </div>
  </div>
</article>';
    } else {
        $html .= '<article class="flex flex-col md:flex-row align-middle gap-4">';
        $html .= '<img src="'. $data->profile_image_url .'" class="rounded shadow w-24 mx-auto md:mx-0 object-cover">';
        $html .= '<div><h2 class="text-4xl font-handwriting text-balance text-white my-3 text-center">';
        $html .= $data->display_name .' is currently offline</h2>';
        $html .= '<p class="pb-4 font-display text-white">' . $data->description . '</p></div>';
        $html .= '</article>';
        $html .= getTwitchVideos($channel_id);
    }
    return $html;

}

function getTwitchVideos($twitch): string
{
    $args = Twitch_Call_args();
    $video = wp_remote_get('https://api.twitch.tv/helix/videos?user_id='. $twitch .'&type=archive&first=4', $args);
    $video = json_decode($video['body']);

    $html = '<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 px-4 my-10">';
    foreach ($video->data as $video) {
        $start_date = strtotime($video->created_at);
        $date = date( 'Y-m-d', $start_date);
        $date_formatted_a = date( 'Y', $start_date);
        $date_formatted_b = date('F d', $start_date);
        $thumbnail = str_replace('%{width}x%{height}', '1280x960', $video->thumbnail_url);
        $html .= '
<a href="'. $video->url .'" class="flex bg-white transition hover:shadow-xl">
    <div class="rotate-180 p-2 [writing-mode:_vertical-lr]">
        <time
                datetime="'. $date .'"
                class="flex items-center justify-between gap-4 font-display font-bold uppercase text-gray-900"
        >
            <span>'. $date_formatted_a .'</span>
            <span class="w-px flex-1 bg-gray-900/10"></span>
            <span>'. $date_formatted_b .'</span>
        </time>
    </div>
    <div class="flex flex-col">

        <div class="hidden sm:block">
            <img
                    alt="' . $video->title .'"
                    src="'. $thumbnail .'"
                    class="aspect-h-9 size-full object-cover"
            />
        </div>

        <div class="flex flex-1 flex-col justify-between">
            <div class="border-s border-gray-900/10 p-4 sm:border-l-transparent sm:p-6">

                    <h3 class="font-handwriting text-2xl text-balance text-gray-900 line-clamp-3">
                        ' . $video->title .'
                    </h3>

            </div>
        </div>

    </div>
</a>';
    }
    $html .= '</div>';
    return $html;

}

function twitchStreamInfoHero($twitch)
{
    //$twitch = 'acetrainerliam';
    $args = Twitch_Call_args();
    $stream = wp_remote_get('https://api.twitch.tv/helix/streams?user_login='. $twitch, $args);
    if (!is_wp_error($stream)) {
        $stream = json_decode($stream['body']);
        if (isset($stream->data[0])) {
            return $stream->data[0];
        }
    }
    return false;
}

function get_Twitch_Schedule($twitch, $args = [])
{
    if (get_transient( 'schedule_' . $twitch )) {
        return get_transient( 'schedule_' . $twitch );
    } else {

        $number = $args['number'] ?? 20;
        $channel_id = get_Twitch_Channel_ID($twitch);

        $schedule = wp_remote_get('https://api.twitch.tv/helix/schedule?broadcaster_id=' . $channel_id . '&first=' . $number, Twitch_Call_args());

        $body = json_decode($schedule['body']);

        if (isset($body->data)) {
            $schedule = $body->data->segments;
            $vacation = $body->data->vacation;
        } else {
            $schedule = $vacation = null;
        }

        if ($schedule) {
            foreach ($schedule as $event) {
                $event->streamer = $body->data->broadcaster_name;
            }

            if ($vacation) {
                $schedule = array_filter($schedule, function ($event) use ($vacation) {
                    return !($event->start_time > $vacation->start_time && $event->start_time < $vacation->end_time);
                });
            }

            return set_transient('schedule_' . $twitch, $schedule, DAY_IN_SECONDS);
        }

        return set_transient('schedule_' . $twitch, null, DAY_IN_SECONDS);
    }
}

function get_Multiple_Schedules(array $twitch, array $args = []): ?array
{
    $number = $args['number'] ?? 4;
    $days = $args['days'] ?? 14;
    if (isset($args['start'])) {
        $start = strtotime($args['start']) ?? null;
    } else {
        $start = null;
    }
    $schedule = null;

    foreach ($twitch as $streamer) {
        $streams = get_Twitch_Schedule($streamer);

        if ($streams && is_array($streams)) {
            foreach ($streams as $stream) {
                $schedule[] = $stream;
            }
        }
    }
    if ($schedule) {
        uasort(
            $schedule,
            fn($a, $b) => strtotime($a->start_time) <=> strtotime($b->start_time)
        );

        $schedule = array_splice($schedule, 0, $number);

        if ($start) {
            $schedule = array_filter($schedule, function ($event) use ($start) {
                return strtotime($event->start_time) > $start;
            });
        }

        $last_date = strtotime('midnight +' . $days . ' days');

        return array_filter($schedule, function ($event) use ($last_date) {
            return strtotime($event->start_time) < $last_date;
        });
    }
    return null;
}

function get_Twitch_Game_Thumbnail($game) {
    $game = wp_remote_get('https://api.twitch.tv/helix/games?id='. $game, Twitch_Call_args());
    $game = json_decode($game['body']);
    $thumbnail = $game->data[0]->box_art_url;

    return str_replace('{width}x{height}', '153x204', $thumbnail);
}

function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

function fbf_main_nav($menu)
{
    $bool = false;
    $menu_items = wp_get_nav_menu_items($menu);
    $menu_list = '<nav id="navbar-collapse-with-animation" class="hs-collapse hidden transition-all font-display duration-300 basis-full grow lg:block">' . "\n";
    $menu_list .= '<ul class="flex flex-col gap-y-4 gap-x-0 mt-5 lg:flex-row lg:items-center lg:justify-end lg:gap-y-0 lg:gap-x-7 lg:mt-0 lg:pl-7 absolute lg:relative bg-fbf-blue p-4 lg:p-0 z-50">' . "\n";
    foreach ($menu_items as $menu_item) {
        if ($menu_item->menu_item_parent == 0) {
            $parent = $menu_item->ID;
            $menu_array = array();
            foreach ($menu_items as $submenu) {
                if ($submenu->menu_item_parent == $parent) {
                    $bool = true;
                    $menu_array[] = '<li><a class="font-medium block px-4 text-white/[.8] hover:text-white lg:py-2 hover:bg-fbf-blue-800 block" href="' . $submenu->url . '">' . $submenu->title . '</a></li>' . "\n";
                }
            }
            if ($bool && count($menu_array) > 0) {
                $menu_list .= '<li class="dropdown relative group">' . "\n";
                $menu_list .= '<a href="' . $menu_item->url . '" class="font-medium text-white/[.8] group-hover:text-white sm:py-6" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">' . $menu_item->title . ' <span class="caret"></span></a>' . "\n";

                $menu_list .= '<ul class="block w-48 lg:hidden mt-5 ml-10 lg:ml-0 group-hover:block relative lg:absolute bg-fbf-blue z-10 font-display lg:divide-y lg:divide-white lg:border-white lg:border">' . "\n";
                $menu_list .= implode("\n", $menu_array);
                $menu_list .= '</ul>' . "\n";
            } else {
                $menu_list .= '<li class="group">' . "\n";
                $menu_list .= '<a href="' . $menu_item->url . '" class="font-medium text-white/[.8] hover:text-white sm:py-6">' . $menu_item->title . '</a>' . "\n";
            }
        }

        $menu_list .= '</li>' . "\n";
    }
    $menu_list .= '</ul>' . "\n";
    $menu_list .= '</nav>' . "\n";
    echo $menu_list;
}
