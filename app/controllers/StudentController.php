<?php

namespace App\Controllers;

class StudentController
{

    public function index(): void
    {
        require __DIR__ . '/../views/students/index.php';
    }


}