<?php
if (isset($_POST['submit'])) {
    // Read articles
    $json_file = file_get_contents("../data/articles.json");
    $articles = json_decode($json_file, true);

    // Generate article ID
    $article_id = 0;
    foreach ($articles as $key => $value){
        $article_id = $value['id'];
    }
    $article_id += 1;

    array_push($articles, [
        'id' => $article_id,
        'date' => time(),
        'title' => $_POST['title'],
        'article' => $_POST['article']
    ]);

    // Save to external file
    $json_file = fopen('../data/articles.json', 'w');
    fwrite($json_file, json_encode($articles));
    fclose($json_file);

    // Redirect to homepage
    header("Location: ../");
    die();
}
?>