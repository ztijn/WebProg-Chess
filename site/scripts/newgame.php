<?php
if (isset($_POST['call_now'])) {
    echo ("Hello");
    $myfile = fopen("../data/checkers.json", "w") or die ("Unable to open file");
    $txt = "[{
  \"white\":[\"A9\", \"C9\", \"E9\", \"G9\", \"I9\", \"B10\", \"D10\", \"F10\", \"H10\", \"J10\",
    \"A7\", \"C7\", \"E7\", \"G7\", \"I7\", \"B8\", \"D8\", \"F8\", \"H8\", \"J8\"],
  \"black\":[\"A1\", \"C1\", \"E1\", \"G1\", \"I1\", \"B2\", \"D2\", \"F2\", \"H2\", \"J2\",
    \"A3\", \"C3\", \"E3\", \"G3\", \"I3\", \"B4\", \"D4\", \"F4\", \"H4\", \"J4\"],
  \"king_white\":[\"\"],
  \"king_black\":[\"\"]
}]";

    fwrite($myfile, $txt);
    fclose($myfile);
}
?>
