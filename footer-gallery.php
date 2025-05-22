<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
</main><!-- #main -->
</div><!-- #primary -->
</div><!-- #content -->




<?php get_template_part('template-parts/footer/footer') ?>

<script src="<?php echo get_stylesheet_directory_uri() ?>/assets/js/lightbox-plus-jquery.js"></script>

<script>
    const wrapper = document.getElementById("tiles");
    let columns = 0, rows = 0;

    const createTile = index => {
        const tile = document.createElement("div")
        tile.classList.add('tile')
        return tile;
    }

    const createTiles = quantity => {
        Array.from(Array(quantity)).map((tile, index) => {
            wrapper.appendChild(createTile(index));
        })
    }

    const createGrid = () => {
        wrapper.innerHTML = "";

        const size = window.innerWidth > 800 ? 100 : 50;

        columns = Math.floor(window.innerWidth / size);
        rows = Math.floor(window.innerHeight / size);

        wrapper.style.setProperty("--columns", columns)
        wrapper.style.setProperty("--rows", rows)

        createTiles(columns * rows);
    }

    createGrid()

    window.onresize = () => createGrid()
</script>

</body>
</html>
