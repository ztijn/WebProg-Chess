<?php
session_start();
if (isset($_POST['call_now'])) {
    // Read games
    $json_file = file_get_contents("../data/checkers.json");
    $games = json_decode($json_file, true);
    $games = array_reverse($games);
    // Read game data
    foreach ($games as $key => $value) {
        if ($value["game_id"] === $_SESSION['game_id']) {
            $white = $value["white"];
            $black = $value["black"];
            $white_king = $value["white_king"];
            $black_king = $value["black_king"];
            if ($value["turn"]["black_turn"] === 1) {
                $turn = "black";
            } else {
                $turn = "white";
            }
        }
    }
    // Save data into array
    $export_data = [
        'game_id'  => $_SESSION['game_id'],
        'white' => $white,
        'black' => $black,
        'white_king' => $white_king,
        'black_king' => $black_king,
        'turn' => $turn,
    ];
    // Return JSON
    header('Content-Type: application/json');
    echo json_encode($export_data);
}
?>