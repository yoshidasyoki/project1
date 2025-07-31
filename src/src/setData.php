<?php

function setData(PDO $dbh): void
{
    # ログファイルに関する情報取得
    $fileCount = count(glob("log_files/*"));

    # ログファイルが1件だけ存在する場合データをインポート
    if ($fileCount === 1) {
        # ログファイル名の取得
        $fileName = basename(glob("log_files/*")[0]);

        # エスケープ処理
        if (!preg_match('/^[a-zA-Z0-9._-]+$/', $fileName)) {
            throw new Exception('無効な文字列が使用されています。ログファイル名を変更してください。');
        }

        $sql = <<<SQL
            LOAD DATA INFILE '/var/lib/mysql-files/{$fileName}'
            INTO TABLE wiki_log
            FIELDS TERMINATED BY ' ' ESCAPED BY ''
        SQL;
        $dbh->exec($sql);
    } elseif ($fileCount === 0) {
        throw new Exception('ログファイルが存在しません');
    } elseif ($fileCount > 1) {
        throw new Exception('読み込めるログファイルは1件までです');
    }
}
