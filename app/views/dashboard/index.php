    <main class="page-content">


        <!-- PAGE HEADER -->

        <div class="page-header">

            <div>

                <h1 class="page-title">
                    Good afternoon, Admin
                </h1>

                <div class="page-description">
                    Here's what's happening in the Discipline Office today.
                </div>

            </div>


            <div>

                <button class="btn btn-primary">

                    <i class="bi bi-plus-lg me-1"></i>

                    New Discipline Report

                </button>

            </div>

        </div>


        <!-- =====================================================
             STATISTICS
        ====================================================== -->

        <div class="row g-3 mb-4">


            <!-- TOTAL CASES -->

            <div class="col-12 col-sm-6 col-xl-3">

                <div class="stat-card">

                    <div class="stat-card-top">

                        <div>

                            <div class="stat-label">
                                Total Cases
                            </div>

                            <div class="stat-value">
                                248
                            </div>

                        </div>

                        <div class="stat-icon blue">

                            <i class="bi bi-folder2-open"></i>

                        </div>

                    </div>

                    <div class="stat-footer">

                        <span class="stat-change">
                            ↑ 8.2%
                        </span>

                        from last month

                    </div>

                </div>

            </div>


            <!-- PENDING -->

            <div class="col-12 col-sm-6 col-xl-3">

                <div class="stat-card">

                    <div class="stat-card-top">

                        <div>

                            <div class="stat-label">
                                Pending Cases
                            </div>

                            <div class="stat-value">
                                17
                            </div>

                        </div>

                        <div class="stat-icon orange">

                            <i class="bi bi-hourglass-split"></i>

                        </div>

                    </div>

                    <div class="stat-footer">

                        <span class="text-danger fw-semibold">
                            5 require attention
                        </span>

                    </div>

                </div>

            </div>


            <!-- ACTIVE -->

            <div class="col-12 col-sm-6 col-xl-3">

                <div class="stat-card">

                    <div class="stat-card-top">

                        <div>

                            <div class="stat-label">
                                Active Cases
                            </div>

                            <div class="stat-value">
                                12
                            </div>

                        </div>

                        <div class="stat-icon purple">

                            <i class="bi bi-activity"></i>

                        </div>

                    </div>

                    <div class="stat-footer">

                        <span class="stat-change">
                            3 resolved
                        </span>

                        this week

                    </div>

                </div>

            </div>


            <!-- RESOLVED -->

            <div class="col-12 col-sm-6 col-xl-3">

                <div class="stat-card">

                    <div class="stat-card-top">

                        <div>

                            <div class="stat-label">
                                Resolved Cases
                            </div>

                            <div class="stat-value">
                                219
                            </div>

                        </div>

                        <div class="stat-icon green">

                            <i class="bi bi-check-circle"></i>

                        </div>

                    </div>

                    <div class="stat-footer">

                        <span class="stat-change">
                            88.3%
                        </span>

                        resolution rate

                    </div>

                </div>

            </div>

        </div>


        <!-- =====================================================
             CHART + NEEDS ATTENTION
        ====================================================== -->

        <div class="row g-3 mb-4">


            <!-- CASE OVERVIEW -->

            <div class="col-12 col-xl-8">

                <div class="dashboard-card">

                    <div class="dashboard-card-header">

                        <div>

                            <h2 class="dashboard-card-title">
                                Cases Overview
                            </h2>

                            <div class="dashboard-card-subtitle">
                                Case activity over the past 8 months
                            </div>

                        </div>


                        <select
                            class="form-select form-select-sm"
                            style="width: auto;">

                            <option>
                                Last 8 months
                            </option>

                            <option>
                                This year
                            </option>

                            <option>
                                Last year
                            </option>

                        </select>

                    </div>


                    <div class="dashboard-card-body">

                        <div class="chart-container">

                            <canvas id="casesChart"></canvas>

                        </div>

                    </div>

                </div>

            </div>


            <!-- NEEDS ATTENTION -->

            <div class="col-12 col-xl-4">

                <div class="dashboard-card">

                    <div class="dashboard-card-header">

                        <div>

                            <h2 class="dashboard-card-title">
                                Needs Attention
                            </h2>

                            <div class="dashboard-card-subtitle">
                                Items requiring action
                            </div>

                        </div>

                        <span class="badge bg-danger rounded-pill">
                            5
                        </span>

                    </div>


                    <div class="dashboard-card-body">

                        <!-- ITEM -->

                        <div class="attention-item">

                            <div class="attention-icon">

                                <i class="bi bi-exclamation-lg"></i>

                            </div>

                            <div>

                                <div class="attention-title">
                                    Case #2026-0142
                                </div>

                                <div class="attention-description">
                                    Student conference is pending.
                                </div>

                            </div>

                        </div>


                        <!-- ITEM -->

                        <div class="attention-item">

                            <div class="attention-icon">

                                <i class="bi bi-calendar-event"></i>

                            </div>

                            <div>

                                <div class="attention-title">
                                    Case #2026-0141
                                </div>

                                <div class="attention-description">
                                    Hearing scheduled for tomorrow.
                                </div>

                            </div>

                        </div>


                        <!-- ITEM -->

                        <div class="attention-item">

                            <div class="attention-icon">

                                <i class="bi bi-person-check"></i>

                            </div>

                            <div>

                                <div class="attention-title">
                                    Case #2026-0138
                                </div>

                                <div class="attention-description">
                                    Awaiting disciplinary action.
                                </div>

                            </div>

                        </div>


                        <!-- ITEM -->

                        <div class="attention-item">

                            <div class="attention-icon">

                                <i class="bi bi-file-earmark"></i>

                            </div>

                            <div>

                                <div class="attention-title">
                                    Case #2026-0134
                                </div>

                                <div class="attention-description">
                                    Additional documentation required.
                                </div>

                            </div>

                        </div>


                        <div class="mt-3">

                            <a
                                href="#"
                                class="btn btn-sm btn-light w-100">

                                View all pending items

                                <i class="bi bi-arrow-right ms-1"></i>

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- =====================================================
             RECENT CASES
        ====================================================== -->

        <div class="row g-3 mb-4">


            <div class="col-12">

                <div class="dashboard-card">

                    <div class="dashboard-card-header">

                        <div>

                            <h2 class="dashboard-card-title">
                                Recent Cases
                            </h2>

                            <div class="dashboard-card-subtitle">
                                Most recently updated discipline cases
                            </div>

                        </div>


                        <a
                            href="#"
                            class="btn btn-sm btn-light">

                            View All

                            <i class="bi bi-arrow-right ms-1"></i>

                        </a>

                    </div>


                    <div class="table-wrapper">

                        <table class="table">

                            <thead>

                                <tr>

                                    <th>
                                        Case #
                                    </th>

                                    <th>
                                        Student
                                    </th>

                                    <th>
                                        Violation
                                    </th>

                                    <th>
                                        Reported
                                    </th>

                                    <th>
                                        Assigned To
                                    </th>

                                    <th>
                                        Status
                                    </th>

                                    <th>
                                        Action
                                    </th>

                                </tr>

                            </thead>


                            <tbody>


                                <!-- CASE -->

                                <tr>

                                    <td>

                                        <span class="case-number">
                                            #2026-0152
                                        </span>

                                    </td>

                                    <td>

                                        <div class="student-name">
                                            Juan Dela Cruz
                                        </div>

                                        <div class="student-meta">
                                            Grade 10 - Rizal
                                        </div>

                                    </td>

                                    <td>
                                        Bullying
                                    </td>

                                    <td>
                                        Aug 11, 2026
                                    </td>

                                    <td>
                                        A. Santos
                                    </td>

                                    <td>

                                        <span class="status-badge status-active">
                                            Active
                                        </span>

                                    </td>

                                    <td>

                                        <button
                                            class="btn btn-sm btn-light">

                                            <i class="bi bi-three-dots"></i>

                                        </button>

                                    </td>

                                </tr>


                                <!-- CASE -->

                                <tr>

                                    <td>

                                        <span class="case-number">
                                            #2026-0151
                                        </span>

                                    </td>

                                    <td>

                                        <div class="student-name">
                                            Maria Santos
                                        </div>

                                        <div class="student-meta">
                                            Grade 8 - Bonifacio
                                        </div>

                                    </td>

                                    <td>
                                        Disrespect
                                    </td>

                                    <td>
                                        Aug 11, 2026
                                    </td>

                                    <td>
                                        J. Reyes
                                    </td>

                                    <td>

                                        <span class="status-badge status-hearing">
                                            Hearing
                                        </span>

                                    </td>

                                    <td>

                                        <button
                                            class="btn btn-sm btn-light">

                                            <i class="bi bi-three-dots"></i>

                                        </button>

                                    </td>

                                </tr>


                                <!-- CASE -->

                                <tr>

                                    <td>

                                        <span class="case-number">
                                            #2026-0150
                                        </span>

                                    </td>

                                    <td>

                                        <div class="student-name">
                                            Pedro Reyes
                                        </div>

                                        <div class="student-meta">
                                            Grade 9 - Mabini
                                        </div>

                                    </td>

                                    <td>
                                        Fighting
                                    </td>

                                    <td>
                                        Aug 10, 2026
                                    </td>

                                    <td>
                                        A. Santos
                                    </td>

                                    <td>

                                        <span class="status-badge status-pending">
                                            Pending
                                        </span>

                                    </td>

                                    <td>

                                        <button
                                            class="btn btn-sm btn-light">

                                            <i class="bi bi-three-dots"></i>

                                        </button>

                                    </td>

                                </tr>


                                <!-- CASE -->

                                <tr>

                                    <td>

                                        <span class="case-number">
                                            #2026-0149
                                        </span>

                                    </td>

                                    <td>

                                        <div class="student-name">
                                            Ana Garcia
                                        </div>

                                        <div class="student-meta">
                                            Grade 11 - Bonifacio
                                        </div>

                                    </td>

                                    <td>
                                        Truancy
                                    </td>

                                    <td>
                                        Aug 10, 2026
                                    </td>

                                    <td>
                                        M. Cruz
                                    </td>

                                    <td>

                                        <span class="status-badge status-resolved">
                                            Resolved
                                        </span>

                                    </td>

                                    <td>

                                        <button
                                            class="btn btn-sm btn-light">

                                            <i class="bi bi-three-dots"></i>

                                        </button>

                                    </td>

                                </tr>


                                <!-- CASE -->

                                <tr>

                                    <td>

                                        <span class="case-number">
                                            #2026-0148
                                        </span>

                                    </td>

                                    <td>

                                        <div class="student-name">
                                            Carlo Mendoza
                                        </div>

                                        <div class="student-meta">
                                            Grade 7 - Luna
                                        </div>

                                    </td>

                                    <td>
                                        Property Damage
                                    </td>

                                    <td>
                                        Aug 9, 2026
                                    </td>

                                    <td>
                                        J. Reyes
                                    </td>

                                    <td>

                                        <span class="status-badge status-active">
                                            Active
                                        </span>

                                    </td>

                                    <td>

                                        <button
                                            class="btn btn-sm btn-light">

                                            <i class="bi bi-three-dots"></i>

                                        </button>

                                    </td>

                                </tr>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>


        <!-- =====================================================
             RECENT REPORTS + QUICK ACTIONS
        ====================================================== -->

        <div class="row g-3">


            <!-- RECENT REPORTS -->

            <div class="col-12 col-lg-7">

                <div class="dashboard-card">

                    <div class="dashboard-card-header">

                        <div>

                            <h2 class="dashboard-card-title">
                                Recent Reports
                            </h2>

                            <div class="dashboard-card-subtitle">
                                Latest reports submitted through the system
                            </div>

                        </div>

                        <a
                            href="#"
                            class="btn btn-sm btn-light">

                            View All

                        </a>

                    </div>


                    <div class="dashboard-card-body">


                        <!-- REPORT -->

                        <div class="report-item">

                            <div class="report-avatar">
                                JD
                            </div>

                            <div>

                                <div class="report-name">
                                    Juan Dela Cruz
                                </div>

                                <div class="report-details">
                                    Bullying · Grade 10 - Rizal
                                </div>

                            </div>

                            <div class="report-time">
                                10 min ago
                            </div>

                        </div>


                        <!-- REPORT -->

                        <div class="report-item">

                            <div class="report-avatar">
                                MS
                            </div>

                            <div>

                                <div class="report-name">
                                    Maria Santos
                                </div>

                                <div class="report-details">
                                    Disrespect · Grade 8 - Bonifacio
                                </div>

                            </div>

                            <div class="report-time">
                                1 hr ago
                            </div>

                        </div>


                        <!-- REPORT -->

                        <div class="report-item">

                            <div class="report-avatar">
                                PR
                            </div>

                            <div>

                                <div class="report-name">
                                    Pedro Reyes
                                </div>

                                <div class="report-details">
                                    Fighting · Grade 9 - Mabini
                                </div>

                            </div>

                            <div class="report-time">
                                2 hrs ago
                            </div>

                        </div>


                        <!-- REPORT -->

                        <div class="report-item">

                            <div class="report-avatar">
                                AG
                            </div>

                            <div>

                                <div class="report-name">
                                    Ana Garcia
                                </div>

                                <div class="report-details">
                                    Truancy · Grade 11 - Bonifacio
                                </div>

                            </div>

                            <div class="report-time">
                                3 hrs ago
                            </div>

                        </div>

                    </div>

                </div>

            </div>


            <!-- QUICK ACTIONS -->

            <div class="col-12 col-lg-5">

                <div class="dashboard-card">

                    <div class="dashboard-card-header">

                        <div>

                            <h2 class="dashboard-card-title">
                                Quick Actions
                            </h2>

                            <div class="dashboard-card-subtitle">
                                Frequently used actions
                            </div>

                        </div>

                    </div>


                    <div class="dashboard-card-body">

                        <div class="row g-2">


                            <div class="col-12">

                                <a href="#" class="quick-action">

                                    <div class="quick-action-icon">

                                        <i class="bi bi-plus-lg"></i>

                                    </div>

                                    <div class="quick-action-text">

                                        Create Discipline Report

                                    </div>

                                    <i class="bi bi-chevron-right ms-auto text-muted"></i>

                                </a>

                            </div>


                            <div class="col-12">

                                <a href="#" class="quick-action">

                                    <div class="quick-action-icon">

                                        <i class="bi bi-search"></i>

                                    </div>

                                    <div class="quick-action-text">

                                        Search Student

                                    </div>

                                    <i class="bi bi-chevron-right ms-auto text-muted"></i>

                                </a>

                            </div>


                            <div class="col-12">

                                <a href="#" class="quick-action">

                                    <div class="quick-action-icon">

                                        <i class="bi bi-folder-plus"></i>

                                    </div>

                                    <div class="quick-action-text">

                                        Create Case

                                    </div>

                                    <i class="bi bi-chevron-right ms-auto text-muted"></i>

                                </a>

                            </div>


                            <div class="col-12">

                                <a href="#" class="quick-action">

                                    <div class="quick-action-icon">

                                        <i class="bi bi-bar-chart"></i>

                                    </div>

                                    <div class="quick-action-text">

                                        View Analytics

                                    </div>

                                    <i class="bi bi-chevron-right ms-auto text-muted"></i>

                                </a>

                            </div>


                        </div>

                    </div>

                </div>

            </div>

        </div>


    </main>