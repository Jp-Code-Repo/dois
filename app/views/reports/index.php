<main class="page-content">

    <!-- REPORT LIST -->

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <div>
                    <h5 class="card-title mb-1">
                        Tardiness Reports
                    </h5>

                    <p class="text-muted mb-0">
                        List of tardiness reports recorded in the system.
                    </p>
                </div>

                <span class="badge bg-primary">
                    <?= count($reports) ?> Reports
                </span>

            </div>


            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">

                        <tr>

                            <th>
                                Report #
                            </th>

                            <th>
                                Date
                            </th>

                            <th>
                                Student
                            </th>

                            <th>
                                Department
                            </th>

                            <th>
                                Grade
                            </th>

                            <th>
                                Section
                            </th>

                            <th>
                                Reason
                            </th>

                            <th class="text-end">
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        <?php if (empty($reports)): ?>

                            <tr>

                                <td colspan="8" class="text-center py-5">

                                    <div class="text-muted">

                                        <i class="bi bi-file-earmark-text fs-1 d-block mb-3"></i>

                                        <h6 class="mb-1">
                                            No reports found
                                        </h6>

                                        <p class="mb-0">
                                            There are no discipline reports recorded yet.
                                        </p>

                                    </div>

                                </td>

                            </tr>

                        <?php else: ?>

                            <?php foreach ($reports as $report): ?>

                                <tr>

                                    <td>

                                        <span class="fw-semibold">
                                            <?= htmlspecialchars($report['report_number']) ?>
                                        </span>

                                    </td>


                                    <td>

                                        <?= htmlspecialchars(
                                            date('M d, Y', strtotime($report['report_date']))
                                        ) ?>

                                    </td>


                                    <td>

                                        <div class="fw-semibold">
                                            <?= htmlspecialchars($report['student_name']) ?>
                                        </div>

                                        <small class="text-muted">
                                            <?= htmlspecialchars($report['monitoring_officer']) ?>
                                        </small>

                                    </td>


                                    <td>

                                        <?= htmlspecialchars($report['department_name']) ?>

                                    </td>


                                    <td>

                                        <?= htmlspecialchars($report['grade_level']) ?>

                                    </td>


                                    <td>

                                        <?= htmlspecialchars($report['section']) ?>

                                    </td>


                                    <td>

                                        <span class="badge text-bg-warning">

                                            <?= htmlspecialchars($report['reason_name']) ?>

                                        </span>

                                    </td>


                                    <td class="text-end">

                                        <a
                                            href="?page=reports&action=view&id=<?= (int) $report['id'] ?>"
                                            class="btn btn-sm btn-outline-primary"
                                            title="View Report"
                                        >

                                            <i class="bi bi-eye"></i>

                                        </a>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</main>