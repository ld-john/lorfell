<?php
$images = get_field('gallery');
$size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)
?>
<div class="bg-gray-100 border border-gray-400 p-6 mb-10">
    <div class="dark:text-gray-200 font-handwriting text-5xl mb-4">
        <h1><?php the_title() ?></h1>
    </div>
<div class="prose max-w-full">
    <div class="dark:text-gray-200 font-display"><?php the_content(); ?></div>
</div>
<section class="overflow-hidden text-gray-700 ">
    <div class="py-2">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 justify-center">
            <?php // Check rows exists.
            if( have_rows('gallery') ):

                // Loop through rows.
                while( have_rows('gallery') ) : the_row(); ?>
<!--                    --><?php //var_dump(get_sub_field('image')) ?>
                    <div class="bg-white rounded shadow p-2">
                        <a href="<?php echo get_sub_field('image')['url'] ?>" data-lightbox="image-1" data-title="<?php echo get_sub_field('image')['title']; ?>"><img
                                    src="<?php echo get_sub_field('image')['sizes']['medium'] ?>" alt="<?php echo get_sub_field('image')['alt'] ?>" class="mx-auto"></a>
                        <div class="prose">
                            <?php if (get_sub_field('photographer')) {
                                echo '<div class="font-semibold">Photographer: <a href="'. get_permalink(get_sub_field('photographer')[0]->ID) .'">' . get_the_title(get_sub_field('photographer')[0]->ID) . '</a></div>';
                            } elseif (get_sub_field('photographer_name')) { ?>
                                <div class="font-semibold">Photographer:
                                <a href="<?php echo get_sub_field('photographer_url')['url']; ?>"><?php echo get_sub_field('photographer_name'); ?></a></div>
                            <?php } ?>
                            <?php if (get_sub_field('tagged')) {
                                echo "<div class='font-semibold'>Tagged:</div><ul>";
                                foreach (get_sub_field('tagged') as $tag) { ?>
                                    <li><a href="<?php echo get_permalink($tag->ID) ?>"><?php echo get_the_title($tag->ID); ?></a></li>
                                    <?php
                                }
                                echo '</ul>';
                            }?>
                        </div>
                    </div>

                <?php

                    // End loop.
                endwhile;

            endif; ?>
        </div>
    </div>
</section>

</div>

<h2 class="text-4xl bg-fbf-blue-700 text-white border border-b-0 border-white font-handwriting px-6 pt-2 pb-3 rounded-t-lg inline-block">Photographers</h2>
<div class="bg-fbf-blue border-white border p-6 rounded-br-lg">
    <div class="py-6 clear-both">
        <?php $contrib = get_field( 'contributors' ); ?>

        <?php if( $contrib ) { ?>
            <div class="grid md:grid-cols-2 gap-4 grid-cols-1">
                <?php foreach ($contrib as $c):
                    get_template_part('template-parts/archive/archive-horizontal-staff','',['id' => $c->ID]);
                endforeach; ?>
            </div>
        <?php } ?>

    </div>
</div>
