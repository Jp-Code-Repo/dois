<?php

namespace App\Models;

use PDO;

class DashboardModel
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    
}