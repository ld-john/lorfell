<?php $homepage = get_field('homepage');

if ($homepage) {
?>
<div class="container p-4 mx-auto">
    <?php
    } else { ?>
    <div class="my-10">
        <?php }
        ?>
        <div class="text-4xl bg-linear-to-b/oklch from-fbf-blue-700 to-fbf-blue text-white !border !border-b-0 !border-white font-handwriting px-6 pt-2 pb-3 rounded-t-lg inline-block"><?php echo get_field('title');?></div>
        <div class="bg-fbf-blue !border-white !border p-6 rounded-br-lg">
            <?php
            $argsNew = array(
                'post_type'      => get_field( 'post_type' ),
                'posts_per_page' => get_field( 'posts_per_page' ),
            );

            if (get_field('post_category')) {
                $argsNew['category__in'] = get_field('post_category');
            }

            if (get_field('staff_type')) {
                $argsNew['meta_key'] = 'group';
                $argsNew['order'] = 'ASC';
            }

            if (get_field('staff_type') === 'Staff') {

                $argsNew['meta_value'] = 'staff';

            }

            if (get_field('staff_type') === 'Allies') {
                $argsNew['meta_value'] = 'allies';
            }

            $results = new WP_Query( $argsNew );

            if ( $results->have_posts() ) : ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-<?php echo get_field('items_per_line') ?> gap-8 not-prose">
                    <?php
                    while ( $results->have_posts() ) :
                        $results->the_post();
                        $post_type = get_field("post_type");
                        if ($post_type === 'staff') {
                            $post_type .= '-full';
                        }
                        get_template_part('template-parts/archive/archive-'. get_field("card_type") .'-'. $post_type);
                    endwhile;
                    ?>
                </div>
            <?php
            endif; ?>
            <div class="my-6 flex justify-end">
                <?php
                if(get_field('view_more_link')) {
                    if (get_field('post_type') === 'post') { ?>
                        <a href="<?php echo get_category_link(get_field('post_category')) ?>" class="fbf--button">View <?php echo get_cat_name( get_field('post_category') );  ?></a>
                    <?php } else { ?>
                        <a href="<?php echo get_post_type_archive_link(get_field('post_type'))?>" class="fbf--button">View More <?php echo ucfirst( get_field('post_type')) ?></a>
                    <?php }
                }
                ?>

            </div>
        </div>
    </div>

