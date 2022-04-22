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
        $notas = $this->conn->query('SELECT id, titulo, conteudo FROM notas');
        $resultNotas = $notas->fetchAll(PDO::FETCH_ASSOC);
        return $resultNotas;
    }

    public function adicionarNotas(string $titulo, string $conteudo)
    {
        $criandoNota = $this->conn->prepare("INSERT INTO notas (titulo, conteudo) VALUES (:titulo, :conteudo) ");
        $criandoNota->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $criandoNota->bindParam(':conteudo', $conteudo, PDO::PARAM_STR);
        $criandoNota->execute();
    }

    public function editarNotas(int $id, string $titulo, string $conteudo): void
    {
        $editarNota = $this->conn->prepare("UPDATE notas SET titulo = :titulo, conteudo = :conteudo WHERE id = :id");
        $editarNota->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $editarNota->bindParam(':conteudo', $conteudo, PDO::PARAM_STR);
        $editarNota->bindParam(':id', $id, PDO::PARAM_INT);
        $editarNota->execute();
    }

    public function consultaPorId(int $id): array
    {
        $consPorId = $this->conn->prepare("SELECT id, titulo, conteudo FROM notas WHERE id = :id");
        $consPorId->bindParam(':id', $id, PDO::PARAM_INT);
        $consPorId->execute();
        $notas = $consPorId->fetch(PDO::FETCH_ASSOC);
        return $notas;
    }
}
