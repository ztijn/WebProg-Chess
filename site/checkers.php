<?php
/* Header */
$page_title = 'Checkers';
$navigation = Array(
    'active' => 'Checkers',
    'items' => Array(
        'News' => '/Webprog-Chess/site/index.php',
        'Add news item' => '/Webprog-Chess/site/news_add.php',
        'Checkers' => '/Webprog-Chess/site/checkers.php',
    )
);
include __DIR__ . '/tpl/head.php';
include __DIR__ . '/tpl/body_start.php';
?>
    <!--Script and style-->
    <script type="application/javascript" src="scripts/checkers.js"></script>
    <link rel="stylesheet" href="css/checkers.css">

    <!--Create the board as a table-->
    <div class="row">
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
    </div>
    <div class="btn btn-primary" id="startbtn">Start new game</div>

<?php
include __DIR__ . '/tpl/body_end.php';
?>