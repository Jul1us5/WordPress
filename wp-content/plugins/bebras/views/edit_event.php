<?php
$post_id = $_GET['id'];
$title = get_post($post_id)->post_title;
$date = get_post_meta($post_id)['date'][0];
$text = get_post_meta($post_id)['text'][0];

?>
<form action="" method="post">
    Įvykio pavadinimas: <input type="text" name="event_title" value="<?= $title ?>">
    Įvykio tekstas: <input type="text" name="event_text" value="<?= $text ?>">
    Įvykio data: <input type="datetime" name="event_date" value="<?= $date ?>">
    <button type="submit" name="event_update">Išsaugoti</button>
</form>