<div class="my-10">
    <div class="text-4xl bg-linear-to-b/oklch from-fbf-blue-700 to-fbf-blue text-white !border !border-b-0 !border-white font-handwriting px-6 pt-2 pb-3 rounded-t-lg inline-block">Gallery</div>
    <div class="bg-fbf-blue !border-white !border p-6 rounded-br-lg font-display">
        <?php // Check rows exists.
        if( have_rows('gallery') ): ?>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8">
            <?php // Loop through rows.
            while( have_rows('gallery') ) : the_row();
                ?>
                <div class="w-full bg-white rounded shadow p-6 flex flex-col justify-between relative shadow transition origin-top-left hover:shadow-lg hover:-rotate-6">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/thumbtack.png" alt="thumbtack" class="absolute h-10 z-10 top-1 left-1">
                    <a href="<?php echo get_sub_field('image')['url'] ?>" data-lightbox="image-1" data-title="<?php echo get_the_title(); ?>"><img
                            src="<?php echo get_sub_field('image')['sizes']['thumbnail'] ?>" alt="" class="h-48 w-full object-cover"></a>
                    <?php if (get_sub_field('artist')) {
                        echo '<div class="mt-4 text-center text-2xl font-handwriting">Art by: <a href="'. get_permalink(get_sub_field('artist')[0]->ID) .'" class="underline text-orange-600">' . get_the_title(get_sub_field('artist')[0]->ID) . '</a></div>';
                    } elseif (get_sub_field('artist_name') && get_sub_field('artist_link')) { ?>
                        <div class="mt-4 text-center text-2xl font-handwriting">Art By: <a href="<?php echo get_sub_field('artist_link')['url'] ?>" class="underline text-orange-600"><?php echo get_sub_field('artist_name'); ?></a></div>
                    <?php } elseif (get_sub_field('artist_name')) { ?>
                        <div class="mt-4 text-center text-2xl font-handwriting">Art By: <?php echo get_sub_field('artist_name'); ?></div>
                    <?php } ?>
                </div>
                <?php

            // End loop.
            endwhile; ?>
        </div>
        <?php endif; ?>
    </div>
</div>
