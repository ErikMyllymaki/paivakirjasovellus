<?php
include TEMPLATES_DIR."header.php";
include MODULES_DIR."diaryentry.php";
include MODULES_DIR."diaryentries.php";




$id = filter_input(INPUT_GET, "id");

// if(isset($id)){
//     try {
//         deleteDiaryEntry($id);
//         echo '<div class="alert alert-success" role="alert">Merkintä poistettu!!</div>';
//     } catch (Exception $e) {
//         throw $e;
//     }
// }







?>

<h1>Päiväkirjamerkinnät</h1>



<?php
$userid = $_SESSION["user_id"];


$keywords = getKeyWords();
echo '<h2>Valitse avainsanat:</h2>';

?>

<form method="post" action="diaryentries.php">
<?php
// echo '<input type="radio" checked name="check" value="'.$keywords[0]['avainsana_id'].'">
// <label for "'.$keywords[0]['nimi'].'">'. $keywords[0]['nimi'] .'</label>';
for($x = 0; $x < sizeof($keywords); $x++) {
    echo '<input type="radio" name="check" id="" value="'.$keywords[$x]['avainsana_id'].'">
    <label for "'.$keywords[$x]['nimi'].'">'. $keywords[$x]['nimi'] .'</label>';
} 




?>
<input type="submit" value="Submit" name="submit">
</form>

<?php
try {
       if(isset($_POST['submit'])) {
        if(!empty($_POST['check']))
        $diaryEntries = getDiaryEntries($_POST['check']);
   
    foreach($diaryEntries as $diaryEntry) {
        echo "<h2>".$diaryEntry["merkinta"]."</h2><h3>".$diaryEntry["merkinta_id"].' id'.$diaryEntry['avainsana_id'];
    }
}
} catch (Exception $e) {
    echo 'Hae jollain avainsanalla!';
}

// foreach($diaryEntries as $diaryEntry) {
//     echo "<h2>".$diaryEntry["merkinta"]."</h2><h3>".$diaryEntry["merkinta_id"]."</h3><p>".$diaryEntry["merkinta"].'<a href="diaryentries.php?id=' . $diaryEntry["merkinta_id"] . '" class="btn btn-primary">Poista</a> </li>'. "</p>" . $diaryEntry["nimi"] . "<br></br>" ;/* mapataanko kaikki avainsananimet yhteen kirjaukseen? */
// }




?>



    


<?php
include TEMPLATES_DIR.'footer.php';
?>