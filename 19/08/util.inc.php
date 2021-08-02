<?php

function serialNum($file_name)
{
    $fp = fopen('num.dat', 'r');
    $num = fgets($fp);
    fclose($fp);
    $num++;
    $fp = fopen('num.dat', 'w');
    fputs($fp, $num);
    fclose($fp);
    $num = sprintf('%03d', $num);
    return $num . '_' . $file_name;
}

/**
 * JSONの書き込み(data.jsonを連番ファイルとは別に事前準備する
 *
 * @param int $num 横並びの数
 * @param int $size 横幅
 * @return void
 */
function jsonWrite($num, $size)
{
    $obj = '{ "num": ' . $num . ',  "size": ' . $size . '}';
    $data = json_decode($obj, true);    // 連想配列で取得
    $json = fopen('data.json', 'w+b'); // 新規作成し読み書き状態
    fwrite($json, json_encode($data)); // JSONに配列形式で保存
    fclose($json);
}

/**
 * JSONの読み込み
 *
 * @return array 横並びの数と横幅の配列
 */
function jsonRead()
{
    $json = file_get_contents('data.json'); // JSONを取得
    $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN'); // UTF8に変換
    $arr = json_decode($json, true); // 連想配列で取得
    return $arr;
}

function h($string)
{
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}
