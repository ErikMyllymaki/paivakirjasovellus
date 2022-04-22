<?php
include TEMPLATES_DIR."header.php";
include MODULES_DIR."diaryentry.php";

$diaryEntries = getDiaryEntries();

?>

<h1>Päiväkirjamerkinnät</h1>

<?php

foreach($diaryEntries as $diaryEntry) {
    echo "<h2>".$diaryEntry["aika"]."</h2><h3>".$diaryentry["kayttajanimi"]."</h3><p>".$diaryEntry["merkinta"]."</p>";
}

include TEMPLATES_DIR.'footer.php';
?>