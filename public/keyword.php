<?php
include TEMPLATES_DIR.'header.php';
require_once MODULES_DIR.'db.php';
include MODULES_DIR.'keyword.php';

$keyword = filter_input(INPUT_POST, "keyword");

try {
    if(isset($keyword)){
    addKeyWord($keyword);
    echo '<div class="alert alert-success" role="alert">Avainsana lisätty!!</div>';
    }
} catch (Exception $e) {
    throw $e;
}


?>


<form action="keyword.php" method="post">
    <h2>Lisää avainsana</h2>
    <input type="text" id="keyword" name="keyword">
    <input type="submit" class="btn btn-primary" value="Lisää avainsana">
</form>