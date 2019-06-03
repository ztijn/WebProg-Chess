

<table width="600px" cellspacing="0px" cellpadding="0px" border="1px">

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
                    echo "<td height=60px width=60px bgcolor=#f0d9b5 id='$Letters[$i]$number'></td>";
                } else {
                    echo "<td height=60px width=60px bgcolor=#b58863 id='$Letters[$i]$number'></td>";
                }
            }
            echo "</tr>";
        }
    ?>

</table>