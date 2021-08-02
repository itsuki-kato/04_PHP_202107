<?php
// 下の各問題を出力するときに毎回<br>タグを文字列結合し改行を行う。

// ① 変数「$greeting」に「おはよう」を代入し画面に表示する。

// ② その出力の後に、もう一度「$greeting」に「こんにちは」を再代入し、改めて画面に表示する。

// ③ 定数「DAYS_IN_WEEK」に「7」を定義し(方法はどちらでもよい)画面に表示する。

// ④ 変数$xに「好きな果物は」を代入し、変数$yに「りんごです」を代入。
// さらに変数$xと変数$yを複合演算子を使って文字列結合することで再代入し、画面に表示する。

$greeting = 'おはよう';
echo $greeting . '<br>';

$greeting = 'こんにちは';
echo $greeting . '<br>';

// const DAYS_IN_WEEK = 7;
define('DAYS_IN_WEEK', 7);
echo DAYS_IN_WEEK . '<br>';

$x = '好きな果物は';
$y = 'りんごです';
$x .= $y;
echo $y;
