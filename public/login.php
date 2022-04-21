<?php
    // include TEMPLATES_DIR."header.php";

    session_start();
    include MODULES_DIR . 'authorization.php';

    $uname = filter_input(INPUT_POST, "username");
    $pw = filter_input(INPUT_POST, "password");

    try {
        login($uname, $pw);
        header("HTTP/1.1 200 OK");
        echo "You've logged in!";
        $_SESSION["kayttajanimi"] = $uname;
        exit;
        // header("Location: index.php");
        // exit;
    } catch(Exception $e) {
        header("HTTP/1.1 401 Unauthorized");
        $error_json = new stdClass();
        $error_json->errorMsg = $e->getMessage();
        echo json_encode($error_json);
        exit;
        // echo '<div class="alert alert-danger" role="alert">' . $e -> getMessage().'</div>';
}

?>

    <form action="login.php" method="post">
        <h3>Kirjaudu sisään</h3>
        <label for="username">Käyttäjänimi:</label><br>
        <input type="text" name="username" id="username"><br>
        <label for="password">Salasana:</label><br>
        <input type="password" name="password" id="password"><br>
        <input type="submit" class="btn btn-primary" value="Kirjaudu">
    </form>

 <?php  // include TEMPLATES_DIR.'footer.php'; ?>