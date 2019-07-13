
<?php

include_once('conexao.php');


function listarAtores()
{
    global $con;
    $query = $con->query("SELECT * FROM ator ORDER BY ultima_atualizacao DESC");
    $atores = $query->fetchAll(PDO::FETCH_ASSOC);

    return $atores;
}

function buscar_ator()
{
    global $con;
    if (isset($_GET['ator_id'])) {

        $query = $con->prepare("SELECT * FROM ator WHERE ator_id = :id");
        $ator = $query->execute([
            ":id" => $_GET['ator_id']
        ]);
        $ator = $query->fetch(PDO::FETCH_ASSOC);
        return $ator;
    } else {
        header('Location: index.php'); //se o id for invalido, redireciona para pagina inicial
    }
}


if (isset($_POST['adicionar_ator'])) {

    if ($_POST['nome'] != "" && $_POST['sobrenome'] != "") {

        $query = $con->prepare("INSERT INTO ator (primeiro_nome, ultimo_nome) values (:nome, :sobrenome)");
        $resultado = $query->execute([
            ":nome" => $_POST['nome'],
            ":sobrenome" => $_POST['sobrenome']
        ]);

        echo "<p class='alert alert-success'>Cadastrado!</p>";
    } else {
        echo "<p class='alert alert-warning'>Preencha os campos corretamente!</p>";
    }
}

if (isset($_POST['editar_ator'])) {

    if ($_POST['nome'] != "" && $_POST['sobrenome'] != "") {

        $query = $con->prepare("UPDATE ator SET primeiro_nome=:nome, ultimo_nome =:sobrenome WHERE ator_id = :id;");
        $atorEditado = $query->execute([
            ":nome" => $_POST['nome'],
            ":sobrenome" => $_POST['sobrenome'],
            ":id" => $_POST['id']
        ]);

        echo "<p class='alert alert-success'>Atualização realizada com sucesso</p>";
    } else {
        echo "<p class='alert alert-danger'>Preencha os campos corretamente!</p>";
    }

}


if (isset($_POST['deletar_ator'])) {

    if (isset($_POST['ator_id']) && $_POST['ator_id'] != "") {
        $query = $con->prepare("DELETE FROM ator WHERE ator_id = :id;");

        $atorEditado = $query->execute([
            ":id" => $_POST['ator_id']
        ]);

        echo "<p class='alert alert-success'>Ator deletado com sucesso</p>";
    } else {
        echo "<p class='alert alert-danger'>Preencha os campos corretamente!</p>";
    }
}
?>