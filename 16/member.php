<?php
session_start();

if ($_SESSION['authenticated'] != true) {
    header('Location: login.php');
    exit;
}

$user = '';
$user = $_SESSION['userId'];

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
    <title>会員専用</title>
</head>
<body>
    <h1>会員専用ページ</h1>
    <p>あなたのユーザIDは<?=h($user)?>です。</p>
    <p>このページでは会員専用の情報が閲覧えきます。</p>
    <p><a href="logout.php">ログアウトする</a></p>
</body>
</html>