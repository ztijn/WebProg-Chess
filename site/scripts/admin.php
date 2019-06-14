<?php
session_start();
if (isset($_POST['call_now'])) {
    if (isset($_SESSION['username'])) {
        if ($_SESSION['username'] === "admin123") {
            $exportData = [];
            // Save games to external file
            $json_file = fopen('../data/checkers.json', 'w');
            fwrite($json_file, json_encode($exportData));
            fclose($json_file);
        }
    }

}
header("Location: ../index.php");
die();