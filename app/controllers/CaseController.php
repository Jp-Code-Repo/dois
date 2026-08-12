<?php

namespace App\Controllers;

use App\Models\CaseModel;

class CaseController
{
    private CaseModel $caseModel;

    public function __construct(CaseModel $caseModel)
    {
        $this->caseModel = $caseModel;
    }

    public function index(): void
    {
        $cases = $this->caseModel->getAllCases();

        require __DIR__ . '/../Views/cases/index.php';
    }

    public function show(int $id): void
    {
        $case = $this->caseModel->getCaseById($id);

        if (!$case) {

            http_response_code(404);

            require __DIR__ . '/../Views/errors/404.php';

            return;
        }

        require __DIR__ . '/../Views/cases/show.php';
    }
}