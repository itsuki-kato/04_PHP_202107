<?php
require_once 'Chart.php';

$spring = '';
$summer = '';
$fall   = '';
$winter = '';
if (!empty($_POST)) {
    $spring = $_POST['spring'];
    $summer = $_POST['summer'];
    $fall   = $_POST['fall'];
    $winter = $_POST['winter'];

    $data  = [$spring, $summer, $fall, $winter];
    $label = ['春', '夏', '秋', '冬'];
    $c = new Chart();
    $c->setTitle('好きな季節 アンケート結果');
    $c->addData($data,'season');
    $c->setXLabel($label);
    $c->setYAxisName('（人）');
    $c->setXAxisName('季節');
    $c->setSize(300, 200);
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
    <title>集計結果入力</title>
</head>
<body>
    <h1>集計結果入力</h1>
    <form action="" method="post">
        <table>
            <tr>
                <td>春</td>
                <td><input type="text" size="4" maxlength="4" name="spring" value="<?=h($spring)?>">人</td>
            </tr>
            <tr>
                <td>夏</td>
                <td><input type="text" size="4" maxlength="4" name="summer" value="<?=h($summer)?>">人</td>
            </tr>
            <tr>
                <td>秋</td>
                <td><input type="text" size="4" maxlength="4" name="fall" value="<?=h($fall)?>">人</td>
            </tr>
            <tr>
                <td>冬</td>
                <td><input type="text" size="4" maxlength="4" name="winter" value="<?=h($winter)?>">人</td>
            </tr>
        </table>
        <p><input type="submit" value="グラフ生成"></p>
    </form>
    <?php if ($_SERVER["REQUEST_METHOD"] === "POST"): ?>
        <?php $c->printBarChart(); ?>
    <?php endif; ?>
</body>
</html>