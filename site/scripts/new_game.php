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
        'white' => ["A9", "C9", "E9", "G9", "I9", "B10", "D10", "F10", "H10", "J10",
            "A7", "C7", "E7", "G7", "I7", "B8", "D8", "F8", "H8", "J8"],
        'black' => ["A1", "C1", "E1", "G1", "I1", "B2", "D2", "F2", "H2", "J2",
            "A3", "C3", "E3", "G3", "I3", "B4", "D4", "F4", "H4", "J4"],
        "white_king" => [""],
        "black_king"=> [""],
        "turn" => array(
            "black_turn" => 1,
            "white_turn:" => 1),
        "player_white" => $player_white,
        "player_black" => $player_black,
    ];
    // Save games to external file
    $json_file = fopen('../data/checkers.json', 'w');
    fwrite($json_file, json_encode($games));
    fclose($json_file);
    die();
}
