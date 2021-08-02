<?php
require_once 'util.inc.php';
session_start();

if ($_SESSION['authenticated'] != true) {

    header('Location: login.php');
    exit;
}

const UP_PATH = 'uploads/';
$size = 200;
$num  = 5;

$userId = $_SESSION['userId'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $size = $_POST['size'];
    $num  = $_POST['num'];
    jsonWrite($num, $size);

    if ($_FILES['upfile']['error'] == UPLOAD_ERR_OK) {
        if (!move_uploaded_file(
            $_FILES['upfile']['tmp_name'],
            UP_PATH . serialNum(mb_convert_encoding(
                $_FILES['upfile']['name'],
                'cp932',
                'utf8')
            )
        )) {
            $errorMessage = 'アップロードに失敗しました';
        }
    } elseif ($_FILES['upfile']['error'] == UPLOAD_ERR_NO_FILE) {
    } else {
        $errorMessage = 'アップロードに失敗しました';
    }

    if (!isset($errorMessage)) {
        header('Location: login.php');
        exit;
    }

}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員専用</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>会員専用ページへようこそ</h1>
    <p>あなたのユーザIDは<?=h($userId)?>です。</p>
    <p>このページでは会員専用のページが表示されます。</p>

    <form action="" method="post" enctype="multipart/form-data">
        <p>画像幅：
            <select name="size">
                <option <?= $size == 100 ? 'selected' : '' ?>>100</option>
                <option <?= $size == 150 ? 'selected' : '' ?>>150</option>
                <option <?= $size == 200 ? 'selected' : '' ?>>200</option>
            </select>
        </p>
        <p>横並びの数：
            <input type="radio" name="num" value="3" <?=$num == 3 ? 'checked' : '' ?>>3
            <input type="radio" name="num" value="4" <?=$num == 4 ? 'checked' : '' ?>>4
            <input type="radio" name="num" value="5" <?=$num == 5 ? 'checked' : '' ?>>5
            <input type="radio" name="num" value="6" <?=$num == 6 ? 'checked' : '' ?>>6
        </p>
        <p>
            <input type="file" name="upfile">
            <input type="submit" value="送信">
        </p>
    </form>
    <p><a href="login.php">ログインに移動</a></p>
    <p><a href="logout.php">ログアウトする</a></p>

</body>

</html>