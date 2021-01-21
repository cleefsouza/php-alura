<?php include_once __DIR__ . "/../header.php" ?>

<form action="/login/validar" method="POST">
    <div class="form-group">
        <input class="form-control mb-2" type="email" name="email" id="email" placeholder="E-mail"/>
        <input class="form-control" type="password" name="senha" id="senha" placeholder="Senha"/>
    </div>
    <button class="btn btn-success">Iniciar</button>
</form>

<?php include_once __DIR__ . "/../footer.php" ?>
