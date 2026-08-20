// Chart.js - Cases Chart
document.addEventListener("DOMContentLoaded", function () {

    const chartCanvas =
        document.getElementById("casesChart");

    if (!chartCanvas) {
        return;
    }

    new Chart(chartCanvas, {

        type: "line",

        data: {

            labels: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "Jul",
                "Aug"
            ],

            datasets: [

                {
                    label: "Reported",

                    data: [
                        18,
                        24,
                        21,
                        29,
                        34,
                        27,
                        36,
                        31
                    ],

                    borderColor: "#2563eb",

                    backgroundColor:
                        "rgba(37, 99, 235, 0.08)",

                    borderWidth: 2,

                    fill: true,

                    tension: 0.35,

                    pointRadius: 3,

                    pointHoverRadius: 5
                },

                {
                    label: "Resolved",

                    data: [
                        14,
                        19,
                        18,
                        22,
                        27,
                        25,
                        29,
                        24
                    ],

                    borderColor: "#16a34a",

                    backgroundColor:
                        "rgba(22, 163, 74, 0.05)",

                    borderWidth: 2,

                    fill: true,

                    tension: 0.35,

                    pointRadius: 3,

                    pointHoverRadius: 5
                }

            ]

        },

        options: {

            responsive: true,

            maintainAspectRatio: false,

            interaction: {

                intersect: false,

                mode: "index"

            },

            plugins: {

                legend: {

                    position: "bottom",

                    labels: {

                        usePointStyle: true,

                        pointStyle: "circle",

                        padding: 20,

                        font: {

                            size: 11

                        }

                    }

                }

            },

            scales: {

                y: {

                    beginAtZero: true,

                    border: {

                        display: false

                    },

                    grid: {

                        color: "#f1f1f1"

                    },

                    ticks: {

                        font: {

                            size: 10

                        },

                        color: "#9ca3af"

                    }

                },

                x: {

                    border: {

                        display: false

                    },

                    grid: {

                        display: false

                    },

                    ticks: {

                        font: {

                            size: 10

                        },

                        color: "#9ca3af"

                    }

                }

            }

        }

    });

});


// Quick Actions
document.addEventListener("DOMContentLoaded", function () {

    const btnNewDisciplineReport =
        document.getElementById(
            "btnNewDisciplineReport"
        );

    const btnQuickCreateReport =
        document.getElementById(
            "btnQuickCreateReport"
        );

    const modalElement =
        document.getElementById(
            "newDisciplineReportModal"
        );

    if (!modalElement) {
        return;
    }

    const reportModal =
        new bootstrap.Modal(modalElement);

    if (btnNewDisciplineReport) {

        btnNewDisciplineReport.addEventListener(
            "click",
            function () {

                reportModal.show();

            }
        );

    }

    if (btnQuickCreateReport) {

        btnQuickCreateReport.addEventListener(
            "click",
            function (event) {

                event.preventDefault();

                reportModal.show();

            }
        );

    }

});


// Determine Department By Grade Level
function determineDepartmentByLevel(
    gradeLevel,
    departments
) {

    let departmentCode = "";

    switch (gradeLevel) {

        case "Nursery":
        case "Pre-Kinder":
        case "Kinder":

            departmentCode = "ECP";

            break;


        case "Grade 1":
        case "Grade 2":
        case "Grade 3":
        case "Grade 4":
        case "Grade 5":
        case "Grade 6":

            departmentCode = "ELEM";

            break;


        case "Grade 7":
        case "Grade 8":
        case "Grade 9":
        case "Grade 10":

            departmentCode = "JHS";

            break;


        case "Grade 11":
        case "Grade 12":

            departmentCode = "SHS";

            break;


        default:

            return null;

    }

    return departments.find(
        department =>
            department.code === departmentCode
    ) || null;

}


// Load Students List
document.addEventListener("DOMContentLoaded", function () {

    const studentSelect =
        document.getElementById("student_id");

    if (!studentSelect) {
        return;
    }


    /*
     * ------------------------------------------------------------
     * Load Students
     * ------------------------------------------------------------
     */

    fetch("app/api/students.php")

        .then(response => {

            if (!response.ok) {

                throw new Error(
                    "Failed to load students."
                );

            }

            return response.json();

        })

        .then(studentResult => {

            if (!studentResult.success) {

                throw new Error(
                    studentResult.message ||
                    "Unable to load students."
                );

            }


            /*
             * ----------------------------------------------------
             * Load Student Departments
             * ----------------------------------------------------
             */

            return fetch(
                "app/api/student_departments.php"
            )

                .then(response => {

                    if (!response.ok) {

                        throw new Error(
                            "Failed to load student departments."
                        );

                    }

                    return response.json();

                })

                .then(departmentResult => {

                    if (!departmentResult.success) {

                        throw new Error(
                            departmentResult.message ||
                            "Unable to load student departments."
                        );

                    }


                    /*
                     * ------------------------------------------------
                     * Populate Student Dropdown
                     * ------------------------------------------------
                     */

                    studentResult.data.forEach(
                        student => {

                            const option =
                                document.createElement(
                                    "option"
                                );

                            option.value =
                                student.id;

                            option.textContent =
                                student.student_lastname +
                                ", " +
                                student.student_firstname;

                            option.dataset.student =
                                JSON.stringify(
                                    student
                                );

                            studentSelect.appendChild(
                                option
                            );

                        }
                    );


                    /*
                     * ------------------------------------------------
                     * Store departments for student selection
                     * ------------------------------------------------
                     */

                    studentSelect.dataset.departments =
                        JSON.stringify(
                            departmentResult.data
                        );

                });

        })

        .catch(error => {

            console.error(
                "Student loading error:",
                error
            );

        });

});


