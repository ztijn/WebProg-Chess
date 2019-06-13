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
            $turn = $value["turn"];
            $player_white = $value["player_white"];
            $player_black = $value["player_black"];
        }
    }

    $upgrade_black = ["B9", "D9", "F9", "H9", "J9"];
    $upgrade_white = ["A0", "C0", "E0", "G0", "I0"];

    // Remove old position and add new position
    if (($oldkey = array_search($_POST['old_position'], $white)) !== false) {
        unset($white[$oldkey]); $white = array_values($white);
        if (array_search($_POST['new_position'], $upgrade_white)) {
            array_push($white_king, $_POST['new_position']);
        } else {
            array_push($white, $_POST['new_position']);
        }
    } else if (($oldkey = array_search($_POST['old_position'], $black)) !== false) {
        unset($black[$oldkey]); $black = array_values($black);
        if (array_search($_POST['new_position'], $upgrade_black)) {
            array_push($black_king, $_POST['new_position']);
        } else {
            array_push($black, $_POST['new_position']);
        }
    } else if (($oldkey = array_search($_POST['old_position'], $black_king)) !== false) {
        unset($black_king[$oldkey]); $black_king = array_values($black_king);
        array_push($black_king, $_POST['new_position']);
    } else if (($oldkey = array_search($_POST['old_position'], $white_king)) !== false) {
            unset($white_king[$oldkey]); $white_king = array_values($white_king);
            array_push($white_king, $_POST['new_position']);
    }


    // Change turn
    if ($turn === "player_black") {
        $turn = "player_white";
    } else {
        $turn = "player_black";
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