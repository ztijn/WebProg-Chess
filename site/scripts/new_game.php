<?php
session_start();
if (isset($_POST['call_now'])) {
    // Read games
    $json_file = file_get_contents("../data/checkers.json");
    $games = json_decode($json_file, true);
    //Save game ID
    $game_id = $_SESSION['game_id'];
    foreach ($games as $key => $value){
        //Select the right game
        if ($game_id == $value['game_id']) {
            $player_black = $value['player_black'];
            $player_white = $value['player_white'];
            $game_key = $key;
        };
    }
    //Start new game for selected game
    $games[$game_key]= [
        'game_id' => $game_id,
        'white' => ["A8", "C8", "E8", "G8", "I8", "B9", "D9", "F9", "H9", "J9",
            "A6", "C6", "E6", "G6", "I6", "B7", "D7", "F7", "H7", "J7"],
        'black' => ["A0", "C0", "E0", "G0", "I0", "B1", "D1", "F1", "H1", "J1",
            "A2", "C2", "E2", "G2", "I2", "B3", "D3", "F3", "H3", "J3"],
        "white_king" => [],
        "black_king"=> [],
        "turn" => "player_black",
        "player_white" => $player_white,
        "player_black" => $player_black,
    ];
    // Save games to external file
    $json_file = fopen('../data/checkers.json', 'w');
    fwrite($json_file, json_encode($games));
    fclose($json_file);
    die();
}
