<?php

namespace App\Models;

use PDO;

class ReasonModel
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAllReasons(): array
    {
        $sql = "
            SELECT
                id,
                name,
                description
            FROM reasons
            ORDER BY name ASC
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getReasonById(int $id): ?array
    {
        $sql = "
            SELECT
                id,
                name,
                description
            FROM reasons
            WHERE id = ?
            LIMIT 1
        ";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([$id]);

        $reason = $stmt->fetch(PDO::FETCH_ASSOC);

        return $reason ?: null;
    }
}