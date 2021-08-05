<?php
require_once 'db.inc.php';
require_once 'util.inc.php';

try {
    $pdo = db_init();

    $category_id = 2;
    $title       = '';
    $article     = '';
    $isValidated = false;

    if (!empty($_POST)) {
        $category_id = $_POST['category'];
        $title       = $_POST['title'];
        $article     = $_POST['article'];
        $isValidated = true;

        if ($title === '') {
            $titleError = 'タイトルを入力してください';
            $isValidated = false;
        } elseif (mb_strlen($title, 'utf8') > 100) {
            $titleError = 'タイトルは100文字以内で入力してください';
            $isValidated = false;
        }

        if ($article === '') {
            $articleError = '記事を入力してください';
            $isValidated = false;
        }

        if ($isValidated == true) {
            $sql  = 'INSERT INTO articles (category_id, title, article, created_at)
                    VALUES (?, ?, ?, NOW())';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$category_id, $title, $article]);

            $sql  = 'SELECT * FROM categories WHERE id = ?';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$category_id]);
            $c    = $stmt->fetch();
            $category = $c['name'];
        }
    }

    $categories = $pdo->query('SELECT * FROM categories')->fetchAll();
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
    <title>Taro's Blog | 記事の投稿</title>
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <header class="header">
            <h1>記事の投稿</h1>
        </header>

        <section class="postform">
            <p class="right"><a href="articles.php">記事の一覧に戻る</a></p>
            <?php if ($isValidated == true) : ?>
                <p>以下の内容で記事を保存しました。</p>
                <table>
                    <tr>
                        <th>カテゴリ</th>
                        <td>
                            <?=h($category)?>
                        </td>
                    </tr>
                    <tr>
                        <th>タイトル</th>
                        <td>
                            <?=h($title)?>
                        </td>
                    </tr>
                    <tr>
                        <th>記事</th>
                        <td>
                            <?=h(nl2br($article))?>
                        </td>
                    </tr>
                </table>
                <p><a href="post_article.php">続けて投稿する</a></p>
            <?php else : ?>
                <p>記事を入力し、送信ボタンを押してください。</p>
                <form action="" method="post">
                    <table>
                        <tr>
                            <th>カテゴリ</th>
                            <td>
                                <select name="category">
                                    <?php foreach ($categories as $category) : ?>
                                        <option value="<?= h($category['id']) ?>" <?= $category['id'] == $category_id ? 'selected' : ''; ?>><?= h($category['name']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>タイトル</th>
                            <td>
                                <?php if (isset($titleError)) : ?>
                                    <p class="error"><?= h($titleError) ?></p>
                                <?php endif; ?>
                                <input type="text" name="title" size="60" value="<?= h($title) ?>" />
                            </td>
                        </tr>
                        <tr>
                            <th>記事</th>
                            <td>
                                <?php if (isset($articleError)) : ?>
                                    <p class="error"><?= h($articleError) ?></p>
                                <?php endif; ?>
                                <textarea name="article" cols="60" rows="5"><?= h($article) ?></textarea>
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