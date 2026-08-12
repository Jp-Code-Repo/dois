
<script src="<?= htmlspecialchars(
    '/dois/assets/js/dashboard.js'
) ?>"></script>




<script>

    document.addEventListener('DOMContentLoaded', function () {

        const studentSelect = document.getElementById('student_id');

        const departmentInput = document.getElementById('department_name');
        const gradeInput = document.getElementById('grade_level');
        const sectionInput = document.getElementById('section');

        if (!studentSelect) {
            return;
        }


        /*
        |--------------------------------------------------------------------------
        | Load Students
        |--------------------------------------------------------------------------
        */

        fetch('app/api/students.php')
            .then(response => {

                if (!response.ok) {
                    throw new Error('Failed to load students.');
                }

                return response.json();
            })

            .then(result => {

                if (!result.success) {
                    throw new Error(result.message || 'Unable to load students.');
                }

                result.data.forEach(student => {

                    const option = document.createElement('option');

                    option.value = student.id;

                    option.textContent =
                        student.student_name +
                        ' (' +
                        student.student_number +
                        ')';

                    option.dataset.student = JSON.stringify(student);

                    studentSelect.appendChild(option);
                });

            })

            .catch(error => {

                console.error('Student loading error:', error);

            });


        /*
        |--------------------------------------------------------------------------
        | Student Selection
        |--------------------------------------------------------------------------
        */

        studentSelect.addEventListener('change', function () {

            const selectedOption =
                this.options[this.selectedIndex];

            if (!selectedOption || !selectedOption.dataset.student) {

                departmentInput.value = '';
                gradeInput.value = '';
                sectionInput.value = '';

                return;
            }

            const student =
                JSON.parse(selectedOption.dataset.student);

            departmentInput.value =
                student.department_name;

            gradeInput.value =
                student.grade_level;

            sectionInput.value =
                student.section;

        });

    /*
    |--------------------------------------------------------------------------
    | Load Reasons
    |--------------------------------------------------------------------------
    */

    const reasonSelect = document.getElementById('reason_id');

    if (reasonSelect) {

        fetch('app/api/reasons.php')
            .then(response => {

                if (!response.ok) {
                    throw new Error('Failed to load reasons.');
                }

                return response.json();
            })

            .then(result => {

                if (!result.success) {
                    throw new Error(
                        result.message || 'Unable to load reasons.'
                    );
                }

                result.data.forEach(reason => {

                    const option =
                        document.createElement('option');

                    option.value = reason.id;

                    option.textContent = reason.name;

                    reasonSelect.appendChild(option);

                });

            })

            .catch(error => {

                console.error(
                    'Reason loading error:',
                    error
                );

            });

    }

    /*
    |--------------------------------------------------------------------------
    | Create Discipline Report
    |--------------------------------------------------------------------------
    */

    const reportForm = document.getElementById('newDisciplineReportForm');

    if (reportForm) {

        reportForm.addEventListener('submit', function (event) {

            event.preventDefault();

            const formData = new FormData(reportForm);

            fetch('app/api/create-report.php', {
                method: 'POST',
                body: formData
            })

            .then(response => response.json())

            .then(result => {

                if (!result.success) {

                    alert(
                        result.message ||
                        'Unable to create discipline report.'
                    );

                    return;
                }

                alert(
                    'Report ' +
                    result.report_number +
                    ' created successfully.'
                );

                /*
                |--------------------------------------------------------------------------
                | Reset Form
                |--------------------------------------------------------------------------
                */

                reportForm.reset();


                /*
                |--------------------------------------------------------------------------
                | Clear auto-filled student information
                |--------------------------------------------------------------------------
                */

                document.getElementById('department_name').value = '';
                document.getElementById('grade_level').value = '';
                document.getElementById('section').value = '';


                /*
                |--------------------------------------------------------------------------
                | Close Modal
                |--------------------------------------------------------------------------
                */

                const modalElement =
                    document.getElementById('newDisciplineReportModal');

                const modal =
                    bootstrap.Modal.getInstance(modalElement);

                if (modal) {
                    modal.hide();
                }

            })

            .catch(error => {

                console.error(
                    'Report submission error:',
                    error
                );

                alert(
                    'An unexpected error occurred while creating the report.'
                );

            });

        });

    }

    });
</script>