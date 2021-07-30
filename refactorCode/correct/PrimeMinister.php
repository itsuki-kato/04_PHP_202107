<?php

class PrimeMinister
{
    // 任期最終日と総理大臣を紐づけている。
    // （厳密には後任者の任期初日=前任者の任期最終日だが、交代の日は後任者にしている）
    const PRIME_MINISTER_LIST = array(
        '1989-06-02' => '竹下登',
        '1989-08-09' => '宇野宗佑',
        '1991-11-04' => '海部俊樹',
        '1993-08-08' => '宮澤喜一',
        '1994-04-27' => '細川護熙',
        '1994-06-29' => '羽田孜',
        '1996-01-10' => '村山富市',
        '1998-07-29' => '橋本龍太郎',
        '2000-04-04' => '小渕恵三',
        '2001-04-25' => '森喜朗',
        '2006-09-25' => '小泉純一郎',
        '2007-09-25' => '安倍晋三',
        '2008-09-23' => '福田康夫',
        '2009-09-16' => '麻生太郎',
        '2010-06-08' => '鳩山由紀夫',
        '2011-09-02' => '菅直人',
        '2012-12-25' => '野田佳彦',
        '2019-04-30' => '安倍晋三', // ここだけ、平成最後の日
    );

    public function getPrimeMinister($post)
    {
        if(empty($post['send'])) {
            return;
        }

        foreach (self::PRIME_MINISTER_LIST as $key => $val) {

            // ランダム日付が任期最終日以前の場合、総理大臣名を変数に代入し、ループ処理終了。
            if ($post['date'] <= $key) {
                $prime_minister = $val;
                break;
            }
        }

        return !empty($prime_minister) ? $prime_minister : '';
    }
}
