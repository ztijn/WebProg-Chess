function print_latest_news() {
    //Need to change this to JSON
    let black = ["A1", "C1", "E1", "G1", "I1", "B2", "D2", "F2", "H2", "J2",
    "A3", "C3", "E3", "G3", "I3", "B4", "D4", "F4", "H4", "J4"];
    let white = ["A9", "C9", "E9", "G9", "I9", "B10", "D10", "F10", "H10", "J10",
        "A7", "C7", "E7", "G7", "I7", "B8", "D8", "F8", "H8", "J8"];
    let positions = ["A1", "A2", "A3", "A4", "A5" ,"A6", "A7", "A8", "A9", "A10",
        "B1", "B2", "B3", "B4", "B5" ,"B6", "B7", "B8", "B9", "B10",
        "C1", "C2", "C3", "C4", "C5" ,"C6", "C7", "C8", "C9", "C10",
        "D1", "D2", "D3", "D4", "D5" ,"D6", "D7", "D8", "D9", "D10",
        "E1", "E2", "E3", "E4", "E5" ,"E6", "E7", "E8", "E9", "E10",
        "F1", "F2", "F3", "F4", "F5" ,"F6", "F7", "F8", "F9", "F10",
        "G1", "G2", "G3", "G4", "G5" ,"G6", "G7", "G8", "G9", "G10",
        "H1", "H2", "H3", "H4", "H5" ,"H6", "H7", "H8", "H9", "H10",
        "I1", "I2", "I3", "I4", "I5" ,"I6", "I7", "I8", "I9", "I10",
        "J1", "J2", "J3", "J4", "J5" ,"J6", "J7", "J8", "J9", "J10",
    ];

    // Show pieces if they are in the list of positions
    for (let i = 0; i < positions.length; i++) {
        if (black.includes(positions[i])) {
            $('#' + positions[i]).html("<img src='images/piece_black.png'</img>");
        } else if (white.includes(positions[i])) {
            $('#' + positions[i]).html("<img src='images/piece_white.png'</img>");
        }
    }
}

$(function() {
    print_latest_news();
    window.setInterval(function () {
        print_latest_news();
    }, 5000);
});