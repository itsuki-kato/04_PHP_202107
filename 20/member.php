<?php
require_once 'db.inc.php';
require_once 'util.inc.php';

try {
    $pdo = db_init();
    $sql = 'SELECT * FROM members';
    $members = $pdo->query($sql)->fetchAll();
} catch (PDOException $e) {
    header('Content-Type: text/plain; charset=UTF-8', true, 500);
    exit($e -> getMessage());
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員管理システム</title>
    <style>
        table {
            border-collapse: collapse;
            width: 600px;
        }

        tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        th,
        td {
            border: 1px solid #aaa;
            padding: 5px;
            text-align: center;
        }

        th {
            background-color: #ddd;
        }
    </style>

</head>

<body>
    <h1>会員リスト</h1>
    <p><a href="addMember.php">会員登録をする</a></p>
    <table>
        <tr>
            <th>会員ID</th>
            <th>氏名</th>
            <th>年齢</th>
            <th>住所</th>
            <th>登録日時</th>
        </tr>
        <?php foreach ($members as $member):?>
        <tr>
            <td><?=h($member['id'])?></td>
            <td><?=h($member['name'])?></td>
            <td><?=h($member['age'])?></td>
            <td><?=h($member['address'])?></td>
            <td><?=h($member['created_at'])?></td>
        </tr>
        <?php endforeach;?>
    </table>
</body>

</html>