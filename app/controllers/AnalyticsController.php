<?php

namespace App\Controllers;

class AnalyticsController
{

    public function index(): void
    {
        require __DIR__ . '/../views/analytics/index.php';
    }


}