// Student Selection
document.addEventListener("DOMContentLoaded", function () {

    const studentSelect =
        document.getElementById("student_id");

    const departmentInput =
        document.getElementById("department_name");

    const departmentIdInput =
        document.getElementById("department_id");

    const gradeInput =
        document.getElementById("grade_level");

    const sectionInput =
        document.getElementById("section");


    if (
        !studentSelect ||
        !departmentInput ||
        !departmentIdInput ||
        !gradeInput ||
        !sectionInput
    ) {

        return;

    }


    studentSelect.addEventListener(
        "change",
        function () {

            const selectedOption =
                this.options[
                    this.selectedIndex
                ];


            /*
             * ----------------------------------------------------
             * Clear Fields
             * ----------------------------------------------------
             */

            if (
                !selectedOption ||
                !selectedOption.dataset.student
            ) {

                departmentInput.value = "";

                departmentIdInput.value = "";

                gradeInput.value = "";

                sectionInput.value = "";

                return;

            }


            /*
             * ----------------------------------------------------
             * Student Data
             * ----------------------------------------------------
             */

            const student =
                JSON.parse(
                    selectedOption.dataset.student
                );


            /*
             * ----------------------------------------------------
             * Populate Grade and Section
             * ----------------------------------------------------
             */

            gradeInput.value =
                student.grade_level;

            sectionInput.value =
                student.section;


            /*
             * ----------------------------------------------------
             * Determine Department
             * ----------------------------------------------------
             */

            const departments =
                JSON.parse(
                    studentSelect.dataset.departments ||
                    "[]"
                );

            const department =
                determineDepartmentByLevel(
                    student.grade_level,
                    departments
                );


            /*
             * ----------------------------------------------------
             * Populate Department
             * ----------------------------------------------------
             */

            if (department) {

                departmentInput.value =
                    department.name;

                departmentIdInput.value =
                    department.id;

            } else {

                departmentInput.value = "";

                departmentIdInput.value = "";

            }

        }
    );

});


// Load Reasons List
document.addEventListener("DOMContentLoaded", function () {

    const reasonSelect =
        document.getElementById("reason_id");

    if (!reasonSelect) {
        return;
    }

    fetch("app/api/reasons.php")

        .then(response => {

            if (!response.ok) {

                throw new Error(
                    "Failed to load reasons."
                );

            }

            return response.json();

        })

        .then(result => {

            if (!result.success) {

                throw new Error(
                    result.message ||
                    "Unable to load reasons."
                );

            }

            result.data.forEach(reason => {

                const option =
                    document.createElement(
                        "option"
                    );

                option.value =
                    reason.id;

                option.textContent =
                    reason.name;

                reasonSelect.appendChild(
                    option
                );

            });

        })

        .catch(error => {

            console.error(
                "Reason loading error:",
                error
            );

        });

});


// Create Report Form Submission
document.addEventListener("DOMContentLoaded", function () {

    const reportForm =
        document.getElementById(
            "newDisciplineReportForm"
        );

    if (!reportForm) {
        return;
    }

    reportForm.addEventListener(
        "submit",
        function (event) {

            event.preventDefault();

            const formData =
                new FormData(reportForm);

            fetch(
                "app/api/create-tardiness-report.php",
                {
                    method: "POST",
                    body: formData
                }
            )

                .then(response => {

                    if (!response.ok) {

                        throw new Error(
                            "Unable to communicate with the server."
                        );

                    }

                    return response.json();

                })

                .then(result => {

                    if (!result.success) {

                        Swal.fire({

                            icon: "error",

                            title:
                                "Unable to Create Report",

                            text:
                                result.message ||
                                "Unable to create discipline report.",

                            confirmButtonText:
                                "Okay"

                        });

                        return;

                    }


                    Swal.fire({

                        icon: "success",

                        title:
                            "Report Created",

                        text:
                            "Report " +
                            result.report_number +
                            " was created successfully.",

                        confirmButtonText:
                            "Okay"

                    });


                    /*
                     * ------------------------------------------------
                     * Reset Form
                     * ------------------------------------------------
                     */

                    reportForm.reset();


                    /*
                     * ------------------------------------------------
                     * Clear Auto-Filled Student Information
                     * ------------------------------------------------
                     */

                    document.getElementById(
                        "department_name"
                    ).value = "";

                    document.getElementById(
                        "department_id"
                    ).value = "";

                    document.getElementById(
                        "grade_level"
                    ).value = "";

                    document.getElementById(
                        "section"
                    ).value = "";


                    /*
                     * ------------------------------------------------
                     * Close Modal
                     * ------------------------------------------------
                     */

                    const modalElement =
                        document.getElementById(
                            "newDisciplineReportModal"
                        );

                    const modal =
                        bootstrap.Modal.getInstance(
                            modalElement
                        );

                    if (modal) {

                        modal.hide();

                    }

                })

                .catch(error => {

                    console.error(
                        "Report submission error:",
                        error
                    );

                    Swal.fire({

                        icon: "error",

                        title:
                            "Something Went Wrong",

                        text:
                            "An unexpected error occurred while creating the report.",

                        confirmButtonText:
                            "Okay"

                    });

                });

        }
    );

});