<?php


      function executeInsert (object $pdo, string $sql): int {
        $query = $pdo->query($sql);
        return $pdo->lastInsertId();
    }


    function getKeyWords() {

        try {
            require_once MODULES_DIR.'db.php';
            $pdo = getPdoConnection();
            $sql = "select * from avainsana";
            $diaryentry = $pdo->query($sql);
            return $diaryentry->fetchAll();
        } catch (Exception $e) {
            throw $e;
        }
    
    }

function addDiaryEntry($kayttaja_id, $merkinta, $avainsanat){
    
    require_once MODULES_DIR.'db.php';

    try {

  
        $pdo = getPdoConnection();
        $pdo -> beginTransaction();

        $sql = "INSERT INTO pk_merkinta (merkinta, kayttaja_id) VALUES ('$merkinta', $kayttaja_id)";
        $merkinta_id = executeInsert($pdo, $sql);
        foreach($avainsanat as $avainsana){
            
            $sql = "INSERT INTO avainsanarivi (merkinta_id, avainsana_id) values ("
            .
                $merkinta_id. "," .
                $avainsana
            . ")";            
            executeInsert($pdo,$sql);
        }
        $pdo->commit();

    } catch(PDOException $e) {
        $pdo->rollback();
        echo "Ei voida lisätä";
        throw $e;
    }
}

// function addKeyWord($avainsana) {

//     try {

//          $pdo = getPdoConnection();
//         $sql = "INSERT INTO avainsana (nimi) VALUES (?)";
//         $statement = $pdo->prepare($sql);
//         $statement->execute(array($avainsana));
//     } catch(PDOException $e){
//         echo "Ei voida lisätä";
//         throw $e;
//     }

// }



function getDiaryEntries($userid) {
    require_once MODULES_DIR.'db.php';

    try {
        $pdo = getPdoConnection();

        $sql = "SELECT merkinta, aika, kayttajanimi, pk_merkinta.merkinta_id, avainsanarivi.avainsana_id, nimi
                FROM avainsana INNER JOIN avainsanarivi ON avainsana.avainsana_id=avainsanarivi.avainsana_id
                INNER JOIN pk_merkinta ON 
                avainsanarivi.merkinta_id=pk_merkinta.merkinta_id
                INNER JOIN kayttaja ON 
                pk_merkinta.kayttaja_id=kayttaja.kayttaja_id
                WHERE kayttaja.kayttaja_id = $userid
                ORDER BY kayttajanimi, aika;";

        $diaryentry = $pdo->query($sql);

        return $diaryentry->fetchAll();
    } catch(PDOException $e) {
        throw $e;
    }
}

function deleteDiaryEntry($id){

    require_once MODULES_DIR.'db.php'; 

    //Tarkistetaan onko muttujia asetettu
    if (!isset($id)) {
        throw new Exception("Missing parameters! Cannot delete a diary entry!");
    }

    try {
        $pdo = getPdoConnection();
        // start transaction 
        $pdo->beginTransaction();

    
        // Delete from avainsanarivi table
        $sql = "DELETE FROM avainsanarivi WHERE merkinta_id = ?";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(1, $id);
        $statement->execute();
        // Delete from pk_merkinta table
        $sql = "DELETE FROM pk_merkinta WHERE merkinta_id = ?";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(1, $id);
        $statement->execute();
        // commit transaction
        $pdo->commit();
    } catch (PDOException $e) {
        //Rollback transaction on error
        $pdo->rollBack();
        throw $e;
    }
}
