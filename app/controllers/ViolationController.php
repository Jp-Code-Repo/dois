<?php

namespace App\Controllers;

class ViolationController
{

    public function index(): void
    {
        require __DIR__ . '/../views/violations/index.php';
    }


}