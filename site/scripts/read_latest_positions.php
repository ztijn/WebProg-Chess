<?php
if (isset($_POST['call_now'])) {
    // Read articles
    $json_file = file_get_contents("../data/checkers.json");
    $articles = json_decode($json_file, true);
    $articles = array_reverse($articles);
    // Generate HTML
    $articles_html = "";
    foreach ($articles as $key => $value) {
        $white = $value["white"];
        $black = $value["black"];
        $king_white = $value["king_white"];
        $king_black = $value["king_black"];
    }
    // Save html into array
    $export_data = [
        'white' => $white,
        'black' => $black,
        'king_white' => $king_white,
        'king_black' => $king_black,
    ];
    // Return JSON
    header('Content-Type: application/json');
    echo json_encode($export_data);
}
?>