<?php

include('../conn.php');
   

if (isset($_POST['submit'])) {
    $cep =  $_POST['cep'];
    $rua = $_POST['rua'];
    $bairro = $_POST['bairro'];
    $cdd = $_POST['cdd'];
    $uf = $_POST['uf'];
    $ddd = $_POST['ddd'];
 
    if (!empty($cep) == false || !empty($rua) == false || !empty($bairro) == false || !empty($cdd) == false || !empty($uf) == false || !empty($ddd) == false) {
        header("location: ../inicio.php?error=campovazio");
        exit(); 
    }

    $sql = "INSERT INTO `lista_enderecos`(`cep`, `rua`, `bairro`, `cidade`, `uf`, `ddd`) VALUES ('$cep', '$rua', '$bairro', '$cdd', '$uf', '$ddd')";
    if (mysqli_query($conn, $sql)) {
        header("location: ../inicio.php?error=nenhum");
        exit();
    } else {
        header("location: ../inicio.php?error=falha");
        exit();
    }

    mysqli_close($conn);

} else {
    header("location: ../inicio.php");
    exit();
}


