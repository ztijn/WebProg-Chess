<?php
if (isset($_POST['call_now'])) {
    // Read articles
    $json_file = file_get_contents("../data/articles.json");
    $articles = json_decode($json_file, true);
    $articles = array_reverse($articles);
    // Generate HTML
    $articles_html = "";
    foreach ($articles as $key => $value) {
        $articles_html .= '<div class="card text-center news-card">';
        $articles_html .= '<div class="card-header">';
        $articles_html .= $value['title'];
        $articles_html .= '</div>';
        $articles_html .= '<div class="card-body">';
        $articles_html .= sprintf('<h5 class="card-title">%s</h5>', $value['title']);
        $articles_html .= sprintf('<p class="card-text">%s</p>', $value['article']);
        $articles_html .= '<div class="row">';
        $articles_html .= '<div class="col-md-6" style="text-align: right;">';
        $articles_html .= '<form action="news_edit.php" method="POST">';
        $articles_html .= sprintf('<input type="hidden" name="id" value="%s" />', $value['id']);
        $articles_html .= '<button type="submit" class="btn btn-light">Edit</button>';
        $articles_html .= '</form>';
        $articles_html .= '</div>';
        $articles_html .= '<div class="col-md-6" style="text-align: left;">';
        $articles_html .= sprintf('<button class="btn btn-danger article_remove" article-id="%s">Remove</button>', $value['id']);
        $articles_html .= '</div>';
        $articles_html .= '</div>';
        $articles_html .= '</div>';
        $articles_html .= '<div class="card-footer text-muted">';
        $articles_html .= strftime('%A %e %B %Y %H:%M', $value['date']);
        $articles_html .= '</div>';
        $articles_html .= '</div>';
    }
    // Save html into array
    $export_data = [
        'html' => $articles_html
    ];
    // Return JSON
    header('Content-Type: application/json');
    echo json_encode($export_data);
}
?>