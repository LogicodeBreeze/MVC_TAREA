<?php

class Tarea
{
    private PDO $conexion;

    public function __construct()
    {
        $this->conexion = Database::getConnection();
    }

    public function listarPorUsuario(int $idUsuario): array
    {
        $sql = "SELECT t.id, t.titulo, t.descripcion, t.fechaCreacion, u.nombreUsuario
                FROM tareas t
                JOIN usuarios u ON t.idUsuario = u.id
                WHERE t.idUsuario = :idUsuario
                ORDER BY t.fechaCreacion DESC";

        $stmt = $this->conexion->prepare($sql);
        $stmt->bindValue(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function crear(string $titulo, string $descripcion, int $idUsuario): bool
    {
        $sql = 'INSERT INTO tareas (titulo, descripcion, idUsuario) VALUES (:titulo, :descripcion, :idUsuario)';
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindValue(':titulo', $titulo, PDO::PARAM_STR);
        $stmt->bindValue(':descripcion', $descripcion, PDO::PARAM_STR);
        $stmt->bindValue(':idUsuario', $idUsuario, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function obtenerDeUsuario(int $idTarea, int $idUsuario): ?array
    {
        $sql = 'SELECT * FROM tareas WHERE id = :id AND idUsuario = :idUsuario LIMIT 1';
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindValue(':id', $idTarea, PDO::PARAM_INT);
        $stmt->bindValue(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }

    public function actualizar(int $idTarea, int $idUsuario, string $titulo, string $descripcion): bool
    {
        $sql = 'UPDATE tareas SET titulo = :titulo, descripcion = :descripcion WHERE id = :id AND idUsuario = :idUsuario';
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindValue(':titulo', $titulo, PDO::PARAM_STR);
        $stmt->bindValue(':descripcion', $descripcion, PDO::PARAM_STR);
        $stmt->bindValue(':id', $idTarea, PDO::PARAM_INT);
        $stmt->bindValue(':idUsuario', $idUsuario, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function eliminar(int $idTarea, int $idUsuario): bool
    {
        $sql = 'DELETE FROM tareas WHERE id = :id AND idUsuario = :idUsuario';
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindValue(':id', $idTarea, PDO::PARAM_INT);
        $stmt->bindValue(':idUsuario', $idUsuario, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
