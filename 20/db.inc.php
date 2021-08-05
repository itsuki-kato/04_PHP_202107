<?php
require_once 'env.php';

/**
 * PDOインスタンスを返すDB接続
 *
 * @return object
 */
function db_init(): object
{
    return new PDO(
        'mysql:host=' . DBHOST . '; dbname=' . DBNAME . '; charset=utf8',
        DBUSER, DBPASS,
        [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES   => false,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
}