<?php
$goods['name']      = '和風柄レターセット';
$goods['unitPrice'] = 980;

$count = $_POST['count'];

$totalPrice = $goods['unitPrice'] * $count;
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
                <td><?= htmlspecialchars($goods['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?= htmlspecialchars($goods['unitPrice'], ENT_QUOTES, 'UTF-8'); ?>円</td>
                <td><input type="text" name="count" value="<?= htmlspecialchars($count, ENT_QUOTES, 'UTF-8'); ?>"></td>
                <td><?= htmlspecialchars($totalPrice, ENT_QUOTES, 'UTF-8'); ?>円</td>
            </tr>
        </table>
        <p><input type="submit" value="更新"></p>
    </form>
</body>

</html>