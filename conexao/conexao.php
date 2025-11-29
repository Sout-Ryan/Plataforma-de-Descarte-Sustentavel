<?php

    $hostname = "localhost";
    $usuario = "root" ;
    $senha = "";
    $dbname = "ecopontos";

    try {
        $pdo = new PDO("mysql:host=$hostname;
        dbname=$dbname", $usuario, $senha);

    } catch (PDOException $e){
        echo $e->getMessage();
    }
?>