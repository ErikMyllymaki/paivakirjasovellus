<?php
    include TEMPLATES_DIR."header.php";
    include MODULES_DIR.'user.php';

    $fname = filter_input(INPUT_POST, "fname");
    $lname = filter_input(INPUT_POST, "lname");
    $uname = filter_input(INPUT_POST, "uname");
    $pw = filter_input(INPUT_POST, "pw");

    if(isset($fname)){
        try{
            addUser($fname, $lname, $uname, $pw);
            echo '<div class="alert alert-success" role="alert">Käyttäjä lisätty!!</div>';
        }catch(Exception $e){
            echo '<div class="alert alert-danger" role="alert">'.$e->getMessage().'</div>';
        }
        
    }

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