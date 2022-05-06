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
$keywords = getKeyWords();
$user_id = $_SESSION["user_id"];

try {
    if(isset($user_id) && isset($diary) && !empty($_POST['check'])){
        addDiaryEntry($user_id, $diary, $_POST['check']);
        echo '<div class="alert alert-success" role="alert">Kirjaus tehty!!</div>';
    }
} catch (Exception $e) {
    throw $e;
}



?>

    <form action="diaryentry.php" method="post">
        <h3>Kirjoita merkintä</h3>
        <textarea id="diary" name="diary"></textarea><br/>

        <?php
            foreach($keywords as $keyword) {
                echo '<input type="checkbox" name="check[]" value="'.$keyword['avainsana_id'].'">
                <label for "'.$keyword['nimi'].'">'. $keyword['nimi'] .'</label>';
            }
        ?>
        <div>
            <input type="submit" class="btn btn-primary" value="Lisää merkintä"> 
        </div>
       
    </form>



<?php include TEMPLATES_DIR.'footer.php'; ?>