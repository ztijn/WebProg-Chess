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
        $white_king = $value["white_king"];
        $black_king = $value["black_king"];
    }
    // Save html into array
    $export_data = [
        'white' => $white,
        'black' => $black,
        'white_king' => $white_king,
        'black_king' => $black_king,
    ];
    // Return JSON
    header('Content-Type: application/json');
    echo json_encode($export_data);
}
?>