<?php
/* Header */
$page_title = 'Index';
$navigation = Array(
    'active' => 'Home',
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
        <div class="col-md-12" id="introduction">
            <h1>
                Welcome to Checkers!
            </h1>

            <h2>
                Fill in your username to get started.
            </h2>
        </div>

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
                <br/>
                <form action="scripts/add_game.php" method="post">
                    <div class="form-group">
                        <label for="gameid">Game ID</label>
                        <input type="text" class="form-control" id="gameid" name="gameid" placeholder="Enter a game id">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Enter game</button>
                </form>
            <?php } ?>

        </div>
    </div>
<?php

include __DIR__ . '/tpl/body_end.php';
?>