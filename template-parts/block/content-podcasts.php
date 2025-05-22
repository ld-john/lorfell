<div class="container p-4 mx-auto mt-16 mb-8">
    <div class="text-4xl bg-linear-to-b/oklch from-fbf-blue-700 to-fbf-blue text-white !border !border-b-0 !border-white font-handwriting px-6 pt-2 pb-3 rounded-t-lg inline-block">Podcasts</div>
    <div class="bg-fbf-blue !border-white !border p-6 rounded-br-lg">
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
                <?php $argsNew = array(
                    'post_type'      => 'podcast',
                    'posts_per_page' => 6,
                );
                $results = new WP_Query( $argsNew );
                if ( $results->have_posts() ) :
                    while ( $results->have_posts() ) :
                        $results->the_post();
                        get_template_part('template-parts/archive/archive-horizontal-podcast');
                    endwhile;
                endif;
           ?>
        </div>
        <div class="clear-both"></div>
        <div class="bg-white p-4 mt-8 inline-block w-full lg:w-3/5 float-right relative rounded border border-gray-400 shadow">
            <div class="font-handwriting text-orange-600 text-3xl my-3">Subscribe to our Podcasts here</div>
            <div class="flex flex-col md:flex-row flex-wrap items-center gap-4">
                <a class="fbf--button" href="https://podcasts.apple.com/gb/podcast/final-boss-fight-podcast-network/id1672742674">Apple Podcasts</a>
                <a class="fbf--button" href="https://podcasts.google.com/feed/aHR0cHM6Ly9mZWVkcy5saWJzeW4uY29tLzQ0Njc1Ny9yc3M">Google Podcasts</a>
                <a class="fbf--button" href="https://pca.st/podcast/bb5bea30-4beb-013b-f1a6-0acc26574db2">PocketCasts</a>
                <a class="fbf--button" href="https://open.spotify.com/show/3eGLMZH1XryxERcnE25kQW?si=a761df906cca4cf9">Spotify</a>
            </div>
        </div>
        <div class="clear-both"></div>
    </div>
</div>
