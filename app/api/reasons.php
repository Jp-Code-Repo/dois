<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\ReasonModel;
use Config\Database;

header('Content-Type: application/json');

try {

    $database = new Database();
    $db = $database->getConnection();

    $reasonModel = new ReasonModel($db);

    $reasons = $reasonModel->getAllReasons();

    echo json_encode([
        'success' => true,
        'data' => $reasons
    ]);

} catch (Throwable $e) {

    http_response_code(500);

    echo json_encode([
        'success' => false,
        'message' => 'Unable to retrieve reasons.'
    ]);
}