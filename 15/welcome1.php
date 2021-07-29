<?php



$lang    = 'ja';
$message = 'こんにちは！';

if (!empty($_POST)) {
    $lang = $_POST['lang'];
} elseif (isset($_COOKIE['lang'])) {
    $lang = $_COOKIE['lang'];
}

setcookie('lang', $lang, time() + 86400 * 30);

if ($lang == 'en') {
    $message = 'Welcome!';
} elseif ($lang == 'ja') {
    $message = 'ようこそ!';
} elseif ($lang == 'kr') {
    $message = '오신 것을 환영합니다!';
} elseif ($lang == 'cn') {
    $message = '欢迎光临!';
} elseif ($lang == 'it') {
    $message = 'Benvenuto!';
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
    <title><?= h($message) ?></title>
</head>

<body>
    <h1><?= h($message) ?></h1>
    <form action="" method="post">
        <select name="lang">
            <option value="en" <?= $lang == 'en' ? 'selected' : ''; ?>>英語</option>
            <option value="ja" <?= $lang == 'ja' ? 'selected' : ''; ?>>日本語</option>
            <option value="kr" <?= $lang == 'kr' ? 'selected' : ''; ?>>韓国語</option>
            <option value="cn" <?= $lang == 'cn' ? 'selected' : ''; ?>>中国語</option>
            <option value="it" <?= $lang == 'it' ? 'selected' : ''; ?>>イタリア語</option>
        </select>
        <p><input type="submit" value="送信"></p>
    </form>
</body>

</html>