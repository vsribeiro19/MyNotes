<?php

require '../config/connection.php';
require 'Notas.php';
require '../config/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $edtNota = new Notas($conn);
    $edtNota->editarNotas($_POST['id'], $_POST['titulo'], $_POST['conteudo']);
    header('Location: ../index.php');
}
$edtNota = new Notas($conn);
$notes = $edtNota->consultaPorId($_GET['id']);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/assets/css/edtNota.css">
    <title>Editar Nota</title>
</head>

<body>
    <form action="EditarNota.php" method="post">
        <div class="form-group">
            <label for="novoTitutlo">Alterar Título</label>
            <input id="novoTitutlo" type="text" name="titulo" class="form-control" value="<?= $notes['titulo']; ?>" required>
        </div>
        <div class="form-group">
            <label for="novoConteudo">Alterar Conteúdo</label>
            <div class="row">
                <textarea class="ml-3" name="conteudo" id="conteudo" required><?= $notes['conteudo']; ?></textarea>
            </div>
        </div>
        <input type="hidden" name="id" value="<?= $notes['id']; ?>">
        <button type="submit" class="btn btn-primary">Editar</button>
    </form>
    <?php
    require '../config/footer.php';
    ?>