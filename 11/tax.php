<?php
$prices = [298, 129, 198, 274, 625, 273, 296, 325, 200, 127, 398];

/**
 * 購入商品価格の配列を引数として受け取ると、
 * 10%の税込み価格を返す
 *
 * @param array $arr
 * @return integer
 */
function getPriceInTax (array $arr = []): int
{
    $total = 0;
    foreach ($arr as $price) {
        $total += $price;
    }
    return $total * 1.1;
}

echo number_format(getPriceInTax()) . '円';