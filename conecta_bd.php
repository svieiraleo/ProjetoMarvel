<?php
    $serverName = "localhost";
    $dataBase = "marvel";
    $userName = "root";
    $password = "";
    //cria conexão
    $strcon = mysqli_connect($serverName, $userName, $password, $dataBase);

    //verifica conexão
    if (!$strcon) {
        die("Falha na conexão: " . mysqli_connect_error());
    }
?>