<?php
include TEMPLATES_DIR.'header.php';

if(isset($_SESSION["username"])){
        echo "<h1>Tervetuloa ".$_SESSION["fname"]." ".$_SESSION["lname"].$_SESSION["user_id"]."</h1>";
    }else{
        echo "<h1>Tervetuloa. Kirjaudu sisään tehdäksesi päiväkirjamerkintöjä. Rekisteröidy ensin, jos et ole vielä rekisteröitynyt.</h1>";
    }

include TEMPLATES_DIR.'footer.php';
