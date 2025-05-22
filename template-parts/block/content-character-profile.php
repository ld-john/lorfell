<?php
$character_ID = get_the_ID();
$player = get_field('player', $character_ID);

if($player) {
    $playerID = $player->ID;
}

$artist = get_field('artist');
if($artist) {
    $artistID = $artist[0]->ID;
}

$appears_in = $appeared_in = [];

$campaigns = get_field('active_campaigns', $character_ID);
if ($campaigns) {

    foreach ($campaigns as $campaign) {
        if (has_blocks($campaign->ID)) {
            $post = get_post($campaign->ID);
            $blocks = parse_blocks($post->post_content);
            foreach ($blocks as $block) {
                if ('acf/campaign-details' === $block['blockName']) {
                    if (isset($block['attrs']['data']['campaign_type'])) {
                        if($block['attrs']['data']['campaign_type'] === 'ongoing') {
                            $appears_in[] = $post;
                        } else {
                            $appeared_in[] = $post;
                        }
                    }
                }
            }
        }
    }
}

$former_campaigns = get_field('former_campaigns', $character_ID);
if ($former_campaigns) {
    foreach ($former_campaigns as $campaign) {
        $appeared_in[] = $campaign;
    }
}

$guests = get_field('guest_appearances', $character_ID);
if ($guests) {
    foreach ($guests as $campaign) {
        $appeared_in[] = $campaign;
    }
}

$img = PostThumbnail(get_the_ID());

$npc = get_field('npc');

$related_characters = get_field('related_characters', $character_ID);
?>
<div class="flex justify-between gap-2">
    <div class="text-4xl bg-linear-to-b/oklch from-fbf-blue-700 to-fbf-blue text-white !border !border-b-0 !border-white font-handwriting px-6 pt-2 pb-3 rounded-t-lg inline-block">
        <h1><?php the_title(); ?></h1>
    </div>
    <div class="text-3xl bg-linear-to-b/oklch from-fbf-blue-700 to-fbf-blue text-orange-600 shrink-0 !border !border-b-0 !border-white font-handwriting px-6 pt-2 pb-3 rounded-t-lg inline-block"><?php if ($npc) { echo 'PC'; } else { echo 'NPC'; } ;?></div>
</div>
<div class="bg-fbf-blue !border-white !border p-6 rounded-br-lg font-display w-full h-full">
    <div class="card relative w-full sm:w-5/6 sm:h-[430px] flex flex-col justify-between sm:ml-20">
        <img src="<?php echo $img; ?>" alt="<?php the_title(); ?>" class="circle z-10 mx-auto sm:absolute !size-[180px] bg-fbf-blue rounded-full top-1/2 !-left-[100px] sm:!-translate-y-1/2 !border-8 !border-fbf-blue object-cover">
        <div class="box relative sm:w-[105%] sm:h-[200px] bg-white rounded-lg px-4 sm:pr-0 sm:!pl-32 py-10 overflow-y-auto">
            <div class="text-4xl font-handwriting rounded-t-lg inline-block mb-4">Backstory</div>
            <div class="max-w-full prose">
                <?php if (get_field('backstory')) { ?>
                    <?php echo get_field('backstory'); ?>
                <?php } ?>
            </div>
        </div>
        <div class="box relative mt-5 sm:mt-0 w-full sm:h-[220px] bg-white rounded-lg px-4 sm:!pl-32 py-10 sm:pr-8 overflow-y-auto">
            <div class="text-4xl font-handwriting rounded-t-lg inline-block mb-4">Basic Information</div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-4 gap-x-10 divide divide-gray-400">
                <?php // Check rows exists.
                if( have_rows('character_information') ):
                    // Loop through rows.
                    while( have_rows('character_information') ) : the_row();
                        ?>
                        <div class="flex justify-between font-display">
                            <span class="font-bold"><?php echo get_sub_field('heading'); ?></span>
                            <span><?php echo get_sub_field('details'); ?></span>
                        </div>
                    <?php

                        // End loop.
                    endwhile;

                endif;
                if($player) {

                    $img = get_the_post_thumbnail_url($playerID); ?>
                    <div class="flex justify-between font-display">
                    <span class="font-bold">
                        Played by
                    </span>
                        <a href="<?php echo get_the_permalink($playerID) ?>" class="underline">
                            <?php if ($img) : ?>
                                <img src="<?php echo $img ?>" alt="<?php echo get_the_title($playerID) ?>" class="size-10 rounded inline-block mr-2">
                            <?php endif; ?>
                            <?php echo get_the_title($playerID) ?>
                        </a>
                    </div>
                <?php }
                if($appears_in) {?>
                    <div class="flex font-display justify-between">
                        <span class="font-bold">Appears In</span>
                        <span class="prose max-w-full">
                        <ul>
                            <?php foreach( $appears_in as $campaign ): ?>
                                <li>
                                    <a href="<?php echo get_the_permalink($campaign->ID)?>">
                                        <?php echo $campaign->post_title ?>
                                    </a>
                                </li>
                            <?php endforeach ?>
                        </ul>

                    </span>
                    </div>
                <?php }
                if($appeared_in) { ?>
                    <div class="flex justify-between font-display">
                        <span class="font-bold">Appeared in</span>
                        <span class="prose max-w-full">
                        <ul>
                            <?php foreach( $appeared_in as $campaign ): ?>
                                <li>
                                    <a href="<?= get_the_permalink($campaign->ID)?>"> <?= $campaign->post_title ?></a>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </span>
                    </div>
                <?php } ?>
                <?php if($artist) { ?>
                    <div class="flex justify-between font-display">
                        <span class="font-bold">Profile Picture by</span>
                        <span class="prose max-w-full">
                            <a class="underline text-center" href="<?php echo get_the_permalink($artistID)?>"><?php echo get_the_title($artistID) ?></a>
                        </span>
                    </div>
                <?php } ?>
            </div>
        </div>

    </div>
</div>

<?php if (get_field('adventures')) { ?>
    <div class="my-10">
        <div class="text-4xl bg-linear-to-b/oklch from-fbf-blue-700 to-fbf-blue text-white !border !border-b-0 !border-white font-handwriting px-6 pt-2 pb-3 rounded-t-lg inline-block">Adventures</div>
        <div class="bg-fbf-blue !border-white !border p-6 rounded-br-lg font-display prose max-w-full">
            <?php echo get_field('adventures'); ?>
        </div>
    </div>
<?php } ?>

<?php if ($related_characters) { ?>
    <div class="bg-linear-to-b/oklch from-fbf-blue to-white mt-10 !border !border-white rounded !shadow-lg p-3 mb-4">
        <div class="text-4xl font-handwriting my-3 font-bold tracking-tight text-center">Relationships</div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <?php // Check rows exists.
            if( have_rows('relationships') ):

                // Loop through rows.
                while( have_rows('relationships') ) : the_row();
                    $character = get_sub_field('character')[0];
                    ?>
                    <?php get_template_part('template-parts/archive/archive-horizontal-character', '', ['character' => $character, 'relation' => get_sub_field('relationship')]); ?>

                <?php

                    // End loop.
                endwhile;

            endif; ?>
        </div>
    </div>

<?php } ?>
