<?php
/* Header */
$page_title = 'Rules';
$navigation = Array(
    'active' => 'Rules',
    'items' => Array(
        'Home' => '/Webprog-Chess/site/index.php',
        'Checkers' => '/Webprog-Chess/site/checkers.php',
        'Rules' => '/Webprog-Chess/site/rules.php',
    )
);
include __DIR__ . '/tpl/head.php';
include __DIR__ . '/tpl/body_start.php';
?>
    <script type="application/javascript" src="scripts/main.js"></script>

    <div class="pd-40"></div>
    <div class="row">
        <div class="col-md-12" id="Rulesintro">
            <h1>
                The rules of checkers are simple!
            </h1>
            <h2>
                You can read them below!
            </h2>
        </div>
        <div class="col-md-12" id="Rules">
            <h3>Game Basics</h3>
            <p>Checkers is played by two players. Each player begins the game with 12 colored discs. (Typically, one set of pieces is black and the other red.) Each player places his or her pieces on the 12 dark squares closest to him or her. Black moves first. Players then alternate moves.</p>
            <p>The board consists of 64 squares, alternating between 32 dark and 32 light squares. It is positioned so that each player has a light square on the right side corner closest to him or her.</p>
            <p>A player wins the game when the opponent cannot make a move. In most cases, this is because all of the opponent's pieces have been captured, but it could also be because all of his pieces are blocked in.</p>

            <h3>Rules of the Game</h3>

            <ul>
                <p>
                    Moves are allowed only on the dark squares, so pieces always move diagonally.
                    Single pieces are always limited to forward moves (toward the opponent).
                </p>

                <p>
                    A piece making a non-capturing move (not involving a jump) may move only one square.
                </p>

                <p>
                    A piece making a capturing move (a jump) leaps over one of the opponent's pieces, landing in a straight diagonal line on the other side. Only one piece may be captured in a single jump; however, multiple jumps are allowed during a single turn.
                </p>

                <p>
                    When a piece is captured, it is removed from the board.
                </p>

                <p>
                    If a player is able to make a capture, there is no option; the jump must be made. If more than one capture is available, the player is free to choose whichever he or she prefers.
                </p>

                <p>
                    When a piece reaches the furthest row from the player who controls that piece, it is crowned and becomes a king. One of the pieces which had been captured is placed on top of the king so that it is twice as high as a single piece.
                </p>

                <p>
                    Kings are limited to moving diagonally but may move both forward and backward. (Remember that single pieces, i.e. non-kings, are always limited to forward moves.)
                </p>

                <p>
                    Kings may combine jumps in several directions, forward and backward, on the same turn. Single pieces may shift direction diagonally during a multiple capture turn, but must always jump forward (toward the opponent).
                </p>
            </ul>
        </div>
    </div>

<?php
if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = $_POST['username'];
}
include __DIR__ . '/tpl/body_end.php';
?>