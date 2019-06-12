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
            $game_key = $key;
            $white = $value["white"];
            $black = $value["black"];
            $white_king = $value["white_king"];
            $black_king = $value["black_king"];
            if ($value["turn"]["black_turn"] === 1) {
                $turn = "black";
            } else {
                $turn = "white";
            }
            $player_white = $value["player_white"];
            $player_black = $value["player_black"];
            if (($oldkey = array_search($_POST['old_position'], $white)) !== false) {
                unset($white[$oldkey]); $white = array_values($white);
                array_push($white, $_POST['new_position']);
            } else if (($oldkey = array_search($_POST['old_position'], $black)) !== false) {
                unset($black[$oldkey]); $black = array_values($black);
                array_push($black, $_POST['new_position']);
            }
        }
    }
    // Save data into array
    $games[$game_key] = [
        'game_id'  => $_SESSION['game_id'],
        'white' => $white,
        'black' => $black,
        'white_king' => $white_king,
        'black_king' => $black_king,
        'turn' => $turn,
        'player_white' => $player_white,
        'player_black' => $player_black,

    ];
    // Save games to external file
    $json_file = fopen('../data/checkers.json', 'w');
    fwrite($json_file, json_encode($games));
    fclose($json_file);
    die();
}
?>