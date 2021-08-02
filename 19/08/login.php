<?php

require_once 'util.inc.php';
const UP_PATH = 'uploads/';
session_start();

$arr = jsonRead();
$num = $arr['num'];
$size = $arr['size'];

$user = '';

// if (!empty($_SESSION)) {
//     if ($_SESSION['authenticated'] == true) {
//         header('Location: member.php');
//         exit;
//     }
// }


if (!empty($_POST)) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    if ($user === 'taro' and $pass === 'abcd') {

        $_SESSION['authenticated'] = true;
        $_SESSION['userId'] = $user;

        header('Location: member.php');
        exit;
    } else {
        $loginError = 'ユーザIDかパスワードが正しくありません';
    }
}

$files = glob('uploads/*.png');

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>ログイン</h1>
    <p>ユーザIDとパスワードを入力して「ログイン」ボタンを押してください。</p>
    <?php if (isset($loginError)): ?>
        <p class="error"><?=h($loginError)?></p>
    <?php endif; ?>
    <form action="" method="post">
        <table>
            <tr>
                <td>ユーザID</td>
                <td><input type="text" name="user" value="<?= h($user) ?>"></td>
            </tr>
            <tr>
                <td>パスワード</td>
                <td><input type="password" name="pass"></td>
            </tr>
        </table>
        <p><input type="submit" value="送信"></p>
    </form>

    <?php if (0 < count($files)) : ?>
        <table style="width:<?= $size * $num * .8 ?>px">
            <tr>
                <th colspan="<?=h($num)?>">画像一覧</th>
            </tr>
            <tr>
                <?php for ($i = 0; $i < count($files); $i++) : ?>
                    <?php
                    $file = mb_convert_encoding($files[$i], 'utf8', 'cp932');
                    $file_name = str_replace(['uploads/', '.png'], '', $file);
                    ?>
                    <?php if ($i % $num == ($num - 1)) : ?>
                        <td><img src="<?= h($files[$i]) ?>" alt="<?= h($file) ?>" width="<?=h($size)?>"><span><?= h($file_name) ?></span></td>
            </tr>
            <tr>
            <?php else : ?>
                <td><img src="<?= h($files[$i]) ?>" alt="<?= h($file) ?>" width="<?=h($size)?>"><span><?= h($file_name) ?></span></td>
            <?php endif; ?>
        <?php endfor; ?>
            </tr>
        </table>
    <?php else : ?>
        <table>
            <tr>
                <th>画像一覧</th>
            </tr>
            <tr>
                <td>アップロードされたファイルはありません</td>
            </tr>
        </table>
    <?php endif; ?>
    <p><a href="member.php">会員ページに移動する</a></p>
</body>

</html>