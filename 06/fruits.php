<?php
$parts  = ['梨', '柿'];
$fruits = array('リンゴ', ...$parts, 'ぶどう');

$fruits[3] = 'メロン';
$fruits[]  = 'スイカ';
unset($fruits[3]);
$fruits[]  = 'キウイ';
$fruits[3] = 'パパイヤ';

echo '<pre>';
var_dump(...$fruits);
echo '</pre>';
?>