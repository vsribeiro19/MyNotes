<?php
require '../config/connection.php';
require 'Notas.php';
if (isset($_POST['submit'])) {
    $nota = new Notas($conn);
    $nota->adicionarNotas($_POST['titulo'], $_POST['conteudo']);
    header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Nota</title>
</head>

<body>
    <form action="#" method="POST">
        <label for="titulo">Titulo da nota</label>
        <br>
        <input type="text" id="titulo" name="titulo" required>
        <br>
        <label for="conteudo">Conteúdo da nota</label>
        <br>
        <input type="text" id="conteudo" name="conteudo" required>
        <br>
        <br>
        <button name="submit">Criar nova nota</button>
    </form>
</body>

</html>