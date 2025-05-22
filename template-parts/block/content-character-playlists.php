<?php $playlists = get_field('playlists');

if($playlists) { ?>
<div class="my-10">
    <div class="text-4xl bg-linear-to-b/oklch from-fbf-blue-700 to-fbf-blue text-white !border !border-b-0 !border-white font-handwriting px-6 pt-2 pb-3 rounded-t-lg inline-block"><?php echo get_the_title(); ?>'s Playlists</div>
    <div class="bg-fbf-blue !border-white !border p-6 rounded-br-lg font-display">
        <div class="space-y-8">
            <?php foreach( $playlists as $playlist) :
                get_template_part('template-parts/archive/archive-vertical-post', null, ['postID' => $playlist->ID]);
            endforeach; ?>
        </div>
    </div>
</div>
<?php } ?>
