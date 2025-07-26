<?php

function getRanking(PDO $dbh): void
{
    $input = explode(" ", trim(fgets(STDIN)));
    $domainCode = $input[0];
    $ranking = intval($input[1]);

    $sql = "SELECT page_title, count_views FROM wiki_log
            WHERE domain_code = :domainCode
            ORDER BY count_views DESC
            LIMIT :ranking";

    $sth = $dbh->prepare($sql);
    $sth->bindValue(':domainCode', $domainCode, PDO::PARAM_STR);
    $sth->bindValue(':ranking', $ranking, PDO::PARAM_INT);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $value) {
        echo $value['page_title'] . ', ' . $value['count_views'] . PHP_EOL;
    }
}
