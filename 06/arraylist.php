<?php
$fruits = ['リンゴ', 'バナナ', 'ぶどう'];

// 果物の値段リストを作成
$arrayList = array
(
  'リンゴ' => 100,
  'バナナ' => 200,
  'ぶどう' => 300
);

$fruits[2] = 'イチゴ';
$fruits[3] = 'メロン';
unset($fruits[3]);
$fruits[]  = 'イチジク';

echo '<pre>';
var_dump($fruits);
echo '</pre>';

echo '<pre>';
print_r($fruits);
echo '</pre>';

$arrayList['イチゴ'] = 400;
$arrayList['リンゴ'] = 80;

echo '<pre>';
print_r($arrayList);
echo '</pre>';
