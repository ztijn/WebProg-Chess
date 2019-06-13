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
    <script type="application/javascript" src="scripts/login.js"></script>
    <link rel="stylesheet" href="css/checkers.css">

    <div class="container">
    <div class="pd-40"></div>
    <div class="row">
        <div class="col-md-12" id="introduction">
            <h1>
                Welcome to Checkers!
            </h1>

            <h2>
                Here you can play checkers against your friends or a random player! Read the rules of the game to learn more about checkers
                or fill in your username to get started in a game.
            </h2>
        </div>

        <div class="col">
            <?php if (!isset($_SESSION['username'])) { ?>
                <form target="_self" action="checkers.php" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username">
                    </div>
                    <div id="submit" class="btn btn-primary">Login</div>
                </form>
                <!--If logged in display username and logout option-->
            <?php } else {
                echo "Logged in as ", ($_SESSION['username']); ?>
                <form method="post">
                    <button type="submit" id="logout" class="btn btn-secondary">Log out</button>
                </form>
            <?php } ?>
        </div>
        <div class="row">
            <img src="images/checkers.jpeg" alt="checkers" id="checkersimg">
        </div>
    </div>
    </div>
<?php

include __DIR__ . '/tpl/body_end.php';
?>