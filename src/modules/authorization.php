<?php

function login($uname, $pw) {

    require_once MODULES_DIR . 'db.php';


    //Tarkistetaan onko muttujia asetettu
    if (!isset($uname) || !isset($pw)) {
        throw new Exception("Missing parameters. Cannot log in.");
    }

    //Tarkistetaan, ettei tyhjiä arvoja muuttujissa
    if (empty($uname) || empty($pw)) {
        throw new Exception("Cannot log in with empty values.");
    }

    try {
        $pdo = getPdoConnection();
        //Suoritetaan parametrien lisääminen tietokantaan.
        $sql = "SELECT kayttaja_id, kayttajanimi, salasana, etunimi, sukunimi FROM kayttaja WHERE kayttajanimi=?";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(1, $uname);
        $statement->execute();

        if ($statement->rowCount() <= 0) {
            throw new Exception("Käyttäjää ei löytynyt. Kirjautuminen ei onnistu.");
        }

        $row = $statement->fetch();

        //Tarkistetaan käyttäjän antama salasana tietokannan salasanaa vastaan
        if (!password_verify($pw, $row["salasana"])) {
            throw new Exception("Väärä salasana");
        }

        //Jos käyttäjä tunnistettu, tallennetaan käyttäjän tiedot sessioon
        $_SESSION["username"] = $uname;
        $_SESSION["fname"] = $row["etunimi"];
        $_SESSION["lname"] = $row["sukunimi"];
        $_SESSION["user_id"] = $row["kayttaja_id"];

    } catch (PDOException $e) {
        throw $e;
    }
}

function logout(){

    try{
        session_unset();
        session_destroy();
    }catch(Exception $e){
        throw $e;
    }
}