<?php
require_once 'util.inc.php';

$seireki = '';
$wareki  = '';

if (!empty($_POST)) {
    $seireki = $_POST['seireki'];
    $wareki = getWareki($seireki);
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>西暦⇒和暦変換</title>
</head>
<body>
    <h1>西暦⇒和暦変換</h1>
    <p>西暦を入力し、「計算」ボタンを押してください。</p>
    <form action="" method="post">
        <p>西暦：<input type="text" size="4" maxlength="4" name="seireki" value="<?=h($seireki)?>">年</p>
        <p><input type="submit" value="計算"></p>
    </form>
    <?php if ($_SERVER["REQUEST_METHOD"] === "POST"): ?>
        <p>西暦<?=h($seireki)?>年は、<?=h($wareki)?>です。</p>
    <?php endif; ?>
</body>
</html>