<div class="max-w-3xl mx-auto text-center">
    <h1 class="text-3xl font-bold leading-7 text-gray-900 sm:text-3xl sm:tracking-tight sm:truncate"><?php echo get_field('heading'); ?></h1>
    <div class="text-gray-500 xl:mx-12"><?php echo get_field('text') ?></div>
</div>
<?php
// Check value exists.
if( have_rows('table_contents') ): ?>
    <div class="flex flex-col w-full">
        <?php
        // Loop through rows.
        while ( have_rows('table_contents') ) : the_row();

            // Case: Paragraph layout.
            if( get_row_layout() === 'table_headers' ):
                $text = get_sub_field('text'); ?>
                <div class="flex items-center h-20 px-4 border-b border-gray-500">
                    <div class="w-40"></div>
                    <?php // Check rows exists.
                    if( have_rows('headings') ):

                        // Loop through rows.
                        while( have_rows('headings') ) : the_row();

                            ?>
                            <div class="flex-grow text-lg font-semibold text-center"><?php echo get_sub_field('heading') ?></div>
                        <?php

                            // End loop.
                        endwhile;

                    endif; ?>
                </div>
            <?php // Case: Download layout.
            elseif( get_row_layout() === 'feature_group' ): ?>
                <div class="flex items-center h-12 px-4 bg-gray-100 border-b border-gray-500">
                    <div class="font-medium"><?php echo get_sub_field('group_heading');?></div>
                </div>
            <?php
            elseif ( get_row_layout() === 'tick_row' ): ?>
                <div class="flex items-center px-4 py-2 border-b border-gray-500">
                    <div class="w-40"><?php echo get_sub_field('feature') ?></div>
                    <?php // Check rows exists.
                    if( have_rows('columns') ):

                        // Loop through rows.
                        while( have_rows('columns') ) : the_row();

                            ?>
                            <div class="flex justify-center flex-grow w-0">
                                <?php if (get_sub_field('active')) { ?>
                                    <svg class="w-4 h-4 text-green-600 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                         fill="currentColor">
                                        <path fill-rule="evenodd"
                                              d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                              clip-rule="evenodd" />
                                    </svg>
                                <?php }?>
                            </div>
                        <?php

                            // End loop.
                        endwhile;

                    endif; ?>

                </div>
            <?php
            elseif (get_row_layout() === 'text_row'): ?>
                <div class="flex items-center px-4 py-2 border-b border-gray-500">
                    <div class="w-40"><?php echo get_sub_field('feature') ?></div>
                    <?php // Check rows exists.
                    if( have_rows('columns') ):

                        // Loop through rows.
                        while( have_rows('columns') ) : the_row();

                            ?>
                            <div class="flex justify-center flex-grow w-0">
                                <?php echo get_sub_field('column')?>
                            </div>
                        <?php

                            // End loop.
                        endwhile;

                    endif; ?>

                </div>
            <?php
                elseif (get_row_layout() === 'buttons') : ?>
                    <div class="flex items-center h-20 px-4">
                        <div class="w-40"></div>
                        <div class="flex items-center flex-grow w-0 px-8">
                            <button class="flex items-center justify-center w-full h-8 text-sm text-white bg-black">Start
                                Now</button>
                        </div>
                        <div class="flex items-center flex-grow w-0 px-8">
                            <button class="flex items-center justify-center w-full h-8 text-sm text-white bg-black">Start
                                Now</button>
                        </div>
                        <div class="flex items-center flex-grow w-0 px-8">
                            <button class="flex items-center justify-center w-full h-8 text-sm text-white bg-black">Start
                                Now</button>
                        </div>
                    </div>
            <?php endif;

            // End loop.
        endwhile; ?>
    </div>
<?php endif; ?>
