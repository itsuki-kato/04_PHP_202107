<?php
require_once 'Validation.php';

$name  = '';
$kana  = '';
$phone = '';

$error = [
    'name'  => '',
    'kana'  => '',
    'phone' => ''
];

if (!empty($_POST)) {

    $name = $_POST['name'];
    $kana = $_POST['kana'];
    $phone = $_POST['phone'];

    $v = new Validation();
    $error['name']  = $v->validName($name);
    $error['kana']  = $v->validKana($kana);
    $error['phone'] = $v->validPhone($phone);

    echo '<pre>';
    print_r($error);
    echo '</pre>';
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
    <title>ユーザ情報入力</title>
    <style>
        table {
            border: 1px solid #666;
            border-collapse: collapse;
            width: 450px;
        }

        th {
            border: 1px solid #666;
            background-color: #ddd;
            padding: 4px;
            width: 100px;
        }

        td {
            border: 1px solid #666;
            padding: 4px;
        }

        .error {
            font-weight: bold;
            color: #f00;
            font-size: 11px;
        }
    </style>
</head>

<body>
    <h1>ユーザ情報入力</h1>
    <?php if ($error['name'] == '' || $error['kana'] == '' || $error['phone'] == ''):?>
        <table>
            <tr>
                <th>氏名</th>
                <td><?=h($name)?></td>
            </tr>
            <tr>
                <th>フリガナ</th>
                <td><?=h($kana)?></td>
            </tr>
            <tr>
                <th>電話番号</th>
                <td><?=h($phone)?></td>
            </tr>
        </table>
        <p>入力ありがとございました。</p>
        <p><a href="noFlag2.php">戻る</a></p>
    <?php else:?>
    <p>下のフォームに記入して「送信」ボタンを押してください</p>
    <form action="" method="post" novaridate>
        <table>
            <tr>
                <th>氏名</th>
                <td><input type="text" name="name" size="15" value="<?= h($name) ?>">
                <?php if (isset($error['name'])):?>
                    <span class="error"><?=h($error['name'])?></span>
                <?php endif;?>
            </td>
            </tr>
            <tr>
                <th>フリガナ</th>
                <td><input type="text" name="kana" size="15" value="<?= h($kana) ?>">
                <?php if (isset($error['kana'])):?>
                    <span class="error"><?=h($error['kana'])?></span>
                <?php endif;?>
            </td>
            </tr>
            <tr>
                <th>電話番号</th>
                <td><input type="text" name="phone" size="15" value="<?= h($phone) ?>">
                <?php if (isset($error['phone'])):?>
                    <span class="error"><?=h($error['phone'])?></span>
                <?php endif;?>
            </td>
            </tr>
        </table>
        <p><input type="submit" value="送信"></p>
    </form>
    <?php endif;?>
</body>

</html>