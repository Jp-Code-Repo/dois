<main class="page-content">

    <!-- PAGE HEADER -->

    <div class="page-header">

        <div>

            <h1 class="page-title">
                Report Details
            </h1>

            <div class="page-description">
                View the complete details of this discipline report.
            </div>

        </div>

        <div>

            <a
                href="?page=reports"
                class="btn btn-outline-secondary"
            >
                <i class="bi bi-arrow-left me-1"></i>
                Back to Reports
            </a>

        </div>

    </div>


    <!-- REPORT INFORMATION -->

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <!-- REPORT HEADER -->

            <div class="d-flex justify-content-between align-items-start mb-4">

                <div>

                    <div class="text-muted small mb-1">
                        Report Number
                    </div>

                    <h4 class="mb-0">
                        <?= htmlspecialchars($report['report_number']) ?>
                    </h4>

                </div>

                <span class="badge text-bg-primary">
                    Discipline Report
                </span>

            </div>


            <hr>


            <!-- BASIC INFORMATION -->

            <h5 class="mb-3">
                Report Information
            </h5>

            <div class="row g-3 mb-4">

                <div class="col-md-4">

                    <div class="text-muted small">
                        Report Date
                    </div>

                    <div class="fw-semibold">
                        <?= htmlspecialchars(
                            date('F d, Y', strtotime($report['report_date']))
                        ) ?>
                    </div>

                </div>


                <div class="col-md-4">

                    <div class="text-muted small">
                        Monitoring Officer
                    </div>

                    <div class="fw-semibold">
                        <?= htmlspecialchars($report['monitoring_officer']) ?>
                    </div>

                </div>


                <div class="col-md-4">

                    <div class="text-muted small">
                        Date Created
                    </div>

                    <div class="fw-semibold">
                        <?= htmlspecialchars(
                            date('F d, Y h:i A', strtotime($report['created_at']))
                        ) ?>
                    </div>

                </div>

            </div>


            <!-- STUDENT INFORMATION -->

            <h5 class="mb-3">
                Student Information
            </h5>

            <div class="row g-3 mb-4">

                <div class="col-md-6">

                    <div class="text-muted small">
                        Student Name
                    </div>

                    <div class="fw-semibold">
                        <?= htmlspecialchars($report['student_name']) ?>
                    </div>

                </div>


                <div class="col-md-6">

                    <div class="text-muted small">
                        Department
                    </div>

                    <div class="fw-semibold">
                        <?= htmlspecialchars($report['department_name']) ?>
                    </div>

                </div>


                <div class="col-md-6">

                    <div class="text-muted small">
                        Grade Level
                    </div>

                    <div class="fw-semibold">
                        <?= htmlspecialchars($report['grade_level']) ?>
                    </div>

                </div>


                <div class="col-md-6">

                    <div class="text-muted small">
                        Section
                    </div>

                    <div class="fw-semibold">
                        <?= htmlspecialchars($report['section']) ?>
                    </div>

                </div>

            </div>


            <!-- DISCIPLINE INFORMATION -->

            <h5 class="mb-3">
                Discipline Information
            </h5>

            <div class="mb-4">

                <div class="text-muted small mb-1">
                    Reason
                </div>

                <span class="badge text-bg-secondary">
                    <?= htmlspecialchars($report['reason_name']) ?>
                </span>

            </div>


            <!-- SUPPLEMENTARY OBSERVATIONS -->

            <div class="mb-4">

                <div class="text-muted small mb-1">
                    Supplementary Observations
                </div>

                <div class="border rounded p-3 bg-light">

                    <?= nl2br(
                        htmlspecialchars(
                            $report['supplementary_observations'] ?? ''
                        )
                    ) ?>

                </div>

            </div>


            <!-- ACTIONS TAKEN -->

            <div class="mb-2">

                <div class="text-muted small mb-1">
                    Actions Taken
                </div>

                <div class="border rounded p-3 bg-light">

                    <?= nl2br(
                        htmlspecialchars(
                            $report['actions_taken'] ?? ''
                        )
                    ) ?>

                </div>

            </div>

        </div>

    </div>

</main>