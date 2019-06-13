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
        'white' => ["A8", "C8", "E8", "G8", "I8", "B9", "D9", "F9", "H9", "J9",
            "A6", "C6", "E6", "G6", "I6", "B7", "D7", "F7", "H7", "J7"],
        'black' => ["A0", "C0", "E0", "G0", "I0", "B1", "D1", "F1", "H1", "J1",
            "A2", "C2", "E2", "G2", "I2", "B3", "D3", "F3", "H3", "J3"],
        "white_king" => [],
        "black_king"=> [],
        "turn" => "player_black",
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
