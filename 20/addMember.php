<?php
require_once 'db.inc.php';
require_once 'util.inc.php';

$name = '';
$age = '';
$address = '';

if (!empty($_POST)) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $address = $_POST['address'];

    try {
        $pdo = db_init();
        // $sql = 'INSERT INTO members (name, age, address, created_at) VALUES (?, ?, ?, NOW())';
        // $stmt = $pdo->prepare($sql);
        // $stmt->execute([$name, $age, $address]);
        $sql = 'INSERT INTO members (name, age, address, created_at)
                VALUES (:name, :age, :address, NOW())';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':name',    $name,    PDO::PARAM_STR);
        $stmt->bindValue(':age',     $age,     PDO::PARAM_INT);
        $stmt->bindValue(':address', $address, PDO::PARAM_STR);
        $stmt->execute();

        header('Location: member.php');
        exit;
    } catch (PDOException $e) {
        header('Content-Type: text/plain; charset=UTF-8', true, 500);
        exit($e -> getMessage());
    }
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員管理システム</title>
</head>

<body>
    <h1>会員登録</h1>
    <p><a href="member.php">会員一覧に戻る</a></p>
    <form action="" method="post">
        <p>氏名：<input type="text" name="name" value="<?=h($name)?>"></p>
        <p>年齢：<input type="text" name="age" value="<?=h($age)?>"></p>
        <p>住所：<input type="text" name="address" value="<?=h($address)?>"></p>
        <p><input type="submit" value="送信"></p>
    </form>
</body>

</html>