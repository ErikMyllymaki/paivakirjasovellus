<?php
include TEMPLATES_DIR.'header.php';
require_once MODULES_DIR.'db.php';

// try {
//     $pdo = getPdoConnection();

//     $sql = "select nimi from avainsana";
//     $avainsanat = $pdo->query($sql);
//     // $avainsanat->fetchAll();
// }catch(PDOException $e) {
//     throw $e;
// }


?>

    <form action="diaryentry.php" method="post">
        <h3>Kirjoita merkintä</h3>
        <textarea id="diary" name="diary"></textarea><br/>
        <h4>Valitse avainsanat</h4>
        <input type="checkbox" id="fun" name="check"
         checked>
         <label for="fun">Hauskaa</label>
         <input type="checkbox" id="boring" name="check"
         checked>
         <label for="boring">Tylsää</label><br/>
         
            <!-- foreach ($avainsanat as $avainsana){
                echo '<label for="fun">' . $avainsana . '</label>
                <input type="checkbox" name="checkbox"';
            } -->
        
        <input type="submit" class="btn btn-primary" value="Lisää merkintä">
    </form>



<?php include TEMPLATES_DIR.'footer.php'; ?>