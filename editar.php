<?php
include_once('functions.php');
include_once('assets/header.php');
?>

<div class="container">
    <?php $ator = buscar_ator($con); ?>


    <form method="post">
        <legend>Editar ator</legend>
        <input type="hidden" name="id" value="<?php echo $ator['ator_id']; ?>">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="<?php echo $ator['primeiro_nome']; ?>">
        </div>
        <div class="form-group">
            <label for="sobrenome">Sobrenome</label>
            <input type="text" name="sobrenome" id="sobrenome" class="form-control" value="<?php echo $ator['ultimo_nome']; ?>">
        </div>
        <button name="editar_ator" class="btn btn-primary">Salvar</button>
        <a href="index.php" class="btn btn-default">Voltar para lista</a>
    </form>
</div>

<?php
include_once('assets/footer.php');
?>