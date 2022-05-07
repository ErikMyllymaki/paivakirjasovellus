<?php
include TEMPLATES_DIR.'header.php';
require_once MODULES_DIR.'db.php';
include MODULES_DIR.'diaryentry.php';
include MODULES_DIR.'keyword.php';


$diary = filter_input(INPUT_POST, "diary");
$keywords = getKeyWords();
$user_id = $_SESSION["user_id"];

try {
    if(isset($user_id)) {
                if(isset($diary) && isset($_POST['check'])){
                addDiaryEntry($user_id, $diary, $_POST['check']);
                $ids = implode(', ', $_POST['check']);
                echo '<div class="alert alert-success" role="alert">Kirjaus tehty!!</div>';
            }
    } else {
        echo '<div class="alert alert-danger" role="alert">Kirjaudu sisään tehdeksäsi merkintöjä!</div>';
    }
    } catch (Exception $e) {
    throw $e;
}



?>

    <form action="diaryentry.php" method="post">
        <h3>Kirjoita merkintä</h3>
        <textarea id="diary" name="diary"></textarea><br/>

        <?php
            echo '<h4>Aseta avainsanat kirjaukselle:</h4>';
            foreach($keywords as $keyword) {
                echo '<input type="checkbox" name="check[]" value="'.$keyword['avainsana_id'].'"><label for "'.$keyword['nimi'].'">'. $keyword['nimi'] .'</label> ';
            }
        ?>
        <div>
            <br>
            <input type="submit" class="btn btn-primary" value="Lisää merkintä"> 
        </div>
       
    </form>



<?php include TEMPLATES_DIR.'footer.php'; ?>