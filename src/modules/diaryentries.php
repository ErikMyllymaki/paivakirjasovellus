
<?php

function getDiaryEntries($ids, $userid) {
    require_once MODULES_DIR.'db.php';

    try {
        $pdo = getPdoConnection();

        $sql = ("SELECT avainsanarivi.avainsana_id, pk_merkinta.merkinta_id, merkinta, nimi, aika 
            FROM  avainsana INNER JOIN avainsanarivi ON avainsana.avainsana_id=avainsanarivi.avainsana_id
            INNER JOIN pk_merkinta ON 
            avainsanarivi.merkinta_id=pk_merkinta.merkinta_id
            INNER JOIN kayttaja ON 
            pk_merkinta.kayttaja_id=kayttaja.kayttaja_id
            WHERE (pk_merkinta.merkinta_id = avainsanarivi.merkinta_id) AND kayttaja.kayttaja_id = $userid
            AND avainsanarivi.avainsana_id IN ($ids)
            GROUP BY merkinta");

        $diaryentries = $pdo->query($sql);

        return $diaryentries->fetchAll();

    } catch(PDOException $e) {
        throw $e;
    }
}
