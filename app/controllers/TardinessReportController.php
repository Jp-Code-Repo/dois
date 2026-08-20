<?php

namespace App\Controllers;

use App\Models\TardinessReportModel;
use App\Models\StudentModel;
use App\Models\ReasonModel;

class TardinessReportController
{
    private TardinessReportModel $reportModel;
    private StudentModel $studentModel;
    private ReasonModel $reasonModel;

    public function __construct(
        TardinessReportModel $reportModel,
        StudentModel $studentModel,
        ReasonModel $reasonModel
    ) {
        $this->reportModel = $reportModel;
        $this->studentModel = $studentModel;
        $this->reasonModel = $reasonModel;
    }

    public function index(): void
    {
        $reports = $this->reportModel->getAllReports();

        require __DIR__ . '/../Views/reports/index.php';
    }

    public function create(): void
    {
        header('Content-Type: application/json');

        try {

            $reportNumber =
                $this->reportModel->generateReportNumber();

            echo json_encode([
                'success' => true,
                'report_number' => $reportNumber
            ]);

        } catch (\Throwable $e) {

            http_response_code(500);

            echo json_encode([
                'success' => false,
                'message' =>
                    'Unable to generate report number.'
            ]);
        }
    }

    public function store(): void
    {
        header('Content-Type: application/json');

        try {

            /*
            |--------------------------------------------------------------------------
            | Get Submitted Values
            |--------------------------------------------------------------------------
            */

            $reportDate =
                trim($_POST['report_date'] ?? '');

            $monitoringOfficerId =
                (int) ($_POST['monitoring_officer_id'] ?? 0);

            $studentId =
                (int) ($_POST['student_id'] ?? 0);

            $departmentId =
                (int) ($_POST['department_id'] ?? 0);

            $departmentName =
                trim($_POST['department_name'] ?? '');

            $reasonId =
                (int) ($_POST['reason_id'] ?? 0);

            $supplementaryObservations =
                trim(
                    $_POST['supplementary_observations'] ?? ''
                );

            $actionsTaken =
                trim(
                    $_POST['actions_taken'] ?? ''
                );


            /*
            |--------------------------------------------------------------------------
            | Validate Required Fields
            |--------------------------------------------------------------------------
            */

 if (
    $reportDate === '' ||
    $monitoringOfficerId <= 0 ||
    $studentId <= 0 ||
    $departmentId <= 0 ||
    $departmentName === '' ||
    $reasonId <= 0
) {

    http_response_code(422);

    echo json_encode([
        'success' => false,
        'message' => 'Please complete all required fields.',
        'debug' => [
            'report_date' => $reportDate,
            'monitoring_officer_id' => $monitoringOfficerId,
            'student_id' => $studentId,
            'department_id' => $departmentId,
            'department_name' => $departmentName,
            'reason_id' => $reasonId
        ]
    ]);

    return;
}


            /*
            |--------------------------------------------------------------------------
            | Get Student
            |--------------------------------------------------------------------------
            */

            $student =
                $this->studentModel->getStudentById(
                    $studentId
                );

            if (!$student) {

                http_response_code(404);

                echo json_encode([
                    'success' => false,
                    'message' => 'Student not found.'
                ]);

                return;
            }


            /*
            |--------------------------------------------------------------------------
            | Get Reason
            |--------------------------------------------------------------------------
            */

            $reason =
                $this->reasonModel->getReasonById(
                    $reasonId
                );

            if (!$reason) {

                http_response_code(404);

                echo json_encode([
                    'success' => false,
                    'message' => 'Reason not found.'
                ]);

                return;
            }


            /*
            |--------------------------------------------------------------------------
            | Generate Tardiness Report Number
            |--------------------------------------------------------------------------
            */

            $tardinessReportNumber =
                $this->reportModel->generateReportNumber();


            /*
            |--------------------------------------------------------------------------
            | Prepare Tardiness Report Data
            |--------------------------------------------------------------------------
            */

            $reportData = [

                'tard_rep_num' =>
                    $tardinessReportNumber,

                'report_date' =>
                    $reportDate,

                'monitoring_officer_id' =>
                    $monitoringOfficerId,


                /*
                |--------------------------------------------------------------------------
                | Student Snapshot
                |--------------------------------------------------------------------------
                */

                'student_id' =>
                    $student['id'],

                'spn' =>
                    $student['spn'],

                'student_firstname' =>
                    $student['student_firstname'],

                'student_middlename' =>
                    $student['student_middlename'],

                'student_lastname' =>
                    $student['student_lastname'],


                /*
                |--------------------------------------------------------------------------
                | Department Snapshot
                |--------------------------------------------------------------------------
                */

                'department_id' =>
                    $departmentId,

                'department_name' =>
                    $departmentName,

                'grade_level' =>
                    $student['grade_level'],

                'section' =>
                    $student['section'],


                /*
                |--------------------------------------------------------------------------
                | Reason Snapshot
                |--------------------------------------------------------------------------
                */

                'reason_id' =>
                    $reason['id'],

                'reason_name' =>
                    $reason['name'],


                /*
                |--------------------------------------------------------------------------
                | Report Details
                |--------------------------------------------------------------------------
                */

                'supplementary_observations' =>
                    $supplementaryObservations !== ''
                        ? $supplementaryObservations
                        : null,

                'actions_taken' =>
                    $actionsTaken !== ''
                        ? $actionsTaken
                        : null
            ];


            /*
            |--------------------------------------------------------------------------
            | Create Tardiness Report
            |--------------------------------------------------------------------------
            */

            $reportId =
                $this->reportModel->createReport(
                    $reportData
                );


            /*
            |--------------------------------------------------------------------------
            | Return Success
            |--------------------------------------------------------------------------
            */

            echo json_encode([
                'success' => true,
                'message' =>
                    'Tardiness report created successfully.',
                'report_id' =>
                    $reportId,
                'report_number' =>
                    $tardinessReportNumber
            ]);

        } catch (\Throwable $e) {

            http_response_code(500);

            echo json_encode([
                'success' => false,
                'message' =>
                    'Unable to create tardiness report.'
            ]);
        }
    }

    public function show(int $id): void
    {
        $report =
            $this->reportModel->getReportById($id);

        if (!$report) {

            http_response_code(404);

            require __DIR__ . '/../Views/errors/404.php';

            return;
        }

        require __DIR__ . '/../Views/reports/show.php';
    }
}