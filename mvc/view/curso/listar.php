<?php include_once __DIR__ . "/../header.php"?>

<a href="/curso/adicionar" class="btn btn-primary mb-3">Novo curso</a>

<ul class="list-group">
    <?php foreach ($cursos as $curso): ?>
        <li class="list-group-item">
            <?= $curso->getNome(); ?>
            <a href="/curso/remover?id=<?= $curso->getId(); ?>" class="btn btn-danger btn-sm float-right">Remover</a>
        </li>
    <?php endforeach; ?>
</ul>

<?php include_once __DIR__ . "/../footer.php"?>
