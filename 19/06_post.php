<?php
$name = '';
$age  = '';
$mail = '';
if (!empty($_POST)) {
    $name = $_POST['name'];
    $age  = $_POST['age'];
    $mail = $_POST['mail'];
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
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>フォーム</title>
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
    <h1>フォーム</h1>
    <form action="" method="post">
        <p>名前：<input type="text" name="name" value="<?= h($name) ?>"></p>
        <p>年齢：<input type="text" name="age" value="<?= h($age) ?>"></p>
        <p>メール：<input type="email" name="mail" value="<?= h($mail) ?>"></p>
        <p><input type="submit" value="送信"></p>
    </form>
    <?php if ($_SERVER["REQUEST_METHOD"] === "POST") : ?>
        <table>
            <tr>
                <th>名前</th>
                <th>年齢</th>
                <th>メール</th>
            </tr>
            <tr>
                <td><?= h($name) ?></td>
                <td><?= h($age) ?></td>
                <td><?= h($mail) ?></td>
            </tr>
        </table>
    <?php endif; ?>
</body>

</html>