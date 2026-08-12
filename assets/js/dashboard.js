// Sidebar toggle behavior
    function toggleSidebar() {
      const sidebar = document.getElementById("sidebar");

      const overlay = document.getElementById("sidebarOverlay");

      sidebar.classList.toggle("show");

      overlay.classList.toggle("show");
    }


    // Quick Actions
    document.addEventListener("DOMContentLoaded", function () {
    const btnNewDisciplineReport = document.getElementById(
        "btnNewDisciplineReport",
    );

    const btnQuickCreateReport = document.getElementById("btnQuickCreateReport");

    const modalElement = document.getElementById("newDisciplineReportModal");

    if (!modalElement) {
        return;
    }

    const reportModal = new bootstrap.Modal(modalElement);

    if (btnNewDisciplineReport) {
        btnNewDisciplineReport.addEventListener("click", function () {
        reportModal.show();
        });
    }

    if (btnQuickCreateReport) {
        btnQuickCreateReport.addEventListener("click", function (event) {
        event.preventDefault();

        reportModal.show();
        });
    }
    });
