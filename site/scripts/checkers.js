function getClicks() {
    // Define variables
    let clicked = true;
    let firstclick = undefined;
    let secondclick = undefined;
    let valid = undefined;
    let color = undefined;
    //Call turn.php which checks whose turn it is
    let validate = $.post('scripts/turn.php', {call_now: 'True'});
    validate.done(function (data) {
        // Returns true or false
        valid = data.valid;
        color = data.class;
    });
    // Clicking a
    $("td").click(function() {
        // If it is players turn
        if (valid) {
            if (clicked) {
                // Check if there is a piece
                console.log($(this).hasClass(color), color, $(this));
                if ($(this).children()[0] && $(this).hasClass(color)) {
                    // Get id of first click and add class
                    firstclick = $(this)[0].id;
                    $('#' + firstclick).addClass("selected");
                    secondclick = undefined;
                    clicked = !clicked;
                }
            } else if (validMove(firstclick, $(this)[0].id)) {
                // Get id of second click and remove class
                secondclick = $(this)[0].id;
                $('#' + firstclick).removeClass("selected");
                clicked = !clicked;
                if (firstclick !== secondclick) {
                    move(firstclick, secondclick);
                    print_latest_positions();
                }
            }
            console.log(firstclick, secondclick);
        }
        // Update turn
        validate = $.post('scripts/turn.php', {call_now: 'True'});
        validate.done(function (data) {
            valid = data.valid;
            color = data.class;
        });
    })
}

function validMove(first, second) {
    let valid = true;
    let positions_ids = ["A9", "C9", "E9", "G9", "I9", "B10", "D10", "F10", "H10", "J10",
        "A7", "C7", "E7", "G7", "I7", "B8", "D8", "F8", "H8", "J8", "A1", "C1", "E1", "G1", "I1", "B2", "D2", "F2", "H2", "J2",
        "A3", "C3", "E3", "G3", "I3", "B4", "D4", "F4", "H4", "J4","A5", "C5","E5", "G5", "I5", "B6", "D6","F6", "H6", "J6"];
    if (!positions_ids.includes(second)) {
        valid = false;
    }
    return valid;
}

function move(oldpos, newpos) {
    let move = $.post("scripts/move.php", {call_now: 'True', old_position: oldpos, new_position: newpos});
    move.done(function () {
        print_latest_positions();
    })
}

function new_game() {
    let newgame = $.post('scripts/new_game.php', {call_now: 'True'});
    newgame.done(function() {
        print_latest_positions();
    });
}

function print_latest_positions() {
    //Roept script aan die laatste posities uit json file haalt
    let positions = $.post("scripts/read_latest_positions.php", {call_now: "True"});
    let positions_ids = ["A9", "C9", "E9", "G9", "I9", "B10", "D10", "F10", "H10", "J10",
            "A7", "C7", "E7", "G7", "I7", "B8", "D8", "F8", "H8", "J8", "A1", "C1", "E1", "G1", "I1", "B2", "D2", "F2", "H2", "J2",
        "A3", "C3", "E3", "G3", "I3", "B4", "D4", "F4", "H4", "J4","A5", "C5","E5", "G5", "I5", "B6", "D6","F6", "H6", "J6"];
    positions.done(function (data) {
        //'data' is een array met daarin vier arrays. De key is de kleur/type steen
        //en de value zijn alle ids van de vakjes waar die steen in staat
        let black = data.black;
        let white = data.white;
        let white_king = data.white_king;
        let black_king = data.black_king;
        let turn = data.turn;
        let game_id = data.game_id;
        // console.log(data);
        if (data.player_black !== null) {
            $('#blackplayer').html("Black player: " + data.player_black);
        }
        $('#whiteplayer').html("White player: " + data.player_white);
        for (let i = 0; i < positions_ids.length; i++) {
            if (black.includes(positions_ids[i])) {
                $('#' + positions_ids[i]).addClass("black").html("<img src='images/piece_black.png'>");
            } else if (white.includes(positions_ids[i])){
                $('#' + positions_ids[i]).addClass("white").html("<img src='images/piece_white.png'>");
            } else if (black_king.includes(positions_ids[i])){
                $('#' + positions_ids[i]).html("<img src='images/piece_black_king.png'>");
            } else if (white_king.includes(positions_ids[i])){
                $('#' + positions_ids[i]).html("<img src='images/piece_white_king.png'>");
            } else {
                $('#' + positions_ids[i]).removeClass().html("");
            }
        }
    });
}

// function move_piece () {
//     $("td").click(function () {
//         if ($(this).children()[0]) {
//             let move1 = $(this).attr('id');
//             $("td").click(function () {
//                 let move2 = $(this).attr('id');
//                 if (move1 && move2) {
//                     let movemade = $.post('scripts/move_piece.php', {moves: [move1, move2]});
//                     movemade.done(function() {
//                         print_latest_positions();
//                     });
//                     move1 = undefined;
//                     move2 = undefined;
//                 }
//             });
//         }
//     });
// }


$(function() {
    print_latest_positions();
    getClicks();
    $("#startbtn").click(function() {
        new_game();
    });
    $("#logout").click(function() {
        logout();
    });
    window.setInterval(function () {
        print_latest_positions();
    }, 5000);
});