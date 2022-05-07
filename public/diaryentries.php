<?php
include TEMPLATES_DIR."header.php";
include MODULES_DIR."diaryentry.php";
include MODULES_DIR."diaryentries.php";
include MODULES_DIR."keyword.php";



$id = filter_input(INPUT_GET, "id");

if(isset($id)){
    try {
        deleteDiaryEntry($id);
        echo '<div class="alert alert-success" role="alert">Merkintä poistettu!!</div>';
    } catch (Exception $e) {
        throw $e;
    }
}

?>

<h1>Päiväkirjamerkinnät</h1>



<?php
$userid = $_SESSION["user_id"];


$keywords = getKeyWords();
echo '<h2 class="valitseAvainsanat">Valitse avainsanat:</h2>';



?>

<form method="post" action="diaryentries.php">
<?php
for($x = 0; $x < sizeof($keywords); $x++) {
    echo '<input type="checkbox" name="check[]" class="radiobuttons" id="" value="'.$keywords[$x]['avainsana_id'].'">
    <label for "'.$keywords[$x]['nimi'].'">'. $keywords[$x]['nimi'] .'</label>';
} 






?>
<br>
<input type="submit" value="Hae" name="submit" class="btn btn-primary">
</form>

<?php
try {
        if(!empty($_POST['check'])) {
            $ids = implode(', ', $_POST['check']);
            $diaryEntries = getDiaryEntries($ids, $userid);
            $keyWordNames = getSelectedKeywords($ids);


            echo "<h4>Haetaan avainsanoilla ";
            foreach($keyWordNames as $keyWordName) {
               echo "#".$keyWordName['nimi']." "; 
            }
            echo "</h4>";


            if ($diaryEntries) {
                foreach($diaryEntries as $diaryEntry) {
                    echo "<div class='paivakirjamerkinta'><h3 class='pkaika'>Aika: ". $diaryEntry["aika"] . "</h3><p class='pkmerkinta'> " . $diaryEntry["merkinta"];

                    $mapkeywords = mapKeyWords($diaryEntry["merkinta_id"]);

                    foreach($mapkeywords as $keyword) {
                        echo "<p>#" . $keyword["nimi"] . "</p>";
                    }

                    echo "</p><a href=diaryentries.php?id=" . $diaryEntry["merkinta_id"] . " class='btn btn-primary'>Poista</a></div><br></br>";
                }
            } else {
                echo '<div class="alert alert-danger" role="alert">Ei merkintöjä valituilla hakusanoilla</div>';
            }
            
            
        } else {
            echo '<h2>Aseta avainsanat ja hae!</h2>';
        }
    

} catch (Exception $e) {
    throw $e;
}


?>


<?php
include TEMPLATES_DIR.'footer.php';
?>