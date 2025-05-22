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

get_header(); ?>
    <div id="tiles"></div>
    <div class="container mx-auto my-6 px-4">
        <?php get_template_part('template-parts/content/archive-' . get_post_type()); ?>
    </div>

<?php get_footer();
