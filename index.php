<?php
    $page = $_GET['page'] ?? 'dashboard';

    $pageTitle = match ($page) {

        'reports'    => 'Reports',
        'cases'      => 'Cases',
        'students'   => 'Students',
        'violations' => 'Violations',
        'actions'    => 'Actions / Sanctions',
        'analytics'  => 'Analytics',

        default      => 'Dashboard'

    };
?>

<?php include 'includes/header.inc.php'; ?>
<?php include 'includes/topnav.inc.php'; ?>
<?php include 'includes/sidenav.inc.php'; ?>

<div class="main-wrapper">
    <?php
        switch ($page) {

            case 'personal-data-sheetv2':
                include './templates/forms/personaldatasheetv2.php';
                break;

            case 'personal-data-sheet':
                include './templates/forms/personaldatasheet.php';
                break;

            case 'profile':
                include './pages/user-profile.php';
                break;

            case 'emp_faculty':
                include './pages/emp.faculty.php';
                break;

            case 'emp_staff':
                include './pages/emp.staff.php';
                break;


            case 'reports':
                include 'pages/reports.php';
                break;

            default:
                include 'pages/dashboard.php';
                break;
        }
    ?>
</div>

<?php include 'includes/scripts.inc.php'; ?>
<?php include 'includes/footer.inc.php'; ?>