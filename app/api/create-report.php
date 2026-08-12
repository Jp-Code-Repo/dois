<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Controllers\ReportController;
use App\Models\ReportModel;
use App\Models\StudentModel;
use App\Models\ReasonModel;
use Config\Database;

header('Content-Type: application/json');

try {

    $database = new Database();

    $db = $database->getConnection();

    $reportModel = new ReportModel($db);
    $studentModel = new StudentModel($db);
    $reasonModel = new ReasonModel($db);

    $controller = new ReportController(
        $reportModel,
        $studentModel,
        $reasonModel
    );

    $controller->store();

} catch (\Throwable $e) {

    http_response_code(500);

    echo json_encode([
        'success' => false,
        'message' => 'Unable to process the request.'
    ]);
}