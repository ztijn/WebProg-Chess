<?php
session_start();
if (isset($_POST['moves'])) {
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
            $black_pieces = $value['black'];
            $white_pieces = $value['white'];
            $white_king = $value["white_king"];
            $black_king = $value["black_king"];
            $turn = $value["turn"];
            $game_key = $key;
        };
    }
    //Start new game for selected game
    if (in_array($_POST['moves'][0], $black_pieces)) {
        array_push($black_pieces, $_POST['moves'][1]);
        $bp = array_values(array_diff($black_pieces, [$_POST['moves'][0]]));
        $wp = $white_pieces;
    } else {
        array_push($white_pieces, $_POST['moves'][1]);
        $wp = array_values(array_diff($white_pieces, [$_POST['moves'][0]]));
        $bp = $black_pieces;
    }
    $games[$game_key]= [
        'game_id' => $game_id,
        'white' => $wp,
        'black' => $bp,
        'white_king' => $white_king,
        'black_king' => $black_king,
        'turn' => $turn,
        "player_white" => $player_white,
        "player_black" => $player_black,
    ];
    // Save games to external file
    $json_file = fopen('../data/checkers.json', 'w');
    fwrite($json_file, json_encode($games));
    fclose($json_file);
    die();
}
