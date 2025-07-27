<?php

function getTotalViews(PDO $dbh): void
{
    # 入力されたドメインコードを取得
    $domainCode = explode(" ", trim(fgets(STDIN)));
    $placeholders = substr(str_repeat('?,', count($domainCode)), 0, -1);

    $sql = <<<SQL
        SELECT domain_code, SUM(count_views) AS total_views FROM wiki_log
        WHERE domain_code IN($placeholders)
        GROUP BY domain_code
        ORDER BY total_views DESC
    SQL;

    # SQLのプレースホルダに値をバインドして実行
    $sth = $dbh->prepare($sql);
    $sth->execute($domainCode);

    # 結果を取得して表示
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $value) {
        echo $value['domain_code'] . ', ' .  $value['total_views'] . PHP_EOL;
    }
}
