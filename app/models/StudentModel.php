<?php

namespace App\Models;

use PDO;

class StudentModel
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAllStudents(): array
    {
        $sql = "
            SELECT 
                id,
                spn,
                student_lastname,
                student_firstname,
                student_middlename,
                grade_level,
                section
            FROM students
            ORDER BY student_lastname ASC, student_firstname ASC
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getStudentById(int $id): ?array
    {
        $sql = "
            SELECT
                s.id,
                s.student_number,
                s.student_name,
                s.grade_level,
                s.section,
                s.department_id,
                d.name AS department_name
            FROM students s
            INNER JOIN departments d
                ON d.id = s.department_id
            WHERE s.id = ?
            LIMIT 1
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);

        $student = $stmt->fetch(PDO::FETCH_ASSOC);

        return $student ?: null;
    }
}