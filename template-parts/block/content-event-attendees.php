<?php $contrib = get_field('attendees'); ?>

<h2 class="text-4xl bg-fbf-blue-700 text-white border border-b-0 border-white font-handwriting px-6 pt-2 pb-3 rounded-t-lg inline-block">Attending</h2>
<div class="bg-fbf-blue border-white border p-6 rounded-br-lg font-display">
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-8">
        <?php foreach ($contrib as $c) :
            get_template_part('template-parts/archive/archive-vertical-staff', '', ['id' => $c]);
        endforeach; ?>
    </div>
</div>
