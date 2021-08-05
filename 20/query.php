<?php
try {
    $pdo = new PDO('mysql:host=localhost; dbname=mydb; charset=utf8', 'sysuser', 'secret');
    $members = $pdo->query('SELECT * FROM members')->fetchAll(PDO::FETCH_ASSOC);

    echo '<pre>';
    print_r($members);
    echo '</pre>';

} catch (PDOException $e) {
    header('Content-Type: text/plain; charset=UTF-8', true, 500);
    exit($e -> getMessage());
}