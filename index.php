<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Controllers\CaseController;
use App\Controllers\DashboardController;
use App\Controllers\ReportController;

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

            $controller->index();

            break;


        case 'students':

            $studentModel = new StudentModel($db);

            // We'll create StudentController next.
            // For now, this prevents the page from
            // incorrectly using CaseController.

            $students = $studentModel->getAllStudents();

            require __DIR__ . '/Views/students/index.php';

            break;


        case 'violations':

            // We'll create ViolationController later.
            require __DIR__ . '/Views/violations/index.php';

            break;


        case 'actions':

            // We'll create ActionController later.
            require __DIR__ . '/Views/actions/index.php';

            break;


        case 'analytics':

            // We'll create AnalyticsController later.
            require __DIR__ . '/Views/analytics/index.php';

            break;


        case 'settings':

            // We'll create SettingsController later.
            require __DIR__ . '/Views/settings/index.php';

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