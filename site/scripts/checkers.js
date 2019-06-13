function getClicks() {
    // Define variables
    let clicked = true;
    let firstclick = undefined;
    let secondclick = undefined;
    let validTurn = undefined;
    let color = undefined;
    //Call turn.php which checks whose turn it is
    let validate = $.post('scripts/turn.php', {call_now: 'True'});
    validate.done(function (data) {
        // Returns true or false
        validTurn = data.valid;
        color = data.class;
    });
    // Clicking a
    $("td").click(function() {
        // If it is players turn
        if (validTurn) {
            if (clicked) {
                // Check if there is a piece
                if ($(this).children()[0] && $(this).hasClass(color)) {
                    // Get id of first click and add class
                    firstclick = $(this)[0];
                    $(this).addClass("selected");
                    secondclick = undefined;
                    clicked = !clicked;
                }
            } else if (firstclick === $(this)[0]) {
                console.log("same")
                $('#' + firstclick.id).removeClass("selected");
                clicked = !clicked;
            } else if (validMove(firstclick, $(this)[0])) {
                // Get id of second click and remove class
                secondclick = $(this)[0];
                $('#' + firstclick.id).removeClass("selected");
                clicked = !clicked;
                move(firstclick.id, secondclick.id);
                print_latest_positions();
            }
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
    let validHorizontal = [-1, 1];
    let letterToNumbers = {"A": 1, "B": 2, "C":3, "D":4, "E":5, "F": 6, "G": 7, "H":8, "I":9, "J":10};
    console.log(letterToNumbers[first.id[0]] - letterToNumbers[second.id[0]]);
    if (!validHorizontal.includes((letterToNumbers[first.id[0]] - letterToNumbers[second.id[0]]))) {
        valid = false;
    } else if ($(first).hasClass("white")) {
        if ((first.id[1] - second.id[1]) !== 1) {
            valid = false;
        }
    } else if ($(first).hasClass("black")) {
        if ((first.id[1] - second.id[1]) !== -1) {
            valid = false;
        }
    } else if (!$(second).hasClass("field")) {
        valid = false;
    } else if ($(second).hasClass("white") || $(second).hasClass("black")) {
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
    let positions_ids = $('.field').map(function(){
        return this.id
    }).get();
    positions.done(function (data) {
        //'data' is een array met daarin vier arrays. De key is de kleur/type steen
        //en de value zijn alle ids van de vakjes waar die steen in staat
        let black = data.black;
        let white = data.white;
        let white_king = data.white_king;
        let black_king = data.black_king;
        let turn = data.turn;
        if (data.player_black !== null) {
            $('#blackplayer').html("Black player: " + data.player_black);
        }
        if (turn === "player_black") {
            $('#colorturn').html("Turn: Black");
        } else {
            $('#colorturn').html("Turn: White");
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
                $('#' + positions_ids[i]).removeClass("black white").html("");
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