CREATE TABLE reports (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,

    report_number VARCHAR(30) NOT NULL,
    report_date DATE NOT NULL,

    monitoring_officer VARCHAR(150) NOT NULL,

    /*
     * Student relationship
     */
    student_id BIGINT UNSIGNED NOT NULL,

    /*
     * Historical student snapshot
     */
    student_name VARCHAR(150) NOT NULL,
    department_id BIGINT UNSIGNED NOT NULL,
    department_name VARCHAR(100) NOT NULL,
    grade_level VARCHAR(50) NOT NULL,
    section VARCHAR(100) NOT NULL,

    /*
     * Reason relationship
     */
    reason_id BIGINT UNSIGNED NOT NULL,
    reason_name VARCHAR(150) NOT NULL,

    /*
     * Report details
     */
    supplementary_observations TEXT NULL,
    actions_taken TEXT NULL,

    /*
     * System timestamps
     */
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP,

    deleted_at TIMESTAMP NULL DEFAULT NULL,

    PRIMARY KEY (id),

    UNIQUE KEY report_number (report_number),

    KEY fk_reports_student (student_id),
    KEY fk_reports_department (department_id),
    KEY fk_reports_reason (reason_id),

    CONSTRAINT fk_reports_student
        FOREIGN KEY (student_id)
        REFERENCES students(id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT,

    CONSTRAINT fk_reports_department
        FOREIGN KEY (department_id)
        REFERENCES departments(id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT,

    CONSTRAINT fk_reports_reason
        FOREIGN KEY (reason_id)
        REFERENCES reasons(id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT

) ENGINE=InnoDB
  DEFAULT CHARSET=utf8mb4
  COLLATE=utf8mb4_general_ci;