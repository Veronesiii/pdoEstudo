<?php include_once('functions.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Locadora</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1>Atores</h1>
            </div>
            <div class="col-md-6">
                <table class="table">
                    <tr>
                        <th>Nome</th>
                        <th>Sobrenome</th>
                        <th>Ações</th>
                    </tr>
                    <?php
                    foreach (listarAtores($con) as $ator) {
                        echo "<tr>";
                        echo "<td>$ator[primeiro_nome]</td>";
                        echo "<td>$ator[ultimo_nome]</td>";
                        echo "<td><a href='editar.php?editar_ator=$ator[ator_id]'>Editar</a><br><a>Excluir</a></td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
            <div class="col-md-6">
                <form action="index.php" method="post">
                    <legend>Adicionar ator</legend>
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="sobrenome">Sobrenome</label>
                        <input type="text" name="sobrenome" id="sobrenome" class="form-control">
                    </div>
                    <button href="index.php" name="adicionar_ator">Enviar</button>
                </form>
            </div>
        </div>

    </div>
</body>

</html>