<?php

// function getPdoConnection(){

 $init = parse_ini_file("../../myconf.ini", true);
 $host = $init["host"];
 $db = $init["db"];
 $user = $init["username"];
 $password = $init["pw"];

 $dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

 try {
     $pdo = new PDO($dsn, $user, $password);
     echo "yhteys luotu";
 } catch (PDOException $e) {
     echo $e->getMessage();
 }

//  return $pdo;
// }
