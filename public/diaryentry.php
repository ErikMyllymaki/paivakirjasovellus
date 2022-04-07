<?php
include TEMPLATES_DIR.'header.php';
?>

    <form action="diaryentry.php" method="post">
        <h3>Kirjoita merkintä</h3>
        <textarea id="diary" name="diary"></textarea><br/>
        <input type="submit" class="btn btn-primary" value="Lisää merkintä">
    </form>

<?php include TEMPLATES_DIR.'footer.php'; ?>