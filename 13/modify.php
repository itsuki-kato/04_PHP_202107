<?php
// パラメータを利用して「2025年2月末日」と「現在日時の10日前」を取得
// ２つの日付の「差」と「日数」を以下のような形式で表示する。
// 変数名は$d1と$d2とする。曜日は(水)のように曜日を付けなくてよい。

$week = ['日', '月', '火', '水', '木', '金', '土'];
$d1 = new DateTime();
$d1->modify('last day of February 2025');
$w1 = $week[$d1->format('w')];

$d2 = new DateTime();
$d2->modify('-10 days');
$w2 = $week[$d2->format('w')];

$interval = $d1->diff($d2);

if ($interval->days == 0) {
    echo '同じです';
} else {
    if ($interval->invert == 1) {
        echo $d1->format('Y年m月d日') . '('. $w1 . ')の方が「' . $interval->days . '日分」' . $d2->format('Y年m月d日') . '('. $w2 . ')より新しいです';
    } else {
        echo $d2->format('Y年m月d日') . '('. $w2 . ')の方が「' . $interval->days . '日分」' . $d1->format('Y年m月d日') . '('. $w1 . ')より新しいです';
    }
}

// echo '<pre>';
// print_r($interval);
// echo '</pre>';]