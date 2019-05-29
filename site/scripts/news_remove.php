<?php
if (isset($_POST['article_id'])){
    // Read articles
    $json_file = file_get_contents("../data/articles.json");
    $articles = json_decode($json_file, true);

    // Remove selected article
    foreach ($articles as $key => $value){
        if ($value['id'] == $_POST['article_id']){
            unset($articles[$key]);
        }
    }

    // Save to external file
    $json_file = fopen('../data/articles.json', 'w');
    fwrite($json_file, json_encode($articles));
    fclose($json_file);
}
?>