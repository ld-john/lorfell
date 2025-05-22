<div class="my-10">
    <?php if (get_field('heading')) { ?>
    <div class="text-4xl bg-linear-to-b/oklch from-fbf-blue-700 to-fbf-blue text-white !border !border-b-0 !border-white font-handwriting px-6 pt-2 pb-3 rounded-t-lg inline-block"><?php echo get_field('heading');?></div>
    <?php } ?>
    <div class="bg-fbf-blue !border-white !border p-6 rounded-br-lg font-display inset-shadow-xl inset-fbf-blue-100">
        <div class="prose max-w-full">
            <?php echo get_field('content'); ?>
        </div>
    </div>
</div>
