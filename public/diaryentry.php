<?php
include TEMPLATES_DIR.'header.php';
?>

    <form action="diaryentry.php" method="post">
        <h3>Kirjoita merkintä</h3>
        <textarea id="diary" name="diary"></textarea><br/>
        <h4>Valitse avainsanat</h4>
        <input type="checkbox" id="fun" name="fun"
         checked>
         <label for="fun">Hauskaa</label>
         <input type="checkbox" id="boring" name="boring"
         checked>
         <label for="boring">Tylsää</label><br/>
        <input type="submit" class="btn btn-primary" value="Lisää merkintä">
    </form>

<?php include TEMPLATES_DIR.'footer.php'; ?>