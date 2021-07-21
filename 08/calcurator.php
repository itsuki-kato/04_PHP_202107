<?php
$num1 = '';
$num2 = '';

if (!empty($_POST)) {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $result = $num1 + $num2;
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
    <h1>計算</h1>
    <?php if ($_SERVER["REQUEST_METHOD"] === "POST"): ?>
        <h2><?=$num1?> + <?=$num2?> = <?=$result?></h2>
    <?php endif; ?>
    <form action="" method="post">
        <input type="text" name="num1" value="<?=htmlspecialchars($num1, ENT_QUOTES)?>">+
        <input type="text" name="num2" value="<?=htmlspecialchars($num2, ENT_QUOTES)?>">=
        <p><input type="submit" value="計算"></p>
    </form>
</body>

</html>