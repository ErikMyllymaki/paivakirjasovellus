<?php

function addKeyWord($avainsana) {

    require_once MODULES_DIR.'db.php';

    try {
        $pdo = getPdoConnection();
        $sql = "INSERT INTO avainsana (nimi) VALUES ('$avainsana')";
        $statement = $pdo->prepare($sql);
        $statement->execute();
    } catch(PDOException $e){
        throw $e;
    }

}

function getSelectedKeyWords($ids){
    require_once MODULES_DIR.'db.php';

    try {
        $pdo = getPdoConnection();
        $sql = "SELECT nimi from avainsana
        where avainsana_id in ($ids)
        ORDER BY avainsana_id";

        $keywords = $pdo->query($sql);

        return $keywords->fetchAll();



    } catch(PdoException $e) {
        throw $e;
    }
}