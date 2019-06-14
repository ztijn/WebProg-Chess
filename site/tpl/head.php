<?php
// P_Print function
function p_print($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}
//Save username
session_start();
if (!isset($_SESSION['username']) && isset($_POST['username'])){
    $_SESSION['username'] = $_POST['username'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $page_title ?></title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="application/javascript" src="scripts/main.js"></script>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
        <div class="container">
        <a class="navbar-brand" href="./index.php">
            <i class='fas fa-chess-board' style='font-size:24px'></i> PlayCheckers
        </a>
        <ul class="navbar-nav mr-auto">
            <?php $active = $navigation['active']; ?>
            <?php foreach($navigation['items'] as $title => $url){
                if ($title == $active){
                    if ($title === "Checkers"){ ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="#"><?= $title ?></a>
                        </li>
                    <?php } else {?>
                        <li class="nav-item active">
                            <a class="nav-link" href="<?= $url ?>"><?= $title ?></a>
                        </li>
                    <?php } ?>
                <?php } else {?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $url ?>"><?= $title ?></a>
                    </li>
                <?php } ?>
            <?php } ?>
            <!--If not logged in display login option-->
        </ul>
        </div>
    </nav>
</header>