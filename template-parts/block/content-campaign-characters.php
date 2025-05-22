<?php
global $post;
$campaign_id = get_the_ID();
$characters = get_field('characters', $campaign_id);
$guests = get_field('special_guests', $campaign_id);
$former = get_field('former_characters', $campaign_id);
?>
<?php if ($characters) { ?>
    <div class="my-10">
        <div class="text-4xl bg-linear-to-b/oklch from-fbf-blue-700 to-fbf-blue text-white !border !border-b-0 !border-white font-handwriting px-6 pt-2 pb-3 rounded-t-lg inline-block">Characters</div>
        <div class="bg-fbf-blue !border-white !border p-6 rounded-br-lg font-display">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php foreach ($characters as $character):
                    get_template_part('template-parts/archive/archive-horizontal-character', '', ['character_id' => $character]);
                endforeach; ?>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($guests) { ?>
    <div class="my-10">
        <div class="text-4xl bg-linear-to-b/oklch from-fbf-blue-700 to-fbf-blue text-white !border !border-b-0 !border-white font-handwriting px-6 pt-2 pb-3 rounded-t-lg inline-block">Special Guests</div>
        <div class="bg-fbf-blue !border-white !border p-6 rounded-br-lg font-display">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php foreach ($guests as $character):
                    get_template_part('template-parts/archive/archive-horizontal-character', '', ['character_id' => $character]);
                endforeach; ?>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($former) { ?>
    <div class="my-10">
        <div class="text-4xl bg-linear-to-b/oklch from-fbf-blue-700 to-fbf-blue text-white !border !border-b-0 !border-white font-handwriting px-6 pt-2 pb-3 rounded-t-lg inline-block">Former Characters</div>
        <div class="bg-fbf-blue !border-white !border p-6 rounded-br-lg font-display">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php foreach ($former as $character):
                    get_template_part('template-parts/archive/archive-horizontal-character', '', ['character_id' => $character]);
                endforeach; ?>
            </div>
        </div>
    </div>
<?php } ?>
