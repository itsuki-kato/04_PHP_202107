<?php
$alph = 'A-B-C';

$exp = explode('-', $alph);

$push = array_push($exp, 'D');

array_push($exp, $push . '個');

$imp = implode(' | ', $exp);

echo '<pre>';
print_r($imp);
echo '</pre>';