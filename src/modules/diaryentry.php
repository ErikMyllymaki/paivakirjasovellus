<?php


function addDiaryEntry($kayttaja_id, $merkinta){
    require_once MODULES_DIR.'db.php';

    try {
        $pdo = getPdoConnection();

        $sql = "INSERT INTO pk_merkinta (merkinta, kayttaja_id) VALUES (?, ?)";
        $statement = $pdo->prepare($sql);
        $statement->execute( array($merkinta, $kayttaja_id) );

    } catch(PDOException $e) {
        echo "Ei voida lisätä";
        throw $e;
    }
}