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
        if ($value["game_id"] === $_SESSION['game_id']) {
            $game_key = $key;
            $white = $value["white"];
            $black = $value["black"];
            $white_king = $value["white_king"];
            $black_king = $value["black_king"];
            $turn = $value["turn"];
            $player_white = $value["player_white"];
            $player_black = $value["player_black"];
        }
    }

    if (empty($player_white)) {
        $player_white = $_SESSION['username'];
    } else if (empty($player_black) && ($player_white !== $_SESSION['username'])) {
        $player_black = $_SESSION['username'];
    }

    //Start new game for selected game
    $games[$game_key]= [
        'game_id' => $game_id,
        'white' => $white,
        'black' => $black,
        "white_king" => $white_king,
        "black_king"=> $black_king,
        "turn" => $turn,
        "player_white" => $player_white,
        "player_black" => $player_black,
    ];
    // Save games to external file
    $json_file = fopen('../data/checkers.json', 'w');
    fwrite($json_file, json_encode($games));
    fclose($json_file);
    die();
}
