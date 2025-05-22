<div class="bg-gray-100 border border-gray-400 p-6 mb-10">
    <h1 class="dark:text-gray-200 font-handwriting !text-5xl mb-4"><?php the_title() ?></h1>
    <div class="prose max-w-full dark:text-gray-200">
        <div class="font-display">
            <?php the_content(); ?>
        </div>
    </div>
</div>

<h2 class="text-4xl bg-fbf-blue-700 text-white border border-b-0 border-white font-handwriting px-6 pt-2 pb-3 rounded-t-lg inline-block">Featuring</h2>
<div class="bg-fbf-blue border-white border p-6 rounded-br-lg">
    <div class="py-6 clear-both">
        <?php $contrib = get_field( 'contributors' ); ?>

        <?php if( $contrib ) { ?>
            <div class="grid md:grid-cols-2 gap-4 grid-cols-1">
                <?php foreach ($contrib as $c):
                    get_template_part('template-parts/archive/archive-horizontal-staff','',['id' => $c->ID]);
                endforeach; ?>
            </div>
        <?php } ?>

    </div>
</div>
