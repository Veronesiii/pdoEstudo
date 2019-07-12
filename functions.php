
<?php

include_once('conexao.php');


function listarAtores($con)
{
    $query = $con->query("SELECT * FROM ator");
    $atores = $query->fetchAll(PDO::FETCH_ASSOC);

    return $atores;
}


if(isset($_POST['adicionar_ator'])){
    // var_dump($con);
    //adicionar ator
    $query = $con->prepare("INSERT INTO ator (primeiro_nome, ultimo_nome) values (?, ?)");

    $resultado = $query->execute([isset($_POST['nome']), isset($_POST['sobrenome']) ]);

    // $resultado = $resultado->fetchAll(PDO::FETCH_ASSOC);

    var_dump($resultado);
}

function editar_ator($con){
    // var_dump($_GET['editar_ator']);

    if(isset($_GET['editar_ator'])) {
    
        $query = $con->prepare("SELECT * FROM ator WHERE ator_id = ?");
    
        $ator = $query->execute([ $_GET['editar_ator'] ]);
    
        $ator = $query->fetch(PDO::FETCH_ASSOC);
    
        return $ator;
    }else {
        return "Ator não encontrado";
    }
}

if(isset($_POST['editar_ator'])){
    var_dump($_POST);
    $query = $con->prepare("UPDATE atores SET primeiro_nome=?, ultimo_nome = ? WHERE id = ?;");

    $atorEditado = $query->execute([ isset($_POST['nome']), isset($_POST['sobrenome']), isset($_POST['id'])]);
    var_dump($atorEditado);

    if($atorEditado){
        echo "Atualização realizada com sucesso";
    } else {
        echo "Erro ao atualizar ator :(";
    }
}

?>