<?php
include_once('functions.php');
include_once('assets/header.php');
?>
<div class="container">
    <?php $ator = buscar_ator($con); ?>


    <form action="index.php" method="post">
        <legend>Excluir ator</legend>
        <input type="hidden" name="ator_id" value="<?php echo $ator['ator_id']; ?>">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" readonly value="<?php echo $ator['primeiro_nome']; ?>">
        </div>
        <div class="form-group">
            <label for="sobrenome">Sobrenome</label>
            <input type="text" name="sobrenome" id="sobrenome" readonly class="form-control" value="<?php echo $ator['ultimo_nome']; ?>">
        </div>
        <button name="deletar_ator" class="btn btn-danger">Excluir</button>
        <a href="index.php" class="btn btn-default">Voltar para lista</a>
    </form>
</div>
<?php
include_once('assets/footer.php');
?>