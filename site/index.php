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

    <div class="row">
        <div class="col-md-12" id="introduction">
            <h1>Welcome to Checkers!</h1>
            <h2>Here you can play checkers against your friends or a random player! Read the rules of the game to learn more about checkers
                or fill in your username to get started in a game.
            </h2>
        </div>
    </div>
    <div class="row">
        <img src="images/checkers.jpeg" alt="checkers" id="checkersimg">
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <?php if (!isset($_SESSION['username'])) { ?>
            <div class="card col col-md-3">
                <div class="card-header bg-transparent">
                    <h5 class="card-title text-center">Game ID</h5>
                </div>
                <form>
                    <div class="form-group card-body">
                        <input type="text" class="form-control" id="gameid" name="gameid" aria-describedby="loginFirst" placeholder="Enter a game id">
                        <small id="loginFirst" class="form-text text-danger text-center">Please login first!</small>
                    </div>
                    <div class="card-footer bg-transparent text-center">
                        <div class="btn btn-secondary" id="entergame">Enter game</div>
                    </div>
                </form>
            </div>
            <div class="card col col-md-3">
                <div class="card-header bg-transparent">
                    <h5 class="card-title text-center">Username</h5>
                </div>
                <form target="_self" method="post">
                    <div class="form-group card-body">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username">
                    </div>
                    <div class="card-footer bg-transparent text-center">
                        <div id="submit" class="btn btn-primary">Login</div>
                    </div>
                </form>
            </div>
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
                        <button type="submit" name="submit" class="btn btn-primary" id="entergame">Enter game</button>
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
                <div class="card-footer bg-transparent text-center row text-center">
                    <form method="post">
                        <button type="submit" id="logout" class="btn btn-secondary" >Log out</button>
                    </form>
                    <?php if ($_SESSION['username'] === "admin123") { ?>
                        <form method="post" action="scripts/admin.php">
                            <button name="call_now" type="submit" id="admin" class="btn btn-danger">Reset</button>
                        </form>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
        <div class="col-md-3"></div>
        </div>

<?php

include __DIR__ . '/tpl/body_end.php';
include __DIR__ . '/tpl/foot.php';
?>