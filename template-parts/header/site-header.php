<?php
/**
 * Displays the site header.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

$wrapper_classes  = 'site-header';
$wrapper_classes .= has_custom_logo() ? ' has-logo' : '';
$wrapper_classes .= ( true === get_theme_mod( 'display_title_and_tagline', true ) ) ? ' has-title-and-tagline' : '';
$wrapper_classes .= has_nav_menu( 'primary' ) ? ' has-menu' : '';
?>


<header class="flex flex-wrap sm:justify-start sm:flex-nowrap z-50 w-full bg-fbf-blue border-b border-white/[.5] text-sm py-3 sm:py-0">
    <nav class="relative max-w-[85rem] w-full mx-auto px-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8" aria-label="Global">
        <div class="flex items-center justify-between w-full">
            <a class="flex-none text-xl font-semibold text-white" href="/" aria-label="Brand">
                <img src="<?php echo site_url(); ?>/wp-content/uploads/2020/04/logo-color@2x.png" class="!h-12 sm:!h-24 py-2" alt="<?php echo get_bloginfo( 'name' ) ?>">
            </a>
            <div class="lg:hidden">
                <button type="button" id="hs-collapse-toggle" class="hs-collapse-toggle p-2 inline-flex justify-center items-center gap-2 rounded-md border border-white/[.5] font-medium text-white/[.5] shadow-sm align-middle hover:bg-white/[.1] hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm" data-hs-collapse="#navbar-collapse-with-animation" aria-controls="navbar-collapse-with-animation" aria-label="Toggle navigation">
                    <svg class="hs-collapse-open:hidden w-4 h-4" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                    <svg class="hs-collapse-open:block hidden w-4 h-4" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </button>
            </div>
        </div>
        <?php fbf_main_nav(53); ?>
    </nav>
</header>
<!-- Announcement Banner -->
<div class="bg-linear-to-r/oklch from-fbf-blue-600 to-fbf-blue-200 border-b border-white/[.5]">
    <div class="max-w-[85rem] px-4 py-4 sm:px-6 lg:px-8 mx-auto">
        <!-- Grid -->
        <div class="grid justify-center md:grid-cols-2 md:justify-between md:items-center gap-2">
            <div class="text-center md:text-left md:order-2 md:flex md:justify-end md:items-center gap-4">
                <a href="https://twitch.tv/finalbossfightlive" class="group inline-flex justify-center items-center size-[62px] rounded-full !border-4 !border-fbf-blue-50 bg-fbf-blue-100 dark:!border-fbf-blue-900 dark:bg-fbf-blue-800 transition inset-ring-2 inset-ring-fbf-blue-600 hover:inset-ring-4 hover:!border-fbf-blue-200 hover:inset-ring-sunshade">
                    <i class="fab fa-twitch fa-2x text-fbf-blue-600 dark:text-fbf-blue-400 transition duration-300 group-hover:text-sunshade group-hover:scale-125 group-hover:rotate-12 group-hover:shadow"></i>
                </a>
                <a href="https://www.youtube.com/c/FinalbossfightCoUk" class="group inline-flex justify-center items-center size-[62px] rounded-full !border-4 !border-fbf-blue-50 bg-fbf-blue-100 dark:!border-fbf-blue-900 dark:bg-fbf-blue-800 transition inset-ring-2 inset-ring-fbf-blue-600 hover:inset-ring-4 hover:!border-fbf-blue-200 hover:inset-ring-sunshade">
                    <i class="fab fa-youtube fa-2x text-fbf-blue-600 dark:text-fbf-blue-400 transition duration-300 group-hover:text-sunshade group-hover:scale-125 group-hover:rotate-12 group-hover:shadow"></i>
                </a>
                <a href="https://discord.gg/9trna6Aban" class="group inline-flex justify-center items-center size-[62px] rounded-full !border-4 !border-fbf-blue-50 bg-fbf-blue-100 dark:!border-fbf-blue-900 dark:bg-fbf-blue-800 transition inset-ring-2 inset-ring-fbf-blue-600 hover:inset-ring-4 hover:!border-fbf-blue-200 hover:inset-ring-sunshade">
                    <i class="fa-brands fa-discord fa-2x text-fbf-blue-600 dark:text-fbf-blue-400 transition duration-300 group-hover:text-sunshade group-hover:scale-125 group-hover:rotate-12 group-hover:shadow"></i>
                </a>
            </div>
            <!-- End Col -->

            <div>

            </div>
            <!-- End Col -->
        </div>
        <!-- End Grid -->
    </div>
</div>
<!-- End Announcement Banner -->
<script>
    let toggle = document.querySelector('#hs-collapse-toggle')
    let mobileMenu = document.querySelector('#navbar-collapse-with-animation')

    toggle.addEventListener('click', function() {
        mobileMenu.classList.toggle('hidden')
        mobileMenu.classList.toggle('block')
    })
</script>
