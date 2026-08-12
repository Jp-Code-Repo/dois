<aside class="sidebar" id="sidebar">

    <!-- Brand -->

    <div class="sidebar-brand">

        <div class="sidebar-brand-logo">
            <i class="bi bi-shield-check"></i>
        </div>

        <div class="sidebar-brand-text">

            <div class="title">
                Discipline Office
            </div>

            <div class="subtitle">
                Student Affairs
            </div>

        </div>

    </div>


    <!-- Navigation -->

    <div class="sidebar-content">

        <!-- MAIN -->

        <div class="nav-section">

            <div class="nav-section-title">
                Main
            </div>

            <a href="index.php?page=dashboard" class="nav-link <?= $page === 'dashboard' ? 'active' : '' ?>">

                <i class="bi bi-grid-1x2-fill"></i>

                <span>Dashboard</span>

            </a>
            
        </div>


        <!-- CASE MANAGEMENT -->

        <div class="nav-section">

            <div class="nav-section-title">
                Case Management
            </div>

           <a href="index.php?page=cases" class="nav-link <?= $page === 'cases' ? 'active' : '' ?>">

                <i class="bi bi-folder2-open"></i>

                <span>Cases</span>

            </a>

            <a href="index.php?page=reports" class="nav-link <?= $page === 'reports' ? 'active' : '' ?>">

                <i class="bi bi-file-earmark-text"></i>

                <span>Reports</span>

            </a>

            <a href="index.php?page=students" class="nav-link <?= $page === 'students' ? 'active' : '' ?>">

                <i class="bi bi-people"></i>

                <span>Students</span>

            </a>

            <a href="index.php?page=violations" class="nav-link <?= $page === 'violations' ? 'active' : '' ?>">

                <i class="bi bi-exclamation-triangle"></i>

                <span>Violations</span>

            </a>

            <a href="index.php?page=actions" class="nav-link <?= $page === 'actions' ? 'active' : '' ?>">

                <i class="bi bi-clipboard-check"></i>

                <span>Actions / Sanctions</span>

            </a>

        </div>


        <!-- INSIGHTS -->

        <div class="nav-section">

            <div class="nav-section-title">
                Insights
            </div>

            <a href="index.php?page=analytics" class="nav-link <?= $page === 'analytics' ? 'active' : '' ?>">

                <i class="bi bi-bar-chart"></i>

                <span>Analytics</span>

            </a>

        </div>


        <!-- SYSTEM -->

        <div class="nav-section">

            <div class="nav-section-title">
                System
            </div>

            <a href="index.php?page=settings" class="nav-link <?= $page === 'settings' ? 'active' : '' ?>">

                <i class="bi bi-gear"></i>

                <span>Settings</span>

            </a>

        </div>

    </div>


    <!-- Sidebar Footer -->

    <div class="sidebar-footer">

        <div class="sidebar-footer-user">

            <div class="sidebar-footer-avatar">
                AD
            </div>

            <div>

                <div class="sidebar-footer-name">
                    Admin User
                </div>

                <div class="sidebar-footer-role">
                    Discipline Officer
                </div>

            </div>

        </div>

    </div>

</aside>