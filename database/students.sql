

students	CREATE TABLE `students` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `spn` varchar(50) NOT NULL,
  `student_firstname` varchar(100) NOT NULL,
  `student_middlename` varchar(100) DEFAULT NULL,
  `student_lastname` varchar(100) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` varchar(30) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `grade_level` varchar(50) NOT NULL,
  `section` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_students_spn` (`spn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci	

	
