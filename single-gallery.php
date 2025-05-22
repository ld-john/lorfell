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

get_header('gallery');

/* Start the Loop */
while ( have_posts() ) :
    the_post(); ?>
    <div id="tiles"></div>
    <article id="post-<?php the_ID(); ?>" <?php post_class('container mx-auto p-4'); ?>>
        <?php get_template_part('template-parts/content/content-' . get_post_type()) ?>
    </article>
<?php
endwhile; // End of the loop.

get_footer('gallery');
