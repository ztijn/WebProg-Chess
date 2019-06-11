<?php
session_start();
if (isset($_POST['submit'])) {
    //Send game id with get
    $args = array(
        'game_id' => $_POST['gameid']
    );
    // Read games
    $json_file = file_get_contents("../data/checkers.json");
    $games = json_decode($json_file, true);
    // Generate game ID
    $game_id = $_POST['gameid'];
    foreach ($games as $key => $value){
        //Check if game exists, if true redirect to game page
        if ($game_id == $value['game_id']) {
            if ($value['player_black'] === null) {
                $games[$key]['player_black'] = $_SESSION['username'];
                $json_file = fopen('../data/checkers.json', 'w');
                fwrite($json_file, json_encode($games));
                fclose($json_file);
            }
            header("Location: ../checkers.php?" . http_build_query($args));
            die();
        }
    };
    //Add new game
    array_push($games, [
        'game_id' => $game_id,
        'white' => ["A9", "C9", "E9", "G9", "I9", "B10", "D10", "F10", "H10", "J10",
                    "A7", "C7", "E7", "G7", "I7", "B8", "D8", "F8", "H8", "J8"],
        'black' => ["A1", "C1", "E1", "G1", "I1", "B2", "D2", "F2", "H2", "J2",
                    "A3", "C3", "E3", "G3", "I3", "B4", "D4", "F4", "H4", "J4"],
        "white_king" => [""],
        "black_king"=> [""],
        "turn" => array(
            "black_turn" => 1,
            "white_turn" => 0),
        "player_white" => $_SESSION['username'],
        "player_black" => null,
    ]);
    // Save games to external file
    $json_file = fopen('../data/checkers.json', 'w');
    fwrite($json_file, json_encode($games));
    fclose($json_file);
    // Redirect to game page
    header("Location: ../checkers.php?". http_build_query($args));
    die();
}
