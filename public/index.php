<?php
include TEMPLATES_DIR.'header.php';
include TEMPLATES_DIR.'footer.php';


if(isset($_SESSION["username"])){
        echo "<h1>Welcome ".$_SESSION["fname"]." ".$_SESSION["lname"]."</h1>";
    }else{
        echo "<h1>Welcome! You may log in to use advanced features!</h1>";
    }

    include TEMPLATES_DIR.'footer.php';
