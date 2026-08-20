<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Config\Database;

header('Content-Type: application/json');

try {

    $database = new Database();
    $db = $database->getConnection();

    $sql = "
        SELECT
            id,
            code,
            name
        FROM student_level_departments
        WHERE is_active = 1
        ORDER BY id ASC
    ";

    $stmt = $db->prepare($sql);
    $stmt->execute();

    echo json_encode([
        'success' => true,
        'data' => $stmt->fetchAll(PDO::FETCH_ASSOC)
    ]);

} catch (Throwable $e) {

    http_response_code(500);

    echo json_encode([
        'success' => false,
        'message' => 'Unable to retrieve student departments.'
    ]);
}