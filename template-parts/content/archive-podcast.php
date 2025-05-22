<h2 class="text-4xl bg-fbf-blue-700 text-white border border-b-0 border-white font-handwriting px-6 pt-2 pb-3 rounded-t-lg inline-block"><?php echo get_the_archive_title(); ?></h2>
<div class="bg-fbf-blue border-white border p-6 rounded-br-lg">
<?php if ( have_posts() ) : ?>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php
        while ( have_posts() ) : ?>
            <?php the_post();
            get_template_part( 'template-parts/archive/archive-horizontal-podcast' );
        endwhile;
        ?>
    </div>
    <?php  the_posts_pagination(); ?>
<?php
endif;
?>
</div>
