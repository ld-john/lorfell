<?php
if (isset($args['character_id'])) {
    $character = $args['character_id'];
} elseif (isset($args['character'])) {
    $character = $args['character']->ID;
} else {
    $character = get_the_ID();
}
$img = PostThumbnail($character);
$backstory = null;
$npc = false;

if (has_blocks($character)) {
    $post = get_post($character);
    $blocks = parse_blocks($post->post_content);
    foreach ($blocks as $block) {
        if ('fbf/rpg-character-profile' === $block['blockName']) {
            if (isset($block['attrs']['data']['backstory'])) {
                $backstory = $block['attrs']['data']['backstory'];
            }
            if (isset($block['attrs']['data']['npc']) && $block['attrs']['data']['npc'] === '0') {
                $npc = true;
            }
        }
    }
}
?>

<a href="<?php echo get_permalink($character); ?>" class="fbf-vertical-card relative shadow transition origin-top-left hover:shadow-lg hover:-rotate-6 ">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/thumbtack.png" alt="thumbtack" class="absolute h-10 z-10 top-1 left-1">
    <span class="relative">
        <img class="w-full my-0 max-h-64 object-contain object-center px-5 pt-5" src="<?php echo $img ?>" alt="<?php echo get_the_title($character); ?>">
        <h2 class="text-orange-600 font-handwriting text-2xl absolute top-0 right-0 bg-white/75 px-2 py-1"><?php if ($npc) { echo 'NPC'; } else { echo 'PC'; } ;?></h2>
    </span>

    <div class="px-6 py-4">
        <div class="font-handwriting text-3xl mb-2 dark:text-gray-200"><?php echo get_the_title($character); ?></div>
    </div>
</a>
