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

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="max-w-full">

            <?php the_content(); ?>
        </div>
    </article>
<?php

endwhile; // End of the loop.

get_footer();
?>

