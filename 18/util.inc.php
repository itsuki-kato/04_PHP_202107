<?php
/**
 * 引数にファイル名を受けて、
 * 3桁の連番付きの文字列を返す
 *
 * @param string|null $fileName
 * @return string|null
 */
function serialNum(?string $fileName): ?string
{
    if (empty($fileName)) return null;
    $fp = fopen('num.dat', 'r');
    $id = fgets($fp);
    fclose($fp);
    $id++;
    $fp = fopen('num.dat', 'w');
    fputs($fp, $id);
    fclose($fp);
    $id = sprintf('%03d',$id);
    return $id.'_'.$fileName;
}

/**
 * XSS対策の参照名省略
 *
 * @param string string
 * @return string
 *
 */
function h(?string $string): string
{
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}