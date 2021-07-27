<?php
$arrNum = [1490, 320, 2160, 1980, 498, 2324, 698, 2218, 1240, 198, 240];
$total = 0;
for ($i = 0; $i < count($arrNum); $i++) {
    echo $arrNum[mt_rand(0, array_key_last($arrNum))] . ' | ';
    $total += $arrNum[mt_rand(0, array_key_last($arrNum))];
}
echo '<br>' . number_format($total / count($arrNum)) . '円';