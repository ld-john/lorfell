<div class="my-10">

    <h2 class="text-4xl bg-fbf-blue-700 text-white border border-b-0 border-white font-handwriting px-6 pt-2 pb-3 rounded-t-lg inline-block">Events</h2>
    <div class="bg-fbf-blue border-white border p-6 rounded-br-lg font-display">
    <?php
    // Check rows exists.
    if( have_rows('events') ):

        // Loop through rows.
        while( have_rows('events') ) : the_row();
            $start_date = get_sub_field('when');

            $deadline = DateTime::createFromFormat('d/m/Y h:i a', $start_date);
            $start = $deadline->format('F j, Y - g:ia');
            $month = $deadline->format('F');
            $daynum = $deadline->format('j');
            $daytext = $deadline->format('D');
            $time = $deadline->format('g:i a');

            ?>
        <div class="bg-white border border-gray-400 shadow rounded-br-lg my-10 p-3">
            <div class="flex justify-between">
                <h2 class="text-4xl mb-3 font-handwriting"><?php echo get_sub_field('title'); ?></h2>
                <p class="text-orange-600 text-3xl font-handwriting"><?php echo get_sub_field('location'); ?></p>
            </div>
            <div class="flex flex-col md:flex-row items-center justify-between mb-4 space-y-4 md:space-y-0">
                <div class="w-full">
                    <div><?php echo get_sub_field('details'); ?></div>
                </div>
                <div class="text-center">
                    <div class="text-center">
                        <div class="min-w-32 min-h-48 p-3 mb-4 font-medium">
                            <div class="w-32 flex-none rounded-t lg:rounded-t-none lg:rounded-l text-center shadow-lg ">
                                <div class="block rounded-t overflow-hidden  text-center ">
                                    <div class="bg-blue-500 text-white py-1">
                                        <?php echo $month; ?>
                                    </div>
                                    <div class="pt-1 border-l border-r border-white bg-white">
                            <span class="text-5xl font-bold leading-tight font-condensed">
                                <?php echo $daynum; ?>
                            </span>
                                    </div>
                                    <div class="border-l border-r border-b rounded-b-lg text-center border-white bg-white -pt-2 -mb-1">
                            <span class="text-sm font-condensed">
                                <?php echo $daytext; ?>
                            </span>
                                    </div>
                                    <div class="pb-2 border-l border-r border-b rounded-b-lg text-center border-white bg-white">
                            <div class="text-2xl -rotate-6 font-handwriting text-orange-600">
                                <?php echo $time ?>
                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
</div>
