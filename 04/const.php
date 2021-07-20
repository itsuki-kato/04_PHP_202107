<?php
const DBHOST = 'localhost';
const DBNAME = 'mydb';
const DBUSER = 'sysuser';
const DBPASS = 'secret';

$pdo = new PDO('mysql:host=' . DBHOST . ';dbname=' . DBNAME . ';charset=utf8', DBUSER, DBPASS);