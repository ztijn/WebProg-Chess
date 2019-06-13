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

            <?php if (!isset($_SESSION['username'])) { ?>
                <form target="_self" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username">
                    </div>
                    <div id="submit" class="btn btn-primary">Login</div>
                </form>
                <!--If logged in display username and logout option-->
            <?php } else { ?>
                <div class="card col col-md-3">
                    <div class="card-header bg-transparent">
                        <h5 class="card-title text-center">Game ID</h5>
                    </div>
                    <form action="scripts/add_game.php" method="post">
                        <div class="form-group card-body">
                            <input type="text" class="form-control" id="gameid" name="gameid" placeholder="Enter a game id">
                        </div>
                        <div class="card-footer bg-transparent text-center">
                            <button type="submit" name="submit" class="btn btn-primary">Enter game</button>
                        </div>
                    </form>
                </div>
                <div class="card col col-md-3">
                    <div class="card-header bg-transparent">
                        <h5 class="card-title text-center"> User </h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text"> <?php echo "Logged in as ", ($_SESSION['username']); ?> </p>
                    </div>
                    <div class="card-footer bg-transparent text-center">
                        <form method="post">
                            <button type="submit" id="logout" class="btn btn-secondary" >Log out</button>
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="row">
            <img src="images/checkers.jpeg" alt="checkers" id="checkersimg">
        </div>
    </div>
<?php

include __DIR__ . '/tpl/body_end.php';
?>