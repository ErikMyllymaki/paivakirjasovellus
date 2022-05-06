
<?php

function getDiaryEntries($id) {
    require_once MODULES_DIR.'db.php';

    try {
        $pdo = getPdoConnection();

        $sql = ("SELECT avainsanarivi.avainsana_id, pk_merkinta.merkinta_id, merkinta from pk_merkinta, avainsanarivi
        where (pk_merkinta.merkinta_id = avainsanarivi.merkinta_id)
        and avainsanarivi.avainsana_id = $id");

        $diaryentries = $pdo->query($sql);

        return $diaryentries->fetchAll();

    } catch(PDOException $e) {
        throw $e;
    }
}
