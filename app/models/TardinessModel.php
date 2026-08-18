<?php

namespace App\Models;

use PDO;

class TardinessModel
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAllReports(): array
    {
        $sql = "
            SELECT
                id,
                report_number,
                report_date,
                monitoring_officer,
                student_name,
                department_name,
                grade_level,
                section,
                reason_name,
                supplementary_observations,
                actions_taken,
                created_at
            FROM reports
            WHERE deleted_at IS NULL
            ORDER BY created_at DESC
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createReport(array $data): int
    {
        $sql = "
            INSERT INTO reports (
                report_number,
                report_date,
                monitoring_officer,

                student_id,
                student_name,
                department_id,
                department_name,
                grade_level,
                section,

                reason_id,
                reason_name,

                supplementary_observations,
                actions_taken
            )
            VALUES (
                ?, ?, ?,
                ?, ?, ?, ?, ?, ?,
                ?, ?,
                ?, ?
            )
        ";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            $data['report_number'],
            $data['report_date'],
            $data['monitoring_officer'],

            $data['student_id'],
            $data['student_name'],
            $data['department_id'],
            $data['department_name'],
            $data['grade_level'],
            $data['section'],

            $data['reason_id'],
            $data['reason_name'],

            $data['supplementary_observations'],
            $data['actions_taken']
        ]);

        return (int) $this->db->lastInsertId();
    }

    public function generateReportNumber(): string
    {
        $year = date('Y');

        $sql = "
            SELECT report_number
            FROM reports
            WHERE report_number LIKE ?
            ORDER BY id DESC
            LIMIT 1
        ";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            "REP-{$year}-%"
        ]);

        $lastReport = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$lastReport) {
            return "REP-{$year}-0001";
        }

        $lastNumber = $lastReport['report_number'];

        $sequence = (int) substr($lastNumber, -4);

        $nextSequence = $sequence + 1;

        return sprintf(
            "REP-%s-%04d",
            $year,
            $nextSequence
        );
    }

    public function getReportById(int $id): ?array
    {
        $sql = "
            SELECT
                id,
                report_number,
                report_date,
                monitoring_officer,

                student_id,
                student_name,

                department_id,
                department_name,

                grade_level,
                section,

                reason_id,
                reason_name,

                supplementary_observations,
                actions_taken,

                created_at,
                updated_at

            FROM reports

            WHERE id = ?
            AND deleted_at IS NULL

            LIMIT 1
        ";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([$id]);

        $report = $stmt->fetch(PDO::FETCH_ASSOC);

        return $report ?: null;
    }


}