<?php

namespace App\Controllers;

class ActionController
{

    public function index(): void
    {
        require __DIR__ . '/../views/actions/index.php';
    }


}