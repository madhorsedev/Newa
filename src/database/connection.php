<?php

    $host = "localhost";
    $dbName = "newa_bbdd";

    $user = "root";
    $pass = "";

    try{

        $pdo = new PDO('mysql:host='.$host.';dbname='.$dbName, $user, $pass);

    }catch(PDOException $e){
        echo "Error: ".$e->getMessage();
    }

?>