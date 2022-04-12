<?php
    include TEMPLATES_DIR."header.php";
?>
<?php

$uname = filter_input(INPUT_POST, "username");
$pw = filter_input(INPUT_POST, "password");
?>

    <form action="login.php" method="post">
        <h3>Kirjaudu sisään</h3>
        <label for="username">Käyttäjänimi:</label><br>
        <input type="text" name="username" id="username"><br>
        <label for="password">Salasana:</label><br>
        <input type="password" name="password" id="password"><br>
        <input type="submit" class="btn btn-primary" value="Kirjaudu">
    </form>

 <?php  include TEMPLATES_DIR.'footer.php'; ?>