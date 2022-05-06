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
