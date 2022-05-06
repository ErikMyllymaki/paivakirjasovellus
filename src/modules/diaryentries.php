
<?php

function getDiaryEntries() {
    require_once MODULES_DIR.'db.php';

    try {
        $pdo = getPdoConnection();

        $sql = "SELECT pk_merkinta.merkinta_id, merkinta from pk_merkinta, avainsanarivi
        where (pk_merkinta.merkinta_id = avainsanarivi.merkinta_id)
        and avainsanarivi.avainsana_id in (1,2,3)";

        $diaryentry = $pdo->query($sql);

        $diaryentries = $diaryentry->fetchAll();

        foreach ($diaryentries as $diaryentry) {
           return echo $diaryentry['merkinta_id'].$diaryentry['merkinta_nimi'];
        }
    } catch(PDOException $e) {
        throw $e;
    }
}