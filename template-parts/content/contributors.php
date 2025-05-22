<?php
$contributor = $args['contributor'];
$img = get_the_post_thumbnail_url($contributor->ID);
$name = get_the_title($contributor->ID);
if (!$img) {
    $string = str_replace(' ', '+', $name);
    $img = "https://ui-avatars.com/api/?background=2fbfff&color=fff&name=" . $string;
}
?>
<div class="has-tooltip">
    <span class='tooltip rounded shadow-lg p-1 bg-fbf-blue-400 text-white -mt-8 dark:bg-fbf-blue-800'><?php echo $name; ?></span>
    <img class="w-10 h-10 object-cover rounded-full mr-4" src="<?php echo $img; ?>" alt="Avatar of <?php echo $name; ?>">
</div>
