<?php
include TEMPLATES_DIR.'header.php';
require_once MODULES_DIR.'db.php';
include MODULES_DIR.'diaryentry.php';
// include MODULES_DIR.'authorization.php';



// try {
//     $pdo = getPdoConnection();

//     $sql = "select nimi from avainsana";
//     $avainsanat = $pdo->query($sql);
//     // $avainsanat->fetchAll();
// }catch(PDOException $e) {
//     throw $e;
// }

$diary = filter_input(INPUT_POST, "diary");

$user_id = $_SESSION["user_id"];
// if(!empty($_POST['check'])) {
//     foreach($_POST['check'] as $check) {
//             echo $check;
//     }
// }


if(isset($user_id) && isset($diary) && !empty($_POST['check'])){

    foreach($_POST['check'] as $check) {
        addDiaryEntry($user_id, $diary, $check);
        echo '<div class="alert alert-success" role="alert">Kirjaus tehty!!</div>';


}
    // addDiaryEntry($user_id, $diary);
    // echo '<div class="alert alert-success" role="alert">Kirjaus tehty!!</div>';
}


?>

    <form action="diaryentry.php" method="post">
        <h3>Kirjoita merkintä</h3>
        <textarea id="diary" name="diary"></textarea><br/>
        <h4>Valitse avainsanat</h4>
        <input type="checkbox" id="fun" name="check[]" value="Hauskaa"
         >
         <label for="fun">Hauskaa</label>
         <input type="checkbox" id="boring" name="check[]" value="Tylsaa"
         >
         <label for="boring">Tylsää</label><br/>
         
            <!-- foreach ($avainsanat as $avainsana){
                echo '<label for="fun">' . $avainsana . '</label>
                <input type="checkbox" name="checkbox"';
            } -->
        
        <input type="submit" class="btn btn-primary" value="Lisää merkintä">
    </form>



<?php 

include TEMPLATES_DIR.'footer.php'; ?>