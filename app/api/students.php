<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\StudentModel;
use Config\Database;

header('Content-Type: application/json');

try {

    $database = new Database();
    $db = $database->getConnection();

    $studentModel = new StudentModel($db);

    $students = $studentModel->getAllStudents();

    echo json_encode([
        'success' => true,
        'data' => $students
    ]);

} catch (Throwable $e) {

    http_response_code(500);

    echo json_encode([
        'success' => false,
        'message' => 'Unable to retrieve students.'
    ]);
}