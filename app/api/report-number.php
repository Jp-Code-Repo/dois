<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\ReportModel;
use Config\Database;

header('Content-Type: application/json');

try {

    $database = new Database();
    $db = $database->getConnection();

    $reportModel = new ReportModel($db);

    $reportNumber = $reportModel->generateReportNumber();

    echo json_encode([
        'success' => true,
        'report_number' => $reportNumber
    ]);

} catch (Throwable $e) {

    http_response_code(500);

    echo json_encode([
        'success' => false,
        'message' => 'Unable to generate report number.'
    ]);
}