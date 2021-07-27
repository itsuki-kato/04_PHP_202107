<?php

/**
 * 4桁の年数を受け取り和暦に変換
 *
 * @param integer $seireki
 * @return string
 */
function getWareki(int $seireki): string
{
    if (empty($seireki)) { return ''; }

    if (!is_numeric($seireki) || $seireki < 1868) {
        $wareki = '未対応';
    } else {
        if ($seireki < 1912) {
            $year = $seireki - 1867;
            if ($year == 1) {
                $wareki = '明治元年';
            } else {
                $wareki = '明治' . $year . '年';
            }
        } elseif ($seireki < 1926) {
            $year = $seireki - 1911;
            $wareki = '大正' . ($year == 1 ? '元' : $year) . '年';
        } elseif ($seireki < 1989) {
            $year = $seireki - 1925;
            switch ($year) {
                case 1: $year = '元';
            }
            $wareki = '昭和' . $year . '年';
        } elseif ($seireki < 2019) {
            $year = $seireki - 1988;
            if ($year == 1) $year = '元';
            $wareki = '平成' . $year . '年';
        } else {
            $year = $seireki - 2018;
            if ($year == 1) $year = '元';
            $wareki = '令和' . $year . '年';
        }
    }
    return $wareki;
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
