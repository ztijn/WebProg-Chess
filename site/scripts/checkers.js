function new_game() {
    // $.post("scripts/new_game.php", {call_now: "True"});
    console.log("Hello");
    let newgame = $.post('scripts/new_game.php', {call_now: 'True'});
    newgame.done(function(data) {
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
        for (let i = 0; i < positions_ids.length; i++) {
            if (black.includes(positions_ids[i])) {
                $('#' + positions_ids[i]).html("<img src='images/piece_black.png'>");
            } else if (white.includes(positions_ids[i])){
                $('#' + positions_ids[i]).html("<img src='images/piece_white.png'>");
            } else if (black_king.includes(positions_ids[i])){
                $('#' + positions_ids[i]).html("<img src='images/piece_black_king.png'>");
            } else if (white_king.includes(positions_ids[i])){
                $('#' + positions_ids[i]).html("<img src='images/piece_white_king.png'>");
            } else {
                $('#' + positions_ids[i]).html("");
            }
        }
    });
}

$(function() {
    print_latest_positions();
    $("#startbtn").click(function() {
        new_game();
    });
    window.setInterval(function () {
        print_latest_positions();
    }, 5000);
});