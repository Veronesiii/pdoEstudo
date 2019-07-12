<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inserir ator</title>
</head>
<body>

<form action="index.php" method="post">
<input type="text" name="nome"><br>
<input type="text" name="sobrenome"><br>
<button href="index.php">Enviar</button>

<?php var_dump($_POST);?>
</form>
    
</body>
</html>

<?php 

$dsn = "mysql:host=localhost;dbname=locadorafsb;port=3306";
$user = "root";
$pass = "";

$con = new PDO($dsn,$user,$pass);

// var_dump($con);

// $con->query("SELECT * FROM ator");


$query = $con->prepare("INSERT INTO ator (primeiro_nome, ultimo_nome)
values (:nome,:sobrenome)");
$resultado = $query->execute([
    "nome"=> isset($_POST['nome']),
    "sobrenome"=>isset($_POST['sobrenome'])
]);

if($resultado){
    echo "Deu bom";
}else{
    echo "Deu Ruim";
}
// $resultado = $query->fetchAll(PDO::FETCH_ASSOC);


?>