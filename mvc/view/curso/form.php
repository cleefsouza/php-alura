<?php include_once __DIR__ . "/../header.php" ?>

<form action="/curso/salvar" method="POST">
    <div class="form-group">
        <input hidden type="number" name="id" id="id" value="<?= isset($curso) ? $curso->getId() : ""  ?>"/>
        <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome"
               value="<?= isset($curso) ? $curso->getNome() : ""; ?>"/>
    </div>
    <button class="btn btn-success">Salvar</button>
    <a href="/curso/listar" class="btn btn-danger">Voltar</a>
</form>

<?php include_once __DIR__ . "/../footer.php" ?>
