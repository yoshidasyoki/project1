<?php

require_once __DIR__ . '/getRanking.php';
require_once __DIR__ . '/getTotalViews.php';
require __DIR__ . '/../vendor/autoload.php';
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$hostname = 'db';
$user = $_ENV['MYSQL_USER'];
$pass = $_ENV['MYSQL_PASSWORD'];
$database = $_ENV['MYSQL_DATABASE'];

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$database", $user, $pass);
    var_dump(gettype($dbh));
    echo '接続成功' . PHP_EOL;
    echo '以下の機能を実行できます' . PHP_EOL;
    echo '1. 指定したドメインコードの人気記事を検索する' . PHP_EOL;
    echo '2. 指定したドメインコードの合計ページ閲覧数を表示する' . PHP_EOL;
    echo '9. 終了する' . PHP_EOL;

    while (true) {
        echo PHP_EOL . '番号を入力してください：';
        $choice = (int)trim(fgets(STDIN));

        if ($choice === 1) {
            getRanking($dbh);
        } else if ($choice === 2) {
            getTotalViews($dbh);
        } else if ($choice === 9) {
            echo '終了します' . PHP_EOL;
            exit;
        } else {
            echo '無効な選択です' . PHP_EOL;
        }
    }
} catch (PDOException $e) {
    echo '接続失敗: ' . $e->getMessage() . PHP_EOL;
}
