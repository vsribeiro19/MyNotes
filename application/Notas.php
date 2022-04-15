<?php

class Notas
{
    private $conn;
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function exibirNotas(): array
    {
        $notas = $this->conn->query('SELECT idnotas, titulo, conteudo FROM notas');
        $resultNotas = $notas->fetchAll(PDO::FETCH_ASSOC);
        // $data = array(
        //     "data" => $resultNotas
        // );
        // json_encode($data);
        return $resultNotas;
    }

    public function consultar($id)
    {
        $consultar = $this->conn->query('SELECT idnotas, titulo, conteudo FROM notas
        WHERE idnotas = :idnotas');
        $consultar->bind_param(':idnotas', $id);
        $result = $consultar->get_result()->fetch_assoc();
        return $result;
    }
    public function adicionarNotas(string $titulo, string $conteudo)
    {
        $criandoNota = ("INSERT INTO notas (titulo, conteudo) VALUES (:titulo, :conteudo) ");
        $resultQuery = $this->conn->prepare($criandoNota);
        $resultQuery->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $resultQuery->bindParam(':conteudo', $conteudo, PDO::PARAM_STR);
        $resultQuery->execute();
    }
}
