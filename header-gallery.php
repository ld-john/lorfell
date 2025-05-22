<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> <?php axiom_the_html_classes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <?php if (get_post_type() === 'videos') {
        $postID = get_the_id();
        $vid = get_field('video', $postID);
        preg_match('/youtube.com\/embed\/(\S{11})/', $vid, $matches);
        $youtube_id = $matches[1];

        ?>
        <meta property="og:image" content="https://img.youtube.com/vi/<?php echo $youtube_id; ?>/hqdefault.jpg">
        <meta property="og:image:secure_url" content="https://img.youtube.com/vi/<?php echo $youtube_id; ?>/hqdefault.jpg">
        <meta property="og:image:width" content="460">
        <meta property="og:image:height" content="360">
        <meta property="og:image:type" content="image/jpg">
    <?php } ?>
    <?php wp_head(); ?>
    <link href="<?php echo get_stylesheet_directory_uri() ?>/assets/css/lightbox.min.css" rel="stylesheet" />
</head>

<body <?php body_class('bg-fbf-blue-100 dark:bg-fbf-blue-700'); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'axiom' ); ?></a>

    <?php get_template_part( 'template-parts/header/site-header' ); ?>

    <div id="content" class="site-content">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
