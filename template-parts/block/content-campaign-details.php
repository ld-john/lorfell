<?php $campaign_type = get_field('campaign_type'); ?>

<div class="flex flex-col lg:flex-row gap-4 my-6">
    <div class="block bg-linear-to-b/oklch to-white from-fbf-blue !border !border-white rounded shadow-lg p-3 w-full lg:w-1/3 relative shrink-0">
        <div class="text-sunshade font-handwriting text-2xl absolute top-0 right-0 bg-white/75 px-2 py-1"><?php if ($campaign_type === 'ongoing') { echo 'Ongoing Campaign'; } elseif ($campaign_type === 'complete') { echo 'Completed Campaign'; } else { echo 'One-Shot Game'; }?></div>
        <img src="<?php echo PostThumbnail(get_the_ID()) ?>" alt="<?php the_title(); ?>" class="rounded">
    </div>
    <div class="w-full">
        <div class="flex flex-col lg:flex-row  justify-between lg:items-end">
            <div class="text-4xl bg-linear-to-b/oklch from-fbf-blue-700 to-fbf-blue text-white !border !border-b-0 !border-white font-handwriting px-6 pt-2 pb-3 rounded-t-lg inline-block">
                <h1><?php the_title(); ?></h1>
            </div>
            <div class="text-3xl bg-fbf-blue-700 text-sunshade !border !border-b-0 !border-white font-handwriting px-6 pt-2 pb-3 lg:rounded-t-lg inline-block"><?php echo get_field('game'); ?></div>
        </div>
        <div class="bg-fbf-blue !border-white !border p-6 rounded-br-lg font-display ">
            <div class="prose max-w-full">
                <div class="text-fbf-blue-900">
                    <?php echo get_field('synopsis'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
