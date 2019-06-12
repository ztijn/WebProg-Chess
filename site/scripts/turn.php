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
            $turn = $value["turn"];
            $turn_player = $value[$turn];
        }
    }

    // Save data
    $valid = ($_SESSION['username'] === $turn_player);
    $export_data = $valid;
    // Return JSON
    header('Content-Type: application/json');
    echo json_encode($export_data);
}
?>