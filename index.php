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
    <link rel="stylesheet" href="public/assets/css/index.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <title>MyNotes</title>
</head>

<body>
    <h2>Minhas anotações</h2>
    <?php if (count($notas) > 0) : ?>
        <table id="lstNotas" class="display" style="width:100%">
            <thead>
                <tr>
                    <!-- <th>Código</th> -->
                    <th>Titulo</th>
                    <th>Conteúdo</th>
                    <!-- <th>Criado em</th>
                    <th>Ações</th> -->
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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#lstNotas').DataTable({
                "processing": true,
                "serverSide": false, //se colocar TRUE terá de retornar um JSON no JS
            });
        });
    </script>
</body>

</html>