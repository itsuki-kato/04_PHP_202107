<?php
$item = 'バナナ';
if (!empty($_POST)) {
    $item = $_POST['item'];
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if ($_SERVER["REQUEST_METHOD"] === "POST"): ?>
        <p><?=htmlspecialchars($item, ENT_QUOTES, 'UTF-8');?>が選択されました。</p>
    <?php endif; ?>
    <form action="" method="post">
        <select name="item">
            <option <?= $item == 'メロン' ? 'selected' : '';?>>メロン</option>
            <option <?= $item == 'みかん' ? 'selected' : '';?>>みかん</option>
            <option <?= $item == 'パイン' ? 'selected' : '';?>>パイン</option>
        </select>
        <p><input type="submit" value="送信"></p>
    </form>
</body>
</html>