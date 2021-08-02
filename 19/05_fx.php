<?php

// 以下の文章が出力されるvalidAge()関数を定義する。
// タイプヒンティングとPHPDocコメント「名前と年齢を入力し、成人判定結果を出力する。」とする。

/**
 * 名前と年齢を入力し、
 * 成人判定結果を出力する。
 *
 * @param string $name
 * @param integer $age
 * @return string
 */
function validAge (string $name = '名無しさん', int $age = 20): string
{
    // if ($age >= 20) {
    //     return $name . 'さんの年齢は' . $age . '歳で成人です。<br>';
    // } else {
    //     return $name . 'さんの年齢は' . $age . '歳で未成年です。<br>';
    // }
    // if ($age >= 20) {
    //     $result = '成人';
    // } else {
    //     $result = '未成年人';
    // }
    // return $name . 'さんの年齢は' . $age . '歳で' . $result . 'です。<br>';

    return $name . 'さんの年齢は' . $age . '歳で' . ($age >= 20 ? '成人' : '未成年') . 'です。<br>';
}
echo validAge('太郎', 21); // 太郎さんの年齢は21歳で成人です。<br>
echo validAge('次郎', 18); // 次郎さんの年齢は18歳で未成年です。<br>
echo validAge('三郎');     // 三郎さんの年齢は20歳で成人です。<br>
echo validAge();           // 名無しさんの年齢は20歳で成人です。<br>