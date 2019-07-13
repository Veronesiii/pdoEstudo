<?php
include_once('functions.php');
include_once('assets/header.php');
?>

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
                foreach (listarAtores() as $ator) {
                    echo "<tr>";
                    echo "<td>$ator[primeiro_nome]</td>";
                    echo "<td>$ator[ultimo_nome]</td>";
                    echo "<td><a href='editar.php?ator_id=$ator[ator_id]'>Editar</a>
                        <br>
                        <a href='deletar.php?ator_id=$ator[ator_id]'>Excluir</a></td>";
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
                <button href="index.php" name="adicionar_ator" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>

</div>
<?php
include_once('assets/footer.php');
?>