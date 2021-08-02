<?php
$data = [
    [
        'code'    => 'A0001',
        'product' => '白菜（1玉）',
        'price'   => 298
    ],
    [
        'code'    => 'K0001',
        'product' => 'いわし（5尾）',
        'price'   => 240
    ],
    [
        'code'    => 'A0002',
        'product' => '九条葱（1パック）',
        'price'   => 258
    ],
    [
        'code'    => 'A0003',
        'product' => 'サツマイモ（1袋）',
        'price'   => 180
    ],
    [
        'code'    => 'K0002',
        'product' => 'きびなご（1皿）',
        'price'   => 180
    ]
];
echo '<pre>';
print_r($data);
echo '</pre>';
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
            width: 600px;
        }

        th,
        td {
            border: 1px solid #666666;
            padding: 4px;
            text-align: center;
        }

        th {
            background-color: #dddddd;
        }
    </style>
</head>

<body>
        <table>

            <tr>
                <?php foreach ($data[0] as $key => $value):?>
                    <th><?=$key?></th>
                <?php endforeach;?>
            </tr>

            <?php foreach ($data as $d):?>
            <tr>
                <td><?=$d['code']?></td>
                <td><?=$d['product']?></td>
                <td><?=$d['price']?></td>
            </tr>
            <?php endforeach;?>
        </table>
</body>

</html>