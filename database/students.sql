CREATE TABLE students (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,

    student_number VARCHAR(50) NULL,
    student_name VARCHAR(150) NOT NULL,

    grade_level VARCHAR(50) NOT NULL,
    section VARCHAR(100) NOT NULL,

    department_id BIGINT UNSIGNED NOT NULL,

    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP,

    PRIMARY KEY (id),

    KEY fk_students_department (department_id),

    CONSTRAINT fk_students_department
        FOREIGN KEY (department_id)
        REFERENCES departments(id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT

) ENGINE=InnoDB
  DEFAULT CHARSET=utf8mb4
  COLLATE=utf8mb4_general_ci;