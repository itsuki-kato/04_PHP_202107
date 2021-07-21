<?php
$goods = [
    [
        'name'      => '和風柄レターセット',
        'unitPrice' => 980
    ],
    [
        'name'      => '毛筆ペン(和風)',
        'unitPrice' => 240
    ]
];

$count1 = $_POST['count1'];
$count2 = $_POST['count2'];

$subTotal1 = $goods[0]['unitPrice'] * $count1;
$subTotal2 = $goods[1]['unitPrice'] * $count2;

$total = $subTotal1 + $subTotal2;
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ショッピングカート</title>
    <style>
        table {
            border-collapse: collapse;
            width: 600px;
        }

        th,
        td {
            border: 1px solid #666666;
            padding: 4px;
        }

        th {
            background-color: #dddddd;
        }
    </style>
</head>

<body>
    <h1>ショッピングカート</h1>
    <form action="" method="post">
        <table>
            <tr>
                <th>商品名</th>
                <th>単価</th>
                <th>数量</th>
                <th>小計</th>
            </tr>
            <tr>
                <td><?= htmlspecialchars($goods[0]['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?= htmlspecialchars($goods[0]['unitPrice'], ENT_QUOTES, 'UTF-8'); ?>円</td>
                <td><input type="text" name="count1" value="<?= htmlspecialchars($count1, ENT_QUOTES, 'UTF-8'); ?>"></td>
                <td><?= htmlspecialchars($subTotal1, ENT_QUOTES, 'UTF-8'); ?>円</td>
            </tr>
            <tr>
                <td><?= htmlspecialchars($goods[1]['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?= htmlspecialchars($goods[1]['unitPrice'], ENT_QUOTES, 'UTF-8'); ?>円</td>
                <td><input type="text" name="count2" value="<?= htmlspecialchars($count2, ENT_QUOTES, 'UTF-8'); ?>"></td>
                <td><?= htmlspecialchars($subTotal2, ENT_QUOTES, 'UTF-8'); ?>円</td>
            </tr>
            <tr>
                <th colspan="3">合計</th>
                <td><?= htmlspecialchars($total, ENT_QUOTES, 'UTF-8'); ?>円</td>
            </tr>
        </table>
        <p><input type="submit" value="更新"></p>
    </form>
</body>

</html>