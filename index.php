<?php
require './config/connection.php';
require './application/Notas.php';
require './config/header.php';
$nota = new Notas($conn);
$notas = $nota->exibirNotas();
?>

<h2 class="text-center mt-4">MyNotes</h2>
<a href="application/AdicionarNota.php" class="btn btn-primary ml-4">Nova Nota</a>
<table class="table table-striped mt-5">
    <thead class="thead-dark">
        <tr>
            <th scope="col" class="text-center">Titulo</th>
            <th scope="col" class="text-center">Conteúdo</th>
            <th colspan="2" class="text-center">Ações</th>
        </tr>
    </thead>
    <?php if (count($notas) > 0) : ?>
        <tbody>
            <?php foreach ($notas as $nota) : ?>
                <tr>
                    <td class="text-center align-middle"><?= $nota['titulo']; ?></td>
                    <td class="text-center align-middle"><?= $nota['conteudo']; ?></td>
                    <td class="text-center">
                        <a class="btn btn-success" href="application/EditarNota.php?id=<?= $nota['id']; ?>">Editar</a>
                    </td>
                    <td class="text-center"><button class="btn btn-danger">Deletar</button></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    <?php else : ?>
        <td colspan="3">
            <h4 class="text-center align-middle">Não há notas</h4>
        </td>
    <?php endif; ?>
</table>
<?php
require './config/footer.php';
?>