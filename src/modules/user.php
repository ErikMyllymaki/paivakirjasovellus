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

function addUser($fname, $lname, $uname, $pw) {
    require_once MODULES_DIR.'db.php';

        if( !isset($fname) || !isset($lname) || !isset($uname) || !isset($pw) ){
            throw new Exception("Arvoja puuttuu! Ei voida lisätä käyttäjää!");
        }
        
        if( empty($fname) || empty($lname) || empty($uname) || empty($pw) ){
            throw new Exception("Et voi asettaa tyhjiä arvoja!");
        }

    try {
        $pdo = getPdoConnection();

        $sql = "INSERT INTO kayttaja (etunimi, sukunimi, kayttajanimi, salasana) VALUES (?, ?, ?, ?)";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(1, $fname);
        $statement->bindParam(2, $lname);
        $statement->bindParam(3, $uname);

        $hash_pw = password_hash($pw, PASSWORD_DEFAULT);
        $statement->bindParam(4, $hash_pw);
        $statement->execute();


    } catch(PDOException $e) {
        throw $e;
    }
}