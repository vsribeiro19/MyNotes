<?php
require './config/connection.php';
require './application/Notas.php';

$nota = new Notas($conn);
$notas = $nota->exibirNotas();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyNotes</title>
</head>

<body>
    <h2>Minhas anotações</h2>
    <?php if (count($notas) > 0) : ?>
        <table>
            <thead>
                <tr>
                    <th>Assunto</th>
                    <th>Descrição</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($notas as $nota) : ?>
                    <tr>
                        <td><?= $nota['titulo']; ?></td>
                        <td><?= $nota['conteudo']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <h3 style="text-align:center;">Não há notas</h3>
    <?php endif; ?>

</body>

</html>