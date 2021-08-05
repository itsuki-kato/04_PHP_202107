<?php
require_once 'db.inc.php';
require_once 'util.inc.php';

try {
    $pdo = db_init();

    $categoryName = '';
    $isValidated  = false;

    if (!empty($_POST)) {
        $categoryName       = $_POST['categoryName'];
        $isValidated = true;

        if ($categoryName === '') {
            $categoryNameError = 'カテゴリーを入力してください';
            $isValidated = false;
        } elseif (mb_strlen($categoryName, 'utf8') > 10) {
            $categoryNameError = 'カテゴリーは10文字以内で入力してください';
            $isValidated = false;
        }

        if ($isValidated == true) {
            $sql  = 'INSERT INTO categories (name) VALUES (?)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$categoryName]);
        }
    }

} catch (PDOException $e) {
    header('Content-Type: text/plain; charset=UTF-8', true, 500);
    exit($e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taro's Blog | カテゴリーの投稿</title>
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <header class="header">
            <h1>カテゴリーの投稿</h1>
        </header>

        <section class="postform">
            <p class="right"><a href="articles.php">カテゴリーの一覧に戻る</a></p>
            <?php if ($isValidated == true) : ?>
                <p>以下の内容でカテゴリーを保存しました。</p>
                <table>
                    <tr>
                        <th>カテゴリー</th>
                        <td>
                            <?=h($categoryName)?>
                        </td>
                    </tr>
                </table>
                <p><a href="post_category.php">続けて投稿する</a></p>
            <?php else : ?>
                <p>カテゴリーを入力し、送信ボタンを押してください。</p>
                <form action="" method="post">
                    <table>
                        <tr>
                            <th>カテゴリー</th>
                            <td>
                                <input type="text" name="categoryName" size="10" value="<?= h($categoryName) ?>" />
                                <?php if (isset($categoryNameError)) : ?>
                                    <span class="error"><?= h($categoryNameError) ?></span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    </table>
                    <p><input type="submit" value="送信" /></p>
                </form>
            <?php endif; ?>
        </section>

    </div>
</body>

</html>