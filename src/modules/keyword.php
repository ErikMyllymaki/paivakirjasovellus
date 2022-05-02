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