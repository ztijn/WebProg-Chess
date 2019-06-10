<?php
/* Header */
$page_title = 'Checkers';
$navigation = Array(
    'active' => 'Checkers',
    'items' => Array(
        'Home' => '/Webprog-Chess/site/index.php',
        'Checkers' => '/Webprog-Chess/site/checkers.php',
        'Rules' => '/Webprog-Chess/site/rules.php',
    )
);
if ( !session_id() ) {
    session_start();
}
$_SESSION['game_id'] = $_GET['game_id'];

include __DIR__ . '/tpl/head.php';
include __DIR__ . '/tpl/body_start.php';
?>
    <!--Script and style-->
    <script type="application/javascript" src="scripts/checkers.js"></script>
    <link rel="stylesheet" href="css/checkers.css">

    <!--Create the board as a table-->
    <div class="row">
        <!--Create the board as a table-->
    <table>
        <?php
        $Letters = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J");
        $number = 11;
        for ($row = 1; $row <= 10; $row++) {
            $number = $number - 1;
            $i = -1;
            echo "<tr id=$number>";
            for ($col = 1; $col <= 10; $col++) {
                $i = $i + 1;
                $total = $row + $col;
                if ($total % 2 == 0) {
                    echo "<td bgcolor=#f0d9b5 id='$Letters[$i]$number'></td>";
                } else {
                    echo "<td bgcolor=#b58863 id='$Letters[$i]$number'></td>";
                }
            }
            echo "</tr>";
        }
        ?>
    </table>
        <input type="hidden" value="<?php echo $_POST['game_']; ?>">

        <div class="col">
            <?php if (!isset($_SESSION['username'])) { ?>
                <form method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
                <!--If logged in display username and logout option-->
            <?php } else {
                echo "Logged in as ", ($_SESSION['username']); ?>
                <form method="post">
                    <button type="submit" id="logout" class="btn btn-secondary">Log out</button>
                </form>
            <?php } ?>

            <div class="btn btn-primary" id="startbtn" style="margin-top: 15px">
                Start new game
            </div>
            <?php echo $_SESSION['game_id']?>
        </div>
    </div>


<?php
include __DIR__ . '/tpl/body_end.php';
?>