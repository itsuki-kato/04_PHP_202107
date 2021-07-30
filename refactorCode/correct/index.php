<?php
require_once('PrimeMinister.php');

$prime_minister = new PrimeMinister();
$prime_minister_name = $prime_minister->getPrimeMinister($_POST);

function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="common.css" rel="stylesheet">
    <title>グループワーク用ページ</title>
</head>
<body>
    <main>
        <div class="page_title">
            <h1>内閣総理大臣検索</h1>
        </div>
        <div>
            <table class="data_table">
                <tr>
                    <th>
                        任期最終日
                    </th>
                    <th>
                        内閣総理大臣名
                    </th>
                </tr>
                <?php foreach (PrimeMinister::PRIME_MINISTER_LIST as $val):?>
                    <tr>
                        <td>
                            <?=$val?>
                        </td>
                    </tr>
                <?php endforeach;?>
            </table>
        </div>
        <div>
            <?php if (!empty($prime_minister_name)):?>
                <p>
                    <?=date('Y年m月d日', strtotime($_POST['date']))?>
                </p>
                <p>
                    この時の内閣総理大臣は
                    <span class="prime_minister_name">
                        <?=$prime_minister_name?>
                    </span>
                    です。勉強になりましたね！
                </p>
            <?php endif;?>
            <form action="" method="post">
                <input type="date" name="date" value="<?=(!empty($_POST['date']) ? h($_POST['date']) : '')?>">
                <input type="submit" name="send" value="送信">
            </form>
        </div>
    </main>
</body>
</html>
