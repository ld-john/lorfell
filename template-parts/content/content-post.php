<div class="bg-gray-100 border border-gray-400 p-6 mb-10">
    <div class="dark:text-gray-200 font-handwriting text-5xl mb-4">
        <h1><?php the_title() ?></h1>
    </div>
    <div class="prose max-w-full font-display">
        <?php the_content(); ?>
    </div>
    <?php // Check rows exists.
    if( have_rows('song') ): ?>
    <div class="mt-6">
        <?php // Loop through rows.
        while( have_rows('song') ) : the_row();

            ?>
            <div class="block bg-gradient-to-b from-fbf-blue to-fbf-blue-200 rounded-lg border border-fbf-blue-400 shadow-md mb-4 dark:border-fbf-blue-800 dark:from-fbf-blue-800 dark:to-fbf-blue-700 relative">
                <img class="absolute top-[-50px] left-[-100px] z-10 -rotate-45 scale-50" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/tape.png" alt="tape">
                <img class="absolute top-[-60px] right-[-75px] z-10 rotate-12 scale-50" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/tape.png" alt="tape">
                <div class="flex flex-col lg:flex-row">
                    <div class="p-4 w-full lg:w-1/4 shrink-0">
                        <div class="aspect-w-16 aspect-h-9">
                            <?php echo get_sub_field('song_embed'); ?>
                        </div>
                    </div>
                    <div class="p-4">
                        <h5 class="mb-2 text-3xl font-handwriting tracking-tight text-gray-900"><?php echo get_sub_field('song_title') ?></h5>
                        <p class="font-display text-gray-700 dark:text-gray-200"><?php echo get_sub_field('song_description'); ?></p>
                    </div>
                </div>
            </div>
        <?php

            // End loop.
        endwhile; ?>
    </div>
        <?php endif; ?>
    <?php
    // Check rows exists.
    if( have_rows('playlists') ):

        // Loop through rows.
        while( have_rows('playlists') ) : the_row();

            ?>
            <div class="block bg-gradient-to-b from-fbf-blue to-fbf-blue-200 mt-10 rounded-lg border border-fbf-blue-400 shadow-md my-6 dark:from-fbf-blue-800 dark:to-fbf-blue-700 dark:border-fbf-blue-800 relative">
                <img class="absolute top-[-50px] left-[-100px] z-10 -rotate-45 scale-50" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/tape.png" alt="tape">
                <img class="absolute top-[-60px] right-[-75px] z-10 rotate-12 scale-50" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/tape.png" alt="tape">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="p-4 ">
                        <h5 class="mb-2 text-3xl font-handwriting tracking-tight text-gray-900 dark:text-gray-200">Listen to the Playlist</h5>
                        <div class="underline">
                            <?php echo get_sub_field('playlist_embed') ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php

        // End loop.
        endwhile;

    endif;
    ?>
</div>
<h2 class="text-4xl bg-fbf-blue-700 text-white border border-b-0 border-white font-handwriting px-6 pt-2 pb-3 rounded-t-lg inline-block">Written By</h2>
<div class="bg-fbf-blue border-white border p-6 rounded-br-lg">
    <div class="py-6 clear-both">
        <?php $contrib = get_field( 'contributors' ); ?>

        <?php if( $contrib ) { ?>
            <div class="grid md:grid-cols-4 gap-8 grid-cols-1">
                <?php foreach ($contrib as $c):
                    get_template_part('template-parts/archive/archive-vertical-staff','',['id' => $c->ID]);
                endforeach; ?>
            </div>
        <?php } ?>

    </div>
</div>
