<?php
/* Header */
$page_title = 'Webprogramming Assignment 3';
$navigation = Array(
    'active' => 'News',
    'items' => Array(
        'News' => '/Webprog-Chess/site/index.php',
        'Add news item' => '/Webprog-Chess/site/news_add.php',
        'Checkers' => '/Webprog-Chess/site/checkers.php',
    )
);
include __DIR__ . '/tpl/head.php';
include __DIR__ . '/tpl/body_start.php';
?>
    <script type="application/javascript" src="scripts/main.js"></script>
    <div class="pd-40"></div>
    <div class="row">
        <div class="col-md-12" id="news_container">
        </div>
    </div>
<?php
include __DIR__ . '/tpl/body_end.php';
?>