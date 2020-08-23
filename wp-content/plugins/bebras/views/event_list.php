<div class="box">
    <a href="http://localhost:8888/wordpress/wp-admin/admin.php?page=new+event">+</a>
</div>

<?php
$posts = get_posts([
    'post_type' => 'event',
    'post_status' => 'publish',
    'numberposts' => -1
]);

foreach ($posts as $post) {

    echo '<div class="line">';
    echo get_post_meta($post->ID)['date'][0] . ' | ' . $post->post_title . ' | ' . get_post_meta($post->ID)['text'][0] . ' | ';
?>
    <a href="http://localhost:8888/wordpress/wp-admin/admin.php?page=edit+event&id=<?= $post->ID ?>">EDIT</a>
    <a href="http://localhost:8888/wordpress/wp-admin/admin.php?page=delete+event&id=<?= $post->ID ?>">DELETE</a>

    </div>
<?php

}
