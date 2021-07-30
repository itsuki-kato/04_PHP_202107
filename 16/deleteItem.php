<?php
session_start();

$_SESSION = array();
$params = session_get_cookie_params();
setcookie(session_name(), '', time() - 36000,
    $params['path'], $params['domain'],
    $params['secure'], $params['httponly']);
session_destroy();
?>
<p>セッションを破棄しました</p>
<p><a href="addItem.php">商品を記録する</a></p>
<p><a href="showItem.php">記録した商品を見る</a></p>