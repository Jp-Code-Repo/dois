<?php

namespace App\Controllers;

use App\Models\ReportModel;
use App\Models\StudentModel;
use App\Models\ReasonModel;

class ReportController
{
    private ReportModel $reportModel;
    private StudentModel $studentModel;
    private ReasonModel $reasonModel;

    public function __construct(
        ReportModel $reportModel,
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

            $reportNumber = $this->reportModel->generateReportNumber();

            echo json_encode([
                'success' => true,
                'report_number' => $reportNumber
            ]);

        } catch (Throwable $e) {

            http_response_code(500);

            echo json_encode([
                'success' => false,
                'message' => 'Unable to generate report number.'
            ]);
        }
    }

    public function store(): void
    {
        header('Content-Type: application/json');

        try {

            /*
            |--------------------------------------------------------------------------
            | Get submitted values
            |--------------------------------------------------------------------------
            */

            $reportDate = trim($_POST['report_date'] ?? '');

            $monitoringOfficer =
                trim($_POST['monitoring_officer'] ?? '');

            $studentId =
                (int) ($_POST['student_id'] ?? 0);

            $reasonId =
                (int) ($_POST['reason_id'] ?? 0);

            $supplementaryObservations =
                trim($_POST['supplementary_observations'] ?? '');

            $actionsTaken =
                trim($_POST['actions_taken'] ?? '');


            /*
            |--------------------------------------------------------------------------
            | Validate required fields
            |--------------------------------------------------------------------------
            */

            if (
                $reportDate === '' ||
                $monitoringOfficer === '' ||
                $studentId <= 0 ||
                $reasonId <= 0
            ) {

                http_response_code(422);

                echo json_encode([
                    'success' => false,
                    'message' => 'Please complete all required fields.'
                ]);

                return;
            }


            /*
            |--------------------------------------------------------------------------
            | Get Student
            |--------------------------------------------------------------------------
            */

            $student =
                $this->studentModel->getStudentById($studentId);

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
                $this->reasonModel->getReasonById($reasonId);

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
            | Generate Report Number
            |--------------------------------------------------------------------------
            */

            $reportNumber =
                $this->reportModel->generateReportNumber();


            /*
            |--------------------------------------------------------------------------
            | Prepare Report Data
            |--------------------------------------------------------------------------
            */

            $reportData = [

                'report_number' =>
                    $reportNumber,

                'report_date' =>
                    $reportDate,

                'monitoring_officer' =>
                    $monitoringOfficer,

                'student_id' =>
                    $student['id'],

                'student_name' =>
                    $student['student_name'],

                'department_id' =>
                    $student['department_id'],

                'department_name' =>
                    $student['department_name'],

                'grade_level' =>
                    $student['grade_level'],

                'section' =>
                    $student['section'],

                'reason_id' =>
                    $reason['id'],

                'reason_name' =>
                    $reason['name'],

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
            | Create Report
            |--------------------------------------------------------------------------
            */

            $reportId =
                $this->reportModel->createReport($reportData);


            /*
            |--------------------------------------------------------------------------
            | Return Success
            |--------------------------------------------------------------------------
            */

            echo json_encode([
                'success' => true,
                'message' => 'Discipline report created successfully.',
                'report_id' => $reportId,
                'report_number' => $reportNumber
            ]);

        } catch (\Throwable $e) {

            http_response_code(500);

            echo json_encode([
                'success' => false,
                'message' => 'Unable to create discipline report.'
            ]);
        }
    }
}