<?php
include TEMPLATES_DIR.'header.php';

if(isset($_SESSION["username"])){?>
        <div id="box"> <?php echo "<h1>Tervetuloa ".$_SESSION["fname"]." ".$_SESSION["lname"]."</h1>";
        echo "<p>Voit nyt lisätä merkintöjä päiväkirjaasi tai tarkastella aiempia merkintöjäsi.</p>"; ?> </div> <?php
    }else{?>
        <div id="box"> <?php echo "<h1>Tervetuloa. Kirjaudu sisään tehdäksesi päiväkirjamerkintöjä. Rekisteröidy ensin, jos et ole vielä rekisteröitynyt.</h1>"; ?> </div> <?php
    }

include TEMPLATES_DIR.'footer.php';
