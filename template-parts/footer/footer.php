<footer class="bg-fbf-blue-700 mt-12 border-t border-white/[.5]">
    <div
        class="relative mx-auto max-w-screen-xl px-4 py-12 sm:px-6"
    >
        <div class="lg:flex lg:items-center lg:items-end lg:justify-between">

            <div class="w-full">
                <p
                    class="mx-auto mt-6 max-w-md text-center text-balance text-lg font-display leading-relaxed text-gray-200 lg:text-left w-full"
                >
                    Where retro gaming meets tabletop adventures, we're a community dedicated to weaving epic stories, embracing diversity, and fostering a welcoming space for all gamers.
                </p>
                <div class="my-4 flex justify-between items-center space-x-2">
                    <?php get_template_part( 'template-parts/footer/footer-widgets' ); ?>
                </div>
            </div>
            <div class="flex shrink-0 justify-center w-44 lg:justify-start">
                <a class="flex-none size-full" href="/" aria-label="Brand">
                    <img src="<?php echo site_url(); ?>/wp-content/uploads/2020/04/logo-color@2x.png" class="size-full" alt="<?php echo get_bloginfo( 'name' ) ?>">
                </a>
            </div>

            <ul
                class="mt-12 flex flex-col flex-wrap justify-center  gap-6 md:gap-8 lg:mt-0 lg:justify-end w-full text-right"
            >
                <li>
                    <a class="!text-gray-300 font-display transition hover:!text-gray-300/75 hover:underline" href="/about-us/">
                        Who are we?
                    </a>
                </li>

                <li>
                    <a class="!text-gray-300 font-display transition hover:!text-gray-300/75 hover:underline" href="/podcast/">
                        FBF Podcast Network
                    </a>
                </li>

                <li>
                    <a class="!text-gray-300 font-display transition hover:!text-gray-300/75 hover:underline" href="/a-word-on-privacy-and-cookies/">
                        A Word on Privacy and Cookies
                    </a>
                </li>
                <li class="text-gray-300 font-display">
                    Copyright &copy; <?php echo date('Y') ?>. All rights reserved.
                </li>
            </ul>
        </div>

    </div>
</footer>
