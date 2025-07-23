<?php

require __DIR__ . '/../vendor/autoload.php';
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$hostname = 'db';
$user = $_ENV['MYSQL_USER'];
$pass = $_ENV['MYSQL_PASSWORD'];
$database = $_ENV['MYSQL_DATABASE'];

$mysqli = new mysqli($hostname, $user, $pass, $database);
if($mysqli->connect_error) {
    echo '接続失敗'.PHP_EOL;
    exit();
} else {
    echo '接続成功'.PHP_EOL;
}
