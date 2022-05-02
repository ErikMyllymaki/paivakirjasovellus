<?php
include TEMPLATES_DIR."header.php";
include MODULES_DIR."diaryentry.php";

$diaryEntries = getDiaryEntries();

$id = filter_input(INPUT_GET, "id");

if(isset($id)){
    try {
        deleteDiaryEntry($id);
        echo '<div class="alert alert-success" role="alert">Merkintä poistettu!!</div>';
    } catch (Exception $e) {
        echo 'ei voitu poistaa';
    }
}

?>

<h1>Päiväkirjamerkinnät</h1>

<?php

foreach($diaryEntries as $diaryEntry) {
    echo "<h2>".$diaryEntry["aika"]."</h2><h3>".$diaryEntry["kayttajanimi"]."</h3><p>".$diaryEntry["merkinta"].'<a href="diaryentries.php?id=' . $diaryEntry["merkinta_id"] . '" class="btn btn-primary">Poista</a> </li>'. "</p>";
}

include TEMPLATES_DIR.'footer.php';
?>