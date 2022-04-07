<?php

function getUsers() {
    require_once MODULES_DIR.'db.php';

    try {
        $pdo = getPdoConnection();
        $sql = "SELECT kayttaja_id, etunimi, sukunimi, kayttajanimi, salasana FROM kayttaja";
        $people = $pdo->query($sql);

        return $people->fetchAll();
    }catch(PDOException $e){
        throw $e;
    }
}