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
