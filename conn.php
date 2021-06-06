<?php

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "endereco";

$conn = mysqli_connect($servername, $username, $password, $db_name);

if (!$conn) {
    die("Conexão falhou: " .mysqli_connect_error());
}