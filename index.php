<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Controllers\CaseController;
use App\Controllers\DashboardController;
use App\Models\CaseModel;
use Config\Database;


$page = $_GET['page'] ?? 'dashboard';


$pageTitle = match ($page) {

    'cases'      => 'Cases',
    'reports'    => 'Reports',
    'students'   => 'Students',
    'violations' => 'Violations',
    'actions'    => 'Actions / Sanctions',
    'analytics'  => 'Analytics',
    'settings'   => 'Settings',

    default      => 'Dashboard'

};


$database = new Database();

$db = $database->getConnection();

?>


<?php include 'includes/header.inc.php'; ?>

<?php include 'includes/topnav.inc.php'; ?>

<?php include 'includes/sidenav.inc.php'; ?>


<div class="main-wrapper">

    <?php

    switch ($page) {

        case 'cases':

            $caseModel = new CaseModel($db);

            $controller = new CaseController($caseModel);

            $controller->index();

            break;


        case 'dashboard':

        default:

            $controller = new DashboardController();

            $controller->index();

            break;

    }

    ?>

</div>


<?php include 'includes/scripts.inc.php'; ?>

<?php include 'includes/footer.inc.php'; ?>