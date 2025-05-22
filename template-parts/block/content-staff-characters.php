<?php $characters = get_field('characters', get_the_ID());

if($characters) { ?>
<div class="my-10">
    <div class="text-4xl bg-linear-to-b/oklch from-fbf-blue-700 to-fbf-blue text-white !border !border-b-0 !border-white font-handwriting px-6 pt-2 pb-3 rounded-t-lg inline-block">Characters played by <?php echo get_the_title() ?></div>
    <div class="bg-fbf-blue !border-white !border p-6 rounded-br-lg font-display">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php foreach ($characters as $character):
            get_template_part('template-parts/archive/archive-horizontal-character', '', ['character' => $character]);
            endforeach; ?>
        </div>
    </div>
</div>
<?php }
