<?php include_once __DIR__ . "/../header.php"?>

<a href="/curso/adicionar" class="btn btn-primary mb-3">Novo curso</a>

<ul class="list-group">
    <?php foreach ($cursos as $curso): ?>
        <li class="list-group-item">
            <?= $curso->getNome(); ?>
            <span class="float-right">
                <a href="/curso/alterar?id=<?= $curso->getId(); ?>" class="btn btn-info btn-sm  mr-2">Alterar</a>
                <a href="/curso/remover?id=<?= $curso->getId(); ?>" class="btn btn-danger btn-sm">Remover</a>
            </span>
        </li>
    <?php endforeach; ?>
</ul>

<?php include_once __DIR__ . "/../footer.php"?>
