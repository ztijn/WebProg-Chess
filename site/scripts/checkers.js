function getClicks() {
    // Define variables
    let clicked = true;
    let firstclick = undefined;
    let secondclick = undefined;
    let validTurn = undefined;
    let color = undefined;
    let getMoves = undefined;
    let possibleMoves = undefined;
    let hitMoves = undefined;
    //Call turn.php which checks whose turn it is
    let validate = $.post('scripts/turn.php', {call_now: 'True'});
    validate.done(function (data) {
        // Returns true or false
        validTurn = data.valid;
        color = data.class;
    });
    $("td").click(function() {
        // If it is players turn
        if (validTurn) {
            if (clicked) {
                // Check if there is a piece
                console.log(color);
                if ($(this).children()[0] && ($(this).hasClass(color) || $(this).hasClass(color+"_king"))) {
                    // Get id of first click and add class
                    firstclick = $(this)[0];
                    $(this).addClass("selected");
                    getMoves = getPossibleMoves($(this)[0]);
                    possibleMoves = getMoves[0];
                    hitMoves = getMoves[1];
                    secondclick = undefined;
                    clicked = !clicked;
                }
            } else if (firstclick === $(this)[0]) {
                $('#' + firstclick.id).removeClass("selected");
                $(".possible").removeClass("possible");
                clicked = !clicked;
                possibleMoves = undefined;
            } else if (validateMove(possibleMoves, hitMoves, firstclick, $(this)[0])) {
                // Get id of second click and remove class
                secondclick = $(this)[0];
                $('#' + firstclick.id).removeClass("selected");
                $(".possible").removeClass("possible");
                clicked = !clicked;
                possibleMoves = undefined;
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

function getPossibleMoves(first) {
    const letterToNumber = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J"];
    let possibleMoves = [];
    let hitMoves = {};
    if ($(first).hasClass("black") || $(first).hasClass("black_king")) {
        possibleMoves = [
            letterToNumber[letterToNumber.indexOf(first.id[0])+1] + (first.id[1]*1 + 1),
            letterToNumber[letterToNumber.indexOf(first.id[0])-1] + (first.id[1]*1 + 1),
        ];
        if ($("#"+possibleMoves[0]).hasClass("white") || $("#"+possibleMoves[0]).hasClass("white_king")) {
            possibleMoves.push(letterToNumber[letterToNumber.indexOf(first.id[0])+2] + (first.id[1]*1 + 2));
            hitMoves[letterToNumber[letterToNumber.indexOf(first.id[0])+2] + (first.id[1]*1 + 2)] = possibleMoves[0];
        }
        if ($("#"+possibleMoves[1]).hasClass("white") || $("#"+possibleMoves[1]).hasClass("white_king")) {
            possibleMoves.push(letterToNumber[letterToNumber.indexOf(first.id[0])-2] + (first.id[1]*1 + 2));
            hitMoves[letterToNumber[letterToNumber.indexOf(first.id[0])-2] + (first.id[1]*1 + 2)] = possibleMoves[1];
        }
        let backwardMoves = [
            letterToNumber[letterToNumber.indexOf(first.id[0])-1] + (first.id[1]*1 - 1),
            letterToNumber[letterToNumber.indexOf(first.id[0])+1] + (first.id[1]*1 - 1),
        ];
        if ($("#"+backwardMoves[0]).hasClass("white") || $("#"+backwardMoves[0]).hasClass("white_king")) {
            possibleMoves.push(letterToNumber[letterToNumber.indexOf(first.id[0])-2] + (first.id[1]*1 - 2));
            hitMoves[letterToNumber[letterToNumber.indexOf(first.id[0])-2] + (first.id[1]*1 - 2)] = backwardMoves[0];
        }
        if ($("#"+backwardMoves[1]).hasClass("white") || $("#"+backwardMoves[1]).hasClass("white_king")) {
            possibleMoves.push(letterToNumber[letterToNumber.indexOf(first.id[0])+2] + (first.id[1]*1 - 2));
            hitMoves[letterToNumber[letterToNumber.indexOf(first.id[0])+2] + (first.id[1]*1 - 2)] = backwardMoves[1];
        }
        if ($(first).hasClass("black_king")) {
            possibleMoves = possibleMoves.concat(backwardMoves);
        }
    } else if ($(first).hasClass("white") || $(first).hasClass("white_king")) {
        possibleMoves = [
            letterToNumber[letterToNumber.indexOf(first.id[0])-1] + (first.id[1]*1 - 1),
            letterToNumber[letterToNumber.indexOf(first.id[0])+1] + (first.id[1]*1 - 1),
        ];
        if ($("#"+possibleMoves[0]).hasClass("black") || $("#"+possibleMoves[0]).hasClass("black_king")) {
            possibleMoves.push(letterToNumber[letterToNumber.indexOf(first.id[0])-2] + (first.id[1]*1 - 2));
            hitMoves[letterToNumber[letterToNumber.indexOf(first.id[0])-2] + (first.id[1]*1 - 2)] = possibleMoves[0];
        }
        if ($("#"+possibleMoves[1]).hasClass("black") || $("#"+possibleMoves[1]).hasClass("black_king")) {
            possibleMoves.push(letterToNumber[letterToNumber.indexOf(first.id[0])+2] + (first.id[1]*1 - 2));
            hitMoves[letterToNumber[letterToNumber.indexOf(first.id[0])+2] + (first.id[1]*1 - 2)] = possibleMoves[1];
        }
        let backwardMoves = [
            letterToNumber[letterToNumber.indexOf(first.id[0])+1] + (first.id[1]*1 + 1),
            letterToNumber[letterToNumber.indexOf(first.id[0])-1] + (first.id[1]*1 + 1),
        ];
        if ($("#"+backwardMoves[0]).hasClass("black") || $("#"+backwardMoves[0]).hasClass("black_king")) {
            possibleMoves.push(letterToNumber[letterToNumber.indexOf(first.id[0])+2] + (first.id[1]*1 + 2));
            hitMoves[letterToNumber[letterToNumber.indexOf(first.id[0])+2] + (first.id[1]*1 + 2)] = backwardMoves[0];
        }
        if ($("#"+backwardMoves[1]).hasClass("black") || $("#"+backwardMoves[1]).hasClass("black_king")) {
            possibleMoves.push(letterToNumber[letterToNumber.indexOf(first.id[0])-2] + (first.id[1]*1 + 2));
            hitMoves[letterToNumber[letterToNumber.indexOf(first.id[0])-2] + (first.id[1]*1 + 2)] = backwardMoves[1];
        }
        if ($(first).hasClass("white_king")) {
            possibleMoves = possibleMoves.concat(backwardMoves);
        }
    }
    for (let i = possibleMoves.length-1; i>=0; i--) {
        if (!$("#"+possibleMoves[i]).hasClass("field")) {
            possibleMoves.splice(i, 1);
        } else if ($("#"+possibleMoves[i]).hasClass("white") || $("#"+possibleMoves[i]).hasClass("black")
            || $("#"+possibleMoves[i]).hasClass("white_king") || $("#"+possibleMoves[i]).hasClass("black_king")) {
            possibleMoves.splice(i, 1);
        } else {
            $("#"+possibleMoves[i]).addClass("possible");
        }
    }
    return [possibleMoves, hitMoves];
}

function validateMove(possible, hit, first, second) {
    let valid = true;
    if (possible.includes(second.id)) {
        if (hit !== undefined && second.id in hit) {
            let remove = $.post("scripts/remove_piece.php", {call_now: 'True', remove_piece: hit[second.id]});
            remove.done(function () {
                print_latest_positions();
            })
        }
    } else {
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
                $('#' + positions_ids[i]).addClass("black_king").html("<img src='images/piece_black_king.png'>");
            } else if (white_king.includes(positions_ids[i])){
                $('#' + positions_ids[i]).addClass("white_king").html("<img src='images/piece_white_king.png'>");
            } else {
                $('#' + positions_ids[i]).removeClass("black white white_king black_king").html("");
            }
        }
    });
}

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