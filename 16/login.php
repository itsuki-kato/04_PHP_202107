<?php
session_start();

if (!empty($_SESSION) && $_SESSION['authenticated'] == true) {
    header('Location: member.php');
    exit;
}

$user = '';
if (!empty($_POST)) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    if ($user === 'taro' && $pass === 'abcd') {

        $_SESSION['authenticated'] = true;
        $_SESSION['userId']        = $user;

        header('Location: member.php');
        exit;
    } else {
        $loginError = 'ユーザIDかパスワードが正しくありません';
    }
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
    <title>ログイン</title>
    <style>
        .error {
            color: #f00;
        }
    </style>
</head>

<body>
    <h1>ログイン</h1>
    <?php if (isset($loginError)):?>
        <p class="error"><?=h($loginError)?></p>
    <?php endif;?>
    <p>ユーザIDとパスワードを入力して「ログイン」ボタンを押してください</p>
    <form action="" method="post">
        <table>
            <tr>
                <td>ユーザID</td>
                <td><input type="text" name="user" value="<?=h($user)?>"></td>
            </tr>
            <tr>
                <td>パスワード</td>
                <td><input type="password" name="pass"></td>
            </tr>
        </table>
        <p><input type="submit" value="ログイン"></p>
    </form>
</body>

</html>