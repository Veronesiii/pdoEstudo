
<?php

include_once('conexao.php');


function listarAtores($con)
{
    $query = $con->query("SELECT * FROM ator ORDER BY ultima_atualizacao DESC");
    $atores = $query->fetchAll(PDO::FETCH_ASSOC);

    return $atores;
}


if(isset($_POST['adicionar_ator'])){
    //adicionar ator

    if($_POST['nome'] != "" && $_POST['sobrenome'] != "") {        
        $query = $con->prepare("INSERT INTO ator (primeiro_nome, ultimo_nome) values (:nome, :sobrenome)");
    
        $resultado = $query->execute([
            ":nome" => $_POST['nome'], 
            ":sobrenome" => $_POST['sobrenome']
        ]);

        echo "<p class='alert alert-success'>Cadastrado!</p>";
    } else {
        echo "<p class='alert alert-warning'>PREENCHA TODOS OS CAMPOS!</p>";

    }

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