<?php
$all_campaigns = new WP_Query(array(
    'post_type' => 'campaigns',
    'posts_per_page' => -1,
    'orderby' => 'title',
    'order' => 'ASC',
));
$ongoing = $complete = $oneShot = [];

foreach ($all_campaigns->posts as $post) {
    if (has_blocks($post->ID)) {
        $post = get_post($post->ID);
        $blocks = parse_blocks($post->post_content);
        foreach ($blocks as $block) {
            if ('acf/campaign-details' === $block['blockName']) {
                if (isset($block['attrs']['data']['campaign_type'])) {
                    if($block['attrs']['data']['campaign_type'] === 'ongoing') {
                        $ongoing[] = $post;
                    } elseif ($block['attrs']['data']['campaign_type'] === 'complete') {
                        $complete[] = $post;
                    } elseif ($block['attrs']['data']['campaign_type'] === 'one-shot') {
                        $oneShot[] = $post;
                    }
                }
            }
        }
    }
}

if ($ongoing) { ?>
<div class="my-10">
    <div class="text-4xl bg-linear-to-b/oklch from-fbf-blue-700 to-fbf-blue text-white !border !border-b-0 !border-white font-handwriting px-6 pt-2 pb-3 rounded-t-lg inline-block">Ongoing Campaigns</div>
    <div class="bg-fbf-blue !border-white !border p-6 rounded-br-lg">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <?php
            foreach ($ongoing as $item) {
                get_template_part( 'template-parts/archive/archive-vertical-campaign', null, ['postID' => $item->ID] );
            } ?>
        </div>
    </div>
</div>
<?php }
if ($oneShot) { ?>
    <div class="my-10">
        <div class="text-4xl bg-linear-to-b/oklch from-fbf-blue-700 to-fbf-blue text-white !border !border-b-0 !border-white font-handwriting px-6 pt-2 pb-3 rounded-t-lg inline-block">One-shots</div>
        <div class="bg-fbf-blue !border-white !border p-6 rounded-br-lg">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <?php
                foreach ($oneShot as $item) {
                    get_template_part( 'template-parts/archive/archive-vertical-campaign', null, ['postID' => $item->ID] );
                } ?>
            </div>
        </div>
    </div>
<?php }
if ($complete) { ?>
    <div class="my-10">
        <div class="text-4xl bg-linear-to-b/oklch from-fbf-blue-700 to-fbf-blue text-white !border !border-b-0 !border-white font-handwriting px-6 pt-2 pb-3 rounded-t-lg inline-block">Completed Campaigns</div>
        <div class="bg-fbf-blue !border-white !border p-6 rounded-br-lg">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <?php
                foreach ($complete as $item) {
                    get_template_part( 'template-parts/archive/archive-vertical-campaign', null, ['postID' => $item->ID] );
                } ?>
            </div>
        </div>
    </div>
<?php }
