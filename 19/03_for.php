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
        <!-- 見出しの横軸 -->
        <th></th>
        <?php for ($k = 1; $k <= 9; $k++):?>
            <th><?=$k?></th>
        <?php endfor;?>
        <tr>
            <!-- 横軸 -->
            <?php for ($i = 1; $i <= 9; $i++):?>
                <!-- 最初の1列目見出しのみ -->
                <th><?=$i?></th>
                <!-- 縦軸 -->
                <?php for ($j = 1; $j <= 9; $j++):?>
                    <!-- 縦軸の9の倍数のみ改行 -->
                    <?php if ($j % 9 == 0):?>
                        <td><?=$i * $j?></td></tr><tr>
                    <?php else:?>
                        <td><?=$i * $j?></td>
                    <?php endif;?>
                <?php endfor;?>
            <?php endfor;?>
        </tr>
    </table>

</body>

</html>