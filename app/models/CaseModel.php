<?php

namespace App\Models;

use PDO;

class CaseModel
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAllCases(): array
    {
        $stmt = $this->db->prepare("
            SELECT *
            FROM cases
            ORDER BY created_at DESC
        ");

        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function getCaseById(int $id): ?array
    {
        $stmt = $this->db->prepare("
            SELECT *
            FROM cases
            WHERE id = ?
            LIMIT 1
        ");

        $stmt->execute([
            $id
        ]);

        $case = $stmt->fetch();

        return $case ?: null;
    }

    public function createCase(array $data): bool
    {
        $stmt = $this->db->prepare("
            INSERT INTO cases (
                student_id,
                violation_id,
                description
            )
            VALUES (?, ?, ?)
        ");

        return $stmt->execute([
            $data['student_id'],
            $data['violation_id'],
            $data['description']
        ]);
    }
}