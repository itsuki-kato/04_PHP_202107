<?php
$num = '';
$arr = '';
$total = 0;
$numArr = [ // 選択した配列
    [30,65,72,47,63,96],
    [35,57,67,23,14,56,61],
    [46,16,27,58],
    [84,27,40,18,92,46,21],
    [14,74,54,2,85]
];

if (!empty($_POST)) {
    $num = $_POST['num']; // 任意の数値 10
    $arr = $_POST['arr']; // 0~4

    if (!is_numeric($num)) {
        $result = '数値を入力してください';
    } elseif ($num < 0 || 99 < $num) {
        $result = '1から99までの数値を入力してください';
    } else {
        foreach($numArr[$arr] as $n){
            $total += $n;
        }
        $result = $total * $num;
    }
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>合計値の計算</title>
</head>

<body>
    <h1>合計値の計算</h1>
    <form action="" method="post">
        <p>配列の選択：<select name="arr">
                <option value="0" <?= $arr == 0 ? 'selected' : '' ?>>配列1</option>
                <option value="1" <?= $arr == 1 ? 'selected' : '' ?>>配列2</option>
                <option value="2" <?= $arr == 2 ? 'selected' : '' ?>>配列3</option>
                <option value="3" <?= $arr == 3 ? 'selected' : '' ?>>配列4</option>
                <option value="4" <?= $arr == 4 ? 'selected' : '' ?>>配列5</option>
            </select>
        </p>
        <p>掛ける数値：
            <input type="text" name="num" size="2" maxlength="2" value="<?= htmlspecialchars($num, ENT_QUOTES, 'UTF-8'); ?>">
        </p>
        <p><input type="submit" value="送信"></p>
    </form>
    <?php if ($_SERVER["REQUEST_METHOD"] === "POST") : ?>
        <p>合計結果：<?= htmlspecialchars($result, ENT_QUOTES, 'UTF-8'); ?></p>
    <?php endif; ?>
</body>

</html>