<?php
require './config/connection.php';

$teste = array(
    array('0' => 'titulo'),
    array('1' => 'titulo'),
);

$resultQuery = $this->$conn->query("SELECT idnotas, titulo, conteudo FROM notas");
$resultBD = $resultQuery->fetchAll(PDO::FETCH_ASSOC);
var_dump($resultD);
