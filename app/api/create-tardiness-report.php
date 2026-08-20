<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Controllers\TardinessReportController;
use App\Models\TardinessReportModel;
use App\Models\StudentModel;
use App\Models\ReasonModel;
use Config\Database;

header('Content-Type: application/json');

try {

    $database = new Database();

    $db = $database->getConnection();

    $tardinessReportModel = new TardinessReportModel($db);
    $studentModel = new StudentModel($db);
    $reasonModel = new ReasonModel($db);

    $controller = new TardinessReportController(
        $tardinessReportModel,
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