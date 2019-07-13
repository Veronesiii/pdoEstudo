
<?php

$dsn = "mysql:host=db4free.net;dbname=locadora_pdo;port=3306"; //informações p/ conexão
$user = "dh_estudo";
$pass = "dh_estudo_2019";

$con = new PDO($dsn, $user, $pass);

if (!$con) {
    echo "Erro na conexão ao banco de dados";
}