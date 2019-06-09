<?php
/* Header */
$page_title = 'Index';
$navigation = Array(
    'active' => 'Home',
    'items' => Array(
        'Home' => '/Webprog-Chess/site/index.php',
        'Checkers' => '/Webprog-Chess/site/checkers.php',
        'Rules' => '/Webprog-Chess/site/checkers.php',
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
    </div>
<?php
if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = $_POST['username'];
}
include __DIR__ . '/tpl/body_end.php';
?>