<?php
require_once 'db.inc.php';
require_once 'util.inc.php';

$name = '';
$age  = null;
$address = '';

$error['name']  = '';
$error['age']   = '';
$result['err']  = '';

if (!empty($_POST)) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    class Validation
    {
        function validName($name)
        {
            if ($name === '') {
                return '※ 氏名を入力してください';
            } elseif (mb_strlen($name) > 10) {
                return '※ 氏名を10文字以内で入力してください';
            } else {
                return false;
            }
        }

        function validAge($age)
        {
            $res['err'] = false;

            if ($age === '') {
                $res['age'] = null;
            } elseif (!is_numeric($age) || $age < 0) {
                $res['age'] = $age;
                $res['err'] = '※ 年齢は0以上の数値を入力してください';
            } else {
                $res['age'] = $age;
            }
            return $res;
        }
    }
    $v = new Validation();
    $error['name'] = $v->validName($name);

    $res  = $v->validAge($age);
    $age          = $res['age'];
    $error['age'] = $res['err'];

    if (!$error['name'] && !$error['age']) {
        try {
            $pdo = db_init();
            $sql = 'INSERT INTO members (name, age, address, created_at) VALUES (?, ?, ?, NOW())';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$name, $age, $address]);
        } catch (PDOException $e) {
            header('Content-Type: text/plain; charset=UTF-8', true, 500);
            exit($e->getMessage());
        }
    }
}

echo '<pre>';
var_dump($error);
echo '</pre>';
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員管理システム</title>
    <style>
        .error {
            color: #900;
            font-size: 14px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h1>会員登録</h1>
    <p><a href="member.php">会員一覧に戻る</a></p>
    <?php if (!isset($error['name']) && !isset($error['age'])):?>
        <p>登録完了しました。</p>
    <?php else:?>
    <form action="" method="post">
        <p>
            氏名：<input type="text" name="name" value="<?= h($name) ?>">
            <?php if (isset($error['name'])) : ?>
                <span class="error"><?= h($error['name']) ?></span>
            <?php endif; ?>
        </p>
        <p>
            年齢：<input type="text" name="age" value="<?= h($age) ?>">
            <?php if (isset($error['age'])) : ?>
                <span class="error"><?= h($error['age']) ?></span>
            <?php endif; ?>
        </p>
        <p>
            住所：<input type="text" name="address" value="<?= h($address) ?>">
        </p>
        <p><input type="submit" value="送信"></p>
    </form>
    <?php endif;?>
</body>

</html>