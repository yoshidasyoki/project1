<?php

function createTable(PDO $dbh): void
{
    # テーブルの作成
    $sql = <<<SQL
        CREATE TABLE wiki_log
        (domain_code    VARCHAR(50),
        page_title    VARCHAR(200)    BINARY    NOT NULL,
        count_views    INTEGER    NOT NULL,
        total_response_size    INTEGER,
        PRIMARY KEY (domain_code, page_title))
    SQL;
    $dbh->exec($sql);
}
