<?php
require_once 'db.inc.php';
require_once 'util.inc.php';
try {
    $pdo = db_init();
    $sql = 'SELECT * FROM articles JOIN categories
            ON articles.category_id = categories.id
            ORDER BY articles.created_at DESC';
    $articles = $pdo->query($sql)->fetchAll();

} catch (PDOException $e) {
    header('Content-Type: text/plain; charset=UTF-8', true, 500);
    exit($e -> getMessage());
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
    <?php foreach ($articles as $article):?>
    <article class="article">
      <section class="title">
        <h2><?=h($article['title'])?></h2>
        <h3><?=h($article['created_at'])?> | <?=h($article['name'])?></h3>
      </section>
      <div class="body"><?=h($article['article'])?>
      </div>
    </article>
        <?php endforeach;?>
  </main>
  <aside class="side">
    <nav class="sidebox">
      <h2>カテゴリ</h2>
      <ul>
        <li><a href="?c=1">カテゴリ1</a></li>
        <li><a href="?c=2">カテゴリ2</a></li>
      </ul>
    </nav>
    <p class="right"><a href="post_article.php">記事の投稿</a></p>
  </aside>
</div>
</body>
</html>