<?php
    include TEMPLATES_DIR."header.php";
    include MODULES_DIR.'user.php';

?>

<form action="user.php" method="post">
        <label for="fname">Etunimi:</label><br>
        <input type="text" name="fname" id="fname"><br>

        <label for="lname">Sukunimi:</label><br>
        <input type="text" name="lname" id="lname"><br>

        <label for="uname">Käyttäjänimi:</label><br>
        <input type="text" name="uname" id="uname"><br>

        <label for="pw">Salasana:</label><br>
        <input type="password" name="pw" id="pw"><br>

        <input type="submit" class="btn btn-primary" value="Rekisteröidy">
</form>

<?php
    include TEMPLATES_DIR.'footer.php';
?>