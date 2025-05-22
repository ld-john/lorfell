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

<a href="<?php echo get_permalink($character); ?>" class="group relative block bg-black !shadow-lg hover:!shadow-xl">
    <img
            alt="<?php echo get_the_title($character); ?>"
            src="<?php echo $img; ?>"
            class="absolute inset-0 !size-full object-cover opacity-50 transition-opacity group-hover:opacity-30"
    />

    <div class="relative p-4 sm:p-6 lg:p-8">
        <p class="text-sm font-medium uppercase tracking-widest text-white">
            <?php if ($npc) { ?>
                NPC
            <?php } else { ?>
                PC
            <?php } ?>
        </p>

        <p class="text-xl font-handwriting text-balance font-bold text-white sm:text-3xl"><?php echo get_the_title($character); ?></p>

        <div class="mt-32 sm:mt-48 lg:mt-64">
            <div
                    class="translate-y-8 transform opacity-0 transition-all group-hover:translate-y-0 group-hover:opacity-100"
            >
                <p class="font-display text-white line-clamp-5">
                    <?php echo fbf_snippet($backstory, 35); ?>
                </p>
            </div>
        </div>
    </div>
</a>
