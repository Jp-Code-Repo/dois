<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Controllers\DashboardController;
use App\Controllers\CaseController;
use App\Controllers\ReportController;
use App\Controllers\StudentController;
use App\Controllers\ViolationController;
use App\Controllers\ActionController;
use App\Controllers\AnalyticsController;
use App\Controllers\SettingController;

use App\Models\CaseModel;
use App\Models\ReportModel;
use App\Models\StudentModel;
use App\Models\ReasonModel;

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

        case 'dashboard':

            $dashboardModel = new CaseModel($db);

            $controller = new DashboardController($dashboardModel);

            $controller->index();

            break;


        case 'cases':

            $caseModel = new CaseModel($db);

            $controller = new CaseController($caseModel);

            $controller->index();

            break;


        case 'reports':

            $reportModel = new ReportModel($db);
            $studentModel = new StudentModel($db);
            $reasonModel = new ReasonModel($db);

            $controller = new ReportController(
                $reportModel,
                $studentModel,
                $reasonModel
            );

            $action = $_GET['action'] ?? 'index';

            switch ($action) {

                case 'view':

                    $id = (int) ($_GET['id'] ?? 0);

                    $controller->show($id);

                    break;

                default:

                    $controller->index();

                    break;
            }

            break;


        case 'students':

            // $studentModel = new StudentModel($db);

            $controller = new StudentController();

            // We'll create StudentController next.
            // For now, this prevents the page from
            // incorrectly using CaseController.

            // $students = $studentModel->getAllStudents();

            $controller->index();

            break;


        case 'violations':

            $controller = new ViolationController();

            $controller->index();

            break;


        case 'actions':

            $controller = new ActionController();

            $controller->index();

            break;


        case 'analytics':

            $controller = new AnalyticsController();

            $controller->index();

            break;


        case 'settings':

            $controller = new SettingController();

            $controller->index();

            break;


        default:

            $controller = new DashboardController();

            $controller->index();

            break;
    }

    ?>

</div>


<?php include 'includes/scripts.inc.php'; ?>

<?php include 'includes/footer.inc.php'; ?>