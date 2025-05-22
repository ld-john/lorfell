<?php
/**
 * Displays the site navigation.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */
?>
<button
        data-collapse-toggle="mobile-menu"
        type="button"
        class="inline-flex justify-center items-center m-2 p-2 border border-fbf-blue text-gray-400 rounded-lg lg:hidden focus:outline-none focus:ring-2 focus:ring-fbf-blue-300"
        aria-controls="mobile-menu-2"
        aria-expanded="false"
        id="mobile-menu-toggle"
>
    <span class="sr-only">Open main menu</span>
    <svg
            class="w-6 h-6"
            aria-hidden="true"
            fill="currentColor"
            viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg"
    >
        <path
                fill-rule="evenodd"
                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                clip-rule="evenodd"
        ></path>
    </svg>
</button>
<?php if ( has_nav_menu( 'primary' ) ) : ?>
    <nav class="list-none py-2 hidden lg:flex">
        <?php
        wp_nav_menu( array(
            'theme_location' => 'primary',
            'fallback_cb'    => false,
            'container'      => false,
            'items_wrap'     => '<ul id="%1$s" class="%2$s flex items-center text-sm xl:text-base space-x-4 xl:space-x-8 font-bold">%3$s</ul>',
        ) );
        ?>
    </nav>

<nav id="mobile-menu" class="list-none py-2 hidden">
    <?php
    wp_nav_menu( array(
        'theme_location' => 'primary',
        'fallback_cb'    => false,
        'container'      => false,
        'items_wrap'     => '<ul id="%1$s" class="flex flex-col p-4 space-x-8 mt-0 text-sm font-medium border-0">%3$s</ul>',
        'add_li_class' => 'mobile-menu-list pl-4'
    ) );
    ?>
</nav>
<?php endif; ?>


