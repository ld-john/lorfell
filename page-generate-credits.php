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
            <h1 class="dark:text-gray-200 font-handwriting text-5xl mb-4">Generate Upcoming Streams</h1>
            <p class="font-display my-10 py-4 px-2 bg-white rounded shadow">Do you want to share the upcoming streams from yourself, or some of your fellow streamers? If everyone uses the Twitch Schedule this will work for you! Simply generate a URL and place it in your streaming software as a browser source to show the streams from the upcoming week from any number of streamers.</p>
            <h2 class="dark:text-gray-200 font-handwriting text-3xl mb-4">List the streamers you wish to share the credits for</h2>
            <p class="font-display">Separate the Twitch handles with commas (,)</p>
            <textarea name="streamers" id="streamers" class="block p-2.5 w-full text-sm text-gray-900 bg-fbf-blue-50 rounded-lg border border-fbf-blue-300 focus:ring-fbf-blue-500 focus:border-fbf-blue-500 resize-none" cols="30" rows="3"></textarea>
            <h2 class="dark:text-gray-200 font-handwriting text-3xl mb-4">Credits Style</h2>
            <select class="block p-2.5 w-full text-sm text-gray-900 bg-fbf-blue-50 rounded-lg border border-fbf-blue-300 focus:ring-fbf-blue-500 focus:border-fbf-blue-500" name="style" id="style">
                <option value="">---</option>
                <option value="tape">Taped on notes</option>
            </select>
            <button id="submit" class="inline-flex items-center py-2.5 px-4 font-display font-medium text-center text-white bg-fbf-blue-700 rounded-lg focus:ring-4 focus:ring-fbf-blue-200 dark:focus:ring-fbf-blue-900 hover:bg-fbf-blue-800 mt-4">Generate Browser Source</button>
            <h2 class="dark:text-gray-200 font-handwriting text-3xl mt-4">Copy this into your Streaming Software as a Browser Source</h2>
            <input type="text" id="output" class="block mt-4 p-2.5 w-full text-sm text-gray-900 bg-fbf-blue-50 rounded-lg border border-fbf-blue-300 focus:ring-fbf-blue-500 focus:border-fbf-blue-500">
        </div>
    </article>
    <script>
        let button = document.querySelector('#submit')
        button.addEventListener('click', function() {
            let base_url = window.location.origin;
            let streamer = document.querySelector('#streamers')
            let style = document.querySelector('#style')
            let output = document.querySelector('#output')
            let streamer_array = streamer.value.split(",")
            let querystring = ''

            streamer_array.forEach((streamer, index) => {
                if (index !== 0) {
                    querystring+= '&'
                }
                querystring += 'streamer='
                querystring += streamer.trim()
            })


            if (style.value !== '') {
                querystring += '&style='
                querystring += style.value
            }

            output.value = base_url + '/credits?' + querystring

        })
    </script>
<?php

endwhile; // End of the loop.

get_footer();
