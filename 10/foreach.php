<?php
$memberList = array(
    array('name' => '太郎', 'age' => 32, 'point' => 320),
    array('name' => '次郎', 'age' => 21, 'point' => 180),
    array('name' => '三郎', 'age' => 30, 'point' => 240),
    array('name' => '四郎', 'age' => 28, 'point' =>  80),
    array('name' => '五郎', 'age' => 24, 'point' => 480)
);

$totalAge = 0;
$totalPt  = 0;
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員リスト</title>
    <style>
        table {
            border-collapse: collapse;
            width: 800px;
            margin: auto;
        }

        th,
        td {
            border: 1px solid #666;
            padding: 15px;
        }

        th,
        tr:nth-child(even) {
            background-color: #eee;
        }
    </style>
</head>

<body>
        <table border="1">
            <tr>
                <th>名前</th>
                <th>年齢</th>
                <th>ポイント</th>
            </tr>
            <?php foreach($memberList as $member):?>
                <tr>
                    <td><?=htmlspecialchars($member['name'], ENT_QUOTES, 'UTF-8');?></td>
                    <td><?=htmlspecialchars($member['age'], ENT_QUOTES, 'UTF-8');?>歳</td>
                    <td><?=htmlspecialchars($member['point'], ENT_QUOTES, 'UTF-8');?>pt</td>
                </tr>
                <?php $totalAge += $member['age']; ?>
                <?php $totalPt  += $member['point']; ?>
            <?php endforeach;?>
            <tr>
                <th>平均</th>
                <td><?=htmlspecialchars($totalAge / count($memberList), ENT_QUOTES, 'UTF-8');?>歳</td>
                <td><?=htmlspecialchars($totalPt / count($memberList), ENT_QUOTES, 'UTF-8');?>pt</td>
            </tr>
        </table>

        <?php
            $totalAge = 0;
            $totalPt = 0;
        ?>
        <table border="1">
            <tr>
                <th>名前</th>
                <th>年齢</th>
                <th>ポイント</th>
            </tr>
            <?php for ($i = 0; $i < count($memberList); $i++):?>
                <tr>
                    <td><?=htmlspecialchars($memberList[$i]['name'], ENT_QUOTES, 'UTF-8');?></td>
                    <td><?=htmlspecialchars($memberList[$i]['age'], ENT_QUOTES, 'UTF-8');?>歳</td>
                    <td><?=htmlspecialchars($memberList[$i]['point'], ENT_QUOTES, 'UTF-8');?>pt</td>
                </tr>
                <?php $totalAge += $memberList[$i]['age']; ?>
                <?php $totalPt  += $memberList[$i]['point']; ?>
            <?php endfor;?>
            <tr>
                <th>平均</th>
                <td><?=htmlspecialchars($totalAge / count($memberList), ENT_QUOTES, 'UTF-8');?>歳</td>
                <td><?=htmlspecialchars($totalPt / count($memberList), ENT_QUOTES, 'UTF-8');?>pt</td>
            </tr>
        </table>
</body>

</html>