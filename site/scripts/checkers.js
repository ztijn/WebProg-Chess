function print_latest_news() {
    //Need to change this to JSON
    let black = ["A1", "C1", "E1", "G1", "I1", "B2", "D2", "F2", "H2", "J2",
    "A3", "C3", "E3", "G3", "I3", "B4", "D4", "F4", "H4", "J4"];
    let white = ["A9", "C9", "E9", "G9", "I9", "B10", "D10", "F10", "H10", "J10",
        "A7", "C7", "E7", "G7", "I7", "B8", "D8", "F8", "H8", "J8"];

    // Show pieces if they are in the list of positions
    for (let i = 0; i < black.length; i++) {
        $('#' + black[i]).html("<img src='images/piece_black.png'</img>");
    } for (let i = 0; i < white.length; i++) {
        $('#' + white[i]).html("<img src='images/piece_white.png'</img>");
    }
}

$(function() {
    print_latest_news();
    window.setInterval(function () {
        print_latest_news();
    }, 5000);
});