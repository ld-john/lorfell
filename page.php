<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Axiom
 * @since Axiom 1.0.1
 */

get_header();

/* Start the Loop */
while ( have_posts() ) :
    the_post(); ?>
    <div id="tiles"></div>
    <article id="post-<?php the_ID(); ?>" <?php post_class('container mx-auto p-4'); ?>>
        <div class="max-w-full">
            <?php if (!is_front_page()) { ?>
                <div class="dark:text-gray-200 font-handwriting text-5xl mb-4">
                    <h1><?php the_title() ?></h1>
                </div>
            <?php } ?>
            <?php the_content(); ?>
        </div>
    </article>
<?php

endwhile; // End of the loop.

get_footer();
