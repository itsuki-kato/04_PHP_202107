<?php
require_once 'db.inc.php';
require_once 'util.inc.php';
try {
    $pdo = db_init();

    if (!empty($_GET['c'])) {
        $sql = 'SELECT * FROM articles JOIN categories
                ON articles.category_id = categories.id
                WHERE articles.category_id = ?
                ORDER BY articles.created_at DESC';

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_GET['c']]);
        $articles = $stmt->fetchAll();

    } else {
        $sql = 'SELECT * FROM articles JOIN categories
                ON articles.category_id = categories.id
                ORDER BY articles.created_at DESC';
        $articles = $pdo->query($sql)->fetchAll();
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
    <title>Taro's Blog</title>
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <header class="header">
            <h1><a href="articles.php">Taro's Blog</a></h1>
        </header>
        <main class="main">
            <?php foreach ($articles as $article) : ?>
                <article class="article">
                    <section class="title">
                        <h2><?= h($article['title']) ?></h2>
                        <h3><?= h($article['created_at']) ?> | <?= h($article['name']) ?></h3>
                    </section>
                    <div class="body"><?= h($article['article']) ?>
                    </div>
                </article>
            <?php endforeach; ?>
        </main>
        <aside class="side">
            <nav class="sidebox">
                <h2>カテゴリ</h2>
                <ul>
                    <li><a href="articles.php">全件表示</a></li>
                    <?php foreach ($categories as $category) : ?>
                        <li><a href="?c=<?=h($category['id'])?>"><?=h($category['name'])?></a></li>
                    <?php endforeach; ?>
                </ul>
            </nav>
            <p class="right"><a href="post_article.php">記事の投稿</a></p>
        </aside>
    </div>
</body>

</html>