<?php
$postID = get_the_id();
$contrib = get_field( 'contributors', $postID );
$images = get_field('gallery', $postID);
$imgCount = count($images);

?>

<a href="<?php echo get_permalink(); ?>" class="max-w-sm w-full lg:max-w-full lg:flex group">
    <div class="h-36 lg:h-auto lg:w-48 flex-none bg-cover bg-center rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden relative"
         style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)"
         title="<?php echo get_the_title(); ?>"
    >
        <span class="absolute top-0 right-0 text-xs rounded-bl-lg inline-flex uppercase items-center font-bold leading-sm px-5 py-2 bg-fbf-blue-200/75 text-fbf-blue-700">
            <i class="fas fa-camera mr-2"></i>
            <?php echo $imgCount ?>
        </span>
    </div>
    <div class="fbf-horizontal-card--image fbf-horizontal-card">
        <div class="mb-8 ">
            <div class="text-gray-900 font-bold text-xl mb-2 dark:text-gray-200"><?php echo get_the_title(); ?></div>
        </div>
        <div class="flex items-center">
            <?php
            if( $contrib ) {
                foreach ($contrib as $c):
                    get_template_part('template-parts/content/contributors','', ['contributor' => $c]);
                endforeach;
            }
            ?>

        </div>
    </div>
</a>
