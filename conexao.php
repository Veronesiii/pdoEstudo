
<?php

$dsn = "mysql:host=localhost;dbname=locadora;port=3306"; //informações p/ conexão
$user = "root";
$pass = "root";

$con = new PDO($dsn, $user, $pass);

if (!$con) {
    echo "Erro na conexão ao banco de dados";
}