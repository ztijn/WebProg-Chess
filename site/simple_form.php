<?php
/* Header */
$page_title = 'Webprogramming Assignment 3 - Simple Form';
$navigation = Array(
    'active' => 'Simple Form',
    'items' => Array(
        'News' => '/WP19/assignment_3/index.php',
        'Add news item' => '/WP19/assignment_3/news_add.php',
        'Leap Year' => '/WP19/assignment_3/leapyear.php',
        'Simple Form' => '/WP19/assignment_3/simple_form.php'
    )
);
include __DIR__ . '/tpl/head.php';
include __DIR__ . '/tpl/body_start.php';
?>
    <div class="row wp-row">
        <div class="col-md-12">
            <br>
            <h1>
                <?php
                if (empty($_GET["name"])) {
                    echo "Welcome!";
                } else {
                    echo "Welcome " . $_GET["name"] . "!";
                }
                ?>
            </h1>
            <p>
                <?php
                if (empty($_GET["place"])) {
                    echo "Where are you from?";
                } elseif ($_GET["place"] == "Amsterdam") {
                    echo "You're from the capital of the Netherlands!";
                } else {
                    echo "You're from " . $_GET["place"] . "!";
                }
                ?>
            </p>
            <form method="GET">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="name">
                </div>
                <div class="form-group">
                    <label for="age">Place</label>
                    <input type="text" class="form-control" id="place" name="place" placeholder="city">
                </div>
                <button type="submit" id="confirm" class="btn btn-primary">Confirm</button>
            </form>
        </div>
    </div>



<?php
include __DIR__ . '/tpl/body_end.php';
?>